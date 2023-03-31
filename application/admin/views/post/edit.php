<div class="layui-card-body">
    <form class="layui-form" action="<?php echo site_url('post/edit') ?>" style="width: 500px;" method="post">
        <div class="layui-form-item">
            <label class="layui-form-label">招聘单位</label>
            <div class="layui-input-inline">
                <input type="text" name="company" value="<?php echo $company; ?>" class="layui-input" disabled>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">招聘岗位</label>
            <div class="layui-input-inline">
                <input type="text" name="post_name" value="<?php echo $post_name; ?>" class="layui-input" disabled>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">岗位代码</label>
            <div class="layui-input-inline">
                <input type="text" name="post_code" value="<?php echo $post_code; ?>" class="layui-input" disabled>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">学段</label>
            <div class="layui-input-inline">
                <input type="text" name="study_section" value="<?php echo $study_section; ?>" class="layui-input" disabled>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">学科</label>
            <div class="layui-input-inline">
                <input type="text" name="subject" value="<?php echo $subject; ?>" class="layui-input" disabled>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">招考人数</label>
            <div class="layui-input-inline">
                <input type="text" name="num" value="<?php echo $num; ?>" class="layui-input" disabled>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">报名人数</label>
            <div class="layui-input-inline">
                <input type="text" name="apply_num" value="<?php echo $apply_num; ?>" class="layui-input" >
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">合格人数</label>
            <div class="layui-input-inline">
                <input type="text" name="pass_num" value="<?php echo $pass_num; ?>" class="layui-input" >
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">缴费人数</label>
            <div class="layui-input-inline">
                <input type="text" name="pay_num" value="<?php echo $pay_num; ?>" class="layui-input" >
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">竞争比</label>
            <div class="layui-input-inline">
                <input type="text" name="compete_rate" value="<?php echo $compete_rate; ?>" class="layui-input" >
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">专业</label>
            <div class="layui-input-inline">
                <input type="text" name="profession" value="<?php echo $profession; ?>" class="layui-input" disabled>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">教师资格</label>
            <div class="layui-input-inline">
                <input type="text" name="teacher_qualification" value="<?php echo $teacher_qualification; ?>" class="layui-input" disabled>
            </div>
        </div>

        <input type="hidden" name="id" value="<?php echo $id; ?>">
    </form>
</div>