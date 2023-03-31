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
    <script src="https://ssl.captcha.qq.com/TCaptcha.js"></script>
	<script src="http://zw.shichuedu.com/resources/js/baidu.js"></script>
	<style>
	    
	  select{
float: left;
margin: 0 21px;
height: 48px;
line-height: 36px;
display: block;
color: #807a62;
font-style: normal;
padding-left: 10px;
border: 1px solid #ccc;
background: #fff;
width: 334px;
}

@media screen and (max-width: 1000px){
select{
float: none;
width: 94%;
padding: 0;
margin: 0 auto 5px;
background: #fff;
text-align: center;
border-radius: 50px;
border: 1px solid #E4E4E4;
display: block;
font-size: 15px;
}
}
	</style>
    <script type="text/javascript" >
        function validate(){
            var validator= new Validator('theForm');
            validator.required("xingming","【用户姓名】不能为空。");
            validator.required("bkdq","请选择【报考地区】。");
            validator.required("zpdw","请选择【招聘单位】。");
            validator.required("gwxx","请选择【岗位信息】。");
//            validator.required("zwdm","【岗位代码】不能为空。");
//            validator.isZwma("zwdm","【岗位代码】不正确，填写您的正确岗位代码，否则无法查询您的职位排名！");
            validator.isNumber("zykfs","【专业课成绩】成绩格式不正确。",true);
            validator.isAbove("zykfs","【专业课成绩】不正确，请填写您真实的成绩！");
            validator.isNumber("jzfs","【教综成绩】成绩格式不正确。",true);
            validator.isAbove("jzfs","【教综成绩】不正确，请填写您真实的成绩！");
            validator.required("shouji","【手机号】不能为空。")
            validator.isMobile("shouji","【手机号】格式或位数不对。",true);
            validator.isNumber("PhoneCode","【短信验证码】不正确。",true);
            var $cr = $("#check_pass");
            if(!$cr.attr('checked') ){
                swal(
                    {
                        title: "",
                        text: "请先勾选协议！",
                        type: "error",
                        allowOutsideClick:true,
                    }
                );
                return false;
            }
            var istrue = validator.passed();
            if(istrue){
                $.ajax({
                    type: "POST",
                    url: "/paiming/reg/score",
                    data: $("form").serialize(),
                    dataType: "json",
                    success: function(data) {
                        if(data.status){
                            swal(
                                {
                                    title: "",
                                    text: data.msg,
                                    type: "success",
                                    timer: 3000,
                                    showConfirmButton: false
                                });
                            if(data.status == 1){
                                window.setInterval(first_dump,3000);
                            }else {
                                window.setInterval(dump,3000);
                            }
                            function first_dump() {
                                window.location.href='/paiming/search/order_show/?key='+data.data;
                            }
                            function dump() {
                                window.location.href='/paiming/reg/update_reg_page?key='+data.data;
                            }
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

        }
        function funzwdm(){
            var zwdmv=$("#zwdm").val();
            if (zwdmv==""){
                alert("岗位代码不能为空");
                return false;
            }
            var sjs=Math.random();
            $.ajax({
                type: "POST",
                url: "/paiming/reg/checkPostCode",
                data: "sjs="+sjs+"&code="+zwdmv,
                dataType: "json",
                success: function(data) {
                    if(data.status){
                        swal(
                            {
                                title: "",
                                text: data.msg,
                                type: "success",
                                allowOutsideClick:true,
                            }
                        );
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
                    <p>用户姓名</p>
                    <input class="inleft"  name="xingming" type="text" id="xingming" msg='填写姓名只允许中文' placeholder="姓名必须是汉字（已加密） *"  onchange="value=value.replace(/[^\u4E00-\u9FA5]/g,'')" onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\u4E00-\u9FA5]/g,''))"/>
                    <a href="http://zw.shichuedu.com" target="_blank"><input class="inright" type="button" value="查询岗位" /></a>
                    <!-- <a href="/paiming/reg/view_post" target="_blank"><input type="button" value="岗位代码查询" class="inright" id="zwnumsearch"/></a> -->
                </li>
                <li class="clearfix">
                    <p>报考地区</p>
                    <!--改联动选择-->
                   <!--<input class="inleft" id="zwdm" name="zwdm" type="text" msg='选择您报考的城市' placeholder="选择报考地区*"/>
                    <input value="验证岗位代码" class="inright" name="button1" type="button" onClick="funzwdm()"/> -->
                    <select name="bkdq" id="bkdq" onchange="get_company_list(this)">
                        <option>请选择【报考地区】</option>
                        <?php
                            foreach ($area_list as $value){
                                ?>
                                <option value="<?php echo $value['area'];?>"><?php echo $value['area'];?></option>
                            <?php }
                        ?>
                    </select>
                </li>
                <li class="clearfix">
                    <p>招聘单位</p>
                    <!--改联动选择-->
                    <select name="zpdw" id="zpdw" onchange="get_postName_list(this)">
                        <option>请选择【招聘单位】</option>
                    </select>
                </li>
                <li class="clearfix">
                    <p>岗位信息</p>
                    <!--改联动选择-->
                    <select name="gwxx" id="gwxx" >
                        <option>请选择【岗位信息】</option>
                    </select>
                </li>
                
				 <li class="clearfix">
                    <p>教综成绩</p>
                    <input  class="inleft"  name="jzfs" type="text" id="jzfs" msg='分数在10-120分之间' placeholder="请填写真实教综成绩（否无法查询排名）*" />
                  <!--  <a href="http://www.shichuedu.com/tongkao/xinxi/rukou/" target="_blank"><input class="inright" type="button" value="成绩查询入口" id="scoresearch"/></a> -->

                </li>
                <li class="clearfix">
                    <p>专业成绩</p>
                    <input  class="inleft"  name="zykfs" type="text" id="zykfs" msg='分数在10-120分之间' placeholder="请填写真实专业课成绩（否无法查询排名）*" />
                    <a href="http://www.shichuedu.com/tongkao/xinxi/rukou/" target="_blank"><input class="inright" type="button" value="成绩查询入口" id="scoresearch"/></a> 

                </li>
                <li class="clearfix">
                    <p>手机号码</p>
                    <input class="inleft" name="shouji" type="text" id="shouji" msg='手机号不正确' placeholder="填写真实手机号（发送排名或查询排名） *" >
                    <div id="TencentCaptcha" data-appid="2083709460" data-cbfn="sendnum"><input class="inright" type="button" value="发送验证码"  id="fs"/></div>
                </li>
                <li class="clearfix">
                    <p>短信验证码</p>
                    <input class="inleft"  type="text" dataType="Require" name="PhoneCode"  size="8" placeholder="短信验证码 *" />
                </li>
                <li class="yinsi last"><input type="checkbox" name="check_pass" id="check_pass" style="width: 25px; ;height: 25px;vertical-align: middle; margin-bottom:1px;"><span style="vertical-align: middle;">我同意 “<a href="/paiming/reg/disclaimer" target="_blank" class="htred">隐私条款</a>”</span><div></div></li>
            </ul>
            <input type="hidden" name="act" value="shaifen" />
            <input type="button"  class="chafen" value="提交分数"  name="button3" onClick="validate();" id="button3"/>
			<input type="button"  class="chafen" value="填写错误？更改分数"  name="button3" onClick="window.location.href='/paiming/reg/update_reg_page'" id="button3"/>
        </form>
        <p class="yi">
            <input type="hidden" name="ticket" id="ticket"/>
            <input type="hidden" name="randstr" id="randstr"/>
            <a href="/paiming/search/index" target="_blank">已注册查询入口 >></a>
        </p>
    </div>
</div>
<SCRIPT language="javascript" type="text/javascript">
    function get_company_list(obj) {
        var area = $(obj).val();
        console.log(area);
        $.ajax({
            type: "POST",
            url: "/paiming/reg/getCompanyList",
            data: {'area':area},
            dataType: "json",
            success: function(data) {
                console.log(data);
                var data_obj = data.data;
                var _company_html='<option value="">请选择【招聘单位】</option>';
                for (var i=0;i<data_obj.length;i++)
                {
                    _company_html+='<option value="'+data_obj[i]['company']+'">'+data_obj[i]['company']+'</option>';
                    $('#zpdw').html(_company_html);
                }
            }
        });
    }

    function get_postName_list(obj) {
        var area = $('#bkdq').val();
        var company = $(obj).val();
        console.log(area);
        console.log(company);
        $.ajax({
            type: "POST",
            url: "/paiming/reg/getPostNameList",
            data: {'area': area, 'company': company},
            dataType: "json",
            success: function (data) {
                console.log(data);
                var data_obj = data.data;
                var _postName_html = '<option value="">请选择【岗位信息】</option>';
                for (var i = 0; i < data_obj.length; i++) {
                    _postName_html += '<option value="' + data_obj[i]['post_name'] + '">' + data_obj[i]['post_name'] + '</option>';
                    $('#gwxx').html(_postName_html);
                }
            }
        });
    }
        window.sendnum = function(res) {
        console.log(res);
        // res（未通过验证）= {ret: 1, ticket: null}
        // res（验证成功） = {ret: 0, ticket: "String", randstr: "String"}
        if (res.ret == 0) {
                $.ajax({
                    type: "POST",
                    url: "/paiming/reg/sendSms",
                    data: {'tel':$('#shouji').val(),'ticket':res.ticket,'randstr':res.randstr},
                    dataType: "json",
                    success: function(data) {
                        if (data.status) {
                            swal(
                                {
                                    title: "",
                                    text: data.msg,
                                    type: "success",
                                    timer: 3000,
                                    showConfirmButton: false
                                });
                                $('#fs').attr('disabled',true);
                                var SysSecond;
                                var InterValObj;
                                SysSecond=60;
                                InterValObj=window.setInterval(SetRemainTime,1000);

                                function SetRemainTime() {
                                    if (SysSecond > 0) {
                                        SysSecond = SysSecond - 1;
                                        var second = Math.floor(SysSecond % 60);
                                        $('#fs').val(second + '秒');
                                    } else {
                                        window.clearInterval(InterValObj);
                                        $('#fs').val('发送短信');
                                        $('#fs').attr('disabled', false);
                                    }
                                }
                        } else {
                            swal(
                                {
                                    title: "",
                                    text: data.msg,
                                    type: "error",
                                    allowOutsideClick: true,
                                }
                            );
                        }
                    }
                });
        }else{
            swal(
                {
                    title: "",
                    text: '验证码校验失败!',
                    type: "error",
                    allowOutsideClick: true,
                }
            );
        }
    }
</SCRIPT>
<!-- <div class="smewm">
    <p>微信扫码咨询</p>
    <div id="wzoutput" onclick="sjkf()"><img src="/resources/images/wx.gif" width="100%"/>
    </div>
</div> -->
<script type="text/javascript" src="/resources/js/scgg.js" charset="utf-8"></script>
<div id="footer">
    <p class="htzt">
    <a href="http://www.shichuedu.com/tongkao/xinxi/rukou/" target="_blank">笔试成绩查询</a>|<a href="http://www.shichuedu.com/tongkao/xinxi/fushen/" target="_blank">资格复审</a>|<a href="http://www.shichuedu.com/tongkao/xinxi/mianshi/" target="_blank">面试公告查询</a>|<a href="http://www.shichuedu.com/kk/kb/62129.html" target="_blank">1:1职位保护</a>|<a href="http://www.shichuedu.com/kk/kb/62129.html" target="_blank">面试课程</a>
    </p>
    <p class="copyright">版权所有  <?php echo $system_config['year'];?><a href="http://www.shichuedu.com/" target="_blank"> 师出教育</a>排名预测查询系统</p>
</div>
</body>
</html>