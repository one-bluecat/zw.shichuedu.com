<div class="layui-card-body">
    <form class="layui-form" action="<?php echo site_url('post/add_updatetime')?>" style="width: 500px;" method="post">
        <div class="layui-form-item">
            <label class="layui-form-label">年份</label>
            <div class="layui-input-block">
                <input type="text" name="year"  class="layui-input" placeholder="年份">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">最新更新时间</label>
            <div class="layui-input-block">
                <input class="layui-input laydate-day" name="updatetime" placeholder="最新更新时间">
            </div>
        </div>
    </form>
</div>