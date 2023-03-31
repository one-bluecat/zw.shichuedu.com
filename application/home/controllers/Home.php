<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller
{
    private $data = null;
    public function __construct()
    {
        parent::__construct();
    }

    public function index($year=null)
    {

        //城市列表查询
        $this->data = $this->city_list_query();
        //首页选择下拉 文本 查询
       $search_year  = $year?intval($year):$this->data['system_config']['year'];
        $this->data =$this->home_post_query("year='{$search_year}'");
        $where = "year='{$search_year}'";
        //各个城市 职位数 报名 人数  招聘单位（top 10）
        $field = "SUBSTR(province,1,4) as province,SUM(num) as apply_num,COUNT(*) as post_num";
        $group = "SUBSTR(province,1,4)";
        $city_applyNum_list = $this->common->home_list('post_table',$field,$where,$group);

        foreach ($city_applyNum_list as &$values){
            $where = "year='{$search_year}' and  province like '{$values['province']}%'";
            $top10_post_list = $this->common->home_list('post_table','id,company',$where,'company','id asc',10);
            $values['top10_post_list'] = $top10_post_list;
            $values['city_en'] = $this->data['city_map'][$values['province']]['en'];
        }
        $apply_order_by = array();
        foreach ($city_applyNum_list as $key=>$value){
            $apply_order_by[$key] = $value['city_en'];
        }
        array_multisort($apply_order_by,SORT_ASC,$city_applyNum_list);
        $this->data['city_applyNum_list'] = $city_applyNum_list;
//        echo '<pre>';
//        var_export($this->data['area_list']);exit;
        //报考热度排行  竞争比例排行 访问人气排行 招考人数排行
        $where = "year='{$search_year}'";
        $apply_order_list = $this->common->home_list('post_table','id,year,post_name,apply_num',$where,'','apply_num desc',10);
        $compete_order_list = $this->common->home_list('post_table','id,year,post_name,compete_rate,apply_num',$where,'','compete_rate desc',10);
        $zhaokao_order_list = $this->common->home_list('post_table','id,year,post_name,num',$where,'','num desc',10);

        foreach ($apply_order_list as $k=>$v ){
            $apply_order_list[$k]['alias_post_name'] = $this->sub_str($v['post_name'],10);
            if($v['apply_num'] === null){
                $apply_order_list[$k]['apply_num'] = '暂无';
            }
        }



        foreach ($compete_order_list as $k=>$v ){
            $compete_order_list[$k]['alias_post_name'] = $this->sub_str($v['post_name'],10);
            if($v['apply_num'] === null){
                $compete_order_list[$k]['compete_rate'] = '暂无';
            }
        }


        $order_zhaokao = array();
        foreach ($zhaokao_order_list as $k=>$value){
            $zhaokao_order_list[$k]['alias_post_name'] = $this->sub_str($value['post_name'],10);
            $order_zhaokao[$k]=$value['post_name'];
        }
        array_multisort($order_zhaokao,SORT_ASC,$zhaokao_order_list);
        $this->data['apply_order_list'] = $apply_order_list;
        $this->data['compete_order_list'] = $compete_order_list;
        $this->data['zhaokao_order_list'] = $zhaokao_order_list;
//        var_dump($this->data['system_config']);exit;
        $this->data['year'] = $search_year;
        $this->load_home_view('index',$this->data);

    }


    public function getAreaPing(){
        $this->load->helper(array('array'));
        $list = $this->common->home_list('post_table','area',"year<='2018'", 'area');
//        echo $this->common->get_last_query();
        foreach ($list as $item){
            echo "'".str_replace(' ','',pinyin($item['area']))."'".'=>array("'.$item['area'].'"),<br/>';
        }

//        echo '<pre/>';
//        var_export($list);exit;
    }


    /**
     * 基于PHP的 mb_substr，iconv_substr 这两个扩展来截取字符串，中文字符都是按1个字符长度计算；
     * 该函数仅适用于utf-8编码的中文字符串。
     *
     * @param  $str      原始字符串
     * @param  $length   截取的字符数
     * @param  $append   替换截掉部分的结尾字符串
     * @return 返回截取后的字符串
     */
    private  function sub_str($str, $length = 0, $append = '...') {
        $str = trim($str);
        $strlength = strlen($str);

        if ($length == 0 || $length >= $strlength) {
            return $str;
        } elseif ($length < 0) {
            $length = $strlength + $length;
            if ($length < 0) {
                $length = $strlength;
            }
        }

        if ( function_exists('mb_substr') ) {
            $newstr = mb_substr($str, 0, $length, 'utf-8');
        } elseif ( function_exists('iconv_substr') ) {
            $newstr = iconv_substr($str, 0, $length, 'utf-8');
        } else {
            //$newstr = trim_right(substr($str, 0, $length));
            $newstr = substr($str, 0, $length);
        }

        if ($append && $str != $newstr) {
            $newstr .= $append;
        }

        return $newstr;
    }
}