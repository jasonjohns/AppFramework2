<?php
function smarty_function_submit($params, $template){
    //name
    //is_error
    $classes = array('primary', 'success', 'info', 'warning', 'danger', 'link');
    if($params['class'] == ''){
        $params['class'] = 'default';
    }else{
        if(!in_array($params['class'],$classes)){
            $params['class'] = 'default';
        }
    }

    if($params['value'] == ''){
        $params['value'] = 'Submit';
    }

    if($params['name'] == ''){
        $params['name'] = 'action';
    }

    $retval = "<input type=\"submit\" name=\"{$params['name']}\" value=\"{$params['value']}\" class=\"btn btn-{$params['class']}\">";
    return $retval;
}
?>
