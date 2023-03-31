<?php


class Search extends CI_Controller
{
    protected $system_config = null;

    public function __construct()
    {
        parent::__construct();
        error_reporting(E_ALL & ~E_NOTICE);
        $this->load->model('score');
        //获取系统配置
        $this->system_config = $this->score->get_system_config();
    }

    /**
     * 查看最新晒分用户
     */
    public function index()
    {
        $post_arr = $data = array();
        $reg_data = $this->score->reg_list(20);
        $post_data = $this->score->post_list();
        if ($post_data) {
            foreach ($post_data as $r) {
                $post_arr[$r['post_code']] = $r;
            }
        }
        $reg_arr = array();
        if ($reg_data) {
            foreach ($reg_data as $r) {
                $temp = array();
                $temp['post_code'] = $r['post_code'];
                $temp['post_name'] = $post_arr[$r['post_code']]['post_name'];
                $temp['name'] = $this->_substr_text($r['name'], 0, 1, 'utf-8', '*');
                $temp['area'] = $post_arr[$r['post_code']]['area'];
                $temp['company'] = $post_arr[$r['post_code']]['company'];
                $temp['score'] = $r['score'];
                $reg_arr[] = $temp;
            }
        }
        $data['list'] = $reg_arr;
        //已有多少人提交
        $total_num = $this->score->reg_total();
        $add_reg_info = $this->score->getOneAddRegNum();
        $data['total_num'] = $total_num + $add_reg_info['num'];
        $data['system_config'] = $this->system_config;
        $this->load->view('paiming/search_page', $data);
    }

    /**
     * 查看自己排名
     */
    public function order_submit()
    {
        //1.1校验参数
        $phone = $this->input->post('shouji');
        $pattern = '/^1[3-9]\d{9}$/';
        preg_match($pattern, $phone, $matchs);
        if (!isset($matchs[0]) || !$matchs[0] || !$phone) {
            exit(json_encode(array('status' => 0, 'msg' => '无效参数！')));
        }
        //1.1 查看是否已晒分
        $find = $this->score->check_isreg($phone);
        $phone_exisit = isset($find[0]['phone']) ? $find[0]['phone'] : "";
        if (!$phone_exisit) {
            exit(json_encode(array('status' => 0, 'msg' => '亲，还没有晒分呢!赶紧晒分吧！')));
        }

        //手机号码加密
        $encrypt_phone = base64_encode($phone);
        exit(json_encode(array('status' => 1, 'data' => urlencode($encrypt_phone))));

    }


    public function order_show()
    {
        //查看排名
        $phone = urldecode($_REQUEST['key']);
        $phone = base64_decode($phone);
        $find = $this->score->check_isreg($phone);
        $reg_data = $this->score->reg_order($phone);
        $post_data = $this->score->post_list();
        if ($post_data) {
            foreach ($post_data as $r) {
                $post_arr[$r['post_code']] = $r;
            }
        }
        $reg_arr = $data = array();
        $total = $current_order = 0;
        $usernameArr  = $jzArr = $zykArr = $scoreArr = array();
        if ($reg_data) {
            foreach ($reg_data as $k => $r) {
                $temp = array();
                $temp['post_code'] = $r['post_code'];
                $temp['post_name'] = $post_arr[$r['post_code']]['post_name'];
                $temp['name'] = $this->_substr_text($r['name'], 0, 1, 'utf-8', '*');
                $temp['area'] = $post_arr[$r['post_code']]['area'];
                $temp['company'] = $post_arr[$r['post_code']]['company'];
                $temp['zyk_score'] = $r['zyk_score'];
                $temp['jz_score'] = $r['jz_score'];
                $temp['score'] = $r['score'];
                $temp['num'] = $post_arr[$r['post_code']]['num'];
                $temp['is_self'] = 0;
                if ($r['phone'] == $phone) {
                    $temp['is_self'] = 1;
                    $current_order = $k + 1;
                }
                $reg_arr[] = $temp;
                $total++;
            }
        }
        $soreBy = array();
        foreach ($reg_arr as $k => $r) {
            $soreBy[$k] = $r['score'];
        }
        array_multisort($soreBy, SORT_DESC, $reg_arr);

        foreach ($reg_arr as $value){
            $usernameArr[] = "'{$value['name']}'";
            $jzArr[] = $value['jz_score'];
            $zykArr[] = $value['zyk_score'];
            $scoreArr[] = $value['score'];
        }
        $data['list'] = $reg_arr;
        $data['total_order'] = $total;
        $data['current_order'] = $current_order;
        $data['post_code'] = $find[0]['post_code'];
        $data['company'] = $post_arr[$find[0]['post_code']]['company'];
        $data['post_name'] = $post_arr[$find[0]['post_code']]['post_name'];
        $data['num'] = $post_arr[$find[0]['post_code']]['num'];
        $data['system_config'] = $this->system_config;
        $data['usernameArr'] = $usernameArr;
        $data['zykArr'] = $zykArr;
        $data['jzArr'] = $jzArr;
        $data['scoreArr'] = $scoreArr;
        $this->load->view('paiming/search_show', $data);
    }


    /**
     * 创建网站快捷方式
     */
    public function createShortCut()
    {
        // 创建基本代码
        $sys_protocal = isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443' ? 'https://' : 'http://';
        $url = $sys_protocal . (isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '') . '/paiming/search/index';
        $filename = '成绩排名查询.url';
        $icon = 'http://fdipzone.com/favicon.ico';
        $shortCut = "[InternetShortcut]\r\nIDList=[{000214A0-0000-0000-C000-000000000046}]\r\nProp3=19,2\r\n";
        $shortCut .= "URL=" . $url . "\r\n";
        if ($icon) {
            $shortCut .= "IconFile=" . $icon . "";
        }
        header("content-type:application/octet-stream");

        // 获取用户浏览器
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        $encode_filename = rawurlencode($filename);

        // 不同浏览器使用不同编码输出
        if (preg_match("/MSIE/", $user_agent)) {
            header('content-disposition:attachment; filename="' . $encode_filename . '"');
        } else if (preg_match("/Firefox/", $user_agent)) {
            header("content-disposition:attachment; filename*=\"utf8''" . $filename . '"');
        } else {
            header('content-disposition:attachment; filename="' . $filename . '"');
        }
        echo $shortCut;
    }


    /** 截取字符串
     * @param $str
     * @param int $start
     * @param $length
     * @param string $charset
     * @param string $suffix
     * @return string
     */

    private function _substr_text($str, $start = 0, $length, $charset = "utf-8", $suffix = "")
    {
        if (function_exists("mb_substr")) {
            return mb_substr($str, $start, $length, $charset) . $suffix;
        } elseif (function_exists('iconv_substr')) {
            return iconv_substr($str, $start, $length, $charset) . $suffix;
        }
        $re['utf-8'] = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
        $re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
        $re['gbk'] = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
        $re['big5'] = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
        preg_match_all($re[$charset], $str, $match);
        $slice = join("", array_slice($match[0], $start, $length));
        return $slice . $suffix;
    }

}