<div class="main layui-body">
    <div class="main-header">
        <div class="layui-breadcrumb">
            <a href="/admin.php/post/sms"><i class="fa fa-dashboard"></i> 控制台 / 发送短信</a>
        </div>
    </div>
    <div class="main-content">
        <div class="layui-fluid">
            <div class="layui-card">
                <div class="layui-card-header">发送短信</div>
                <div class="layui-card-body">
                    <div class="data-list" data-url="<?php echo site_url('post/smslists'); ?>">
                        <form class="layui-form inline-form">
                            <div class="pull-left">
<!--                                <div class="layui-inline">-->
<!--                                    <button class="layui-btn layui-btn-normal layui-btn-sm ajax-form" data-url="--><?php //echo site_url('ai/add'); ?><!--"><i class="layui-icon">&#xe61f;</i> 新增</button>-->
<!--                                </div>-->
                            </div>
                            <div class="pull-right">
                                <div class="layui-inline">
                                    <input class="layui-input" name="username" placeholder="姓名">
                                </div>
                                <div class="layui-inline">
                                    <input class="layui-input" name="phone" placeholder="手机号码">
                                </div>
                                <div class="layui-inline">
                                    <input class="layui-input" name="subject_study_section" placeholder="学科学段">
                                </div>
                                <div class="layui-inline">
                                    <button class="layui-btn layui-btn-sm layui-btn-normal search"><i class="layui-icon">&#xe615;</i></button>
                                </div>
                            </div>
                        </form>
                        <div class="layui-form inline-form">
                            <div class="pull-left">
                                <div class="layui-inline">
                                    <div class="layui-btn-group">
                                        <button class="layui-btn" onclick="export_excel();">导出</button>
                                    </div>
                                </div>
                            </div>
                            <div class="pull-right">

                            </div>
                        </div>
                        <div class="data">
                            <p><i class="fa fa-spinner fa-spin"></i> 加载中...</p>
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
<script>
    function export_excel(){
        var url = '/admin.php/post/smslists?is_export=1';
        console.log(url);
        window.location.href=url;
    }
</script>


