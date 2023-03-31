<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>师出教育管理系统</title>
    <link rel="shortcut icon" href="/resources/images/favicon.ico">
    <link rel="stylesheet" href="/resources/static/admin/layui/css/layui.css">
    <link rel="stylesheet" href="/resources/static/admin/plugins/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/resources/static/admin/css/style.css">
    <script type="text/javascript" src="/resources/static/admin/js/jquery.min.js"></script>
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin" layui-layout="">
    <div class="layui-header">
        <div class="layui-logo">
            <span>师出教育管理系统</span>
        </div>
        <!-- 头部区域 -->
        <ul class="layui-nav layui-layout-left">
            <li class="layui-nav-item layadmin-flexible" lay-unselect>
                <a href="/admin.php/index/flexible" class="ajax-flexible" title="侧边伸缩">
                    <i class="layui-icon layui-icon-shrink-right"></i>
                </a>
            </li>
            <li class="layui-nav-item" lay-unselect>
                <a href="javascript:;" id="refresh" title="刷新数据">
                    <i class="layui-icon layui-icon-refresh"></i>
                </a>
            </li>
        </ul>
        <ul class="layui-nav  layui-layout-right">
            <li class="layui-nav-item" lay-unselect="">
                <a lay-href="app/message/" layadmin-event="message">
                    <i class="layui-icon layui-icon-notice"></i>
                    <span class="layui-badge-dot"></span>
                </a>
            </li>
            <li class="layui-nav-item" lay-unselect>
                <a href="javascript:;" class="user"><img src="/uploads/image/20180425/f31867256aa9ed55be32422a7bb5119a.gif" class="layui-nav-img"><?php echo $username;?> <i class="layui-icon layui-icon-more-vertical"></i></a>
                <dl class="layui-nav-child">
<!--                    <dd><a href="--><?php //echo site_url('user/show')?><!--"><i class="fa  fa-user"></i> 个人信息</a></dd>-->
<!--                    <hr>-->
                    <dd><a href="<?php echo site_url('publics/logout')?>"><i class="fa fa-sign-out"></i> 退出</a></dd>
                </dl>
            </li>
        </ul>
    </div>