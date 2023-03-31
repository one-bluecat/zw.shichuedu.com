<div class="box">
    <!--搜索开始-->
    <div class="i_jobcz">
        <h2>按地区-快速查找职位</h2>
        <ul id="nav">
            <?php
            foreach ($city as $k=>$v){
            ?><li><a target='_blank' href='/lscx/<?php echo $v['en'].($year!=$system_config['year']?'/'.$year.'.php':'');?>'><?php echo $v['zh'];?></a></li>
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
    <div class="search mt15">
        <ul class="search_tab">
            <li class="cur">分类查询</li><li>条件匹配</li>
        </ul>
        <div class="sear_select">
            <form class="zwsTop" method="get" action="/lscx/search<?php echo $year!=$system_config['year']?$year:'';?>/">
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

                    </ul>
                </div>
                <div class="select"><input type='submit' class="search_btn" value='查询职位' name='' id='submit'></div>
            </form>
        </div>

        <div class="sear_select hide">
            <form class="zwsTop" method="get" action="../search2017/search.php">
                <input type="hidden" name="page" value="">
                <div class="select">
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

   

    <!--职位内容结束-->
    <div class="share"><span>分享到</span><div class="bdsharebuttonbox"><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a><a href="#" class="bds_tieba" data-cmd="tieba" title="分享到百度贴吧"></a><a class="bds_count" data-cmd="count"></a></div></div>


    <!--搜索结束-->
    <div class="mzsm">
        <div><strong>免责声明：</strong>此职位信息来源安徽省中小学教师招聘考试网，只为各位考生提供报名参考之用,最终数据请以安徽省中小学教师招聘考试网正式公布为准。</div>
    </div>
    <script type="text/javascript" src="http://zw.shichuedu.com/resources/static/home/js/htjd.js"></script>
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
<div style="display:none">
    
</div>
</body>
</html>
