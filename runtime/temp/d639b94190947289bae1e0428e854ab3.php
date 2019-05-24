<?php /*a:1:{s:77:"/Users/liangfei/Public/project/origin/application/admin/view/index/index.html";i:1558678201;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo htmlentities($site_config['value']['title']); ?></title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Access-Control-Allow-Origin" content="*">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    <link rel="icon" href="/favicon.ico">
    <link rel="stylesheet" href="/layui/css/layui.css" media="all"/>
    <link rel="stylesheet" href="/css/index.css" media="all"/>
</head>
<body class="main_body">
<div class="layui-layout layui-layout-admin">
    <!-- 顶部 -->
    <div class="layui-header header">
        <div class="layui-main mag0">
            <a href="#" class="logo"><?php echo htmlentities($site_config['value']['name']); ?></a>
            <!-- 显示/隐藏菜单 -->
            <a href="javascript:;" class="seraph hideMenu icon-caidan"></a>
            <!-- 顶部右侧菜单 -->
            <ul class="layui-nav top_menu">
                <li class="layui-nav-item" pc>
                    <a href="javascript:;" class="clearCache"><i class="layui-icon"
                                                                 data-icon="&#xe640;">&#xe640;</i><cite>清除浏览器缓存</cite></a>
                </li>
                <li class="layui-nav-item lockcms" pc>
                    <a href="javascript:;"><i class="seraph icon-lock"></i><cite>锁屏</cite></a>
                </li>
                <li class="layui-nav-item" id="userInfo">
                    <a href="javascript:;"><img src="/images/face.jpg" class="layui-nav-img userAvatar" width="35"
                                                height="35"><cite
                            class="adminName"><?php echo htmlentities(app('session')->get('user_auth.name')); ?></cite></a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:;" data-url="<?php echo url('/admin/editPassword'); ?>"><i
                                class="seraph icon-xiugai" data-icon="icon-xiugai"></i><cite>修改密码</cite></a></dd>
                        <dd pc><a href="javascript:;" class="changeSkin"><i
                                class="layui-icon">&#xe61b;</i><cite>更换皮肤</cite></a></dd>
                        <dd><a onclick="loginout()" class="signOut"><i
                                class="seraph icon-tuichu"></i><cite>退出</cite></a></dd>
                    </dl>
                </li>
            </ul>
        </div>
    </div>
    <!-- 左侧导航 -->
    <div class="layui-side layui-bg-black">
        <div class="user-photo">
            <a class="img" title="我的头像"><img src="/images/face.jpg" class="userAvatar"></a>
            <p>你好！<span class="userName"><?php echo htmlentities(app('session')->get('user_auth.name')); ?></span>, 欢迎登录</p>
        </div>

        <div id="navBar" class="navBar layui-side-scroll">
            <ul class="layui-nav layui-nav-tree">
                <?php if(is_array($menuList) || $menuList instanceof \think\Collection || $menuList instanceof \think\Paginator): $i = 0; $__LIST__ = $menuList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li class="layui-nav-item">
                    <a href="javascript:;"><i class="<?php echo htmlentities($vo['icon']); ?>" data-icon="<?php echo htmlentities($vo['icon']); ?>"></i><cite><?php echo htmlentities($vo['title']); ?></cite></a>
                    <?php if((isset($vo['child']))): ?>
                    <dl class="layui-nav-child">
                        <?php if(is_array($vo['child']) || $vo['child'] instanceof \think\Collection || $vo['child'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$child): $mod = ($i % 2 );++$i;?>
                        <dd class=""><a data-url="<?php echo url('/'.$child['name']); ?>"><cite><?php echo htmlentities($child['title']); ?></cite></a></dd>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </dl>
                    <?php endif; ?>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
    <!-- 右侧内容 -->
    <div class="layui-body layui-form">
        <div class="layui-tab mag0" lay-filter="bodyTab" id="top_tabs_box">
            <ul class="layui-tab-title top_tab" id="top_tabs">
                <li class="layui-this" lay-id=""><i class="layui-icon">&#xe68e;</i> <cite>后台首页</cite></li>
            </ul>
            <ul class="layui-nav closeBox">
                <li class="layui-nav-item">
                    <a href="javascript:;"><i class="layui-icon caozuo">&#xe643;</i> 页面操作</a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:;" class="refresh refreshThis"><i class="layui-icon">&#x1002;</i>
                            刷新当前</a></dd>
                        <dd><a href="javascript:;" class="closePageOther"><i class="seraph icon-prohibit"></i> 关闭其他</a>
                        </dd>
                        <dd><a href="javascript:;" class="closePageAll"><i class="seraph icon-guanbi"></i> 关闭全部</a></dd>
                    </dl>
                </li>
            </ul>
            <div class="layui-tab-content clildFrame">
                <div class="layui-tab-item layui-show">
                    <iframe src="<?php echo url('/admin/home'); ?>"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- 底部 -->
    <div class="layui-footer footer">
        <p><span><?php echo htmlentities($site_config['value']['icp']); ?>  <?php echo htmlentities($site_config['value']['copyright']); ?></span>  <a onclick="donation()" class="layui-btn layui-btn-danger layui-btn-sm">捐赠作者</a></p>
    </div>
</div>

<!-- 移动导航 -->
<div class="site-tree-mobile"><i class="layui-icon">&#xe602;</i></div>
<div class="site-mobile-shade"></div>

<script type="text/javascript" src="/layui/layui.js"></script>
<script type="text/javascript" src="/js/index.js"></script>
<script type="text/javascript" src="/js/cache.js"></script>
<script>
    layui.use(['layer'], function () {
        $ = layui.jquery;
        $(window).resize(function () {
            $(".navBar").height($(window).height() - 210);
        })

        //锁屏
        function lockPage() {
            layer.open({
                title: false,
                type: 1,
                content: '<div class="admin-header-lock" id="lock-box">' +
                    '<div class="admin-header-lock-img"><img src="/images/face.jpg" class="userAvatar"/></div>' +
                    '<div class="admin-header-lock-name" id="lockUserName"><?php echo htmlentities(app('session')->get('user_auth.name')); ?></div>' +
                    '<div class="input_btn">' +
                    '<input type="password" class="admin-header-lock-input layui-input" autocomplete="off" placeholder="请输入密码解锁.." name="lockPwd" id="lockPwd" />' +
                    '<button class="layui-btn" id="unlock">解锁</button>' +
                    '</div>' +
                    '</div>',
                closeBtn: 0,
                shade: 0.9,
                success: function () {
                    //判断是否设置过头像，如果设置过则修改顶部、左侧和个人资料中的头像，否则使用默认头像
                    if (window.sessionStorage.getItem('userFace') && $(".userAvatar").length > 0) {
                        $(".userAvatar").attr("src", $(".userAvatar").attr("src").split("images/")[0] + "images/" + window.sessionStorage.getItem('userFace').split("images/")[1]);
                    }
                }
            })
            $(".admin-header-lock-input").focus();
        }

        $(".lockcms").on("click", function () {
            window.sessionStorage.setItem("lockcms", true);
            lockPage();
        })
        // 判断是否显示锁屏
        if (window.sessionStorage.getItem("lockcms") == "true") {
            lockPage();
        }
        // 解锁
        $("body").on("click", "#unlock", function () {
            var password = $(this).siblings(".admin-header-lock-input").val();
            if (password == '') {
                layer.msg("请输入解锁密码！");
                $(this).siblings(".admin-header-lock-input").focus();
            } else {
                $.post("<?php echo url('/admin/unlock'); ?>", {password: password}, function (data) {
                    if (data.code) {
                        window.sessionStorage.setItem("lockcms", false);
                        $(this).siblings(".admin-header-lock-input").val('');
                        layer.closeAll("page");
                    } else {
                        $(this).siblings(".admin-header-lock-input").val('').focus();
                        layer.msg(data.msg, {time: 1500}, function () {
                            if (data.url) {
                                window.sessionStorage.setItem("lockcms", false);
                                location.href = data.url;
                            }
                        });
                    }
                });
            }
        });
        $(document).on('keydown', function (event) {
            var event = event || window.event;
            if (event.keyCode == 13) {
                $("#unlock").click();
            }
        });
    })

    // 捐赠弹窗
    function donation(){
        layer.tab({
            area : ['340px', '385px'],
            tab : [{
                title : "微信",
                content : "<div style='padding:5px;overflow:hidden;background:#d2d0d0;'><img width='330px' height='330px' src='/images/wechat.png'></div>"
            },{
                title : "支付宝",
                content : "<div style='padding:5px;overflow:hidden;background:#d2d0d0;'><img width='330px' height='330px' src='/images/alipay.png'></div>"
            }]
        })
    }
    // 退出
    function loginout() {
        $.post("<?php echo url('/admin/logout'); ?>", '', function (data) {
            layer.msg(data.msg, {time: 1500}, function () {
                location.href = data.url;
            });
        }, 'json')
    }
</script>
</body>
</html>