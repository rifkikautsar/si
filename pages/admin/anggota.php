<?php
include_once("../../functions.php");
$db=dbConnect();
if($db->connect_errno==0){


?>
<title>Data Anggota</title>

<div class="container-fluid justify-content-center">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <a href="index.php?page=tambah-anggota" class="btn btn-success">Tambah Data</a>
    </div>
    <div class="row">
        <div class="col-xl-10 col-lg-7" style="height: 400px; overflow: scroll;">
            <div class="card shadow mb-4">
                <!-- Card Header -->
                <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Anggota</h6>
                </div>
                <form action="">
                    <?php 
                    $k = getAnggota();
                    foreach($k as $row): ?>
                    <!-- Card Body -->
                    <div class="card ml-3 mt-3 mb-3 mr-3" style="max-width: 540px;">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="../../assets/images/foto.jpg" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?=$row['nm_anggota'];?></h5>
                                    <table class="table-borderless">
                                        <tr>
                                            <td style="padding-right: 4rem;">ID Anggota</td>
                                            <td><?=$row['id_anggota'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kelamin</td>
                                            <td><?=$row['jk'];?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <button type="button" class="btn btn-danger hapus"
                                                    id="<?=$row['id_anggota']?>" name="hapus"
                                                    value="<?=$row['id_anggota']?>">Hapus</button>&emsp;
                                                <button type="button" class="btn btn-primary view-edit"
                                                    data-bs-toggle="modal" id="<?=$row['id_anggota'];?>"
                                                    name="id_anggota">Ubah
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
                                            <td>ID Anggota</td>
                                            <td><input type="text" class="form-control" name="id_anggota"
                                                    id="id_anggota" value="" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nama</td>
                                            <td><input type="text" class="form-control" name="nama" id="nama" value=""
                                                    required autocomplete="off"></td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kelamin</td>
                                            <td><select name="jk" id="jk" class="form-control" required>
                                                    <option value="">Pilih Jenis Kelamin</option>
                                                    <option value="L">Laki-laki</option>
                                                    <option value="P">Perempuan</option>
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
        var id_anggota = $(this).attr("id");
        $.ajax({
            url: "getdetail.php",
            method: "post",
            dataType: "json",
            data: {
                id_anggota: id_anggota
            },
            success: function(resp) {
                if (resp.status === "OK") {
                    $("#nama").val(resp.data.nm_anggota);
                    $("#jk").val(resp.data.jk);
                    $("#id_anggota").val(resp.data.id_anggota);
                    $("#staticBackdrop3").modal("show");
                }

            }
        })
    });
});
$(document).ready(function() {
    $(".hapus").on("click", function() {
        var id_anggota = $(this).attr("id");
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
                        id_anggota: id_anggota
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
                                    'index.php?page=anggota'
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
                if (data == "OK") {
                    Swal.fire({
                        title: 'Data berhasil diubah',
                        icon: 'success',
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ok!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.location.href = "index.php?page=anggota";
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
</script>