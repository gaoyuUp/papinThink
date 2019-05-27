<?php /*a:2:{s:76:"/Users/liangfei/Public/project/origin/application/admin/view/index/home.html";i:1558936823;s:75:"/Users/liangfei/Public/project/origin/application/admin/view/base/base.html";i:1558678201;}*/ ?>
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


<div class="layui-row layui-col-space10 panel_box">
    <div class="panel layui-col-xs12 layui-col-sm6 layui-col-md4 layui-col-lg2">
        <a href="https://github.com/gaoyuUp/papinThink" data-url="" target="_blank">
            <div class="panel_icon layui-bg-black">
                <i class="layui-anim seraph icon-github"></i>
            </div>
            <div class="panel_word">
                <span>Github</span>
                <cite>模版下载链接</cite>
            </div>
        </a>
    </div>
    <div class="panel layui-col-xs12 layui-col-sm6 layui-col-md4 layui-col-lg2">
        <a href="https://gitee.com/gaoyuUp/papinThink"  target="_blank">
            <div class="panel_icon layui-bg-red">
                <i class="layui-anim seraph icon-oschina"></i>
            </div>
            <div class="panel_word">
                <span>码云</span>
                <cite>模版下载链接</cite>
            </div>
        </a>
    </div>
    <div class="panel layui-col-xs12 layui-col-sm6 layui-col-md4 layui-col-lg2">
        <a  onclick="donation()">
            <div class="panel_icon layui-bg-green">
                <i class="layui-anim seraph icon-good"></i>
            </div>
            <div class="panel_word">
                <span>捐赠作者</span>
                <cite>GaoYu</cite>
            </div>
        </a>
    </div>
</div>
<div class="layui-row layui-col-space10">
    <div class="layui-col-lg6 layui-col-md12">
        <blockquote class="layui-elem-quote title">系统基本参数</blockquote>
        <table class="layui-table magt0">
            <colgroup>
                <col width="150">
                <col>
            </colgroup>
            <tbody>
            <tr>
                <td>当前版本</td>
                <td class="version">1.1.1</td>
            </tr>
            <tr>
                <td>开发作者</td>
                <td class="author">GaoYu</td>
            </tr>
            <tr>
                <td>服务器环境</td>
                <td class="server"><?php echo htmlentities(PHP_OS); ?></td>
            </tr>
            <tr>
                <td>运行环境</td>
                <td class=""><?php echo htmlentities(app('request')->server('SERVER_SOFTWARE')); ?></td>
            </tr>
            <tr>
                <td>ThinkPHP版本</td>
                <td class="server"><?php echo htmlentities(app()->version()); ?></td>
            </tr>
            <tr>
                <td>数据库版本</td>
                <td class="dataBase"><?php echo db()->query('select version() as version')[0]['version']; ?></td>
            </tr>
            <tr>
                <td>最大上传限制</td>
                <td class="maxUpload"><?php echo ini_get('upload_max_filesize'); ?></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<blockquote class="layui-elem-quote main_btn">
    <p>本系统使用ThinkPHP5.1实现，前端使用layui。</p>
    <p class="layui-red">郑重提示：本模版作为学习交流免费使用【不管以何种形式获取的源码，请勿进行出售或者上传到任何素材网站，否则将追究相应的责任】</p>
    <p>系统功能包括：用户管理、 配置管理、 菜单管理、 缓存管理、 权限管理、（API接口校验类）</p>
    <p class="layui-blue">PS：源码包不包括ThinkPHP核心包，请使用composer install || composer update安装使用或者手动下载核心包</p>
</blockquote>

<script type="text/javascript" src="/layui/layui.js"></script>

<script type="text/javascript" src="/layui/layui.js"></script>
<script>
    var $,tab,layer;
    layui.use(['layer'],function(){
        layer = parent.layer === undefined ? layui.layer : top.layer;
    })
    //捐赠弹窗
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
</script>

</body>
</html>