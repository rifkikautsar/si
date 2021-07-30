<?php
include_once("../../functions.php");
$db=dbConnect();
if($db->connect_errno==0){


?>
<title>Data Petugas</title>

<div class="container-fluid justify-content-center">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <a href="index.php?page=in_anggota" class="btn btn-success">Tambah Data</a>
    </div>
    <div class="row">
        <div class="col-xl-10 col-lg-7" style="height: 400px; overflow: scroll;">
            <div class="card shadow mb-4">
                <!-- Card Header -->
                <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Petugas</h6>
                </div>
                <form action="">
                    <?php 
                    $k = getKepala();
                    foreach($k as $row): ?>
                    <!-- Card Body -->
                    <div class="card ml-3 mt-3 mb-3 mr-3" style="max-width: 540px;">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="../../assets/images/foto.jpg" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?=$row['nm_petugas'];?></h5>
                                    <table class="table-borderless">
                                        <tr>
                                            <td style="padding-right: 4rem;">ID Petugas</td>
                                            <td><?=$row['id_petugas'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Hak Akses</td>
                                            <td><?=strtoupper($row['hak_akses']);?></td>
                                        </tr>
                                        <tr>
                                            <td>Username</td>
                                            <td><?=$row['username'];?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <button type="button" class="btn btn-danger hapus"
                                                    id="<?=$row['id_petugas']?>" name="hapus"
                                                    value="<?=$row['id_petugas']?>">Hapus</button>&emsp;
                                                <button type="button" class="btn btn-primary view-edit"
                                                    data-bs-toggle="modal" id="<?=$row['id_petugas'];?>"
                                                    name="id_petugas">Ubah
                                                    Data</button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </form>
                <!-- Modal Ubah --->
                <div class="modal fade" id="staticBackdrop3" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Ubah Data Pegawai</h5>
                            </div>
                            <form action="" method="post" id="insert_form">
                                <div class="modal-body detail">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td>ID Petugas</td>
                                            <td><input type="text" name="id_petugas" id="id_petugas" value="" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nama</td>
                                            <td><input type="text" name="nama" id="nama" value="" required></td>
                                        </tr>
                                        <tr>
                                            <td>Username</td>
                                            <td><input type="text" name="username" id="username" value="" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Jabatan</td>
                                            <td>
                                                <select class="form-control" id="jabatan" name="jabatan" required>
                                                    <option value="">Pilih Jabatan</option>
                                                    <option value="kepala">Kepala</option>
                                                    <option value="petugas">Petugas</option>
                                                    <option value="admin">Admin</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" name="id_pegawai" id="id_pegawai">
                                    <button type="submit" class="btn btn-success" name="insert" id="insert"
                                        value="Insert">Ubah</button>
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Kembali</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End Card Body -->
            </div>
        </div>
    </div>
</div>

<?php }
?>
<script>
$(document).ready(function() {
    $(".view-edit").on("click", function() {
        var id_petugas = $(this).attr("id");
        $.ajax({
            url: "getdetail.php",
            method: "post",
            dataType: "json",
            data: {
                id_petugas: id_petugas
            },
            success: function(data) {
                $("#nama").val(data.nm_petugas);
                $("#username").val(data.username);
                $("#jabatan").val(data.hak_akses);
                $("#id_petugas").val(data.id_petugas);
                $("#staticBackdrop3").modal("show");
            }
        })
    });
});
$(document).ready(function() {
    $(".hapus").on("click", function() {
        var id_petugas = $(this).attr("id");
        Swal.fire({
            title: 'Apakah anda yakin menghapus data?',
            icon: 'warning',
            allowOutsideClick: false,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "hapus.php",
                    method: "post",
                    data: {
                        id_petugas: id_petugas
                    },
                    success: function(data) {
                        if (data === "OK") {
                            Swal.fire({
                                title: 'Deleted',
                                text: 'Your file has been deleted.',
                                icon: 'success',
                                confirmButtonText: `Ok`
                            }).then((result) => {
                                document.location.href =
                                    'index.php?page=kepala'
                            })
                        } else {
                            Swal.fire({
                                title: 'Data gagal dihapus',
                                text: data,
                                icon: 'error',
                                showCloseButton: true,
                            })
                        }
                    }
                })
            }
        })
    });
});
$('#insert_form').on("submit", function(event) {
    event.preventDefault();
    if ($('#nama').val() == "") {
        alert("Nama tidak boleh kosong");
    } else if ($('#username').val() == '') {
        alert("Username tidak boleh kosong");
    } else if ($('#jabatan').val() == '') {
        alert("jabatan tidak boleh kosong");
    } else {
        $.ajax({
            url: "ubah.php",
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
                            document.location.href = "index.php?page=kepala";
                        }
                    })
                } else if (data === "ERROR1") {
                    Swal.fire({
                        title: 'Data gagal diubah',
                        text: 'Username mungkin sudah ada',
                        icon: 'error',
                        showCloseButton: true,
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
</script>