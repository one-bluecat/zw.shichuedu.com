<div class="layui-card-body">
    <form class="layui-form" action="<?php echo site_url('audition/edit') ?>" style="width: 500px;" method="post">
        <div class="layui-form-item">
            <label class="layui-form-label">城市</label>
            <div class="layui-input-inline">
                <input type="text" name="city" value="<?php echo $city; ?>" class="layui-input" disabled>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">县区</label>
            <div class="layui-input-inline">
                <input type="text" name="area" value="<?php echo $area; ?>" class="layui-input" disabled>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">面试形式</label>
            <div class="layui-input-inline">
                <textarea rows="3" cols="20" class="layui-input" name="audition"><?php echo $audition; ?></textarea>
            </div>
        </div>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
    </form>
</div>