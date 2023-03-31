<div class="box">
    <?php
        foreach ($yearlist as $year=>$vo){
            ?>
    <div class="job_title mt15"><?php echo $year; ?>安徽中小学教师招聘</div>
    <div class="search">
        <ul class="search_tab">
            <li class="cur">职位分类查询</li>
            <!--<li>精确搜索</li>-->
            <!--            --><?php //if($year == $system_config['year']){?><!--<a href="/lscx/cjpm/"><p>成绩排名查询系统</p></a>--><?php //}?>
                        <a href="/home/index/<?php echo $year;?>"><p><?php echo $year;?>年职位库首页</p></a>
        </ul>
        <div class="sear_select">
            <form class="zwsTop" method="get" action="/kscx/search<?php echo $year;?>/">
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
                <div class="select"><input type="submit" class="search_btn" value="查询排名" name="" id="submit"></div>
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
                <li><a target="_blank" href="/kscx/<?php echo $item['en'];?>/<?php echo $year != $system_config['year']?$year.'.php':'';?>"><?php echo $item['zh'];?></a></li>
            <?php  }
            ?>
        </ul>
    </div>
            <!-- <?php if($year == $system_config['year']){?>
                <div class="Width mt15"><a href="http://scwx.shichuedu.com"><img src="http://zw.shichuedu.com/resources/static/home/img/top2016070701.jpg" width="100%"></a></div>
            <?php }?> -->


            <?php if($year == ($system_config['year']-1)){?>
                <div class="Width">
                    <a href="http://www.shichujiaoyu.top/">
                        <img src="http://zw.shichuedu.com/resources/static/home/img/top2016070701.jpg" border="0" width="100%"></a>
                </div>
            <?php }?>

     <?php   }
    ?>



<!--    <div class="i_jobcz">-->
<!--        <h2>按地区-快速查找--><?php //echo $system_config['year']; ?><!--年教师职位</h2>-->
<!--        <ul id="nav">-->
<!--            --><?php
//                foreach ($city as $item){
//                    ?>
<!--                    <li><a target="_blank" href="/kscx/--><?php //echo $item['en'];?><!--/">--><?php //echo $item['zh'];?><!--</a></li>-->
<!--              --><?php // }
//            ?>
<!--        </ul>-->
<!--    </div>-->

    <!--职位内容结束-->
    <div class="mzsm"><div><strong>免责声明：</strong>提供此信息之目的在于为考生提供信息作为报名参考，请以人事部正式公布数据为准，谢谢！ </div></div>
    <!-- <script type="text/javascript" src="2016img/htjd.js"></script> -->
</div>
<script>
    (function($){
        /* 首页搜素切换 */
        $('.search_tab li').bind('mouseenter', function () {
            $(this).addClass('cur').siblings().removeClass('cur');
            if(!$(this).index()){
                $(this).parent('ul').siblings('.sear_select').first().fadeIn();
                $(this).parent('ul').siblings('.sear_select').last().hide();
            }else{
                $(this).parent('ul').siblings('.sear_select').first().hide();
                $(this).parent('ul').siblings('.sear_select').last().fadeIn();
            }
            // console.log($(this).index());
            // console.log($(this).parent('ul').siblings('.sear_select').last().html());

            // $('.sear_select').fadeIn();
            // $('.sear_select').eq($(this).index()).fadeIn().siblings('div').hide();
        })
    })(jQuery);</script>
</body>
</html>
