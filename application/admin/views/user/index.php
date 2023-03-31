<div class="main layui-body">
    <div class="main-header">
        <div class="layui-breadcrumb">
            <a href="{:url('/')}"><i class="fa fa-dashboard"></i> 控制台 / 管理员</a>
        </div>
    </div>
    <div class="main-content">
        <div class="layui-fluid">
            <div class="layui-card">
                <div class="layui-card-header">用户管理</div>
                <div class="layui-card-body">
                    <div class="data-list" data-url="<?php echo site_url('user/lists'); ?>">
                        <div class="pull-left">
                            <div class="layui-inline">
                                <button class="layui-btn layui-btn-normal layui-btn-sm ajax-form" data-url="<?php echo site_url('user/add'); ?>"><i class="layui-icon">&#xe61f;</i> 新增</button>
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

