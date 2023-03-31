<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title><?php echo $system_config['year']; ?>安徽教师招聘考试录取分数线查询_安徽中小学教师招聘考试合格分数线</title>
    <meta name='keywords' content='安徽教师考试分数线查询,安徽教师考试合格分数线,安徽教师考试录取分数查询' />
    <meta name='description' content='安徽师出教育旗下师出网校提供<?php echo $system_config['year']; ?>安徽教师招聘考试分数线查询、笔试分数查询、合格分数线查询以及录取分数线查询。' />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta name="applicable-device" content="pc,mobile" />
    <link rel="shortcut icon" href="/resources/images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="/resources/static/home/css/zwk.css" />
    <script type="text/javascript" src="/resources/static/home/js/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="/resources/static/home/js/paihang.js"></script>
    <base target="_blank" />
</head>
<body>

<div class="ht_top"><div class="zt_top"><h1><a href="http://www.shichuedu.com/"><div class="logo"></div></a></h1><div class="topnav"><a href="http://www.shichuedu.com">师出教育</a> <a href="http://scwx.shichuedu.com">网校</a> <a href="http://www.ahteacher.com/" style="color: #ff0000">安徽教师招考网</a></div></div></div>
<div class="ht_banner">
    <div class="Width"><img src="/resources/static/home/img/<?php echo $system_config['year']; ?>banner_history.jpg" alt="<?php echo $system_config['year']; ?>安徽教师招聘位考试分数线" border="0" /></div>
</div>
<div class="ht_nav"><div class="zt_nav"><div class="nav"><ul>
			<li><a class="cur" href="/">首页</a></li>
            <li><a href="http://www.zgteachers.com/e/search/result/?searchid=3365">招聘公告</a></li>
            <li><a href="http://www.zgteachers.com/e/search/result/?searchid=3426">考试大纲</a></li>
            <li><a href="http://zw.shichuedu.com/zwhz" >历年职位</a></li>
            <li><a href="http://zw.shichuedu.com/kscx/bmtj/" style="color:#FFF500;">报名人数</a></li>
            <li><a href="http://zw.shichuedu.com/lscx/index/" >分数线</a></li>
            <li><a href="http://zw.shichuedu.com/ai" style="color:#FFF500;">智能选岗</a></li>
            <li><a href="http://www.shichuedu.com/zhuanti/2019kc/">面授课程</a></li>
            <li><a href="http://scwx.shichuedu.com/">网校课程</a></li>
            <li><a href="http://zw.shichuedu.com/msjc">面试形式</a></li>
            <li><a href="http://zw.shichuedu.com/resources/kefu/rand.html">优惠报班</a></li>
</ul></div></div></div>
<div class="box">

    <?php
        foreach ($yearlist as $year=>$vo){
            ?>
            <?php  if($year<>"2023"){ ?>
    <div class="job_title mt15"><?php echo $year; ?>安徽中小学教师招聘<span>笔试分数线查询</span></div>
    <div class="search">
        <ul class="search_tab">
            <li class="cur">职位分类查询</li>
             <a <?php  if($year<>"2023"){ ?>href="/lscx/home/<?php echo $year;?>.html"<?php }?>><p><?php echo $year;?>年分数库首页</p></a>
        </ul>
        <div class="sear_select">
            <form class="zwsTop" method="get" action="/lscx/search<?php echo $year;?>/">
                <input type="hidden" name="page" value="">
                <div class="select">
                    <ul>
                        <li><select id="kqid" name="kqid">
                                <option selected="" value="">--考区--</option>
                                <?php
                                    foreach ($vo['area_list'] as $k=>$value){
                                        ?>
                                        <option value="<?php echo $k;?>"><?php echo $city_map[$k]['zh'];?></option>
                                    <?php
                                        foreach ($value as $item){
                                          ?>  <option value="<?php echo $item['province'];?>">&nbsp;&nbsp;<?php echo $item['area'];?></option>
                                     <?php   }
                                    }

                                ?>
                            </select>
                        </li>
                        <li>
                            <select id="xueduan" name="xueduan">
                                <option selected="" value="">学段</option>
                                <?php
                                  foreach ($vo['study_section_list'] as $item){
                                      ?>
                                    <option value="<?php echo $item['study_section'];?>"><?php echo $item['study_section'];?></option>
                                 <?php }
                                ?>
                            </select>
                        </li>
                        <li>
                            <select id="xueke" name="xueke">
                                <option selected="" value="">学科</option>
                                <?php
                                foreach ($vo['subject_list'] as $item){
                                    ?>
                                    <option value="<?php echo $item['subject'];?>"><?php echo $item['subject'];?></option>
                                <?php }
                                ?>
                            </select>
                        </li>

                        <li>
                            <select id="xueli" name="xueli">
                                <option selected="" value="">学历</option>
                                <?php
                                foreach ($vo['degree_list'] as $item){
                                    ?>
                                    <option value="<?php echo $item['degree'];?>"><?php echo $item['degree'];?></option>
                                <?php }
                                ?>
                            </select>
                        </li>
                        <li>
                            <select id="zhuanye" name="zhuanye">
                                <option selected="" value="">专业</option>
                                <?php
                                foreach ($vo['profession_list'] as $value){
                                    ?>
                                    <option value="<?php echo $value['profession'];?>"><?php echo $value['profession'];?></option>
                                <?php  }
                                ?>
                            </select>
                        </li>
                        <li>
                            <select id="nianling" name="nianling">
                                <option selected="" value="">年龄</option>
                                <?php
                                foreach ($vo['age_list'] as $item){
                                    ?>
                                    <option value="<?php echo $item['age'];?>"><?php echo $item['age'];?></option>
                                <?php }
                                ?>
                            </select>
                        </li>

                        <li>
                            <select id="universityplan" name="universityplan">
                                <option selected="" value="">高校计划</option>
                                <?php
                                foreach ($vo['university_list'] as $value){
                                    ?>
                                    <option value="<?php echo $value['university_graduate_plan']?$value['university_graduate_plan']:"暂无";?>"><?php echo $value['university_graduate_plan']?$value['university_graduate_plan']:"暂无";?></option>
                                <?php  }
                                ?>
                            </select>
                        </li>


                    </ul>
                </div>
                <div class="select"><?php  if($year<>"2023"){ ?><input type="submit" class="search_btn" value="查询排名" name="" id="submit" ><?php } ?></div>
            </form>
        </div>
        <div class="sear_select hide">
            <form class="zwsTop" method="get" action="/kscx/search<?php echo $year;?>">
                <input type="hidden" name="page" value="">
                <div class="select cur">
                    <ul>
                        <li><input id="diqu" type="text" placeholder="行政辖区" name="diqu"></li>
                        <li><input id="bmmc" type="text" placeholder="招聘学校" name="bmmc"></li>
                        <li><input id="zwid" type="text" placeholder="职位代码" name="zwid"></li>
                        <li><input id="zwmc" type="text" placeholder="招聘职位" name="zwmc"></li>

                    </ul>
                </div>
                <div class="select"><input type='submit' class="search_btn" value='查询职位' name='' id='submit'></div>
            </form>
        </div>


    </div>
    <div class="i_jobcz">
        <h2>按地区-快速查找成绩排名</h2>
        <ul>
            <?php
            foreach ($city as $item){
                ?>
                <li><a target="_blank" href="/lscx/<?php echo $item['en'];?>/<?php echo $year != $system_config['year']?$year.'.php':'';?>"><?php echo $item['zh'];?></a></li>
            <?php  }
            ?>
        </ul>
    </div>
            


            <?php if($year == ($system_config['year']-1)){?>
                <div class="Width"><a href="http://scwx.shichuedu.com"><img src="http://zw.shichuedu.com/resources/static/home/img/top2016070701.jpg" border="0" width="100%"></a></div>
            <?php }?>

     <?php   }
    ?>

<?php } ?>

<!--    <div class="i_jobcz">-->
<!--        <h2>按地区-快速查找--><?php //echo $system_config['year']; ?><!--年教师职位</h2>-->
<!--        <ul id="nav">-->
<!--            --><?php
//                foreach ($city as $item){
//                    ?>
<!--                    <li><a target="_blank" href="/lscx/--><?php //echo $item['en'];?><!--/">--><?php //echo $item['zh'];?><!--</a></li>-->
<!--              --><?php // }
//            ?>
<!--        </ul>-->
<!--    </div>-->

    <!--职位内容结束-->
    <div class="mzsm"><div><strong>免责声明：</strong>提供此信息之目的在于为考生提供信息作为报名参考，请以人事部正式公布数据为准，谢谢！ </div></div>
    <!-- <script type="text/javascript" src="2016img/htjd.js"></script> -->
</div>
<div class="footer">
    <div class="div_footer box">
        <p>
            <a href="http://www.shichuedu.com/zhuanti/2019kc/">面授</a> |			<a href="http://scwx.shichuedu.com/">网课</a> |            <a href="https://shop324742308.taobao.com/">教材</a> |
            <a href="http://zw.shichuedu.com/paiming">分数排名</a> |            <a href="http://zw.shichuedu.com/resources/kefu/rand.html">微信客服</a> |
            <a href="http://scwx.shichuedu.com/">教师首页</a> |
            <a href="http://zw.shichuedu.com/resources/kefu/rand.html">QQ客服</a></p>
        <p>皖ICP备13007480号 皖公网安备34010302000541号</p>
    </div>
</div>
</body>
</html>
