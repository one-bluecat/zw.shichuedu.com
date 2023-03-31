<table class="layui-table text-center layui-form" lay-size="sm">
    <thead>
    <tr>
        <th>城市</th>
        <th>县区</th>
        <th>面试形式</th>
    </tr>
    </thead>
    <tbody>
        <?php
        foreach ($list as $r){
            ?>
        <tr>
            <td><?php echo $r['city'];?></td>
            <td><?php echo $r['area'];?></td>
            <td><?php echo $r['audition_content'];?></td>
        </tr>
        <?php }
        ?>

    </tbody>
</table>
<div class="page">
    <?php echo $page;?>
</div>



