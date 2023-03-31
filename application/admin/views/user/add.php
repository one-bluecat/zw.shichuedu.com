<div class="layui-card-body">
    <form class="layui-form" action="<?php echo site_url('user/add')?>" style="width: 500px;" method="post">
        <div class="layui-form-item">
            <label class="layui-form-label">用户名</label>
            <div class="layui-input-block">
                <input type="text" name="username"  class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">密码</label>
            <div class="layui-input-inline">
                <input type="password" name="password" class="layui-input">
            </div>
        </div>
    </form>
</div>