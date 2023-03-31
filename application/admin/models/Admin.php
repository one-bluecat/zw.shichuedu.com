<?php


class Admin extends CI_Model
{
    /**
     * 密码加密
     * @param $password
     * @param int $algo
     * @param $options
     * @return bool|string
     */
    public function hash($password, $algo = PASSWORD_DEFAULT, $options = array())
    {
        return password_hash($password, $algo, $options);
    }


    /**
     * 校验
     * @param $password
     * @param $hash
     * @return bool
     */
    public function check($password, $hash)
    {
        return password_verify($password, $hash);
    }
}