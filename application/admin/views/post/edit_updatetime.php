<div class="layui-card-body">
    <form class="layui-form" action="<?php echo site_url('post/edit_updatetime')?>" style="width: 500px;" method="post">
        <div class="layui-form-item">
            <label class="layui-form-label">年份</label>
            <div class="layui-input-block">
                <input type="text" name="year"  class="layui-input" value="<?php echo $year;?>"  placeholder="年份" disabled>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">最新更新时间</label>
            <div class="layui-input-block">
                <input class="layui-input laydate-day" name="updatetime" placeholder="最新更新时间" value="<?php echo $updatetime;?>">
            </div>
        </div>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
    </form>
</div>