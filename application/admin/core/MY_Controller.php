<?php


class MY_Controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        error_reporting(E_ERROR | E_WARNING | E_PARSE);
        $this->load->library('session');
        $this->load->helper('url');
        $this->check_islogin();
    }

    /**
     * 检查用户是否登录
     */
    private function check_islogin()
    {
        if (!$this->session->has_userdata('user')) {
            redirect('/publics/login/');
        }
    }


    /**加载公共视图
     * @param $view
     * @param $data
     */
    protected function load_view($view, $data = array(), $single = false)
    {

        if ($this->input->is_ajax_request()) {
            echo $this->load->view($view, $data, true);
        } else if ($single) {
            $this->load->view($view, $data);
        } else {
            $userInfo = json_decode($this->session->user, true);
            $this->load->view('public/header', $userInfo);
            $this->load->view('public/memu',array('method_action'=>$this->uri->segment(1).'/'.$this->uri->segment(2)));
            $this->load->view($view, $data);
            $this->load->view('public/footer');
        }

    }

    /**输出json格式数据
     * @param $data
     */

    protected function json($data)
    {
        header('Content-type: text/json');
        exit(json_encode($data));
    }


    /**
     * 数据导出
     * @param array $title 标题行名称
     * @param array $data 导出数据
     * @param string $fileName 文件名
     * @param string $savePath 保存路径
     * @param $type   是否下载  false--保存   true--下载
     * @return string   返回文件全路径
     * @throws PHPExcel_Exception
     * @throws PHPExcel_Reader_Exception
     */
    public function _exportExcel($title = array(), $data = array(), $fileName = '', $savePath = './', $isDown = false)
    {
        ini_set("max_execution_time", "1800");
        ini_set('memory_limit', '1024M');
        require APPPATH . '/libraries/PHPExcel.php';
        require APPPATH . '/libraries/PHPExcel/IOFactory.php';
        $obj = new PHPExcel();

        //横向单元格标识
        $cellName = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM', 'AN', 'AO', 'AP', 'AQ', 'AR', 'AS', 'AT', 'AU', 'AV', 'AW', 'AX', 'AY', 'AZ');
        if ($title) {
            $row = 1;
            $i = 0;
            foreach ($title as $v) {   //设置列标题
                $obj->setActiveSheetIndex(0)->setCellValue($cellName[$i] . $row, $v);
                $i++;
            }
        }
        //填写数据
        if ($data) {
            $row = 2;
            foreach ($data AS $_v) {
                $j = 0;
                foreach ($title AS $field => $_cell) {
                    $obj->getActiveSheet(0)->setCellValue($cellName[$j] . ($row), $_v[$field]);
                    $j++;
                }
                $row++;
            }
        }

        //导出execl
        header('pragma:public');
        header('Content-type:application/vnd.ms-excel;charset=utf-8;name="' . $fileName . '.xls"');
        header("Content-Disposition:attachment;filename=$fileName.xls");//attachment新窗口打印inline本窗口打印
        $objWriter = PHPExcel_IOFactory::createWriter($obj, 'Excel5');
        $objWriter->save('php://output');
        exit();

    }

}