<?php


class Reg extends MY_Controller
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
     * 显示列表
     */
    public function index()
    {
        $this->load_view('reg/index');
    }


    /** 列表记录
     * @throws PHPExcel_Exception
     * @throws PHPExcel_Reader_Exception
     */
    public function lists()
    {
        $where = "1=1";

        $post_code = $this->input->post_get('post_code');
        $post_code && $where = "(post_code like '%{$post_code}%')";

        $name = $this->input->post_get('name');
        $name && $where .= $where ? " AND (name like '%{$name}%')" : "(name like '%{$name}%')";

        $phone = $this->input->post_get('phone');
        $phone && $where .= $where ? " AND (phone like '%{$phone}%')" : " (phone like '%{$phone}%')";

        $status = $this->input->post_get('status');
        if($status>0){
            $status==2 && $status=0;
            $where .= $where ? " AND status='{$status}'" : "status='{$status}'";
        }
        $time = $this->input->post_get('time');
        if ($time) {
            list($start_time, $end_time) = explode('~', $time);
            $start_time = trim($start_time);
            $end_time = date('Y-m-d', strtotime(trim($end_time)) + 86400);
            $where .= $where ? " AND (reg_time>='{$start_time}' and reg_time<='{$end_time}')" : "(reg_time>='{$start_time}' and reg_time<='{$end_time}')";
        }
        $reg_field = 'id,name,post_code,score,phone,reg_time,status';
        $post_field  = 'year,post_code,area,company,post_name,study_section,subject';
        $limit = 25;
        $order_by = 'id desc';
        $data = $this->common->admin_page_list('reg_table', $limit, $where, $order_by,$reg_field);
        $post_list = $this->common->admin_list('post_table', $post_field, array(), 'id desc', 0, true);
        $post_arr = array();
        foreach ($post_list as $r) {
            $post_arr[$r['post_code']] = $r;
        }

        //导出
        $is_all_export = $this->input->post_get('is_all_export');
        $is_export = $this->input->post_get('is_export');
        if ($is_all_export) {
            unset($data['list']);
            $data['list'] = $this->common->admin_list('reg_table',$reg_field, array(), $order_by);
        }

        foreach ($data['list'] as $key => &$v) {
            $v['city'] = $this->city[substr($v['post_code'],0, 4)];
            $v['area'] = $post_arr[$v['post_code']]['area'];
            $v['company'] = $post_arr[$v['post_code']]['company'];
            $v['post_name'] = $post_arr[$v['post_code']]['post_name'];
            $v['study_section'] = $post_arr[$v['post_code']]['study_section'];
            $v['subject'] = $post_arr[$v['post_code']]['subject'];
            $is_export && $v['status'] = $v['status'] ? '已审核' :'未审核';
        }
        if ($is_export) {
            $head = array(
                'city' => '所属市',
                'post_code' => '岗位代码',
                'name' => '姓名',
                'phone' => '手机号码',
                'score' => '笔试成绩',
                'area' => '行政辖区',
                'company' => '招聘单位',
                'study_section' => '学段',
                'subject' => '学科',
                'status' => '审核状态',
                'reg_time' => '注册时间',
            );
          $this->_exportExcel($head, $data['list'], '用户信息表', './uploads/excel/', true);
        }
        $this->load_view('reg/lists', $data);
    }


    /**编辑记录
     * @param null $id
     */

    public function edit($id = null)
    {
        if ($data = $this->input->post()) {
            $find = $this->common->get_one('reg_table', "id ='{$data['id']}'");
            if (!$find) {
                $this->json(array('code' => 0, 'msg' => '用户不存在！'));
            }

            $post = $this->common->get_one('post_table', array('year' => date('Y'), 'post_code' => $data['post_code']));
            if (!$post) {
                $this->json(array('code' => 0, 'msg' => '岗位代码不存在！'));
            }
            $update['name'] = $data['name'];
            $update['phone'] = $data['phone'];
            $update['score'] = $data['score'];
            $update['post_code'] = $data['post_code'];
            $update['status'] = $data['status'];
            $this->common->update('reg_table', array('id' => $data['id']), $update);
            $this->json(array('code' => 1, 'msg' => '修改成功！', 'url' => site_url('reg/index')));
        } else {
            $data = $this->common->get_one('reg_table', array('id' => $id));
            $post = $this->common->get_one('post_table', array('year' => $data['year'], 'post_code' => $data['post_code']));
            $data['area'] = $post['area'];
            $data['company'] = $post['company'];
            $data['study_section'] = $post['study_section'];
            $data['subject'] = $post['subject'];
            $data['post_name'] = $post['post_name'];
            $this->load_view('reg/edit', $data, true);
        }
    }


    /**
     * 批量审核
     */
    public function batch_audit(){
        $id = $this->input->post_get('ids');
        $updata['status'] = $this->input->post_get('status');
        $result = $this->common->update('reg_table','id in ('.$id.')', $updata);
        $result || $this->json(array('code' => 0, 'msg' => '审核失败！'));
        $result && $this->json(array('code' => 1, 'msg' => '审核成功！', 'url' => site_url('reg/index')));
    }


    /**删除记录
     * @param $id
     */
    public function del($id)
    {
        $find = $this->common->get_one('reg_table', array('id' => $id));
        if (!$find) {
            $this->json(array('code' => 0, 'msg' => '用户不存在！'));
        }
        $this->common->delete('reg_table', array('id' => $find['id']));
        $this->json(array('code' => 1, 'msg' => '删除成功！', 'url' => site_url('reg/index')));
    }



    /**
     * 增加提交人数
     */

    public function add_reg_num()
    {
        $add_reg_num = intval(trim($this->input->post('add_reg_num')));
        $info = $this->common->get_one('shichuedu_add_reg_table','1=1');
        if ($info['id']) {
            $result = $this->common->update('shichuedu_add_reg_table',array('id'=>$info['id']), array('num' => $add_reg_num));
        } else {
            $result = $this->common->insert('shichuedu_add_reg_table',array('num' => $add_reg_num));
        }
        $result || $this->json(array('code' => 0, 'msg' => '修改失败！'));
        $result && $this->json(array('code' => 1, 'msg' => '修改成功！', 'url' => site_url('reg/index')));
    }


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

}
