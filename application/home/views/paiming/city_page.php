<!DOCTYPE html>
<html><head>
    <title><?php echo $system_config['year'];?>安徽省教师招聘考试成绩排名及排名查询结果_安徽省教师招聘晒分数查排名_安徽省教师招聘_安徽师出</title>
    <meta name="keywords" content="<?php echo $system_config['year'];?>安徽省教师招聘成绩,安徽省教师招聘成绩排名,合安徽省教师成绩排名,安徽省教师成绩查询入口" />
    <meta name="description" content="师出教育提供<?php echo $system_config['year'];?>安徽省教师招聘考试成绩查询、成绩排名查询，安徽省教师招聘晒分数查排名以及面试名单，更多<?php echo $system_config['year'];?>安徽省教师招聘考试成绩相关信息敬请访问师出教育！" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="applicable-device" content="pc,mobile">
    <link rel="shortcut icon" href="http://www.shichuedu.com/favicon.ico">
    <link rel="stylesheet" type="text/css" href="/resources/css/css.css"/>
    <link rel="stylesheet" type="text/css" href="/resources/css/sweetalert.css"/>
    <script type="text/javascript" src="/resources/js/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="/resources/js/sweetalert-dev.js"></script>
    <script type="text/javascript" src="/resources/js/validator.js"></script>
	<script src="http://zw.shichuedu.com/resources/js/baidu.js"></script>
    <script type="text/javascript" src="/resources/js/script.js"></script>
    <base target="_blank">
</head>
<body>
<header id="header">
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
    <h1><?php echo $system_config['year'];?>安徽省教师招聘成绩排名</h1>
    <p>排名预测查询系统</p>
</div>
<div class="box">

    <!--职位内容结束-->
    <div class="search mt15">
        <ul class="search_tab">
            <li class="cur"><?php echo $system_config['year'];?>安徽省教师招聘考试成绩排名查询</li><a href="/paiming/reg/index"><p>点击提交或更改成绩</p></a>
        </ul>
        <div class="sear_selec">
            <div class="select">
                <form name="loginform" method="post" action="#" onsubmit="return loginvalidate();">
                    <div>
                        <p>
                            <input name="shouji" type="text" size="20"   placeholder="请输入手机号码"/>
                        </p>
                    </div>
                    <div>
                        <input type="submit" class="search_btn" value="查看排名">
                    </div>
                </form>
            </div>
            <div class="tishi">*请输入您的【手机号码】，就可以查询了；若没有请点击此处<a href="/paiming/reg/index" style="color: #f00;"><?php echo $system_config['year'];?>安徽省教师招聘成绩排名系统</a>进行提交预约。</div>
            <div class="select">
                <a href="/paiming/reg/index"> <input class="search_btn" value="点击提交/更改分数"></a>
            </div>
        </div>
    </div>
    <!--搜索结束-->
    <div class="job_table">
        <div class="job_title"><?php echo $system_config['year'];?>安徽教师招聘成绩排名全部地市数据&nbsp;<span>【师出大数据】</span><a href="/paiming/stat/subject">看全学段学科</a></div>

        <div class="job_content zwlisttb">
            <div class="htjg">注：本数据截至<?php echo date('m');?>月<?php echo date('d');?>日<?php echo date('H:i');?>，仅供参考，其中职位数是指参与晒分的职位。 <a href="https://jq.qq.com/?_wv=1027&k=58Xm49i" title="<?php echo $system_config['year'];?>安徽省教师招聘面试指导QQ群"><img src="https://i.loli.net/2018/06/14/5b21c53739793.png" alt="师出面试QQ群" border="0"></a></div>
            <table width="960" border="0" cellspacing="1" cellpadding="0" align="center">
                <thead>
                <tr>
                    <th>地区</th>
                    <th class="">晒分职位数</th>
                    <th>教综平均分</th>
                    <th>学科平均分</th>
                    <th class="">总成绩平均分</th>
                </tr>
                </thead>

                <?php
                if(!$list){
                    ?>
                    <tr>
                        <td colspan="5">暂无数据！</td>
                    </tr>
                <?php  }else{
                    foreach ($list as $k=>$r){
                        ?>
                        <tr>
                            <td class=""><?php echo $cityName[$r['province']];?></td>
                            <td class=""><?php echo $r['num'];?></td>
                            <td class=""><?php echo $r['avg_jz_score'];?></td>
                            <td class=""><?php echo $r['avg_zyk_score'];?></td>
                            <td class=""><?php echo $r['avg_score'];?></td>
                        </tr>
                    <?php   }
                }
                ?>

            </table>

        </div>
    </div>
    <div class="job_table"  style="text-align:center">
        
    </div>
    <div class="mzsm"><strong>免责声明：</strong>提供此信息之目的在于为考生提供信息作为参考，请以官方正式公布数据为准，谢谢！ </div>
    <!--分享 -->
    <div class="tishi">
        <div class="bshare-custom"><a title="分享到" href="http://zw.shichuedu.com/paiming/" id="bshare-shareto" class="bshare-more">分享到</a><a title="分享到QQ空间" class="bshare-qzone">QQ空间</a><a title="分享到新浪微博" class="bshare-sinaminiblog">新浪微博</a><a title="分享到人人网" class="bshare-renren">人人网</a><a title="分享到腾讯微博" class="bshare-qqmb">腾讯微博</a><a title="分享到网易微博" class="bshare-neteasemb">网易微博</a><a title="更多平台" class="bshare-more bshare-more-icon more-style-addthis"></a><span class="BSHARE_COUNT bshare-share-count">0</span></div><script type="text/javascript" charset="utf-8" src="/resources/js/buttonLite.js#style=-1&amp;uuid=&amp;pophcol=3&amp;lang=zh"></script><script type="text/javascript" charset="utf-8" src="/resources/js/bshareC0.js"></script>
    </div>
    <!--分享 -->
</div>
<script type="text/javascript" src="/resources/js/scgg.js" charset="utf-8"></script>
<div id="footer">

    <p class="htzt">
        <a href="http://www.shichuedu.com/tongkao/xinxi/rukou/" target="_blank">笔试成绩查询</a>|<a href="http://www.shichuedu.com/tongkao/xinxi/fushen/" target="_blank">资格复审</a>|<a href="http://www.shichuedu.com/tongkao/xinxi/mianshi/" target="_blank">面试公告查询</a>|<a href="http://www.shichuedu.com/zhuanti/2020ms/" target="_blank">1:1职位保护</a>|<a href="http://www.shichuedu.com/zhuanti/2020ms/" target="_blank">面试课程</a>

    </p>

    <p class="copyright">
        版权所有  <?php echo $system_config['year'];?><a href="http://www.shichuedu.com/" target="_blank">师出教育</a>排名预测查询系统
    </p>
</div>
</div>
<div style="display:none">
    <!--<iframe width="0" height="0" border="0" frameborder="0" src="https://jq.qq.com/?_wv=1027&k=58Xm49i"></iframe>-->
</div>
</body>
</html>
<script>
    function loginvalidate(){
        var validator= new Validator('loginform');
        validator.required("shouji","【手机号】不能为空。");
        validator.isMobile("shouji","【手机号】格式或位数不对。",true);
        var istrue = validator.passed();
        if(istrue){
            $.ajax({
                type: "POST",
                url: "/paiming/search/order_submit",
                data: $("form").serialize(),
                dataType: "json",
                success: function(data) {
                    if(data.status){
                        window.location.href='/paiming/search/order_show?key='+data.data;
                    }else{
                        swal(
                            {
                                title: "",
                                text: data.msg,
                                type: "error",
                                allowOutsideClick:true,
                            }
                        );
                    }
                }
            });
        }else{
            return istrue;
        }
        return false;

    }
</script>