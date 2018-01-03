<?php
/*
 * Smarty plugin
 * -------------------------------------------------------------
 * File:     modifier.agoify.php
 * Type:     modifier
 * Name:     agoify
 * Purpose:  turn a unix timestamp into a "x (days|hours|minutes) ago string
 * -------------------------------------------------------------
 */
function smarty_modifier_agoify($string)
{
    $time = time() - $string; // to get the time since that moment
    $tokens = array (
        31536000 => 'year',
        2592000 => 'month',
        604800 => 'week',
        86400 => 'day',
        3600 => 'hour',
        60 => 'minute',
        1 => 'second'
    );
    foreach ($tokens as $unit => $text) {
        if ($time < $unit){

        }else{
            $numberOfUnits = floor($time / $unit);
            break;
        }
    }
    return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'').' ago';
}
?>
