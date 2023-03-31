<div class="layui-card-body">
    <form class="layui-form" action="<?php echo site_url('textbook/add')?>" style="width: 500px;" method="post">
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
            <label class="layui-form-label">学段</label>
            <div class="layui-input-block">
                <select type="text" name="study_section"  class="layui-input">
                    <option value="请选择"></option>
                    <option value="小学">小学</option>
                    <option value="初中">初中</option>
                    <option value="高中">高中</option>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">学科</label>
            <div class="layui-input-block">
                <input type="text" name="subject"  class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">教材版本</label>
            <div class="layui-input-block">
                <input type="text" name="textbook_version"  class="layui-input">
            </div>
        </div>

    </form>
</div>