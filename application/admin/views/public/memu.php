<div class="aside">
    <div class="aside-scroll">
        <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
        <ul class="aside-nav">
            <li class="title">导航菜单</li>
            <li><a href="/admin.php"><i class="fa fa-dashboard"></i> 控制台</a></li>
            <li>
                <a href="/admin.php/system/config" class="<?php if($method_action =='system/config' || $method_action =='user/index' ) echo 'active';?>"><i class="fa fa-cogs"></i> 系统管理 <span><i class="fa fa-angle-left"></i></span></a>
                <dl <?php if($method_action =='user/index' ) echo 'style="display:block"';?>>
                    <dd><a href="/admin.php/user/index" class="<?php if($method_action =='user/index') echo 'active';?>"><i class="fa fa-cog"></i> 管理员</a></dd>
                </dl>
            </li>

            <li>
                <a href="/admin.php/reg/index" class="<?php if($method_action =='reg/index' || $method_action =='reg/config') echo 'active';?>"><i class="fa fa fa-feed"></i> 排名系统 <span><i class="fa fa-angle-left"></i></span></a>
                <dl <?php if($method_action =='reg/config' || $method_action =='reg/index') echo 'style="display:block"';?>>
                    <dd><a href="/admin.php/reg/config" class="<?php if($method_action =='reg/config') echo 'active';?>"><i class="fa fa-cog"></i> 年份设置</a></dd>
                    <dd><a href="/admin.php/reg/index" class="<?php if($method_action =='reg/index') echo 'active';?>"><i class="fa fa fa-user"></i> 晒分用户 <span></span></a></dd>
                </dl>
            </li>

            <li>
                <a href="/admin.php/post/index" class="<?php if( in_array($method_action,array('post/index','audition/index','post/pic','textbook/index','textbookfeedback/index','auditionfeedback/index','post/pic','post/do_pic','post/cut','post/sms','post/updatetime','post/profession'))) echo 'active';?>"><i class="fa fa fa-feed"></i> 职位系统 <span><i class="fa fa-angle-left"></i></span></a>
                <dl <?php if(in_array($method_action,array('post/index','post/config','post/uploads','textbook/index' ,'audition/index','textbookfeedback/index','auditionfeedback/index','post/pic','post/do_pic','post/cut','post/sms','post/updatetime','post/profession'))) echo 'style="display:block"';?>>
                    <dd><a href="/admin.php/post/config" class="<?php if($method_action =='post/config') echo 'active';?>"><i class="fa fa-cog"></i> 首页年份/统考倒计时设置</a></dd>
                    <dd><a href="/admin.php/post/updatetime" class="<?php if($method_action =='post/updatetime') echo 'active';?>"><i class="fa fa-cog"></i> 最新更新时间设置</a></dd>
                    <dd><a href="/admin.php/post/profession" class="<?php if($method_action =='post/profession') echo 'active';?>"><i class="fa fa-cog"></i> 专业设置</a></dd>
                    <dd><a href="/admin.php/post/pic" class="<?php if($method_action =='post/pic' || $method_action =='post/do_pic') echo 'active';?>"><i class="fa fa-cog"></i> 首页banner上传</a></dd>
                    <dd><a href="/admin.php/post/uploads" class="<?php if($method_action =='post/uploads') echo 'active';?>"><i class="fa fa-magic"></i> 职位导入</a></dd>
                    <dd><a href="/admin.php/post/index" class="<?php if($method_action =='post/index') echo 'active';?>"><i class="fa fa-cog"></i> 职位管理</a></dd>
                    <dd><a href="/admin.php/post/cut" class="<?php if($method_action =='post/cut') echo 'active';?>"><i class="fa fa-cog"></i> 核减导入</a></dd>
                    <dd><a href="/admin.php/textbook/index" class="<?php if($method_action =='textbook/index') echo 'active';?>"><i class="fa fa-magic"></i> 教材版本</a></dd>
                    <dd><a href="/admin.php/audition/index" class="<?php if($method_action =='audition/index') echo 'active';?>"><i class="fa fa-magic"></i> 面试形式</a></dd>
                    <dd><a href="/admin.php/auditionfeedback/index" class="<?php if($method_action =='auditionfeedback/index') echo 'active';?>"><i class="fa fa-magic"></i> 面试形式反馈</a></dd>
                    <dd><a href="/admin.php/textbookfeedback/index" class="<?php if($method_action =='textbookfeedback/index') echo 'active';?>"><i class="fa fa-magic"></i> 教材反馈</a></dd>
                    <dd><a href="/admin.php/post/sms" class="<?php if($method_action =='post/sms') echo 'active';?>"><i class="fa fa-magic"></i> 发送短信</a></dd>
                </dl>
            </li>

            <li>
                <a href="/admin.php/score/pass_user_upload" class="<?php if (in_array($method_action,array('score/pass_user_upload','score/pic','score/do_pic','score/sms'))) echo 'active';?>"><i class="fa fa fa-feed"></i> 分数系统 <span><i class="fa fa-angle-left"></i></span></a>
                <dl <?php if (in_array($method_action,array('score/pass_user_upload','score/pic','score/do_pic','score/sms'))) echo 'style="display:block"';?>>
                    <dd><a href="/admin.php/score/pic" class="<?php if($method_action =='post/pic' || $method_action =='score/do_pic') echo 'active';?>"><i class="fa fa-cog"></i> 首页banner上传</a></dd>
                    <dd><a href="/admin.php/score/pass_user_upload" class="<?php if($method_action =='score/pass_user_upload') echo 'active';?>"><i class="fa fa-magic"></i> 导入录取人员分数</a></dd>
                    <dd><a href="/admin.php/score/sms" class="<?php if($method_action =='score/sms') echo 'active';?>"><i class="fa fa-magic"></i> 发送短信</a></dd>
                </dl>
            </li>

            <li>
                <a href="/admin.php/score/pass_user_upload" class="<?php if (in_array($method_action,array('ai/index','ai/add','ai/sms','ai/user','ai/config'))) echo 'active';?>"><i class="fa fa fa-feed"></i> AI智能 <span><i class="fa fa-angle-left"></i></span></a>
                <dl <?php if (in_array($method_action,array('ai/index','ai/add','ai/sms','ai/user','ai/config'))) echo 'style="display:block"';?>>
                    <dd><a href="/admin.php/ai/config" class="<?php if($method_action =='ai/config') echo 'active';?>"><i class="fa fa-magic"></i> 年份设置</a></dd>
                    <dd><a href="/admin.php/ai/add" class="<?php if($method_action =='ai/add') echo 'active';?>"><i class="fa fa-magic"></i> 添加推荐</a></dd>
                    <dd><a href="/admin.php/ai/index" class="<?php if($method_action =='ai/index') echo 'active';?>"><i class="fa fa-magic"></i> 推荐列表</a></dd>
                    <dd><a href="/admin.php/ai/user" class="<?php if($method_action =='ai/user') echo 'active';?>"><i class="fa fa-magic"></i> Ai用户</a></dd>
                    <dd><a href="/admin.php/ai/sms" class="<?php if($method_action =='ai/sms') echo 'active';?>"><i class="fa fa-magic"></i> 发送短信</a></dd>
                </dl>
            </li>



        </ul>
    </div>
</div>
