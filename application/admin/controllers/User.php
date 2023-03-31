<?php


class User extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('common', 'admin'));
    }


    public function index()
    {
        $this->load_view('user/index');
    }


    public function lists()
    {
        $where = array();
        $limit = 25;
        $order_by = 'id desc';
        $data = $this->common->admin_page_list('admin', $limit, $where, $order_by,'id,username,login_times,last_login_time,last_login_ip,create_time');
        $this->load_view('user/lists', $data);
    }

    public function add()
    {
        if ($data = $this->input->post()) {
            $data = array_map(function ($value){
                return trim($value);
            },$data);
            $find = $this->common->get_one('admin', array('username' => $data['username']));
            if ($find) {
                $this->json(array('code' => 0, 'msg' => '用户已存在！'));
            }
            $password = $this->admin->hash($data['password']);
            $addData['username'] = $data['username'];
            $addData['password'] = $password;
            $addData['create_time'] = date('Y-m-d H:i:s');
            $this->common->insert('admin', $addData);
            $this->json(array('code' => 1, 'msg' => '添加成功！', 'url' => site_url('user/index')));
        } else {
            $this->load_view('user/add');
        }
    }

    public function edit($id = null)
    {
        if ($data = $this->input->post()) {

            if (!$this->common->get_one('admin', "id ='{$data['id']}'")) {
                $this->json(array('code' => 0, 'msg' => '记录不存在！'));
            }

            $find = $this->common->get_one('admin', "username='{$data['username']}' and id !='{$data['id']}'");
            if ($find) {
                $this->json(array('code' => 0, 'msg' => '用户已存在,请更换一个用户名！'));
            }
            $password = $this->admin->hash($data['password']);
            $this->common->update('admin', array('id' => $data['id']), array('password' => $password, 'username' => $data['username']));
            $this->json(array('code' => 1, 'msg' => '修改成功！', 'url' => site_url('user/index')));
        } else {
            $data = $this->common->get_one('admin', array('id' => $id));
            $this->load_view('user/edit', $data, true);
        }
    }


    public function del($id)
    {
        $find = $this->common->get_one('admin', array('id' => $id));
        if (!$find) {
            $this->json(array('code' => 0, 'msg' => '用户不存在！'));
        }
        $this->common->delete('admin', array('id' => $find['id']));
        $this->json(array('code' => 1, 'msg' => '删除成功！', 'url' => site_url('user/index')));
    }
}