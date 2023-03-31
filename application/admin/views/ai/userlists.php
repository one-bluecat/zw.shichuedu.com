<table class="layui-table text-center layui-form" lay-size="sm">
    <thead>
    <tr>
        <th>姓名</th>
        <th>手机号码</th>
        <th>考区</th>
        <th>学段</th>
        <th>学科</th>
        <th>教综成绩</th>
        <th>专科课成绩</th>
        <th>添加时间</th>
    </tr>
    </thead>
    <tbody>
        <?php
        foreach ($list as $r){
            ?>
        <tr>
            <td><?php echo $r['username'];?></td>
            <td><?php echo $r['phone'];?></td>
            <td><?php echo $r['area'];?></td>
            <td><?php echo $r['study_section'];?></td>
            <td><?php echo $r['subject'];?></td>
            <td><?php echo $r['jzfs'];?></td>
            <td><?php echo $r['zykfs'];?></td>
            <td><?php echo $r['add_time'];?></td>
        </tr>
        <?php }
        ?>

    </tbody>
</table>
<div class="page">
    <?php echo $page;?>
</div>



