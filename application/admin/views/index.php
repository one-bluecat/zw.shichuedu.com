<div class="main layui-body">
    <div class="main-header">
        <div class="layui-breadcrumb">
            <a href="{:url('/')}"><i class="fa fa-dashboard"></i> 控制台</a>
        </div>
    </div>
    <div class="main-content">
        <div class="layui-fluid">
            <div class="layui-card">
                <div class="layui-card-body layui-text">
                    <fieldset class="layui-elem-field">
                        <legend>系统信息</legend>
                        <table class="layui-table">
                            <tbody>
                            <tr>
                                <td>服务器操作系统：</td>
                                <td><?php echo $os;?></td>
                                <td>服务器域名/IP：</td>
                                <td><?php echo $domain;?> [ <?php echo $ip;?> ]</td>
                                <td>服务器环境：</td>
                                <td><?php echo $web_server;?></td>
                            </tr>
                            <tr>
                                <td>PHP 版本：</td>
                                <td><?php echo $phpv;?></td>
                                <td>Mysql 版本：</td>
                                <td><?php echo $mysql_version;?></td>
                                <td>GD 版本</td>
                                <td><?php echo $gdinfo;?></td>
                            </tr>
                            <tr>
                                <td>文件上传限制：</td>
                                <td><?php echo $fileupload;?></td>
                                <td>最大占用内存：</td>
                                <td><?php echo $memory_limit;?></td>
                                <td>最大执行时间：</td>
                                <td><?php echo $max_ex_time;?></td>
                            </tr>
                            <tr>
                                <td>安全模式：</td>
                                <td><?php echo $safe_mode;?></td>
                                <td>Zlib支持：</td>
                                <td><?php echo $zlib;?></td>
                                <td>Curl支持：</td>
                                <td><?php echo $curl;?></td>
                            </tr>
                            </tbody>
                        </table>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>

