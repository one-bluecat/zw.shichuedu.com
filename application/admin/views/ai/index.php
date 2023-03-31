<div class="main layui-body">
    <div class="main-header">
        <div class="layui-breadcrumb">
            <a href="/admin.php/audition/index"><i class="fa fa-dashboard"></i> 控制台 / 推荐列表</a>
        </div>
    </div>
    <div class="main-content">
        <div class="layui-fluid">
            <div class="layui-card">
                <div class="layui-card-header">推荐列表</div>
                <div class="layui-card-body">
                    <div class="data-list" data-url="<?php echo site_url('ai/lists'); ?>">
                        <form class="layui-form inline-form">
                            <div class="pull-left">
<!--                                <div class="layui-inline">-->
<!--                                    <button class="layui-btn layui-btn-normal layui-btn-sm ajax-form" data-url="--><?php //echo site_url('ai/add'); ?><!--"><i class="layui-icon">&#xe61f;</i> 新增</button>-->
<!--                                </div>-->
                            </div>
                            <div class="pull-right">
                                <div class="layui-inline">
                                    <select class="layui-input" name="level_type" placeholder="类型">
                                        <option value="">类型</option>
                                        <option value="1">教综</option>
                                        <option value="2">专业课</option>
                                    </select>
                                </div>
                                <div class="layui-inline">
                                    <input class="layui-input" name="study_section" placeholder="学段">
                                </div>
                                <div class="layui-inline">
                                    <input class="layui-input" name="subject" placeholder="学科">
                                </div>
                                <div class="layui-inline">
                                    <input class="layui-input" name="level_name" placeholder="等级名称">
                                </div>
                                <div class="layui-inline">
                                    <button class="layui-btn layui-btn-sm layui-btn-normal search"><i class="layui-icon">&#xe615;</i></button>
                                </div>
                            </div>
                        </form>
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


