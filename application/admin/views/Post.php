<?php


class post extends MY_Controller
{
    private $city = array(
        "3401" => '合肥市',
        "3402" => '芜湖市',
        "3403" => '蚌埠市',
        "3404" => '淮南市',
        "3405" => '马鞍山市',
        "3406" => '淮北市',
        "3407" => '铜陵市',
        "3408" => '安庆市',
        "3410" => '黄山市',
        "3411" => '滁州市',
        "3412" => '阜阳市',
        "3413" => '宿州市',
        "3415" => '六安市',
        "3416" => '亳州市',
        "3417" => '池州市',
        "3418" => '宣城市',
    );
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('common'));
    }

    /**
     * 显示职位列表
     */
    public function index()
    {
        $this->load_view('post/index');
    }


    /**
     * 职位列表记录
     */
    public function lists()
    {
        $where = "1=1";

        $company = $this->input->post_get('company');
        $company && $where = "(company like '%{$company}%')";

        $post_name = $this->input->post_get('post_name');
        $post_name && $where .=  $where ? " AND (post_name like '%{$post_name}%')":" (post_name like '%{$post_name}%')";


        $post_code = $this->input->post_get('post_code');
        $post_code && $where .=  $where ?  " AND (post_code like '%{$post_code}%')" : "(post_code like '%{$post_code}%')"  ;

        $study_section = $this->input->post_get('study_section');
        $study_section && $where .=  $where ?  " AND (study_section like '%{$study_section}%')" : " (study_section like '%{$study_section}%')";

        $profession = $this->input->post_get('profession');
        $profession &&  $where .=  $where ? " AND (profession like '%{$profession}%')" : " (profession like '%{$profession}%')" ;

        $teacher_qualification = $this->input->post_get('teacher_qualification');
        $teacher_qualification && $where .=  $where ? " AND (teacher_qualification like '%{$profession}%')" : " (teacher_qualification like '%{$profession}%')" ;

        $post_field  = 'id,year,company,post_name,post_code,study_section,subject,num,apply_num,pass_num,pay_num,compete_rate,profession,teacher_qualification';
        $limit = 25;
        $order_by = 'id desc';
        $data = $this->common->admin_page_list('post_table', $limit, $where, $order_by,$post_field);
        $data['city'] = $this->city;
        $this->load_view('post/lists', $data);
    }


    /**编辑职位记录
     * @param null $id
     */

    public function edit($id = null)
    {
        if ($data = $this->input->post()) {
            $find = $this->common->get_one('post_table', "id ='{$data['id']}'");
            if (!$find) {
                $this->json(array('code' => 0, 'msg' => '记录不存在！'));
            }
            $update['apply_num'] = $data['apply_num'];
            $update['pass_num'] = $data['pass_num'];
            $update['pay_num'] = $data['pay_num'];
            $update['compete_rate'] = $data['compete_rate'];
            $this->common->update('post_table', array('id' => $data['id']), $update);
            $this->json(array('code' => 1, 'msg' => '修改成功！', 'url' => site_url('reg/index')));
        } else {
            $data = $this->common->get_one('post_table', array('id' => $id));
            $this->load_view('post/edit', $data, true);
        }
    }


    /**删除职位记录
     * @param $id
     */
    public function del($id)
    {
        $find = $this->common->get_one('post_table', array('id' => $id));
        if (!$find) {
            $this->json(array('code' => 0, 'msg' => '记录不存在！'));
        }
        $this->common->delete('post_table', array('id' => $find['id']));
        $this->json(array('code' => 1, 'msg' => '删除成功！', 'url' => site_url('post/index')));
    }



    /**
     * 上传职位记录
     */
    public function uploads(){
        $this->load_view('post/upload');
    }

    /**
     * 上传职位
     */
    public function do_upload(){
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
            $this->load_view('post/upload', array('msg'=>$error['error']));
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
            $chonfu = $error = $success = $total = 0;
            if ($sheet) {
                foreach ($sheet as $k => $v) {
                    var_export($v);
                    if ($k > 0 && $v[0]) {
                        $total++;
                        $find = $this->common->get_one('post_table',array('year'=>$v['0'],'post_code'=>$v[5]));
                        $find['id'] && $chonfu++;
                        $v = $this->_tostring($v);
                        $sql_arr[] = '(' . implode(',', $v) . ')';
                    }
                }
                if (!empty($sql_arr)) {
                    $sql_arr_string = implode(',', $sql_arr);
                }
                $success = $this->common->replace_post($sql_arr_string);
            }
            $msg = "总条数:" . $total . ';成功条数:' . $success . ';失败条数:' . ($total - $success - $chonfu) . ';重复条数:' . $chonfu;
            $data['msg'] = $msg;
            $this->load_view('post/upload', $data);
        }
    }


    private function _tostring($arr)
    {
        foreach ($arr as &$r) {
            $r = "'{$r}'";
        }
        return $arr;
    }

    /**
     * 全局配置
     */
    public function config()
    {
        if ($data = $this->input->post()) {
            $find = $this->common->get_one('system_config','id>0');
            if ($find) {
                $this->common->update('system_config', array('id' => $find['id']), array('year' => $data['config']['year'], 'last_update_time' => date('Y-m-d H:i:s')));
            } else {
                $this->common->insert('system_config', array('year' => $data['config']['year'], 'add_time' => date('Y-m-d H:i:s'), 'last_update_time' => date('Y-m-d H:i:s')));
            }
            $this->json(array('code' => 0, 'msg' => '保存成功！'));
        }
        $find = $this->common->get_one('system_config','id>0');
        $this->load_view('system/config',$find);
    }

    /**
     * 面试形式和教材版本
     */
    public function audition_uploads(){
        $this->load_view('post/audition_uploads');
    }

    /**处理面试形式和教材版本
     * @throws PHPExcel_Exception
     * @throws PHPExcel_Reader_Exception
     */
    public function do_audition_uploads(){
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
            $this->load_view('post/upload', array('msg'=>$error['error']));
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
            $chonfu = $error = $success = $total = 0;
            if ($sheet) {
                foreach ($sheet as $k => $v) {
                    if ($k > 0 && $v[0]) {
                        $total++;
                        $find = $this->common->get_one('audition_content',array('city'=>$v[0],'area'=>$v[1],'study_section'=>$v[2],'subject'=>$v[3]));
                        $find['id'] && $chonfu++;
                        $v = $this->_tostring($v);
                        $sql_arr[] = '(' . implode(',', $v) . ')';
                    }
                }
                if (!empty($sql_arr)) {
                    $sql_arr_string = implode(',', $sql_arr);
                }
                $success = $this->common->replace_audition($sql_arr_string);
            }
            $msg = "总条数:" . $total . ';成功条数:' . $success . ';失败条数:' . ($total - $success - $chonfu) . ';重复条数:' . $chonfu;
            $data['msg'] = $msg;
            $this->load_view('post/audition_uploads', $data);
        }
    }


    /**
     * 职位首页图片上传
     */
    public function pic(){
        $data = array();
        $this->load_view('post/pic', $data);
    }

    /**
     * 职位首页图片上传
     */
    public function do_pic(){
        $error = array();
        $this->load->library('upload');
        $year = $this->input->post('year');
        $config['upload_path'] = './resources/static/home/img/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['overwrite'] = true;

        $config['file_name'] =$year.'banner.jpg';
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('banner_file')) {
            $error['error2'] = $this->upload->display_errors();
        }
        $error_arr = array();

        if(isset($error['error2'])){
            $error_arr[] = 'banner图片上传失败，失败原因:'.$error['error2'];
        }
        if(count($error_arr)>0){
            $this->load_view('post/pic', array('msg'=>implode(';',$error_arr)));
        }else{
            $this->load_view('post/pic', array('msg'=>'上传成功！'));
        }

    }


    /**
     * 核减人员
     */
    public function cut(){
        $this->load_view('post/cut');
    }

    public function do_cut(){
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
            $this->load_view('post/upload', array('msg'=>$error['error']));
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
            $chonfu = $error = $success = $total = 0;
            if ($sheet) {
                foreach ($sheet as $k => $v) {
                    if ($k > 0 && $v[0]) {
                        $total++;
                        $find = $this->common->get_one('post_cut',array('year'=>$v[0],'post_code'=>$v[1]));
                        $find['id'] && $chonfu++;
                        $v = $this->_tostring($v);
                        $sql_arr[] = '(' . implode(',', $v) . ')';
                    }
                }
                if (!empty($sql_arr)) {
                    $sql_arr_string = implode(',', $sql_arr);
                }
                $success = $this->common->replace_cut($sql_arr_string);
            }
            $msg = "总条数:" . $total . ';成功条数:' . $success . ';失败条数:' . ($total - $success - $chonfu) . ';重复条数:' . $chonfu;
            $data['msg'] = $msg;
            $this->load_view('post/cut', $data);
        }
    }


    /**
     *短信列表
     */
    public function sms()
    {
        $this->load_view('post/sms');
    }

    public function smslists()
    {
        $where = "content like '%kscx%'";
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
            $data['list'] = $this->common->admin_list('sms_post',$post_field, "content like '%kscx%'", $order_by);
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
            $this->_exportExcel($head, $data['list'], '职位系统发送短信', './uploads/excel/', true);
        }

        $this->load_view('post/smslists', $data);
    }


    /**
     * 最新更新时间
     */
    public  function updatetime(){
        $this->load_view('post/updatetime');
    }

    public  function updatetime_lists(){
        $post_field = 'id,year,updatetime';
        $limit = 25;
        $order_by = 'id desc';
        $data = $this->common->admin_page_list('updatetime', $limit, "1=1", $order_by, $post_field);
        $this->load_view('post/updatetime_lists', $data);
    }

    public function add_updatetime(){
        if ($data = $this->input->post()) {
            $data = array_filter($data);
            $data = array_map(function ($value) {
                return trim($value);
            }, $data);
            $addData['year'] = $data['year'];
            $addData['updatetime'] = $data['updatetime'];
            $this->common->insert('updatetime', $addData);
            $this->json(array('code' => 1, 'msg' => '添加成功！', 'url' => site_url('post/updatetime')));
        } else {
            $this->load_view('post/add_updatetime');
        }
    }

    public function edit_updatetime($id = null){
        if ($data = $this->input->post()) {
            $find = $this->common->get_one('updatetime', "id ='{$data['id']}'");
            if (!$find) {
                $this->json(array('code' => 0, 'msg' => '记录不存在！'));
            }
            $update['updatetime'] = $data['updatetime'];
            $this->common->update('updatetime', array('id' => $data['id']), $update);
            $this->json(array('code' => 1, 'msg' => '修改成功！', 'url' => site_url('post/updatetime')));
        } else {
            $data = $this->common->get_one('updatetime', array('id' => $id));
            $this->load_view('post/edit_updatetime', $data, true);
        }
    }

    public function del_updatetime($id){
        $find = $this->common->get_one('updatetime', array('id' => $id));
        if (!$find) {
            $this->json(array('code' => 0, 'msg' => '记录不存在！'));
        }
        $this->common->delete('updatetime', array('id' => $find['id']));
        $this->json(array('code' => 1, 'msg' => '删除成功！', 'url' => site_url('post/updatetime')));
    }


}