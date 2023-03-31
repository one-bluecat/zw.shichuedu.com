<div class="layui-card-body">
    <form class="layui-form" action="<?php echo site_url('post/add_profession')?>" style="width: 500px;" method="post">
        <div class="layui-form-item">
            <label class="layui-form-label">年份</label>
            <div class="layui-input-block">
                <input type="text" name="year"  class="layui-input" placeholder="年份">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">专业名称</label>
            <div class="layui-input-block">
                <input class="layui-input laydate-day" name="profession" placeholder="专业名称">
            </div>
        </div>
    </form>
</div>