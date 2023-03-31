<script type="text/javascript" src="/resources/static/home/js/timec.js"></script>
<div class="box">
    <!--搜索开始-->
    <div class="search mt15">
        <ul class="search_tab">
            <li class="cur">职位分类查询</li><li>综合精确搜索</li>
<!--            <a href="/paiming/shuju/bmtj/"><p>报名人数统计</p></a>-->
        </ul>
        <div class="sear_select">
            <form class="zwsTop" method="get" action="/paiming/shuju/search<?php echo $year!=$system_config['year']?$year:'';?>">
                <input type="hidden" name="page" value="">
                <div class="select">
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

        <div class="sear_select hide">
            <form class="zwsTop" method="get" action="/paiming/shuju/search<?php echo $year!=$system_config['year']?$year:'';?>">
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

    <div class="i_jobcz">
        <h2>按地区-快速查找<?php echo $year?$year:$system_config['year'];?>分数</h2>
        <ul>
            <?php
            foreach ($city as $k=>$v){
                ?><li><a target='_blank' href='/paiming/shuju/<?php echo $v['en'];?><?php echo $year!=$system_config['year']?'/'.$year.'.php':'';?>'><?php echo $v['zh'];?></a></li>
            <?php  }
            ?>
        </ul>
    </div>
    <div class="gkdjs">
        <div class="gkdjs_t">
            <p><a href="http://scwx.shichuedu.com">安徽教师统考</a><br>倒计<span class="lxftime"><script>document.write(DateDiff(nowt,"<?php  echo $system_config['last_time'];?>"));</script></span>天</p>
        </div>
        <div class="gkdjs_r">
        <p>
            <a href="http://www.shichuedu.com/tongkao/xinxi/rukou/"><img src="http://zw.shichuedu.com/resources/static/home/img/gkrk_01.png">考试流程</a>
            <a href="http://www.shichuedu.com/tongkao/xinxi/gonggao/"><img src="http://zw.shichuedu.com/resources/static/home/img/gkrk_08.png">考试公告</a>
            <a href="http://www.shichuedu.com/tongkao/xinxi/dagang/"><img src="http://zw.shichuedu.com/resources/static/home/img/gkrk_02.png">考试大纲</a>
            <a href="http://www.shichuedu.com/tongkao/xinxi/rukou/"><img src="http://zw.shichuedu.com/resources/static/home/img/gkrk_03.png">报名入口</a>
            <a href="http://zw.shichuedu.com/ai"><img src="http://zw.shichuedu.com/resources/static/home/img/gkrk_12.png">智能选岗</a>
            <a href="http://zw.shichuedu.com/resources/kefu/rand.html"><img src="http://zw.shichuedu.com/resources/static/home/img/gkrk_15.png">照片调整</a>
            <a href="http://zw.shichuedu.com/lscx/rank/"><img src="http://zw.shichuedu.com/resources/static/home/img/gkrk_10.png">热门职位</a>
            <a href="http://zw.shichuedu.com/lscx/index/"><img src="http://zw.shichuedu.com/resources/static/home/img/gkrk_17.png">分数线</a>
            <a href="http://shichu.myzhishi.cn/web/pages/mall"><img src="http://zw.shichuedu.com/resources/static/home/img/gkrk_13.png">图书商城</a>
            <a href="http://www.shichuedu.com/tongkao/bishi/zhenti/"><img src="http://zw.shichuedu.com/resources/static/home/img/gkrk_20.png">历年真题</a>
            <a href="https://scwx.shichuedu.com/"><img src="http://zw.shichuedu.com/resources/static/home/img/gkrk_21.png">免费课程</a>
        </p>
    </div>
    </div>
    <div class="mian">
        <div class="listrbar">
            <div class="listrbarJz">
                <h3>报考热度排行</h3>
                <p><span>职位名称</span><span>报考人数</span></p>
                <ul>
                    <?php
                    foreach ($apply_order_list as $value){
                        ?>
                        <li><a title="小学英语" href="/paiming/shuju/<?php echo $value['year'].'/'.$value['id'];?>.html"><?php echo $value['post_name'];?></a><span><?php echo $value['apply_num'];?></span></li>
                    <?php  }
                    ?>
                </ul>
            </div>
            <div class="listrbarZw">
                <h3>竞争比例排行</h3>
                <p><span>职位名称</span><span>竞争比</span></p>
                <ul>
                    <?php
                    foreach ($compete_order_list as $value){
                        ?>
                        <li><a title="小学英语" href="/paiming/shuju/<?php echo $value['year'].'/'.$value['id'];?>.html"><?php echo $value['post_name'];?></a><span><?php if(ceil($value['compete_rate']) == $value['compete_rate']){echo (int)$value['compete_rate'];}else{echo $value['compete_rate'];}?></span></li>
                    <?php  }
                    ?>
                </ul>
            </div>
            <div class="listrbarRs">
                <h3>招考人数排行</h3>
                <p><span>职位名称</span><span>招考人数</span></p>
                <ul>
                    <?php
                    foreach ($zhaokao_order_list as $value){
                        ?>
                        <li><a title="小学英语" href="/paiming/shuju/<?php echo $value['year'].'/'.$value['id'];?>.html"><?php echo $value['post_name'];?></a><span><?php echo $value['num'];?></span></li>
                    <?php  }
                    ?>
                </ul>
            </div>
            <div class="zwlogo"><a href=""><img src="/resources/static/home/img/zwb.jpg" alt="安徽教师招聘考试职位表" width="100%" border="0" /></a></div>
        </div>

        <div class="container">
            <h3>各地职位信息</h3>
            <div class="waterfall">
                <?php
                foreach ($city_applyNum_list as $value){
                    ?>
                    <div class='gszw'>
                        <h5>
                            <a class='dishi' href='/paiming/shuju/<?php echo $city_map[$value['province']]['en'];?><?php echo $value['year']!=$system_config['year']?'/'.$value['year'].'.php':'';?>' title='<?php echo $system_config['year'];?>年安庆教师招聘考试职位表'><?php echo $city_map[$value['province']]['zh'];?></a>
                            <span>(<?php echo $value['post_num'];?>职位<?php echo $value['apply_num'];?>人)</span>
                            <a class='more' href='/paiming/shuju/<?php echo $city_map[$value['province']]['en'];?><?php echo $value['year']!=$system_config['year']?'/'.$value['year'].'.php':'';?>'>更多</a>
                        </h5>
                        <div class='zwlst'>
                            <ul>
                                <?php
                                foreach ($value['top10_post_list'] as $item){
                                    ?>
                                    <li><a href='/paiming/shuju/<?php echo $city_map[$value['province']]['en'];?>/<?php echo $item['id'];?><?php echo $value['year']!=$system_config['year']?'/'.$value['year'].'.html':'';?>'><?php echo $item['company'];?></a></li>
                                <?php }
                                ?>
                            </ul>
                        </div>
                    </div>
                <?php  }
                ?>
            </div>
        </div>

    </div>
    <!--职位内容结束-->
    <div class="mzsm"><div><strong>免责声明：</strong>提供此信息之目的在于为考生提供信息作为报名参考，请以安徽省中小学教师招聘考试网正式公布数据为准，谢谢！ </div></div>
    <script type="text/javascript" src="/resources/static/home/js/htjd.js"></script>
</div>
<script>
    (function($){
        /* 首页搜素切换 */
        $('.search_tab li').bind('mouseenter', function () {
            $(this).addClass('cur').siblings().removeClass('cur');
            $('.sear_select').eq($(this).index()).fadeIn().siblings('div').hide();
        })
    })(jQuery);</script>
<div class="ewm">
    <h4>微信扫码咨询</h4>
    <dl>
        <dt><a href="http://zw.shichuedu.com/resources/kefu/rand.html"><img src="http://zw.shichuedu.com/resources/images/wx.gif" width="100"></a></dt>
        <dd>点击QQ咨询</dd>
    </dl>
</div>
<canvas id="c" width="300" height="150"></canvas>
<script type="text/javascript" src="/resources/static/home/js/qipao.js"></script>

</body>
</html>
