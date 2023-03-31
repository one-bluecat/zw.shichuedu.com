<?php


class feedback extends MY_Controller
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
        $this->load_view('feedback/index');
    }


    /**
     * 列表记录
     */
    public function lists()
    {
        $audition_info= $this->common->get_one('audition_content',"id=".$_REQUEST['id']);
        $where = "audition_id=".$_REQUEST['id'];
        $post_field  = 'id,audition_id,audition_content,textbook_version,add_time';
        $data = array();
        $list = $this->common->admin_list('audition_feedback', $post_field,$where);
        foreach ($list as &$v){
            $v['city'] = $audition_info['city'];
            $v['area'] = $audition_info['area'];
            $v['study_section'] = $audition_info['study_section'];
            $v['subject'] = $audition_info['subject'];
        }
        $data['list'] = $list;
//        var_export($this->common->get_last_query());
//        var_export($_REQUEST);
//        var_export($data);
//        exit;
        $this->load_view('feedback/lists', $data);
    }
}