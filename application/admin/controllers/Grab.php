<?php


class Grab extends CI_Controller
{

    private $base_url = "http://";


    public function __construct()
    {
        parent::__construct();
        error_reporting(E_ALL & ~E_NOTICE);
        $this->load->model('grabs');
    }

    /**
     * 获取首页内容 城市链接
     */
    public function index()
    {
        set_time_limit(3600);
        $HomeContent = $this->_remote_curl($this->base_url . 'jszwb/jsfsx/');
        $pattern = '/<a target="_blank" href="(?P<link_url>(.*?)\d+(.*?))">(?P<city_name>.*?)<\/a>/';
        preg_match_all($pattern, $HomeContent, $matchs);
        if (!isset($matchs['link_url'])) {
            show_error('抓取城市链接地址失败！');
        }
        $this->_getCityContent($matchs['link_url']);
    }


    /**获取城市内容 县 区 链接
     * @param $cityUrl
     */
    private function _getCityContent($cityUrl)
    {
        foreach ($cityUrl as $url) {
            $CityContent = $this->_remote_curl($url);
            $pattern = '/<a href=\'\.\.(?P<link_url>.*?)\'>(?P<area_name>.*?)<\/a>/';
            preg_match_all($pattern, $CityContent, $matchs);
            if (!isset($matchs['link_url'])) {
                show_error('抓取县、区链接地址失败！');
            }
            $this->_getAreaContent($matchs['link_url']);
        }

    }


    /**获取区、县内容 职位详情链接
     * @param $areaUrl
     */
    private function _getAreaContent($areaUrl)
    {
        foreach ($areaUrl as $url) {
            $url = $this->base_url . 'jscj/' . $url;
            $AreaContent = $this->_remote_curl($url);
            $pattern = '/<a href=\'\.\.\/\.\.(?P<link_url>.*?)\' class=\'num table3\'>.*?<\/a>/';
            preg_match_all($pattern, $AreaContent, $matchs);
            if (!isset($matchs['link_url'])) {
                show_error('抓取职位链接地址失败！');
            }
            $this->_zhiWeiContent($matchs['link_url']);
        }
    }


    private function _zhiWeiContent($zhiWeiUrl)
    {

        foreach ($zhiWeiUrl as $url) {
            $url = $this->base_url . 'jscj/' . $url;
            $find = $this->grabs->find_grab_log($url);
            if ($find) {
                continue;
            }
            $DetailContent = $this->_remote_curl($url);
            $pattern = '/<tr>.*职位代码<\/td><td>(?P<code>\d+)<\/td><\/tr>/';
            preg_match_all($pattern, $DetailContent, $matchs);
            if (!isset($matchs['code'][0])) {
                continue;
            }
            $temp = array();
            $code = $matchs['code'][0];
            $temp['post_code'] = $code;
            //获取报名人数 、资格审查合格、缴费人数、竞争比
            $pattern = '/<tr style="background:#ececec;"><td>(?P<key>.*?)<\/td><td>(?P<value>(\d+\.\d+)|(\d+)).*<\/td><\/tr>/';
            preg_match_all($pattern, $DetailContent, $matchs);
            foreach ($matchs['key'] as $k => $name) {
                if ($name == '报名人数') {
                    $temp['apply_num'] = $matchs['value'][$k];
                }
                if ($name == '资格审查合格') {
                    $temp['pass_num'] = $matchs['value'][$k];
                }
                if ($name == '缴费人数') {
                    $temp['pay_num'] = $matchs['value'][$k];
                }
                if ($name == '竞争比') {
                    $temp['compete_rate'] = $matchs['value'][$k];
                }

            }
            if ($code) {
                $this->grabs->insert_grab_log($url);
                $this->grabs->update_post_table($temp);
            }
        }

    }


    private function _remote_curl($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 120);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
        $result = curl_exec($ch);
        curl_close($ch);
        $result = mb_convert_encoding($result, 'utf-8', 'UTF-8,GBK,GB2312,BIG5');
        return $result;
    }

    //手动更新缴费人数
    public function grab_data()
    {
        set_time_limit(0);
        $data = array();
        $row = 0;
        $post_code_array = array();
        for ($i = 1; $i <= 23; $i++) {
            //$content = $this->_remote_curl("http://jszp.ahzsks.cn/findStatistic-0-0-0-{$i}.do");
            //$content = $this->_remote_curl("http://101.37.79.151/findStatistic-0-0-3411-{$i}.do");//2022滁州
            $content = $this->_remote_curl("http://114.55.90.238/findStatistic-0-0-3412-{$i}.do");//2022阜阳
            $pattern = '/<tr>[^\"]*<td align="left">([^\"]*)<\/td>[^\"]*<td align="left" alt="[^\\"]*">([^\"]*)<\/td>[^\"]*<td align="left" alt="[^\\"]*">([^\"]*)<\/td>[^\"]*<td align="left" alt="[^\\"]*">([^\"]*)<\/td>[^\"]*<td align="left" alt="[^\\"]*">([^\"]*)<\/td>[^\"]*<td align="right" alt="[^\\"]*">([^\"]*)<\/td>[^\"]*<td align="right" alt="[^\\"]*">([^\"]*)<\/td>[^\"]*<td align="right" alt="[^\\"]*">([^\"]*)<\/td>[^\"]*<td align="right" alt="[^\\"]*">([^\"]*)<\/td>/';
            preg_match_all($pattern, $content, $matchs);
            if(empty($matchs[1])){
                break;
            }
            foreach ($matchs[1] as $key=>$value){
                $temp = array();
                preg_match('/\d+/', $matchs[3][$key], $post_code_arr);
                preg_match('/[\x{4e00}-\x{9fa5}]+/u', $matchs[4][$key], $post_name_arr);
                $temp['post_code'] = trim($post_code_arr[0]);
                $temp['num'] = intval(trim($matchs[6][$key]));
                $temp['apply_num'] = intval(trim($matchs[7][$key]));
                $temp['pass_num'] = intval(trim($matchs[8][$key]));
                $temp['pay_num'] = intval(trim($matchs[9][$key]));
                if(!in_array($temp['post_code'],$post_code_array)){
                    $post_code_array[] = $temp['post_code'];
                }else{
                    break;
                }
                $data[] = $temp;
            }
        }
        $year = date('Y');
        $total = count($data);
        $success = $error = 0;
        foreach ($data as $k => $value) {
            $find = $this->grabs->find_one($data[$k], $year);
            if ($find) {
                unset($data[$k]['num']);
                $this->grabs->update_post_table($data[$k],$year);
                $success++;
            } else {
                $error++;
            }
        }

        echo '<div style="color: red;font-weight: bold">抓取成功总条数:' . $total . '</div>';
        echo '<div style="color: red;font-weight: bold">更新成功条数:' . $success . '</div>';
        echo '<div style="color: red;font-weight: bold">更新失败条数:' . $error . '</div>';

    }
    
    public function grab_data_23chuzhou()
    {
        set_time_limit(0);
        $data = array();
        $row = 0;
        $post_code_array = array();
        for ($i = 1; $i <= 14; $i++) {

            $content = $this->_remote_curl("http://101.37.79.151/findStatistic-0-0-3411-{$i}.do");
            $pattern = '/<tr>[^\"]*<td align="left">([^\"]*)<\/td>[^\"]*<td align="left" alt="[^\\"]*">([^\"]*)<\/td>[^\"]*<td align="left" alt="[^\\"]*">([^\"]*)<\/td>[^\"]*<td align="left" alt="[^\\"]*">([^\"]*)<\/td>[^\"]*<td align="left" alt="[^\\"]*">([^\"]*)<\/td>[^\"]*<td align="right" alt="[^\\"]*">([^\"]*)<\/td>[^\"]*<td align="right" alt="[^\\"]*">([^\"]*)<\/td>[^\"]*<td align="right" alt="[^\\"]*">([^\"]*)<\/td>[^\"]*<td align="right" alt="[^\\"]*">([^\"]*)<\/td>/';
            preg_match_all($pattern, $content, $matchs);
            if(empty($matchs[1])){
                break;
            }
            foreach ($matchs[1] as $key=>$value){
                $temp = array();
                preg_match('/\d+/', $matchs[3][$key], $post_code_arr);
                preg_match('/[\x{4e00}-\x{9fa5}]+/u', $matchs[4][$key], $post_name_arr);
                $temp['post_code'] = trim($post_code_arr[0]);
                $temp['num'] = intval(trim($matchs[6][$key]));
                $temp['apply_num'] = intval(trim($matchs[7][$key]));
                $temp['pass_num'] = intval(trim($matchs[8][$key]));
                $temp['pay_num'] = intval(trim($matchs[9][$key]));
                if(!in_array($temp['post_code'],$post_code_array)){
                    $post_code_array[] = $temp['post_code'];
                }else{
                    break;
                }
                $data[] = $temp;
            }
        }
        $year = date('Y');
        $total = count($data);
        $success = $error = 0;
        foreach ($data as $k => $value) {
            $find = $this->grabs->find_one($data[$k], $year);
            if ($find) {
                unset($data[$k]['num']);
                $this->grabs->update_post_table($data[$k],$year);
                $success++;
            } else {
                $error++;
            }
        }

        echo '<div style="color: red;font-weight: bold">抓取成功总条数:' . $total . '</div>';
        echo '<div style="color: red;font-weight: bold">更新成功条数:' . $success . '</div>';
        echo '<div style="color: red;font-weight: bold">更新失败条数:' . $error . '</div>';

    }

    //收到抓取职位表
    public function zhiwei()
    {
        set_time_limit(0);
        $data = array();
        $row = 1;
        $year = date('Y');
        // $provinceArr = array('340101','340102','340103','340104','340111','340112','340113','340114','340121','340122','340123','340124','340181','340201','340202','340203','340207','340208','340209','340221','340222','340223','340225','340301','340302','340303','340304','340311','340312','340313','340321','340322','340323','340401','340402','340403','340404','340405','340406','340407','340408','340409','340421','340422','340501','340503','340504','340506','340507','340521','340522','340523','340601','340602','340603','340604','340621','340701','340702','340711','340721','340723','340801','340802','340803','340811','340812','340813','340822','340824','340825','340826','340827','340828','340881','341001','341002','341003','341004','341021','341022','341023','341024','341101','341102','341103','341122','341124','341125','341126','341181','341182','341201','341202','341203','341204','341205','341221','341222','341225','341226','341282','341301','341302','341321','341322','341323','341324','341501','341502','341503','341504','341522','341523','341524','341525','341601','341602','341621','341622','341623','341624','341701','341702','341721','341722','341723','341781','341801','341802','341822','341823','341824','341825','341881');
         $provinceArr = array('3411');
        $post_code_array = array();
        foreach ($provinceArr as $province) {
            for ($i = 1; $i <= 14; $i++) {
                $content = $this->_remote_curl("http://101.37.79.151/findZpgw-0-0-{$province}-{$i}.do");
                //$content = $this->_remote_curl("http://jszp.ahzsks.cn/findZpgw-0-0-{$province}-{$i}.do");
                //$content = $this->_remote_curl("http://101.37.79.151/findZpgw-0-0-{$province}-{$i}.do");//2022滁州
                //$content = $this->_remote_curl("http://114.55.90.238/findZpgw-0-0-{$province}-{$i}.do");//2022阜阳
                $pattern = '/<td align="right">([^\"]*)<\/td>[^\"]*<td align="left">([^\"]*)<\/td>[^\"]*<td align="left">([^\"]*)<\/td>[^\"]*<td align="left">([^\"]*)<\/td>[^\"]*<td align="center">([^\"]*)<\/td>[^\"]*<td align="center">([^\"]*)<\/td>[^\"]*<td align="right">([^\"]*)<\/td>/';
                //$content = str_replace(array("\r\n","\r","\n"),"",$content);
                preg_match_all($pattern, $content, $matchs);


                $pattern = '/<tr style="display: none;">[^\"]*<td align="left" colspan="8" style="line-height:25px">[^\"]*<span class="b" style="float:left; width:150px; text-align:right;">([^\"]*)<\/span>([^\"]*)<br \/>[^\"]*<span class="b" style="float:left; width:150px; text-align:right;">([^\"]*)<\/span>([^\"]*)<br \/>[^\"]*<span class="b" style="float:left; width:150px; text-align:right;">([^\"]*)<\/span>([^\"]*)<br \/>[^\"]*<span class="b" style="float:left; width:150px; text-align:right;">([^\"]*)<\/span>([^\"]*)<br \/>[^\"]*<span class="b" style="float:left; width:150px; text-align:right;">([^\"]*)<\/span>([^\"]*)<br \/>[^\"]*<span class="b" style="float:left; width:150px; text-align:right;">([^\"]*)<\/span>([^\"]*)<br \/>[^\"]*<span class="b" style="float:left; width:150px; text-align:right;">([^\"]*)<\/span>([^\"]*)<br \/>[^\"]*<span class="b" style="float:left; width:150px; text-align:right;">([^\"]*)<\/span>([^\"]*)<\/td>[^\"]*<\/tr>/';
                //$content = str_replace(array("\r\n","\r","\n"),"",$content);
                preg_match_all($pattern, $content, $matchsDetail);
                // echo '<pre/>';
                // var_dump($matchs);exit;

                foreach ($matchs[2] as $key => $area) {
                    $temp = array();
                    $temp['row'] = $row;
                    $temp['year'] = $year;
                    $temp['province'] = $province;
                    $temp['area'] = trim($area);
                    $temp['company'] = trim($matchs[3][$key]);
                    $post_info = explode('&nbsp;',$matchs[4][$key]);
//                    preg_match('/\d+/', $matchs[4][$key], $post_code_arr);
//                    preg_match('/[\x{4e00}-\x{9fa5}]+/u', $matchs[4][$key], $post_name_arr);
                    $temp['post_code'] = trim($post_info[0]);
                    $temp['post_name'] = trim($post_info[1]);
                    $temp['study_section'] = trim($matchs[5][$key]);
                    $temp['subject'] = trim($matchs[6][$key]);
                    $temp['num'] = intval(trim($matchs[7][$key]));

                    //查询详情
                    if (strstr($matchsDetail[1][$key], '单列计划')) {
                        $temp['single_plan'] = trim($matchsDetail[2][$key]);
                    }

                    if (strstr($matchsDetail[7][$key], '学历')) {
                        $temp['degree'] = trim($matchsDetail[8][$key]);
                    }

                    if (strstr($matchsDetail[9][$key], '是否需要学位')) {
                        $temp['is_need_degree'] = trim($matchsDetail[10][$key]);
                    }

                    if (strstr($matchsDetail[5][$key], '年龄')) {
                        $temp['age'] = trim($matchsDetail[6][$key]);
                    }

                    if (strstr($matchsDetail[11][$key], '是否高校毕业生计划')) {
                        $temp['university_graduate_plan'] = trim($matchsDetail[12][$key]);
                    }


                    if (strstr($matchsDetail[13][$key], '专业')) {
                        $temp['profession'] = trim($matchsDetail[14][$key]);
                    }


                    if (strstr($matchsDetail[3][$key], '教师资格')) {
                        $temp['teacher_qualification'] = trim($matchsDetail[4][$key]);
                    }

                    $temp['city_plan'] = '';
                    $temp['town_plan'] = '';


                    if (strstr($matchsDetail[15][$key], '备注')) {
                        $temp['memo'] = str_replace('<br>','',trim($matchsDetail[16][$key]));
                    }

                    $temp['single_plan_memo'] = '';

                    if (in_array($temp['post_code'], $post_code_array) || !$temp['post_code']) {
                        break 2;
                    } else {
                        $post_code_array[] = $temp['post_code'];
                        $data[] = $temp;
                        $row+=1;
                        echo implode('|',$temp).'<br/>';
                    }

                }

            }
        }
        exit;

    }
}