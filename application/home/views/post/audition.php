<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title><?php echo $year?$year:$system_config['year'];?>安徽中小学教师招聘考试面试形式查询反馈_教师面试教材版本查询反馈_安徽教师统考面试形式查询反馈_安徽中小学教师面试教材版本查询反馈_安徽中小学教师面试形式查询反馈</title>
    <meta name='keywords' content='安徽中小学教师面试形式,教师面试教材版本,面试形式反馈,面试教材反馈<?php echo $system_config['year'];?>安徽中小学教师面试教材版本,<?php echo $system_config['year'];?>安徽中小学教师招聘面试形式' />
    <meta name='description' content='师出网校发布<?php echo $system_config['year'];?>安徽中小学教师面试形式提供<?php echo $system_config['year'];?>安徽省中小学教师考试面试教材版本查询,安徽中小学教师岗位表,安徽中小学教师招聘职位表,招聘条件及安徽中小学教师考试分数线查询。' />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta name="applicable-device" content="pc,mobile" />
    <link rel="shortcut icon" href="/resources/images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="/resources/static/home/css/3zwb.css" />
    <script type="text/javascript" src="/resources/static/home/js/jquery-1.7.1.min.js"></script>
    <base target="_blank" />
</head>
<div class="ht_top"><div class="zt_top"><a href="http://www.shichuedu.com/"><div class="logo"></div></a><div class="topnav"><a href="http://www.shichuedu.com/">师出教育</a> <a href="http://scwx.shichuedu.com/">网校</a> <a href="http://www.ahteacher.com/">安徽教师招考网</a></div></div></div>
<div class="ht_banner">
    <div class="Width"><img src="/resources/static/home/img/msban.jpg" alt="<?php echo $system_config['year'];?>安徽中小学教师招聘面试" border="0" /></div>
</div>
<div class="ht_nav">
    <div class="nav">
        <ul>
            <li><a class="cur" href="/">首页</a></li>
            <li><a href="http://www.shichuedu.com/tongkao/xinxi/gonggao/">招聘公告</a></li>
            <!-- <li><a href="http://www.shichuedu.com/tongkao/xinxi/dagang/">考试大纲</a></li> -->
            <li><a href="http://zw.shichuedu.com/paiming">提交分数看排名</a></li>
            <li><a href="http://zw.shichuedu.com/zwhz" >历年职位</a></li>
            <li><a href="http://zw.shichuedu.com/kscx/bmtj/" style="color:#FFF500;">报名人数</a></li>
            <li><a href="http://zw.shichuedu.com/lscx/index/" >分数线</a></li>
            <li><a href="http://zw.shichuedu.com/ai" style="color:#FFF500;">智能选岗</a></li>
            <li><a href="http://www.shichuedu.com/kk/kb/56494.html">面授课程</a></li>
            <li><a href="http://scwx.shichuedu.com/">网校课程</a></li>
            <li><a href="http://zw.shichuedu.com/msjc">教材版本</a></li>
            <!-- <li><a href="http://zw.shichuedu.com/resources/kefu/rand.html">优惠报班</a></li> -->
        </ul>
    </div>
</div>
<script type="text/javascript" src="/resources/static/home/js/script.js"></script>
<script src="https://ssl.captcha.qq.com/TCaptcha.js"></script>
<style>
    .phoneTk div textarea{
        width: 188px;
        height: 38px;
        border: solid 1px #ddd;
        float: left;
        padding-left: 10px;
        font-size: 14px;
        margin-left: 14px;
    }
    .phoneTk div span{
        color: red;
        padding-left:14px;
        font-size: 14px
    }
</style>
<div class="box">
    <div class="search mt15">
        <ul class="search_tab">
            <li class="cur">面试最新形式和教材版本查询</li>
        </ul>
        <div class="sear_select">
            <form class="zwsTop" method="get" target="_self" action="/msjc">
                <div class="select">
                    <ul>
                        <li>
                            <select id="city" name="city" onchange="get_area(this);">
                                <option selected="" value="">--城市--</option>
                                <option value="合肥">合肥</option>
                                <option value="芜湖">芜湖</option>
                                <option value="蚌埠">蚌埠</option>
                                <option value="淮南">淮南</option>
                                <option value="马鞍山">马鞍山</option>
                                <option value="淮北">淮北</option>
                                <option value="铜陵">铜陵</option>
                                <option value="安庆">安庆</option>
                                <option value="黄山">黄山</option>
                                <option value="滁州">滁州</option>
                                <option value="阜阳">阜阳</option>
                                <option value="宿州">宿州</option>
                                <option value="六安">六安</option>
                                <option value="亳州">亳州</option>
                                <option value="池州">池州</option>
                                <option value="宣城">宣城</option>
                            </select>
                            </select>
                        </li>
                        <li>
                            <select id="area" name="area" onchange="get_study_section(this)">
                                <option selected="" value="">--区县--</option>
                            </select>
                            </select>
                        </li>
                        <li>
                            <select id="xueduan" name="study_section"  onchange="get_subject(this)">
                                <option selected="" value="">学段</option>
                            </select>
                        </li>
                        <li>
                            <select id="xueke" name="subject">
                                <option selected="" value="">学科</option>
                            </select>
                        </li>
                    </ul>
                </div>
                <div class="select"><input type="submit" class="search_btn" value="查询" name="" id="submit"></div>
				<!-- <div class="select"><input  onclick="window.open('http://zw.shichuedu.com/uploads/tj.pdf')" type="submit" class="search_btn" value="历年最新" ></div>
				<div class="select"><input  onclick="window.open('http://zw.shichuedu.com/uploads/20tj.png')" type="submit" class="search_btn" value="2020年改版" ></div> -->
            </form>
        </div>


    </div>
    <!--职位内容开始-->
    <div class="job_table">
        <div class="job_title">&nbsp;<span>安徽教师面试最新形式和教材版本反馈</span><a href="javascript:;" id="btn" class="fs_zwsl fl" onclick="send_sms();">发送该信息到手机</a></div>
        <div class="job_content zwlisttb">
            <table width='960'  border='0' cellSpacing='1' cellPadding='0' align='center'>
                <thead>
                <tr>
                    <th>城市</th>
                    <th>县区</th>
                    <th>学段</th>
                    <th>学科</th>
                    <th>面试形式</th>
                    <th>教材版本</th>
                    <th>反馈提交</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($list as $key=>$value){
                    $key++;
                    ?>
                    <tr>
                        <td data-label='城市：'><?php echo $value['city'];?></td>
                        <td data-label='县区：'><?php echo $value['area'];?></td>
                        <td data-label='学段：'><?php echo $value['study_section'];?></td>
                        <td data-label='学科：'><?php echo $value['subject'];?></td>
                        <td data-label='面试形式：'><?php echo $value['audition'];?></td>
                        <td data-label='教材版本：'><?php echo $value['textbook_version'];?></td>
                        <td><a class='redback num table4' href='javascript:;' onclick=f_submit('<?php echo $value['id'];?>','<?php echo $value['city'];?>','<?php echo $value['area'];?>','<?php echo $value['study_section'];?>','<?php echo $value['subject'];?>')>反馈提交</a></td>
                    </tr>
                <?php }

                ?>
                </tbody>
            </table>
            <?php
            echo $page;
            ?>
        </div>
    </div>

    <div class="bm_txt">
        <p><strong><a class="cur" href="http://scwx.shichuedu.com/">网络课程</a><a
                        href="http://scwx.shichuedu.com/">教综基础精讲</a><a
                        href="http://scwx.shichuedu.com/">教综冲刺押题</a><a href="http://scwx.shichuedu.com/">教综考题强化</a><a
                        href="http://scwx.shichuedu.com/">专业知识精讲</a><a
                        href="http://scwx.shichuedu.com/">教学设计精讲</a><a href="http://scwx.shichuedu.com/" style="color: #f00;">双科全程</a><a<a href="http://zw.shichuedu.com/resources/kefu/rand.html">优惠报班</a></strong>
        </p>
        <p><strong><a class="cur" href="http://www.shichuedu.com/zhuanti/2020kc/">面授课程</a><a href="http://zw.shichuedu.com/resources/kefu/rand.html"
                                                                                             style="color: #f00;">教综精讲</a><a
                        href="http://zw.shichuedu.com/resources/kefu/rand.html">考题强化</a><a href="http://zw.shichuedu.com/resources/kefu/rand.html">专业知识精讲</a><a
                        href="http://zw.shichuedu.com/resources/kefu/rand.html" style="color: #f00;">教综系统</a><a
                        href="http://zw.shichuedu.com/resources/kefu/rand.html">专业系统</a><a href="http://zw.shichuedu.com/resources/kefu/rand.html">笔试全程</a><a
                        href="http://zw.shichuedu.com/resources/kefu/rand.html" style="color: #f00;">无限学</a><a
                        href="http://zw.shichuedu.com/resources/kefu/rand.html">笔面直通协议</a></strong></p>
    </div>
    <div class="share"><span>分享到</span><div class="bdsharebuttonbox"><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a><a href="#" class="bds_tieba" data-cmd="tieba" title="分享到百度贴吧"></a><a class="bds_count" data-cmd="count"></a></div></div>
    <!--职位内容结束-->
    <div class="mzsm"><div><strong>免责声明：</strong>各地面试形式及教材版本由网络收集和考生反馈而来，仅供参考，请以考试实际情况为准。</div></div>
    <script type="text/javascript" src="/resources/static/home/js/htjd.js"></script>
</div>
<!-- 弹框 -->
<div class="phoneTk hide" style="height:320px;!important; border-radius: 10px;" id="audition">
    <a onclick="$('.phoneTk,#coverDiv').hide();return false;" href="javascript:;">
        <img src="http://zw.shichuedu.com/resources/static/home/img/dalet.jpg" width="15" height="15">
    </a>
	<div style="border:1px solid #96c2f1;background:#eff7ff margin-right: 20px;margin-right: 60px;margin-left: 75px;">
    <div style=" width: 120px;margin-bottom: 0px;margin-left: 30px;"><label>城市：</label><span  id="citys"></span></div>
	<div style=" width: 120px;margin-bottom: 0px;margin-left: 30px;"><label>县区：</label><span  id="areas"></span></div>
    <div style=" width: 120px;margin-bottom: 0px;margin-left: 30px;"><label>学段：</label><span id="study_section"></span></div>
    <div style=" width: 120px;margin-bottom: 0px;margin-left: 30px;"><label>学科：</label><span id="subject"></span></div>
	</div>
    <div style=" margin-top: 20px;margin-left: 60px;"><textarea placeholder="请输入面试形式"  id="audition_content" name="audition"></textarea></div>
    <div style=" margin-top: 20px;margin-left: 60px;"><textarea placeholder="请输入教材版本"  id="textbook_version" name="textbook_version"></textarea></div>
    <input type="hidden" id="aid" name="aid" value="0">
    <div><input  type="button" value="提交反馈" onclick="feedback_submit()" /></div>

</div>
<!-- 遮罩层 -->
<div id="coverDiv" style="height: 2200px;"></div>


<!-- 弹框 -->
<div class="phoneTk hide" id="sms" style="border-radius: 10px; width: 350px;">
    <a onclick="$('.phoneTk,#coverDiv').hide();return false;" href="javascript:;"><img src="http://zw.shichuedu.com/resources/static/home/img/dalet.jpg" width="15" height="15"></a>
	
    <div><label>姓名</label><input placeholder="请输入姓名" type="text" id="xingming" name="xingming"/></div>
    
    <div>
        <label>专业</label>
        <select id="subject_study_section" name="subject_study_section">
            <option value="0">选择学科学段</option>
            <option value="小学语文">小学语文</option>
            <option value="小学数学">小学数学</option>
            <option value="小学英语">小学英语</option>
            <option value="小学音乐">小学音乐</option>
            <option value="小学体育">小学体育</option>
            <option value="小学美术">小学美术</option>
            <option value="小学信息技术">小学信息技术</option>
            <option value="小学品德与生活">小学品德与生活</option>
            <option value="小学科学">小学科学</option>
            <option value="小学心理健康">小学心理健康</option>
            <option value="初中语文">初中语文</option>
            <option value="初中数学">初中数学</option>
            <option value="初中英语">初中英语</option>
            <option value="初中音乐">初中音乐</option>
            <option value="初中体育">初中体育</option>
            <option value="初中美术">初中美术</option>
            <option value="初中化学">初中化学</option>
            <option value="初中生物">初中生物</option>
            <option value="初中物理">初中物理</option>
            <option value="初中政治">初中政治</option>
            <option value="初中地理">初中地理</option>
            <option value="初中历史">初中历史</option>
            <option value="初中信息技术">初中信息技术</option>
            <option value="初中心理健康">初中心理健康</option>
            <option value="高中语文">高中语文</option>
            <option value="高中数学">高中数学</option>
            <option value="高中英语">高中英语</option>
            <option value="高中音乐">高中音乐</option>
            <option value="高中体育">高中体育</option>
            <option value="高中美术">高中美术</option>
            <option value="高中化学">高中化学</option>
            <option value="高中生物">高中生物</option>
            <option value="高中物理">高中物理</option>
            <option value="高中政治">高中政治</option>
            <option value="高中地理">高中地理</option>
            <option value="高中历史">高中历史</option>
            <option value="高中信息技术">高中信息技术</option>
            <option value="高中心理健康">高中心理健康</option>
            <option value="初中通用技术">初中通用技术</option>
            <option value="高中通用技术">高中通用技术</option>
            <option value="特殊教育">特殊教育</option>
            <option value="儿童康复">儿童康复</option>
            <option value="综合实践活动">综合实践活动</option>

        </select>
    </div>
	<div><label>手机号</label><input placeholder="请输入手机号" type="text" id="tel" name="tel"/></div>
    <!--        <div><label>所在地区</label>-->
    <!--            <select id="diqu" name="political">-->
    <!--                <option value="0">选择地区</option>-->
    <!--                <option value="合肥">合肥</option>-->
    <!--                <option value="巢湖">巢湖</option>-->
    <!--                <option value="蚌埠">蚌埠</option>-->
    <!--                <option value="亳州">亳州</option>-->
    <!--                <option value="池州">池州</option>-->
    <!--                <option value="滁州">滁州</option>-->
    <!--                <option value="阜阳">阜阳</option>-->
    <!--                <option value="淮北">淮北</option>-->
    <!--                <option value="淮南">淮南</option>-->
    <!--                <option value="黄山">黄山</option>-->
    <!--                <option value="六安">六安</option>-->
    <!--                <option value="马鞍山">马鞍山</option>-->
    <!--                <option value="宿州">宿州</option>-->
    <!--                <option value="铜陵">铜陵</option>-->
    <!--                <option value="芜湖">芜湖</option>-->
    <!--                <option value="宣城">宣城</option>-->
    <!--            </select>-->
    <!--        </div>-->
    <div id="TencentCaptcha" data-appid="2083709460" data-cbfn="sendnum"><input  type="button" value="发送到手机"  /></div>

</div>
<script type="text/javascript" src="/resources/static/home/js/baidu.js"></script>
<script type="text/javascript" src="/resources/static/home/js/duibi.js"></script>
<script type="text/javascript" src="http://zw.shichuedu.com/resources/static/home/js/share.js"></script>
<script>

    function send_sms(){
        $('#sms,#coverDiv').show();
    }

    window.sendnum = function(res) {
        $('.sms').hide();
        $('#coverDiv').hide();

        var xingming=$.trim($('#xingming').val());
        if(!xingming){
            alert('请输入姓名！');
            return false;
        }

        var umobile=$.trim($('#tel').val());
        var rmobile=/^1[3-9]\d{9}$/;
        if( !rmobile.test( umobile ) || umobile =='' ){
            alert('请输入正确的手机号。');
            return false;
        }

        var subject_study_section = $('#subject_study_section').val();
        if(subject_study_section=='0'){
            alert("请选择学科学段");
            return false;
        }
        //
        // var diqu=$('#diqu').val();
        // if(diqu=='0'){
        //     alert("请选择地区");
        //     return false;
        // }
        //


        var id = $('#aid').val();
        /* callback */
        console.log(res);
        if(res.ret === 0){
            $.ajax({
                type: "POST",
                url: "/kscx/sendsms/",
                dataType: "json",
                data: "username="+xingming+"&tel="+umobile+"&id="+parseInt(id)+"&subject_study_section="+subject_study_section+"&ticket="+res.ticket+"&randstr="+res.randstr+'&audition=1',
                success: function(data) {
                    if(!data.status){
                        alert(data.msg);
                        return false;
                    }
                    if(data.status == 1){
                        $('.phoneTk,#coverDiv').hide();
                        alert("发送成功！");
                    }
                }
            });
        }else{
            alert('验证码校验失败！');
            return false;
        }
    };


    function f_submit(id,city,area,study_section,subject){
        $('#audition').show();
        $('#coverDiv').show();
        $('#aid').val(id);
        $('#citys').html(city);
        $('#areas').html(area);
        $('#study_section').html(study_section);
        $('#subject').html(subject);
        return false;
    }


    function feedback_submit() {
        id = $('#aid').val();
        audition =$('#audition_content').val();
        textbook_version =$('#textbook_version').val();
        if(!audition && !textbook_version){
            alert('请输入面试形式或者教材版本！');
            return false;
        }
        $.ajax({
            type: "POST",
            url: "/kscx/feedback/",
            dataType: "json",
            data: "audition="+audition+"&textbook_version="+textbook_version+"&aid="+parseInt(id),
            success: function(data) {
                if(!data.status){
                    alert(data.msg);
                    return false;
                }
                if(data.status == 1){
                    $('.phoneTk,#coverDiv').hide();
                    alert("提交成功！");
                }
            }
        });
    }

    function get_area(obj) {
        $.ajax({
            type: "POST",
            url: "/post/get_area/",
            dataType: "json",
            data: "city="+$(obj).val(),
            success: function(data) {
                if(data.status == 1){
                    area_info = data.data;
                    var area_html = '<option value="">区县</option>';
                   for (index in area_info) {
                       area_html+='<option value="'+area_info[index]['area']+'">'+area_info[index]['area']+'</option>';
                       console.log(area_info[index]);
                       console.log(index);
                   }
                   $('#area').html(area_html);
                }
            }
        });
    }


    function get_study_section(obj) {
        var city = $('#city').val();
        var area = $(obj).val();
        $.ajax({
            type: "POST",
            url: "/post/get_study_section/",
            dataType: "json",
            data: "city="+city+'&area='+area,
            success: function(data) {
                if(data.status == 1){
                    study_section_info = data.data;
                    var study_section_html = '<option value="">学段</option>';
                    for (index in study_section_info) {
                        study_section_html+='<option value="'+study_section_info[index]['study_section']+'">'+study_section_info[index]['study_section']+'</option>';
                        console.log(study_section_info[index]);
                        console.log(index);
                    }
                    $('#xueduan').html(study_section_html);
                }
            }
        });
    }

    function get_subject(obj) {
        var city = $('#city').val();
        var area = $('#area').val();
        var study_section = $(obj).val();
        $.ajax({
            type: "POST",
            url: "/post/get_subject/",
            dataType: "json",
            data: "city="+city+'&area='+area+"&study_section="+study_section,
            success: function(data) {
                if(data.status == 1){
                    subject_info = data.data;
                    var subject_html = '<option value="">学科</option>';
                    for (index in subject_info) {
                        subject_html+='<option value="'+subject_info[index]['subject']+'">'+subject_info[index]['subject']+'</option>';
                        console.log(subject_info[index]);
                        console.log(index);
                    }
                    $('#xueke').html(subject_html);
                }
            }
        });
    }

</script>
<div class="footer">
    <div class="div_footer box">
        <p>
            <a href="http://www.shichuedu.com/kk/kb/56494.html">面授</a> |			<a href="http://scwx.shichuedu.com/">网课</a> |            <a href="http://shichu.myzhishi.cn/web/pages/mall">教材</a> |
            <!--<a href="http://zw.shichuedu.com/paiming">分数排名</a> |            --><a href="http://zw.shichuedu.com/resources/kefu/rand.html">微信客服</a> |
            <a href="http://scwx.shichuedu.com/">教师首页</a> |
            <a href="http://zw.shichuedu.com/resources/kefu/rand.html">QQ客服</a></p>
        <p>皖ICP备13007480号 皖公网安备34010302000541号</p>
    </div>
</div>
</body>
</html>
