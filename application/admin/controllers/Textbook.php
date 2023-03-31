<?php


class textbook extends MY_Controller
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
        $this->load_view('textbook/index');
    }

    /**
     * 列表记录
     */
    public function lists()
    {
        $where = "1=1";
        $city = trim($this->input->post_get('city'));
        $city && $where = "(city like '%{$city}%')";

        $area = trim($this->input->post_get('area'));
        $area && $where .= $where ? " AND (area like '%{$area}%')" : " (area like '%{$area}%')";

        $study_section = trim($this->input->post_get('study_section'));
        $study_section && $where .= $where ? " AND (study_section like '%{$study_section}%')" : " (study_section like '%{$study_section}%')";

        $subject = trim($this->input->post_get('subject'));
        $subject && $where .= $where ? " AND (subject like '%{$subject}%')" : " (subject like '%{$subject}%')";

        $post_field = 'id,city,area,study_section,subject,textbook_version';
        $limit = 25;
        $order_by = 'id desc';
        $data = $this->common->admin_page_list('textbook_version', $limit, $where, $order_by, $post_field);

        $city = array();
        foreach ($data['list'] as $k => $value) {
            $audition_info = $this->common->get_one('audition_content', "city='{$value['city']}' and area='{$value['area']}'");
            $data['list'][$k]['audition'] = $audition_info['audition'] ? $audition_info['audition'] : '';
            if (!$audition_info['audition']) {
                $city[$value['city']][] = $value['area'];
            }
        }
        $this->load_view('textbook/lists', $data);
    }


    /**
     * 反馈
     */
    public function user()
    {
        $this->load_view('textbook/user');
    }


    public function userlists()
    {
        $where = "1=1";

        $subject_study_section = trim($this->input->post_get('subject_study_section'));
        $subject_study_section && $where .= $where ? " AND (subject_study_section like '%{$subject_study_section}%')" : " (subject_study_section like '%{$subject_study_section}%')";

        $username = trim($this->input->post_get('username'));
        $username && $where .= $where ? " AND (username like '%{$username}%')" : " (username like '%{$username}%')";

        $phone = trim($this->input->post_get('phone'));
        $phone && $where .= $where ? " AND (phone like '%{$username}%')" : " (phone like '%{$phone}%')";


        $post_field = 'id,username,phone,subject_study_section,content,send_time';
        $limit = 25;
        $order_by = 'id desc';
        $data = $this->common->admin_page_list('sms_post', $limit, $where, $order_by, $post_field);

        foreach ($data['list'] as $k => $value) {
            $data['list'][$k]['send_time'] = date('Y-m-d H:i:s',$value['send_time']);
        }

//        echo $this->common->get_last_query();
//        var_export($data);
//        exit;

        $this->load_view('textbook/userlists',$data);
    }


    /**
     * 添加
     */
    public function add()
    {
        if ($data = $this->input->post()) {
            $data = array_filter($data);
            $data = array_map(function ($value) {
                return trim($value);
            }, $data);
            $city = str_replace('市', '', $data['city']);
            $where['city'] = $addData['city'] = $city;
            $where['area'] = $addData['area'] = $data['area'];
            $where['study_section'] = $addData['study_section'] = $data['study_section'];
            $where['subject'] = $addData['subject'] = $data['subject'];
            $addData['textbook_version'] = $data['textbook_version'];
            $find = $this->common->get_one('textbook_version', $where);
            if ($find) {
                $this->common->update('textbook_version', array('id' => $find['id']), $addData);
            } else {
                $this->common->insert('textbook_version', $addData);
            }
            $this->json(array('code' => 1, 'msg' => '添加成功！', 'url' => site_url('textbook/index')));
        } else {
            $this->load_view('textbook/add');
        }
    }


    /**编辑记录
     * @param null $id
     */

    public function edit($id = null)
    {
        if ($data = $this->input->post()) {
            $find = $this->common->get_one('textbook_version', "id ='{$data['id']}'");
            if (!$find) {
                $this->json(array('code' => 0, 'msg' => '记录不存在！'));
            }
            $update['textbook_version'] = $data['textbook_version'];
            $this->common->update('textbook_version', array('id' => $data['id']), $update);
            $this->json(array('code' => 1, 'msg' => '修改成功！', 'url' => site_url('textbook_version/index')));
        } else {
            $data = $this->common->get_one('textbook_version', array('id' => $id));
            $audition_info = $this->common->get_one('audition_content', "city='{$data['city']}' and area='{$data['area']}'");
            $data['audition'] = $audition_info['audition'] ? $audition_info['audition'] : '';
            $this->load_view('textbook/edit', $data, true);
        }
    }


    /**删除记录
     * @param $id
     */
    public function del($id)
    {
        $find = $this->common->get_one('textbook_version', array('id' => $id));
        if (!$find) {
            $this->json(array('code' => 0, 'msg' => '记录不存在！'));
        }
        $this->common->delete('textbook_version', array('id' => $find['id']));
        $this->json(array('code' => 1, 'msg' => '删除成功！', 'url' => site_url('textbook/index')));
    }


    public function do_textbook()
    {
//        set_time_limit(3600);
//        ini_set('mysql.connect_timeout', 300);
//        ini_set('default_socket_timeout', 300);
//
//        $config['upload_path'] = './uploads/';
//        $config['allowed_types'] = 'csv|xls|xlsx';
//        if (!file_exists($config['upload_path'])) {
//            mkdir($config['upload_path'], 777, true);
//        }
//        $this->load->library('upload', $config);
//
//        if (!$this->upload->do_upload('userfile')) {
//            $error = array('error' => $this->upload->display_errors());
//            $this->load_view('post/upload', array('msg'=>$error['error']));
//        } else {
//            $data = array('upload_data' => $this->upload->data());
//            $path = $data['upload_data']['full_path'];
        $path = './面试形式教材版本.xlsx';
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
        $sheet = $objExcel->getSheet(3)->toArray();
        if ($sheet) {
            foreach ($sheet as $k => $v) {
                if ($k > 0 && $v[0] && $k <= 6) {
                    for ($i = 3; $i <= 15; $i++) {
                        $insertData['study_section'] = $v[0];
                        $insertData['city'] = $v[1];
                        $insertData['area'] = $v[2];
                        $insertData['subject'] = $sheet[0][$i];
                        $insertData['textbook_version'] = $sheet[$k][$i];
                        $this->common->insert('textbook_version', $insertData);
                    }
//                        $this->common->insert('audition_content',$insertData);
                }
            }
        }
//                if (!empty($sql_arr)) {
//                    $sql_arr_string = implode(',', $sql_arr);
//                }
//                $success = $this->common->replace_audition($sql_arr_string);
//            }
//            $msg = "总条数:" . $total . ';成功条数:' . $success . ';失败条数:' . ($total - $success - $chonfu) . ';重复条数:' . $chonfu;
//            $data['msg'] = $msg;
//            $this->load_view('post/audition_uploads', $data);
//        }
    }
}