<?php

if (!function_exists('br2nl')) {

    /**
     * Convert BR tags to newlines and carriage returns.
     * @param string The string to convert
     * @return string The converted string
     */
    function br2nl($string) {
        return preg_replace('/\<br(\s*)?\/?\>/i', "", $string);
    }

}

if (!function_exists('timestamp_str')) {

    /**
     * @param string $timestamp 
     */
    function timestamp_str($timestamp) {
        $date1 = new DateTime(date('Y-m-d', strtotime($timestamp)));
        $date2 = new DateTime(date('Y-m-d'));

        $diff = $date2->diff($date1)->format("%a");

        if ($diff == 0) {
            $interval = 'Today';
        } else if ($diff <= 7) {
            if ($diff == 1) {
                $interval = $diff . ' day ago';
            } else {
                $interval = $diff . ' days ago';
            }
        } else if ($diff <= 30) {
            $a = intval($diff / 7);
            if ($a == 1) {
                $interval = $a . ' week ago';
            } else {
                $interval = $a . ' weeks ago';
            }
        } else {
            $a = intval($diff / 30);
            if ($a == 1) {
                $interval = $a . ' month ago';
            } else {
                $interval = $a . ' months ago';
            }
        }
        return $interval;
    }

}
if (!function_exists('time_elapsed')) {

    /**
     * @param string $timestamp 
     */
    function time_elapsed($timestamp, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($timestamp);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'min',
            's' => 'sec',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) {
            $string = array_slice($string, 0, 1);
        }
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }

}