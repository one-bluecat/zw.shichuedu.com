<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A simple jQuery image cropping plugin.">
    <meta name="author" content="Chen Fengyuan">
    <title>Cropper</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="/resources/static/home/cropper-master/docs/v3.1.6/css/cropper.css">
    <link rel="stylesheet" href="/resources/static/home/cropper-master/docs/v3.1.6/css/main.css">
</head>
<body>
<!--[if lt IE 9]>

<![endif]-->

<!-- Header -->
<!-- Jumbotron -->
<!-- Content -->
<div class="container">
    <div class="row">
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
        <div class="col-md-9">
            <!-- <h3>Demo:</h3> -->
            <div class="img-container">
                <img id="image" src="/resources/static/home/croppic/examples/crop-avatar/img/picture.jpg" alt="Picture">
            </div>
        </div>
        <div class="col-md-3">
            <!-- <h3>Preview:</h3> -->
            <div class="docs-preview clearfix">
                <div class="img-preview preview-lg"></div>
                <div class="img-preview preview-md"></div>
                <div class="img-preview preview-sm"></div>
                <div class="img-preview preview-xs"></div>
            </div>

            <!-- <h3>Data:</h3> -->
            <div class="docs-data">
                <div class="input-group input-group-sm">
            <span class="input-group-prepend">
              <label class="input-group-text" for="dataX">X</label>
            </span>
                    <input type="text" class="form-control" id="dataX" placeholder="x">
                    <span class="input-group-append">
              <span class="input-group-text">px</span>
            </span>
                </div>
                <div class="input-group input-group-sm">
            <span class="input-group-prepend">
              <label class="input-group-text" for="dataY">Y</label>
            </span>
                    <input type="text" class="form-control" id="dataY" placeholder="y">
                    <span class="input-group-append">
              <span class="input-group-text">px</span>
            </span>
                </div>
                <div class="input-group input-group-sm">
            <span class="input-group-prepend">
              <label class="input-group-text" for="dataWidth">Width</label>
            </span>
                    <input type="text" class="form-control" id="dataWidth" placeholder="width">
                    <span class="input-group-append">
              <span class="input-group-text">px</span>
            </span>
                </div>
                <div class="input-group input-group-sm">
            <span class="input-group-prepend">
              <label class="input-group-text" for="dataHeight">Height</label>
            </span>
                    <input type="text" class="form-control" id="dataHeight" placeholder="height">
                    <span class="input-group-append">
              <span class="input-group-text">px</span>
            </span>
                </div>
                <div class="input-group input-group-sm">
            <span class="input-group-prepend">
              <label class="input-group-text" for="dataRotate">Rotate</label>
            </span>
                    <input type="text" class="form-control" id="dataRotate" placeholder="rotate">
                    <span class="input-group-append">
              <span class="input-group-text">deg</span>
            </span>
                </div>
                <div class="input-group input-group-sm">
            <span class="input-group-prepend">
              <label class="input-group-text" for="dataScaleX">ScaleX</label>
            </span>
                    <input type="text" class="form-control" id="dataScaleX" placeholder="scaleX">
                </div>
                <div class="input-group input-group-sm">
            <span class="input-group-prepend">
              <label class="input-group-text" for="dataScaleY">ScaleY</label>
            </span>
                    <input type="text" class="form-control" id="dataScaleY" placeholder="scaleY">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9 docs-buttons">
            <!-- <h3>Toolbar:</h3> -->
            <div class="btn-group">
                <button type="button" class="btn btn-primary" data-method="setDragMode" data-option="move" title="Move">
            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="$().cropper(&quot;setDragMode&quot;, &quot;move&quot;)">
              <span class="fa fa-arrows"></span>
            </span>
                </button>
                <button type="button" class="btn btn-primary" data-method="setDragMode" data-option="crop" title="Crop">
            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="$().cropper(&quot;setDragMode&quot;, &quot;crop&quot;)">
              <span class="fa fa-crop"></span>
            </span>
                </button>
            </div>

            <div class="btn-group">
                <button type="button" class="btn btn-primary" data-method="zoom" data-option="0.1" title="Zoom In">
            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="$().cropper(&quot;zoom&quot;, 0.1)">
              <span class="fa fa-search-plus"></span>
            </span>
                </button>
                <button type="button" class="btn btn-primary" data-method="zoom" data-option="-0.1" title="Zoom Out">
            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="$().cropper(&quot;zoom&quot;, -0.1)">
              <span class="fa fa-search-minus"></span>
            </span>
                </button>
            </div>

            <div class="btn-group">
                <button type="button" class="btn btn-primary" data-method="move" data-option="-10" data-second-option="0" title="Move Left">
            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="$().cropper(&quot;move&quot;, -10, 0)">
              <span class="fa fa-arrow-left"></span>
            </span>
                </button>
                <button type="button" class="btn btn-primary" data-method="move" data-option="10" data-second-option="0" title="Move Right">
            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="$().cropper(&quot;move&quot;, 10, 0)">
              <span class="fa fa-arrow-right"></span>
            </span>
                </button>
                <button type="button" class="btn btn-primary" data-method="move" data-option="0" data-second-option="-10" title="Move Up">
            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="$().cropper(&quot;move&quot;, 0, -10)">
              <span class="fa fa-arrow-up"></span>
            </span>
                </button>
                <button type="button" class="btn btn-primary" data-method="move" data-option="0" data-second-option="10" title="Move Down">
            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="$().cropper(&quot;move&quot;, 0, 10)">
              <span class="fa fa-arrow-down"></span>
            </span>
                </button>
            </div>

            <div class="btn-group">
                <button type="button" class="btn btn-primary" data-method="rotate" data-option="-45" title="Rotate Left">
            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="$().cropper(&quot;rotate&quot;, -45)">
              <span class="fa fa-rotate-left"></span>
            </span>
                </button>
                <button type="button" class="btn btn-primary" data-method="rotate" data-option="45" title="Rotate Right">
            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="$().cropper(&quot;rotate&quot;, 45)">
              <span class="fa fa-rotate-right"></span>
            </span>
                </button>
            </div>

            <div class="btn-group">
                <button type="button" class="btn btn-primary" data-method="scaleX" data-option="-1" title="Flip Horizontal">
            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="$().cropper(&quot;scaleX&quot;, -1)">
              <span class="fa fa-arrows-h"></span>
            </span>
                </button>
                <button type="button" class="btn btn-primary" data-method="scaleY" data-option="-1" title="Flip Vertical">
            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="$().cropper(&quot;scaleY&quot;, -1)">
              <span class="fa fa-arrows-v"></span>
            </span>
                </button>
            </div>

            <div class="btn-group">
                <button type="button" class="btn btn-primary" data-method="crop" title="Crop">
            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="$().cropper(&quot;crop&quot;)">
              <span class="fa fa-check"></span>
            </span>
                </button>
                <button type="button" class="btn btn-primary" data-method="clear" title="Clear">
            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="$().cropper(&quot;clear&quot;)">
              <span class="fa fa-remove"></span>
            </span>
                </button>
            </div>

            <div class="btn-group">
                <button type="button" class="btn btn-primary" data-method="disable" title="Disable">
            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="$().cropper(&quot;disable&quot;)">
              <span class="fa fa-lock"></span>
            </span>
                </button>
                <button type="button" class="btn btn-primary" data-method="enable" title="Enable">
            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="$().cropper(&quot;enable&quot;)">
              <span class="fa fa-unlock"></span>
            </span>
                </button>
            </div>

            <div class="btn-group">
                <button type="button" class="btn btn-primary" data-method="reset" title="Reset">
            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="$().cropper(&quot;reset&quot;)">
              <span class="fa fa-refresh"></span>
            </span>
                </button>
                <label class="btn btn-primary btn-upload" for="inputImage" title="Upload image file">
                    <input type="file" class="sr-only" id="inputImage" name="file" accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff">
                    <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="Import image with Blob URLs">
              <span class="fa fa-upload"></span>
            </span>
                </label>
                <button type="button" class="btn btn-primary" data-method="destroy" title="Destroy">
            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="$().cropper(&quot;destroy&quot;)">
              <span class="fa fa-power-off"></span>
            </span>
                </button>
            </div>

            <div class="btn-group btn-group-crop">
                <button type="button" class="btn btn-success" data-method="getCroppedCanvas" data-option="{ &quot;maxWidth&quot;: 4096, &quot;maxHeight&quot;: 4096 }">
            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="$().cropper(&quot;getCroppedCanvas&quot;, { maxWidth: 4096, maxHeight: 4096 })">
              裁剪
            </span>
                </button>
                <button type="button" class="btn btn-success" data-method="getCroppedCanvas" data-option="{ &quot;width&quot;: 160, &quot;height&quot;: 90 }">
            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="$().cropper(&quot;getCroppedCanvas&quot;, { width: 160, height: 90 })">
              裁剪尺寸:160&times;90
            </span>
                </button>
                <button type="button" class="btn btn-success" data-method="getCroppedCanvas" data-option="{ &quot;width&quot;: 320, &quot;height&quot;: 180 }">
            <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="$().cropper(&quot;getCroppedCanvas&quot;, { width: 320, height: 180 })">
              裁剪尺寸:320&times;180
            </span>
                </button>
            </div>

            <!-- Show the cropped image in modal -->
            <div class="modal fade docs-cropped" id="getCroppedCanvasModal" aria-hidden="true" aria-labelledby="getCroppedCanvasTitle" role="dialog" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="getCroppedCanvasTitle">Cropped</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body"></div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <a class="btn btn-primary" id="download" href="javascript:void(0);" download="cropped.jpg">Download</a>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal -->
        </div><!-- /.docs-buttons -->

        <div class="col-md-3 docs-toggles">
            <!-- <h3>Toggles:</h3> -->
            <div class="btn-group d-flex flex-nowrap" data-toggle="buttons">
                <label class="btn btn-primary active">
                    <input type="radio" class="sr-only" id="aspectRatio0" name="aspectRatio" value="1.7777777777777777">
                    <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="aspectRatio: 16 / 9">
              16:9
            </span>
                </label>
                <label class="btn btn-primary">
                    <input type="radio" class="sr-only" id="aspectRatio1" name="aspectRatio" value="1.3333333333333333">
                    <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="aspectRatio: 4 / 3">
              4:3
            </span>
                </label>
                <label class="btn btn-primary">
                    <input type="radio" class="sr-only" id="aspectRatio2" name="aspectRatio" value="1">
                    <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="aspectRatio: 1 / 1">
              1:1
            </span>
                </label>
                <label class="btn btn-primary">
                    <input type="radio" class="sr-only" id="aspectRatio3" name="aspectRatio" value="0.6666666666666666">
                    <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="aspectRatio: 2 / 3">
              2:3
            </span>
                </label>
                <label class="btn btn-primary">
                    <input type="radio" class="sr-only" id="aspectRatio4" name="aspectRatio" value="NaN">
                    <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="aspectRatio: NaN">
              Free
            </span>
                </label>
            </div>

        </div><!-- /.docs-toggles -->
    </div>
</div>

<!-- Scripts -->
<!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>-->
<script src="/resources/static/home/cropper-master/docs/v3.1.6/js/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
<script src="https://fengyuanchen.github.io/js/common.js"></script>
<script src="/resources/static/home/cropper-master/docs/v3.1.6/js/cropper.js"></script>
<script src="/resources/static/home/cropper-master/docs/v3.1.6/js/main.js"></script>
</body>
</html>
