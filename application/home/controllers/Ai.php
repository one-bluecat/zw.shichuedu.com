<?php

defined('BASEPATH') OR exit('No direct script access allowed');
header('Content-type:text/html;charset=utf-8');

class Ai extends MY_Controller
{
    private $data = array();

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('common', 'score'));
        $this->load->helper(array('array'));
    }

    /**
     * 智能AI
     */

    public function ai()
    {

        //城市列表查询
        $this->data = $this->city_list_query();
        $this->data = $this->home_post_query();
        $this->load->view('ai/ai', $this->data);
    }

    public function do_ai()
    {
        sleep(5);
        //校验数据
        $name = $this->input->post('xingming');
        if (!$name) {
            $data['status'] = 0;
            $data['msg'] = "请填写姓名！";
            exit(json_encode($data));
        }
        $pattern = "/[\x{4e00}-\x{9fa5}]+/u";
        $name && preg_match($pattern, $name, $matchs_name);

        if (!$name || !$matchs_name[0]) {
            $data['status'] = 0;
            $data['msg'] = "您的姓名必须是汉字！";
            exit(json_encode($data));
        }
        $kqid = $this->input->post('kqid');
        $kqid = str_replace('  ', '', $kqid);
        if (!$kqid) {
            $data['status'] = 0;
            $data['msg'] = "请选择考区！";
            exit(json_encode($data));
        }

        $study_section = $this->input->post('xueduan');
        if (!$study_section) {
            $data['status'] = 0;
            $data['msg'] = "请选择学段！";
            exit(json_encode($data));
        }

        $subect = $this->input->post('xueke');
        if (!$subect) {
            $data['status'] = 0;
            $data['msg'] = "请选择学科！";
            exit(json_encode($data));
        }
        $jz_score = $this->input->post('jzfs');
        $pattern = '/^[\d|\.|]+$/';
        preg_match($pattern, $jz_score, $matchs_score);
        if (!$matchs_score[0] || $jz_score > 120 || $jz_score <= 0) {
            $data['status'] = 0;
            $data['msg'] = "请填写真实的教综课成绩";
            exit(json_encode($data));
        }
        $zyk_score = $this->input->post('zykfs');
        preg_match($pattern, $zyk_score, $matchs_score);
        if (!$matchs_score[0] || $zyk_score > 120 || $zyk_score <= 0) {
            $data['status'] = 0;
            $data['msg'] = "请填写真实的专业课成绩";
            exit(json_encode($data));
        }

        $PhoneCode = trim($this->input->post('PhoneCode'));
        $phone = $this->input->post('shouji');
        $pattern = '/^13[0-9]{9}|^14[5-7]{9}|^15[0-9]{9}|^17[0-9]{9}|^18[0-9]{9}|^19[1-3]{9}/';
        preg_match($pattern, $phone, $matchs_phone);

        if (!$PhoneCode) {
            $data['status'] = 0;
            $data['msg'] = "请填写短信验证码！";
            exit(json_encode($data));
        }


        // 验证码是否过期
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

        $url = 'kqid=' . $kqid . '&xueduan=' . $study_section . '&xueke=' . $subect . '&jzfs=' . $jz_score . '&zykfs=' . $zyk_score;
        $data['status'] = 1;
        $data['msg'] = "提交成功！";
        $data['data'] = base64_encode(urlencode($url));
        $insertData['username'] = $name;
        $insertData['phone'] = $phone;
        $insertData['area'] = $kqid;
        $insertData['study_section'] = $study_section;
        $insertData['subject'] = $subect;
        $insertData['jzfs'] = $jz_score;
        $insertData['zykfs'] = $zyk_score;
        $insertData['add_time'] = date('Y-m-d H:i:s');
        $this->common->insert('ai_data', $insertData);
        exit(json_encode($data));


    }

    public function ai_result()
    {
        $this->data = $this->city_list_query();
        $randstr = $this->input->get('randstr');
        $randstr = base64_decode($randstr);
        $post = urldecode($randstr);
        $post_data = explode('&', $post);
        $post = array();
        foreach ($post_data as $value) {
            list($k, $v) = explode('=', $value);
            $post[$k] = $v;
        }

        $jz_score = intval($post['jzfs']);
        $zyk_score = intval($post['zykfs']);
        $kqid = $post['kqid'];
        $study_section = $post['xueduan'];
        $subect = $post['xueke'];

        $this->data['title'] = $kqid . '-' . $study_section . '-' . $subect;


        $year = $this->data['system_config']['ai_year'];
        $where = "year='{$year}' and area like '{$kqid}%' and study_section like '%{$study_section}%' and subject like '%{$subect}%'";
        //职位推荐
        // 县区
        $field = "province,company as name,count(*) as post_num,SUM(num) as require_num,sum(apply_num) as apply_num,sum(pass_num) as pass_num,sum(pay_num) as pay_num";
        $group = "company";
        $stat_list = $this->common->home_list('post_table', $field, $where, $group);
//        echo $this->common->get_last_query();


        foreach ($stat_list as $value) {
            $province = substr($value['province'], 0, 4);
            $categories[] = "'{$value['name']}'";
            $zhiwei[] = $value['post_num'];
            $zhaokao[] = $value['require_num'];
            $baoming[] = $value['apply_num'];
            $hege[] = $value['pass_num'];
            $jiaofei[] = $value['pay_num'];
            $jzb = sprintf('%.1f', $value['pay_num'] / $value['require_num']);
            $jingzhengbi[] = $jzb;
        }
        $this->data['categories'] = $categories;
        $this->data['zhiwei'] = $zhiwei;
        $this->data['zhaokao'] = $zhaokao;
        $this->data['baoming'] = $baoming;
        $this->data['hege'] = $hege;
        $this->data['jiaofei'] = $jiaofei;
        $this->data['jingzhengbi'] = $jingzhengbi;

        //城市
        $where = "year='{$year}' and province like '{$province}%' and study_section like '%{$study_section}%' and subject like '%{$subect}%'";
        $field = "SUBSTR(province,1,4) as province,area as name,count(*) as post_num,SUM(num) as require_num,sum(apply_num) as apply_num,sum(pass_num) as pass_num,sum(pay_num) as pay_num";
        $group = "area";
        $stat_list2 = $this->common->home_list('post_table', $field, $where, $group);


        foreach ($stat_list2 as $value) {
            $categories2[] = "'{$value['name']}'";
            $zhiwei2[] = $value['post_num'];
            $zhaokao2[] = $value['require_num'];
            $baoming2[] = $value['apply_num'];
            $hege2[] = $value['pass_num'];
            $jiaofei2[] = $value['pay_num'];
            $jzb2 = sprintf('%.1f', $value['pay_num'] / $value['require_num']);
            $jingzhengbi2[] = $jzb2;
        }
        $this->data['categories2'] = $categories2;
        $this->data['zhiwei2'] = $zhiwei2;
        $this->data['zhaokao2'] = $zhaokao2;
        $this->data['baoming2'] = $baoming2;
        $this->data['hege2'] = $hege2;
        $this->data['jiaofei2'] = $jiaofei2;
        $this->data['jingzhengbi2'] = $jingzhengbi2;

        $this->data['title2'] = $this->data['city_map'][$province]['zh'] . '-' . $study_section . '-' . $subect;

//        echo $this->common->get_last_query();
//        var_export($categories2);
//        var_export($zhiwei);
//        exit;
        //分数

        //区县
        $where = "year='{$year}' and area like '{$kqid}%'  and study_section like '%{$study_section}%' and subject like '%{$subect}%'";
        $field = "year,province,post_code,company as name";
        $group = "company,post_code";
        $stat_list3 = $this->common->home_list('post_table', $field, $where, $group);

        $categories3 = $score_arr = $company_arr = array();
        foreach ($stat_list3 as $k => $value) {
            $low_score_info = $this->common->home_list('pass_user', 'id,score', "year='{$value['year']}' and post_code='{$value['post_code']}'", '', 'score asc', 1);
            $score = $low_score_info[0]['score'] ? $low_score_info[0]['score'] : 0;
            $stat_list3[$k]['score'] = $score;
            $company_arr[$value['name']][] = $score;
        }

        foreach ($company_arr as $company => $lower) {
            $categories3[] = "'{$company}'";
            $score_arr[] = min($lower);
        }

        $this->data['categories3'] = $categories3;
        $this->data['score'] = $score_arr;


        //城市
        $where = "year='{$year}' and province like '{$province}%' and study_section like '%{$study_section}%' and subject like '%{$subect}%'";
        $field = "year,post_code,area as name";
        $group = "company,post_code";
        $stat_list4 = $this->common->home_list('post_table', $field, $where, $group);

        $comany_arr = array();
        foreach ($stat_list4 as $k => $value) {
            $low_score_info = $this->common->home_list('pass_user', 'id,score', "year='{$value['year']}' and post_code='{$value['post_code']}'", '', 'score asc', 1);
            $score = $low_score_info[0]['score'] ? $low_score_info[0]['score'] : 0;
            $stat_list4[$k]['score'] = $score;
            $comany_arr[$value['name']][] = $score;
        }
        $categories4 = $score_arr2 = array();
        foreach ($comany_arr as $company => $value) {
            $categories4[] = "'{$company}'";
            $score_arr2[] = min($value);
        }
        $this->data['categories4'] = $categories4;
        $this->data['score2'] = $score_arr2;


//        echo $this->common->get_last_query();


//        var_export($categories3);
//        var_export($score_arr);
//        exit;

        //AI智能推荐
        $where = "level_type=2 and study_section like '%{$study_section}%' and subject like '%{$subect}%' and score_min<={$zyk_score} and score_max>={$zyk_score}";
        $field = "link_url,img_url";
        $ai_list = array();
        $zyk_list = $this->common->admin_list('ai_config', $field, $where, 'id desc');
        foreach ($zyk_list as $value) {
            $temp = array();
            $temp['link_url'] = $value['link_url'];
            $temp['img_url'] = $value['img_url'];
            $ai_list[] = $temp;
        }

        $where = "level_type=1 and score_min<={$jz_score} and score_max>={$jz_score}";
        $jz_list = $this->common->admin_list('ai_config', $field, $where, 'id desc');

        foreach ($jz_list as $value) {
            $temp = array();
            $temp['link_url'] = $value['link_url'];
            $temp['img_url'] = $value['img_url'];
            $ai_list[] = $temp;
        }
//        echo $this->common->get_last_query();

        $this->data['ai_list'] = $ai_list;
//        var_export($ai_list);
//        var_export($jz_list);
//        exit;
        $this->load->view('ai/do_ai', $this->data);
    }


    public function check()
    {
        sleep(5);
        $phone = $this->input->post('phone');
        $list = $this->common->admin_list('ai_data', "id,area,study_section,subject,jzfs,zykfs", "phone='{$phone}'", 'id desc');
        $find = $list[0];
        if ($find) {
            $kqid = $find['area'];
            $study_section = $find['study_section'];
            $subject = $find['subject'];
            $jz_score = intval($find['jzfs']);
            $zyk_score = intval($find['zykfs']);
            $url = 'kqid=' . $kqid . '&xueduan=' . $study_section . '&xueke=' . $subject . '&jzfs=' . $jz_score . '&zykfs=' . $zyk_score;
            $data['status'] = 1;
            $data['msg'] = "提交成功！";
            $data['data'] = base64_encode(urlencode($url));
            exit(json_encode($data));
        } else {
            exit(json_encode(array('status' => 0)));
        }

    }


    public function get_study_section()
    {
        $this->data = $this->city_list_query();
        $year = $this->data['system_config']['ai_year'];
        $area = $this->input->post('kqid');
        $area = str_replace('  ', '', $area);
        $list = $this->common->admin_list('post_table', "id,study_section", "area='{$area}' and year='{$year}'", 'id desc', 'study_section');
//        echo $this->common->get_last_query();exit;
        if (!$list) {
            $year = $year - 1;
            $list = $this->common->admin_list('post_table', "id,study_section", "area='{$area}' and year='{$year}'", 'id desc', 'study_section');
        }

        if ($list) {
            exit(json_encode(array('status' => 1, 'data' => $list)));
        } else {
            exit(json_encode(array('status' => 0)));
        }
    }

    public function get_subject()
    {
        $this->data = $this->city_list_query();
        $year = $this->data['system_config']['ai_year'];
        $area = $this->input->post('kqid');
        $area = str_replace('  ', '', $area);
        $study_section = $this->input->post('xueduan');
        $list = $this->common->admin_list('post_table', "id,subject", "area='{$area}' and study_section='{$study_section}' and year='{$year}'", 'id desc', 'subject');
        if (!$list) {
            $year = $year - 1;
            $list = $this->common->admin_list('post_table', "id,subject", "area='{$area}' and study_section='{$study_section}' and year='{$year}'", 'id desc', 'subject');
        }

        if ($list) {
            exit(json_encode(array('status' => 1, 'data' => $list)));
        } else {
            exit(json_encode(array('status' => 0)));
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

        if (count($sms_num) >= 6) {
            exit(json_encode(array('status' => 0, 'msg' => '20分钟之内只能发送6条，请稍后再发！')));
        }

        //1.3 发送短信
        $sms_code_info = $this->_sms_api($phone);
        if ($sms_code_info['sms_code'] > 0) {
            //插入短信
            $insertSms['type'] = 2;
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


}