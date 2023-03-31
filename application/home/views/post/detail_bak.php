<script src="https://ssl.captcha.qq.com/TCaptcha.js"></script>
<div class="box">
    <div class="gwysite"><span>您所在的位置：<a href="/">首页</a> &gt; <a href='/kscx/<?php echo $city_map[substr($detail['province'],0,4)]['en'].($year!=$system_config['year']?'/'.$year.'.php':"");?>'><?php echo $city_map[substr($detail['province'],0,4)]['zh'];?></a> &gt; <a href='/kscx/<?php echo $city_map[substr($detail['province'],0,4)]['en'];?>/<?php echo str_replace(' ','',pinyin($detail['area'])).($year!=$system_config['year']?'/'.$year.'.html':"");?>'><?php echo $detail['area'];?></a> &gt; <a href='/kscx/<?php echo $city_map[substr($detail['province'],0,4)]['en'];?>/<?php echo $detail['id'].($year!=$system_config['year']?'/'.$year.'.html':"");?>'><?php echo $detail['company'];?></a> &gt; <?php echo $detail['post_name'];?> </span></div>

    <!--职位内容开始-->
    <div class="job_table">
        <div class="job_title"><h1><?php echo $city_map[substr($detail['province'],0,4)]['zh'].$detail['company'].$detail['post_name']; ?></h1>&nbsp;&nbsp;<span>职位详细</span><a href="javascript:;" id="btn" class="fs_zwsl fl">发送该职位信息到手机</a></div>
        <div class="job_content zwtbxx">
            <table width="960"  border="0" cellSpacing="1" cellPadding="0" align="center">
                <tbody>
                <tr><td width="40%">职位代码</td><td><?php echo $detail['post_code'];?></td></tr>
                <tr><td>招聘地区</td><td><?php echo $city_map[substr($detail['province'],0,4)]['zh']?></td></tr>
                <tr><td>行政辖区</td><td><?php echo $detail['area'];?></td></tr>
                <tr><td>行政辖区代码</td><td><?php echo $detail['province'];?></td></tr>
                <tr><td>招聘学校</td><td><?php echo $detail['company'];?></td></tr>
                <tr><td>招聘岗位</td><td><?php echo $detail['post_name'];?></td></tr>
                <tr><td>招录人数</td><td><?php echo $detail['num'];?><?php if($detail['hejian'])echo '<span>（该职位被核减或取消后招：'.($detail['num']-$detail['hejian']).'人）</span>';?></td></tr>
                <tr><td>单列计划</td><td><?php echo $detail['single_plan'];?></td></tr>
                <tr style="background:#ececec;"><td>报名人数</td><td><?php echo $detail['apply_num'];?>人（更新时间：<?php echo $system_config['zhiwei_newupdate_time'];?>）</td></tr>
                <tr style="background:#ececec;"><td>资格审查合格</td><td><?php echo $detail['pass_num'];?>人（更新时间：<?php echo $system_config['zhiwei_newupdate_time'];?>）</td></tr>
                <tr style="background:#ececec;"><td>缴费人数</td><td><?php echo $detail['pay_num'];?>人（更新时间：<?php echo $system_config['zhiwei_newupdate_time'];?>）</td></tr>
                <tr style="background:#ececec;"><td>竞争比</td><td><?php echo $detail['compete_rate'];?>（注：竞争比=缴费人数÷招考人数）</td></tr>
                <tr><td>学段</td><td><?php echo $detail['study_section'];?></td></tr>
                <tr><td>学科</td><td><?php echo $detail['subject'];?></td></tr>
                <tr><td>专业</td><td><?php echo $detail['profession'];?></td></tr>
                <tr><td>学历</td><td><?php echo $detail['degree'];?></td></tr>
                <tr><td>是否需要学位</td><td><?php echo $detail['is_need_degree'];?></td></tr>
                <tr><td>年龄</td><td><?php echo $detail['age'];?></td></tr>
                <tr><td>教师资格</td><td><?php echo $detail['teacher_qualification'];?></td></tr>
                <tr><td>备注</td><td><?php echo $detail['memo'];?></td></tr>
                <tr style="background:#ececec;color:#f00"><td>免费发送到手机</td><td><a href="javascript:;" id="btn1" class="fs_zws2">发送该职位信息到手机</a></td></tr>
                <tr>
                    <td><a href="/" class="num table2">返回<?php echo $system_config['year'];?>职位库首页</a></td>
                    <td><a href="http://www.shichuedu.com/tongkao/xinxi/rukou/" class="num table5"><?php echo $system_config['year'];?>安徽教师招聘考试报名入口</a></td>
                </tr>
                <tr><td><a href="http://zw.shichuedu.com/msjc" class="num table5">最新教师面试教材版本</a></td><td><a href="http://zw.shichuedu.com/msjc" class="num table2">最新教师面试形式</a></td></tr>
                <tr><td>获取最新职位表信息</td><td>关注师出网校微信：shichuwx</td></tr>
                <tr><td>师出刷题QQ群</td><td><a href="https://jq.qq.com/?_wv=1027&k=xx5X24ii" rel="nofollow">点击一键加群<img class="group" src="http://zw.shichuedu.com/resources/images/qqgroup.png" alt="师出刷题QQ群" border="0"></a></td></tr>
                <tr>
                    <td colspan="4" style="text-align:center">
                        <b><a href="/home/index/<?php echo $year!=$system_config['year']?$year.'.html':"" ; ?>">返回首页</a></b>  &nbsp;|
                        <b><a href="/kscx/<?php echo $city_map[substr($detail['province'],0,4)]['en'].($year!=$system_config['year']?'/'.$year.'.php':"" );?>" target="_blank"><?php echo $city_map[substr($detail['province'],0,4)]['zh'];?>职位</a></b>  &nbsp;|
                        <b><a href="/kscx/<?php echo $city_map[substr($detail['province'],0,4)]['en'];?>/<?php echo str_replace(' ','',pinyin($detail['area'])).($year!=$system_config['year']?'/'.$year.'.html':"" );?>" target="_blank"><?php echo $detail['area'];?></a></b>  &nbsp;|
                        <b><a href="/kscx/search<?php echo $year!=$system_config['year']?$year:"";?>" target="_blank">搜索职位</a></b>  &nbsp;| <b><a href="/kscx/bmtj/<?php echo $year!=$system_config['year']?$year.'.html':"";?>">报名人数统计</a></b>
                    </td>
                </tr>
                </tbody>
            </table>
            <div class="bm_txt">
        <p><strong><a class="cur" href="http://scwx.shichuedu.com/">网络课程</a><a
                        href="http://scwx.shichuedu.com/">教综基础精讲</a><a
                        href="http://scwx.shichuedu.com/">教综冲刺押题</a><a href="http://scwx.shichuedu.com/">教综考题强化</a><a
                        href="http://scwx.shichuedu.com/">专业知识精讲</a><a
                        href="http://scwx.shichuedu.com/">教学设计精讲</a><a href="http://scwx.shichuedu.com/" style="color: #f00;">双科全程</a><a href="http://zw.shichuedu.com/resources/kefu/rand.html">优惠报班</a></strong>
        </p>
        <p><strong><a class="cur" href="http://www.shichuedu.com/zhuanti/2020kc/">面授课程</a><a href="http://zw.shichuedu.com/resources/kefu/rand.html"
                                                                                   style="color: #f00;">教综精讲</a><a
                        href="http://zw.shichuedu.com/resources/kefu/rand.html">考题强化</a><a href="http://zw.shichuedu.com/resources/kefu/rand.html">专业知识精讲</a><a
                        href="http://zw.shichuedu.com/resources/kefu/rand.html" style="color: #f00;">教综系统</a><a
                        href="http://zw.shichuedu.com/resources/kefu/rand.html">专业系统</a><a href="http://zw.shichuedu.com/resources/kefu/rand.html">笔试全程</a><a
                        href="http://zw.shichuedu.com/resources/kefu/rand.html" style="color: #f00;">无限学</a><a
                        href="http://zw.shichuedu.com/resources/kefu/rand.html">笔面直通协议</a></strong></p>
    </div>

            <a name="chengji"></a>
            <!-- <div class="lnfsx">
                <table width="960"  border="0" cellSpacing="1" cellPadding="0" align="center">
                    <tbody>
                    <tr>
                        <td  colspan="7"><b><?php echo $last_year;?>年<?php echo $city_map[substr($detail['province'],0,4)]['zh'];?><?php echo $detail['company'];?>其职位报名详情</b></td>
                    </tr>
                    <tr>
                        <td>职位名称</td>
                        <td>招考人数</td>
                        <td>报名人数</td>
                        <td>合格人数</td>
                        <td>缴费人数</td>
                        <td>笔试分数线</td>
                        <td>查看详情</td>
                    </tr>
                    <?php
                        foreach ($list as $value){
                            ?>
                            <tr>
                                <td><?php echo $value['post_name'];?></td>
                                <td><?php echo $value['num'];?></td>
                                <td><?php echo $value['apply_num'];?></td>
                                <td><?php echo $value['pass_num'];?></td>
                                <td><?php echo $value['pay_num'];?></td>
                                <td><?php echo $value['bscj'];?></td>
                                <td><a href="/kscx/<?php echo $value['year'];?>/<?php echo $value['id'];?>.html">职位详情</a></td>
                            </tr>
                     <?php   }
                    ?>

                    <tr><td colspan="7">
                            
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div> -->

                            <!-- Baidu Button BEGIN -->
                            <div class="share"><span>分享到</span><div class="bdsharebuttonbox"><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a><a href="#" class="bds_tieba" data-cmd="tieba" title="分享到百度贴吧"></a><a class="bds_count" data-cmd="count"></a></div></div>
                            <!-- Baidu Button END -->
        </div>
    </div>
    <!--职位内容结束-->
    <!--搜索开始-->
    <input type="hidden" id='aid' value='<?php echo $detail['id'];?>'/>
    <!-- 弹框 -->
    <div class="phoneTk hide" style="border-radius: 10px;">
        <a onclick="$('.phoneTk,#coverDiv').hide();return false;" href="javascript:;"><img src="http://zw.shichuedu.com/resources/static/home/img/dalet.jpg" width="15" height="15"></a>
        <div><label>姓名:</label><input placeholder="请输入姓名" type="text" id="xingming" name="xingming"/></div>
        
        <div>
            <label>专业:</label>
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
		<div><label>手机号:</label><input placeholder="请输入手机号" type="text" id="tel" name="tel"/></div>
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
    <!-- 遮罩层 -->
    <div id="coverDiv" style="height: 2200px;"></div>
    <!-- js引入 -->
    <script type="text/javascript" src="/resources/static/home/js/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="/resources/static/home/js/script.js"></script>

    <!--搜索内容结束-->


    <div class="mzsm"><div><strong>免责声明：</strong>此职位信息来源安徽省中小学教师招聘考试网，只为各位考生提供报名参考之用,最终数据请以安徽省中小学教师招聘考试网正式公布为准。</div></div>
</div>
<script type="text/javascript" src="http://zw.shichuedu.com/resources/static/home/js/share.js"></script>

</body>
</html>
<script>
    window.sendnum = function(res) {
        $('.phoneTk').hide();
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
                data: "username="+xingming+"&tel="+umobile+"&id="+parseInt(id)+"&subject_study_section="+subject_study_section+"&ticket="+res.ticket+"&randstr="+res.randstr,
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

</script>