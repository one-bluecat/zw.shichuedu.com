<div class="layui-card-body">
    <form class="layui-form" action="<?php echo site_url('user/edit')?>" style="width: 500px;" method="post">
        <div class="layui-form-item">
            <label class="layui-form-label">用户名</label>
            <div class="layui-input-block">
                <input type="text" name="username" value="<?php echo $username;?>" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">密码</label>
            <div class="layui-input-inline">
                <input type="password" name="password" value="1111111" class="layui-input">
            </div>
        </div>

        <input type="hidden" name="id" value="<?php echo $id;?>">
    </form>
</div>