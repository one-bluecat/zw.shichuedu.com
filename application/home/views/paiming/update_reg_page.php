<html>
<head>
    <meta charset="utf-8" />
    <title><?php echo $system_config['year'];?>年安徽省教师招聘考试成绩排名查询_安徽省招聘笔试成绩查询入口-安徽教师招考网</title>
    <meta name="keywords" content="安徽省教师成绩排名查询,安徽省教师成绩查询时间,安徽省教师成绩排名,安徽省教师成绩查询入口" />
    <meta name="description" content="安徽教师招考网同步于最新合肥人事考试网,提供<?php echo $system_config['year'];?>安徽省教师招聘笔试成绩查询入口、成绩排名查询以及面试名单，更多安徽省教师招聘考试成绩相关信息敬请访问安徽安徽教师招考网！" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="applicable-device" content="pc,mobile" />
	<link rel="shortcut icon" href="/resources/images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="/resources/css/css.css"/>
    <link rel="stylesheet" type="text/css" href="/resources/css/sweetalert.css"/>
    <link rel="stylesheet" href="/resources/static/admin/layui/css/layui.css">
    <script type="text/javascript" src="/resources/js/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="/resources/js/sweetalert-dev.js"></script>
    <script type="text/javascript" src="/resources/js/validator.js"></script>
    <script type="text/javascript" src="/resources/js/script.js"></script>
	<script src="http://zw.shichuedu.com/resources/kefu/sjkf.js"></script>
    <script type="text/javascript" src="/resources/static/admin/layui/layui.all.js"></script>
	<script src="http://zw.shichuedu.com/resources/js/baidu.js"></script>
    <script src="https://ssl.captcha.qq.com/TCaptcha.js"></script>
    <script type="text/javascript" >
        function validate(){
            var validator= new Validator('theForm');
            validator.required("shouji","【手机号】不能为空。")
            validator.isMobile("shouji","【手机号】格式或位数不对。",true);
            validator.isNumber("jzfs","【教综成绩】成绩格式不正确。",true);
            validator.isAbove("jzfs","【教综成绩】不正确，请填写您真实的成绩！");
            validator.isNumber("zykfs","【专业课成绩】成绩格式不正确。",true);
            validator.isAbove("zykfs","【专业课成绩】不正确，请填写您真实的成绩！");
            var istrue = validator.passed();
            if(istrue){
                $.ajax({
                    type: "POST",
                    url: "/paiming/reg/update_reg_page",
                    data: $("form").serialize(),
                    dataType: "json",
                    success: function(data) {
                        if(data.status ==1){
                            swal(
                                {
                                    title: "",
                                    text: data.msg,
                                    type: "success",
                                    timer: 3000,
                                    showConfirmButton: false
                                });
                            window.setInterval(dump,3000);
                            function dump() {
                                window.location.href='/paiming/search/order_show/?key='+data.data;
                            }
                        }else if(data.status ==2){
                            swal(
                                {
                                    title: "",
                                    text: data.msg,
                                    type: "error",
                                    timer: 3000,
                                    showConfirmButton: false
                                });
                            window.setInterval(dump2,5000);
                            function dump2() {
                                window.location.href='/paiming/reg/index';
                            }
                        }else {
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

        }


        function exit(){
            alert("晒分已结束");
            return false;
        }
    </script>
</head>
<body>
<div id="head">
    <h1><?php echo $system_config['year'];?>年安徽省教师招聘笔试</h1>
    <p>排名预测查询系统</p>
    <div class="wave-box">
        <div class="marquee-box marquee-up" id="marquee-box">
            <div class="marquee">
                <div class="wave-list-box" id="wave-list-box1">
                    <ul>
                        <li><img height="60" alt="<?php echo $system_config['year'];?>年安徽省教师招聘笔试成绩查询成绩排名" src="/resources/images/wave_02.png"></li>
                    </ul>
                </div>
                <div class="wave-list-box" id="wave-list-box2">
                    <ul>
                        <li><img height="60" alt="<?php echo $system_config['year'];?>年安徽省教师招聘笔试成绩查询成绩排名" src="/resources/images/wave_02.png"></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="marquee-box" id="marquee-box3">
            <div class="marquee">
                <div class="wave-list-box" id="wave-list-box4">
                    <ul>
                        <li><img height="60" alt="<?php echo $system_config['year'];?>年安徽省教师招聘笔试成绩查询成绩排名" src="/resources/images/wave_01.png"></li>
                    </ul>
                </div>
                <div class="wave-list-box" id="wave-list-box5">
                    <ul>
                        <li><img height="60" alt="<?php echo $system_config['year'];?>年安徽省教师招聘笔试成绩查询成绩排名" src="/resources/images/wave_01.png"></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>
<div id="register">
    <div class="container">
        <form name="theForm" method="post" action="#" id="myform" onsubmit='return Validator.Validate(this,2)'>
            <p class="yi"><a href="http://www.shichuedu.com/tongkao/xinxi/rukou/" target="_blank"><?php echo $system_config['year'];?>年安徽教师招聘笔试成绩查询入口</a></p>
            <input type='hidden' class='text' name='appinfoid' id='appinfoid' value='4707'>
            <ul>
                <li class="clearfix">
                    <p>手机号码</p>
                    <input class="inleft" name="shouji" type="text" id="shouji" msg='手机号不正确' placeholder="填写真实手机号（发送排名或查询排名） *"  value="<?php echo $phone;?>">
                    <a href="http://wpa.qq.com/msgrd?v=3&uin=309476048&site=qq&menu=yes" target="_blank"><input class="inright" type="button" value="岗位修改" id="scoresearch"/></a>
                </li>
				 <li class="clearfix">
                    <p>教综成绩</p>
                    <input  class="inleft"  name="jzfs" type="text" id="jzfs" msg='分数在10-120分之间' placeholder="请填写真实教综成绩（否无法查询排名）*" />
                </li>
                <li class="clearfix">
                    <p>专业成绩</p>
                    <input  class="inleft"  name="zykfs" type="text" id="zykfs" msg='分数在10-120分之间' placeholder="请填写真实专业课成绩（否无法查询排名）*" />
                </li>
            </ul>
            <input type="hidden" name="act" value="shaifen" />
            <input type="button"  class="chafen" value="修改分数"  name="button3" onClick="validate();" id="button3"/>
			
        </form>
        <p class="yi">
            <input type="hidden" name="ticket" id="ticket"/>
            <input type="hidden" name="randstr" id="randstr"/>
            <a href="/paiming/search/index" target="_blank">已注册查询入口 >></a>
        </p>
    </div>
</div>
<div class="smewm">
    <p>微信扫码咨询</p>
    <div id="wzoutput" onclick="sjkf()"><img src="/resources/images/wx.gif" width="100%"/>
    </div>
</div>
<script type="text/javascript" src="/resources/js/scgg.js" charset="utf-8"></script>
<div id="footer">
    <p class="htzt">
    <a href="http://www.shichuedu.com/tongkao/xinxi/rukou/" target="_blank">笔试成绩查询</a>|<a href="http://www.shichuedu.com/tongkao/xinxi/fushen/" target="_blank">资格复审</a>|<a href="http://www.shichuedu.com/tongkao/xinxi/mianshi/" target="_blank">面试公告查询</a>|<a href="http://www.shichuedu.com/kk/kb/62129.html" target="_blank">1:1职位保护</a>|<a href="http://www.shichuedu.com/kk/kb/62129.html" target="_blank">面试课程</a>
    </p>
    <p class="copyright">版权所有  <?php echo $system_config['year'];?><a href="http://www.shichuedu.com/" target="_blank"> 师出教育</a>排名预测查询系统</p>
</div>
</body>
</html>