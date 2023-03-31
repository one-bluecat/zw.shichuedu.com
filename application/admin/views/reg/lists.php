<table class="layui-table text-center layui-form" lay-size="sm">
    <thead>
    <tr>
        <th><input type="checkbox" lay-skin="primary" lay-filter="allChoose"></th>
<!--        <th style="width: 64px">id</th>-->
<!--        <th>城市</th>-->
        <th>招聘岗位</th>
        <th>姓名</th>
        <th>手机号</th>
        <th>笔试成绩</th>
        <th>行政辖区</th>
        <th>招聘单位</th>
        <th>学段</th>
        <th>学科</th>
        <th>审核状态</th>
        <th>注册时间</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
        <?php

        foreach ($list as $r){
            ?>
        <tr>
            <td><input type="checkbox" name="ids[]" class="layui-checkbox checkbox-ids" value="<?php echo $r['id'];?>" lay-skin="primary"></td>
<!--            <td>--><?php //echo $r['id'];?><!--</td>-->
<!--            <td>--><?php //echo $r['city'];?><!--</td>-->
            <td><?php echo $r['post_name'];?>  -  [ <?php echo $r['post_code'];?> ]</td>
            <td><?php echo $r['name'];?></td>
            <td><?php echo $r['phone'];?></td>
            <td><?php echo $r['score'];?></td>
            <td><?php echo $r['area'];?></td>
            <td><?php echo $r['company'];?></td>
            <td><?php echo $r['study_section'];?></td>
            <td><?php echo $r['subject'];?></td>
            <td>
                <div class="text-center">
                    <a href="<?php echo site_url('reg/batch_audit').'?ids='.$r['id'].'&status='.abs(1-$r['status']);?>" class="ajax-get" msg="0"><span class="<?php if($r['status']){echo 'text-yellow';}else{echo 'text-muted';}?>"><i class="fa fa-circle"></i> <?php if($r['status']){echo '已审核';}else{echo '未审核';}?></span></a>
                </div>
            </td>
            <td><?php echo $r['reg_time'];?></td>
            <td>
                <a class="layui-btn layui-btn-xs layui-btn-normal ajax-form" href="<?php echo site_url('reg/edit/'.$r['id'])?>" title="编辑用户">编辑</a>
                <a class="layui-btn layui-btn-xs layui-btn-primary ajax-get" confirm="1" href="<?php echo site_url('reg/del/'.$r['id'])?>" title="删除用户">删除</a>
            </td>
        </tr>

        <?php }

        ?>

    </tbody>
</table>
<div class="page">
    <?php echo $page;?>
</div>



