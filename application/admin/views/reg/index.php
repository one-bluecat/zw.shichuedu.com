<div class="main layui-body">
    <div class="main-header">
        <div class="layui-breadcrumb">
            <a href="{:url('/')}"><i class="fa fa-dashboard"></i> 控制台 / 注册用户</a>
        </div>
    </div>
    <div class="main-content">
        <div class="layui-fluid">
            <div class="layui-card">
                <div class="layui-card-header">注册用户</div>
                <div class="layui-card-body">
                    <div class="data-list" data-url="<?php echo site_url('reg/lists'); ?>">
                        <form class="layui-form inline-form">
                            <div class="pull-left">
                                <div class="layui-inline">
                                    <select name="status" lay-filter="data-list">
                                        <option value="-1">审核状态</option>
                                        <option value="1">已审核</option>
                                        <option value="2">未审核</option>
                                    </select>
                                </div>
                                <div class="layui-inline">
                                    <input class="layui-input" name="post_code" placeholder="岗位代码">
                                </div>
                                <div class="layui-inline">
                                    <input class="layui-input" name="name" placeholder="姓名">
                                </div>
                                <div class="layui-inline">
                                    <input class="layui-input" name="phone" placeholder="手机号">
                                </div>
                                <div class="layui-inline">
                                    &nbsp;&nbsp;注册时间&nbsp;&nbsp;
                                </div>
                                <div class="layui-inline">
                                    <input class="layui-input laydate-range" name="time" placeholder="时间区间">
                                </div>
                                <div class="layui-inline">
                                    <button class="layui-btn layui-btn-sm layui-btn-normal search"><i class="layui-icon">&#xe615;</i></button>
                                </div>
                            </div>
                        </form>

                        <div class="layui-form inline-form">
                            <div class="pull-left">
                                <div class="layui-btn-group">
                                    <button class="layui-btn" onclick="batch_audit();">批量审核</button>
                                    <button class="layui-btn" onclick="export_excel(0);">导出</button>
                                    <button class="layui-btn" onclick="export_excel(1);">全部导出</button>
                                    <button class="layui-btn" onclick="add_reg_num();">修改提交人数</button>
                                </div>
                            </div>
                        </div>

                        <div class="data">
                            <p><i class="fa fa-spinner fa-spin"></i> 加载中...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-footer">
            <!-- 底部固定区域 -->
            Copyright © 2018-2018 后台管理系统. All rights reserved.
        </div>
    </div>
</div>
<script>
    function batch_audit() {
        var ids = $('[name="ids[]"]');
        var id_string = "";
        for(var i=0;i<ids.length;i++){
            if(ids[i].checked){
                id_string +=id_string?','+$(ids[i]).val():$(ids[i]).val();
            }
        }
        if(!id_string){
            layer.msg('请选择审核记录！');
            return;
        }
        var html = '<div class="layui-card-body layui-form"><div class="layui-form-item">'+
                            '<label class="layui-form-label">审核状态</label>'+
                            '<div class="layui-input-block">'+
                            '<input type="radio" name="status" value="0" title="未审核" checked>'+
                            '<input type="radio" name="status" value="1" title="已审核">'+
                            '</div>'+
                            ' </div>'+
                        '</div>';
        form = layui.form;
        parent.layer.open({
            type: 1,
            title: "批量审核",
            content: html,
            scrollbar: false,
            maxWidth: '80%',
            btn: ['确定', '取消'],
            yes: function(index, layero) {
                $.post('/admin.php/reg/batch_audit', {
                    ids:id_string,
                    status:$('[name="status"]:checked').val(),
                }, function(res) {
                    if (res.code == 1) {
                        layer.msg(res.msg, {
                            time: 1000,
                            icon: 6
                        }, function() {
                            layer.close(index);
                            window.location.reload();
                        });
                    } else {
                        var str = res.msg || '服务器异常';
                        layer.msg(str, {
                            time: 2000,
                            icon: 5
                        });
                    }

                }, 'json');
            },
            btn2: function(index) {
                layer.close(index);
            },
            success: function() {
                form.render();
            }
        }, 'html');
    }


    /**
     * 导出excel 报表
     */
    function export_excel(is_all_export){
       var self =  $('.data-list .layui-input');
       var status = $('[name="status"]').val();
       var url = '/admin.php/reg/lists?'+self.serialize()+'&is_export=1&is_all_export='+is_all_export+'&status='+status;
       console.log(url);
       window.location.href=url;
    }

    function add_reg_num() {
        var html = '<div class="layui-card-body layui-form"><div class="layui-form-item">'+
            '<label class="layui-form-label">在已提交人数基础上增加</label>'+
            '<div class="layui-input-inline">'+
            '<input type="text"  name="add_reg_num" value="" class="layui-input">'+
            '</div>'+
            ' </div>'+
            '</div>';
        form = layui.form;
        parent.layer.open({
            type: 1,
            title: "批量审核",
            content: html,
            scrollbar: false,
            maxWidth: '80%',
            btn: ['确定', '取消'],
            yes: function(index, layero) {
                $.post('/admin.php/reg/add_reg_num', {
                    add_reg_num:$('[name="add_reg_num"]').val(),
                }, function(res) {
                    if (res.code == 1) {
                        layer.msg(res.msg, {
                            time: 1000,
                            icon: 6
                        }, function() {
                            layer.close(index);
                            window.location.reload();
                        });
                    } else {
                        var str = res.msg || '服务器异常';
                        layer.msg(str, {
                            time: 2000,
                            icon: 5
                        });
                    }

                }, 'json');
            },
            btn2: function(index) {
                layer.close(index);
            },
            success: function() {
                form.render();
            }
        }, 'html');
    }
</script>

