<?php

defined('BASEPATH') OR exit('No direct script access allowed');
header('Content-type:text/html;charset=utf-8');

class Post extends MY_Controller
{

    private $data = array();

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('common', 'score'));
        $this->load->helper(array('array'));
    }


    /**
     * 查询首页
     */
    public function index()
    {
        //城市列表查询
        $this->data = $this->city_list_query();
        $where = "year<='{$this->data['system_config']['year']}'";
        $yearlist = $this->common->home_list('post_table', 'year', $where, 'year', 'year desc');

        foreach ($yearlist as $value) {
            //首页选择下拉 文本 查询
            $this->data['yearlist'][$value['year']] = $this->home_post_query("year='{$value['year']}'");
        }
        $this->load_home_view('post/index', $this->data);
    }

    /**
     * 搜索页面
     */
    public function search($year = null)
    {
        //城市列表查询
        $this->data = $this->city_list_query();
        $require_data = array_filter($_REQUEST);


        $require_data = array_map(function ($v) {
            return urldecode(trim($v));
        }, $require_data);
        $search_year = $year ? $year : $this->data['system_config']['year'];


        //首页选择下拉 文本 查询
        $this->data = $this->home_post_query($search_year);

        //获取职位查询结果
        $where = "year='{$search_year}'";

        if (isset($require_data['kqid']) && $require_data['kqid']) {
            $where .= " and province like '{$require_data['kqid']}%'";
        }
        if (isset($require_data['xueduan']) && $require_data['xueduan']) {
            $where .= " and study_section = '{$require_data['xueduan']}'";
        }

        if (isset($require_data['xueke']) && $require_data['xueke']) {
            $where .= " and subject = '{$require_data['xueke']}'";
        }

        if (isset($require_data['xueli']) && $require_data['xueli']) {
            $where .= " and degree = '{$require_data['xueli']}'";
        }

        if (isset($require_data['zhuanye']) && $require_data['zhuanye']) {
            $where .= " and profession like '%{$require_data['zhuanye']}%'";
        }

        if (isset($require_data['nianling']) && $require_data['nianling']) {
            $where .= " and age  like '{$require_data['nianling']}%'";
        }

        // if (isset($require_data['nianling']) && $require_data['nianling']) {
        //     $where .= " and age  like '{$require_data['nianling']}%'";
        // }

        if (isset($require_data['universityplan']) && $require_data['universityplan']) {
            if ($require_data['universityplan'] == '暂无') {
                $where .= " and university_graduate_plan  is null";
            } else {
                $where .= " and university_graduate_plan  like '{$require_data['universityplan']}%'";
            }
        }


        $diqu = trim($require_data['diqu']);
        if (isset($require_data['diqu']) && $diqu) {
            $where .= " and area  like '%{$diqu}%'";
        }

        $bmmc = trim($require_data['bmmc']);
        if (isset($require_data['bmmc']) && $bmmc) {
            $where .= " and company  like '%{$bmmc}%'";
        }

        $zwid = trim($require_data['zwid']);
        if (isset($require_data['zwid']) && $zwid) {
            $where .= " and post_code  like '%{$zwid}%'";
        }
        $zwmc = trim($require_data['zwmc']);

        if (isset($require_data['zwmc']) && $zwmc) {
            $where .= " and post_name  like '%{$zwmc}%'";
        }

//        var_export($where);
        $this->data['year'] = $search_year;
        $list = $this->common->home_page_list('post_table', 20, $where, 'id asc', 'id,year,area,post_code,post_name,company,degree,profession,num,apply_num,pass_num,pay_num', false, "/kscx/search{$year}/?");


        foreach ($list['list'] as $k => $v) {
            if ($list['list'][$k]['apply_num'] === null) {
                $list['list'][$k]['apply_num'] = '暂无';
            }
            if ($list['list'][$k]['pass_num'] === null) {
                $list['list'][$k]['pass_num'] = '暂无';
            }
            if ($list['list'][$k]['pay_num'] === null) {
                $list['list'][$k]['pay_num'] = '暂无';
            }

            if ($list['list'][$k]['post_code'] === null || !$list['list'][$k]['post_code']) {
                $list['list'][$k]['post_code'] = '暂无';
            }

        }


        $this->data['data'] = $list;
        $this->load_home_view('post/search', $this->data);
    }


    /**城市页面
     * @param null $city
     */
    public function city($city = null, $year = null)
    {

        //城市列表查询
        $this->data = $this->city_list_query();
        //首页选择下拉 文本 查询
        $search_year = $year ? $year : $this->data['system_config']['year'];
        $this->data = $this->home_post_query("year='{$search_year}'");

        $city_info = $this->config->item('city_pinping');
        $city_code = $city_info[$city];
        $where = "year='{$search_year}' and province like '{$city_code}%'";
        $area_list = $this->common->home_list('post_table', 'area', $where, 'area', 'id asc');
        $company_list = $this->common->home_list('post_table', 'id,company', $where, 'company', 'id asc');
        foreach ($area_list as &$values) {
            $values['url'] = '/kscx/' . $city . '/' . str_replace(' ', '', pinyin($values['area'])) . ($year ? '/' . $year . '.html' : "");
        }
        foreach ($company_list as &$values) {
            $values['url'] = '/kscx/' . $city . '/' . str_replace(' ', '', pinyin($values['id'])) . ($year ? '/' . $year . '.html' : "");
        }
        $this->data['area_arr'] = $area_list;
        $this->data['company_list'] = $company_list;
        //各个城市 职位数 报名 人数  招聘单位（top 10）
        $where = "year='{$search_year}' and province like '{$city_code}%'";
        $field = "SUBSTR(province,1,4) as province,SUM(num) as apply_num,COUNT(*) as post_num";
        $group = "SUBSTR(province,1,4)";
        $city_applyNum_list = $this->common->home_list('post_table', $field, $where, $group);
        $this->data['city_applyNum_list'] = current($city_applyNum_list);

        if ($year == null) {
            $where = "year<'{$this->data['system_config']['year']}'";
            $yearlist = $this->common->home_list('post_table', 'year', $where, 'year', 'year desc');
        }
        $this->data['yearlist'] = $yearlist;
        $this->data['year'] = $year ? $year : $this->data['system_config']['year'];


        //统计
        $where = "year='{$search_year}' and province like '{$city_code}%'";
        $field = "study_section,`subject`,area,province,SUM(num) as apply_num";
        $group = "study_section,`subject`,area,province";
        $stat_list = $this->common->home_list('post_table', $field, $where, $group);


        $title_arr = $stat = array();
        foreach ($stat_list as $value) {
            $title_arr[$value['province']] = $value['area'];
            if (strstr($value['study_section'], '高中')) {
                in_array($value['subject'], $stat['high']['subject_list']) || $stat['high']['subject_list'][] = $value['subject'];
                $stat['high'][$value['subject']][$value['province']] = $value['apply_num'];
                $stat['high'][$value['subject']]['total'] += $value['apply_num'];
            } elseif (strstr($value['study_section'], '中学')) {
                in_array($value['subject'], $stat['middle']['subject_list']) || $stat['middle']['subject_list'][] = $value['subject'];
                $stat['middle'][$value['subject']][$value['province']] = $value['apply_num'];
                $stat['middle'][$value['subject']]['total'] += $value['apply_num'];
            } elseif (strstr($value['study_section'], '小学')) {
                in_array($value['subject'], $stat['primary']['subject_list']) || $stat['primary']['subject_list'][] = $value['subject'];
                $stat['primary'][$value['subject']][$value['province']] = $value['apply_num'];
                $stat['primary'][$value['subject']]['total'] += $value['apply_num'];
            }

        }
        $this->data['stat'] = $stat;
        $this->data['title'] = $title_arr;

//        if($_REQUEST['test']){
//            echo '<pre/>';
//            var_dump($stat);exit;
//        }

        $this->load_home_view('post/city', $this->data);
    }

    /**行政辖区页面
     * @param null $city
     * @param null $id
     */
    public function area($city = null, $id = null, $year = null)
    {
        $system_config = $this->common->get_system_config();
        $this->data['system_config'] = $system_config;
        $year = intval($year);
        $search_year = $year ? $year : $this->data['system_config']['year'];
        $city_info = $this->config->item('city_pinping');
        $city_code = $city_info[$city];
        $area_info = $this->config->item('area');
        $where = "year='{$search_year}' and province like '{$city_code}%'";
        preg_match('/[a-z]+/', $id, $maths);
        if (isset($maths[0]) && $maths[0]) {
            $area = $area_info[$maths[0]][0];
            $where .= " and area='{$area}'";
        } else {
            $id = intval($id);
            $find = $this->common->get_one('post_table', 'id=' . $id);
            $company = $find['company'];
            $where .= " and company='{$company}'";
        }
        $list = $this->common->home_list('post_table', 'id,year,area,post_code,post_name,company,degree,profession,num,apply_num,pass_num,pay_num,university_graduate_plan,city_plan,town_plan', $where, '');

        foreach ($list as $k => $v) {

            if ($list[$k]['post_code'] === null || !$list[$k]['post_code']) {
                $list[$k]['post_code'] = '暂无';
            }


            if ($list[$k]['apply_num'] === null) {
                $list[$k]['apply_num'] = '暂无';
            }


            if ($list[$k]['pass_num'] === null) {
                $list[$k]['pass_num'] = '暂无';
            }

            if ($list[$k]['pay_num'] === null) {
                $list[$k]['pay_num'] = '暂无';
            }
        }

        $this->data['list'] = $list;
        $city_zh = $this->config->item('city');
        $this->data['year'] = $search_year;
        $this->data['position_info']['city_name'] = $city_zh[$city_info[$city]]['zh'];
        $this->data['position_info']['city_url'] = '/kscx/' . $city . '/' . ($year ? $year . '.php' : '');
        if ($area) {
            $this->data['position_info']['area_name'] = $area;
            $this->data['position_info']['area_url'] = '/kscx/' . $city . '/' . $id . '/' . ($year ? $year . '.html' : '');
            $this->load_home_view('post/area', $this->data);
        } else {
            $this->data['position_info']['area_name'] = $find['area'];
            $this->data['position_info']['area_url'] = '/kscx/' . $city . '/' . str_replace(' ', '', pinyin($find['area'])) . '/' . ($year ? $year . '.html' : '');
            $this->data['position_info']['company'] = $company;
            $this->load_home_view('post/company', $this->data);
        }

    }


    /**岗位明细页面
     * @param int $year
     * @param int $id
     */
    public function detail($year = 0, $id = 0)
    {
        //城市列表查询
        $this->data = $this->city_list_query();
        $where = "year='{$year}' and id=$id";
        $find = $this->common->get_one('post_table', $where);
        $find['apply_num'] === '0' && $find['pay_num'] === '0' && $find['pass_num'] === '0' && $find['compete_rate'] = '暂无';
        $find['apply_num'] === '0' && $find['apply_num'] = '暂无 ';
        $find['pay_num'] === '0' && $find['pay_num'] = '暂无 ';
        $find['city_plan'] === null && $find['city_plan'] = '暂无 ';
        $find['town_plan'] === null && $find['town_plan'] = '暂无 ';
        $find['single_plan'] === null && $find['single_plan'] = '暂无 ';
        $find['pass_num'] === '0' && $find['pass_num'] = '暂无 ';
        ($find['post_code'] === null || !$find['post_code']) && $find['post_code'] = '暂无 ';

        $this->data['detail'] = $find;
        $hejian = $this->common->get_one('post_cut', "post_code='{$find['post_code']}' and year='{$find['year']}'");
        if ($hejian) {
            $this->data['detail'] ['hejian'] = isset($hejian['num']) ? $hejian['num'] : '暂无';
        }
        //去年职位报名详情
        $last_year = date('Y', strtotime($year . '-01-01') - 365 * 86400);
        $field = "id,year,post_code,post_name,num,apply_num,pass_num,pay_num";
        $where = "company like '{$find['company']}%' and year='{$last_year}'";
        $last_list = $this->common->home_list('post_table', $field, $where, '', 'apply_num desc,pass_num desc,pay_num desc');
        foreach ($last_list as &$value) {
            $low_score_info = $this->common->home_list('pass_user', 'id,score', "year='{$value['year']}' and post_code='{$value['post_code']}'", '', 'score asc', 1);
            $value['bscj'] = isset($low_score_info[0]['score']) ? $low_score_info[0]['score'] : '暂无';
        }

        $updatetime = $this->common->get_one('updatetime', "year='{$find['year']}'");
        $this->data['system_config']['zhiwei_newupdate_time'] = $updatetime['updatetime'];

        $this->data['year'] = $year;
        $this->data['last_year'] = $last_year;
        $this->data['list'] = $last_list;
        $this->load_home_view('post/detail', $this->data);


    }


    /**数据统计
     * @param null $city
     */
    public function stat($city = null, $year = null)
    {
        //报考人数汇总
        if ($city) {
            preg_match('/[a-z]+/', $city, $maths);
            if (isset($maths[0]) && $maths[0]) {
                $city_info = $this->config->item('city_pinping');
                $city_code = $city_info[$city];
                !$city_code ? $where = "" : $where = "province like '{$city_code}%'";
                $year = intval($year);
                if ($year > 0) {
                    $where .= $where ? " and year='{$year}'" : "year='{$year}'";
                }
            } else {
                $year = intval($city);
                $where = "year='{$year}'";
            }
        } else {
            $where = "";
        }
        //城市列表查询
        $this->data = $this->city_list_query();
        //报考人数汇总
        if ($city_code) {
            $field = "SUBSTR(province,1,4) as province,area,count(*) as post_num,SUM(num) as require_num,sum(apply_num) as apply_num,sum(pass_num) as pass_num,sum(pay_num) as pay_num";
            $group = "area";
        } else {
            $field = "SUBSTR(province,1,4) as province,count(*) as post_num,SUM(num) as require_num,sum(apply_num) as apply_num,sum(pass_num) as pass_num,sum(pay_num) as pay_num";
            $group = "SUBSTR(province,1,4)";
        }
        $stat_list = $this->common->home_list('post_table', $field, $where, $group);

        foreach ($stat_list as &$values) {
            if ($values['apply_num'] === null) {
                $values['apply_num'] = '暂无';
            }
            if ($values['pass_num'] === null) {
                $values['pass_num'] = '暂无';
            }

            if ($values['pay_num'] === null) {
                $values['pay_num'] = '暂无';
            }
            $values['en'] = $city_code == null ? $this->data['city_map'][$values['province']]['en'] : str_replace(' ', '', pinyin($values['area']));
            $values['name'] = $city_code == null ? $this->data['city_map'][$values['province']]['zh'] : $values['area'];
            $values['url'] = '/kscx/' . $this->data['city_map'][$values['province']]['en'] . '/';
        }

        $orderby = array();
        foreach ($stat_list as $key => $value) {
            $orderby[$key] = $value['en'];
        }
        array_multisort($orderby, SORT_ASC, $stat_list);
        $this->data['stat_list'] = $stat_list;
        $this->data['city_name'] = $city_code ? $this->data['city_map'][$city_code]['zh'] : '';

        $cityarr = $zhiwei = $zhaokao = $baoming = $hege = $jiaofei = $jingzhengbi = array();
        foreach ($stat_list as $value) {
            $cityarr[] = "'{$value['name']}'";
            $zhiwei[] = $value['post_num'];
            $zhaokao[] = $value['require_num'];
            $baoming[] = $value['apply_num'];
            $hege[] = $value['pass_num'];
            $jiaofei[] = $value['pay_num'];
            $jzb = sprintf('%.1f', $value['pay_num'] / $value['require_num']);
            $jingzhengbi[] = $jzb;
        }
        $this->data['cityarr'] = $cityarr;
        $this->data['zhiwei'] = $zhiwei;
        $this->data['zhaokao'] = $zhaokao;
        $this->data['baoming'] = $baoming;
        
        $this->data['hege'] = $hege;
        $this->data['jiaofei'] = $jiaofei;
        $this->data['jingzhengbi'] = $jingzhengbi;
//        echo '<pre>';
//        var_export($stat_list);exit;
        //各学科报考人数汇总
        $field = "subject,count(*) as post_num,SUM(num) as require_num,sum(apply_num) as apply_num,sum(pass_num) as pass_num,sum(pay_num) as pay_num";
        $group = "subject";
        $stat_subject_list = $this->common->home_list('post_table', $field, $where, $group);
        foreach ($stat_subject_list as &$items) {

            if ($items['apply_num'] === null) {
                $items['apply_num'] = '暂无';
            }
            if ($items['pass_num'] === null) {
                $items['pass_num'] = '暂无';
            }

            if ($items['pay_num'] === null) {
                $items['pay_num'] = '暂无';
            }

            $items['en'] = str_replace(' ', '', pinyin($items['subject']));
            $items['url'] = '/kscx/search' . $year . '/?xueke=' . urlencode($items['subject']);
        }
        $orderby = array();
        foreach ($stat_subject_list as $key => $value) {
            $orderby[$key] = $value['en'];
        }
        array_multisort($orderby, SORT_ASC, $stat_subject_list);
        $this->data['stat_subject_list'] = $stat_subject_list;


        foreach ($stat_subject_list as $value) {
            if (strstr($value['subject'], '品德')) {
                $value['subject'] = '品德';
            }
            if (strstr($value['subject'], '心理')) {
                $value['subject'] = '心理';
            }
            if (strstr($value['subject'], '综合实践活动')) {
                $value['subject'] = '综合实践';
            }
            $subject_arr[] = "'{$value['subject']}'";
            $zhiwei1[] = $value['post_num'];
            $zhaokao1[] = $value['require_num'];
            $baoming1[] = $value['apply_num'];
            $hege1[] = $value['pass_num'];
            $jiaofei1[] = $value['pay_num'];
            $jzb1 = sprintf('%.1f', $value['pay_num'] / $value['require_num']);
            $jingzhengbi1[] = $jzb1;
        }

        $updatetimeYear = $year ? $year : $this->data['system_config']['year'];
        $updatetime = $this->common->get_one('updatetime', "year='{$updatetimeYear}'");
        $this->data['system_config']['zhiwei_newupdate_time'] = $updatetime['updatetime'];

        $this->data['subject_arr'] = $subject_arr;
        $this->data['zhiwei1'] = $zhiwei1;
        $this->data['zhaokao1'] = $zhaokao1;
        $this->data['baoming1'] = $baoming1;
        $this->data['hege1'] = $hege1;
        $this->data['jiaofei1'] = $jiaofei1;
        $this->data['jingzhengbi1'] = $jingzhengbi1;


        //各学段报考人数汇总
        $field = "study_section,count(*) as post_num,SUM(num) as require_num,sum(apply_num) as apply_num,sum(pass_num) as pass_num,sum(pay_num) as pay_num";
        $group = "study_section";
        $stat_study_section_list = $this->common->home_list('post_table', $field, $where, $group);
        foreach ($stat_study_section_list as &$item) {

            if ($item['apply_num'] === null) {
                $item['apply_num'] = '暂无';
            }
            if ($item['pass_num'] === null) {
                $item['pass_num'] = '暂无';
            }

            if ($item['pay_num'] === null) {
                $item['pay_num'] = '暂无';
            }

            $item['en'] = str_replace(' ', '', pinyin($item['study_section']));
            $item['url'] = '/kscx/search' . $year . '/?xueduan=' . urlencode($item['study_section']);
        }
        $orderby = array();
        foreach ($stat_study_section_list as $key => $value) {
            $orderby[$key] = $value['en'];
        }
        array_multisort($orderby, SORT_ASC, $stat_study_section_list);
        $this->data['stat_study_section_list'] = $stat_study_section_list;


        foreach ($stat_study_section_list as $value) {
            $study_section_arr[] = "'{$value['study_section']}'";
            $zhiwei2[] = $value['post_num'];
            $zhaokao2[] = $value['require_num'];
            $baoming2[] = $value['apply_num'];
            $hege2[] = $value['pass_num'];
            $jiaofei2[] = $value['pay_num'];
            $jzb2 = sprintf('%.1f', $value['pay_num'] / $value['require_num']);
            $jingzhengbi2[] = $jzb2;
        }

        $this->data['study_section_arr'] = $study_section_arr;
        $this->data['zhiwei2'] = $zhiwei2;
        $this->data['zhaokao2'] = $zhaokao2;
        $this->data['baoming2'] = $baoming2;
        $this->data['hege2'] = $hege2;
        $this->data['jiaofei2'] = $jiaofei2;
        $this->data['jingzhengbi2'] = $jingzhengbi2;


        //报名人数最多的十大职位
        $field = "id,province,post_code,company,post_name,SUM(num) as require_num,sum(apply_num) as apply_num";
        $group = "post_code";
        $stat_post_list = $this->common->home_list('post_table', $field, $where, $group, 'apply_num desc', 10);
        foreach ($stat_post_list as $key => $vo) {

            if ($vo['apply_num'] === null) {
                $stat_post_list[$key]['apply_num'] = '暂无';
            }
            if ($vo['pass_num'] === null) {
                $stat_post_list[$key]['pass_num'] = '暂无';
            }

            if ($vo['pay_num'] === null) {
                $stat_post_list[$key]['pay_num'] = '暂无';
            }

            $stat_post_list[$key]['url'] = '/kscx/' . ($year ? $year : $this->data['system_config']['year']) . '/' . $vo['id'];
        }
        $this->data['stat_post_list'] = $stat_post_list;
//                        echo '<pre>';
//            var_dump($stat_post_list);exit;
        $baoming_arr = array();
        foreach ($stat_post_list as $value) {
            $temp = array();
            $temp['name'] = $value['post_name'];
            $temp['y'] = intval($value['apply_num']);
            $baoming_arr[] = $temp;
        }

        $this->data['baoming_arr'] = $baoming_arr;

        //资审合格人数最多的十大职位
        $field = "id,province,post_code,company,post_name,SUM(num) as require_num,sum(apply_num) as apply_num,sum(pass_num) as pass_num";
        $group = "post_code";
        $stat_pass_list = $this->common->home_list('post_table', $field, $where, $group, 'pass_num desc', 10);
        foreach ($stat_pass_list as &$vos) {
            if ($vos['apply_num'] === null) {
                $vos['apply_num'] = '暂无';
            }
            if ($vos['pass_num'] === null) {
                $vos['pass_num'] = '暂无';
            }

            if ($vos['pay_num'] === null) {
                $vos['pay_num'] = '暂无';
            }

            $vos['url'] = '/kscx/' . ($year ? $year : $this->data['system_config']['year']) . '/' . $vos['id'];
        }
        $this->data['stat_pass_list'] = $stat_pass_list;

        $pass_arr = array();
        foreach ($stat_pass_list as $value) {
            $temp = array();
            $temp['name'] = $value['post_name'];
            $temp['y'] = intval($value['pass_num']);
            $pass_arr[] = $temp;
        }

        $this->data['pass_arr'] = $pass_arr;

        //竞争最激烈的十大职位
        $field = "id,province,post_code,company,post_name,num as require_num,apply_num as apply_num,pass_num as pass_num,compete_rate";
        $group = "post_code";
        $stat_compete_list = $this->common->home_list('post_table', $field, $where, $group, 'compete_rate desc', 10);
        foreach ($stat_compete_list as &$voss) {

            if ($voss['apply_num'] === null && $voss['pass_num'] === null && $voss['apply_num'] === null) {
                $voss['compete_rate'] = '暂无';
            }
            if ($voss['apply_num'] === null) {
                $voss['apply_num'] = '暂无';
            }
            if ($voss['pass_num'] === null) {
                $voss['pass_num'] = '暂无';
            }

            $voss['url'] = '/kscx/' . ($year ? $year : $this->data['system_config']['year']) . '/' . $voss['id'];
        }
        $this->data['stat_compete_list'] = $stat_compete_list;

        $compete_rate_arr = array();
        foreach ($stat_compete_list as $value) {
            $temp = array();
            $temp['name'] = $value['post_name'];
            $temp['y'] = round($value['compete_rate'], 1);
            $compete_rate_arr[] = $temp;
        }
        $this->data['compete_rate_arr'] = $compete_rate_arr;


        $field = "id,province,post_code,area,company,post_name,num as require_num,apply_num as apply_num";
        $group = "post_code";
        $stat_require_list = $this->common->home_list('post_table', $field, $where, $group, 'require_num desc', 12);
        foreach ($stat_require_list as &$vosss) {
            if ($vosss['apply_num'] === null) {
                $vosss['apply_num'] = '暂无';
            }
            $vosss['url'] = '/kscx/' . ($year ? $year : $this->data['system_config']['year']) . '/' . $vosss['id'];
        }
        $this->data['stat_require_list'] = $stat_require_list;
        $this->data['year'] = $year ? $year : $this->data['system_config']['year'];
        //
//            echo '<pre>';
//            var_dump($this->data['city']);exit;
//        var_export($this->data );exit;

        $this->load->view('post/stat', $this->data);


    }


    /**
     * 岗位对比
     */
    public function duibi()
    {
        //城市列表查询
        $this->data = $this->city_list_query();
        $post_data = array_filter($_REQUEST);
        $id_arr = array();
        foreach ($post_data as $key => $id) {
            $year_info = $this->common->get_one('post_table', 'id=' . $id);
            $id_arr[] = $id;
        }
        $id_string = implode(',', $id_arr);
        $where = "year='{$year_info['year']}' and id in ({$id_string})";
        $field = 'id,year,province,area,company,post_name,post_code,study_section,subject,num,single_plan,degree,is_need_degree,age,profession,university_graduate_plan,teacher_qualification,memo,single_plan_memo,apply_num,pass_num,pay_num,compete_rate';
        $list = $this->common->home_list('post_table', $field, $where, '');
        foreach ($list as $k => $v) {

            if ($list[$k]['pay_num'] === null && $list[$k]['apply_num'] === null && $list[$k]['pass_num'] === null) {
                $list[$k]['compete_rate'] = '暂无';
            }

            if ($list[$k]['apply_num'] === null) {
                $list[$k]['apply_num'] = '暂无';
            }
            if ($list[$k]['pass_num'] === null) {
                $list[$k]['pass_num'] = '暂无';
            }

            if ($list[$k]['pay_num'] === null) {
                $list[$k]['pay_num'] = '暂无';
            }


        }
        $this->data['list'] = $list;
        $this->data['year'] = $year_info['year'];
        $this->load_home_view('post/duibi', $this->data);
    }


    public function rank($parm1 = null, $parm2 = null)
    {
        if ($parm1) {
            preg_match('/[a-z]+/', $parm1, $maths);
            if (isset($maths[0]) && $maths[0]) {
                $flag = $maths[0];
            }
            preg_match('/\d+/', $parm1, $maths);
            if (isset($maths[0]) && $maths[0]) {
                $year = $maths[0];
            }
        }

        if ($parm2) {
            preg_match('/[a-z]+/', $parm2, $maths);
            if (isset($maths[0]) && $maths[0]) {
                $flag = $maths[0];
            }
        }
        //城市列表查询
        $this->data = $this->city_list_query();
        $search_year = $year ? $year : $this->data['system_config']['year'];
        $where = "year='{$search_year}'";
        $order = 'id desc';
        $field = 'id,year,province,area,company,post_name,post_code,degree,num,apply_num,pass_num,pay_num,compete_rate';
        $flag = $flag ? $flag . '.php' : "";
        $base_url = '/kscx/rank' . $year . '/' . $flag . '?';
        $post_data = array_filter($_REQUEST);
        $act = trim($post_data['act']);
        $city = trim($post_data['city']);
        $city_info = $this->config->item('city_pinping');
        $city_code = $city_info[$city];
        $city && $where .= " and province like '{$city_code}%'";

        $act = $act ? $act : ($flag ? 'apply_num' : 'num');
        $act && !$flag && $order = $act . " desc,id asc";
        $act && $flag && $order = $act . " asc,id asc";
        $list = $this->common->home_page_list('post_table', 20, $where, $order, $field, false, $base_url);
        $this->data['list'] = $list['list'];
        $this->data['page'] = $list['page'];
        $this->data['flag'] = $flag;
        $this->data['year'] = $search_year;
//        var_dump($order);exit;
//        var_dump($flag);
//        var_dump($post_data);
//        exit;
        $this->load_home_view('post/rank', $this->data);
    }

    public function sendsms()
    {

        //数据校验
        //姓名
        $username = $this->input->post('username');
        if (!$username) {
            $data['status'] = 0;
            $data['msg'] = '姓名不能为空！';
            exit(json_encode($data));
        }

        $pattern = "/[\x{4e00}-\x{9fa5}]+/u";
        $username && preg_match($pattern, $username, $matchs_name);

        if (!$matchs_name[0]) {
            $data['status'] = 0;
            $data['msg'] = "您的姓名必须是汉字！";
            exit(json_encode($data));
        }

        //手机号
        $phone = $this->input->post('tel');
        $pattern = '/^13[0-9]{9}|^14[5-7]{9}|^15[0-9]{9}|^17[0-9]{9}|^18[0-9]{9}|^19[1-3]{9}/';
        preg_match($pattern, $phone, $matchs_phone);

        if (!$phone) {
            $data['status'] = 0;
            $data['msg'] = '手机号码不能为空！';
            exit(json_encode($data));
        }

        if (!$matchs_phone) {
            $data['status'] = 0;
            $data['msg'] = '手机号码格式不正确！';
            exit(json_encode($data));
        }

        //学科学段
        $subject_study_section = $this->input->post('subject_study_section');
        if (!$subject_study_section) {
            $data['status'] = 0;
            $data['msg'] = '请选择学科学段！';
            exit(json_encode($data));
        }


        if (!$this->verify()) {
            $data['status'] = 0;
            $data['msg'] = '验证码校验失败！';
            exit(json_encode($data));
        }

        $id = $this->input->post('id');
        $sms_num = $this->score->is_send_sms_post($phone);
        $where = "id=$id";
        $find = $this->common->get_one('post_table', $where);
        $detail_link_url = 'http://' . $_SERVER["HTTP_HOST"] . '/kscx/' . $find['year'] . '/' . $id . '.html';
        if ($_REQUEST['history']) {
            $detail_link_url = 'http://' . $_SERVER["HTTP_HOST"] . '/lscx/' . $find['year'] . '/' . $id . '.html';
        }
        if (count($sms_num) >= 10) {
            exit(json_encode(array('status' => 0, 'msg' => '20分钟之内只能发送10条，请稍后再发！')));
        }

        if ($_REQUEST['audition']) {
            $detail_link_url = "http://zw.shichuedu.com/msjc";
        }
        //1.3 发送短信
        $sms_code_info = $this->_sms_api($phone, $detail_link_url);
        if ($sms_code_info['sms_code'] > 0) {
            //插入短信
            $insertSms['username'] = $username;
            $insertSms['phone'] = $phone;
            $insertSms['subject_study_section'] = $subject_study_section;
            $insertSms['content'] = $sms_code_info['sms_content'];
            $insertSms['phone'] = $phone;
            $insertSms['send_time'] = time();
            $result = $this->score->insert_sms_post($insertSms);
            $result || exit(json_encode(array('status' => 0, 'msg' => '发送失败！')));
            $result && exit(json_encode(array('status' => 1, 'msg' => '发送成功！')));
        } else {
            exit(json_encode(array('status' => 0, 'msg' => '发送失败！')));
        }

    }


    /**短信发送
     * @param $mobPhone
     */
    public function _sms_api($mobPhone, $detail_link_url)
    {

        try {
            libxml_disable_entity_loader(false);
            $wsdl = "http://sms3.mobset.com:8080/Api?wsdl";
            $client = new SoapClient($wsdl);
            $client->soap_defencoding = 'utf - 8';
            $client->decode_utf8 = false;
            $errMsg = "";
            $strSign = "";
            $addnum = "";
            $timer = "";
            $lCorpID = ****;
            $strLoginName = "****";
            $strPasswd = "****";
            $code = rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);
            $smsContent = $detail_link_url;
            $longSms = 0;
            $strTimeStamp = $this->_GetTimeString();
            $strInput = $lCorpID . $strPasswd . $strTimeStamp;
            $strMd5 = md5($strInput);
//            $groupId=$client->ArrayOfSmsIDList[1];
            $group = $client->ArrayOfMobileList[1];
            $group[0] = $client->MobileListGroup;
            $group[0]->Mobile = $mobPhone;
            $param = array('CorpID' => $lCorpID, 'LoginName' => $strLoginName, 'Password' => $strMd5, 'TimeStamp' => $strTimeStamp, 'AddNum' => $addnum, 'Timer' => $timer, 'LongSms' => $longSms, 'MobileList' => $group,
                'Content' => $smsContent);
            $result = $client->Sms_Send($param);
//            print_r($result);
//            print_r($result->ErrMsg."--短信ID:".$result->SmsIDList->SmsIDGroup->SmsID);
            $sms_code = $result->SmsIDList->SmsIDGroup->SmsID;
            $sms_content = $smsContent;
            return array('sms_code' => $sms_code, 'sms_content' => $sms_content, 'code' => $code);

        } catch (SoapFault $fault) {
//            echo "Error: ",$fault->faultcode,", string: ",$fault->faultstring;
            return array('sms_code' => 0, 'sms_content' => "");
        }
    }

    private function _GetTimeString()
    {
        date_default_timezone_set('Asia/Shanghai');
        $timestamp = time();
        $hours = date('H', $timestamp);
        $minutes = date('i', $timestamp);
        $seconds = date('s', $timestamp);
        $month = date('m', $timestamp);
        $day = date('d', $timestamp);
        $stamp = $month . $day . $hours . $minutes . $seconds;
        return $stamp;
    }


    /**
     * 面试形式和教材版本
     */
    public function audition()
    {
        $where = "1=1";
        if ($_GET['city']) {
            $where .= " and city like '{$_GET['city']}%'";
        }
        if ($_GET['area']) {
            $where .= " and area like '{$_GET['area']}%'";
        }
        if ($_GET['study_section']) {
            $where .= " and study_section like '{$_GET['study_section']}%'";
        }
        if ($_GET['subject']) {
            $where .= " and subject like '{$_GET['subject']}%'";
        }

        $field = 'id,city,area,study_section,subject,textbook_version';
        $list = $this->common->home_page_list('textbook_version', 20, $where, 'id desc', $field, false, "/msjc/?");

        foreach ($list['list'] as $k => $v) {
            $where_audition['city'] = $v['city'];
            $where_audition['area'] = $v['area'];
            $audition_info = $this->common->get_one('audition_content', $where_audition);
            $list['list'][$k]['audition'] = $audition_info['audition'];
        }

        $this->data['list'] = $list['list'];
        $this->data['page'] = $list['page'];
        $this->load->view('post/audition', $this->data);
    }

    /**
     * 提交反馈
     */
    public function feedback()
    {
        $textbook_id = $this->input->post('aid');
        $find = $this->common->get_one('textbook_version', 'id=' . $textbook_id);
        $audition_content = $this->input->post('audition');
        $textbook_version = $this->input->post('textbook_version');
        if ($textbook_version) {
            $insertData = array();
            $insertData['city'] = $find['city'];
            $insertData['area'] = $find['area'];
            $insertData['study_section'] = $find['study_section'];
            $insertData['subject'] = $find['subject'];
            $insertData['textbook_version'] = $textbook_version;
            $insertData['add_time'] = date('Y-m-d H:i:s');
            $result = $this->common->insert('textbook_feedback', $insertData);
        }
        if ($audition_content) {
            $insertData = array();
            $insertData['city'] = $find['city'];
            $insertData['area'] = $find['area'];
            $insertData['audition_content'] = $audition_content;
            $insertData['add_time'] = date('Y-m-d H:i:s');
            $result = $this->common->insert('audition_feedback', $insertData);
        }
        $result || exit(json_encode(array('status' => 0, 'msg' => '发送失败！')));
        $result && exit(json_encode(array('status' => 1, 'msg' => '发送成功！')));
    }

    public function get_area()
    {
        $city = $this->input->post('city');
        $list = $this->common->admin_list('textbook_version', "id,area", "city='{$city}'", 'id desc', 'area');
        if ($list) {
            exit(json_encode(array('status' => 1, 'data' => $list)));
        } else {
            exit(json_encode(array('status' => 0)));
        }
    }

    public function get_study_section()
    {
        $city = $this->input->post('city');
        $area = $this->input->post('area');
        $list = $this->common->admin_list('textbook_version', "id,study_section", "city='{$city}' and area='{$area}'", 'id desc', 'study_section');
        if ($list) {
            exit(json_encode(array('status' => 1, 'data' => $list)));
        } else {
            exit(json_encode(array('status' => 0)));
        }
    }

    public function get_subject()
    {
        $city = $this->input->post('city');
        $area = $this->input->post('area');
        $study_section = $this->input->post('study_section');
        $list = $this->common->admin_list('textbook_version', "id,subject", "city='{$city}' and area='{$area}' and study_section='{$study_section}'", 'id desc', 'subject');
        if ($list) {
            exit(json_encode(array('status' => 1, 'data' => $list)));
        } else {
            exit(json_encode(array('status' => 0)));
        }
    }


    public function test()
    {
        $this->load->view('post/test');
    }

}