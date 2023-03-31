<table class="layui-table text-center layui-form" lay-size="sm">
    <thead>
    <tr>
        <th>城市</th>
        <th>县区</th>
        <th>学段</th>
        <th>学科</th>
        <th>面试形式</th>
        <th>教材版本</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
        <?php
        foreach ($list as $r){
            ?>
        <tr>
            <td><?php echo $r['city'];?></td>
            <td><?php echo $r['area'];?></td>
            <td><?php echo $r['study_section'];?></td>
            <td><?php echo $r['subject'];?></td>
            <td><?php echo $r['audition'];?></td>
            <td><?php echo $r['textbook_version'];?></td>
            <td>
                <a class="layui-btn layui-btn-xs layui-btn-normal ajax-form" href="<?php echo site_url('textbook/edit/'.$r['id'])?>" title="编辑">编辑</a>
                <a class="layui-btn layui-btn-xs layui-btn-normal" href="<?php echo site_url('textbookfeedback/index?city='.$r['city'].'&area='.$r['area'].'&subject='.$r['subject'].'&study_section='.$r['study_section'])?>" title="查看反馈">查看反馈</a>
                <a class="layui-btn layui-btn-xs layui-btn-primary ajax-get" confirm="1" href="<?php echo site_url('textbook/del/'.$r['id'])?>" title="删除">删除</a>

            </td>
        </tr>

        <?php }

        ?>

    </tbody>
</table>
<div class="page">
    <?php echo $page;?>
</div>



