<?php
class Validate{

    public static function acceptance($field){
        if(isset($_REQUEST[$field])){
            return true;
        }else{
            global $app;
            $app->error($field, humanize($field)." must be accepted.");
            return false;
        }
    }

    public static function absence($field){
        if($_REQUEST[$field] == ''){
            return true;
        }else{
            global $app;
            $app->error($field, humanize($field)." must not be blank.");
            return false;
        }
    }

    public static function confirmation($field, $confirmation_field = ''){
        if($confirmation_field == ''){
            $confirmation_field = $field . "_confirmation";
        }
        if($_REQUEST[$field] == $_REQUEST[$confirmation_field]){
            return true;
        }else{
            global $app;
            $app->error($field, humanize($field)." does not match confirmation.");
            $app->errorField($confirmation_field);
            return false;
        }
    }
    public static function exists($key, $table, $column='id'){
        if(is_array($key)){
            $sql="select count(*) from $table ";
            $i=0;
            foreach($key as $k => $v){
                if($i==0){
                    $sql .="where $k = ? ";
                }else{
                    $sql .= "and $k = ?";
                }
                $values[]=$v;
                $i++;
            }
        }else{
            $sql = "select count(*) from $table where $column = ?";
            $values = array($_REQUEST[$key]);
        }
        $result = getOne($sql, $values);

        if($result){
            return true;
        }else{
            global $app;
            $app->error($key, humanize($key)." does not exist.");
            return false;
        }
    }
    public static function exclusion($field, $range){
        if(!in_array($_REQUEST[$field],$range)){
            return true;
        }else{
            global $app;
            $app->error($field, humanize($field)." is reserved.");
            return false;
        }
    }

    public static function inclusion($field, $range){
        if(in_array($_REQUEST[$field],$range)){
            return true;
        }else{
            global $app;
            $app->error($field, humanize($field)." is not in the list.");
            return false;
        }
    }

    public static function is_email($field){
        if(filter_var($_REQUEST[$field],FILTER_VALIDATE_EMAIL)){
            return true;
        }else{
            global $app;
            $app->error($field, humanize($field)." must be a valid email address.");
            return false;
        }
    }

    public static function is_number($field){
        if(is_numeric($_REQUEST[$field])){
            return true;
        }else{
            global $app;
            $app->error($field, humanize($field)." must be a number.");
            return false;
        }
    }

    public static function length($field,$min='',$max=''){
        global $app;
        $return = true;
        $count = strlen($_REQUEST[$field]);
        if(is_numeric($min)){
            if($count < $min){
                $app->error($field, humanize($field)." must have at least $min characters. It had $count.");
                $return = false;
            }else{
                if(is_numeric($max)){
                    if($count > $max){
                        $app->error($field, humanize($field)." must have no more than $max characters. It had $count.");
                        $return = false;
                    }
                }
            }
        }
        return $return;
    }

    public static function length_is($field,$max){
        $count = strlen($_REQUEST[$field]);
        if($count != $max){
            global $app;
            $app->error($field, humanize($field)." must be exactly $max characters.It had $count.");
            return false;
        }else{
            return true;
        }
    }

    public static function length_in($field, $start, $end){
        $count = strlen($_REQUEST[$field]);
        if($count >= $start && $count <= $end){
            return true;
        }else{
            global $app;
            $app->error($field, humanize($field)." must have between $start and $end characters. It had $count.");
            return false;
        }
    }

    public static function presence($field, $alias=''){
        if($_REQUEST[$field] == ''){
            global $app;
            if($alias != ''){
                $title = $alias;
            }else{
                $title = humanize($field);
            }
            $app->error($field, $title . " must not be blank.");
            return false;
        }else{
            return true;
        }
    }

        public static function uniqueness($key, $table, $column='id'){
        if(is_array($key)){
            $sql="select count(*) from $table ";
            $i=0;
            foreach($key as $k => $v){
                if($i==0){
                    $sql .="where $k = ? ";
                }else{
                    $sql .= "and $k = ?";
                }
                $values[]=$v;
                $i++;
            }
        }else{
            $sql = "select count(*) from $table where $column = ?";
            $values = array($_REQUEST[$key]);
        }
        //echo_sql($sql, $values);
        $result = getOne($sql, $values);

        if($result){
            global $app;
            $app->error($key, humanize($key)." already exists.");
            return false;
        }else{
            return true;
        }
    }
}
?>
