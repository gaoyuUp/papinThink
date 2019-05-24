<?php /*a:2:{s:81:"/Users/liangfei/Public/project/origin/application/admin/view/user/group_list.html";i:1558678201;s:75:"/Users/liangfei/Public/project/origin/application/admin/view/base/base.html";i:1558678201;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo htmlentities($site_config['value']['title']); ?></title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="/layui/css/layui.css" media="all"/>
    <link rel="stylesheet" href="/css/public.css" media="all"/>
    
</head>
<body class="childrenBody">

<form class="layui-form">
    <blockquote class="layui-elem-quote quoteBox">
        <form class="layui-form">
            <div class="layui-inline">
                <div class="layui-input-inline">
                    <input type="text" class="layui-input searchVal" placeholder="请输入账号或昵称"/>
                </div>
                <a class="layui-btn search_btn" data-type="reload">搜索</a>
            </div>
            <div class="layui-inline">
                <a class="layui-btn layui-btn-danger layui-btn-normal addGroup_btn">添加</a>
            </div>
        </form>
    </blockquote>
    <table id="usersList" lay-filter="usersList"></table>
    <!--操作-->
    <script type="text/html" id="usersListBar">
        <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
        <a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="rule">访问控制</a>
    </script>
</form>
<div id="groupName" style="display: none">
    <form id="groupform" method="post" class="layui-form layui-form-pane">
        <div class="layui-form-item">
            <label class="layui-form-label">组名</label>
            <div class="layui-input-block">
                <input type="text" name="title" id="title" class="layui-input" value="" datatype="*" nullmsg="请输入组名！">
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <input type="hidden" id="id" name="id" value="">
                <input type="hidden" name="__token__" id="token" value="<?php echo htmlentities(app('request')->token()); ?>"/>
                <a class="layui-btn" lay-submit lay-filter="save">立即提交</a>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    </form>
</div>
<div id="treeRule" style="display: none;max-height: 300px;">
    <form id="rulForm" class="layui-form layui-form-pane layui-fluid">
        <div class="layui-form-item">
            <div id="tree"></div>
        </div>
        <div class="layui-form-item">
            <input type="hidden" id="groupid" name="groupid" value="">
            <a class="layui-btn center layui-block" lay-submit lay-filter="saveRule">立即提交</a>
        </div>
    </form>
</div>

<script type="text/javascript" src="/layui/layui.js"></script>

<script type="text/javascript" src="/js/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="/jstree/themes/default/style.min.css" />
<script type="text/javascript" src="/jstree/jstree.js"></script>
<script>
    triggerTree();

    function triggerTree() {
        $('#tree').jstree({
            'core': {
                'data': {
                    'method': "GET",
                    'url': "<?php echo url('/admin/ruleList'); ?>",
                },
            },
            'checkbox': {
                "visible": true,
                "keep_selected_style": false,
                'three_state': false

            },
            'plugins': ['checkbox']
        });

    }

    layui.use(['form', 'layer', 'laydate', 'table', 'laytpl'], function () {
        var form = layui.form,
            layer = parent.layer === undefined ? layui.layer : top.layer,
            $ = layui.jquery,
            laydate = layui.laydate,
            laytpl = layui.laytpl,
            table = layui.table;

        //新闻列表
        var tableIns = table.render({
            elem: '#usersList',
            url: "<?php echo url('/admin/groupList'); ?>",
            cellMinWidth: 95,
            page: true,
            limit: 10,
            limits: [5, 10, 15, 20],
            height: "full-125",
            id: 'usersListTable',
            cols: [[
                {field: 'id', title: 'ID', width: 60, align: "center"},
                {field: 'title', title: '组名', width: 350},
                {field: 'rules', title: '规则ID', align: 'center'},
                {
                    field: 'status', title: '是否禁用', align: 'center', width: 100, templet: function (d) {
                        if (d.status == 1) {
                            return '<input type="checkbox" name="status"  checked="checked"  lay-filter="status" value="' + d.id + '" lay-skin="switch" lay-text="否|是" ' + d.status + ' >'
                        } else {
                            return '<input type="checkbox" name="status" lay-filter="status" value="' + d.id + '" lay-skin="switch" lay-text="否|是" ' + d.status + ' >'
                        }
                    }
                },
                {title: '操作', width: 170, templet: '#usersListBar', fixed: "right", align: "center"}
            ]]
        });

        //搜索
        $(".search_btn").on("click", function () {
            table.reload("usersListTable", {
                page: {
                    curr: 1 //重新从第 1 页开始
                },
                where: {
                    key: $(".searchVal").val()  //搜索的关键字
                }
            })
        });
        //添加用户组
        $(".addGroup_btn").on("click", function () {
            add();
        });

        //添加用户组
        function add() {
            $('#title').val('');
            $('#id').val('');
            layui.layer.open({
                type: 1,
                title: '新增用户组',
                area: '360px',
                shade: 0.3,
                content: $('#groupName').show(),
                end: function () {
                    $('#groupName').hide();
                }
            })
        }

        //编辑用户组
        function edit(title, id) {
            $('#title').val(title);
            $('#id').val(id);
            var index = layui.layer.open({
                type: 1,
                title: '编辑用户组',
                area: '360px',
                shade: 0.3,
                content: $('#groupName').show(),
                end: function () {
                    $('#groupName').hide();
                }
            })
        }

        //规则树
        function tree() {
            var index = layui.layer.open({
                type: 1,
                title: '访问控制',
                area: '300px',
                offset: '50px',
                content: $('#treeRule').show(),
                end: function () {
                    $('#treeRule').hide();
                }
            })
        }

        //列表操作
        table.on('tool(usersList)', function (obj) {
            var layEvent = obj.event,
                data = obj.data;
            if (layEvent === 'edit') { //编辑
                edit(data.title, data.id);
            } else if (layEvent === 'rule') { //访问控制
                var rules = String(data.rules).split(',');
                var groupid = data.id;
                $('#tree').jstree("uncheck_all");  //清除所有选中
                $('#tree').jstree('select_node', [rules], true); //选中指定节点
                $('#tree').jstree().close_all(); //关闭所有节点
                $('#groupid').val(groupid);
                tree();
            }
        });
        //修改用户组状态
        form.on('switch(status)', function (data) {
            var index = layer.msg('修改中，请稍后', {icon: 16, time: false, shade: 0.8});
            setTimeout(function () {
                layer.close(index);
                var status = data.elem.checked ? 1 : 0;
                id = data.elem.value;
                $.post("<?php echo url('/admin/disableGroup'); ?>", {id: id, status: status}, function (data) {
                    var icon = 5;
                    if (data.code) {
                        icon = 6;
                    }
                    layer.msg(data.msg, {icon: icon, time: 1500});
                });
            }, 500);
        });
        //新增修改用户组
        form.on('submit(save)', function (data) {
            var index = layer.msg('修改中，请稍后', {icon: 16, time: false, shade: 0.8});
            setTimeout(function () {
                layer.close(index);
                var data = $('#groupform').serialize();
                $.post("<?php echo url('/admin/editGroup'); ?>", data, function (data) {
                    var icon = 5;
                    if (data.code) {
                        icon = 6;
                    }
                    layer.msg(data.msg, {icon: icon, time: 1500}, function () {
                        if (data.code) {
                            tableIns.reload();
                        }
                        layui.layer.closeAll();
                    });
                })
            }, 500);
        });
        //保存规则
        form.on('submit(saveRule)', function (data) {
            var index = layer.msg('修改中，请稍后', {icon: 16, time: false, shade: 0.8});
            setTimeout(function () {
                layer.close(index);
                var rules = $("#tree").jstree("get_checked");
                var id = $('#groupid').val();
                $.post("<?php echo url('/admin/editRule'); ?>", {rules: rules, id: id}, function (data) {
                    var icon = 5;
                    if (data.code) {
                        icon = 6;
                    }
                    layer.msg(data.msg, {icon: icon, time: 1500}, function () {
                        if (data.code) {
                            tableIns.reload();
                            layui.layer.closeAll();
                        }
                    });
                });
            }, 500);
        });
    })
</script>

</body>
</html>