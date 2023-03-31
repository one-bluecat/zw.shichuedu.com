<div class="box">
    <!--搜索开始-->
    <div class="search mt15">
        <ul class="search_tab">
            <li class="cur">职位分类查询</li>
            <!--<li>精确搜索</li>-->
            <a href="https://jq.qq.com/?_wv=1027&k=5zjwWqs" class="fr" title="<?php echo $system_config['year']; ?>安徽教师指导QQ群"><img class="group" src="http://zw.shichuedu.com/resources/static/home/img/qqgroup.png" alt="<?php echo $system_config['year']; ?>安徽教师指导QQ群" border="0"></a>
        </ul>
        <div class="sear_select">
            <form class="zwsTop" method="get" action="/lscx/search<?php echo $year;?>/">
                <input type="hidden" name="page" value="">
                <div class="select cur">
                    <ul>
                        <li><select id="kqid" name="kqid">
                                <option selected="" value="">--考区--</option>
                                <?php foreach($list['area_list'] as $key=>$r):?>
                                    <option value="<?php echo $key;?>"><?php echo $city_map[$key]['zh'];?></option>
                                    <?php foreach($r as $re):?>
                                        <option value="<?php echo $re['province'];?>" >&nbsp;&nbsp;<?php echo $re['area'];?></option>
                                    <?php endforeach;?>
                                <?php endforeach;?>
                            </select></li>
                        <li>
                            <select id="xueduan" name="xueduan">
                                <option selected="" value="">学段</option>
                                <?php
                                foreach ($list['study_section_list'] as $item){
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
                                foreach ($list['subject_list'] as $value){
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
                                foreach ($list['degree_list'] as $value){
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
                                foreach ($list['profession_list'] as $value){
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
                                foreach ($list['age_list'] as $value){
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
                <div class="select"><input type='submit' class="search_btn" value='查询排名' name='' id='submit'></div>
            </form>
        </div>

        <div class="sear_select hide">
            <form class="zwsTop" method="get" action="/lscx/search<?php echo $year;?>/">
                <input type="hidden" name="page" value="">
                <div class="select cur">
                    <ul>
                        <li><input id="diqu" type="text" placeholder="行政辖区" name="diqu"></li>
                        <li><input id="bmmc" type="text" placeholder="招聘学校" name="bmmc"></li>
                        <li><input id="zwid" type="text" placeholder="职位代码" name="zwid"></li>
                        <li><input id="zwmc" type="text" placeholder="招聘职位" name="zwmc"></li>
                    </ul>
                </div>
                <div class="select"><input type='submit' class="search_btn" value='查询排名' name='' id='submit'></div>
            </form>
        </div>

    </div>

    <div class="job_title mt10"><?php echo $year; ?>安徽教师招聘考试成绩排名查询</div>
    <div class="job_content zwlisttb">
        <!--职位内容开始-->
        <table width="100%" cellspacing="0">
            <thead>
            <tr><th>职位代码</th>
                <th>地区</th>
                <th>招聘单位</th>
                <th>职位</th>
                <th>招考人数</th>
                <th>报考人数</th>
                <th>分数线</th>
                <th>成绩详情</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($data['list'] as $value){
                        ?>
                <tr>
                    <td data-label="职位代码："><?php echo $value['post_code'];?></td>
                    <td data-label="省份："><?php echo $city_map[substr($value['post_code'],0,4)]['zh']; ?></td>
                    <td data-label="招聘单位："><?php echo $value['company']; ?></td>
                    <td data-label="职位："><?php echo $value['post_name']; ?></td>
                    <td data-label="招考人数："><?php echo $value['num']; ?></td>
                    <td data-label="报考人数："><?php echo $value['pay_num']; ?></td>
                    <td data-label="分数线："><?php echo $value['score']; ?></td>
                    <td><a class="num table3" href="/lscx/<?php echo $value['year'];?>/<?php echo $value['id']; ?>.html">查看成绩排名</a></td>
                </tr>

                    <?php }
                ?>
        </table>
        <div class="fanye mt15 mb10">
            <?php
            echo $data['page'];
            ?>
        </div>
    </div>

    <!--搜索结束-->
</div>
<script type="text/javascript" src="/resources/static/home/js/selectindex.js"></script>
<div class="goauto" id="duibi" style='display:none'>
    <form action='duibi.php' method="get" onsubmit="return checkform()" id="form1">
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
                <a href="javascript:;" class="huiback" >取消</a>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript" src="/resources/static/home/js/duibi.js"></script>
<script>
    (function($){
        /* 首页搜素切换 */
        $('.search_tab li').bind('mouseenter', function () {
            $(this).addClass('cur').siblings().removeClass('cur');
            $('.sear_select').eq($(this).index()).fadeIn().siblings('div').hide();
        })
    })(jQuery);</script>
<canvas id="c" width="300" height="150"></canvas>
<script type="text/javascript" src="/resources/static/home/js/qipao.js"></script>


</body>
</html>
