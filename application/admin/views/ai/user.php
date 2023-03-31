<div class="main layui-body">
    <div class="main-header">
        <div class="layui-breadcrumb">
            <a href="/admin.php/audition/index"><i class="fa fa-dashboard"></i> 控制台 / 用户列表</a>
        </div>
    </div>
    <div class="main-content">
        <div class="layui-fluid">
            <div class="layui-card">
                <div class="layui-card-header">用户列表</div>
                <div class="layui-card-body">
                    <div class="data-list" data-url="<?php echo site_url('ai/userlists'); ?>">
                        <form class="layui-form inline-form">
                            <div class="pull-left">
                                <div class="layui-inline">

                                </div>
                            </div>
                            <div class="pull-right">
                                <div class="layui-inline">
                                    <input class="layui-input" name="username" placeholder="姓名">
                                </div>
                                <div class="layui-inline">
                                    <input class="layui-input" name="phone" placeholder="手机号码">
                                </div>
                                <div class="layui-inline">
                                    <input class="layui-input" name="area" placeholder="考区">
                                </div>
                                <div class="layui-inline">
                                    <input class="layui-input" name="study_section" placeholder="学段">
                                </div>
                                <div class="layui-inline">
                                    <input class="layui-input" name="subject" placeholder="学科">
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
        var url = '/admin.php/ai/userlists?is_export=1';
        console.log(url);
        window.location.href=url;
    }
</script>
