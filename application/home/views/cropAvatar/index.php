<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="A complete example of Cropper.">
    <meta name="keywords" content="HTML, CSS, JS, JavaScript, jQuery, PHP, image cropping, web development">
    <meta name="author" content="Fengyuan Chen">
    <title>Crop Avatar - Cropper</title>
    <link href="/resources/static/home/croppic/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/resources/static/home/croppic/dist/cropper.min.css" rel="stylesheet">
    <link href="/resources/static/home/croppic/examples/crop-avatar/css/main.css" rel="stylesheet">
    <style>
        .container {
            max-width: 640px;
            margin: 20px auto;
        }

        img {
            max-width: 100%;
        }
    </style>
</head>
<body>
<div class="container" id="crop-avatar">
    <h3>说明</h3>
    <ol>
        <li>点击上传照片</li>
        <li>鼠标放在图像上移动画面，滚轮缩放</li>
        <li>调整合适的位置后点击裁剪【必须铺满边框】</li>
        <li>下方预览区域出现最终照片，右键鼠标保存照片或直接拖到桌面（手机用户长按图片后保存至相册）</li>
        <li>图片文件大小超过100KB请 <a href="https://tinypng.com/">点击这里</a></li>
        <li>把保存的照片上传点击download即可下载保存</a></li>
        <li>如需帮助点击：<a href="http://wpa.qq.com/msgrd?v=3&amp;uin=309476048&amp;site=qq&amp;menu=yes">助教帅帅</a></a></li>
    </ol>
    <h3>图片上传</h3>
    <!-- Current avatar -->
    <div class="avatar-view" title="Change the avatar">
        <div style="margin: 10px; 0px;">
            <label class="btn btn-danger">
                <span>选择图片</span>
            </label>
        </div>
        <img src="/resources/static/home/croppic/examples/crop-avatar/img/picture.jpg" alt="Avatar">
    </div>

    <!-- Cropping modal -->
    <div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog"
         tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form class="avatar-form" action="/cropAvatar/uploadpic" enctype="multipart/form-data" method="post">
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal" type="button">&times;</button>
                        <h4 class="modal-title" id="avatar-modal-label">Change Avatar</h4>
                    </div>
                    <div class="modal-body">
                        <div class="avatar-body">

                            <!-- Upload image and data -->
                            <div class="avatar-upload">
                                <input class="avatar-src" name="avatar_src" type="hidden">
                                <input class="avatar-data" name="avatar_data" type="hidden">
                                <label for="avatarInput">Local upload</label>
                                <input class="avatar-input" id="avatarInput" name="avatar_file" type="file">
                            </div>

                            <!-- Crop and preview -->
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="avatar-wrapper"></div>
                                </div>
                                <div class="col-md-3">
                                    <div class="avatar-preview preview-lg"></div>
                                    <div class="avatar-preview preview-md"></div>
                                    <div class="avatar-preview preview-sm"></div>
                                </div>
                            </div>

                            <div class="row avatar-btns">
                                <div class="col-md-9">
                                    <div class="btn-group">
                                        <button class="btn btn-primary" data-method="rotate" data-option="-90"
                                                type="button" title="Rotate -90 degrees">Rotate Left
                                        </button>
                                        <button class="btn btn-primary" data-method="rotate" data-option="-15"
                                                type="button">-15deg
                                        </button>
                                        <button class="btn btn-primary" data-method="rotate" data-option="-30"
                                                type="button">-30deg
                                        </button>
                                        <button class="btn btn-primary" data-method="rotate" data-option="-45"
                                                type="button">-45deg
                                        </button>
                                    </div>
                                    <div class="btn-group">
                                        <button class="btn btn-primary" data-method="rotate" data-option="90"
                                                type="button" title="Rotate 90 degrees">Rotate Right
                                        </button>
                                        <button class="btn btn-primary" data-method="rotate" data-option="15"
                                                type="button">15deg
                                        </button>
                                        <button class="btn btn-primary" data-method="rotate" data-option="30"
                                                type="button">30deg
                                        </button>
                                        <button class="btn btn-primary" data-method="rotate" data-option="45"
                                                type="button">45deg
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <button class="btn btn-primary btn-block" class="close" data-dismiss="modal"
                                            type="button">关闭
                                    </button>
                                    <button class="btn btn-primary btn-block avatar-save" type="submit">裁剪上传</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="modal-footer">
                      <button class="btn btn-default" data-dismiss="modal" type="button">Close</button>
                    </div> -->
                </form>
            </div>
        </div>
    </div><!-- /.modal -->

    <!-- Loading state -->
    <div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
</div>

<script src="/resources/static/home/croppic/assets/js/jquery.min.js"></script>
<script src="/resources/static/home/croppic/assets/js/bootstrap.min.js"></script>
<script src="/resources/static/home/croppic/dist/cropper.min.js"></script>
<script src="/resources/static/home/croppic/examples/crop-avatar/js/main.js"></script>
</body>
</html>
