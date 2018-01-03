<?php
function smarty_function_input_field($params, $template){
    $field_types = array('text', 'password', 'datetime', 'datetime-local', 'date', 'month', 'time', 'week', 'number', 'email','url', 'search', 'tel','color');
    if($params['type'] != ''){
        if(!in_array($params['type'],$field_types)){
            $params['type'] = 'text';
        }
    }else{
        $params['type'] = 'text';
    }
    $required_icon = '';
    $class = "form-group";
    $value = $template->smarty->tpl_vars[$params['name']]->value;
    $error_fields = $template->smarty->tpl_vars['error_fields']->value;
    if($error_fields[$params['name']]==1){
        $class .= " has-error has-feedback";
        $error_icon = "<span class=\"glyphicon glyphicon-remove form-control-feedback\"></span>";
    }
    if($params['required']){
        $required_icon = "<span class=\"glyphicon glyphicon-asterisk\"></span>";;
    }
    $retval = "<div class=\"{$class}\"><label for=\"{$params['name']}\" class=\"control-label\">";
    if($label == ''){
        $retval .= ucwords(str_replace("_", " ", $params['name']));
    }else{
        $retval .= $label;
    }
    $retval .= "{$required_icon}</label>";
    $retval .= "<input type=\"{$params['type']}\" class=\"form-control\" name=\"{$params['name']}\" id=\"{$params['name']}\"";
    if($value != ''){
        $retval .= " value=\"{$value}\"";
    }

    $retval .= ">";
    $retval .= $error_icon;
    if($params['help'] != ''){
        $retval .= "<span class=\"help-block\">{$params['help']}</span>";
    }
    $retval .= "</div>";
    return $retval;
}
?>
