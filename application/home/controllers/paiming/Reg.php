<?php


class Reg extends CI_Controller
{

    protected $system_config = null;
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
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
//        error_reporting(E_ALL & ~E_NOTICE);
        error_reporting(0);
        $this->load->model('score');
        //获取系统配置
        $this->system_config = $this->score->get_system_config();
    }

    public function index()
    {
        $data['system_config'] = $this->system_config;
        //获取报考地区
        $company_list = $this->score->post_area_list();
        $data['area_list'] = $company_list;
        $this->load->view('paiming/reg_page', $data);
    }

    /**
     * 获取招聘单位列表
     */
    public function getCompanyList()
    {
        $area = $_REQUEST['area'];
        $company_list = $this->score->post_company_list($area);
        exit(json_encode(array('data' => $company_list)));
    }

    /**
     * 获取岗位信息列表
     */
    public function getPostNameList()
    {
        $area = $_REQUEST['area'];
        $company = $_REQUEST['company'];
        $postName_list = $this->score->post_name_list($area, $company);
        exit(json_encode(array('data' => $postName_list)));
    }

    public function disclaimer()
    {
        $this->load->view('paiming/disclaimer_page');
    }


    public function view_post()
    {

        $page = intval($this->input->get("per_page"));
        $page = $page ? $page : 1;
        $per_page = 20;
        $offset = ($page - 1) * $per_page;

        $year = $this->system_config['year'];
        $where = "year='{$year}'";
        if ($study_section = $this->input->get('study_section')) {
            $where .= $where ? " and study_section='{$study_section}'" : "study_section='{$study_section}'";
        }
        if ($subject = $this->input->get('subject')) {
            $where .= $where ? " and subject='{$subject}'" : "subject='{$subject}'";
        }
        if ($province = $this->input->get('province')) {
            if (strlen($province) == 4) {
                $where .= $where ? " and province like '%{$province}%'" : "province like '%{$province}%'";
            } else {
                $where .= $where ? " and province='{$province}'" : "province='{$province}'";
            }
        }
        $post_list = $this->score->post_list_page($offset, $per_page, $where, 'province asc,post_code asc');

        if (!$post_list['list']) {
            $year = $this->system_config['year'] - 1;
            $where = "year='{$year}'";
            if ($study_section = $this->input->get('study_section')) {
                $where .= $where ? " and study_section='{$study_section}'" : "study_section='{$study_section}'";
            }
            if ($subject = $this->input->get('subject')) {
                $where .= $where ? " and subject='{$subject}'" : "subject='{$subject}'";
            }
            if ($province = $this->input->get('province')) {
                if (strlen($province) == 4) {
                    $where .= $where ? " and province like '%{$province}%'" : "province like '%{$province}%'";
                } else {
                    $where .= $where ? " and province='{$province}'" : "province='{$province}'";
                }
            }
            $post_list = $this->score->post_list_page($offset, $per_page, $where, 'province asc,post_code asc');
        }

        $this->load->library('pagination');
        $config['uri_segment'] = 3;
        $config['num_links'] = 5;
        $config['use_page_numbers'] = TRUE;
        $config['full_tag_open'] = '<ul>';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = '首页';
        $config['first_tag_open'] = '<li class="prev disabled">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = '末页 ';
        $config['last_tag_open'] = '<li class="next disabled">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = '下一页 ';
        $config['next_tag_open'] = '<li class="next">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '上一页';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $base_url = '/paiming/reg/view_post/?study_section=' . ($study_section ? urlencode($study_section) : '') . '&subject=' . ($subject ? urlencode($subject) : '') . '&province=' . ($province ? $province : '');
        $config['base_url'] = $base_url;         //地址路径
        $config['total_rows'] = $this->score->post_total($where);                               //总的内容 条数
        $config['per_page'] = 20;
        $config['page_query_string'] = TRUE;
        //每页显示数量，默认显示25条
        $this->pagination->initialize($config);                  //加载配置信息
        $post_arr = $data = $area_arr = array();
        if ($post_list['list']) {
            foreach ($post_list['list'] as $r) {
                $post_arr[$r['province']][] = $r;
                $area_arr[$r['province']] = $r['area'];
            }
        }
        $postArr = $areaArr = array();
        foreach ($post_arr as $k => $v) {
            foreach ($v as $r) {
                $temp = array();
                if (!in_array($k, $areaArr)) {
                    $areaArr[] = $k;
                    $temp['area'] = $area_arr[$k];
                    $temp['rowspan'] = count($v);
                }
                $temp['company'] = $r['company'];
                $temp['post_code'] = $r['post_code'];
                $temp['post_name'] = $r['post_name'];
                $temp['num'] = $r['num'];
                $temp['study_section'] = $r['study_section'];
                $temp['subject'] = $r['subject'];
                $postArr[] = $temp;
            }
        }
        //学科
        $subject_list = $this->score->post_subject();
        $study_section_list = $this->score->post_study_section();
        $area_list = $this->score->post_area();
        $areaArr = array();
        foreach ($area_list as $value) {
            $province_code = substr($value['province'], 0, 4);
            $areaArr[$province_code][] = $value;
        }
        $data = array(
            'list' => $postArr,
            'subject_list' => $subject_list,
            'study_section_list' => $study_section_list,
            'area_list' => $areaArr,
            'area_map' => $this->proviceMap,
            'page' => $this->pagination->create_links(),
            'study_section' => $study_section,
            'subject' => $subject,
            'province' => $province,
            'total_rows' => $config['total_rows']
        );

        $data['system_config'] = $this->system_config;
        $this->load->view('paiming/view_post_page', $data);
    }


    /**
     * 校验岗位代码是否存在
     */
    public function checkPostCode()
    {
        $code = $this->input->post('code');
        $find = $this->score->check_post_code($code);
        $code = isset($find[0]['post_code']) ? $find[0]['post_code'] : "";
        if ($code) {
            exit(json_encode(array('status' => 1, 'msg' => '岗位代码正确！')));
        } else {
            exit(json_encode(array('status' => 0, 'msg' => '岗位代码错误！')));
        }
    }


    /**
     * 发送短信
     */
    public function sendSms()
    {

        //1.1校验参数

        //验证码
        if (!$this->verify()) {
            $data['status'] = 0;
            $data['msg'] = "验证码校验失败！";
            exit(json_encode($data));
        }

        $phone = $this->input->post('tel');
        if (!$phone) {
            exit(json_encode(array('status' => 0, 'msg' => '请填写手机号码！')));
        }
        $pattern = '/^1[3-9]\d{9}$/';
        preg_match($pattern, $phone, $matchs);

        if (!isset($matchs[0]) || !$matchs[0]) {
            exit(json_encode(array('status' => 0, 'msg' => '无效参数！')));
        }
        $sms_num = $this->score->is_send_sms($phone);

        if (count($sms_num) >= 3) {
            exit(json_encode(array('status' => 0, 'msg' => '20分钟之内只能发送3条，请稍后再发！')));
        }

        //1.3 发送短信
        $sms_code_info = $this->_sms_api($phone);
        if ($sms_code_info['sms_code'] > 0) {
            //插入短信
            $insertSms['code'] = $sms_code_info['code'];
            $insertSms['content'] = $sms_code_info['sms_content'];
            $insertSms['phone'] = $phone;
            $insertSms['send_time'] = time();
            $result = $this->score->insert_sms($insertSms);
            $result || exit(json_encode(array('status' => 0, 'msg' => '发送失败！')));
            $result && exit(json_encode(array('status' => 1, 'msg' => '发送成功！')));
        } else {
            exit(json_encode(array('status' => 0, 'msg' => '发送失败！')));
        }

    }

    private function verify()
    {
        $url = "https://ssl.captcha.qq.com/ticket/verify";
        $params = array(
            "aid" => "2083709460",
            "AppSecretKey" => "0J2Kf2JzDM6kourV1zK8QCA**",
            "Ticket" => $_REQUEST['ticket'],
            "Randstr" => $_REQUEST['randstr'],
            "UserIP" => $this->get_ip()
        );
        $paramstring = http_build_query($params);
        $content = $this->txcurl($url, $paramstring);
        $result = json_decode($content, true);
        if ($result) {
            if ($result['response'] == 1) {
//                print_r($result);
                return true;
            } else {
//                echo $result['response'] . ":" . $result['err_msg'];
                return false;
            }
        } else {
//            echo "请求失败";
            return false;
        }
    }

    private function get_ip()
    {
        if (getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), 'unknown')) {
            $ip = getenv('HTTP_CLIENT_IP');
        } elseif (getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), 'unknown')) {
            $ip = getenv('HTTP_X_FORWARDED_FOR');
        } elseif (getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), 'unknown')) {
            $ip = getenv('REMOTE_ADDR');
        } elseif (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], 'unknown')) {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        $res = preg_match('/[\d\.]{7,15}/', $ip, $matches) ? $matches [0] : '';
        return $res;
    }

    /**
     * 请求接口返回内容
     * @param  string $url [请求的URL地址]
     * @param  string $params [请求的参数]
     * @param  int $ipost [是否采用POST形式]
     * @return  string
     */
    private function txcurl($url, $params = false, $ispost = 0)
    {
        $httpInfo = array();
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_USERAGENT, 'JuheData');
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        if ($ispost) {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
            curl_setopt($ch, CURLOPT_URL, $url);
        } else {
            if ($params) {
                curl_setopt($ch, CURLOPT_URL, $url . '?' . $params);
            } else {
                curl_setopt($ch, CURLOPT_URL, $url);
            }
        }
        $response = curl_exec($ch);
        if ($response === FALSE) {
            //echo "cURL Error: " . curl_error($ch);
            return false;
        }
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $httpInfo = array_merge($httpInfo, curl_getinfo($ch));
        curl_close($ch);
        return $response;
    }

    /**短信发送
     * @param $mobPhone
     */
    public function _sms_api($mobPhone)
    {

        try {
            libxml_disable_entity_loader(false);
            $wsdl = "http://sms3.mobset.com:8080/Api?wsdl";
            $client = new SoapClient($wsdl);
            $client->soap_defencoding = 'utf-8';
            $client->decode_utf8 = false;
            $errMsg = "";
            $strSign = "";
            $addnum = "";
            $timer = "";
            $lCorpID = ****;
            $strLoginName = "****";
            $strPasswd = "****";
            $code = rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);
            $smsContent = "短信验证码:" . $code . ' 有效期5分钟';
            $longSms = 0;
            $strTimeStamp = $this->_GetTimeString();
            $strInput = $lCorpID . $strPasswd . $strTimeStamp;
            $strMd5 = md5($strInput);
//            $groupId=$client->ArrayOfSmsIDList[1];
            $group = $client->ArrayOfMobileList[1];
            $group[0] = $client->MobileListGroup;
            $group[0]->Mobile = $mobPhone;
            $param = array('CorpID' => $lCorpID, 'LoginName' => $strLoginName, 'Password' => $strMd5, 'TimeStamp' => $strTimeStamp, 'AddNum' => $addnum, 'Timer' => $timer, 'LongSms' => $longSms, 'MobileList' => $group,
                'Content' => $smsContent);
            $result = $client->Sms_Send($param);
//            print_r($result);
//            print_r($result->ErrMsg."--短信ID:".$result->SmsIDList->SmsIDGroup->SmsID);
            $sms_code = $result->SmsIDList->SmsIDGroup->SmsID;
            $sms_content = $smsContent;
            return array('sms_code' => $sms_code, 'sms_content' => $sms_content, 'code' => $code);

        } catch (SoapFault $fault) {
//            echo "Error: ",$fault->faultcode,", string: ",$fault->faultstring;
            return array('sms_code' => 0, 'sms_content' => "");;
        }
    }

    private function _GetTimeString()
    {
        date_default_timezone_set('Asia/Shanghai');
        $timestamp = time();
        $hours = date('H', $timestamp);
        $minutes = date('i', $timestamp);
        $seconds = date('s', $timestamp);
        $month = date('m', $timestamp);
        $day = date('d', $timestamp);
        $stamp = $month . $day . $hours . $minutes . $seconds;
        return $stamp;
    }

    /**
     * 注册晒分用户
     */
    public function score()
    {
        $data = $matchs_name = $matchs_score = $matchs_phone = array();
        //校验参数
        $check_pass = trim($this->input->post('check_pass'));
        if (!$check_pass) {
            $data['status'] = 0;
            $data['msg'] = "请先勾选协议！";
            exit(json_encode($data));
        }

        $name = $this->input->post('xingming');
        $pattern = "/[\x{4e00}-\x{9fa5}]+/u";
        $name && preg_match($pattern, $name, $matchs_name);

        if (!$name || !$matchs_name[0]) {
            $data['status'] = 0;
            $data['msg'] = "您的姓名必须是汉字！";
            exit(json_encode($data));
        }

//        $post_code = trim($this->input->post('zwdm'));
//        if (!$post_code) {
//            $data['status'] = 0;
//            $data['msg'] = "请填写岗位代码！";
//            exit(json_encode($data));
//        }

        $area = trim($this->input->post('bkdq'));
        if (!$area || $area==='请选择【报考地区】') {
            $data['status'] = 0;
            $data['msg'] = "请选择【报考地区】！";
            exit(json_encode($data));
        }


        $company = trim($this->input->post('zpdw'));
        if (!$company || $company==='请选择【招聘单位】') {
            $data['status'] = 0;
            $data['msg'] = "请选择【招聘单位】！";
            exit(json_encode($data));
        }


        $post_name = trim($this->input->post('gwxx'));
        if (!$post_name || $post_name==='请选择【岗位信息】') {
            $data['status'] = 0;
            $data['msg'] = "请选择【岗位信息】！";
            exit(json_encode($data));
        }


//        $find_post = $this->score->check_post_code($post_code);
//        $code = isset($find_post[0]['post_code']) ? $find_post[0]['post_code'] : "";
//
//        if (!$code) {
//            $data['status'] = 0;
//            $data['msg'] = "岗位代码错误！";
//            exit(json_encode($data));
//        }


        $zyk_score = trim($this->input->post('zykfs'));
        $jz_score = trim($this->input->post('jzfs'));

        $pattern = '/^[\d|\.|]+$/';
        preg_match($pattern, $zyk_score, $matchs_score);
        if (!$matchs_score[0] || $zyk_score > 120 || $zyk_score <= 0) {
            $data['status'] = 0;
            $data['msg'] = "请填写真实的专业成绩";
            exit(json_encode($data));
        }

        preg_match($pattern, $jz_score, $matchs_score);
        if (!$matchs_score[0] || $jz_score > 120 || $jz_score <= 0) {
            $data['status'] = 0;
            $data['msg'] = "请填写真实的教综成绩";
            exit(json_encode($data));
        }

        $PhoneCode = trim($this->input->post('PhoneCode'));
        $phone = $this->input->post('shouji');
        $pattern = '/^13[0-9]{9}|^14[5-7]{9}|^15[0-9]{9}|^16[0-9]{9}|^17[0-9]{9}|^18[0-9]{9}|^19[0-9]{9}/';
        preg_match($pattern, $phone, $matchs_phone);


        if (!$phone) {
            $data['status'] = 0;
            $data['msg'] = "请填写手机号码！";
            exit(json_encode($data));
        }

        if (!$matchs_phone[0]) {
            $data['status'] = 0;
            $data['msg'] = "请填写有效手机号码！";
            exit(json_encode($data));
        }

        if (!$PhoneCode) {
            $data['status'] = 0;
            $data['msg'] = "请填写短信验证码！";
            exit(json_encode($data));
        }


        //验证码是否过期
        $cook_code = $this->score->check_code_expire($phone, $PhoneCode);
        if (!isset($cook_code[0]['code']) || !$cook_code[0]['code']) {
            $data['status'] = 0;
            $data['msg'] = "无效短信验证码";
            exit(json_encode($data));
        }

        if (time() - $cook_code[0]['send_time'] > 300) {
            $data['status'] = 0;
            $data['msg'] = "短信验证码已过期，请重新发送！";
            exit(json_encode($data));
        }


        $appinfoid = trim($this->input->post('appinfoid'));
        if (!$appinfoid || $appinfoid != 4707) {
            $data['status'] = 0;
            $data['msg'] = "无效参数";
            exit(json_encode($data));
        }

        //总成绩
        $score = ($jz_score * 0.4) + ($zyk_score * 0.6);
        $score = ceil($score) == $score ? $score : sprintf('%.1f', $score);
        //1.2判断是否已注册
        $find = $this->score->check_isreg($phone);
        $phone_exisit = isset($find[0]['phone']) ? $find[0]['phone'] : "";
        if ($phone_exisit) {
//            $updateData['name'] = $name;
//            $updateData['zyk_score'] = $zyk_score;
//            $updateData['jz_score'] = $jz_score;
//            $updateData['score'] = $score;
//            $updateData['province'] = substr($find_post[0]['province'],0,4);
//            $updateData['study_section'] = $find_post[0]['study_section'];
//            $updateData['subject'] = $find_post[0]['subject'];
//            $updateData['last_update_time'] = date('Y-m-d H:i:s');
//            $Updateresult = $this->score->update_reg($find[0]['id'], $updateData);
//            $Updateresult && exit(json_encode(array('status' => 1, 'msg' => '晒分成功！!', 'data' => base64_encode($phone))));
//            $Updateresult || exit(json_encode(array('status' => 0, 'msg' => '晒分失败!')));
            exit(json_encode(array('status' => 2, 'msg' => "已晒分成功！,如果更改分数请前往该页面", 'data' => base64_encode($phone))));
        }

        $area = trim($this->input->post('bkdq'));
        $company = trim($this->input->post('zpdw'));
        $post_name = trim($this->input->post('gwxx'));

        $post_info = $this->score->get_post_info($area,$company,$post_name);
        //1.3 插入数据库
        $insertdata = array(
            'name' => $name,
            'post_code' => $post_info[0]['post_code']?:"",
            'area' => $area,
            'company' => $company,
            'post_name' => $post_name,
            'zyk_score' => $zyk_score,
            'jz_score' => $jz_score,
            'score' => $score,
            'phone' => $phone,
            'province' => substr($post_info[0]['province'], 0, 4),
            'study_section' => $post_info[0]['study_section'],
            'subject' => $post_info[0]['subject'],
            'reg_time' => date('Y-m-d H:i:s'),
            'last_update_time' => date('Y-m-d H:i:s'),
            'status' => 1
        );
        $result = $this->score->insert_reg($insertdata);
        if ($result) {
            $data['status'] = 1;
            $data['data'] = base64_encode($phone);
            $data['msg'] = "晒分成功！";
        } else {
            $data['status'] = 0;
            $data['msg'] = "晒分失败！";
        }
        exit(json_encode($data));
    }

    /**
     * 更改分数
     */
    public function update_reg_page()
    {
        $phone = urldecode($_REQUEST['key']);
        $phone = base64_decode($phone);
        $data['system_config'] = $this->system_config;
        $data['phone'] = $phone;
        if ($_POST) {
            $phone = $this->input->post('shouji');
            $zyk_score = trim($this->input->post('zykfs'));
            $jz_score = trim($this->input->post('jzfs'));
            $pattern = '/^13[0-9]{9}|^14[5-7]{9}|^15[0-9]{9}|^17[0-9]{9}|^18[0-9]{9}|^19[1-3]{9}/';
            preg_match($pattern, $phone, $matchs_phone);

            if (!$phone) {
                $data['status'] = 0;
                $data['msg'] = "请填写手机号码！";
                exit(json_encode($data));
            }
            if (!$matchs_phone[0]) {
                $data['status'] = 0;
                $data['msg'] = "请填写有效手机号码！";
                exit(json_encode($data));
            }

            $pattern = '/^[\d|\.|]+$/';
            preg_match($pattern, $zyk_score, $matchs_score);
            if (!$matchs_score[0] || $zyk_score > 120 || $zyk_score <= 0) {
                $data['status'] = 0;
                $data['msg'] = "请填写真实的专业课成绩";
                exit(json_encode($data));
            }

            preg_match($pattern, $jz_score, $matchs_score);
            if (!$matchs_score[0] || $jz_score > 120 || $jz_score <= 0) {
                $data['status'] = 0;
                $data['msg'] = "请填写真实的教综课成绩";
                exit(json_encode($data));
            }
            //总成绩
            $score = ($jz_score * 0.4) + ($zyk_score * 0.6);
            $score = ceil($score) == $score ? $score : sprintf('%.1f', $score);
            //1.2判断是否已注册
            $find = $this->score->check_isreg($phone);
            $phone_exisit = isset($find[0]['phone']) ? $find[0]['phone'] : "";
            if ($phone_exisit) {
                $updateData['zyk_score'] = $zyk_score;
                $updateData['jz_score'] = $jz_score;
                $updateData['score'] = $score;
                $updateData['last_update_time'] = date('Y-m-d H:i:s');
                $Updateresult = $this->score->update_reg($find[0]['id'], $updateData);
                $Updateresult && exit(json_encode(array('status' => 1, 'msg' => '更改分数成功！!', 'data' => base64_encode($phone))));
                $Updateresult || exit(json_encode(array('status' => 0, 'msg' => '更改分数失败!')));
            } else {
                exit(json_encode(array('status' => 2, 'msg' => '还没有晒分赶紧晒分吧！')));
            }

        }
        $this->load->view('paiming/update_reg_page', $data);
    }

    public function test()
    {
        $this->load->view('paiming/test');
    }
}