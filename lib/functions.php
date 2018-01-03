<?php
function requires_authentication(){
    global $NOAUTH;
    if(in_array($_SERVER['SCRIPT_NAME'],$NOAUTH)){
	return false;
    }else{
	return true;
    }
}
function redirect_to($page){
    header("Location: /{$page}.php");
    exit;
}
function paginate($items){
    global $app;
    plog($items);
        $page = $_GET['page'];
        if($page == ''){
            $page=0;
        }
        $total_pages = ceil($items/PAGINATE_PAGE_SIZE);
        if($total_pages < PAGINATE_LIST_SIZE){
            $page_list_size = $total_pages;
        }else{
            $page_list_size = PAGINATE_LIST_SIZE;
        }
        plog("TOTAL PAGES = $total_pages");
        if($page < $page_list_size){
            plog("CASE A");
            $min=0;
            $max = $page_list_size;
        }elseif($page >= ($total_pages-$page_list_size)){
            plog("CASE B");
            $min = $total_pages - $page_list_size;
            $max = $total_pages;
        }else{
            //echo "CASE C<br>";
            $mid = floor($page_list_size/2);
            plog("MID = $mid");
            $min = $page - ($page_list_size - ($mid+1));
            $max = $min + $page_list_size;
        }
        plog("MIN=$min");
        plog("MAX=$max");
        $start = $page * $page_list_size;
        //echo "Items = $items, page = $page";
        $query_string = $_SERVER['PHP_SELF'];
        foreach($_GET as $key => $val){
            if($key != 'page'){
                $query_string_args .= "$key=$val&";
            }
        }
        $query_string .= '?' . $query_string_args;
        $p=0;
        $page_title= $min;
        if($page > 0){
            $previd = $page - 1;
            $pages[]=array('title'=>'Prev','url'=>$query_string . "page=$previd", 'class'=>'');
        }else{
            $pages[]=array('title'=>'Prev','url'=>'#', 'class'=>'unavailable');
        }
        for($i=$min;$i<$max;$i++){
            $page_title++;
            if($i==$page){
                $pages[]=array('title'=>$page_title,'url'=>$query_string . "page=$i", 'class'=>'current');
            }else{
                $pages[]=array('title'=>$page_title,'url'=>$query_string . "page=$i", 'class'=>'');
            }

            $p++;
        }
        if($pages[0]['title'] == 'Prev'){
            $offset = 2;
        }else{
            $offset = 1;
        }

        if($page < $total_pages-$offset){
            $nextid = $page + 1;
            $pages[]=array('title'=>'Next','url'=>$query_string . "page=$nextid", 'class'=>'');
        }else{
            $pages[]=array('title'=>'Next','url'=>'#', 'class'=>'unavailable');
        }

        $app->pages($pages);

        return $start;
}
function getRow($sql, $values = array()){
    global $db;
    $query = $db->prepare($sql);
    $query->execute($values);
    $result = $query->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function getOne($sql, $values = array()){
    global $db;
    //echo_sql($sql, $values);
    $stmt = $db->prepare($sql);
    $stmt->execute($values);
    $result = $stmt->fetch(PDO::FETCH_NUM);
    //inspect($result);
    return $result[0];
}
function execute_query($sql, $values = array()){
    global $db;
    //echo_sql($sql, $values);
    $stmt = $db->prepare($sql);
    return $stmt->execute($values);
}
function getArray($sql, $values='',$paginate=false){
    global $db;
    //echo_sql($sql, $values);
    $stmt = $db->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    if(is_array($values)){
        $stmt->execute($values);
    }else{
        $stmt->execute();
    }
    $results = $stmt->fetchAll();
    if($paginate){
        $start = paginate($stmt->rowCount());
        $results = array_slice($results, $start, PAGINATE_PAGE_SIZE);
    }
    return $results;
}
function mysql_date($date){
    global $app;
    if($app->deviceType() != 'phone'){
        $parts = explode("/", $date);
        $date = "{$parts[2]}-{$parts[0]}-{$parts[1]}";
    }
    return $date;

}
function exists($key, $table, $column='id'){
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
        $values = array($key);
    }
    //echo_sql($sql, $values);echo "<br>";
    return getOne($sql, $values);
}
function echo_sql($sql, $values){
	echo vsprintf(str_replace("?", "'%s'",$sql),$values);
}
function plog($message='', $level=0){
    global $plog;
    $indent = $level * 4;
    for($i=0;$i<=$indent;$i++){
        $indention .= '&nbsp;';
    }
    if($level == 0){
        $message = "<strong>" . $message . "</strong>";
    }
    $plog .= "{$indention}{$message}<br>";
}
function pluralize( $string ){
        $plural = array(
		    array( '/(quiz)$/i',               "$1zes"   ),
		    array( '/^(ox)$/i',                "$1en"    ),
		    array( '/([m|l])ouse$/i',          "$1ice"   ),
		    array( '/(matr|vert|ind)ix|ex$/i', "$1ices"  ),
		    array( '/(x|ch|ss|sh)$/i',         "$1es"    ),
		    array( '/([^aeiouy]|qu)y$/i',      "$1ies"   ),
		    array( '/([^aeiouy]|qu)ies$/i',    "$1y"     ),
		    array( '/(hive)$/i',               "$1s"     ),
		    array( '/(?:([^f])fe|([lr])f)$/i', "$1$2ves" ),
		    array( '/sis$/i',                  "ses"     ),
		    array( '/([ti])um$/i',             "$1a"     ),
		    array( '/(buffal|tomat)o$/i',      "$1oes"   ),
		    array( '/(bu)s$/i',                "$1ses"   ),
		    array( '/(alias|status)$/i',       "$1es"    ),
		    array( '/(octop|vir)us$/i',        "$1i"     ),
		    array( '/(ax|test)is$/i',          "$1es"    ),
		    array( '/s$/i',                    "s"       ),
		    array( '/$/',                      "s"       )
        );
        $irregular = array(
		   	    array( 'move',   'moves'    ),
			    array( 'sex',    'sexes'    ),
			    array( 'child',  'children' ),
			    array( 'man',    'men'      ),
			    array( 'person', 'people'   )
        );
        $uncountable = array(
        'sheep',
        'fish',
        'series',
        'species',
        'money',
        'rice',
        'information',
        'equipment'
        );
        // save some time in the case that singular and plural are the same
        if ( in_array( strtolower( $string ), $uncountable ) )
        return $string;
        // check for irregular singular forms
        foreach ( $irregular as $noun )
        {
        if ( strtolower( $string ) == $noun[0] )
            return $noun[1];
        }
        // check for matches using regular expressions
        foreach ( $plural as $pattern )
        {
        if ( preg_match( $pattern[0], $string ) )
            return preg_replace( $pattern[0], $pattern[1], $string );
        }

        return $string;
    }

    function humanize($field){
	return ucwords(str_replace("_", " ", $field));
    }

    function duration(){
	if(func_num_args()==1){
	    //split into an array
	    $parts = explode(":",func_get_arg(1));
	    $duration['hours'] = $parts[0];
	    $duration['minutes'] = $parts[1];
	    $duration['seconds'] = $parts[2];
	    return $duration;
	}elseif(func_num_args() == 3){
	    //take 3 fields and put into a "hh:mm:ss" format
	    $hours = func_get_arg(0);
	    $minutes = func_get_arg(1);
	    $seconds = func_get_arg(2);
	    if($hours == '' || !is_numeric($hours)){
		$hours = '00';
	    }
	    if($minutes == '' || !is_numeric($minutes)){
		$minutes = '00';
	    }
	    if($seconds == '' || !is_numeric($seconds)){
		$seconds = '00';
	    }
	    return str_pad($hours,2,'0',STR_PAD_LEFT) . ':' .str_pad($minutes,2,'0',STR_PAD_LEFT) . ':' .str_pad($seconds,2,'0',STR_PAD_LEFT);
	}else{
	    return false;
	}
    }

    function timePeriod($period){
	return date('Y-m-d', strtotime($period));
    }

?>
