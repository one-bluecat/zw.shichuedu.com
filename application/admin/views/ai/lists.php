<table class="layui-table text-center layui-form" lay-size="sm">
    <thead>
    <tr>
        <th>类型</th>
        <th>学段</th>
        <th>学科</th>
        <th>等级名称</th>
        <th>分数范围</th>
        <th>链接地址</th>
        <th>封面地址</th>
        <th>添加时间</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
        <?php
        foreach ($list as $r){
            ?>
        <tr>
            <td><?php echo $r['level_type'] == 1?'教综':'专业课';?></td>
            <td><?php echo $r['study_section'];?></td>
            <td><?php echo $r['subject'];?></td>
            <td><?php echo $r['level_name'];?></td>
            <td><?php echo $r['score_min'];?> - <?php echo $r['score_max'];?></td>
            <td><?php echo $r['link_url'];?></td>
            <td><?php echo $r['img_url'];?></td>
            <td><?php echo $r['add_time'];?></td>
            <td>
                <a class="layui-btn layui-btn-xs layui-btn-normal" href="<?php echo site_url('ai/add/'.$r['id'])?>" title="编辑">编辑</a>
                <a class="layui-btn layui-btn-xs layui-btn-primary ajax-get" confirm="1" href="<?php echo site_url('ai/del/'.$r['id'])?>" title="删除">删除</a>
            </td>
        </tr>
        <?php }
        ?>

    </tbody>
</table>
<div class="page">
    <?php echo $page;?>
</div>



