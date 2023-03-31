<!-- main -->
<div class="box">
    <div class="gwysite"><span>您所在的位置：<a href="/">首页</a> &gt; <?php if($_REQUEST['act'] == 'num'){echo '招考人数';}elseif ($_REQUEST['act'] == 'apply_num'){echo '报名人数';}elseif ($_REQUEST['act'] == 'pass_num'){echo '合格人数';}elseif ($_REQUEST['act'] == 'compete_rate'){echo '竞争比';}?>排行榜</a></span><a class="fr" href="/kscx/bmtj/<?php echo $year!=$system_config['year']?$year:"";?>">返回排行榜</a></div>

    <div class="i_jobcz">
        <h2><a href="/kscx/bmtj/<?php echo $year!=$system_config['year']?$year:"";?>">排名类型</a></h2>
        <ul>
            <li><a href="/kscx/rank<?php echo $year!=$system_config['year']?$year:'';?>/<?php echo $flag;?>?act=num"  target="_self">招考人数</a></li>
            <li><a href="/kscx/rank<?php echo $year!=$system_config['year']?$year:'';?>/<?php echo $flag;?>?act=apply_num"  target="_self">报名人数</a></li>
            <li><a href="/kscx/rank<?php echo $year!=$system_config['year']?$year:'';?>/<?php echo $flag;?>?act=pass_num"  target="_self">合格人数</a></li>
            <li><a href="/kscx/rank<?php echo $year!=$system_config['year']?$year:'';?>/<?php echo $flag;?>?act=compete_rate"  target="_self">竞争比</a></li>
            <li><a href="/kscx/rank<?php echo $year!=$system_config['year']?$year:'';?>/<?php echo $flag;?>?act=pay_num"  target="_self">缴费人数</a></li>
        </ul>
        <h2>按地区</h2>
        <ul>
            <?php
            foreach ($city_map as $value){
                ?>
                <li><a href="?act=<?php echo $_REQUEST['act'];?>&city=<?php echo $value['en'];?>"  target="_self"><?php echo $value['zh'];?></a></li>
          <?php }
            ?>
        </ul>

    </div>
    <div class="job_table">
        <div class="job_title"><h1><?php echo $year;?>安徽教师招聘考试职位<span><?php if($_REQUEST['act'] == 'num'){echo '招考人数';}elseif ($_REQUEST['act'] == 'apply_num'){echo '报名人数';}elseif ($_REQUEST['act'] == 'pass_num'){echo '合格人数';}elseif ($_REQUEST['act'] == 'compete_rate'){echo '竞争比';}elseif ($_REQUEST['act'] == 'pay_num'){echo '缴费人数';}?></span>排名（<?php if($flag){echo '冷门';}else{echo '热门';}?>）</h1> <a class="fr" href="/kscx/rank<?php echo $year!=$system_config['year']?$year:"";?>/<?php if(!$flag)echo 'lengmen.php';?>"><?php if($flag){echo '热门';}else{echo '冷门';}?>职位排名</a> <a class="fr" href="/kscx/bmtj/<?php echo $year!=$system_config['year']?$year.'.html':"";?>">报名数据汇总</a></div>
        <div class="job_content zwlisttb">
            <table width="960" border="0" cellspacing="1" cellpadding="0" align="center">
                <thead>
                <tr>
                    <th width="25%">部门名称</th>

                    <th width="15%">职位名称</th>
                    <th>学历要求</th>
                    <th>招考人数</th>
                    <th>报考人数</th>
                    <?php
                     if($_REQUEST['act'] == 'pass_num' || $_REQUEST['act'] == 'pay_num'){
                        echo '<th>合格人数</th>';
                     }
                    ?>
                    <?php
                    if($_REQUEST['act'] == 'compete_rate'){
                        echo '<th>竞争比</th>';
                    }
                    ?>
                    <?php
                    if($_REQUEST['act'] == 'pay_num'){
                        echo '<th>缴费人数</th>';
                    }
                    ?>
                    <th width="6%">职位详细</th>
                </tr>
                </thead>
                <tbody>

                    <?php
                    foreach ($list as $value){
                        ?>
                    <tr>
                        <td data-label="部门名称："><?php echo $value['company'];?></td>
                        <td data-label="职位名称："><?php echo $value['post_name'];?></td>
                        <td data-label="学历要求："><?php echo $value['degree'];?></td>
                        <td data-label="招考人数："><?php echo $value['num'];?></td>
                        <td data-label="报考人数："><?php echo $value['apply_num'];?></td>
                        <?php
                        if($_REQUEST['act'] == 'pass_num' || $_REQUEST['act'] == 'pay_num'){
                           ?>
                            <td data-label="合格人数："><?php echo $value['pass_num'];?></td>
                        <?php }
                        ?>
                        <?php
                        if($_REQUEST['act'] == 'compete_rate'){
                            ?>
                            <td data-label="竞争比："><?php echo floor($value['compete_rate']) == $value['compete_rate']?intval($value['compete_rate']):sprintf('%.1f',$value['compete_rate']);?></td>
                        <?php }
                        ?>
                        <?php
                        if($_REQUEST['act'] == 'pay_num'){
                            ?>
                            <td data-label="缴费人数："><?php echo $value['pay_num'];?></td>
                        <?php }
                        ?>
                        <td><a class="num table3" href="/kscx/<?php echo $value['year'];?>/<?php echo $value['id'];?>.html">查看</a></td>
                    </tr>
                   <?php }
                    ?>

            </table>
        </div>
        <div class="fanye mt40">
            <?php
                echo $page;
            ?>
        </div>
</div>

<!--页脚-->


</body>
</html>
