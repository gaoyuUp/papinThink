<?php /*a:2:{s:84:"/Users/liangfei/Public/project/origin/application/admin/view/system/clean_cache.html";i:1558678201;s:75:"/Users/liangfei/Public/project/origin/application/admin/view/base/base.html";i:1558678201;}*/ ?>
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

<form action="" id="form" class="layui-form" method="post">
    <table class="layui-table mag0">
        <colgroup>
            <col width="25%">
            <col width="45%">
            <col>
        </colgroup>
        <thead>
        <tr>
            <th>参数说明</th>
            <th>参数值</th>
        </tr>
        </thead>
        <tr>
            <td>清理范围</td>
            <td>
                <?php 
            $tag_checkbox_name = 'path[]'; 
            $tag_checkbox_list = ['cache'=>'缓存','log'=>'log','temp'=>'视图模板']; 
            $tag_checkbox_value = ''; 
            $tag_checkbox_default = array(); 
            $tmp = "";
            $checkbox = array();
            if ($tag_checkbox_default) {
                foreach ( $tag_checkbox_default as $k => $v){
                    $checkbox[] = '<input type="checkbox" name="'.$tag_checkbox_name.'" value="'.$k.'" title="'.$v.'" '.$tmp.'>';
                }
            }
            foreach ( $tag_checkbox_list as $key => $val){
                $checked = '';
                if ( $tag_checkbox_value == $key ){
                    $checked = 'checked';
                }
                 if(is_array($tag_checkbox_value)){
                    if(in_array($key,$tag_checkbox_value)) $checked = 'checked';
                } else {
                    if ( $tag_checkbox_value == $key )  $checked = 'checked';
                }
                $checkbox[] = '<input type="checkbox" name = "'.$tag_checkbox_name.'" value = "'.$key.'" title = "'.$val.'" '.$checked.' '.$tmp.'>';
            }
            $checkbox_html = implode('', $checkbox);
            echo $checkbox_html;
            unset($checkbox_html,$checkbox);
         ?>
            </td>
        </tr>
        <tr>
            <td>空文件夹</td>
            <td>
                
            <?php 
                $tag_radio_name = 'delete'; 
                $tag_radio_list = ['0'=>'保留','1'=>'删除']; 
                $tag_radio_value = ""; 
                $tag_radio_default = array(); 
                $tmp = "";
            $radio = array();
            if ($tag_radio_default) {
                foreach ( $tag_radio_default as $k => $v){
                    $radio[] = '<input type="radio" name="'.$tag_radio_name.'" value="'.$v.'" title="'.$val.'" '.$tmp.'>';
                }
            }
            foreach ( $tag_radio_list as $key => $val){
                $checked = '';
                if ($tag_radio_value == $key) {
                    $checked = 'checked';
                }
                $radio[] = '<input type="radio" name="'.$tag_radio_name.'" value="'.$key.'" title="'.$val.'" '.$checked.' '.$tmp.'>';
            }
            $radio_html = implode('', $radio);
            echo $radio_html;
            unset($radio_html,$radio);
         ?>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center" style="padding-right: 15%">
                <a class="layui-btn" lay-submit lay-filter="save">立即提交</a>
            </td>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</form>

<script type="text/javascript" src="/layui/layui.js"></script>

<script>
    layui.use(['form', 'jquery'], function () {
        var form = layui.form;
        var $ = layui.jquery;
        //监听提交
        form.on('submit(save)', function (data) {
            var obj = $(this);
            obj.attr("disabled", "disabled").addClass("layui-disabled");
            $.post("<?php echo url('/admin/cleanCache'); ?>", data.field, function (data) {
                var icon = 5;
                if (data.code) {
                    icon = 6;
                }
                layer.msg(data.msg, {icon: icon, time: 1500}, function () {
                    if (data.code) {
                        document.getElementById("form").reset();
                    }
                    obj.removeAttr("disabled").removeClass("layui-disabled");
                });
            });
            return false;
        });
    });
</script>

</body>
</html>