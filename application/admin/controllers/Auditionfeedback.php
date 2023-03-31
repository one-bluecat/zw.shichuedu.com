<?php
//417841136@qq.com ,one-bluecat

class Auditionfeedback extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('common'));
    }

    /**
     * 显示列表
     */
    public function index()
    {
        $this->load_view('auditionfeedback/index');
    }

    /**
     * 列表记录
     */
    public function lists()
    {
        $where = "1=1";
        $city = trim($this->input->get('city'));
        $city && $where = "(city like '%{$city}%')";

        $area =  trim($this->input->get('area'));
        $area && $where .=  $where ? " AND (area like '%{$area}%')":" (area like '%{$area}%')";

        $post_field  = 'id,city,area,audition_content,add_time';
        $limit = 25;
        $order_by = 'id desc';
        $data = $this->common->admin_page_list('audition_feedback', $limit, $where, $order_by,$post_field);
        $this->load_view('auditionfeedback/lists', $data);
    }

}