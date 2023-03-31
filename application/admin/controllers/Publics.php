<?php


class Publics extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        error_reporting(E_ALL & ~E_NOTICE);
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model(array('common', 'admin'));
    }


    public function login()
    {
        if ($this->input->method() == 'post') {
            $data = $this->input->post();
            $username = $data['username'];
            $password = $data['password'];

            $userinfo = $this->common->get_one('admin',array('username' => $username));
            if (!$userinfo) {
                $this->json(array('code' => 0, 'msg' => '用户不存在！'));
            }

            $hash = $userinfo['password'];
            //校验密码
            $check = $this->admin->check($password, $hash);
            if (!$check) {
                $this->json(array('code' => 0, 'msg' => '密码不正确！'));
            }
            $this->session->set_userdata('user', json_encode($userinfo));

            $update['last_login_time'] = date('Y-m-d H:i:s');
            $update['last_login_ip'] = $this->getIp();
            $update['login_times'] = intval($userinfo['login_times']) + 1;
            //更新登录信息
            $this->common->update('admin', array('id' => $userinfo['id']),$update);
            $this->json(array('code' => 1, 'msg' => '登录成功！', 'url' => site_url('/index/home')));
        } else {
            $this->load->view('login');
        }
    }


    public function logout()
    {
        $this->session->unset_userdata('user');
        redirect('/publics/index/');
    }


    public function _remap()
    {
        $this->login();
    }


    /**输出json格式数据
     * @param $data
     */

    protected function json($data)
    {
        exit(json_encode($data));
    }


    private function getIp()
    {
        if (getenv('HTTP_X_FORWARDED_FOR')) {
            $ip = getenv("HTTP_X_FORWARDED_FOR");
        } else if (getenv("REMOTE_ADDR")) {
            $ip = getenv("REMOTE_ADDR");
        } else if (isset($_COOKIE['Real_IP'])) {
            $ip = $_COOKIE['Real_IP'];
        } else if (getenv("HTTP_CLIENT_IP")) {
            $ip = getenv("HTTP_CLIENT_IP");
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

}