<?php

//417841136@qq.com ,one-bluecat
class audition extends MY_Controller
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
        $this->load_view('audition/index');
    }

    /**
     * 列表记录
     */
    public function lists()
    {
        $where = "1=1";
        $city = trim($this->input->post_get('city'));
        $city && $where = "(city like '%{$city}%')";

        $area =  trim($this->input->post_get('area'));
        $area && $where .=  $where ? " AND (area like '%{$area}%')":" (area like '%{$area}%')";

        $post_field  = 'id,city,area,audition';
        $limit = 25;
        $order_by = 'id desc';
        $data = $this->common->admin_page_list('audition_content', $limit, $where, $order_by,$post_field);
        $this->load_view('audition/lists', $data);
    }


    /**
     * 添加
     */
    public function add()
    {
        if ($data = $this->input->post()) {
            $data = array_filter($data);
            $data = array_map(function ($value){
                return trim($value);
            },$data);
            $city = str_replace('市','',$data['city']);
            $where['city'] = $addData['city'] = $city;
            $where['area'] = $addData['area'] =$data['area'];
            $addData['audition'] = $data['audition'];
            $find = $this->common->get_one('audition_content', $where);
            if ($find) {
                $this->common->update('audition_content', array('id' => $find['id']), $addData);
            }else{
                $this->common->insert('audition_content', $addData);
            }
            $this->json(array('code' => 1, 'msg' => '添加成功！', 'url' => site_url('audition/index')));
        } else {
            $this->load_view('audition/add');
        }
    }

    /**编辑记录
     * @param null $id
     */

    public function edit($id = null)
    {
        if ($data = $this->input->post()) {
            $find = $this->common->get_one('audition_content', "id ='{$data['id']}'");
            if (!$find) {
                $this->json(array('code' => 0, 'msg' => '记录不存在！'));
            }
            $update['audition'] = $data['audition'];
            $this->common->update('audition_content', array('id' => $data['id']), $update);
            $this->json(array('code' => 1, 'msg' => '修改成功！', 'url' => site_url('audition/index')));
        } else {
            $data = $this->common->get_one('audition_content', array('id' => $id));
            $this->load_view('audition/edit', $data, true);
        }
    }


    /**删除记录
     * @param $id
     */
    public function del($id)
    {
        $find = $this->common->get_one('audition_content', array('id' => $id));
        if (!$find) {
            $this->json(array('code' => 0, 'msg' => '记录不存在！'));
        }
        $this->common->delete('audition_content', array('id' => $find['id']));
        $this->json(array('code' => 1, 'msg' => '删除成功！', 'url' => site_url('audition/index')));
    }

}