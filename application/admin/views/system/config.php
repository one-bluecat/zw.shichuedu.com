<div class="main layui-body">
    <div class="main-header">
        <div class="layui-breadcrumb">
            <a href="{:url('/')}"><i class="fa fa-dashboard"></i> 控制台 / 系统管理</a>
        </div>
    </div>
    <div class="main-content">
        <div class="layui-fluid">
            <div class="layui-card">
                <div class="layui-card-header">年份设置</div>
                <div class="layui-card-body">
                    <form action="/admin.php/system/config" method="post" class="layui-form">

                        <?php
                        if($method_action == 'post/config'){
                            ?>
                            <div class="layui-form-item">
                                <label class="layui-form-label">网站首页显示年份</label>
                                <div class="layui-input-inline">
                                    <input type="text" name="config[year]" value="<?php if($year) {echo $year;}else{echo date('Y');}?>" class="layui-input">
                                </div>
                            </div>
                        <?php }
                        ?>
                        <?php
                        if($method_action == 'reg/config'){
                            ?>
                            <div class="layui-form-item">
                                <label class="layui-form-label">网站首页显示年份</label>
                                <div class="layui-input-inline">
                                    <input type="text" name="config[rank_year]" value="<?php if($rank_year) {echo $rank_year;}else{echo date('Y');}?>" class="layui-input">
                                </div>
                            </div>
                        <?php }
                        ?>


                        <?php
                        if($method_action == 'post/config'){
                            ?>
                        <div class="layui-form-item">
                            <label class="layui-form-label">统考倒计时</label>
                            <div class="layui-input-inline">
                                <input class="layui-input laydate-day" name="config[last_time]" placeholder="统考倒计时" value="<?php echo $last_time;?>">
                            </div>
                        </div>

                      <?php  }
                        ?>

                        <?php
                        if($method_action == 'ai/config'){
                            ?>
                            <div class="layui-form-item">
                                <label class="layui-form-label">Ai首页显示年份</label>
                                <div class="layui-input-inline">
                                    <input type="text" name="config[ai_year]" value="<?php if($ai_year) {echo $ai_year;}else{echo date('Y');}?>" class="layui-input">
                                </div>
                            </div>
                        <?php }
                        ?>



                        <div class="layui-form-item">
                            <div class="layui-input-block">
                                <button class="layui-btn layui-btn-sm layui-btn-normal" lay-submit lay-filter="layform"><i class="fa fa-save"></i> 保存</button>
                                <button type="reset" class="layui-btn layui-btn-sm layui-btn-primary"><i class="fa fa-undo"></i> 重置</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="main-footer">
            <!-- 底部固定区域 -->
            Copyright © 2018-2018 后台管理系统. All rights reserved.
        </div>
    </div>
</div>

