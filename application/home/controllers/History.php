<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class History extends MY_Controller
{
    private $system_config = null;
    private $data = array();

    public function __construct()
    {
        
        parent::__construct();
        $this->load->model(array('common'));
        $this->load->helper(array('array'));
    }


    public function home($year = null)
    {
        //城市列表查询
        $year = intval($year);
        $this->data = $this->city_list_query();
        $search_year = $year ? $year : $this->data['system_config']['year'];
        //首页选择下拉 文本 查询
        $this->data = $this->home_post_query("year='{$search_year}'");

        $where = "year='{$search_year}'";
        //各个城市 职位数 报名 人数  招聘单位（top 10）
        $field = "year,SUBSTR(province,1,4) as province,SUM(num) as apply_num,COUNT(*) as post_num";
        $group = "SUBSTR(province,1,4)";
        $city_applyNum_list = $this->common->home_list('post_table', $field, $where, $group);

        foreach ($city_applyNum_list as &$values) {
            $where = "year='$search_year' and  province like '{$values['province']}%'";
            $top10_post_list = $this->common->home_list('post_table', 'id,company', $where, 'company', 'id asc', 10);
            $values['top10_post_list'] = $top10_post_list;
            $values['city_en'] = $this->data['city_map'][$values['province']]['en'];
        }
        $apply_order_by = array();
        foreach ($city_applyNum_list as $key => $value) {
            $apply_order_by[$key] = $value['city_en'];
        }
        array_multisort($apply_order_by, SORT_ASC, $city_applyNum_list);
        $this->data['city_applyNum_list'] = $city_applyNum_list;
        $this->data['year'] = $search_year;
//        echo '<pre>';
//        var_export($this->data['city_map']);exit;
        //报考热度排行  竞争比例排行 访问人气排行 招考人数排行
        $where = "year='{$search_year}'";
        $apply_order_list = $this->common->home_list('post_table', 'id,year,post_name,apply_num', $where, '', 'apply_num desc', 10);
        $compete_order_list = $this->common->home_list('post_table', 'id,year,post_name,compete_rate', $where, '', 'compete_rate desc', 10);
        $zhaokao_order_list = $this->common->home_list('post_table', 'id,year,post_name,num', $where, '', 'num desc', 10);

        $order_zhaokao = array();
        foreach ($zhaokao_order_list as $k => $value) {
            $order_zhaokao[$k] = $value['post_name'];
        }
        array_multisort($order_zhaokao, SORT_ASC, $zhaokao_order_list);
        $this->data['apply_order_list'] = $apply_order_list;
        $this->data['compete_order_list'] = $compete_order_list;
        $this->data['zhaokao_order_list'] = $zhaokao_order_list;
        $this->load_history_view('history/home', $this->data);
    }

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

//        echo '<pre>';
//        var_dump($this->data);exit;
        $this->load->view('history/index', $this->data);
    }

    public function rank()
    {
        //城市列表查询
        $this->data = $this->city_list_query();
        $this->load->view('history/rank', $this->data);
    }


    public function search($year = null)
    {

        $require_data = array_filter($_REQUEST);
        array_map(function ($v) {
            return urldecode(trim($v));
        }, $require_data);

        //城市列表查询
        $this->data = $this->city_list_query();
        $search_year = $year ? $year : $this->data['system_config']['year'];
        $where = "year='{$search_year}'";
        $s_list = $this->home_post_query($where);
        $this->data['year'] = $search_year;
        $this->data['list'] = $s_list;

        //获取职位查询结果

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

//        if (isset($require_data['nianling']) && $require_data['nianling']) {
//            $where .= " and age  like '{$require_data['nianling']}%'";
//        }

        if (isset($require_data['universityplan']) && $require_data['universityplan']) {
            if ($require_data['universityplan'] == '暂无') {
                $where .= " and university_graduate_plan  is null";
            } else {
                $where .= " and university_graduate_plan  like '{$require_data['universityplan']}%'";
            }
        }


        if (isset($require_data['diqu']) && $require_data['diqu']) {
            $where .= " and area  like '%{$require_data['diqu']}%'";
        }

        if (isset($require_data['bmmc']) && $require_data['bmmc']) {
            $where .= " and company  like '%{$require_data['bmmc']}%'";
        }

        if (isset($require_data['zwid']) && $require_data['zwid']) {
            $where .= " and post_code  like '%{$require_data['zwid']}%'";
        }

        if (isset($require_data['zwmc']) && $require_data['zwmc']) {
            $where .= " and post_name  like '%{$require_data['zwmc']}%'";
        }

        $list = $this->common->home_page_list('post_table', 20, $where, 'id asc', 'id,year,area,post_code,post_name,company,degree,profession,num,apply_num,pass_num,pay_num', false, '/lscx/search' . $year . '/?');

        foreach ($list['list'] as $k => $item) {
            if($list['list'][$k]['apply_num'] === null){
                $list['list'][$k]['apply_num']='暂无';
            }
            if($list['list'][$k]['pay_num'] === null){
                $list['list'][$k]['pay_num']='暂无';
            }

            if($list['list'][$k]['pass_num'] === null){
                $list['list'][$k]['pass_num']='暂无';
            }


            if($list['list'][$k]['post_code'] === null || !$list['list'][$k]['post_code']){
                $list['list'][$k]['post_code'] = '暂无';
            }

            //获取录取最低分数
            $low_score_info = $this->common->home_list('pass_user', 'id,score', "year='{$item['year']}' and post_code='{$item['post_code']}'", '', 'score asc', 10);
            if($_REQUEST['debug']){
               var_dump($this->common->get_last_query());
               var_dump($low_score_info);
               exit;
            }
            $list['list'][$k]['score'] = isset($low_score_info[0]['score']) ? $low_score_info[0]['score'] : '暂无';
        }
        $this->data['data'] = $list;
//        echo '<pre>';
//        var_dump($this->data['list']['area_list']);exit;
        $this->load_history_view('history/search', $this->data);
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
            $values['url'] = '/lscx/' . $city . '/' . str_replace(' ', '', pinyin($values['area'])) . ($year ? '/' . $year . '.html' : "");
        }
        foreach ($company_list as &$values) {
            $values['url'] = '/lscx/' . $city . '/' . str_replace(' ', '', pinyin($values['id'])) . ($year ? '/' . $year . '.html' : "");
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
        $this->load_history_view('history/city', $this->data);
    }

    /**行政辖区页面
     * @param null $city
     * @param null $id
     */
    public function area($city = null, $id = null, $year = null)
    {
        //城市列表查询
        $this->data = $this->city_list_query();
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
        $list = $this->common->home_list('post_table', 'id,year,area,post_code,post_name,company,degree,profession,num,apply_num,pass_num,pay_num', $where, '');


        foreach ($list as $k => $value) {


            if($list[$k]['post_code'] ===null || !$list[$k]['post_code']){
                $list[$k]['post_code'] ='暂无';
            }

            if($list[$k]['apply_num'] === null){
                $list[$k]['apply_num'] = '暂无';
            }
            if($list[$k]['pass_num'] === null){
                $list[$k]['pass_num'] = '暂无';
            }
            if($list[$k]['pay_num'] === null){
                $list[$k]['pay_num'] = '暂无';
            }
            $score_info = $this->common->home_list('pass_user', 'id,score', "post_code='{$value['post_code']}' and year='{$value['year']}'", '', 'score asc', 1);
            $list[$k]['score'] = isset($score_info[0]['score'])? ($score_info[0]['score']> 0?  $score_info[0]['score'] : '核减'):'暂无';
        }

        $this->data['list'] = $list;
        $city_zh = $this->config->item('city');
        $this->data['year'] = $search_year;
        $this->data['position_info']['city_name'] = $city_zh[$city_info[$city]]['zh'];
        $this->data['position_info']['city_url'] = '/lscx/' . $city . '/' . ($year ? $year . '.php' : '');
        if ($area) {
            $this->data['position_info']['area_name'] = $area;
            $this->data['position_info']['area_url'] = '/lscx/' . $city . '/' . $id . '/' . ($year ? $year . '.html' : '');
            $this->load_history_view('history/area', $this->data);
        } else {
            $this->data['position_info']['area_name'] = $find['area'];
            $this->data['position_info']['area_url'] = '/lscx/' . $city . '/' . str_replace(' ', '', pinyin($find['area'])) . '/' . ($year ? $year . '.html' : '');
            $this->data['position_info']['company'] = $company;
            $this->load_history_view('history/company', $this->data);
        }

    }


    public function detail($year = null, $id = null)
    {
        //城市列表查询
        $this->data = $this->city_list_query();
        $where = "year='{$year}' and id=$id";
        $find = $this->common->get_one('post_table', $where);

        $find['apply_num'] === null && $find['pay_num'] === null && $find['pass_num'] === null && $find['compete_rate'] ='暂无';
        $find['apply_num'] === null &&$find['apply_num']='暂无 ';
        $find['pay_num'] === null &&$find['pay_num']='暂无 ';
        $find['pass_num'] === null &&$find['pass_num']='暂无 ';
        ($find['post_code'] === null || !$find['post_code']) &&$find['post_code']='暂无 ';

        $this->data['detail'] = $find;
        $hejian = $this->common->get_one('post_cut', "post_code='{$find['post_code']}' and year='{$find['year']}'");
        if($hejian){
            $this->data['detail'] ['hejian']=isset($hejian['num'])?$hejian['num']:'暂无';
        }
        //录取人员名单
        $where = "year='{$find['year']}' and post_code='{$find['post_code']}'";
        $list = $this->common->home_list('pass_user', 'id,year,post_code,score', $where, '', 'score desc');
        foreach ($list as $k => $value) {
            if ($value['score'] <= 0) {
                $list[$k]['score'] = "核减";
            }
        }
        $updatetime = $this->common->get_one('updatetime',"year='{$find['year']}'");
        $this->data['system_config']['fs_newupdate_time'] = $updatetime['updatetime'];

        $this->data['list'] = $list;
        $this->data['year'] = $year;
        $this->load_history_view('history/detail', $this->data);
    }
}