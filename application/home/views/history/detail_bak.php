<script src="https://ssl.captcha.qq.com/TCaptcha.js"></script>
<div class="box">
    <div class="gwysite">
        <span>您所在的位置：
            <a href="/lscx/home/<?php echo $year !=$system_config['year']?$year.'.html':"";?>">首页</a> &gt;
            <a href='/lscx/<?php echo $city_map[substr($detail['province'],0,4)]['en'];?>/<?php echo $year !=$system_config['year']?$year.'.php':"";?>'><?php echo $city_map[substr($detail['province'],0,4)]['zh'];?></a> &gt;
            <a href='/lscx/<?php echo $city_map[substr($detail['province'],0,4)]['en'];?>/<?php echo str_replace(' ','',pinyin($detail['area']));?>/<?php echo $year !=$system_config['year']?$year.'.html':"";?>'><?php echo $detail['area'];?></a> &gt;
            <a href='/lscx/<?php echo $city_map[substr($detail['province'],0,4)]['en'];?>/<?php echo $detail['id'];?>/<?php echo $year !=$system_config['year']?$year.'.html':"";?>'><?php echo $detail['company'];?></a> &gt; <?php echo $detail['post_name'];?>
        </span>
    </div>
    <!--职位内容开始-->
    <div class="job_table">
        <div class="job_title"><h1><?php echo $year;?>安徽教师招聘<?php echo $city_map[substr($detail['province'],0,4)]['zh'].$detail['company'].$detail['post_name'];?>成绩排名</h1></div>

        <div class="job_content zwtbxx">
            <a name="chengji"></a>
            <div class="lnfsx">
                <table width="960"  border="0" cellSpacing="1" cellPadding="0" align="center">
                    <tbody>
                    <tr>
                        <td  colspan="8"><b><?php echo $detail['company'].$detail['post_name'];?>-<?php echo $detail['post_code'];?>-成绩排名</b>
                            <div class="htzwxq">招聘人数：<?php echo $detail['num'];?>；最终报考人数：<?php echo $detail['pay_num'];?>人；<a href="#zhiwei" target="_self">查看职位信息</a>。</div>
                        </td>
                    </tr>
                    <tr>
<!--                        <td class="zydnxs">岗位代码</td>-->
<!--                        <td>准考号</td>-->
<!--                        <td>综合成绩</td>-->
<!--                        <td>专业成绩</td>-->
<!--                        <td>笔试成绩</td>-->
<!--                        <td>加分</td>-->
                        <td>总分</td>
                        <td>总分排名</td>
                    </tr>
                        <?php
                         foreach ($list as $key=>$item){
                             ?>
                             <tr>
<!--                                 <td class="zydnxs">--><?php //echo $item['post_code'];?><!--</td>-->
                                 <td><?php echo $item['score'];?></td>
                                 <td><?php echo ($key+1);?></td>
                            </tr>

                    <?php   }
                        ?>
                    <tr>
                        <td colspan="8" style="text-align:center">
                            <b><a href="/lscx/home/<?php echo $year !=$system_config['year']?$year.'.html':"";?>">返回首页</a></b>  &nbsp;|
                            <b><a href="/lscx/<?php echo $city_map[substr($detail['province'],0,4)]['en']?>/<?php echo $year !=$system_config['year']?$year.'.php':"";?>" target="_blank"><?php echo $city_map[substr($detail['province'],0,4)]['zh']?></a></b>  &nbsp;|
                            <b><a href="/lscx/<?php echo $city_map[substr($detail['province'],0,4)]['en']?>/<?php echo str_replace(' ','',pinyin($detail['area']));?>/<?php echo $year !=$system_config['year']?$year.'.html':"";?>" target="_blank"><?php echo $detail['area'];?>成绩</a></b>  &nbsp;|
                            <b><a href="/lscx/search<?php echo $year !=$system_config['year']?$year:"";?>/" target="_blank">查询成绩</a></b>  &nbsp;|
                            <b><a href="/lscx/index/">历年分数线</a></b>
                        </td>
                    </tr>
                    <tr><td colspan="8">
                            <!-- Baidu Button BEGIN -->
                            <div class="share"><span>分享到</span><div class="bdsharebuttonbox"><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a><a href="#" class="bds_tieba" data-cmd="tieba" title="分享到百度贴吧"></a><a class="sh_count" data-cmd="count">3K</a></div></div>
                            <!-- Baidu Button END -->
                        </td></tr>
                    </tbody>
                </table>
            </div>
            <div class="mzsm">
                <div><strong>免责声明：</strong>此成绩信息来源各市县官方教育网，只为各位考生提供备考参考之用,最终数据请留意各市县区教育网，谢谢！另有些地区只公布了资格复审名单。<br/>
                    <strong>温馨提示：</strong>资格复审对象为拟参加专业测试人员，其中岗位招聘5人及以下的按3:1比例确定，岗位招聘5人以上的按2：1确定，最后一名如有多位成绩相同，则一并进入。
                </div>
            </div>
        </div>

        <a name="zhiwei"></a>
        <div class="job_title"><?php echo $city_map[substr($detail['province'],0,4)]['zh'];?><?php echo $detail['company'].$detail['post_name'];?>&nbsp;&nbsp;<span>职位详细</span></div>
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
                <tr style="background:#ececec;"><td>报名人数</td><td><?php echo $detail['apply_num'];?>人（更新时间：<?php echo $system_config['fs_newupdate_time'];?>）</td></tr>
                <tr style="background:#ececec;"><td>资格审查合格</td><td><?php echo $detail['pass_num'];?>人（更新时间：<?php echo $system_config['fs_newupdate_time'];?>）</td></tr>
                <tr style="background:#ececec;"><td>缴费人数</td><td><?php echo $detail['pay_num'];?>人（更新时间：<?php echo $system_config['fs_newupdate_time'];?>）</td></tr>
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
                    <td><a href="/" class="num table2">返回<?php echo $system_config['year'];?>年职位库首页</a></td>
                    <td><a href="http://www.shichuedu.com/tongkao/xinxi/rukou/" class="num table5"><?php echo $system_config['year'];?>安徽教师招聘考试报名入口</a></td>
                </tr>
                <tr><td><a href="http://zw.shichuedu.com/msjc" class="num table5">最新教师面试教材版本</a></td><td><a href="http://zw.shichuedu.com/msjc" class="num table2">最新教师面试形式</a></td></tr>
                <tr><td>获取最新职位表信息</td><td>关注师出网校微信：shichuwx</td></tr>
                <tr><td>师出刷题QQ群</td><td><a href="https://jq.qq.com/?_wv=1027&k=xx5X24ii" rel="nofollow">点击一键加群<img class="group" src="http://zw.shichuedu.com/resources/images/qqgroup.png" alt="师出刷题QQ群" border="0"></a></td></tr>
                <tr><td colspan="4" style="text-align:center">
                        <b><a href="/lscx/home/<?php echo $year != $system_config['year']?$year:'';?>">返回首页</a></b>  &nbsp;|
                        <b><a href="/kscx/search<?php echo $year !=$system_config['year']?$year:"";?>/" target="_blank">搜索职位</a></b>
                </tr>
                </tbody>
            </table>

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
    <script type="text/javascript" src="/resources/static/home/js/htjd.js"></script>
   

</div>
<script type="text/javascript" src="/resources/static/home/js/share.js"></script>

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
                data: "history=1&username="+xingming+"&tel="+umobile+"&id="+parseInt(id)+"&subject_study_section="+subject_study_section+"&ticket="+res.ticket+"&randstr="+res.randstr,
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