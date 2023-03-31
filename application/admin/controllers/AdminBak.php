<?php
//417841136@qq.com ,one-bluecat
class Admin extends CI_Controller
{

    private $proviceMap = array(
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
        error_reporting(E_ALL & ~E_NOTICE);
        $this->load->model('score');
        $this->check_login();
    }


    public function check_login()
    {
        // 检查变量 $PHP_AUTH_USER 和$PHP_AUTH_PW 的值
//        var_export($_SERVER['PHP_AUTH_USER']);
//        var_export($_SERVER['PHP_AUTH_USER']);
        if ((!isset($_SERVER['PHP_AUTH_PW'])) || (!isset($_SERVER['PHP_AUTH_PW']))) {
            // 空值：发送产生显示文本框的数据头部
            header('WWW-Authenticate: Basic realm="My Private Stuff"');
            header('HTTP/1.0 401 Unauthorized');
            echo 'Authorization Required.';
            exit;
        } else if ((isset($_SERVER['PHP_AUTH_USER'])) && (isset($_SERVER['PHP_AUTH_PW']))) {
            // 变量值存在，检查其是否正确
            if (($_SERVER['PHP_AUTH_USER'] != "shichujiaoyu") || ($_SERVER['PHP_AUTH_PW'] != "shichujiaoyu@2018")) {
                // 用户名输入错误或密码输入错误，发送产生显示文本框的数据头部
                header('WWW-Authenticate: Basic realm="My Private Stuff"');
                header('HTTP/1.0 401 Unauthorized');
                echo 'Authorization Required.';
                exit;
            } else if (($_SERVER['PHP_AUTH_USER'] == "shichujiaoyu") || ($_SERVER['PHP_AUTH_PW'] == "shichujiaoyu@2018")) {
//                        // 用户名及密码都正确
            }
        }
    }

    public function index($is_export = 0, $is_all_export = 0)
    {
        $data = array();
        $where = array();

        $where = "";
        $post_code = $this->input->get('post_code');
        $post_code && $where = "post_code='{$post_code}'";
        $searchArr['post_code'] = $post_code ? $post_code : '';

        $name = $this->input->get('name');
        $name && $where .= $where ? " AND name='{$name}'" : "name='{$name}'";
        $searchArr['name'] = $name ? $name : '';

        $phone = $this->input->get('phone');
        $phone && $where .= $where ? " AND phone='{$phone}'" : " phone='{$phone}'";
        $searchArr['phone'] = $phone ? $phone : '';

        $status = $this->input->get('status');
        if ($status) {
            $status == 2 && $status = 0;
            $where .= $where ? " AND status='{$status}'" : "status='{$status}'";
        }

        $post_data = $this->score->post_list();
        if ($post_data) {
            foreach ($post_data as $r) {
                $post_arr[$r['post_code']] = $r;
            }
        }
        $page = intval($this->input->get("per_page"));
        $per_page = 25;
        $page = $page ? $page : 1;
        $offset = ($page - 1) * $per_page;
        $list = $this->score->reg_list_page($offset, $per_page, $where);
        $this->load->library('pagination');
        $config['uri_segment'] = 3;
        $config['num_links'] = 5;
        $config['use_page_numbers'] = TRUE;
        $config['full_tag_open'] = '<ul>';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="prev disabled">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last ';
        $config['last_tag_open'] = '<li class="next disabled">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = 'Next → ';
        $config['next_tag_open'] = '<li class="next">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '← Previous';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['page_query_string'] = TRUE;
        $base_url = '/admin/index?' . http_build_query($searchArr);
        $config['base_url'] = $base_url;         //地址路径
        $config['total_rows'] = $this->score->reg_total($where);                               //总的内容 条数
        $config['per_page'] = 25;

        //每页显示数量，默认显示25条
        $this->pagination->initialize($config);                  //加载配置信息
        $data['page'] = $this->pagination->create_links();
        $data['total_rows'] = $config['total_rows'];

        if ($is_all_export) {
            unset($list['list']);
            $list['list'] = $this->score->reg_all();
        }

        $reg_arr = array();
        if ($list['list']) {
            foreach ($list['list'] as $r) {
                $temp = array();
                $temp['id'] = $r['id'];
                if ($is_export) {
                    $temp['city'] = $this->proviceMap[substr($r['post_code'],0, 4)];
                }
                $temp['post_code'] = $r['post_code'];
                $temp['name'] = $r['name'];
                $temp['phone'] = $r['phone'];
                $temp['area'] = $post_arr[$r['post_code']]['area'];
                $temp['company'] = $post_arr[$r['post_code']]['company'];
                $temp['study_section'] = $post_arr[$r['post_code']]['study_section'];
                $temp['subject'] = $post_arr[$r['post_code']]['subject'];
                $temp['score'] = $r['score'];
                if ($r['status']) {
                    $temp['status'] = $is_export ? '已审核' : '<span style="color: green">已审核</span>';
                } else {
                    $temp['status'] = $is_export ? '未审核' : '<span style="color: red">未审核</span>';
                }
                $temp['reg_time'] = $r['reg_time'];
                $reg_arr[] = $temp;
            }

        }

        if ($is_export) {
            $head = array(
                'id' => 'ID',
                'city' => '所属市',
                'post_code' => '岗位代码',
                'name' => '姓名',
                'phone' => '手机号码',
                'area' => '地区',
                'company' => '招聘单位',
                'study_section' => '学段',
                'subject' => '学科',
                'score' => '笔试成绩',
                'status' => '审核状态',
                'reg_time' => '注册时间',
            );
            $this->_exportExcel($head, $reg_arr, '用户信息表', './uploads/excel/', true);
        }

        $total_reg_num = $this->score->reg_total();
        $add_reg_info = $this->score->getOneAddRegNum();
        $data['list'] = $reg_arr;
        $data['total_reg_num'] = $total_reg_num;
        $data['add_reg_num'] = $add_reg_info['num'];
        $this->load->view('admin_page', $data);
    }

    /**
     * 修改用户
     */
    public function edit()
    {
        $post = $this->input->post();
        $updataData['post_code'] = $post['post_code'];
        $updataData['name'] = $post['name'];
        $updataData['phone'] = $post['phone'];
        $updataData['score'] = $post['score'];
        $updataData['status'] = $post['status'];
        $updataData['reg_time'] = $post['reg_time'];
        $find = $this->score->check_post_code($updataData['post_code']);
        if (!$find[0]['post_code']) {
            exit(json_encode(array('status' => 1, 'msg' => '岗位代码无效')));
        }
        $result = $this->score->update_reg($post['id'], $updataData);
        $result || exit(json_encode(array('status' => 0, 'msg' => '更新失败')));
        $result && exit(json_encode(array('status' => 1, 'msg' => '更新成功')));
    }


    /**
     * 删除用户
     */

    public function del()
    {
        $id = $this->input->post('id');
        $result = $this->score->del_reg($id);
        $result || exit(json_encode(array('status' => 0, 'msg' => '删除失败')));
        $result && exit(json_encode(array('status' => 1, 'msg' => '删除成功')));
    }


    /**
     * 批量审核
     */
    public function batch_audiit()
    {
        $id = $_POST['ids'];
        $id_arr = explode(',', $id);
        $updataData['status'] = $_POST['status'];
        $result = $this->score->update_reg($id_arr, $updataData);
        $result || exit(json_encode(array('status' => 0, 'msg' => '批量审核失败！')));
        $result && exit(json_encode(array('status' => 1, 'msg' => '批量审核成功！')));
    }


    /**
     * 增加提交人数
     */

    public function add_reg_num()
    {
        $add_reg_num = intval(trim($_POST['add_reg_num']));
        $info = $this->score->getOneAddRegNum();
        if ($info['id']) {
            $result = $this->score->edit_add_reg_num($info['id'], array('num' => $add_reg_num));
        } else {
            $result = $this->score->add_reg_num(array('num' => $add_reg_num));
        }
        $result || exit(json_encode(array('status' => 0, 'msg' => '修改失败！')));
        $result && exit(json_encode(array('status' => 1, 'msg' => '修改成功！')));
    }


    /**
     *  岗位代码
     */
    public function post()
    {
        $page = intval($this->input->get("per_page"));
        $data = array();
        $where = "";
        $province = $this->input->get('province');
        $province && $where = "(province like '%{$province}%')";
        $searchArr['province'] = $province ? $province : '';

        $area = $this->input->get('area');
        $area && $where .= $where ? " AND (area like '%{$area}%')" : "(area like '%{$area}%')";
        $searchArr['area'] = $area ? $area : '';

        $company = $this->input->get('company');
        $company && $where .= $where ? " AND (company like '%{$company}%')" : "(company like '%{$company}%')";
        $searchArr['company'] = $company ? $company : '';

        $post_name = $this->input->get('post_name');
        $post_name && $where .= $where ? " AND (post_name like '%{$post_name}%')" : "(post_name like '%{$post_name}%')";
        $searchArr['post_name'] = $post_name ? $post_name : '';

        $post_code = $this->input->get('post_code');
        $post_code && $where .= $where ? " AND (post_code like '%{$post_code}%')" : "(post_code like '%{$post_code}%')";
        $searchArr['post_code'] = $post_code ? $post_code : '';

        $study_section = $this->input->get('study_section');
        $study_section && $where .= $where ? " AND (study_section like '%{$study_section}%')" : "(study_section like '%{$study_section}%')";
        $searchArr['study_section'] = $study_section ? $study_section : '';

        $subject = $this->input->get('subject');
        $subject && $where .= $where ? " AND (subject like '%{$subject}%')" : "(subject like '%{$subject}%')";
        $searchArr['subject'] = $subject ? $subject : '';

        $num = $this->input->get('num');
        $num && $where .= $where ? " AND (num = {$num})" : "(num = {$num})";
        $searchArr['num'] = $num ? $num : '';

        $single_plan = $this->input->get('single_plan');
        $single_plan && $where .= $where ? " AND (single_plan like '%{$single_plan}%')" : "(single_plan like '%{$single_plan}%')";
        $searchArr['single_plan'] = $single_plan ? $single_plan : '';

        $degree = $this->input->get('degree');
        $degree && $where .= $where ? " AND (degree like '%{$degree}%')" : "(degree like '%{$degree}%')";
        $searchArr['degree'] = $degree ? $degree : '';

        $is_need_degree = $this->input->get('is_need_degree');
        $is_need_degree && $where .= $where ? " AND (is_need_degree like '%{$is_need_degree}%')" : "(is_need_degree like '%{$is_need_degree}%')";
        $searchArr['is_need_degree'] = $is_need_degree ? $is_need_degree : '';

        $age = $this->input->get('age');
        $age && $where .= $where ? " AND (age like '%{$age}%')" : "(age like '%{$age}%')";
        $searchArr['age'] = $age ? $age : '';

        $profession = $this->input->get('profession');
        $profession && $where .= $where ? " AND (profession like '%{$profession}%')" : "(profession like '%{$profession}%')";
        $searchArr['profession'] = $profession ? $profession : '';

        $teacher_qualification = $this->input->get('teacher_qualification');
        $teacher_qualification && $where .= $where ? " AND (teacher_qualification like '%{$teacher_qualification}%')" : "(teacher_qualification like '%{$teacher_qualification}%')";
        $searchArr['teacher_qualification'] = $teacher_qualification ? $teacher_qualification : '';

        $per_page = 25;
        $page = $page ? $page : 1;
        $offset = ($page - 1) * $per_page;
        $list = $this->score->post_list_page($offset, $per_page, $where);
        $this->load->library('pagination');
        $config['uri_segment'] = 3;
        $config['num_links'] = 5;
        $config['use_page_numbers'] = TRUE;
        $config['full_tag_open'] = '<ul>';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="prev disabled">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last ';
        $config['last_tag_open'] = '<li class="next disabled">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = 'Next → ';
        $config['next_tag_open'] = '<li class="next">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '← Previous';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['page_query_string'] = TRUE;
        $base_url = '/admin/post?' . http_build_query($searchArr);
        $config['base_url'] = $base_url;         //地址路径
        $config['total_rows'] = $this->score->post_total($where);                               //总的内容 条数
        $config['per_page'] = 25;

        //每页显示数量，默认显示25条
        $this->pagination->initialize($config);                  //加载配置信息
        $data['page'] = $this->pagination->create_links();
        $data['total_rows'] = $config['total_rows'];
        $arr = array();
        foreach ($list['list'] as $r) {
            $temp = array();
            $temp['id'] = $r['id'];
            $temp['province'] = $r['province'];
            $temp['area'] = $r['area'];
            $temp['company'] = $r['company'];
            $temp['post_name'] = $r['post_name'];
            $temp['post_code'] = $r['post_code'];
            $temp['study_section'] = $r['study_section'];
            $temp['subject'] = $r['subject'];
            $temp['num'] = $r['num'];
            $temp['single_plan'] = $r['single_plan'];
            $temp['degree'] = $r['degree'];
            $temp['is_need_degree'] = $r['is_need_degree'];
            $temp['age'] = $r['age'];
            $temp['profession'] = $r['profession'];
            $temp['teacher_qualification'] = $r['teacher_qualification'];
            $temp['memo'] = $r['memo'];
            $arr[] = $temp;
        }
        $data['list'] = $arr;
        $this->load->view('post_page', $data);
    }


    /**
     * 删除岗位代码
     */

    public function post_edit()
    {
        $post = $this->input->post();
        $id = $post['id'];
        unset($post['id']);
        $find = $this->score->check_post_code($post['post_code']);
        if (!$find[0]['post_code']) {
            exit(json_encode(array('status' => 1, 'msg' => '岗位代码无效')));
        }
        $result = $this->score->update_post($id, $post);
        $result || exit(json_encode(array('status' => 0, 'msg' => '更新失败')));
        $result && exit(json_encode(array('status' => 1, 'msg' => '更新成功')));
    }


    /**
     * 删除岗位代码
     */

    public function post_del()
    {
        $id = $this->input->post('id');
        $result = $this->score->del_post($id);
        $result || exit(json_encode(array('status' => 0, 'msg' => '删除失败')));
        $result && exit(json_encode(array('status' => 1, 'msg' => '删除成功')));
    }

    /**
     * 岗位代码上传
     */
    public function import_post()
    {
        $this->load->view('upload_form');
    }

    /**
     * 岗位代码上传
     */
    public function do_upload()
    {
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
            $this->load->view('upload_form', $error);
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
                        $find = $this->score->check_post_code($v[4]);
                        $find[0]['id'] && $chonfu++;
                        $v = $this->_tostring($v);
                        $sql_arr[] = '(' . implode(',', $v) . ')';
                    }
                }
                if (!empty($sql_arr)) {
                    $sql_arr_string = implode(',', $sql_arr);
                }
                $success = $this->score->replace_post($sql_arr_string);
            }
            $msg = "总条数:" . $total . ';成功条数:' . $success . ';失败条数:' . ($total - $success - $chonfu) . ';重复条数:' . $chonfu;
            $data['msg'] = $msg;
            $this->load->view('upload_success', $data);
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
     * 数据导出
     * @param array $title 标题行名称
     * @param array $data 导出数据
     * @param string $fileName 文件名
     * @param string $savePath 保存路径
     * @param $type   是否下载  false--保存   true--下载
     * @return string   返回文件全路径
     * @throws PHPExcel_Exception
     * @throws PHPExcel_Reader_Exception
     */
    private function _exportExcel($title = array(), $data = array(), $fileName = '', $savePath = './', $isDown = false)
    {
        ini_set("max_execution_time", "1800");
        ini_set('memory_limit', '1024M');
        require APPPATH . '/libraries/PHPExcel.php';
        require APPPATH . '/libraries/PHPExcel/IOFactory.php';
        $obj = new PHPExcel();

        //横向单元格标识
        $cellName = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM', 'AN', 'AO', 'AP', 'AQ', 'AR', 'AS', 'AT', 'AU', 'AV', 'AW', 'AX', 'AY', 'AZ');
        if ($title) {
            $row = 1;
            $i = 0;
            foreach ($title as $v) {   //设置列标题
                $obj->setActiveSheetIndex(0)->setCellValue($cellName[$i] . $row, $v);
                $i++;
            }
        }
        //填写数据
        if ($data) {
            $row = 2;
            foreach ($data AS $_v) {
                $j = 0;
                foreach ($title AS $field => $_cell) {
                    $obj->getActiveSheet(0)->setCellValue($cellName[$j] . ($row), $_v[$field]);
                    $j++;
                }
                $row++;
            }
        }

        //导出execl
        header('pragma:public');
        header('Content-type:application/vnd.ms-excel;charset=utf-8;name="' . $fileName . '.xls"');
        header("Content-Disposition:attachment;filename=$fileName.xls");//attachment新窗口打印inline本窗口打印
        $objWriter = PHPExcel_IOFactory::createWriter($obj, 'Excel5');
        $objWriter->save('php://output');
        exit;

    }

//exportExcel(array('姓名','年龄'), array(array('a',21),array('b',23)), '档案', './', true);

}