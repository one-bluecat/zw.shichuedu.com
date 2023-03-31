<?php


class Score extends CI_Model
{

    private $system_config = null;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->system_config = $this->get_system_config();
        // Your own constructor code
    }


    /**插入晒分
     * @param $insertdata
     * @return mixed
     */
    public function insert_reg($insertdata)
    {
        return $this->db->insert('reg_table', $insertdata);
    }


    /**获取注册用户
     * @return mixed
     */
    public function reg_list($limit = 100)
    {
        //晒分用户
        $this->db->where('status', 1);
        $this->db->order_by('id desc')->limit($limit);
        $query = $this->db->get('reg_table');
        return $returnData = $query->result_array();
    }

    /**所有晒分用户
     * @return mixed
     */
    public function reg_all()
    {
        $this->db->order_by('id desc');
        $query = $this->db->get('reg_table');
        return $returnData = $query->result_array();
    }

    /**分页显示用户信息
     * @param $offset
     * @param $num
     * @param string $where
     * @param string $order
     * @return array
     */
    public function reg_list_page($offset, $num, $where = '1=1', $order = 'id desc')
    {
        $where && $this->db->where($where);
        $this->db->limit($num, $offset);
        $this->db->order_by($order);
        $this->db->select();
        $query = $this->db->get('reg_table');
        $list = $query->result_array();
        return array(
            'list' => $list,
        );
    }


    /**总用户数量
     * @param string $where
     * @return int
     */
    public function reg_total($where = '1=1')
    {
        $where && $this->db->where($where);
        $query = $this->db->get('reg_table');
        $list = $query->result_array();
        return count($list);
    }


    /**增加提交人数
     * @return mixed
     */
    public function add_reg_num($insertdata)
    {
        return $this->db->insert('add_reg_table', $insertdata);
    }

    /**获取增加的提交人数
     * @return mixed
     */
    public function getOneAddRegNum()
    {
        $query = $this->db->get('add_reg_table');
        $list = $query->result_array();
        return $list[0];
    }

    /**修改增加的提交人数
     * @param $id
     * @param $update_data
     * @return mixed
     */

    public function edit_add_reg_num($id, $update_data)
    {
        $this->db->where('id', $id);
        return $this->db->update('add_reg_table', $update_data);
    }


    /**修改晒分用户
     * @param $id
     * @param $update_data
     * @return mixed
     */
    public function update_reg($id, $update_data)
    {
        if (is_array($id)) {
            $this->db->where_in('id', $id);
        } else {
            $this->db->where('id', $id);
        }
        return $this->db->update('reg_table', $update_data);
    }

    /**删除晒分用户
     * @param $id
     */
    public function del_reg($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('reg_table');
    }


    /**验证岗位代码
     * @param $code
     * @return mixed
     */
    public function check_post_code($code)
    {
        $this->db->where('post_code', $code);
        $this->db->where('year', date('Y'));
        $this->db->order_by('id desc');
        $this->db->limit(1);
        $query = $this->db->get('post_table');
        $returnData = $query->result_array();
        return $returnData;
    }

    /**检查是否已注册
     * @param $phone
     * @return mixed
     */
    public function check_isreg($phone)
    {
        $this->db->where('phone', $phone);
        $this->db->limit(1);
        $query = $this->db->get('reg_table');
        return $returnData = $query->result_array();
    }

    /**校验短信验证码
     * @param $phone
     * @return mixed
     */
    public function check_code_expire($phone, $PhoneCode)
    {
        $this->db->where('phone', $phone)->where('code', $PhoneCode)->order_by('id desc')->limit(1);
        $query = $this->db->get('sms_table');
        return $returnData = $query->result_array();
    }


    /**岗位信息
     * @return mixed
     */
    public function post_list_page($offset, $num, $where = '1=1', $order = 'id desc')
    {
        //岗位信息
        $where && $this->db->where($where);
        $this->db->limit($num, $offset);
        $this->db->order_by($order);
        $this->db->select();
        $query = $this->db->get('post_table');
        $list = $query->result_array();
        return array(
            'list' => $list,
        );
    }

    /**岗位代码总条数
     * @param string $where
     * @return int
     */
    public function post_total($where = '1=1')
    {
        $where && $this->db->where($where);
        $query = $this->db->get('post_table');
        $list = $query->result_array();
        return count($list);
    }


    /**岗位信息不分页
     * @return mixed
     */
    public function post_list($order_by = 'id desc')
    {
        //岗位信息
        $this->db->where('year', $this->system_config['year']);
        $this->db->select('id,year,province,area,company,post_name,post_code,subject,study_section,num');
        $this->db->order_by($order_by);
        $query = $this->db->get('post_table');
        $list = $query->result_array();
        if(!$list){
            $this->db->where('year', $this->system_config['year']-1);
            $this->db->select('id,year,province,area,company,post_name,post_code,subject,study_section,num');
            $this->db->order_by($order_by);
            $query = $this->db->get('post_table');
            $list = $query->result_array();
        }
        return $list ;
    }


    /**
     * 岗位学科
     */
    public function post_subject()
    {
        $this->db->where('year', $this->system_config['year']);
        $this->db->group_by('subject');
        $this->db->select('subject');
        $query = $this->db->get('post_table');
        $list = $query->result_array();
        if(!$list){
            $this->db->where('year', $this->system_config['year']-1);
            $this->db->group_by('subject');
            $this->db->select('subject');
            $query = $this->db->get('post_table');
            $list = $query->result_array();
        }
        return $list;
    }


    /**
     * 岗位学段
     */
    public function post_study_section()
    {
        $this->db->where('year', $this->system_config['year']);
        $this->db->group_by('study_section');
        $this->db->select('study_section');
        $query = $this->db->get('post_table');
        $list = $query->result_array();
        if(!$list){
            $this->db->where('year', $this->system_config['year']-1);
            $this->db->group_by('study_section');
            $this->db->select('study_section');
            $query = $this->db->get('post_table');
            $list = $query->result_array();
        }
        return $list;
    }


    /**
     * 岗位行政辖区
     */
    public function post_area()
    {
        $this->db->where('year', $this->system_config['year']);
        $this->db->group_by('province,area');
        $this->db->select('province,area');
        $this->db->order_by('province asc');
        $query = $this->db->get('post_table');
        $list = $query->result_array();
        if(!$list){
            $this->db->where('year', $this->system_config['year']-1);
            $this->db->group_by('province,area');
            $this->db->select('province,area');
            $this->db->order_by('province asc');
            $query = $this->db->get('post_table');
            $list = $query->result_array();
        }
        return $list;
    }


    /**行政辖区代码
     * @return mixed
     */
    public function province_list()
    {
        $this->db->where('year', $this->system_config['year']);
        $this->db->group_by('province');
        $this->db->order_by('province asc');
        $this->db->select('province');
        $query = $this->db->get('post_table');
        $province = $query->result_array();
        if(!$province){
            $this->db->where('year', $this->system_config['year']-1);
            $this->db->group_by('province');
            $this->db->order_by('province asc');
            $this->db->select('province');
            $query = $this->db->get('post_table');
            $province = $query->result_array();
        }
        return $province;

    }

    /**岗位代码l列表
     * @return mixedpost_list
     */
    public function post_code_list()
    {
        $this->db->where('year', $this->system_config['year']);
        $this->db->group_by('post_code');
        $this->db->order_by('post_code asc');
        $this->db->select('post_code');
        $query = $this->db->get('post_table');
        $province = $query->result_array();
        if(!$province){
            $this->db->where('year', $this->system_config['year']-1);
            $this->db->group_by('post_code');
            $this->db->order_by('post_code asc');
            $this->db->select('post_code');
            $query = $this->db->get('post_table');
            $province = $query->result_array();
        }
        return $province;

    }


    /**批量插入岗位代码
     * @param $str
     * @return mixed
     */
    public function replace_post($str)
    {
//        $sql = "set global max_allowed_packet=1024*1024*16;";
//        $this->db->query($sql);

        $before_total = $this->db->count_all('post_table');
        $sql = "REPLACE into shichuedu_post_table (`year`,province,area,company,post_name,post_code,study_section,`subject`,num,single_plan,degree,is_need_degree,age,profession,teacher_qualification,memo,single_plan_memo) values $str ";
        $this->db->query($sql);
        $after_total = $this->db->count_all('post_table');
        $success = $after_total - $before_total;
        return $success;
    }

    /**排名
     * @param $phone
     * @return mixed
     */
    public function reg_order($phone)
    {
        $returnData = array();
        $this->db->where('status', 1);
        $this->db->where('phone', $phone);
        $this->db->limit(1);
        $query = $this->db->get('reg_table');
        $find = $query->result_array();
        $post_code = isset($find[0]['post_code']) ? $find[0]['post_code'] : "";
        if ($_REQUEST['debug']) {
            var_dump($phone);
            var_dump($find);
            var_dump($post_code);
        }
        if ($post_code) {
            $this->db->where('post_code', $post_code);
            $this->db->order_by('score desc');
            $query = $this->db->get('reg_table');
            return $returnData = $query->result_array();
        } else {
            return $returnData;
        }

    }


    /**修改岗位代码
     * @param $id
     * @param $update_data
     * @return mixed
     */
    public function update_post($id, $update_data)
    {
        $this->db->where('id', $id);
        return $this->db->update('post_table', $update_data);
    }

    /**删除岗位代码
     * @param $id
     */
    public function del_post($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('post_table');
    }


    /**
     * @param $insertdata
     * @return mixed
     */
    public function insert_sms($insertdata)
    {
        $result = $this->db->insert('sms_table', $insertdata);
        return $result;
    }

    public function insert_sms_post($insertdata)
    {
        $result = $this->db->insert('sms_post', $insertdata);
        return $result;
    }

    public function is_send_sms($phone)
    {
        $this->db->where('phone', $phone);
        $this->db->where('send_time>', time() - 60 * 20);
        $this->db->where('send_time<', time());
        $query = $this->db->get('sms_table');
        return $returnData = $query->result_array();
    }

    public function is_send_sms_post($phone)
    {
        $this->db->where('phone', $phone);
        $this->db->where('send_time>', time() - 60 * 20);
        $this->db->where('send_time<', time());
        $query = $this->db->get('sms_post');
        return $returnData = $query->result_array();
    }


    public function stat_city_data()
    {
        $sql = "select province,round(avg(zyk_score),1) as avg_zyk_score,round(avg(jz_score),1) as avg_jz_score,round(avg(score),1) as avg_score,count(*) as num from shichuedu_reg_table  group by province";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;

    }


    public function subject_city_data()
    {

        $sql = "select study_section,subject,round(avg(zyk_score),1) as avg_zyk_score,round(avg(jz_score),1) as avg_jz_score,round(avg(score),1) as avg_score,count(*) as num from shichuedu_reg_table  group by study_section,subject";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;

    }

    public function get_system_config()
    {
        $this->db->where('id>0');
        $query = $this->db->get('system_config');
        $returnData = $query->result_array();
        $returnData[0]['year'] = $returnData[0]['rank_year'];
        return $returnData[0];
    }


    /**报考地区列表
     * @return mixedpost_list
     */
    public function post_area_list()
    {
        $this->db->where('year', $this->system_config['year']);
        $this->db->group_by('area');
        $this->db->order_by('province asc');
        $this->db->select('area');
        $query = $this->db->get('post_table');
        $province = $query->result_array();
        if(!$province){
            $this->db->where('year', $this->system_config['year']-1);
            $this->db->group_by('area');
            $this->db->order_by('province asc');
            $this->db->select('area');
            $query = $this->db->get('post_table');
            $province = $query->result_array();
        }
        return $province;

    }
    /**招聘单位列表
     * @return mixedpost_list
     */
    public function post_company_list($area="")
    {
        $this->db->where('year', $this->system_config['year']);
        $this->db->where('area', $area);
        $this->db->group_by('company');
        $this->db->order_by('company asc');
        $this->db->select('company');
        $query = $this->db->get('post_table');
        $province = $query->result_array();
        if(!$province){
            $this->db->where('year', $this->system_config['year']-1);
            $this->db->where('area', $area);
            $this->db->group_by('company');
            $this->db->order_by('company asc');
            $this->db->select('company');
            $query = $this->db->get('post_table');
            $province = $query->result_array();
        }
        return $province;
    }

    /**岗位信息
     * @return mixedpost_list
     */
    public function post_name_list($area="",$company="")
    {
        $this->db->where('year', $this->system_config['year']);
        $this->db->where('area', $area);
        $this->db->where('company', $company);
        $this->db->group_by('post_name');
        $this->db->order_by('post_name asc');
        $this->db->select('post_name');
        $query = $this->db->get('post_table');
        $province = $query->result_array();
        if(!$province){
            $this->db->where('year', $this->system_config['year']-1);
            $this->db->where('area', $area);
            $this->db->where('company', $company);
            $this->db->group_by('post_name');
            $this->db->order_by('post_name asc');
            $this->db->select('post_name');
            $query = $this->db->get('post_table');
            $province = $query->result_array();
        }
        return $province;
    }

    /**
     * 获取岗位代码相关信息
     */
    public function get_post_info($area='',$company='',$post_name=''){
        $this->db->where('year', $this->system_config['year']);
        $this->db->where('area', $area);
        $this->db->where('company', $company);
        $this->db->where('post_name', $post_name);
        $this->db->select('province,post_code,study_section,subject');
        $query = $this->db->get('post_table');
        $post_info = $query->result_array();
        if(!$post_info){
            $this->db->where('year', $this->system_config['year']-1);
            $this->db->where('area', $area);
            $this->db->where('company', $company);
            $this->db->where('post_name', $post_name);
            $this->db->select('province,post_code,study_section,subject');
            $query = $this->db->get('post_table');
            $post_info = $query->result_array();
        }
        return $post_info;
    }
}
