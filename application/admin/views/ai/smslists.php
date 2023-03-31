<table class="layui-table text-center layui-form" lay-size="sm">
    <thead>
    <tr>
        <th>姓名</th>
        <th>手机号码</th>
        <th>验证码</th>
        <th>短信内容</th>
        <th>发送时间</th>
    </tr>
    </thead>
    <tbody>
        <?php
        foreach ($list as $r){
            ?>
        <tr>
            <td><?php echo $r['username'];?></td>
            <td><?php echo $r['phone'];?></td>
            <td><?php echo $r['code'];?></td>
            <td><?php echo $r['content'];?></td>
            <td><?php echo $r['send_time'];?></td>
        </tr>
        <?php }
        ?>

    </tbody>
</table>
<div class="page">
    <?php echo $page;?>
</div>



