<div class="layui-card-body">
    <form class="layui-form" action="<?php echo site_url('reg/edit') ?>" style="width: 500px;" method="post">
        <div class="layui-form-item">
            <label class="layui-form-label">岗位代码</label>
            <div class="layui-input-block">
                <input type="text" name="post_code" value="<?php echo $post_code; ?>" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">姓名</label>
            <div class="layui-input-block">
                <input type="text" name="name" value="<?php echo $name; ?>" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">手机号</label>
            <div class="layui-input-inline">
                <input type="text" name="phone" value="<?php echo $phone; ?>" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">笔试成绩</label>
            <div class="layui-input-inline">
                <input type="text" name="score" value="<?php echo $score; ?>" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">行政辖区</label>
            <div class="layui-input-inline">
                <input type="text" name="area" value="<?php echo $area; ?>" class="layui-input" disabled>
            </div>

        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">招聘单位</label>
            <div class="layui-input-inline">
                <input type="text" name="company" value="<?php echo $company; ?>" class="layui-input" disabled>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">学段</label>
            <div class="layui-input-inline">
                <input type="text" name="study_section" value="<?php echo $study_section; ?>" class="layui-input"
                       disabled>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">学科</label>
            <div class="layui-input-inline">
                <input type="text" name="subject" value="<?php echo $subject; ?>" class="layui-input" disabled>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">审核状态</label>
            <div class="layui-input-block">
                <input type="radio" name="status" value="1" title="已审核" <?php if ($status) echo 'checked'; ?>>
                <input type="radio" name="status" value="0" title="未审核" <?php if (!$status) echo 'checked'; ?>>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">学科</label>
            <div class="layui-input-inline">
                <input type="text" name="reg_time" value="<?php echo $reg_time; ?>" class="layui-input" disabled>
            </div>
        </div>

        <input type="hidden" name="id" value="<?php echo $id; ?>">
    </form>
</div>