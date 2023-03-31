<?php

class Index extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('common');
    }

    public function home(){
        $sys_info = $this->_get_server_info();
        $this->load_view('index',$sys_info);

    }

    /**
     * 获取系统信息
     * @return mixed
     */
    protected function _get_server_info()
    {
        $sys_info['os']             = PHP_OS;
        $sys_info['zlib']           = function_exists('gzclose') ? 'YES' : 'NO'; //zlib
        $sys_info['safe_mode']      = (boolean)ini_get('safe_mode') ? 'YES' : 'NO'; //safe_mode = Off
        $sys_info['timezone']       = function_exists("date_default_timezone_get") ? date_default_timezone_get() : "no_timezone";
        $sys_info['curl']           = function_exists('curl_init') ? 'YES' : 'NO';
        $sys_info['web_server']     = $_SERVER['SERVER_SOFTWARE'];
        $sys_info['phpv']           = phpversion();
        $sys_info['ip']             = GetHostByName($_SERVER['SERVER_NAME']);
        $sys_info['fileupload']     = @ini_get('file_uploads') ? ini_get('upload_max_filesize') : 'unknown';
        $sys_info['max_ex_time']    = @ini_get("max_execution_time") . 's'; //脚本最大执行时间
        $sys_info['set_time_limit'] = function_exists("set_time_limit") ? true : false;
        $sys_info['domain']         = $_SERVER['HTTP_HOST'];
        $sys_info['memory_limit']   = ini_get('memory_limit');
        $musql_version             = $this->common->get_mysql_version();
        $sys_info['mysql_version'] = $musql_version;
        if (function_exists("gd_info")) {
            $gd                 = gd_info();
            $sys_info['gdinfo'] = $gd['GD Version'];
        } else {
            $sys_info['gdinfo'] = "未知";
        }
        return $sys_info;
    }

    public function flexible(){

    }

    public function _remap()
    {
        $this->home();
    }
}