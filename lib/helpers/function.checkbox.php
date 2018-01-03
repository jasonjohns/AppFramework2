<?php
function smarty_function_checkbox($params, $template){
    $class = "checkbox";
    $value = $template->smarty->tpl_vars[$params['name']]->value;
    $error_fields = $template->smarty->tpl_vars['error_fields']->value;
    if($error_fields[$params['name']]==1){
        $class .= " has-danger has-feedback";
        $error_icon = "<span class=\"glyphicon glyphicon-remove form-control-feedback\"></span>";
    }
    if($params['label'] == ''){
        $params['label'] = ucwords(str_replace("_", " ", $params['name']));
    }
    if($params['value'] == ''){
        $params['value'] = 1;
    }
    $retval .= "<div class=\"{$class}\"><label for=\"{$params['name']}\">";
    if($value == $params['value']){
        $retval .= "<input type=\"checkbox\" name=\"{$params['name']}\" id=\"{$params['name']}\" checked value=\"{$params['value']}\">{$params['label']}";
    }else{
        $retval .= "<input type=\"checkbox\" name=\"{$params['name']}\" id=\"{$params['name']}\" value=\"{$params['value']}\">{$params['label']}";
    }
    $retval .= "</label>";
    $retval .= $error_icon;
    if($params['help'] != ''){
        $retval .= "<span class=\"help-block\">{$params['help']}</span>";
    }
    $retval .= "</div>";
    return $retval;
}
?>
