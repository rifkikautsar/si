<?php
include("../../functions.php");
$db=dbConnect();
?>
<style>
.table>tbody>tr>* {
    vertical-align: middle;
    text-align: center;
    color: black;
}

th {
    text-align: center;
}

th,
td {
    font-size: 14px;
}
</style>
<title>Data Satuan</title>
<div class="container-fluid" style="height: 445px; overflow: scroll;">
    <!-- <div class="row">
        <form action="" method="post">
            <div class="mb-3">
                <input type="text" class="form-control form-control-sm" name="keyword" placeholder="Cari Supplier"
                    autocomplete="off" size="50">
            </div>
        </form>
    </div> -->
    <div class="row pb-2">
        <?php if($_SESSION['hak_akses']!=="kepala"):?>
        <a href="index.php?page=tambah-satuan" class="btn btn-success">Tambah</a>
        <?php endif;?>
    </div>
    <div class="row">
        <table class="table table-bordered table-responsive-sm">
            <form action="" method="post">
                <tr>
                    <th rowspan="2" style="width: 10%;">ID Satuan</th>
                    <th rowspan="2" style="width: 15%;">Nama Satuan</th>
                    <?php if($_SESSION['hak_akses']!=="kepala"):?>
                    <th rowspan="2" colspan="2" style="width: 20%;">Aksi</th>
                    <?php endif;?>
                </tr>
                <tbody>
                    <?php $k = getSatuan(); 
                foreach($k as $row):?>
                    <tr>
                        <td><?=$row['id_satuan'];?></td>
                        <td><?=$row['nm_satuan'];?></td>
                        <?php if($_SESSION['hak_akses']!=="kepala"):?>
                        <td><button type="button" class="btn btn-primary edit-data" id="<?=$row['id_satuan'];?>"
                                name="edit">Edit</button></td>
                        <td><button type="button" class="btn btn-danger hapus-data"
                                id="<?=$row['id_satuan'];?>">Delete</button></td>
                        <?php endif;?>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </form>
        </table>
        <!-- Modal Edit -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    </div>
                    <form action="" method="post" id="insert_form">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="id_kat" class="form-label">ID Satuan</label>
                                <input type="text" class="form-control form-control-sm" readonly name="id_satuan"
                                    id="id_satuan" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label for="nm_kat" class="form-label">Nama Satuan</label>
                                <input type="text" class="form-control form-control-sm" name="nm_satuan" id="nm_satuan"
                                    autocomplete="off" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" name="insert" id="insert"
                                value="Insert">Ubah</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(".edit-data").on("click", function() {
    var id_satuan = $(this).attr("Id");
    $.ajax({
        url: "../src/getdetail.php",
        method: "post",
        dataType: "json",
        data: {
            id_satuan: id_satuan
        },
        success: function(resp) {
            if (resp.status === "OK") {
                $("#id_satuan").val(resp.data.id_satuan);
                $("#nm_satuan").val(resp.data.nm_satuan);
                $("#staticBackdrop").modal("show");
            }
        }
    })
})
$('#insert_form').on("submit", function(event) {
    event.preventDefault();
    if ($('#nm_satuan').val() == "") {
        alert("Nama tidak boleh kosong");
    } else {
        $.ajax({
            url: "../src/ubah.php",
            method: "POST",
            data: $('#insert_form').serialize(),
            beforeSend: function() {
                $('#insert').val("Inserting");
            },
            success: function(data) {
                if (data === "OK") {
                    Swal.fire({
                        title: 'Data berhasil diubah',
                        icon: 'success',
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ok!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.location.href = "index.php?page=satuan";
                        }
                    })
                } else {
                    Swal.fire({
                        title: 'Data gagal diubah',
                        text: data,
                        icon: 'error',
                        showCloseButton: true,
                    })
                }
            },
        });
    }
})
$(".hapus-data").on("click", function() {
    var id_satuan = $(this).attr("id");
    Swal.fire({
        title: 'Apakah anda ingin menghapus data satuan?',
        icon: 'warning',
        allowOutsideClick: false,
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        cancelButtonText: 'Kembali',
        confirmButtonText: 'Hapus'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "../src/delete.php",
                method: "post",
                data: {
                    id_satuan: id_satuan
                },
                success: function(data) {
                    if (data === "OK") {
                        Swal.fire({
                            title: 'Data berhasil dihapus',
                            icon: 'success',
                            confirmButtonText: `Ok`
                        }).then((result) => {
                            document.location.href =
                                'index.php?page=satuan'
                        })
                    } else {
                        Swal.fire({
                            title: 'Data gagal dihapus',
                            text: data,
                            icon: 'error',
                            showCloseButton: true
                        })
                    }
                }
            })
        }
    })
})
</script>