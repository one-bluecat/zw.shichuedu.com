<table class="layui-table text-center layui-form" lay-size="sm">
    <thead>
    <tr>
        <th>ID</th>
        <th>年份</th>
        <th>最新更新时间</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($list as $r){
        ?>
        <tr>
            <td><?php echo $r['id'];?></td>
            <td><?php echo $r['year'];?></td>
            <td><?php echo $r['updatetime'];?></td>
            <td>
                <a class="layui-btn layui-btn-xs layui-btn-normal ajax-form" href="<?php echo site_url('post/edit_updatetime/'.$r['id'])?>" title="编辑">编辑</a>
                <a class="layui-btn layui-btn-xs layui-btn-primary ajax-get" confirm="1" href="<?php echo site_url('post/del_updatetime/'.$r['id'])?>" title="删除">删除</a>
            </td>
        </tr>
    <?php }
    ?>

    </tbody>
</table>
<div class="page">
    <?php echo $page;?>
</div>



