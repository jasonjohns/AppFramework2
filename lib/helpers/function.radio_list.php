<?php
function smarty_function_radio_list($params, $template){

    $value = $template->smarty->tpl_vars[$params['name']]->value;
    $retval = "<fieldset><legend>". humanize($params['name']) . "</legend>";
    foreach($params['options'] as $key => $val){
        if($params['inline']){
            $container_start = "<label for=\"{$params['name']}_{$key}\" class=\"radio-inline\">";
            $container_end = "</label>";
        }else{
            $container_start = "<div class=\"radio\"><label for=\"{$params['name']}_{$key}\">";
            $container_end = "</label></div>";
        }
        $retval .= $container_start;
        if($key == $value){
            $retval .= "<input type=\"radio\" name=\"{$params['name']}\" id=\"{$params['name']}_{$key}\" checked value=\"{$key}\">{$val}";
        }else{
            $retval .= "<input type=\"radio\" name=\"{$params['name']}\" id=\"{$params['name']}_{$key}\" value=\"{$key}\">{$val}";
        }
        $retval .= $container_end;
    }
    $retval .= "</fieldset>";
    return $retval;
}
?>
