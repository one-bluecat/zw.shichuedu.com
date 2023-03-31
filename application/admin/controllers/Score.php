<?php

class Score extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('common'));
    }

    /**
     * 上传录取人员
     */
    public function pass_user_upload()
    {
        $this->load_view('score/pass_user_upload');
    }

    /**
     * 上传录取人员
     */
    public function do_pass_user_upload()
    {
		ini_set('memory_limit','4096M');
        set_time_limit(3600);
        ini_set('mysql.connect_timeout', 300);
        ini_set('default_socket_timeout', 300);

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'csv|xls|xlsx';
        if (!file_exists($config['upload_path'])) {
            mkdir($config['upload_path'], 777, true);
        }
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            $error = array('error' => $this->upload->display_errors());
            $this->load_view('score/pass_user_upload', array('msg' => $error['error']));
        } else {
            $data = array('upload_data' => $this->upload->data());
            $path = $data['upload_data']['full_path'];
            require APPPATH . '/libraries/PHPExcel.php';
            require APPPATH . '/libraries/PHPExcel/IOFactory.php';
            $extension = strtolower(pathinfo($path, PATHINFO_EXTENSION));
            if ($extension == 'xlsx') {
                $objReader = new PHPExcel_Reader_Excel2007();
                $objExcel = $objReader->load($path);
            } else if ($extension == 'xls') {
                $objReader = new PHPExcel_Reader_Excel5();
                $objExcel = $objReader->load($path);
            } else if ($extension == 'csv') {
                $PHPReader = new PHPExcel_Reader_CSV();
                //默认输入字符集
                $PHPReader->setInputEncoding('GBK');
                //默认的分隔符
                $PHPReader->setDelimiter(',');
                //载入文件
                $objExcel = $PHPReader->load($path);
            }
            $sheet = $objExcel->getSheet(0)->toArray();
            $sql_arr = array();
            $success = $total = 0;
            if ($sheet) {
                foreach ($sheet as $k => $v) {
                    if ($k > 0 && $v[0]) {
                        $total++;
                        $v = $this->_tostring($v);
                        $sql_arr[] = '(' . implode(',', $v) . ')';
                    }
                }
                if (!empty($sql_arr)) {
                    $sql_arr_string = implode(',', $sql_arr);
                }
                $success = $this->common->replace_pass_user($sql_arr_string);
            }
            $msg = "总条数:" . $total . ';成功条数:' . $success . ';失败条数:' . ($total - $success);
            $data['msg'] = $msg;
            $this->load_view('score/pass_user_upload', $data);
        }
    }

    public function pic()
    {
        $data = array();
        $this->load_view('score/pic', $data);
    }

    public function do_pic()
    {
        $error = array();
        $this->load->library('upload');
        $year = $this->input->post('year');
        $config['upload_path'] = './resources/static/home/img/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['overwrite'] = true;

        $config['file_name'] = $year . 'banner_history.jpg';
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('banner_file')) {
            $error['error2'] = $this->upload->display_errors();
        }

        $error_arr = array();

        if (isset($error['error2'])) {
            $error_arr[] = 'banner图片上传失败，失败原因:' . $error['error2'];
        }

        if (count($error_arr) > 0) {
            $this->load_view('score/pic', array('msg' => implode(';', $error_arr)));
        } else {
            $this->load_view('score/pic', array('msg' => '上传成功！'));
        }

    }

    /**
     * 全局配置
     */
    public function config()
    {
        $find = $this->common->get_one('system_config', 'id>0');
        $this->load_view('system/config', $find);
    }



    /**
     *短信列表
     */
    public function sms()
    {
        $this->load_view('score/sms');
    }

    public function smslists()
    {
        $where = "content like '%lscx%'";
        $phone = trim($this->input->post_get('phone'));
        $phone && $where .= $where ? " AND (phone like '%{$phone}%')" : " (phone like '%{$phone}%')";

        $username = trim($this->input->post_get('username'));
        $username && $where .= $where ? " AND (username like '%{$username}%')" : " (username like '%{$username}%')";


        $subject_study_section = trim($this->input->post_get('subject_study_section'));
        $subject_study_section && $where .= $where ? " AND (subject_study_section like '%{$subject_study_section}%')" : " (subject_study_section like '%{$subject_study_section}%')";

        $post_field = 'id,phone,username,content,send_time,subject_study_section';
        $limit = 25;
        $order_by = 'id desc';
        $data = $this->common->admin_page_list('sms_post', $limit, $where, $order_by, $post_field);

        foreach ($data['list'] as $k => $value) {
            $data['list'][$k]['send_time'] = date('Y-m-d H:i:s', $value['send_time']);
        }
        $is_export = $this->input->post_get('is_export');
        if ($is_export) {
            unset($data['list']);
            $data['list'] = $this->common->admin_list('sms_post',$post_field, "content like '%lscx%'", $order_by);
            foreach ($data['list'] as $k => $value) {
                $data['list'][$k]['send_time'] = date('Y-m-d H:i:s', $value['send_time']);
            }
        }
        if ($is_export) {
            $head = array(
                'username' => '姓名',
                'phone' => '手机号码',
                'subject_study_section' => '学科学段',
                'content' => '短信内容',
                'send_time' => '发送时间',
            );
            $this->_exportExcel($head, $data['list'], '分数系统发送短信', './uploads/excel/', true);
        }

        $this->load_view('score/smslists', $data);
    }



    private function _tostring($arr)
    {
        foreach ($arr as &$r) {
            $r = "'{$r}'";
        }
        return $arr;
    }
}
