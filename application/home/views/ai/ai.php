<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title><?php echo $year ? $year : $system_config['year']; ?>安徽中小学教师招聘考试_师出教育智能AI查询_师出教师招聘职位推荐</title>
    <meta name='keywords' content='安徽中小学教师岗位表,<?php echo $system_config['year']; ?>安徽中小学教师招聘考试,<?php echo $system_config['year']; ?>安徽中小学教师招聘职位表' />
    <meta name='description' content='安徽师出旗下<?php echo $system_config['year']; ?>安徽中小学教师招聘考试<?php echo $system_config['year']; ?>安徽省中小学教师考试职位表查询,安徽中小学教师岗位表,安徽中小学教师招聘职位表,招聘条件及安徽中小学教师考试分数线查询。' />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta name="applicable-device" content="pc,mobile" />
    <link rel="shortcut icon" href="/resources/images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="/resources/static/home/css/2zwb.css" />
    <link rel="stylesheet" type="text/css" href="/resources/css/sweetalert.css" />
    <link rel="stylesheet" href="/resources/static/home/layer/theme/default/layer.css?v=3.1.1">
    <script type="text/javascript" src="/resources/static/home/js/jquery.js"></script>
    <script type="text/javascript" src="/resources/js/sweetalert-dev.js"></script>
    <script type="text/javascript" src="/resources/js/validator.js"></script>
    <script type="text/javascript" src="/resources/js/script.js"></script>
    <script type="text/javascript" src="/resources/static/home/layer/layer.js"></script>
    <script src="http://zw.shichuedu.com/resources/js/baidu.js"></script>
    <script src="https://ssl.captcha.qq.com/TCaptcha.js"></script>
    <style>
        /* ------------------- */
        ::-moz-placeholder {
            color: #9fa3a7;
        }

        ::-webkit-input-placeholder {
            color: #9fa3a7;
        }

        :-ms-input-placeholder {
            color: #9fa3a7;
        }

        .pc-kk-form {
            padding: 15px 20px;
        }

        .pc-kk-form-list {
            background: #fff;
            border: 1px solid #e5e5e5;
            border-radius: 5px;
            height: 44px;
            line-height: 44px;
            margin-bottom: 10px;
        }

        .pc-kk-form-list input,
        select {
            width: 100%;
            border: none;
            background: none;
            color: #333;
            font-size: 14px;
            height: 36px;
            padding: 4px 10px;
        }

        .pc-kk-form-list textarea {
            background: none;
            border: none;
            height: 60px;
            padding: 10px;
            resize: none;
            width: 94%;
            line-height: 22px;
            color: #9fa3a7;
            font-size: 14px;
        }

        .nice-select {
            position: relative;
            background: #fff url(http://zw.shichuedu.com/resources/static/home/img/a2.jpg) no-repeat right center;
            background-size: 18px;
            width: 47%;
            float: left;
            border: 1px solid #e5e5e5;
            border-radius: 5px;
            height: 44px;
            line-height: 44px;
        }

        .nice-select ul {
            width: 100%;
            display: none;
            position: absolute;
            left: -1px;
            top: 44px;
            overflow: hidden;
            background-color: #fff;
            max-height: 150px;
            overflow-y: auto;
            border: 1px solid #b9bcbf;
            z-index: 9999;
            border-radius: 5px;
        }

        .nice-select ul li {
            padding-left: 10px;
        }

        .nice-select ul li:hover {
            background: #f8f4f4;
        }

        .pc-kk-form-list-clear {
            background: none;
            border: none;
        }

        .pc-kk-form-btn button {
            background: #0d082f;
            color: #fff;
            border: none;
            width: 100%;
            height: 50px;
            line-height: 50px;
            font-size: 16px;
            border-radius: 50px;
        }

        .phoneTk {
            width: 335px;
            height: 100px;
            border: solid 1px #ddd;
            left: 50%;
            top: 50%;
            margin: -119px 0 0 -178px;
            position: fixed;
            background: #fff;
            padding: 40px 0 0 1px;
            z-index: 1000;
        }

        .phoneTk a {
            top: 8px;
            right: 20px;
            position: absolute;
        }

        .phoneTk div {
            clear: both;
            margin-left: 20px;
            margin-bottom: 15px;
            overflow: hidden;
        }

        .phoneTk label {
            font-size: 14px;
            line-height: 30px;
            float: left;
            width: 58px;
            text-align: right;
        }

        .phoneTk div input[type="text"] {
            width: 188px;
            height: 28px;
            border: solid 1px #ddd;
            float: left;
            padding-left: 10px;
            font-size: 14px;
            margin-left: 14px;
        }

        .phoneTk div img {
            float: left;
            margin: 2px 0 0 15px;
        }

        .phoneTk div input[type="button"] {
            width: 110px;
            height: 34px;
            border: none;
            float: left;
            background: #e53538;
            color: #fff;
            font-size: 14px;
            margin: 0 0 0 82px;
        }

        .phoneTk div input[type="button"]:hover {
            background: #fff;
            color: #e53538;
            border: solid 1px #e53538;
        }

        .phoneTk div select {
            width: 200px;
            height: 30px;
            border: solid 1px #ddd;
            margin-left: 15px;
            float: left;
        }

        .phoneTk .divselect {
            width: 200px;
            margin-right: 0;
            float: left;
        }

        .phoneTk .divselect cite {
            width: 183px;
            padding-left: 15px;
            background: url(http://zw.shichuedu.com/resources/static/home/img/select01.jpg) no-repeat right center;
        }

        .phoneTk .divselect ul {
            width: 198px;
        }

        #coverDiv {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #000;
            opacity: .7;
            filter: alpha(opacity=70);
            z-index: 999;
            display: none;
        }
        .pc-kk-form-btn-start{
            width:48%;
        }
        .pc-kk-form-btn-sumbit{
            width: 48%;
    float: right;
    position: relative;
    top: -60px;
        }
    </style>
    <script type="text/javascript" src="/resources/static/home/js/jquery-1.7.1.min.js"></script>
    <base target="_blank" />
</head>
<div class="ht_top">
    <div class="zt_top"><a href="http://www.shichuedu.com/">
            <div class="logo"></div>
        </a>
        <div class="topnav"><a href="http://www.shichuedu.com/">师出教育</a> <a href="http://scwx.shichuedu.com/">网校</a> <a href="http://www.ahteacher.com/">安徽教师招考网</a></div>
    </div>
</div>
<div class="ht_banner">
    <div class="Width"><img src="/resources/static/home/img/aiban.jpg" alt="<?php echo $system_config['year']; ?>安徽中小学教师岗位推荐" border="0" /></div>
</div>
<div class="ht_nav">
    <div class="nav">
        <ul>
            <li><a class="cur" href="/">首页</a></li>
            <li><a href="http://www.shichuedu.com/tongkao/xinxi/gonggao/">招聘公告</a></li>
            <li><a href="http://www.shichuedu.com/tongkao/xinxi/dagang/">考试大纲</a></li>
            <li><a href="http://zw.shichuedu.com/zwhz">历年职位</a></li>
            <li><a href="http://zw.shichuedu.com/kscx/bmtj/" style="color:#FFF500;">报名人数</a></li>
            <li><a href="http://zw.shichuedu.com/lscx/index/">分数线</a></li>
            <li><a href="http://zw.shichuedu.com/ai" style="color:#FFF500;">智能选岗</a></li>
            <li><a href="http://www.shichuedu.com/kk/kb/56494.html">面授课程</a></li>
            <li><a href="http://scwx.shichuedu.com/">网校课程</a></li>
            <li><a href="http://zw.shichuedu.com/msjc">面试形式</a></li>
            <li><a href="http://zw.shichuedu.com/resources/kefu/rand.html">优惠报班</a></li>
        </ul>
    </div>
</div>
<script type="text/javascript" src="/resources/static/home/js/script.js"></script>
<div class="box">
    <div class="pc-kk-form" style="margin-top: 20px;
    background: #fff;
    display: block;
    /* width: 300px; */
    padding:20px;
    border-radius: 2px 2px 2px 2px;
    -webkit-box-shadow: 0 10px 6px -6px #777;
    -moz-box-shadow: 0 10px 6px -6px #777;
    box-shadow: 0 10px 6px -6px #777;
">
        <!--	<form action="">-->
        <div class="pc-kk-form-list">
            <input type="text" placeholder="姓名" id="xingming">
        </div>
        <div class="pc-kk-form-list pc-kk-form-list-clear">
            <div class="nice-select" name="nice-select" style="width:100%">
                <input type="text" placeholder="考区" name="kqid" id="kqid">
                <ul>
                    <?php foreach ($area_list as $key => $r) : ?>
                        <li data-value="<?php echo $key; ?>" style="color: #9fa3a7" only="true"><?php echo $city_map[$key]['zh']; ?></li>
                        <?php foreach ($r as $re) : ?>
                            <li data-value="<?php echo $re['province']; ?>" onclick="load_study_section(this)">&nbsp;&nbsp;<?php echo $re['area']; ?></li>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <div class="pc-kk-form-list pc-kk-form-list-clear">
            <div class="nice-select" name="nice-select">
                <input type="text" placeholder="学段" name="study_section" id="xueduan">
                <ul id="study_section">
                    <!--					<li data-value="普通高中" onclick="load_subject('普通高中');">普通高中</li>-->
                    <!--					<li data-value="初级中学" onclick="load_subject('初级中学');">初级中学</li>-->
                    <!--                    <li data-value="小学"    onclick="load_subject('小学');">小学</li>-->
                </ul>
            </div>
            <div class="nice-select" name="nice-select" style="float:right">
                <input type="text" placeholder="学科" name="subject" id="xueke">
                <ul>
                    <!--                    <li  data-value="地理">地理</li>-->
                    <!--                    <li  data-value="英语">英语</li>-->
                    <!--                    <li  data-value="语文">语文</li>-->
                    <!--                    <li  data-value="政治">政治</li>-->
                    <!--                    <li  data-value="数学">数学</li>-->
                    <!--                    <li  data-value="物理">物理</li>-->
                    <!--                    <li  data-value="化学">化学</li>-->
                    <!--                    <li  data-value="生物">生物</li>-->
                    <!--                    <li  data-value="历史">历史</li>-->
                    <!--                    <li  data-value="音乐">音乐</li>-->
                    <!--                    <li  data-value="通用技术">通用技术</li>-->
                    <!--                    <li  data-value="心理健康教育">心理健康教育</li>-->
                    <!--                    <li  data-value="体育">体育</li>-->
                    <!--                    <li  data-value="信息技术">信息技术</li>-->
                    <!--                    <li  data-value="美术">美术</li>-->
                    <!--                    <li  data-value="特殊教育">特殊教育</li>-->
                    <!--                    <li  data-value="科学">科学</li>-->
                    <!--                    <li  data-value="品德与生活、品德与社会">品德与生活、品德与社会</li>-->
                    <!--                    <li  data-value="综合实践活动">综合实践活动</li>-->
                </ul>
            </div>
        </div>
        <div class="pc-kk-form-list">
            <input type="text" placeholder="教综模考成绩" name="jzfs" id="jzfs">
        </div>
        <div class="pc-kk-form-list">
            <input type="text" placeholder="专业模考成绩" name="zykfs" id="zykfs">
        </div>
        <div class="pc-kk-form-list">
            <input type="text" placeholder="手机号码" id="tel">
        </div>
        <div class="pc-kk-form-btn" style="margin-bottom: 10px">
            <div id="TencentCaptcha" data-appid="2083709460" data-cbfn="sendnum"><button id="fs">发送短信</button></div>
        </div>
        <div class="pc-kk-form-list">
            <input type="text" placeholder="短信验证码" id="PhoneCode" name="PhoneCode">
        </div>
        <div class="pc-kk-form-btn pc-kk-form-btn-start">
            <button onclick="submit_form();">开始进行智能选岗</button>
        </div>
        <div class="pc-kk-form-btn pc-kk-form-btn-sumbit">
            <button onclick="view_result();" style="margin-top: 10px">【已提交再次查看】</button>
        </div>
        <!--	</form>-->
    </div>
    <div class="mzsm" style="font-size:14px; margin-top:30px;">
        <div><strong>使用帮助：</strong>根据填写信息，AI系统筛选该学科学段和此地区竞争情况，历年岗位信息，招考分数，推荐合适复习课程，一键帮助您选择合适岗位！</div>
    </div>
    <!-- 遮罩层 
    <div id="coverDiv" style="height: 2200px;"></div>
    <!-- 弹框 -->
    <div class="phoneTk hide" id="sms" style="border-radius: 10px; width: 350px;">
        <a onclick="$('.phoneTk,#coverDiv').hide();return false;" href="javascript:;"><img src="http://zw.shichuedu.com/resources/static/home/img/dalet.jpg" width="15" height="15"></a>
        <div><label>手机号：</label><input placeholder="请输入手机号" type="text" id="phone" name="phone" /></div>
        <div><input type="button" value="提交查看" onclick="f_submit()" style=" margin-left: 100px; " /></div>
    </div>
    <div class="share"><span>分享到</span>
        <div class="bdsharebuttonbox"><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a><a href="#" class="bds_tieba" data-cmd="tieba" title="分享到百度贴吧"></a><a class="bds_count" data-cmd="count"></a></div>
    </div>
    <!--职位内容结束-->
</div>
<!-- 弹框 -->
<script>
    $('[name="nice-select"]').click(function(e) {
        $('[name="nice-select"]').find('ul').hide();
        $(this).find('ul').show();
        e.stopPropagation();
    });
    $('[name="nice-select"] li').hover(function(e) {
        $(this).toggleClass('on');
        e.stopPropagation();
    });
    $('[name="nice-select"] li').click(function(e) {
        if (!$(this).attr('only')) {
            var val = $(this).text();
            $(this).parents('[name="nice-select"]').find('input').val(val);
            $('[name="nice-select"] ul').hide();
            e.stopPropagation();
        }
    });

    function view_result() {
        $('#coverDiv,.phoneTk').show();
    }

    function f_submit() {
        var index = layer.load(0, {
            shade: false
        }); //0代表加载的风格，支持0-2
        var phone = $('#phone').val();
        if (!phone) {
            layer.close(index);
            swal({
                title: "",
                text: '请填写手机号码！',
                type: "error",
                timer: 3000,
                showConfirmButton: false
            });
        }
        $('.phoneTk,#coverDiv').hide();
        $.ajax({
            type: "POST",
            url: "/ai/check/",
            dataType: "json",
            data: "phone=" + phone,
            success: function(data) {
                layer.close(index);
                if (data.status == 1) {
                    window.location.href = '/ai/ai_result?randstr=' + data.data;
                } else {
                    swal({
                        title: "",
                        text: '没有找到历史查看记录！',
                        type: "error",
                        timer: 3000,
                        showConfirmButton: false
                    });
                }
            }
        });
    }

    function load_study_section(obj) {
        var kqid = $(obj).text();
        $.ajax({
            type: "POST",
            url: "/ai/get_study_section",
            dataType: "json",
            data: "kqid=" + kqid,
            success: function(data) {
                if (data.status == 1) {
                    study_section_info = data.data;
                    study_section_html = '';
                    for (index in study_section_info) {
                        study_section_html += '<li data-value="' + study_section_info[index]['study_section'] + '" onclick="load_subject(this)">' + study_section_info[index]['study_section'] + '</li>';
                        // console.log(study_section_html[index]);
                        // console.log(index);
                    }
                    $("#study_section").html(study_section_html);
                    $('[name="nice-select"]').click(function(e) {
                        $('[name="nice-select"]').find('ul').hide();
                        $(this).find('ul').show();
                        // console.log($(this).find('ul').html());
                        e.stopPropagation();
                    });
                    $('[name="nice-select"] li').hover(function(e) {
                        $(this).toggleClass('on');
                        e.stopPropagation();
                    });
                    $('[name="nice-select"] li').click(function(e) {
                        if (!$(this).attr('only')) {
                            var val = $(this).text();
                            $(this).parents('[name="nice-select"]').find('input').val(val);
                            $('[name="nice-select"] ul').hide();
                            e.stopPropagation();
                        }
                    });
                }
            }
        });
    }

    function load_subject(obj) {
        var xueduan = $(obj).text();
        $.ajax({
            type: "POST",
            url: "/ai/get_subject/",
            dataType: "json",
            data: "kqid=" + $("#kqid").val() + '&xueduan=' + xueduan,
            success: function(data) {
                if (data.status == 1) {
                    subject_info = data.data;
                    subject_html = '';
                    for (index in subject_info) {
                        subject_html += '<li data-value="' + subject_info[index]['subject'] + '">' + subject_info[index]['subject'] + '</li>';
                        // console.log(subject_info[index]);
                        // console.log(index);
                    }
                    $('[name="nice-select"]:last ul').html(subject_html);
                    $('[name="nice-select"]').click(function(e) {
                        $('[name="nice-select"]').find('ul').hide();
                        $(this).find('ul').show();
                        console.log($(this).find('ul').html());
                        e.stopPropagation();
                    });
                    $('[name="nice-select"] li').hover(function(e) {
                        $(this).toggleClass('on');
                        e.stopPropagation();
                    });
                    $('[name="nice-select"] li').click(function(e) {
                        if (!$(this).attr('only')) {
                            var val = $(this).text();
                            $(this).parents('[name="nice-select"]').find('input').val(val);
                            $('[name="nice-select"] ul').hide();
                            e.stopPropagation();
                        }
                    });
                }
            }
        });
    }
    $(document).click(function() {
        $('[name="nice-select"] ul').hide();
    });

    function submit_form() {
        var index = layer.load(0, {
            shade: false
        }); //0代表加载的风格，支持0-2
        $.ajax({
            type: "POST",
            url: "/ai/do_ai",
            data: {
                'shouji': $('#tel').val(),
                'xingming': $('#xingming').val(),
                'kqid': $('#kqid').val(),
                'xueduan': $('#xueduan').val(),
                'xueke': $('#xueke').val(),
                'jzfs': $('#jzfs').val(),
                'zykfs': $('#zykfs').val(),
                'PhoneCode': $('#PhoneCode').val()
            },
            dataType: "json",
            success: function(data) {
                layer.close(index);
                if (data.status) {
                    window.location.href = '/ai/ai_result?randstr=' + data.data;
                } else {
                    swal({
                        title: "",
                        text: data.msg,
                        type: "error",
                        allowOutsideClick: true,
                    });
                }
            }
        });
    }
</script>
<script>
    window.sendnum = function(res) {
        console.log(res);
        // res（未通过验证）= {ret: 1, ticket: null}
        // res（验证成功） = {ret: 0, ticket: "String", randstr: "String"}
        if (res.ret == 0) {
            $.ajax({
                type: "POST",
                url: "/ai/sendSms",
                data: {
                    'tel': $('#tel').val(),
                    'ticket': res.ticket,
                    'randstr': res.randstr
                },
                dataType: "json",
                success: function(data) {
                    if (data.status) {
                        swal({
                            title: "",
                            text: data.msg,
                            type: "success",
                            timer: 3000,
                            showConfirmButton: false
                        });
                        $('#fs').attr('disabled', true);
                        var SysSecond;
                        var InterValObj;
                        SysSecond = 60;
                        InterValObj = window.setInterval(SetRemainTime, 1000);

                        function SetRemainTime() {
                            if (SysSecond > 0) {
                                SysSecond = SysSecond - 1;
                                var second = Math.floor(SysSecond % 60);
                                $('#fs').html(second + '秒');
                            } else {
                                window.clearInterval(InterValObj);
                                $('#fs').html('发送短信');
                                $('#fs').attr('disabled', false);
                            }
                        }
                    } else {
                        swal({
                            title: "",
                            text: data.msg,
                            type: "error",
                            allowOutsideClick: true,
                        });
                    }
                }
            });
        } else {
            swal({
                title: "",
                text: '验证码校验失败!',
                type: "error",
                allowOutsideClick: true,
            });
        }
    }
</script>
<canvas id="c" width="300" height="150"></canvas>
<script type="text/javascript" src="/resources/static/home/js/qipao.js"></script>
<script type="text/javascript" src="http://zw.shichuedu.com/resources/static/home/js/share.js"></script>
<script type="text/javascript" src="/resources/js/scgg.js" charset="utf-8"></script>
<div class="footer">
    <div class="div_footer box">
        <p>
            <a href="http://www.shichuedu.com/kk/kb/56494.html">面授</a> | <a href="http://scwx.shichuedu.com/">网课</a> | <a href="http://shichu.myzhishi.cn/web/pages/mall">教材</a> |
            <!--<a href="http://zw.shichuedu.com/paiming">分数排名</a> | --><a href="http://zw.shichuedu.com/resources/kefu/rand.html">微信客服</a> |
            <a href="http://scwx.shichuedu.com/">教师首页</a> |
            <a href="http://zw.shichuedu.com/resources/kefu/rand.html">QQ客服</a></p>
        <p>皖ICP备13007480号 皖公网安备34010302000541号</p>
    </div>
</div>
</body>

</html>