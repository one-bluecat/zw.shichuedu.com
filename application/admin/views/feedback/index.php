<div class="main layui-body">
    <div class="main-header">
        <div class="layui-breadcrumb">
            <a href="/admin.php/audition/index"><i class="fa fa-dashboard"></i> 控制台 / 面试形式和教材版本</a>
        </div>
    </div>
    <div class="main-content">
        <div class="layui-fluid">
            <div class="layui-card">
                <div class="layui-card-header">面试形式和教材版本提交反馈</div>
                <div class="layui-card-body">
                    <div class="data-list" data-url="<?php echo site_url('feedback/lists/?id='.$_REQUEST['id']); ?>">
<!--                        <form class="layui-form inline-form">-->
<!--                            <div class="pull-left">-->
<!--                                <div class="layui-inline">-->
<!--                                    <input class="layui-input" name="company" placeholder="招聘单位">-->
<!--                                </div>-->
<!--                                <div class="layui-inline">-->
<!--                                    <button class="layui-btn layui-btn-sm layui-btn-normal search"><i class="layui-icon">&#xe615;</i></button>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </form>-->
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


