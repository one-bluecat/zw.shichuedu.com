<div class="main layui-body">
    <div class="main-header">
        <div class="layui-breadcrumb">
            <a href=""><i class="fa fa-dashboard"></i> 控制台 / 添加推荐</a>
        </div>
    </div>
    <div class="main-content">
        <div class="layui-fluid">
            <div class="layui-card">
                <div class="layui-card-header">添加推荐</div>
                <div class="layui-card-body">
                    <?php
                    if($msg){
                        ?> <div style="padding: 5px 42px;color: red;font-weight: bold">
                            <?php echo $msg;?>
                        </div>
                    <?php }
                    ?>
                    <div class="site-text site-block">
                        <form class="layui-form" action="/admin.php/ai/add" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                            <div class="layui-form-item">
                                <label class="layui-form-label">类型</label>
                                <div class="layui-input-block">
                                    <select type="text" name="level_type"  class="layui-input">
                                        <option value="">请选择</option>
                                        <option value="1" <?php if($level_type == 1) echo 'selected';?>>教综</option>
                                        <option value="2" <?php if($level_type == 2) echo 'selected';?>>专业课</option>
                                    </select>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">等级名称</label>
                                <div class="layui-input-block">
                                    <input type="text" name="level_name"  class="layui-input" value="<?php echo $level_name;?>">
                                </div>
                            </div>
                            <div class="layui-form-item zyk"  >
                                <label class="layui-form-label">学段</label>
                                <div class="layui-input-block">
                                    <select type="text" name="study_section"  class="layui-input">
                                        <option value="">请选择</option>
                                        <option value="普通高中" <?php if($study_section == '普通高中') echo 'selected';?>>普通高中</option>
                                        <option value="初级中学" <?php if($study_section == '初级中学') echo 'selected';?>>初级中学</option>
                                        <option value="小学" <?php if($study_section == '小学') echo 'selected';?>>小学</option>
                                    </select>
                                </div>
                            </div>
                            <div class="layui-form-item zyk">
                                <label class="layui-form-label">学科</label>
                                <div class="layui-input-block">
                                    <select type="text" name="subject"  class="layui-input">
                                        <option value="">请选择</option>
                                        <option value="地理" <?php if($subject == '地理') echo 'selected';?>>地理</option>
                                        <option value="英语" <?php if($subject == '英语') echo 'selected';?>>英语</option>
                                        <option value="语文" <?php if($subject == '语文') echo 'selected';?>>语文</option>
                                        <option value="政治" <?php if($subject == '政治') echo 'selected';?>>政治</option>
                                        <option value="数学" <?php if($subject == '数学') echo 'selected';?>>数学</option>
                                        <option value="物理" <?php if($subject == '物理') echo 'selected';?>>物理</option>
                                        <option value="化学" <?php if($subject == '化学') echo 'selected';?>>化学</option>
                                        <option value="生物" <?php if($subject == '生物') echo 'selected';?>>生物</option>
                                        <option value="历史" <?php if($subject == '历史') echo 'selected';?>>历史</option>
                                        <option value="音乐" <?php if($subject == '音乐') echo 'selected';?>>音乐</option>
                                        <option value="通用技术" <?php if($subject == '通用技术') echo 'selected';?>>通用技术</option>
                                        <option value="心理健康教育" <?php if($subject == '心理健康教育') echo 'selected';?>>心理健康教育</option>
                                        <option value="体育" <?php if($subject == '体育') echo 'selected';?>>体育</option>
                                        <option value="信息技术" <?php if($subject == '信息技术') echo 'selected';?>>信息技术</option>
                                        <option value="美术" <?php if($subject == '美术') echo 'selected';?>>美术</option>
                                        <option value="特殊教育" <?php if($subject == '特殊教育') echo 'selected';?>>特殊教育</option>
                                        <option value="科学" <?php if($subject == '科学') echo 'selected';?>>科学</option>
                                        <option value="品德与生活、品德与社会" <?php if($subject == '品德与生活、品德与社会') echo 'selected';?>>品德与生活、品德与社会</option>
                                        <option value="综合实践活动" <?php if($subject == '综合实践活动') echo 'selected';?>>综合实践活动</option>
                                    </select>
                                </div>
                            </div>

                            <div class="layui-form-item">
                                <div class="layui-inline">
                                    <label class="layui-form-label">分数范围</label>
                                    <div class="layui-input-inline" style="width: 100px;">
                                        <input type="text" name="score_min" placeholder="起止分数" autocomplete="off" class="layui-input" value="<?php echo $score_min;?>">
                                    </div>
                                    <div class="layui-form-mid">-</div>
                                    <div class="layui-input-inline" style="width: 100px;">
                                        <input type="text" name="score_max" placeholder="截止止分数" autocomplete="off" class="layui-input" value="<?php echo $score_max;?>">
                                    </div>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">教材链接地址</label>
                                <div class="layui-input-block">
                                    <input type="text" name="link_url"  class="layui-input" value="<?php echo $link_url;?>">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">封面图片</label>
                                <div class="layui-input-block">
                                    <img src="<?php echo $img_url;?>"/>
                                    <input type="file" name="img_url">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <div class="layui-input-block">
                                    <input type="hidden" name="id" value="<?php echo $a_id;?>">
                                    <button class="layui-btn" lay-submit="" lay-filter="formDemo">提交</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-footer">
        <!-- 底部固定区域 -->
        Copyright © 2018-2018 后台管理系统. All rights reserved.
    </div>
</div>
</div>
