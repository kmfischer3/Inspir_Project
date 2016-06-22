<?php

/*
    This function was stolen from a stack overflow answer and modified slightly to fit my needs.
    Source: http://stackoverflow.com/a/18602474
*/



function time_elapsed_string($datetime, $full = false) {

    $now = new DateTime(null, new DateTimeZone('America/Chicago'));
    $ago = new DateTime($datetime);
    //echo $now->format('Y-m-d H:i:s O')."<br>";
    //echo $ago->format('Y-m-d H:i:s O')."<br>";
    $diff = $now->diff($ago);
    //echo $diff->format("%H:%I:%S");

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'y',
        'm' => 'm',
        'w' => 'w',
        'd' => 'd',
        'h' => 'h',
        'i' => 'm',
        's' => 's',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . '' . $v . ($diff->$k > 1 ? '' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . '' : 'just now';
}
?>