<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title><?php echo $year;?>安徽省<?php if($city_name){echo $city_name;}else{echo '各地市';}?>教师招聘考试报名人数统计_报名入口|职位查询-<?php echo $city_name;?>教师招聘考试网</title>
    <meta name='keywords' content='安徽省<?php if($city_name){echo $city_name;}else{echo '各地市';}?>教师招聘报名人数,安徽省<?php if($city_name){echo $city_name;}else{echo '各地市';}?>教师招聘报名入口,安徽省<?php if($city_name){echo $city_name;}else{echo '各地市';}?>教师考编,安徽省各地市教师招聘考试网'>
    <meta name='description' content='师出网校提供<?php echo $system_config['year'];?>安徽省<?php if($city_name){echo $city_name;}else{echo '各地市';}?>教师招聘考试报名人数统计,安徽省<?php if($city_name){echo $city_name;}else{echo '各地市';}?>教师招聘考试报名入口,包括安徽省<?php if($city_name){echo $city_name;}else{echo '各地市';}?>职位表查询、报名人数统计、合格人数及职位竞争比统计。' />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta name="applicable-device" content="pc,mobile" />
    <link rel="shortcut icon" href="/resources/images/favicon.ico">
    <link type="text/css" rel="stylesheet" href="/resources/static/home/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/resources/static/home/css/rstj.css?1" />
    <script type="text/javascript" src="/resources/static/home/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="/resources/static/home/js/timec.js"></script>
    <script type="text/javascript"  src="/resources/static/home/highcharts/highcharts.js"></script>
    <script type="text/javascript"  src="/resources/static/home/highcharts/highcharts-3d.js"></script>
    <script type="text/javascript"  src="/resources/static/home/highcharts/exporting.js"></script>
    <script type="text/javascript"  src="/resources/static/home/highcharts/highcharts-zh_CN.js"></script>
	<script src="http://zw.shichuedu.com/resources/js/baidu.js"></script>
    <base target="_blank"/>
</head>
<body>
<!--顶部导航-->
<div class="ht_top">
    <div class="container">
        <div class="logo"><a href="http://www.shichuedu.com/"><img alt="师出教育" src="http://zw.shichuedu.com/resources/static/home/img/logo.gif" border="0"></a></div>
        <div class="topnav"><a href="http://www.shichuedu.com" >师出教育</a> <a href="http://scwx.shichuedu.com">网校</a> <a href="http://www.ahteacher.com/" style="color: #ff0000">安徽教师招考网</a></div>
    </div>
</div>
<!--顶部导航-->
<div class="top">
    <div class="container banner"><img src="/resources/static/home/img/topimgs.jpg" border="0" width="100%"/></div>
</div>
<div class="container pt10">
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
            <a href="https://scwx.shichuedu.com/"><img src="http://zw.shichuedu.com/resources/static/home/img/gkrk_21.png">免费试听</a>
        </p>
    </div>
</div>
</div>
<div class="container pt10">
    <?php
    if($year == $system_config['year']){
        ?>
        <div class="i_jobcz">
            <h2>按地区-快速查找职位报名人数统计</h2>
            <ul id="nav">
                <li><a target="_self" href="/kscx/bmtj" title="<?php echo $system_config['year'];?>年安徽教师考编职位报名人数统计">全省</a></li>
                <?php
                foreach ($city as $value){
                    ?>
                    <li><a target="_self" href="/kscx/bmtj/<?php echo $value['en'].'.html';?>" title="<?php echo $system_config['year'];?>年安徽教师考编职位报名人数统计"><?php echo $value['zh'];?></a></li>
                <?php }
                ?>
            </ul>
        </div>
 <?php   }
    ?>

    <div class="btl">
        <h2><?php echo $year;?>安徽<?php echo $city_name;?>教师招聘考试报考人数汇总</h2>
        <span>更新时间：<?php echo $system_config['zhiwei_newupdate_time'];?>。<input type="button" value="点击刷新页面" onclick="javascript:window.top.location.reload()"><a href="https://jq.qq.com/?_wv=1027&k=I4tLj4Jw"><img class="group" src="http://zw.shichuedu.com/resources/static/home/img/qqgroup.png" border="0"></a></span>
    </div>
    <div id="htechartzh3" style="width:100%px;"></div>
    <!-- <div id="sliders" class="main">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="left">
            <tr>
                <td>α 角（内旋转角）</td>
                <td><input id="alpha" type="range" min="0" max="45" value="15"/> <span id="alpha-value" class="value"></span></td>
            </tr>
            <tr>
                <td>β 角（外旋转角）</td>
                <td><input id="beta" type="range" min="-45" max="45" value="15"/> <span id="beta-value" class="value"></span></td>
            </tr>
            <tr>
                <td>深度</td>
                <td><input id="depth" type="range" min="20" max="100" value="50"/> <span id="depth-value" class="value"></span></td>
            </tr>
        </table>
    </div> -->
    <div class="main">
        <table width="100%" border="0" cellspacing="1" cellpadding="0" align="center">
            <thead>
            <tr>
                <th>地市</th>
                <th>职位数</th>
                <th>招考人数</th>
                <th colspan="2">报名人数</th>
<!--                <th>0报名职位</th>-->
                <th colspan="2">合格人数</th>
<!--                <th>0合格职位</th>-->
                <th>缴费人数</th>
                <th>竞争比</th>
                <th>职位</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $total_post_num = $total_require_num = $total_apply_num = $total_pass_num = $total_pay_num=0;
             foreach ($stat_list as $value){
                 $total_post_num+=$value['post_num'];
                 $total_require_num+=$value['require_num'];
                 $total_apply_num+=$value['apply_num'];
                 $total_pass_num+=$value['pass_num'];
                 $total_pay_num+=$value['pay_num'];
                 ?>
                 <tr>
                     <td><a class='red' href='<?php echo $value['url'];?>'><?php echo $value['name'];?></a></td>
                     <td><?php echo $value['post_num'];?></td>
                     <td><?php echo $value['require_num'];?></td>
                     <td colspan="2" style='background:#F7F7F7;'><?php echo $value['apply_num'];?></td>
                     <td  colspan="2" style='background:#F7F7F7;'><?php echo $value['pass_num'];?></td>
                     <td style='background:#F7F7F7;'><?php echo $value['pay_num'];?></</td>
                     <td><?php if($value['pay_num'] == '暂无'){ echo '暂无';}else{ echo round($value['pay_num']/$value['require_num'],2);}?></td>
                     <td><a href='<?php echo $value['url'];?>' class='num table3'>查看</a></td>
                 </tr>
            <?php }
            ?>

            <tr>
                <td>汇总</td>
                <td><?php echo $total_post_num;?></td>
                <td><?php echo $total_require_num;?></td>
                <td colspan="2" style='background:#F7F7F7;'><?php if($value['apply_num'] == '暂无'){echo '暂无';}else{ echo $total_apply_num;}?></td>
                <td colspan="2" style='background:#F7F7F7;'><?php if($value['pass_num'] == '暂无'){echo '暂无';}else{ echo $total_pass_num;}?></td>
                <td style='background:#F7F7F7;'><?php if($value['pay_num'] == '暂无'){echo '暂无';}else{ echo $total_pay_num;}?></td>
                <td><?php if($value['pay_num'] == '暂无'){echo '暂无';}else{echo round($total_pay_num/$total_require_num,1);}?></td>
                <td><a target='_blank' href='/kscx/search/' class='num table3'>查询</a></td>
            </tr>
            <td colspan="10" class="tsbz"><!-- ； -->注：竞争比=缴费人数÷招考人数。
                <!-- <br/><b>温馨提示：</b>所报岗位因报名人数不足被取消的，报考人员可在<span style="color:red">6月14日8:00至12:00</span>进行一次改报，逾期不再受理。 --></td>
            </tbody>
        </table>
    </div>
</div>

<div class="bm_zwtxt">
    <p>
        <a href="/kscx/search<?php echo $year!=$system_config['year']?$year:"";?>/" style="color: #f00">职位表查询</a>
        <a href="/kscx/rank<?php echo $year!=$system_config['year']?$year:"";?>/" class="cur">热门职位查询</a>
        <a href="/kscx/rank<?php echo $year!=$system_config['year']?$year:"";?>/?act=num">招考人数排名</a>
        <a href="/kscx/rank<?php echo $year!=$system_config['year']?$year:"";?>/?act=apply_num">报名人数排名</a>
        <a href="/kscx/rank<?php echo $year!=$system_config['year']?$year:"";?>/?act=pass_num">合格人数排名</a>
        <a href="/kscx/rank<?php echo $year!=$system_config['year']?$year:"";?>/?act=compete_rate">竞争比排名</a>
        <a href="/kscx/rank<?php echo $year!=$system_config['year']?$year:"";?>/?act=pay_num">缴费人排名</a>
    </p>
    <p>
        <a href="/lscx/index/" style="color: #f00">分数线查询</a>
        <a href="/kscx/rank<?php echo $year!=$system_config['year']?$year:"";?>/lengmen.php" class="cur">冷门职位查询</a>
        <a href="/kscx/rank<?php echo $year!=$system_config['year']?$year:"";?>/lengmen.php?act=num">招考人数排名</a>
        <a href="/kscx/rank<?php echo $year!=$system_config['year']?$year:"";?>/lengmen.php?act=apply_num">报名人数排名</a>
        <a href="/kscx/rank<?php echo $year!=$system_config['year']?$year:"";?>/lengmen.php?act=pass_num">合格人数排名</a>
        <a href="/kscx/rank<?php echo $year!=$system_config['year']?$year:"";?>/lengmen.php?act=compete_rate">竞争比排名</a>
        <a href="/kscx/rank<?php echo $year!=$system_config['year']?$year:"";?>/lengmen.php?act=pay_num">缴费人排名</a>
    </p>
</div>
<div class="container pt10">
    <div class="btl">
        <h2><?php echo $city_name?$city_name:"安徽教师招聘考试";?>各学科报考人数汇总</h2>
        <span>更新时间：<?php echo $system_config['zhiwei_newupdate_time'];?>&nbsp;&nbsp;&nbsp;<a href="https://jq.qq.com/?_wv=1027&k=I4tLj4Jw"><img class="group" src="http://zw.shichuedu.com/resources/static/home/img/qqgroup.png" border="0"></a></span>
    </div>
    <!-- <div id="htechartzh4" style="width:100%px;height:800px"></div> -->
    <div class="main">
        <table width="100%" border="0" cellspacing="1" cellpadding="0" align="center">
            <thead>
            <tr>
                <th>学科</th>
                <th>职位数</th>
                <th>招考人数</th>
                <th colspan="2">报名人数</th>
<!--                <th>0报名职位</th>-->
                <th colspan="2">合格人数</th>
<!--                <th>0合格职位</th>-->
                <th>缴费人数</th>
                <th>竞争比</th>
                <th>职位</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $total_post_num = $total_require_num = $total_apply_num = $total_pass_num = $total_pay_num=0;
            foreach ($stat_subject_list as $value){
                $total_post_num+=$value['post_num'];
                $total_require_num+=$value['require_num'];
                $total_apply_num+=$value['apply_num'];
                $total_pass_num+=$value['pass_num'];
                $total_pay_num+=$value['pay_num'];
                ?>
            <tr>
                <td><?php echo $value['subject'];?></td>
                <td><?php echo $value['post_num'];?></td>
                <td><?php echo $value['require_num'];?></td>
                <td colspan="2" style='background:#F7F7F7;'><?php echo $value['apply_num'];?></td>
                <td  colspan="2" style='background:#F7F7F7;'><?php echo $value['pass_num'];?></td>
                <td style='background:#F7F7F7;'><?php echo $value['pay_num'];?></</td>
                <td><?php if($value['pay_num'] == '暂无'){ echo '暂无';}else{echo round($value['pay_num']/$value['require_num'],1);}?></td>
                <td><a href='<?php echo $value['url'];?>' class='num table3'>查看</a></td>
            </tr>
            <?php }
            ?>
            <tr>
                <td>汇总</td>
                <td><?php echo $total_post_num;?></td>
                <td><?php echo $total_require_num;?></td>
                <td colspan="2" style='background:#F7F7F7;'><?php if($value['apply_num'] == '暂无'){ echo '暂无';}else{echo $total_apply_num;}?></td>
                <td colspan="2" style='background:#F7F7F7;'><?php  if($value['pass_num'] == '暂无'){ echo '暂无';}else{echo $total_pass_num;}?></td>
                <td style='background:#F7F7F7;'><?php  if($value['pay_num'] == '暂无'){ echo '暂无';}else{echo $total_pay_num;}?></td>
                <td><?php   if($value['pay_num'] == '暂无'){ echo '暂无';}else{echo round($total_pay_num/$total_require_num,1);}?></td>
                <td><a target='_blank' href='/kscx/search/' class='num table3'>查询</a></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="container pt10">
    <div class="btl">
        <h2><?php echo $city_name;?>各学段报考人数汇总</h2>
        <span>更新时间：<?php echo $system_config['zhiwei_newupdate_time'];?>&nbsp;&nbsp;&nbsp;<a href="https://jq.qq.com/?_wv=1027&k=I4tLj4Jw"><img class="group" src="http://zw.shichuedu.com/resources/static/home/img/qqgroup.png" border="0"></a></span>
    </div>
    <!-- <div id="htechartzh5" style="width:100%px;"></div> -->
    <div class="main">
        <table width="100%" border="0" cellspacing="1" cellpadding="0" align="center">
            <thead>
            <tr>
                <th>学段</th>
                <th>职位数</th>
                <th>招考人数</th>
                <th colspan="2">报名人数</th>
<!--                <th>0报名职位</th>-->
                <th colspan="2">合格人数</th>
<!--                <th>0合格职位</th>-->
                <th>缴费人数</th>
                <th>竞争比</th>
                <th>职位</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $total_post_num = $total_require_num = $total_apply_num = $total_pass_num = $total_pay_num=0;
            foreach ($stat_study_section_list as $value){
                $total_post_num+=$value['post_num'];
                $total_require_num+=$value['require_num'];
                $total_apply_num+=$value['apply_num'];
                $total_pass_num+=$value['pass_num'];
                $total_pay_num+=$value['pay_num'];
                ?>
                <tr>
                    <td><?php echo $value['study_section'];?></td>
                    <td><?php echo $value['post_num'];?></td>
                    <td><?php echo $value['require_num'];?></td>
                    <td colspan="2" style='background:#F7F7F7;'><?php echo $value['apply_num'];?></td>
                    <td  colspan="2" style='background:#F7F7F7;'><?php echo $value['pass_num'];?></td>
                    <td style='background:#F7F7F7;'><?php echo $value['pay_num'];?></</td>
                    <td><?php if($value['pay_num'] =='暂无'){echo '暂无';}else{ echo round($value['pay_num']/$value['require_num'],1);}?></td>
                    <td><a href='<?php echo $value['url'];?>' class='num table3'>查看</a></td>
                </tr>
            <?php }
            ?>
            <tr>
                <td>汇总</td>
                <td><?php echo $total_post_num;?></td>
                <td><?php echo $total_require_num;?></td>
                <td colspan="2" style='background:#F7F7F7;'><?php if($value['apply_num'] == '暂无'){ echo '暂无';}else{echo $total_apply_num;}?></td>
                <td colspan="2" style='background:#F7F7F7;'><?php if($value['pass_num'] == '暂无'){ echo '暂无';}else{echo $total_pass_num;}?></td>
                <td style='background:#F7F7F7;'><?php if($value['pay_num'] == '暂无'){ echo '暂无';}else{echo $total_pay_num;}?></td>
                <td><?php if($value['pay_num'] == '暂无'){ echo '暂无';}else{echo round($total_pay_num/$total_require_num,1);}?></td>
                <td><a target='_blank' href='/kscx/search/' class='num table3'>查询</a></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="container pt10">
    <div class="btl">
        <h2><?php echo $city_name;?>报名人数最多的十大职位</h2>
        <span>更新时间：<?php echo $system_config['zhiwei_newupdate_time'];?>&nbsp;&nbsp;&nbsp;<a href="../rank/?act=apply_num">实时数据</a></span>
    </div>
    <!-- <div id="htechartzh6"></div> -->
    <div class="main">
        <table width="100%" border="0" cellspacing="1" cellpadding="0" align="center">
            <thead>
            <tr>
                <th>排名</th>
                <th>招聘地区</th>
                <th>职位代码</th>
                <th>招聘单位</th>
                <th>招聘岗位</th>
                <th>招考人数</th>
                <th>报名人数</th>
                <th>详情</th>
            </tr>
            </thead>
            <tbody>
            <?php
                foreach ($stat_post_list as $key=>$value){

            ?>
            <tr>
                <td><b><?php echo ($key+1);?></b></td>
                <td><a href="/kscx/<?php echo $city_map[substr($value['province'],0,4)]['en'];?>" class="red"><?php echo $city_map[substr($value['province'],0,4)]['zh'];?></a></td>
                <td><?php echo $value['post_code'];?></td>
                <td><?php echo $value['company'];?></td>
                <td><?php echo $value['post_name'];?></td>
                <td><?php echo $value['require_num'];?></td>
                <td style="background: #ececec;color:#f00;"><?php echo $value['apply_num'];?></td>
                <td><a href="<?php echo $value['url'].'.html';?>" class="num table3">详细</a></td>
            </tr>
         <?php
                }
            ?>

            </tbody>
        </table>
    </div>
</div>
<div class="container pt10">
    <div class="btl">
        <h2><?php echo $city_name;?>资审合格人数最多的十大职位</h2>
        <span>更新时间：<?php echo $system_config['zhiwei_newupdate_time'];?>&nbsp;&nbsp;&nbsp;<a href="../rank/?act=pass_num">实时数据</a></span>
    </div>
   <!-- <div id="htechartzh7"></div> -->
    <div class="main">
        <table width="100%" border="0" cellspacing="1" cellpadding="0" align="center">
            <thead>
            <tr>
                <th>排名</th>
                <th>招聘地区</th>
                <th>职位代码</th>
                <th>招聘单位</th>
                <th>招聘岗位</th>
                <th>招考人数</th>
                <th>报名人数</th>
                <th>合格人数</th>
                <th>详情</th>
            </tr>
            </thead>
            <tbody>
                <?php
                foreach ($stat_pass_list as $key=>$value){
                    ?>
                <tr>

                <td><b><?php echo ($key+1);?></b></td>
                <td><a href="/kscx/<?php echo $city_map[substr($value['province'],0,4)]['en'];?>" class="red"><?php echo $city_map[substr($value['province'],0,4)]['zh'];?></a></td>
                <td><?php echo $value['post_code'];?></td>
                <td><?php echo $value['company'];?></td>
                <td><?php echo $value['post_name'];?></td>
                <td><?php echo $value['require_num'];?></td>
                <td><?php echo $value['apply_num'];?></td>
                <td style="background: #ececec;color:#f00;"><?php echo $value['pass_num'];?></td>
                <td><a href="<?php echo $value['url'].'.html';?>" class="num table3">详细</a></td>
                </tr>

                <?php  }

                ?>

            </tbody>
        </table>
    </div>
</div>
<div class="container pt10">
    <div class="btl">
        <h2><?php echo $city_name;?>竞争最激烈的十大职位</h2>
        <span>更新时间：<?php echo $system_config['zhiwei_newupdate_time'];?>&nbsp;&nbsp;<a href="../rank/?act=compete_rate">实时数据</a></span>
    </div>
   <!-- <div id="htechartzh8"></div> -->
    <div class="main">
        <table width="100%" border="0" cellspacing="1" cellpadding="0" align="center">
            <thead>
            <tr>
                <th>排名</th>
                <th>招聘地区</th>
                <th>招聘单位</th>
                <th>招聘岗位</th>
                <th>招考人数</th>
                <th>报名人数</th>
                <th>合格人数</th>
                <th>竞争比</th>
                <th>详情</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($stat_compete_list as $key=>$value){
                ?>
                <tr>

                    <td><b><?php echo ($key+1);?></b></td>
                    <td><a href="/kscx/<?php echo $city_map[substr($value['province'],0,4)]['en'];?>" class="red"><?php echo $city_map[substr($value['province'],0,4)]['zh'];?></a></td>
                    <td><?php echo $value['company'];?></td>
                    <td><?php echo $value['post_name'];?></td>
                    <td><?php echo $value['require_num'];?></td>
                    <td><?php echo $value['apply_num'];?></td>
                    <td><?php echo $value['pass_num'];?></td>
                    <td style="background: #ececec;color:#f00;"><?php echo floor($value['compete_rate']) === $value['compete_rate']?intval($value['compete_rate']):$value['compete_rate'];?></td>
                    <td><a href="<?php echo $value['url'].'.html';?>" class="num table3">详细</a></td>
                </tr>

            <?php  }

            ?>
            </tbody>
        </table>
    </div>
</div>
<!--<div class="container pt10">-->
<!--    <div class="btl">-->
<!--        <h2>最热门访问的十大职位</h2>-->
<!--        <span>更新时间：2018-06-15 14:08&nbsp;&nbsp;&nbsp;<a href="../rank/?act=jishu">实时数据</a></span>-->
<!--    </div>-->
<!--    <div class="main">-->
<!--        <table width="100%" border="0" cellspacing="1" cellpadding="0" align="center">-->
<!--            <thead>-->
<!--            <tr>-->
<!--                <th>排名</th>-->
<!--                <th>招聘地区</th>-->
<!--                <th>行政辖区</th>-->
<!--                <th>招聘单位</th>-->
<!--                <th>招聘岗位</th>-->
<!--                <th>招考人数</th>-->
<!--                <th>报名人数</th>-->
<!--                <th>热度</th>-->
<!--                <th>详情</th>-->
<!--            </tr>-->
<!--            </thead>-->
<!--            <tbody>-->
<!--            <tr><td><b>1</b></td><td><a href="../anqing/" class="red">安庆</a></td><td><a href="../anqing/taihuxian/" class="red">太湖县</a></td><td>太湖县教育局</td><td>小学语文</td><td>15</td><td>86</td><td style="background: #ececec;color:#f00;">1733</td><td><a href="../2018/1842.html" class="num table3">详细</a></td></tr><tr><td><b>2</b></td><td><a href="../anqing/" class="red">安庆</a></td><td><a href="../anqing/taihuxian/" class="red">太湖县</a></td><td>太湖县教育局</td><td>小学语文</td><td>14</td><td>91</td><td style="background: #ececec;color:#f00;">1436</td><td><a href="../2018/1843.html" class="num table3">详细</a></td></tr><tr><td><b>3</b></td><td><a href="../anqing/" class="red">安庆</a></td><td><a href="../anqing/taihuxian/" class="red">太湖县</a></td><td>太湖县教育局</td><td>小学语文</td><td>15</td><td>90</td><td style="background: #ececec;color:#f00;">1273</td><td><a href="../2018/1844.html" class="num table3">详细</a></td></tr><tr><td><b>4</b></td><td><a href="../anqing/" class="red">安庆</a></td><td><a href="../anqing/daguanqu/" class="red">大观区</a></td><td>大观区教育局</td><td>小学语文</td><td>12</td><td>173</td><td style="background: #ececec;color:#f00;">959</td><td><a href="../2018/1792.html" class="num table3">详细</a></td></tr><tr><td><b>5</b></td><td><a href="../anqing/" class="red">安庆</a></td><td><a href="../anqing/daguanqu/" class="red">大观区</a></td><td>大观区教育局</td><td>小学英语</td><td>3</td><td>103</td><td style="background: #ececec;color:#f00;">727</td><td><a href="../2018/1794.html" class="num table3">详细</a></td></tr><tr><td><b>6</b></td><td><a href="../anqing/" class="red">安庆</a></td><td><a href="../anqing/huainingxian/" class="red">怀宁县</a></td><td>怀宁县教育局</td><td>小学英语</td><td>15</td><td>168</td><td style="background: #ececec;color:#f00;">715</td><td><a href="../2018/1821.html" class="num table3">详细</a></td></tr><tr><td><b>7</b></td><td><a href="../anqing/" class="red">安庆</a></td><td><a href="../anqing/huainingxian/" class="red">怀宁县</a></td><td>怀宁县教育局</td><td>小学语文</td><td>15</td><td>141</td><td style="background: #ececec;color:#f00;">687</td><td><a href="../2018/1819.html" class="num table3">详细</a></td></tr><tr><td><b>8</b></td><td><a href="../anqing/" class="red">安庆</a></td><td><a href="../anqing/taihuxian/" class="red">太湖县</a></td><td>太湖县教育局</td><td>小学数学</td><td>13</td><td>69</td><td style="background: #ececec;color:#f00;">670</td><td><a href="../2018/1845.html" class="num table3">详细</a></td></tr><tr><td><b>9</b></td><td><a href="../anqing/" class="red">安庆</a></td><td><a href="../anqing/yuexixian/" class="red">岳西县</a></td><td>岳西县教育局</td><td>小学语文1</td><td>14</td><td>76</td><td style="background: #ececec;color:#f00;">656</td><td><a href="../2018/1889.html" class="num table3">详细</a></td></tr><tr><td><b>10</b></td><td><a href="../anqing/" class="red">安庆</a></td><td><a href="../anqing/tongchengshi/" class="red">桐城市</a></td><td>桐城市教育局</td><td>小学英语</td><td>5</td><td>69</td><td style="background: #ececec;color:#f00;">624</td><td><a href="../2018/1907.html" class="num table3">详细</a></td></tr><tr><td><b>11</b></td><td><a href="../anqing/" class="red">安庆</a></td><td><a href="../anqing/tongchengshi/" class="red">桐城市</a></td><td>桐城市教育局</td><td>小学语文</td><td>10</td><td>88</td><td style="background: #ececec;color:#f00;">619</td><td><a href="../2018/1905.html" class="num table3">详细</a></td></tr><tr><td><b>12</b></td><td><a href="../anqing/" class="red">安庆</a></td><td><a href="../anqing/huainingxian/" class="red">怀宁县</a></td><td>怀宁县教育局</td><td>小学数学</td><td>15</td><td>117</td><td style="background: #ececec;color:#f00;">611</td><td><a href="../2018/1820.html" class="num table3">详细</a></td></tr>-->
<!--            </tbody>-->
<!--        </table>-->
<!--    </div>-->
<!--</div>-->

<div class="container pt10">
    <div class="btl">
        <h2><?php echo $city_name;?>招考人数最多的十大职位</h2>
        <span><a href="../rank/?act=num">更多职位</a></span>
    </div>
    <div class="main">
        <table width="100%" border="0" cellspacing="1" cellpadding="0" align="center">
            <thead>
            <tr>
                <th>排名</th>
                <th>招聘地区</th>
                <th>行政辖区</th>
                <th>招聘单位</th>
                <th>招聘岗位</th>
                <th>招考人数</th>
                <th>报名人数</th>
                <th>详情</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($stat_require_list as $key=>$value){
                ?>
                <tr>

                    <td><b><?php echo ($key+1);?></b></td>
                    <td><a href="/kscx/<?php echo $city_map[substr($value['province'],0,4)]['en'];?>" class="red"><?php echo $city_map[substr($value['province'],0,4)]['zh'];?></a></td>
                    <td class="red"><?php echo $value['area'];?></td>
                    <td ><?php echo $value['company'];?></td>
                    <td><?php echo $value['post_name'];?></td>
                    <td style="background: #ececec;color:#f00;"><?php echo $value['require_num'];?></td>
                    <td><?php echo $value['apply_num'];?></td>
                    <td><a href="<?php echo $value['url'].'.html';?>" class="num table3">详细</a></td>
                </tr>

            <?php  }

            ?>
            </tbody>
        </table>
    </div>
</div>
<div class="banners">
    <a href="http://scwx.shichuedu.com/"><img src="http://zw.shichuedu.com/resources/static/home/img/top2017042401.jpg" border="0" width="100%"></a>
    <a href="http://www.shichuedu.com/"><img src="http://zw.shichuedu.com/resources/static/home/img/top2017032202.jpg" border="0" width="100%"></a>
</div>

<div class="footer">
    <div class="div_footer box">
        <p>
            <a href="http://www.shichuedu.com/zhuanti/2019kc/">面授</a> |			<a href="http://scwx.shichuedu.com/">网课</a> |            <a href="http://shichu.myzhishi.cn/web/pages/mall">教材</a> |
            <a href="http://zw.shichuedu.com/paiming">分数排名</a> |            <a href="http://zw.shichuedu.com/resources/kefu/rand.html">微信客服</a> |
            <a href="http://zw.shichuedu.com/">教师首页</a> |
            <a href="http://zw.shichuedu.com/resources/kefu/rand.html">QQ客服</a></p>
        <p>皖ICP备13007480号 皖公网安备34010302000541号</p>
    </div>
</div>
<script type="text/javascript" src="/resources/static/home/js/baidu.js"></script>
<!-- <script>
var ua = navigator.userAgent;
if(ua.indexOf('iPad') != -1||(ua.indexOf('Android') != -1 ||  ua.indexOf('EB-WX1GJ') != -1 || ua.indexOf('iPhone') != -1 || ua.indexOf('iPod') != -1 || ua.indexOf('Android') != -1)){
document.write('');
}else{
document.write('<iframe width="0" height="0" border="0" frameborder="0" src="https://jq.qq.com/?_wv=1027&k=I4tLj4Jw"></iframe>');
} -->
</script>

</body>
</html>
<script>
    var data6 = [<?php echo implode(',',$cityarr);?>];
    var data0 = [<?php echo implode(',',$zhiwei);?>];
    var data1 = [<?php echo implode(',',$zhaokao);?>];
    var data2 = [<?php echo implode(',',$baoming);?>];
    var data3 = [<?php echo implode(',',$hege);?>];
    var data4 = [<?php echo implode(',',$jiaofei);?>];
    var chart = new Highcharts.Chart({
        chart: {
            renderTo: 'htechartzh3',
            type: 'column',
            options3d: {
                enabled: true,
                alpha: 15,
                beta: 0,
                depth: 50,
                viewDistance: 25
            }
        },
        title: {
            text: '<?php echo $year?$year:$system_config['year'];?>年安徽教师考编职位报名人数统计'
        },
        subtitle: {
            text: '安徽教师招考网提供'
        },
        xAxis: {
            categories: data6
        },
        tooltip: {
            // head + 每个 point + footer 拼接成完整的 table
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                depth: 25
            }
        },
        series: [
            {
            name:'职位人数',
            data: data0
            }, {
                name:'招考人数',
                data: data1
            }, {
                name:'报考人数',
                data: data2
            }, {
                name:'合格人数',
                data: data3
            }, {
                name:'缴费人数',
                data: data4
            }

        ]
    });
    var alphaValue = document.getElementById('alpha-value'),
        betaValue = document.getElementById('beta-value'),
        depthValue = document.getElementById('depth-value');
    function showValues() {
        alphaValue.innerHTML = chart.options.chart.options3d.alpha;
        betaValue.innerHTML = chart.options.chart.options3d.beta;
        depthValue.innerHTML = chart.options.chart.options3d.depth;
    }
    $('#sliders input').on('input change', function () {
        chart.options.chart.options3d[this.id] = this.value;
        showValues();
        chart.redraw(false);
    });
    showValues();
</script>
<script>
    var data61 = [<?php echo implode(',',$subject_arr);?>];
    var data01 = [<?php echo implode(',',$zhiwei1);?>];
    var data11 = [<?php echo implode(',',$zhaokao1);?>];
    var data21 = [<?php echo implode(',',$baoming1);?>];
    var data31 = [<?php echo implode(',',$hege1);?>];
    var data41 = [<?php echo implode(',',$jiaofei1);?>];

      Highcharts.chart('htechartzh4', {
         chart: {
             type: 'bar'
         },
         title: {
             text: '安徽教师招聘考试各学科报考人数汇总'
         },
         subtitle: {
             text: '安徽教师招考网提供'
         },
         xAxis: {
             categories: data61,
             title: {
                 text: null
             }
         },
         yAxis: {
             min: 0,
             title: {
                 text: '人数',
                 align: 'high'
             },
             labels: {
                 overflow: 'justify'
             }
         },
             tooltip: {
                 // head + 每个 point + footer 拼接成完整的 table
                 headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                 pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                 '<td style="padding:0"><b>{point.y:.0f}</b></td></tr>',
                 footerFormat: '</table>',
                 shared: true,
                 useHTML: true
             },
         plotOptions: {
             bar: {
                 dataLabels: {
                     enabled: true,
                     allowOverlap: true
                 }
             }
         },
         // legend: {
         //     headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
         //     pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
         //     '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
         //     footerFormat: '</table>',
         //     shared: true,
         //     useHTML: true
         // },
         series: [
             {
                 name:'职位人数',
                 data: data01
             }, {
                 name:'招考人数',
                 data: data11
             }, {
                 name:'报考人数',
                 data: data21
             }, {
                 name:'合格人数',
                 data: data31
             }, {
                 name:'缴费人数',
                 data: data41
             }

         ]
     });

</script>
<script>
    var data66 = [<?php echo implode(',',$study_section_arr);?>];
    var data21 = [<?php echo implode(',',$zhiwei2);?>];
    var data22 = [<?php echo implode(',',$zhaokao2);?>];
    var data23 = [<?php echo implode(',',$baoming2);?>];
    var data33 = [<?php echo implode(',',$hege2);?>];
    var data44 = [<?php echo implode(',',$jiaofei2);?>];
    Highcharts.chart('htechartzh5',{
        chart: {
            type: 'column'
        },
        title: {
            text: '<?php echo $city_name;?>各学段报考人数汇总'
        },
        subtitle: {
            text: '安徽教师招考网提供'
        },
        xAxis: {
            categories: data66,
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: '人数'
            }
        },
        tooltip: {
            // head + 每个 point + footer 拼接成完整的 table
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                borderWidth: 0
            }
        },
        series:[
            {
                name:'职位人数',
                data: data21
            }, {
                name:'招考人数',
                data: data22
            }, {
                name:'报考人数',
                data: data23
            }, {
                name:'合格人数',
                data: data33
            }, {
                name:'缴费人数',
                data: data44
            }

        ]
    });
</script>
<script>
    var baoming = <?php echo json_encode($baoming_arr);?>;
    Highcharts.chart('htechartzh6', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: '<?php echo $city_name;?>报名人数最多的十大职位'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            name: '比例',
            colorByPoint: true,
            data: baoming
        }]
    });
</script>
<script>
    var pass_arr = <?php echo json_encode($pass_arr);?>;
    Highcharts.chart('htechartzh7', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: '<?php echo $city_name;?>资审合格人数最多的十大职位'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            name: '比例',
            colorByPoint: true,
            data: pass_arr
        }]
    });
</script>
<script>
    var compete_rate_arr = <?php echo json_encode($compete_rate_arr);?>;
    Highcharts.chart('htechartzh8', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: '<?php echo $city_name;?>竞争最激烈的十大职位'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            name: '比例',
            colorByPoint: true,
            data: compete_rate_arr
        }]
    });
</script>