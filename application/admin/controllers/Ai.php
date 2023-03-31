<?php
//417841136@qq.com ,one-bluecat
class Ai extends MY_Controller
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
        $this->load_view('ai/index');
    }

    /**
     * 列表记录
     */
    public function lists()
    {
        $where = "1=1";

        $level_type = trim($this->input->post_get('level_type'));
        $level_type && $where .= $where ? " AND (level_type like '%{$level_type}%')" : " (level_type like '%{$level_type}%')";


        $study_section = trim($this->input->post_get('study_section'));
        $study_section && $where .= $where ? " AND (study_section like '%{$study_section}%')" : " (study_section like '%{$study_section}%')";

        $subject = trim($this->input->post_get('subject'));
        $subject && $where .= $where ? " AND (subject like '%{$subject}%')" : " (area subject '%{$subject}%')";

        $level_name = trim($this->input->post_get('level_name'));
        $level_name && $where .= $where ? " AND (level_name like '%{$level_name}%')" : " (level_name '%{$level_name}%')";


        $post_field = 'id,level_type,study_section,subject,level_name,score_min,score_max,link_url,img_url,add_time';
        $limit = 25;
        $order_by = 'id desc';
        $data = $this->common->admin_page_list('ai_config', $limit, $where, $order_by, $post_field);

        $this->load_view('ai/lists', $data);
    }


    /**
     * 添加
     */
    public function add($id = null)
    {
        if ($data = $this->input->post()) {
            $data = array_filter($data);
            $data = array_map(function ($value) {
                return trim($value);
            }, $data);
            $error_arr = array();
            if (!$data['level_type']) {
                $error_arr[] = "请选择类型！";
            }

            if ($data['level_type'] == 2) {
                if (!$data['study_section']) {
                    $error_arr[] = "请选择学段！";
                }
                if (!$data['subject']) {
                    $error_arr[] = "请选择学科！";
                }
            }

            if (!$data['level_name']) {
                $error_arr[] = "请填写等级名称！";
            }

            if (!$data['level_name']) {
                $error_arr[] = "请填写等级名称！";
            }

            if (!$data['score_min'] || !$data['score_max']) {
                $error_arr[] = "请填写分数范围！";
            }
            if ($_FILES['img_url']['name']) {
                $config['upload_path'] = './resources/static/home/img/aiimg/';
                $config['allowed_types'] = 'gif|jpg|png';
                if (!file_exists($config['upload_path'])) {
                    mkdir($config['upload_path'], 777, true);
                }
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('img_url')) {
                    $error_arr[] = $this->upload->display_errors();
                }
                $file_info = $this->upload->data();
                $data['img_url'] = substr($config['upload_path'], 1) . $file_info['file_name'];
            }

            if (count($error_arr) > 0) {
                $this->load_view('ai/add', array('msg' => implode('；', $error_arr)));
            } else {
                if ($data['level_type'] == 1) {
                    unset($data['study_section'], $data['subject']);
                }
                $data['add_time'] = date('Y-m-d H:i:s');
                if ($data['id']) {
                    $this->common->update('ai_config', array('id' => $data['id']), $data);
                } else {
                    $this->common->insert('ai_config', $data);
                }
                $this->load_view('ai/index', array('msg' => '添加成功'));
            }
        } else {
            $data = $this->common->get_one('ai_config', array('id' => $id));
            $data['a_id'] = $data['id'];
            $this->load_view('ai/add', $data);
        }
    }


    /**删除记录
     * @param $id
     */
    public function del($id)
    {
        $find = $this->common->get_one('ai_config', array('id' => $id));
        if (!$find) {
            $this->json(array('code' => 0, 'msg' => '记录不存在！'));
        }
        $this->common->delete('ai_config', array('id' => $find['id']));
        $this->json(array('code' => 1, 'msg' => '删除成功！', 'url' => site_url('ai/index')));
    }


    /**
     *短信列表
     */
    public function sms()
    {
        $this->load_view('ai/sms');
    }

    public function smslists()
    {
        $where = 'type=2';
        $phone = trim($this->input->post_get('phone'));
        $phone && $where .= $where ? " AND (phone like '%{$phone}%')" : " (phone like '%{$phone}%')";
        $post_field = 'id,phone,code,content,send_time';
        $limit = 25;
        $order_by = 'id desc';
        $data = $this->common->admin_page_list('sms_table', $limit, $where, $order_by, $post_field);
        foreach ($data['list'] as $k => $value) {
            $data['list'][$k]['send_time'] = date('Y-m-d H:i:s', $value['send_time']);
            $usernameInfo = $this->common->get_one('ai_data',"phone='{$value['phone']}'");
            $data['list'][$k]['username'] = $usernameInfo['username']?$usernameInfo['username']:'未知';

        }
        $is_export = $this->input->post_get('is_export');
        if ($is_export) {
            unset($data['list']);
            $data['list'] = $this->common->admin_list('sms_table',$post_field, 'type=2', $order_by);
            foreach ($data['list'] as $k => $value) {
                $data['list'][$k]['send_time'] = date('Y-m-d H:i:s', $value['send_time']);
                $usernameInfo = $this->common->get_one('ai_data',"phone='{$value['phone']}'");
                $data['list'][$k]['username'] = $usernameInfo['username']?$usernameInfo['username']:'未知';
            }
        }
        if ($is_export) {
            $head = array(
                'username' => '姓名',
                'phone' => '手机号码',
                'code' => '验证码',
                'content' => '短信内容',
                'send_time' => '发送时间',
            );
            $this->_exportExcel($head, $data['list'], 'Ai验证码列表', './uploads/excel/', true);
        }

        $this->load_view('ai/smslists', $data);
    }

    /**
     * 智能查岗用户
     */

    public function user()
    {
        $this->load_view('ai/user');
    }

    public function userlists()
    {
        $where = '1=1';
        $username = trim($this->input->post_get('username'));
        $username && $where .= $where ? " AND (username like '%{$username}%')" : " (username like '%{$username}%')";

        $phone = trim($this->input->post_get('phone'));
        $phone && $where .= $where ? " AND (phone like '%{$phone}%')" : " (phone like '%{$phone}%')";

        $area = trim($this->input->post_get('area'));
        $area && $where .= $where ? " AND (area like '%{$area}%')" : " (area like '%{$area}%')";

        $study_section = trim($this->input->post_get('study_section'));
        $study_section && $where .= $where ? " AND (study_section like '%{$study_section}%')" : " (study_section like '%{$study_section}%')";

        $subject = trim($this->input->post_get('subject'));
        $subject && $where .= $where ? " AND (subject like '%{$subject}%')" : " (area subject '%{$subject}%')";

        $post_field = 'id,username,phone,study_section,subject,area,jzfs,zykfs,add_time';
        $limit = 25;
        $order_by = 'id desc';
        $data = $this->common->admin_page_list('ai_data', $limit, $where, $order_by, $post_field);

        $is_export = $this->input->post_get('is_export');
        if ($is_export) {
            unset($data['list']);
            $data['list'] = $this->common->admin_list('ai_data',$post_field, array(), $order_by);
        }
        if ($is_export) {
            $head = array(
                'username' => '姓名',
                'phone' => '手机号码',
                'area' => '考区',
                'study_section' => '学段',
                'subject' => '学科',
                'jzfs' => '教综成绩',
                'zykfs' => '专科课成绩',
                'add_time' => '添加时间',
            );
            $this->_exportExcel($head, $data['list'], 'Ai用户列表', './uploads/excel/', true);
        }
        $this->load_view('ai/userlists', $data);
    }

    public function config()
    {

        $find = $this->common->get_one('system_config','id>0');
        $this->load_view('system/config',$find);
    }

}