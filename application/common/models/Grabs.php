<?php


class Grabs extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    /**插入抓取记录
     * @param $insertdata
     * @return mixed
     */
    public function insert_grab_log($url)
    {
        $data = array();
        $data['url'] = $url;
        return $this->db->insert('grab_log', $data);
    }

    /**查询抓取插入记录
     * @param $url
     * @return mixed
     */
    public function find_grab_log($url){
        $this->db->where('url', $url);
        $query = $this->db->get('grab_log');
        $returnData = $query->result_array();
        return $returnData;
    }


    /**更新职位表
     * @param $data
     */
    public function update_post_table($data,$year){
        $this->db->where('post_code', $data['post_code']);
        $this->db->where('year', $year);
        $query = $this->db->get('post_table');
        $returnData = $query->result_array();
        $compete_rate =$data['pay_num']/$returnData[0]['num'];
        if(!is_int($compete_rate)){
            $data['compete_rate'] = sprintf('%.1f',$compete_rate);
        }else{
            $data['compete_rate']  = $compete_rate;
        }
        unset($data['post_code']);
        if($returnData[0]['id']){
            $this->db->where('id', $returnData[0]['id']);
            $this->db->update('post_table', $data);
        }
    }

    public function find_one($data,$year){
        $this->db->where('post_code', $data['post_code']);
        $this->db->where('num', $data['num']);
        $this->db->where('year', $year);
        $query = $this->db->get('post_table');
        $returnData = $query->result_array();
        return $returnData;
    }
}