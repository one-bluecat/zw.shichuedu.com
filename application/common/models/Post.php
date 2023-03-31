<?php


class Post extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->db->cache_off();
    }


    public function get_city_applyNum(){
        $system_config =  $this->get_system_config();
        $year = $system_config['year'];
        $this->
        $sql = "SELECT SUBSTR(province,1,4) as province,SUM(num),COUNT(*) from shichuedu_post_table where `year`='{$year}' GROUP BY SUBSTR(province,1,4)";
    }
    public function get_system_config()
    {
        $this->db->where('id>0');
        $query = $this->db->get('system_config');
        $returnData = $query->result_array();
        return $returnData[0];
    }
}