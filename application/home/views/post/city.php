<div class="box">
    <!--搜索开始-->
    <div class="i_jobcz">
        <h2>按地区-快速查找职位</h2>
        <ul id="nav">
            <?php
            foreach ($city as $k=>$v){
            ?><li><a target='_blank' href='/kscx/<?php echo $v['en'].($year!=$system_config['year']?'/'.$year.'.php':'');?>'><?php echo $v['zh'];?></a></li>
                <?php  }
                ?>
        </ul>
    </div>
    <div class="job-table">
        <!--职位内容开始-->
        <div class='job_title'><h1><?php echo $year;?>安徽<?php echo $city_map[$city_applyNum_list['province']]['zh'];?>教师招聘考试职位表</h1><span>(<?php echo $city_applyNum_list['post_num'];?>个职位、<?php echo $city_applyNum_list['apply_num'];?>人)</span><a href='/kscx/bmtj/<?php echo $city_map[$city_applyNum_list['province']]['en'].($year!=$system_config['year']?$year:"");?>.html'><p><?php echo $city_map[$city_applyNum_list['province']]['zh'];?>报名统计</p></a></div>
        <div class='job_content'>
            <div class='diqu'>
                <ul>
                    <?php
                    foreach ($area_arr as $k=>$v){
                    ?><li><a href='<?php echo $v['url'];?>'><?php echo $v['area'];?></a></li>
                        <?php  }
                        ?>
                </ul>
            </div>
            <div class='waterfallc'>
                <?php
                foreach ($company_list as $k=>$v){
                    ?><li><a href='<?php echo $v['url'];?>'><?php echo $v['company'];?></a></li>
                <?php  }
                ?>
            </div>
        </div>
        <p class='title-height20'></p>

    </div>
            <div class="job-table">
                <!--职位内容开始-->
                <div class='job_title'><h1><?php echo $year;?><?php echo $city_map[$city_applyNum_list['province']]['zh'];?>地市学科学段招聘岗位人数统计</h1></div>
                <div class='job_content'>
                    <div class="job_content zwlisttb">
                        <table width='100%' border='0' cellSpacing='1' cellPadding='0' align='center'>
                            <thead>
                            <tr>
                                <th>学段</th>
                                <th>专业</th>
                                    <?php
                                        foreach ($title as $key=>$value) {
                                        ?>
                                            <th><?php echo $value;?></th>
                                        <?php }
                                    ?>
                                <th>合计</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                        $row=0;
                                    foreach ($stat['primary']['subject_list'] as $subject){
                                      ?>
                                        <tr>
                                               <?php
                                                    if($row==0){
                                                        ?><td rowspan="<?php echo count($stat['primary']['subject_list']);?>">小学</td>
                                                 <?php   }
                                               ?>
                                               <td data-label='（小学）'><?php echo $subject;?></td>
                                               <?php
                                               foreach ($title as $key=>$value) {
                                                   ?>
                                                    <td data-label='<?php echo $value;?>：' ><?php echo $stat['primary'][$subject][$key]?$stat['primary'][$subject][$key]:0;?></td>
                                                <?php }
                                                ?>
                                            <td data-label='合计：'><?php echo  $stat['primary'][$subject]['total'];?></td>
                                        </tr>
                                    <?php
                                        $row++;
                                    }
                              ?>



                                <?php
                                $row=0;
                                foreach ($stat['middle']['subject_list'] as $subject){
                                    ?>
                                    <tr>
                                        <?php
                                        if($row==0){
                                            ?><td rowspan="<?php echo count($stat['middle']['subject_list']);?>">初中</td>
                                        <?php   }
                                        ?>
                                        <td data-label='（初中）'><?php echo $subject;?></td>
                                        <?php
                                        foreach ($title as $key=>$value) {
                                            ?>
                                            <td data-label='<?php echo $value;?>：' ><?php echo $stat['middle'][$subject][$key]?$stat['middle'][$subject][$key]:0;?></td>
                                        <?php }
                                        ?>
                                        <td data-label='合计：'><?php echo  $stat['middle'][$subject]['total'];?></td>
                                    </tr>
                                    <?php
                                    $row++;
                                }
                                ?>


                                <?php
                                $row=0;
                                foreach ($stat['high']['subject_list'] as $subject){
                                    ?>
                                    <tr>
                                        <?php
                                        if($row==0){
                                            ?><td rowspan="<?php echo count($stat['high']['subject_list']);?>">高中</td>
                                        <?php   }
                                        ?>
                                        <td data-label='（高中）'><?php echo $subject;?></td>
                                        <?php
                                        foreach ($title as $key=>$value) {
                                            ?>
                                            <td data-label='<?php echo $value;?>：' ><?php echo $stat['high'][$subject][$key]?$stat['high'][$subject][$key]:0;?></td>
                                        <?php }
                                        ?>
                                        <td data-label='合计：'><?php echo  $stat['high'][$subject]['total'];?></td>
                                    </tr>
                                    <?php
                                    $row++;
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

    <div class="search mt15">
        <ul class="search_tab">
            <li class="cur"><?php echo $year;?>职位查询</li><a href="/kscx/bmtj/<?php echo $year!=$system_config['year']?$year.'.html':'';?>"><p>报名人数统计</p></a>
        </ul>
        <div class="sear_select">
            <form class="zwsTop" method="get" action="/kscx/search<?php echo $year!=$system_config['year']?$year:'';?>/">
                <input type="hidden" name="page" value="">
                <div class="select cur">
                    <ul>
                        <li><select id="kqid" name="kqid">
                                <option selected="" value="">--考区--</option>
                                <?php foreach($area_list as $key=>$r):?>
                                    <option value="<?php echo $key;?>"><?php echo $city_map[$key]['zh'];?></option>
                                    <?php foreach($r as $re):?>
                                        <option value="<?php echo $re['province'];?>" >&nbsp;&nbsp;<?php echo $re['area'];?></option>
                                    <?php endforeach;?>
                                <?php endforeach;?>
                            </select>
                        </li>
                        <li>
                            <select id="xueduan" name="xueduan">
                                <option selected="" value="">学段</option>
                                <?php
                                foreach ($study_section_list as $value){
                                    ?>
                                    <option value="<?php echo $value['study_section'];?>"><?php echo $value['study_section'];?></option>
                                <?php  }
                                ?>

                            </select>
                        </li>
                        <li>
                            <select id="xueke" name="xueke">
                                <option selected="" value="">学科</option>
                                <?php
                                foreach ($subject_list as $value){
                                    ?>
                                    <option value="<?php echo $value['subject'];?>"><?php echo $value['subject'];?></option>
                                <?php  }
                                ?>

                            </select>
                        </li>

                        <li>
                            <select id="xueli" name="xueli">
                                <option selected="" value="">学历</option>
                                <?php
                                foreach ($degree_list as $value){
                                    ?>
                                    <option value="<?php echo $value['degree'];?>"><?php echo $value['degree'];?></option>
                                <?php  }
                                ?>
                            </select>
                        </li>
                        <li>
                            <select id="zhuanye" name="zhuanye">
                                <option selected="" value="">专业</option>
                                <?php
                                foreach ($profession_list as $value){
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
                                foreach ($age_list as $value){
                                    ?>
                                    <option value="<?php echo $value['age'];?>"><?php echo $value['age'];?></option>
                                <?php  }
                                ?>
                            </select>
                        </li>
						<li>
                            <select id="universityplan" name="universityplan">
                                <option selected="" value="">高校计划</option>
                                <?php
                                foreach ($university_list as $value){
                                    ?>
                                    <option value="<?php echo $value['university_graduate_plan']?$value['university_graduate_plan']:"暂无";?>"><?php echo $value['university_graduate_plan']?$value['university_graduate_plan']:"暂无";?></option>
                                <?php  }
                                ?>
                            </select>
                        </li>

                    </ul>
                </div>
                <div class="select"><input type='submit' class="search_btn" value='查询职位' name='' id='submit'></div>
            </form>
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
    <div class="share"><span>分享到</span><div class="bdsharebuttonbox"><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a><a href="#" class="bds_tieba" data-cmd="tieba" title="分享到百度贴吧"></a><a class="bds_count" data-cmd="count"></a></div></div>


    <!--搜索结束-->
    <div class="mzsm">
        <div><strong>免责声明：</strong>此职位信息来源安徽省中小学教师招聘考试网，只为各位考生提供报名参考之用,最终数据请以安徽省中小学教师招聘考试网正式公布为准。</div>
    </div>
    <script type="text/javascript" src="../2018img/htjd.js"></script>
</div>
<script>
    (function($){
        /* 首页搜素切换 */
        $('.search_tab li').bind('mouseenter', function () {
            $(this).addClass('cur').siblings().removeClass('cur');
            $('.sear_select').eq($(this).index()).fadeIn().siblings('div').hide();
        })
    })(jQuery);</script>
<script type="text/javascript" src="http://zw.shichuedu.com/resources/static/home/js/share.js"></script>

</body>
</html>
