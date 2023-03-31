<div class="main layui-body">
    <div class="main-header">
        <div class="layui-breadcrumb">
            <a href=""><i class="fa fa-dashboard"></i> 控制台 / 上传录取人员</a>
        </div>
    </div>
    <div class="main-content">
        <div class="layui-fluid">
            <div class="layui-card">
                <div class="layui-card-header">上传录取人员</div>
                <div class="layui-card-body">
                    <?php
                    if($msg){
                        ?> <div style="padding: 5px 42px;color: red;font-weight: bold">
                            <?php echo $msg;?>
                        </div>
                    <?php }
                    ?>

                    <div class="site-text site-block">
                        <form class="layui-form" action="/admin.php/score/do_pass_user_upload" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                            <div class="layui-form-item">
                                <label class="layui-form-label">选择文件</label>
                                <input  type="file"  name="userfile">
                            </div>
                            <div class="layui-form-item layui-form-text">
                                <label class="layui-form-label"></label>
                                <div class="layui-input-block">
                                    <?php
                                    $sys_protocal = isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443' ? 'https://' : 'http://';
                                    $base_url =  $sys_protocal.(isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '').'/uploads/file_format_pass.xls';
                                    ?>
                                    <span><a href="<?php echo $base_url;?>" style="color: red;">查看文件上传格式</a></span>
                                </div>
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
