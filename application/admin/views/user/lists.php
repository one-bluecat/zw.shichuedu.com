<table class="layui-table text-center layui-form" lay-size="sm">
    <thead>
    <tr>
<!--        <th><input type="checkbox" lay-skin="primary" lay-filter="allChoose"></th>-->
        <th style="width: 64px">id</th>
        <th style="width: 150px">用户名</th>
        <th>上次登陆时间</th>
        <th>上次登陆ip</th>
        <th>登陆次数</th>
        <th>注册时间</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
        <?php

        foreach ($list as $r){
            ?>
        <tr>
<!--            <td><input type="checkbox" name="ids[]" class="layui-checkbox checkbox-ids" value="--><?php //echo $r['id'];?><!--" lay-skin="primary"></td>-->
            <td><?php echo $r['id'];?></td>
            <td><?php echo $r['username'];?></td>
            <td><?php echo $r['last_login_time'];?></td>
            <td><?php echo $r['last_login_ip'];?></td>
            <td><?php echo $r['login_times'];?></td>
            <td><?php echo $r['create_time'];?></td>
            <td>
                <a class="layui-btn layui-btn-xs layui-btn-normal ajax-form" href="<?php echo site_url('user/edit/'.$r['id'])?>" title="编辑用户">编辑</a>
                <a class="layui-btn layui-btn-xs layui-btn-primary ajax-get" confirm="1" href="<?php echo site_url('user/del/'.$r['id'])?>" title="删除用户">删除</a>
            </td>
        </tr>

        <?php }

        ?>

    </tbody>
</table>
<div class="page">
    <?php echo $page;?>
</div>

