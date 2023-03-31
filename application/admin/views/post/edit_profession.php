<div class="layui-card-body">
    <form class="layui-form" action="<?php echo site_url('post/edit_profession')?>" style="width: 500px;" method="post">
        <div class="layui-form-item">
            <label class="layui-form-label">年份</label>
            <div class="layui-input-block">
                <input type="text" name="year"  class="layui-input" value="<?php echo $year;?>"  placeholder="年份" disabled>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">专业名称</label>
            <div class="layui-input-block">
                <input class="layui-input laydate-day" name="profession" placeholder="专业名称" value="<?php echo $profession;?>">
            </div>
        </div>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
    </form>
</div>