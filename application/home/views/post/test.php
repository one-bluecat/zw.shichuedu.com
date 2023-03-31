<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title><?php echo $year;?>安徽安庆教师招聘考试报名人数统计_报名入口|职位查询-安庆教师招聘考试网</title>
    <meta name='keywords' content='安庆教师招聘报名人数,安庆教师招聘报名入口,安庆教师考编,安庆教师招聘考试网'>
    <meta name='description' content='师出网校提供<?php echo $system_config['year'];?>安徽安庆教师招聘考试报名人数统计,安庆教师招聘考试报名入口,包括安庆职位表查询、报名人数统计、合格人数及职位竞争比统计。' />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta name="applicable-device" content="pc,mobile" />
    <link rel="shortcut icon" href="/resources/images/favicon.ico">
    <link type="text/css" rel="stylesheet" href="/resources/static/home/css/style.css" />
<!--    <link rel="stylesheet" type="text/css" href="/resources/static/home/css/rstj.css?1" />-->
    <script type="text/javascript" src="/resources/static/home/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="/resources/static/home/js/timec.js"></script>
    <script type="text/javascript"  src="/resources/static/home/highcharts/highcharts.js"></script>
    <script type="text/javascript"  src="/resources/static/home/highcharts/highcharts-3d.js"></script>
    <script type="text/javascript"  src="/resources/static/home/highcharts/exporting.js"></script>
    <script type="text/javascript"  src="/resources/static/home/highcharts/highcharts-zh_CN.js"></script>
	<script src="http://zw.shichuedu.com/resources/js/baidu.js"></script>
<!--    <script  type="text/javascript" src="/resources/static/home/hcharts//grid-light.js"></script>-->

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
<div id="htechartzh"></div>
<!--
<div id="sliders" class="main">
        <table width="35%" border="0" cellspacing="0" cellpadding="0" align="left">
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
    </div>-->
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
            <tr>
                <td><a class='red' href='<?php echo $value['url'];?>'><?php echo $value['name'];?></a></td>
                <td><?php echo $value['post_num'];?></td>
                <td><?php echo $value['require_num'];?></td>
                <td colspan="2" style='background:#F7F7F7;'><?php echo $value['apply_num'];?></td>
                <td  colspan="2" style='background:#F7F7F7;'><?php echo $value['pass_num'];?></td>
                <td style='background:#F7F7F7;'><?php echo $value['pay_num'];?></</td>
                <td><?php echo round($value['pay_num']/$value['require_num'],1);?></td>
                <td><a href='<?php echo $value['url'];?>' class='num table3'>查看</a></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<script>
    var chart = new Highcharts.Chart({
        chart: {
            renderTo: 'htechartzh',
            type: 'column',
            options3d: {
                enabled: true,
                alpha: 15,
                beta: 15,
                depth: 50,
                viewDistance: 25
            }
        },
        title: {
            text: '交互性3D柱状图'
        },
        subtitle: {
            text: '可通过滑动下方滑块测试'
        },
        plotOptions: {
            column: {
                depth: 25
            }
        },
        xAxis: {
            categories: ['安庆','蚌埠','亳州','池州','滁州','阜阳','合肥','淮北','黄山','淮南','六安','马鞍山','宿州','铜陵','芜湖','宣城']
        },
        series: [{
            name:'图例1',
            data: [29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]
        },{
            name:'图例1',
            data: [29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]
        },{
            name:'图例1',
            data: [29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]
        },{
            name:'图例1',
            data: [29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]
        },{
            name:'图例1',
            data: [29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]
        },{
            name:'图例1',
            data: [29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]
        }
        ]
    });
    // 将当前角度信息同步到 DOM 中
    var alphaValue = document.getElementById('alpha-value'),
        betaValue = document.getElementById('beta-value'),
        depthValue = document.getElementById('depth-value');
    function showValues() {
        alphaValue.innerHTML = chart.options.chart.options3d.alpha;
        betaValue.innerHTML = chart.options.chart.options3d.beta;
        depthValue.innerHTML = chart.options.chart.options3d.depth;
    }
    // 监听 sliders 的变化并更新图表
    $('#sliders input').on('input change', function () {
        chart.options.chart.options3d[this.id] = this.value;
        showValues();
        chart.redraw(false);
    });
    showValues();
</script>
</body>
</html>