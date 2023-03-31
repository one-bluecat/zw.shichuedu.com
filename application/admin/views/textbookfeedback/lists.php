<table class="layui-table text-center layui-form" lay-size="sm">
    <thead>
    <tr>
        <th>城市</th>
        <th>县区</th>
        <th>学段</th>
        <th>学科</th>
        <th>教材版本</th>
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
            <td><?php echo $r['textbook_version'];?></td>
        </tr>

        <?php }

        ?>

    </tbody>
</table>
<div class="page">
    <?php echo $page;?>
</div>



