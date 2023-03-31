<?php


class Textbookfeedback extends MY_Controller
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
        $this->load_view('textbookfeedback/index');
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

        $study_section =  trim($this->input->get('study_section'));
        $study_section && $where .=  $where ? " AND (study_section like '%{$study_section}%')":" (study_section like '%{$study_section}%')";

        $subject =  trim($this->input->get('subject'));
        $subject && $where .=  $where ? " AND (subject like '%{$subject}%')":" (subject like '%{$subject}%')";

        $post_field  = 'id,city,area,subject,add_time,study_section,textbook_version';
        $limit = 25;
        $order_by = 'id desc';
        $data = $this->common->admin_page_list('textbook_feedback', $limit, $where, $order_by,$post_field);
        $this->load_view('textbookfeedback/lists', $data);
    }

}