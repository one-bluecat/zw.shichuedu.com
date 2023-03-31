<!DOCTYPE html>
<html>
<head>
    <meta charset="gb2312" />
    <title>岗位代码查询-<?php echo $system_config['year'];?>年安徽省教师招聘考试</title>
    <meta name="keywords" content="岗位代码,安徽省教师,安徽教师招聘" />
    <meta name="description" content="<?php echo $system_config['year'];?>年安徽省教师招聘考试岗位代码查询。" />
	<link rel="shortcut icon" href="/resources/images/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <link href='/resources/assets/stylesheets/bootstrap/bootstrap.css' media='all' rel='stylesheet' type='text/css' />
	<script src="http://zw.shichuedu.com/resources/js/baidu.js"></script>
    <style>
        body,button,dd,dl,dt,fieldset,form,h1,h2,h3,h4,h5,h6,hr,img,input,legend,li,ol,p,pre,td,textarea,th,ul{margin:0;padding:0;font:14px/28px "黑体",Arial,sans-serif;color:#333;border:none}
        body{padding:30px 0;background:#f5f6f7}
        h1{font-size:24px; font-family:黑体; line-height:40px;}
        h2{font-size:14px;line-height:20px;padding-bottom:5px;}
        a{color:#333;text-decoration:none;}
        a:hover{color:#009755;text-decoration:underline;}
        .wrap{max-width:1100px;margin:0 auto;background: #fff;border-radius: 18px;box-shadow: 0 10px 30px #cbcaca;}
        .service_info{padding:15px;}
        .service_info img{border:1px solid #dedede;padding:5px;margin:0 auto;}
        .service_fun{border:1px solid #dedede;background:#f5f5f5;}
        table{width:100% !important;border-collapse:collapse;background:#fff;margin:15px auto;border-top:2px solid #e21837;margin:0 auto; background-image: url(https://s1.ax1x.com/2022/06/21/jSARWF.jpg);}
        table th{background:#f6f6f6;color:#333;text-align:center;font-weight:bold;}
        table th,table td{border:1px solid #DEDEDE;line-height: 28px;}
        table td{text-align:center;padding:2px 3px;word-break: break-all;max-width: 400px;}
        table tr:hover{background:#ddd;}
        table tr td strong{font-weight:bold;}
        table a{color:#FF0000;}
        .regist{
	float:left;
	margin-bottom:20px;
}
        .regist td{ height:40px; font-size:14px;}
        .regist1 td{ height:30px; font-size:12px;color:#373737}
        .inputz{float:left;border:1px solid #BDC7D8; background:#fff; font-size:14px; vertical-align:middle; text-align:left; height:28px; line-height:26px; width:240px;padding:0px 3px;}

        .selectz{ float:left; background:#fff; font-size:14px; width:248px; height:28px;border:1px solid #BDC7D8;line-height:26px;}
        .selectz1{  margin-bottom: 0px; background:#fff; font-size:14px; width:150px; height:28px;border:1px solid #BDC7D8;line-height:26px;}
        .button2{ background:url(/resources/images/button2.gif) no-repeat left top; width:110px; height:34px; border:0px; line-height:34px; overflow:hidden; font-size:14px; color:#fff; font-weight:bold;!important;}

    </style>
<!--    <base target="_blank" />-->
</head>
<body>
<div class="wrap">
    <div class="service_info">
        <div style="text-align:center;border-bottom: 1px dashed #d9d8da;; margin-bottom:15px;"><h1>岗位代码查询</h1>
            <h2><?php echo $system_config['year'];?>年安徽省教师招聘考试</h2> </div>
        <div class="regist" >
            <form action="/paiming/reg/view_post" method="get">
                <p>学段
				<select name="study_section" id="xddm" class="selectz1">
                <option value="">---请选择---</option>
                <?php foreach($study_section_list as $key=>$r):?>
                <option value="<?php echo $r['study_section'];?>" <?php if($study_section ==$r['study_section']) echo 'selected'; ?>><?php echo $r['study_section'];?></option>
                <?php endforeach;?>
                </select>
				学科
				<select name="subject" id="xkdm" class="selectz1">
                                <option value="">---请选择---</option>
                                <?php foreach($subject_list as $key=>$r):?>
                                    <option value="<?php echo $r['subject'];?>" <?php if($subject ==$r['subject']) echo 'selected'; ?>><?php echo $r['subject'];?></option>
                                <?php endforeach;?>
                            </select>
				地区
				 <select name="province" id="dwdm" class="selectz1">
                                <option value="">---请选择---</option>
                                <?php foreach($area_list as $key=>$r):?>
                                    <option value="<?php echo $key;?>" <?php if($province ==$key) echo 'selected'; ?>><?php echo $area_map[$key];?></option>
                                   <?php foreach($r as $re):?>
                                        <option value="<?php echo $re['province'];?>" <?php if($province==$re['province']) echo 'selected'; ?>>&nbsp;&nbsp;<?php echo $re['area'];?></option>
                                    <?php endforeach;?>

                                <?php endforeach;?>
                            </select>
				<input id="btnSearch" value=" 查 询 " class="button2" type="submit" style="width: 110px;"></p>
            </form>
        </div>
        <div style="font-size:14px; line-height:28px;  margin-bottom:10px;">
<table>
                <tbody>
                <tr>
                    <td>
                        县区</td>
                    <td width="30%">
                        招聘单位</td>
                    <td width="30%"> 招聘岗位</td>
                    <td>招聘人数</td>
                    <td> 学段</td>
                    <td> 学科</td>
                </tr>
                <?php foreach($list as $key=>$r):?>
                    <tr>
                       <?php if(!empty($r['area'])): ?>
                            <td rowspan="<?php echo $r['rowspan'];?>"><?php echo $r['area'];?></td>
                        <?php endif;?>
                            <td><?php echo $r['company'];?></td>
                            <td><?php echo $r['post_code'];?> &nbsp;&nbsp;<?php echo $r['post_name'];?></td>
                            <td><?php echo $r['num'];?></td>
                            <td><?php echo $r['study_section'];?></td>
                            <td><?php echo $r['subject'];?></td>

                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
            <div class="row-fluid">
                <div class="span6">
                    <div class="dataTables_info" id="DataTables_Table_0_info">total rows <span  style="color: red";><?php echo $total_rows;?></span></div>
                </div>
                <div class="span6 text-right">
                    <div class="dataTables_paginate paging_bootstrap pagination pagination-small" style="margin:30px 0 0 0;">
                        <?php echo $page;?>
                    </div>
                </div>
            </div>

            <p>　　职位表详细查询:<a href="http://zw.shichuedu.com" title="<?php echo $system_config['year'];?>安徽省教师招聘职位表汇总"><?php echo $system_config['year'];?>安徽省教师招聘职位表汇总</a>。</p>
        </div>
    </div>
</div>
</body>
</html>
<script src='/resources/assets/javascripts/jquery/jquery.min.js' type='text/javascript'></script>
<script src='/resources/assets/javascripts/bootstrap/bootstrap.min.js' type='text/javascript'></script>