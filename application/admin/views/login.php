<!DOCTYPE html>
<html lang="zh-cn">

<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>师出教育管理系统</title>
    <link rel="shortcut icon" href="/resources/images/favicon.ico">
    <link rel="stylesheet" href="/resources/static/admin/layui/css/layui.css">
    <link rel="stylesheet" href="/resources/static/admin/css/style.css">
</head>

<body>
<div class="login layui-anim-up">
    <div class="login-main">
        <div class="login-box login-header">
            <h2>师出教育管理系统</h2>
            <p>职位后台管理系统</p>
        </div>
        <div class="login-box login-body layui-form">
            <div class="layui-form-item">
                <label class="login-icon layui-icon layui-icon-username" for="username"></label>
                <input type="text" name="username" id="username" lay-verify="required" placeholder="用户名"
                       class="layui-input">
            </div>
            <div class="layui-form-item">
                <label class="login-icon layui-icon layui-icon-password" for="password"></label>
                <input type="password" name="password" id="password" lay-verify="required" placeholder="密码"
                       class="layui-input">
            </div>
            <hr>
            <!-- <div class="layui-form-item" style="margin-bottom: 20px;">
                <input type="checkbox" name="remember" value="1" lay-skin="primary" title="记住密码">
            </div> -->
            <div class="layui-form-item">
                <button class="layui-btn layui-btn-fluid" lay-submit lay-filter="login">登 入</button>
            </div>
        </div>
    </div>
    <div class="login-footer">
        <hr>
        <p><span>Copyright©2014-<?php echo date('Y-m-d'); ?> by ShiChuEdu < 417841136@qq.com ></span></p>
    </div>
</div>
<script src="/resources/static/admin/js/jquery.min.js"></script>
<script src="/resources/static/admin/layui/layui.js"></script>
<script type="text/javascript">
    layui.use(['form', 'layer'], function () {
        var layer = layui.layer;
        layui.form.on('submit(login)', function (data) {
            var self = $(data.elem);
            if (self.attr('disabled')) {
                return false;
            }
            self.attr('disabled', 'disabled');
            $.ajax({
                url: "<?php echo site_url('publics/login')?>",
                type: 'POST',
                dataType: 'json',
                data: data.field
            })
                .done(function (res) {
                    if (res.code == 1) {
                        layer.msg(res.msg, {
                            time: 1000,
                            icon: 6
                        }, function () {
                            console.log(res.url);
                            window.location.href = res.url
                        });
                    } else {
                        layer.msg(res.msg, {
                            time: 1500,
                            icon: 5
                        });
                    }
                })
                .fail(function () {
                    layer.msg('服务器异常', {
                        time: 1500,
                        icon: 5
                    });
                })
                .always(function () {
                    $('#vercode').click();
                    self.removeAttr('disabled');
                });
            return false;
        });
    });
</script>
</body>

</html>