<?php /*a:2:{s:75:"/Users/liangfei/Public/project/origin/application/admin/view/user/edit.html";i:1558678201;s:75:"/Users/liangfei/Public/project/origin/application/admin/view/base/base.html";i:1558678201;}*/ ?>
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

<form id="form" method="post" class="layui-form layui-form-pane" action="<?php echo url('/admin/edit'); ?>">
    <div class="layui-form-item">
        <label class="layui-form-label">账号</label>
        <div class="layui-input-block">
            <input type="text" name="user" placeholder="请输入" autocomplete="off" class="layui-input"
                   value="<?php echo isset($list['user'])?$list['user']:''; ?>" <?php if(isset($list['uid'])): ?>readonly <?php else: ?>
            lay-verify="required|username"<?php endif; ?>>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">昵称</label>
        <div class="layui-input-block">
            <input type="text" name="name" placeholder="请输入" autocomplete="off" class="layui-input"
                   value="<?php echo isset($list['name'])?$list['name']:''; ?>" lay-verify="required">
        </div>
    </div>
    <?php if(!isset($list['uid'])): ?>
    <div class="layui-form-item">
        <label class="layui-form-label">密码</label>
        <div class="layui-input-block">
            <input type="password" name="password" placeholder="请输入" autocomplete="off" class="layui-input" value=""
                   lay-verify="required|password">
        </div>
    </div>
    <?php endif; ?>

    <div class="layui-form-item">
        <label class="layui-form-label">所属组</label>
        <div class="layui-input-block">
            
        <?php 
            $tag_select_name  = 'group_id'; 
            $tag_select_list  = $grouplist; 
            $tag_select_value = isset($list['group_id'] ) ? $list['group_id'] : "";
            $tag_select_default = [''=>'请选择'];
            $tmp   ="";
            $tag_select_option = ['xm-select'=>'selectId','id'=>'group_id','lay-verify'=>'required'] ;
            foreach ( $tag_select_option as $k =>$v){
              $tmp .= " ".$k.'="'.$v.'"';
            }
            $select_tem_html = '<select name = "'.$tag_select_name.'" '.$tmp.'>';
            $select_tem_options = array();
            if ($tag_select_default) {
                foreach ( $tag_select_default as $k => $v){
                    $select_tem_options[] = '<option value="'.$k.'">'.$v.'</option>';
                }
            }
            foreach ( $tag_select_list as $key => $val){
                $selected = '';
                if(is_array($tag_select_value)){
                    if(in_array($key,$tag_select_value)) $selected = 'selected';
                } else {
                    if ( $tag_select_value == $key )  $selected = 'selected';
                }
              
                $select_tem_options[] = '<option value="'.$key.'" '.$selected.'>'.$val.'</option>';
            }
            $select_tem_html = $select_tem_html.implode('', $select_tem_options).'</select>';
            echo $select_tem_html;
            unset($select_tem_options);
            unset($select_tem_html);
     ?>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">是否禁用</label>
        <div class="layui-input-block">
            
            <?php 
                $tag_radio_name = 'status'; 
                $tag_radio_list = ['0'=>'是','1'=>'否']; 
                $tag_radio_value = isset($list['status']) ? $list['status']: ""; 
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

        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <input type="hidden" name="uid" value="<?php echo isset($list['uid'])?$list['uid']:''; ?>">
            <input type="hidden" name="__token__" id="token" value="<?php echo htmlentities(app('request')->token()); ?>"/>
            <button class="layui-btn" lay-submit lay-filter="*">立即提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </div>
</form>

<script type="text/javascript" src="/layui/layui.js"></script>

<link rel="stylesheet" type="text/css" href="/form-select/formSelects-v4.css" />
<script>
    layui.config({
        base: '/form-select/' //此处路径请自行处理, 可以使用绝对路径
    }).extend({
        formSelects: 'formSelects-v4'
    });
    layui.use(['form', 'jquery', 'formSelects'], function () {
        var formSelects = layui.formSelects, form = layui.form, $ = layui.jquery;
        formSelects.on('selectId', function (id, vals, val, isAdd, isDisabled) {
            $('#group_id').val(layui.formSelects.value(id, 'val'));
        }, true);
        //表单验证
        form.verify({
            username: function (value, item) { //value：表单的值、item：表单的DOM对象
                var msg;
                $.ajax({
                    async: false,
                    url: "<?php echo url('/admin/check'); ?>",
                    data: {username: value},
                    success: function (data) {
                        if (data.code) {
                            msg = data.msg;
                        }
                    }
                });
                return msg;
            },
            password: [
                /^[\w\W]{6,25}$/
                , '密码长度必须6到25位'
            ]
        });
        //表单提交
        form.on("submit(*)", function (data) {
            var obj = $(this);
            obj.attr("disabled", "disabled").addClass("layui-disabled");
            $.post(data.form.action, data.field, function (data) {
                var icon = 5;
                if (data.code) {
                    icon = 6;
                }
                layer.msg(data.msg, {icon: icon, time: 1500}, function () {   //提示的插件，可以使用alert代替
                    if (data.code) {
                        setTimeout(function () {
                            //刷新父页面
                            parent.location.reload();
                        }, 500);
                    } else {
                        $('#token').val(data.data.token);
                        obj.removeAttr("disabled").removeClass("layui-disabled");
                    }
                });
            }, 'json');
            return false;
        });
    });


</script>

</body>
</html>