<div class="main layui-body">
    <div class="main-header">
        <div class="layui-breadcrumb">
            <a href=""><i class="fa fa-dashboard"></i> 控制台 / 分数首页banner上传</a>
        </div>
    </div>
    <div class="main-content">
        <div class="layui-fluid">
            <div class="layui-card">
                <div class="layui-card-header">分数首页banner上传</div>
                <div class="layui-card-body">
                    <?php
                    if($msg){
                        ?> <div style="padding: 5px 42px;color: red;font-weight: bold">
                            <?php echo $msg;?>
                        </div>
                    <?php }
                    ?>

                    <div class="site-text site-block">
                        <form class="layui-form" action="/admin.php/score/do_pic" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                            <div class="layui-form-item">
                                <label class="layui-form-label">年份</label>
                                <div class="layui-input-inline">
                                    <input type="text" name="year" value="<?php echo $_REQUEST['year']?$_REQUEST['year']:date('Y');?>" class="layui-input">
                                </div>
                            </div>
<!--                            <div class="layui-form-item">-->
<!--                                <label class="layui-form-label">背景图片</label>-->
<!--                                <input  type="file"  name="bg_file">-->
<!--                            </div>-->
                            <div class="layui-form-item">
                                <label class="layui-form-label">Banner图片</label>
                                <input  type="file"  name="banner_file">
                            </div>
                            <div class="layui-form-item">
                                <div class="layui-input-block">
                                    <button class="layui-btn" lay-submit="" lay-filter="formDemo">开始上传</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-footer">
        <!-- 底部固定区域 -->
        Copyright © 2018-2018 后台管理系统. All rights reserved.
    </div>
</div>
</div>
