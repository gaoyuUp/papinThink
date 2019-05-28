<?php /*a:2:{s:82:"/Users/liangfei/Public/project/origin/application/admin/view/system/login_log.html";i:1558678201;s:75:"/Users/liangfei/Public/project/origin/application/admin/view/base/base.html";i:1558678201;}*/ ?>
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
                <div class="layui-input-inline">
                    <input type="text" class="layui-input starttime" placeholder="开始时间"/>
                </div>
                <div class="layui-input-inline">
                    <input type="text" class="layui-input endtime" placeholder="结束时间"/>
                </div>
                <a class="layui-btn search_btn" data-type="reload">搜索</a>
            </div>
        </form>
    </blockquote>
    <table id="usersList" lay-filter="usersList"></table>
    <!--操作-->
    <script type="text/html" id="usersListBar">
        <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
        <a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="del">删除</a>
    </script>
</form>

<script type="text/javascript" src="/layui/layui.js"></script>

<script>
    //执行一个laydate实例
    layui.use('laydate', function () {
        var laydate = layui.laydate;


    });
    layui.use(['form', 'layer', 'laydate', 'table', 'laytpl'], function () {
        var form = layui.form,
            layer = parent.layer === undefined ? layui.layer : top.layer,
            $ = layui.jquery,
            laydate = layui.laydate,
            laytpl = layui.laytpl,
            table = layui.table;
        //执行一个laydate实例
        laydate.render({
            elem: '.starttime', //指定元素
            type: 'datetime',
        });
        laydate.render({
            elem: '.endtime', //指定元素
            type: 'datetime',
        });

        //新闻列表
        var tableIns = table.render({
            elem: '#usersList',
            url: "<?php echo url('/admin/log'); ?>",
            cellMinWidth: 95,
            page: true,
            limit: 10,
            limits: [5, 10, 15, 20],
            height: "full-125",
            id: 'usersListTable',
            cols: [[
                {field: 'uid', title: 'uid', width: 60, align: "center"},
                {field: 'user', title: '账号', width: 350},
                {field: 'name', title: '昵称', align: 'center'},
                {field: 'last_login_ip', title: '最后登录IP', align: 'center'},
                {field: 'create_time', title: '登陆时间', align: 'center'}
            ]]
        });

        //搜索【此功能需要后台配合，所以暂时没有动态效果演示】
        $(".search_btn").on("click", function () {
            table.reload("usersListTable", {
                page: {
                    curr: 1 //重新从第 1 页开始
                },
                where: {
                    key: $(".searchVal").val(),  //搜索的关键字
                    starttime: $(".starttime").val(),  //搜索的关键字
                    endtime: $(".endtime").val()  //搜索的关键字
                }
            })
        });

    })
</script>

</body>
</html>