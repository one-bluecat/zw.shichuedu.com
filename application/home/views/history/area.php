<div class="box">
    <div class="gwysite">
        <span>您所在的位置：<a href="/lscx/home/<?php echo $year !=$system_config['year']?$year.'.html':"";?>">首页</a> &gt;
            <a href="<?php echo $position_info['city_url']; ?>"><?php echo $position_info['city_name']; ?></a> &gt;
            <a href="<?php echo $position_info['area_url']; ?>"><?php echo $position_info['area_name']; ?></a>
        </span>
    </div>
    <!--职位内容开始-->
    <div class="job_table">
        <div class="job_title">
            <h1><?php echo $year.$position_info['city_name'].$position_info['area_name']; ?>教师招聘成绩排名|成绩查询|分数线<h1>职位表
        </div>

        <div class="job_content zwlisttb">
            <table width='100%' border='0' cellSpacing='1' cellPadding='0' align='center'>
                <thead>
                <tr>
                    <th>职位代码</th>
                    <th>招聘单位</th>
                    <th>招聘岗位</th>
                    <th>招考人数</th>
                    <th>报考人数</th>
                    <th>分数线</th>
                    <th>成绩详细</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($list as $key=>$value) {
                    $key++;
                    ?>
                    <tr>
                        <td data-label='职位代码：'><?php echo $value['post_code'];?></td>
                        <td data-label='招聘单位：'><a href='/kscx/<?php echo $city_map[substr($value['post_code'],0,4)]['en'].'/'.$value['id'].($value['year']!=$system_config['year']?'/'.$value['year'].'.html':''); ?>'><?php echo $value['company'];?></a></td>
                        <td data-label='招聘岗位：'><?php echo $value['post_name'];?></td>
                        <td data-label='招考人数：'><?php echo $value['num'];?></td>
                        <td data-label='报考人数：'><?php echo $value['pay_num'];?></td>
                        <td data-label='分数线：'><?php echo $value['score'];?></td>
                        <td><a href='/lscx/<?php echo $value['year'];?>/<?php echo $value['id'];?>.html' class='num table3'>查看成绩排名</a></td>
                    </tr>
                <?php }

                ?>
                <tr><td style="padding: 3px; text-align: center;" colspan="10">共 <b><?php echo $key;?></b> 条信息  </td></tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="bm_txt">
        <p><strong><a class="cur" href="http://scwx.shichuedu.com/">网络课程</a><a
                        href="http://scwx.shichuedu.com/">教综基础精讲</a><a
                        href="http://scwx.shichuedu.com/">教综冲刺押题</a><a href="http://scwx.shichuedu.com/">教综考题强化</a><a
                        href="http://scwx.shichuedu.com/">专业知识精讲</a><a
                        href="http://scwx.shichuedu.com/">教学设计精讲</a><a href="http://scwx.shichuedu.com/" style="color: #f00;">双科全程</a><a href="http://zw.shichuedu.com/resources/kefu/rand.html">优惠报班</a></strong>
        </p>
        <p><strong><a class="cur" href="http://www.shichuedu.com/zhuanti/2020kc/">面授课程</a><a href="http://zw.shichuedu.com/resources/kefu/rand.html"
                                                                                   style="color: #f00;">教综精讲</a><a
                        href="http://zw.shichuedu.com/resources/kefu/rand.html">考题强化</a><a href="http://zw.shichuedu.com/resources/kefu/rand.html">专业知识精讲</a><a
                        href="http://zw.shichuedu.com/resources/kefu/rand.html" style="color: #f00;">教综系统</a><a
                        href="http://zw.shichuedu.com/resources/kefu/rand.html">专业系统</a><a href="http://zw.shichuedu.com/resources/kefu/rand.html">笔试全程</a><a
                        href="http://zw.shichuedu.com/resources/kefu/rand.html" style="color: #f00;">无限学</a><a
                        href="http://zw.shichuedu.com/resources/kefu/rand.html">笔面直通协议</a></strong></p>
    </div>
    <!--职位内容结束-->
    <div class="mzsm">
        <div><strong>免责声明：</strong>此职位信息来源安徽省中小学教师招聘考试网，只为各位考生提供报名参考之用,最终数据请以安徽省中小学教师招聘考试网正式公布为准。</div>
    </div>
    <script type="text/javascript" src="/resources/static/home/js/htjd.js"></script>
</div>
<div class="goauto" id="duibi" style='display:none'>
    <form action='/kscx/duibi/' method="get" onsubmit="return checkform()" id="form1">
        <div class="gozw_bt">职位对比<a href="javascript:;"><img src="http://zw.shichuedu.com/resources/static/home/img/xf_dalet.jpg"></a></div>
        <div class="gozw_box">
            <div class="gozw_box_list">
                <ul id='duibiul'>
                    <li id="duibi_01"></li>
                    <li id="duibi_02"></li>
                    <li id="duibi_03"></li>
                    <input type="hidden" id="duibi01" name="id0" value=''>
                    <input type="hidden" id="duibi02" name="id1" value=''>
                    <input type="hidden" id="duibi03" name="id2" value=''>
                </ul>
            </div>
            <div class="gozw_box_btn">
                <a href="javascript:;" class="redback" onclick="$('#form1').submit()">开始对比</a>
                <a href="javascript:;" class="huiback">取消</a>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript" src="/resources/static/home/js/duibi.js"></script>
<script type="text/javascript" src="http://zw.shichuedu.com/resources/static/home/js/share.js"></script>

</body>
</html>
