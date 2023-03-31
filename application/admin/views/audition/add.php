<div class="layui-card-body">
    <form class="layui-form" action="<?php echo site_url('audition/add')?>" style="width: 500px;" method="post">
        <div class="layui-form-item">
            <label class="layui-form-label">城市</label>
            <div class="layui-input-block">
                <input type="text" name="city"  class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">区县</label>
            <div class="layui-input-block">
                <input type="text" name="area"  class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">面试形式</label>
            <div class="layui-input-block">
                <input type="text" name="audition"  class="layui-input">
            </div>
        </div>

    </form>
</div>