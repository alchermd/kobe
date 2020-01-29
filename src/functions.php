<?php
use Carbon\Carbon;

function kobe($data) {
    $KOBE_DATA = isset($_COOKIE['KOBE_DATA']) ? json_decode($_COOKIE['KOBE_DATA']) : [];
    $KOBE_DATA[] = [
        'data' => $data,
        'url' =>"$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]",
        'time_elapsed' => Carbon::now(),
        'caller' => debug_backtrace()[0]['file'],
        'line' =>  debug_backtrace()[0]['line'],
    ];
    setcookie('KOBE_DATA', json_encode($KOBE_DATA));
}

function diffForHumans($time) {
    return Carbon::create($time)->diffForHumans();
}