<?php /*a:2:{s:80:"/Users/liangfei/Public/project/origin/application/admin/view/user/user_info.html";i:1559545393;s:75:"/Users/liangfei/Public/project/origin/application/admin/view/base/base.html";i:1558678201;}*/ ?>
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

<form class="layui-form layui-row">
    <div class="layui-col-md3 layui-col-xs12 user_right">
        <div class="layui-upload-list">
            <img class="layui-upload-img layui-circle userFaceBtn userAvatar" id="userFace" src="<?php echo htmlentities($info['head']); ?>">
            <input type="hidden" value="<?php echo htmlentities($info['head']); ?>" id="head">
        </div>
        <button type="button" class="layui-btn layui-btn-primary userFaceBtn"><i class="layui-icon">&#xe67c;</i> 我要换一个头像</button>
    </div>
    <div class="layui-col-md6 layui-col-xs12">
        <div class="layui-form-item">
            <label class="layui-form-label">用户名</label>
            <div class="layui-input-block">
                <input type="text" value="<?php echo htmlentities($info['user']); ?>" disabled class="layui-input layui-disabled">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">用户组</label>
            <div class="layui-input-block">
                <input type="text" value="<?php echo htmlentities($info['group_titles']); ?>" disabled class="layui-input layui-disabled">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">真实姓名</label>
            <div class="layui-input-block">
                <input type="text" value="<?php echo htmlentities($info['name']); ?>" id="name" placeholder="请输入真实姓名" lay-verify="required" class="layui-input realName">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">登录次数</label>
            <div class="layui-input-block">
                <input type="text" value="<?php echo htmlentities($info['login_count']); ?>" disabled class="layui-input layui-disabled">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">最后登录ip</label>
            <div class="layui-input-block">
                <input type="text" value="<?php echo htmlentities($info['last_login_ip']); ?>" disabled class="layui-input layui-disabled">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">登录时间</label>
            <div class="layui-input-block">
                <input type="text" value="<?php echo htmlentities($info['last_login_time']); ?>" disabled class="layui-input layui-disabled">
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" lay-submit="" lay-filter="changeUser">立即提交</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript" src="/layui/layui.js"></script>

<script>
    var form, $;
    layui.use(['form','layer','upload'],function(){
        form = layui.form;
        $ = layui.jquery;
        var layer = parent.layer === undefined ? layui.layer : top.layer, upload = layui.upload;

        //上传头像
        upload.render({
            elem: '.userFaceBtn',
            url: "<?php echo url('/admin/upload'); ?>",
            accept:'images',
            acceptMime:'image/*',
            done: function(data){
                var icon=5;
                if(!data.code){
                    icon=6;
                    $('#userFace').attr('src',data.data.src);
                    $('#head').val(data.data.src);
                }
                layer.msg(data.msg, {icon:icon,time: 1500});
            },
            error: function(){
                layer.msg('上传失败', {icon:icon,time: 1500});
            }
        });

        //添加验证规则

        //提交个人资料
        form.on("submit(changeUser)",function(data){
            var name = $('#name').val();
            var head = $('#head').val();
            $.post("<?php echo url('/admin/userInfo'); ?>",{name:name,head:head},function (data) {
                layer.msg(data.msg, {time: 1500}, function () {
                    if (data.code) {
                        setTimeout(function () {
                            //刷新父页面
                            parent.location.reload();
                        }, 500);
                    }
                });
            },'json');
            return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
        })
    })
</script>

</body>
</html>