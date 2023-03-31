<!DOCTYPE html>
<html><head>
    <title><?php echo $system_config['year']; ?>安徽省教师招聘考试成绩排名及排名查询结果_安徽省教师招聘晒分数查排名_安徽省教师招聘_安徽师出</title>
    <meta name="keywords" content="<?php echo $system_config['year']; ?>安徽省教师招聘成绩,安徽省教师招聘成绩排名,合安徽省教师成绩排名,安徽省教师成绩查询入口" />
    <meta name="description" content="师出教育提供<?php echo $system_config['year']; ?>安徽省教师招聘考试成绩查询、成绩排名查询，安徽省教师招聘晒分数查排名以及面试名单，更多<?php echo $system_config['year']; ?>安徽省教师招聘考试成绩相关信息敬请访问师出教育！" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="applicable-device" content="pc,mobile">
    <link rel="shortcut icon" href="http://www.shichuedu.com/favicon.ico">
    <link rel="stylesheet" type="text/css" href="/resources/css/css.css"/>
    <link rel="stylesheet" type="text/css" href="/resources/css/sweetalert.css"/>
    <script type="text/javascript" src="/resources/js/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="/resources/js/sweetalert-dev.js"></script>
    <script type="text/javascript" src="/resources/js/validator.js"></script>
    <script type="text/javascript" src="/resources/js/script.js"></script>
    <base target="_blank">
</head>
<body>
<header>
    <h1 id="hd_logo"><a href="http://www.shichuedu.com/" class="ico" target="_blank"></a></h1>
    <nav id="hd_nav">
        <ul>
            <li class="home"><a href="http://www.shichuedu.com/">师出教育</a></li>
            <li class="bbs"><a href="http://scwx.shichuedu.com/" target="_blank">师出网校</a></li>
            <li class="dimecode"><a href="http://wpa.qq.com/msgrd?v=3&uin=309476048&site=qq&menu=yes" data-role="dime" data-click="dime" target="_blank"><span class="ico"></span>微信咨询<img data-click="dime" src="/resources/images/wx.gif" class="dime" alt=""></a></li>
        </ul>
    </nav>
</header>
<div id="head">
    <h1><?php echo $system_config['year']; ?>安徽省教师招聘成绩排名</h1>
    <p>成绩排名查询系统</p>
</div>
<div id="register">
    <div class="container">
        <form name="theForm" method="get" action="/lscx/search<?php echo $system_config['year']; ?>/" id="myform">
            <h2><a href="http://scwx.shichuedu.com/" target="_blank" style="color:#e64f5c;"><?php echo $system_config['year']; ?>安徽教师成绩排名|资格复审【最新汇总】</a></h2>
            <ul>
                <li class="clearfix">
                    <p>职位代码</p>
                    <input class="inleft" id="zwid" name="zwid" type="text" msg="填写您的正确职位代码（12位数字）否则不能查询" placeholder="填写正确职位代码（12位数字）*">
                    <a href="/kscx/search/" target="_blank"><input type="button" value="职位代码查询" class="inright" id="zwnumsearch"></a>

                </li>
            </ul>
            <input type="submit" class="chafen" value="查询排名" name="" id="button3">
        </form>
        <div class="i_jobcz">
            <h2>按地区-快速查找<?php echo $system_config['year']; ?>成绩排名</h2>
            <ul>
                <?php
                    foreach ($city as $item){
                        ?>
                        <li><a target="_blank" href="/lscx/<?php echo $item['en'];?>/"><?php echo $item['zh'];?></a></li>
                    <?php }
                ?>
            </ul>
        </div>
    </div>
</div>
<div id="footer">
    <p class="htzt">
        <a href="http://www.ahteacher.com/xinxi/gongli/116616.html" target="_blank">笔试成绩查询</a>|<a href="http://www.ahteacher.com/xinxi/gongli/116944.html" target="_blank">资格复审</a>|<a href="http://www.ahteacher.com/xinxi/gongli/116945.html" target="_blank">面试名单查询</a>|<a href="http://www.shichuedu.com/zhuanti/2018ms/" target="_blank">1:1职位保护</a>|<a href="http://www.shichuedu.com/zhuanti/2018ms/" target="_blank">面试课程</a>
    </p>
    <p class="copyright">
        版权所有  <?php echo $system_config['year']; ?><a href="http://www.shichuedu.com/" target="_blank">师出教育</a>成绩排名查询系统
    </p>
</div>
</div>
</body>
</html>
