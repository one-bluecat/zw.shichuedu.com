<style>
    .job_content table tbody td a{color:#f00;}
    .duibi3{display:none !important;}
</style>
<!-- main -->
<div class="box">
    <div class="gwysite"><span>您所在的位置：<a href="/">首页</a> &gt; 职位对比 </span></div>

    <div class="job_table">
        <div class="job_title"><h1><?php echo $year;?>安徽教师招聘考试职位表</h1>&nbsp;&nbsp;<span>职位对比</span></div>
        <div class="job_content">
            <table width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th width="13%">对比</th>
                    <th width="29%">职位一</th>
                    <th width="29%">职位二</th>
                    <th width="29%" <?php if(count($list)<3) echo 'class="duibi3"';?>>职位三</th>
                </tr>
                </thead>
                <tbody>
                <?php
                ?>
                <tr>
                        <td class="zwdb_tabtit">岗位代码</td>
                        <?php
                        foreach ($list as $value){
                            ?>
                            <td><?php echo $value['post_code'];?></td>
                      <?php  }
                      ?>
                </tr>

                <?php
                ?>
                <tr>
                    <td class="zwdb_tabtit">报考地区</td>
                    <?php
                    foreach ($list as $value){
                        ?>
                        <td><a href="/kscx/<?php echo $city_map[substr($value['province'],0,4)]['en'];?>/"><?php echo $city_map[substr($value['province'],0,4)]['zh']?></a></td>
                    <?php  }
                    ?>
                </tr>

                <?php
                ?>
                <tr>
                    <td class="zwdb_tabtit">行政辖区代码</td>
                    <?php
                    foreach ($list as $value){
                        ?>
                        <td><?php echo $value['province'];?></td>
                    <?php  }
                    ?>
                </tr>

                <?php
                ?>
                <tr>
                    <td class="zwdb_tabtit">行政辖区</td>
                    <?php
                    foreach ($list as $value){
                        ?>
                        <td><a href="/kscx/<?php echo $city_map[substr($value['province'],0,4)]['en'];?>/<?php echo str_replace(' ','',pinyin($value['area']));?>/"><?php echo $value['area'];?></a></td>
                    <?php  }
                    ?>
                </tr>

                <?php
                ?>
                <tr>
                    <td class="zwdb_tabtit">招聘单位</td>
                    <?php
                    foreach ($list as $value){
                        ?>
                        <td><a href="/kscx/<?php echo $city_map[substr($value['province'],0,4)]['en'];?>/<?php echo $value['id'];?>/"><?php echo $value['company'];?></a></td>
                    <?php  }
                    ?>
                </tr>

                <tr>
                    <td class="zwdb_tabtit">招聘岗位</td>
                    <?php
                    foreach ($list as $value){
                        ?>
                        <td><?php echo $value['post_name'];?></td>
                    <?php  }
                    ?>
                </tr>

                <tr>
                    <td class="zwdb_tabtit">招聘人数</td>
                    <?php
                    foreach ($list as $value){
                        ?>
                        <td><?php echo $value['num'];?></td>
                    <?php  }
                    ?>
                </tr>

                <tr>
                    <td class="zwdb_tabtit">单列计划</td>
                    <?php
                    foreach ($list as $value){
                        ?>
                        <td><?php echo $value['single_plan'];?></td>
                    <?php  }
                    ?>
                </tr>

                <tr>
                    <td class="zwdb_tabtit">学段</td>
                    <?php
                    foreach ($list as $value){
                        ?>
                        <td><?php echo $value['study_section'];?></td>
                    <?php  }
                    ?>
                </tr>

                <tr>
                    <td class="zwdb_tabtit">学科</td>
                    <?php
                    foreach ($list as $value){
                        ?>
                        <td><?php echo $value['subject'];?></td>
                    <?php  }
                    ?>
                </tr>

                <tr>
                    <td class="zwdb_tabtit">学历</td>
                    <?php
                    foreach ($list as $value){
                        ?>
                        <td><?php echo $value['degree'];?></td>
                    <?php  }
                    ?>
                </tr>

                <tr>
                    <td class="zwdb_tabtit">是否需要学位</td>
                    <?php
                    foreach ($list as $value){
                        ?>
                        <td><?php echo $value['is_need_degree'];?></td>
                    <?php  }
                    ?>
                </tr>

                <tr>
                    <td class="zwdb_tabtit">年龄</td>
                    <?php
                    foreach ($list as $value){
                        ?>
                        <td><?php echo $value['age'];?></td>
                    <?php  }
                    ?>
                </tr>

                <tr>
                    <td class="zwdb_tabtit">专业</td>
                    <?php
                    foreach ($list as $value){
                        ?>
                        <td><?php echo $value['profession'];?></td>
                    <?php  }
                    ?>
                </tr>
                <tr>
                    <td class="zwdb_tabtit">是否高校毕业生计划</td>
                    <?php
                    foreach ($list as $value){
                        ?>
                        <td><?php echo $value['university_graduate_plan'];?></td>
                    <?php  }
                    ?>
                </tr>

                <tr>
                    <td class="zwdb_tabtit">教师资格</td>
                    <?php
                    foreach ($list as $value){
                        ?>
                        <td><?php echo $value['teacher_qualification'];?></td>
                    <?php  }
                    ?>
                </tr>

                <tr>
                    <td class="zwdb_tabtit">备注</td>
                    <?php
                    foreach ($list as $value){
                        ?>
                        <td><?php echo $value['memo'];?></td>
                    <?php  }
                    ?>
                </tr>

                <tr>
                    <td class="zwdb_tabtit">单列计划说明</td>
                    <?php
                    foreach ($list as $value){
                        ?>
                        <td><?php echo $value['single_plan_memo'];?></td>
                    <?php  }
                    ?>
                </tr>

                <tr>
                    <td style="background: #FFEAEA;">报名人数</td>
                    <?php
                    foreach ($list as $value){
                        ?>
                        <td style="background: #FFEAEA;"><?php echo $value['apply_num'];?></td>
                    <?php  }
                    ?>
                </tr>

                <tr>
                    <td style="background: #DAFFD5;">合格人数</td>
                    <?php
                    foreach ($list as $value){
                        ?>
                        <td style="background: #DAFFD5;"><?php echo $value['pass_num'];?></td>
                    <?php  }
                    ?>
                </tr>

                <tr>
                    <td style="background: #FFEAEA;">缴费人数</td>
                    <?php
                    foreach ($list as $value){
                        ?>
                        <td style="background: #FFEAEA;"><?php echo $value['pay_num'];?></td>
                    <?php  }
                    ?>
                </tr>

                <tr>
                    <td style="background: #DAFFD5;">竞争比</td>
                    <?php
                    foreach ($list as $value){
                        ?>
                        <td  style="background: #DAFFD5;"><?php echo $value['compete_rate'];?></td>
                    <?php  }
                    ?>
                </tr>

                <tr>
                    <td class="zwdb_tabtit">查看详情</td>
                    <?php
                    foreach ($list as $value){
                        ?>
                        <td><a href="/kscx/<?php echo $value['year'];?>/<?php echo $value['id'];?>.html">查看详情</a></td>
                    <?php  }
                    ?>
                </tr>

<!--                <tr style="background: #DAFFD5;"><td>职位访问热度</td><td>1070</td><td>373</td><td class="duibi3"></td></tr>-->
                <td colspan="4" style="text-align:center"><b><a href="/">返回首页</a></b>  &nbsp;| <b><a href="/kscx/search" target="_blank">搜索其他职位</a></b>  &nbsp;| <b><a href="http://scwx.shichuedu.com/">报名入口</a></b>  &nbsp;| <b><a href="/kscx/bmtj/">报名人数统计</a></b></td>
                </tbody>
            </table>
        </div>
    </div>
</div>



</body>
</html>
