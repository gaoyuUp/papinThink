<?php /*a:2:{s:79:"/Users/liangfei/Public/project/origin/application/admin/view/system/config.html";i:1557902193;s:75:"/Users/liangfei/Public/project/origin/application/admin/view/base/base.html";i:1557902193;}*/ ?>
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
            <td>配置状态</td>
            <td>
                
            <?php 
                $tag_radio_name = 'status'; 
                $tag_radio_list = ['0'=>'禁用','1'=>'开启']; 
                $tag_radio_value = isset($data['status']) ? $data['status']: ""; 
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
            <td>应用调试模式</td>
            <td>
                
            <?php 
                $tag_radio_name = 'debug'; 
                $tag_radio_list = ['0'=>'关闭','1'=>'开启']; 
                $tag_radio_value = isset($data['value']['debug']) ? $data['value']['debug']: ""; 
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
            <td>应用Trace</td>
            <td>
                
            <?php 
                $tag_radio_name = 'trace'; 
                $tag_radio_list = ['0'=>'关闭','1'=>'开启']; 
                $tag_radio_value = isset($data['value']['trace']) ? $data['value']['trace']: ""; 
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
            <td>应用Trace类型</td>
            <td>
                
            <?php 
                $tag_radio_name = 'trace_type'; 
                $tag_radio_list = ['0'=>'Html','1'=>'Console']; 
                $tag_radio_value = isset($data['value']['trace_type']) ? $data['value']['trace_type']: ""; 
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
    layui.use(['form', 'jquery', 'layer'], function () {
        var form = layui.form, $ = layui.jquery, layer = layui.layer;
        //监听提交
        form.on('submit(save)', function (data) {
            var obj = $(this);
            obj.attr("disabled", "disabled").addClass("layui-disabled");
            $.post("<?php echo url('/admin/config'); ?>", data.field, function (data) {
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