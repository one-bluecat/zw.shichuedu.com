<?php


class system extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('common'));
    }


    public function config()
    {
        if ($data = $this->input->post()) {
            $find = $this->common->get_one('system_config', 'id>0');
            if ($find) {
                if ($data['config']['year']) {
                    $updateData['year'] = $data['config']['year'];
                }
                if ($data['config']['rank_year']) {
                    $updateData['rank_year'] = $data['config']['rank_year'];
                }
                if ($data['config']['last_time']) {
                    $updateData['last_time'] = $data['config']['last_time'];
                }
                if ($data['config']['zhiwei_newupdate_time']) {
                    $updateData['zhiwei_newupdate_time'] = $data['config']['zhiwei_newupdate_time'];
                }

                if ($data['config']['fs_newupdate_time']) {
                    $updateData['fs_newupdate_time'] = $data['config']['fs_newupdate_time'];
                }
                $updateData['last_update_time'] = date('Y-m-d H:i:s');

                if($data['config']['ai_year']){
                    $updateData['ai_year'] = $data['config']['ai_year'];
                }

                $this->common->update('system_config', array('id' => $find['id']), $updateData);
            } else {
                $this->common->insert('system_config', array('year' => $data['config']['year'], 'add_time' => date('Y-m-d H:i:s'), 'last_update_time' => date('Y-m-d H:i:s')));
            }
            $this->json(array('code' => 0, 'msg' => '保存成功！'));
        }
        $find = $this->common->get_one('system_config', 'id>0');
        $this->load_view('system/config', $find);
    }
}