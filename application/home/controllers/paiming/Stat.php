<?php


class Stat extends CI_Controller
{
    private $cityName = array(
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
        //获取系统配置
        $this->system_config = $this->score->get_system_config();
    }

    public function subject()
    {
        $result = $this->score->subject_city_data();
        $data['list'] = $result;
        $data['cityName'] = $this->cityName;
        $data['system_config'] = $this->system_config;
        $this->load->view('paiming/subject_page', $data);
    }



    public function city()
    {
        $result = $this->score->stat_city_data();
        $data['list'] = $result;
        $data['cityName'] = $this->cityName;
        $data['system_config'] = $this->system_config;
        $this->load->view('paiming/city_page', $data);
    }

}