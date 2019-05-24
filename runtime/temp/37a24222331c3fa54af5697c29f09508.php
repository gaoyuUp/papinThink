<?php /*a:2:{s:84:"/Users/liangfei/Public/project/origin/application/admin/view/system/site_config.html";i:1557902193;s:75:"/Users/liangfei/Public/project/origin/application/admin/view/base/base.html";i:1557902193;}*/ ?>
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

<fieldset class="layui-elem-field layui-field-title">
    <legend>系统配置</legend>
</fieldset>
<div class="layui-row layui-tab-content">
    <div class="layui-col-md6">
        <form class="layui-form layui-form-pane" action="">
            <div class="layui-form-item">
                <label class="layui-form-label">网站标题</label>
                <div class="layui-input-block">
                    <input type="text" name="title" required lay-verify="required" placeholder="请输入网站标题"
                           value="<?php echo htmlentities($data['value']['title']); ?>" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">网站名称</label>
                <div class="layui-input-block">
                    <input type="text" name="name" required lay-verify="required" placeholder="请输入网站名称"
                           value="<?php echo htmlentities($data['value']['name']); ?>" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">备案号</label>
                <div class="layui-input-block">
                    <input type="text" name="icp" required lay-verify="required" placeholder="请输入备案号"
                           value="<?php echo htmlentities($data['value']['icp']); ?>" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">版权信息</label>
                <div class="layui-input-block">
                    <input type="text" name="copyright" required lay-verify="required" placeholder="请输入版权信息"
                           value="<?php echo htmlentities($data['value']['copyright']); ?>" value="<?php echo htmlentities($data['value']['name']); ?>" autocomplete="off"
                           class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <a class="layui-btn" lay-submit lay-filter="save">立即提交</a>
                </div>
            </div>
        </form>
    </div>
</div>



<script type="text/javascript" src="/layui/layui.js"></script>

<script>
    layui.use(['form', 'jquery'], function () {
        var form = layui.form;
        var $ = layui.jquery;
        //监听提交
        form.on('submit(save)', function (data) {
            var obj = $(this);
            obj.attr("disabled", "disabled").addClass("layui-disabled");
            $.post("<?php echo url('/admin/siteConfig'); ?>", data.field, function (data) {
                var icon = 5;
                if (data.code) {
                    icon = 6;
                }
                layer.msg(data.msg, {icon: icon, time: 1500}, function () {
                    if (data.code) {
                        location.reload();
                    } else {
                        obj.removeAttr("disabled").removeClass("layui-disabled");
                    }
                });
            });
            return false;
        });
    });
</script>

</body>
</html>