<?php


class Common extends CI_Model
{

    private $system_config = null;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->db->cache_off();
        $this->system_config = $this->get_system_config();
    }

    /**获取mysql版本
     * @return mixed
     */
    public function get_mysql_version()
    {
        $returnData = $this->db->version();
        return $returnData;
    }

    /**获取一条记录
     * @param $where
     * @param $table
     */
    public function get_one($table, $where = null)
    {
        if (is_null($where)) {
            return;
        }
        $this->db->where($where);
        $query = $this->db->get($table);
        $list = $query->result_array();
        return $list[0];
    }


    /**插入记录
     * @param $table
     * @param $data
     */
    public function insert($table, $data)
    {
        return $this->db->insert($table, $data);
    }

    /**更新记录
     * @param $table
     * @param null $where
     * @param $data
     */
    public function update($table, $where = null, $data)
    {
        if (is_null($where)) {
            return;
        }
        return $this->db->update($table, $data, $where);
    }


    /**删除记录
     * @param $table
     * @param null $where
     */
    public function delete($table, $where = null)
    {
        if (is_null($where)) {
            return;
        }
        return $this->db->delete($table, $where);
    }


    public function count($table, $where = null){
        $this->db->where($where);
        $query = $this->db->get($table);
        $list =  $query->result_array();
        $count = count($list);
        return $count;
    }


    /**无分页列表
     * @param $table
     * @param array $where
     * @param string $order
     * @param int $limit
     * @return mixed
     */
    public function admin_list($table, $field = 'id', $where = array(), $order = 'id desc', $group = '', $cache = false)
    {
        $cache && $this->db->cache_on();
        $where && $this->db->where($where);
        $group && $this->db->group_by($group);
        $order && $this->db->order_by($order);
        $query = $this->db->select($field)->get($table);
        return $query->result_array();
    }


    /**分页列表
     * @param $table
     * @param int $limit
     * @param array $where
     * @param string $order
     * @return mixed
     */
    public function admin_page_list($table, $limit = 25, $where = array(), $order = 'id desc', $field = 'id', $cache = false)
    {

        $cache && $this->db->cache_on();
        $this->load->library('pagination');
        $this->load->helper('url');

        $page = intval($this->input->post("page"));
        $page = $page ? $page : 1;
        $offset = ($page - 1) * $limit;
        $offset = $offset < 0 ? 0 : $offset;

        $where && $this->db->where($where);
        $this->db->limit($limit, $offset);
        $this->db->order_by($order);
        $query = $this->db->select($field)->get($table);
        $list = $query->result_array();
        $total_arr = $this->db->where($where)->select()->get($table)->result_array();
        $total = count($total_arr);
        $config['query_string_segment'] = 'page';
        $config['page_query_string'] = TRUE;
        $config['num_links'] = 9;
        $config['data_page_attr'] = "lay-page";
        $config['attributes']['rel'] = FALSE;
        $config['use_page_numbers'] = TRUE;
        $config['full_tag_open'] = '<div class="layui-box layui-laypage layui-laypage-page "> <span class="layui-laypage-skip">共 ' . $total . ' 条</span> <span class="layui-laypage-skip" style="margin-left: 0;">' . $limit . ' 条/页</span>';
        $config['full_tag_close'] = '</div>';
        $config['first_link'] = '首页';
        $config['last_link'] = '最后 ';
        $config['next_link'] = '下一页';
        $config['prev_link'] = '上一页';
        $config['cur_tag_open'] = '<span class="layui-laypage-curr"><em class="layui-laypage-em" style="background-color:#1E9FFF;"></em><em>';
        $config['cur_tag_close'] = '</em></span>';
        $config['base_url'] = "javascript:;";         //地址路径
        $config['total_rows'] = $total;                               //总的内容 条数
        $config['per_page'] = $limit;

        //每页显示数量，默认显示25条
        $this->pagination->initialize($config);                  //加载配置信息
        $data['page'] = $this->pagination->create_links();

        $data['total_rows'] = $config['total_rows'];
        $data['list'] = $list;
        return $data;

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
        if(date('Y') == 2020){
            $sql = "REPLACE into shichuedu_post_table (`year`,province,area,company,post_name,post_code,study_section,`subject`,num,single_plan,degree,is_need_degree,age,university_graduate_plan,profession,teacher_qualification,city_plan,town_plan,memo,single_plan_memo) values $str ";
        }else{
            $sql = "REPLACE into shichuedu_post_table (`year`,province,area,company,post_name,post_code,study_section,`subject`,num,single_plan,degree,is_need_degree,age,profession,teacher_qualification,memo,single_plan_memo) values $str ";
        }
        $this->db->query($sql);
        $after_total = $this->db->count_all('post_table');
        $success = $after_total - $before_total;
        return $success;
    }

    /**批量插入岗位代码
     * @param $str
     * @return mixed
     */
    public function replace_pass_user($str)
    {
//        $sql = "set global max_allowed_packet=1024*1024*16;";
//        $this->db->query($sql);

        $before_total = $this->db->count_all('pass_user');
        $sql = "REPLACE into shichuedu_pass_user (`year`,post_code,score) values $str ";
        $this->db->query($sql);
        $after_total = $this->db->count_all('pass_user');
        $success = $after_total - $before_total;
        return $success;
    }


    /**批量插入面试形式和教材版本
     * @param $str
     * @return mixed
     */
    public function replace_audition($str)
    {
//        $sql = "set global max_allowed_packet=1024*1024*16;";
//        $this->db->query($sql);

        $before_total = $this->db->count_all('audition_content');
        $sql = "REPLACE into shichuedu_audition_content (city,area,study_section,`subject`,audition,textbook_version) values $str ";
        $this->db->query($sql);
        $after_total = $this->db->count_all('audition_content');
        $success = $after_total - $before_total;
        return $success;
    }

    /**职位核减
     * @param $str
     * @return mixed
     */
    public function replace_cut($str)
    {
//        $sql = "set global max_allowed_packet=1024*1024*16;";
//        $this->db->query($sql);
        $before_total = $this->db->count_all('post_cut');
        $sql = "REPLACE into shichuedu_post_cut (`year`,post_code,num) values $str ";
        $this->db->query($sql);
        $after_total = $this->db->count_all('post_cut');
        $success = $after_total - $before_total;
        return $success;
    }


    public function home_list($table, $field, $where, $group, $order = 'id asc', $limit = 0)
    {
        $year = $this->system_config['year'];
        if (is_array($where)) {
            isset($where['year']) || $where['year'] = $year;
        } else {
            strstr($where, 'year') || ($where ? $where .= " and year='{$year}'" : $where = "year='{$year}'");
        }
        $where && $this->db->where($where);
        $group && $this->db->group_by($group);
        $field && $this->db->select($field);
        $this->db->order_by($order);
        $limit && $this->db->limit($limit);
        $query = $this->db->get($table);
        return $list = $query->result_array();
    }


    public function home_page_list($table, $limit = 20, $where = array(), $order = 'id desc', $field = 'id', $cache = false, $base_url = '')
    {
        $this->load->library('pagination');
        $this->load->helper('url');
        $page = intval($this->input->get("page"));
        $page = $page ? $page : 1;
        $offset = ($page - 1) * $limit;
        $offset = $offset < 0 ? 0 : $offset;
        $where && $this->db->where($where);
        $this->db->limit($limit, $offset);
        $this->db->order_by($order);
        $query = $this->db->select($field)->get($table);
//        var_dump($this->get_last_query());exit;
        $list = $query->result_array();
        $total_arr = $this->db->where($where)->select()->get($table)->result_array();
        $total = count($total_arr);
        $config['uri_segment'] = 3;
        $config['num_links'] = 5;
        $config['use_page_numbers'] = TRUE;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';
        $config['full_tag_open'] = '<div class="fanye mt15 mb10"><a target="_self" class="next" href="">' . $page . '/' . ceil($total / $limit) . '</a>';
        $config['full_tag_close'] = '</div>';
        $config['first_link'] = '首页';
        $config['last_link'] = '最后 ';
        $config['next_link'] = '下一页';
        $config['prev_link'] = '上一页';
        $config['cur_tag_open'] = '<a>';
        $config['cur_tag_close'] = '</a>';
        unset($_REQUEST['page']);
        $base_url = ($base_url ? $base_url : '/kscx/search/?') . http_build_query(array_filter(array_unique($_REQUEST)));
        $config['base_url'] = $base_url;         //地址路径
        $config['total_rows'] = $total;                               //总的内容 条数
        $config['per_page'] = 20;
        //每页显示数量，默认显示20条
        $this->pagination->initialize($config);                  //加载配置信息
        $data['page'] = $this->pagination->create_links();
        $data['total_rows'] = $config['total_rows'];
        $data['list'] = $list;
        return $data;

    }


    /**获取系统配置
     * @return mixed
     */
    public function get_system_config()
    {
        $this->db->where('id>0');
        $query = $this->db->get('system_config');
        $returnData = $query->result_array();
        return $returnData[0];
    }

    /**获取最后一次执行语句
     * @return mixed
     */
    public function get_last_query()
    {
        return $this->db->last_query();
    }
}