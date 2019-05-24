<?php /*a:2:{s:82:"/Users/liangfei/Public/project/origin/application/admin/view/system/edit_menu.html";i:1558678201;s:75:"/Users/liangfei/Public/project/origin/application/admin/view/base/base.html";i:1558678201;}*/ ?>
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

<form id="form" method="post" class="layui-form layui-form-pane" action="<?php echo url('/admin/editMenu'); ?>">
    <div class="layui-form-item">
        <label class="layui-form-label">所属层级</label>
        <div class="layui-input-block">
            
        <?php 
            $tag_select_name  = 'pid'; 
            $tag_select_list  = $menu; 
            $tag_select_value = isset($data['pid'] ) ? $data['pid'] : "";
            $tag_select_default = array();
            $tmp   ="";
            $tag_select_option = ['lay-verif'=>'required'] ;
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
        <label class="layui-form-label">名称</label>
        <div class="layui-input-block">
            <input type="text" name="title" placeholder="请输入" autocomplete="off" class="layui-input"
                   value="<?php echo isset($data['title'])?$data['title']:''; ?>" lay-verify="required">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">url</label>
        <div class="layui-input-block">
            <input type="text" name="name" placeholder="请输入" autocomplete="off" class="layui-input"
                   value="<?php echo isset($data['name'])?$data['name']:''; ?>" lay-verify="required">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">图标</label>
        <div class="layui-input-block">
            <input type="text" name="icon" placeholder="请输入" autocomplete="off" class="layui-input"
                   value="<?php echo isset($data['icon'])?$data['icon']:''; ?>">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">排序</label>
        <div class="layui-input-block">
            <input type="text" name="sort" placeholder="请输入" autocomplete="off" class="layui-input"
                   value="<?php echo isset($data['sort'])?$data['sort']:'1'; ?>">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">类型</label>
        <div class="layui-input-block">
            
            <?php 
                $tag_radio_name = 'menu'; 
                $tag_radio_list = ['1'=>'菜单','0'=>'行为']; 
                $tag_radio_value = isset($data['menu']) ? $data['menu']: ""; 
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
        <label class="layui-form-label">是否禁用</label>
        <div class="layui-input-block">
            
            <?php 
                $tag_radio_name = 'status'; 
                $tag_radio_list = ['1'=>'启用','0'=>'禁用']; 
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
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <input type="hidden" name="id" value="<?php echo isset($data['id'])?$data['id']:''; ?>">
            <button class="layui-btn" lay-submit lay-filter="*">立即提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </div>
</form>

<script type="text/javascript" src="/layui/layui.js"></script>


<script>
    layui.use(['form', 'jquery', 'layer'], function () {
        var form = layui.form, $ = layui.jquery, layer = layui.layer;
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