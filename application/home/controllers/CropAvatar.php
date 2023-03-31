<?php

defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(E_ALL);

class CropAvatar extends MY_Controller
{
    private $src;
    private $data;
    private $file;
    private $dst;
    private $type;
    private $extension;
    private $msg;

    function __construct()
    {
        ini_set('memory_limit', '1024M');
        parent::__construct();
        $this->load->model(array('common'));

    }


    private function init($src, $data, $file)
    {
        $this->setSrc($src);
        $this->setData($data);
        $this->setFile($file);
        $this->crop($this->src, $this->dst, $this->data);
    }

    public function uploadpic()
    {

        error_reporting(0);//禁用错误报告
        if ($_POST) {
            header('Content-type:text/html;charset=utf-8');
            $base64_image_content = $_POST['imgBase'];
            //将base64编码转换为图片保存
            if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image_content, $result)) {
                $type = $result[2];
                $new_file = "./uploads/crop-avatar/";
                if (!file_exists($new_file)) {
                    //检查是否有该文件夹，如果没有就创建，并给予最高权限
                    mkdir($new_file, 0700);
                }
                $img = time() . ".{$type}";
                $new_file = $new_file . $img;
                //将图片保存到指定的位置
                if (file_put_contents($new_file, base64_decode(str_replace($result[1], '', $base64_image_content)))) {
                    echo 'true';
                } else {
                    echo 'false';
                }
            } else {
                echo 'false';
            }

        }
//        $this->init($_POST['avatar_src'], $_POST['avatar_data'], $_FILES['avatar_file']);
////        $crop = new CropAvatar($_POST['avatar_src'], $_POST['avatar_data'], $_FILES['avatar_file']);
//        $response = array(
//            'state' => 200,
//            'message' => $this->getMsg(),
//            'result' => $this->getResult()
//        );
//        echo json_encode($response);
//        exit();

    }


    public function index()
    {
//        $this->load->view('cropAvatar/index');
        $this->load->view('cropAvatar/crop');
    }


    private function setSrc($src)
    {
        if (!empty($src)) {
            $type = exif_imagetype($src);

            if ($type) {
                $this->src = $src;
                $this->type = $type;
                $this->extension = image_type_to_extension($type);
                $this->setDst();
            }
        }
    }

    private function setData($data)
    {
        if (!empty($data)) {
            $this->data = json_decode(stripslashes($data));
        }
    }

    private function setFile($file)
    {
        $errorCode = $file['error'];

        if ($errorCode === UPLOAD_ERR_OK) {
            if (strstr($file['type'], 'png')) {
                $type = IMAGETYPE_PNG;
            } elseif (strstr($file['type'], 'jpg') || strstr($file['type'], 'jpeg')) {
                $type = IMAGETYPE_JPEG;
            } elseif (strstr($file['type'], 'gif')) {
                $type = IMAGETYPE_GIF;
            }

            if ($type) {
                $extension = image_type_to_extension($type);
                $src = './uploads/crop-avatar/' . date('YmdHis') . '.original' . $extension;
                if ($type == IMAGETYPE_GIF || $type == IMAGETYPE_JPEG || $type == IMAGETYPE_PNG) {
                    if (file_exists($src)) {
                        unlink($src);
                    }
                    $result = move_uploaded_file($file['tmp_name'], $src);
                    if ($result) {
                        $this->src = $src;
                        $this->type = $type;
                        $this->extension = $extension;
                        $this->setDst();
                    } else {
                        $this->msg = 'Failed to save file';
                    }
                } else {
                    $this->msg = 'Please upload image with the following types: JPG, PNG, GIF';
                }
            } else {
                $this->msg = 'Please upload image file';
            }
        } else {
            $this->msg = $this->codeToMessage($errorCode);
        }
    }

    private function setDst()
    {
        $this->dst = './uploads/crop-avatar/' . date('YmdHis') . $this->extension;
    }

    private function crop($src, $dst, $data)
    {
        if (!empty($src) && !empty($dst) && !empty($data)) {
            switch ($this->type) {
                case IMAGETYPE_GIF:
                    $src_img = imagecreatefromgif($src);
                    break;

                case IMAGETYPE_JPEG:
                    $src_img = imagecreatefromjpeg($src);
                    break;

                case IMAGETYPE_PNG:
                    $src_img = imagecreatefrompng($src);
                    break;
            }

            if (!$src_img) {
                $this->msg = "Failed to read the image file";
                return;
            }

            $imgInfo = getimagesize($src);
            $image = $src_img;
            $newwid = $data->width;
            $newhei = $data->height;
            $wid = $imgInfo[0];
            $hei = $imgInfo[1];


//            //判断长度和宽度，以方便等比缩放,规格按照500, 320
//            if ($wid > $hei) {
//                $wid = $newwid;
//                $hei = $newwid / ($wid / $hei);
//            } else {
//                $wid = $newhei * ($wid / $hei);
//                $hei = $newhei;
//            }
//            if ($newwid > $wid) {
//                $newwid = $wid;
//            }
//            if ($newhei > $hei) {
//                $newhei = $hei;
//            }
//

            //在内存中建立一张图片
            $images2 = imagecreatetruecolor($newwid, $newhei); //建立一个500*320的图片
            if ($this->type == IMAGETYPE_PNG || $this->type == IMAGETYPE_GIF) {
                $color = imagecolorallocate($images2, 255, 255, 255);
                imagecolortransparent($images2, $color);
                imagefill($images2, 0, 0, $color);
            }
            //将原图复制到新建图片中
            $result = imagecopyresampled($images2, $image, 0, 0, 0, 0, $wid, $hei, $imgInfo[0], $imgInfo[1]);
            //销毁原始图片
            imagedestroy($image);
            //保存图片 到新文件
            if ($this->type == IMAGETYPE_JPEG) {
                $result2 = imagejpeg($images2, $dst, 100); //10代码输出图片的质量 0-100 100质量最高
            } elseif ($this->type == IMAGETYPE_PNG) {
                $result2 = imagepng($images2, $dst, 9); //10代码输出图片的质量 0-100 100质量最高
            } elseif ($this->type == IMAGETYPE_GIF) {
                $result2 = imagegif($images2, $dst, 100); //10代码输出图片的质量 0-100 100质量最高
            }

            //销毁
            imagedestroy($images2);
            if ($result) {
                if (!$result2) {
                    $this->msg = "Failed to save the cropped image file";
                }
            } else {
                $this->msg = "Failed to crop the image file";
            }
        }
    }

    private function codeToMessage($code)
    {
        switch ($code) {
            case UPLOAD_ERR_INI_SIZE:
                $message = 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
                break;

            case UPLOAD_ERR_FORM_SIZE:
                $message = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
                break;

            case UPLOAD_ERR_PARTIAL:
                $message = 'The uploaded file was only partially uploaded';
                break;

            case UPLOAD_ERR_NO_FILE:
                $message = 'No file was uploaded';
                break;

            case UPLOAD_ERR_NO_TMP_DIR:
                $message = 'Missing a temporary folder';
                break;

            case UPLOAD_ERR_CANT_WRITE:
                $message = 'Failed to write file to disk';
                break;

            case UPLOAD_ERR_EXTENSION:
                $message = 'File upload stopped by extension';
                break;

            default:
                $message = 'Unknown upload error';
        }

        return $message;
    }

    public function getResult()
    {
        return !empty($this->data) ? substr($this->dst, 1) : substr($this->src, 1);
    }

    public function getMsg()
    {
        return $this->msg;
    }
}