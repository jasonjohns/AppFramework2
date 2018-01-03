<?php
function smarty_function_select($params, $template){
    $class = "form-group";
    $value = $template->smarty->tpl_vars[$params['name']]->value;
    $error_fields = $template->smarty->tpl_vars['error_fields']->value;
    if($error_fields[$params['name']]==1){
        $class .= " has-error has-feedback";
        $error_icon = "<span class=\"glyphicon glyphicon-remove form-control-feedback\"></span>";
    }
    if($params['required']){
        $required_icon = "<span class=\"glyphicon glyphicon-asterisk\"></span>";
    }
    $retval = "<div class=\"{$class}\"><label for=\"{$params['name']}\" class=\"control-label\">";
    if($label == ''){
        $retval .= ucwords(str_replace("_", " ", $params['name']));
    }else{
        $retval .= $label;
    }
    $retval .= "{$required_icon}</label>";
    $retval .= "<select class=\"form-control\" name=\"{$params['name']}\" id=\"{$params['name']}\">";
    foreach($params['options'] as $key => $val){
        if($value == $key){
            $retval .= "<option selected value=\"{$key}\">{$val}</option>";
        }else{
            $retval .= "<option value=\"{$key}\">{$val}</option>";
        }
    }

    $retval .= "</select>";
    $retval .= $error_icon;
    if($params['help'] != ''){
        $retval .= "<span class=\"help-block\">{$params['help']}</span>";
    }
    $retval .= "</div>";
    return $retval;
}
?>
