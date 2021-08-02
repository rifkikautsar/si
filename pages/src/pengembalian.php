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
</style>
<title>Data Pengembalian</title>
<div class="container-fluid" style="height: 500px; overflow: scroll;">
    <div class="row">
        <form action="" method="post">
            <div class="mb-3">
                <!--<label for="inputidbarang" class="form-label">ID Barang</label>
                <span class="input-group-text">M</span>-->
                <input type="text" class="form-control form-control-sm" name="keyword"
                    placeholder="Cari Data Pengembalian" id="keyword" autocomplete="off" size="50">
            </div>
        </form>
    </div>
    <div class="row pb-2">
        <?php if($_SESSION['hak_akses']==="kepala"):?>
        <a href="../../excel-kembali.php" target="_blank" class="btn btn-primary">Generate Excel</a>
        <?php else:?>
        <a href="index.php?page=tambah-pengembalian" class="btn btn-success">Tambah</a>&emsp;
        <a href="../../excel-kembali.php" target="_blank" class="btn btn-primary">Generate Excel</a>
        <?php endif;?>
    </div>
    <div id="container">
        <div class="row">
            <table class="table table-bordered table-responsive-sm" style="color: black;">
                <tr>
                    <th rowspan="2" style="width: 10%;">ID Pinjam</th>
                    <th rowspan="2" style="width: 10%;">Nama Peminjam</th>
                    <th rowspan="2" style="width: 10%;">Petugas</th>
                    <th rowspan="2" style="width: 15%;">Barang Yang Dipinjam</th>
                    <th rowspan="2" style="width: 15%;">Tanggal Pinjam</th>
                    <th rowspan="2" style="width: 15%;">Tanggal Kembali</th>
                    <?php if($_SESSION['hak_akses']!=="kepala"):?>
                    <th rowspan="2" style="width: 20%;">Aksi</th>
                    <?php endif;?>
                </tr>
                <tbody>
                    <form action="" method="post">
                        <?php $k = getDataPengembalian();
                        foreach($k as $row):?>
                        <tr>
                            <td><?=$row['id_pinjam'];?></td>
                            <td><?=$row['nm_anggota'];?></td>
                            <td><?=$row['nm_petugas'];?></td>
                            <td><button type="button" class="btn btn-primary view-data" value="view"
                                    id="<?=$row['id_pinjam'];?>">
                                    Detail</button></td>
                            <td><?=date("d-m-Y",strtotime($row['tgl_pinjam']));?></td>
                            <td><?=date("d-m-Y",strtotime($row['tgl_kembali']));?></td>
                            <!-- <td><button type="button" class="btn btn-primary edit-kembali" id="<?=$row['id_pinjam'];?>"
                                    name="edit">Edit</button>
                            </td> -->
                            <?php if($_SESSION['hak_akses']!=="kepala"):?>
                            <td><button type="button" class="btn btn-danger hapus-kembali" name="hapus"
                                    id="<?=$row['id_pinjam'];?>">Delete</button>
                            </td>
                            <?php endif;?>
                        </tr>
                        <?php endforeach; ?>
                    </form>
                </tbody>
            </table>
        </div>
    </div>
    <!--Modal Detail-->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">List Barang Yang Dipinjam</h5>
                </div>
                <div class="modal-body detail">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(".view-data").on("click", function() {
    var id_pinjam = $(this).attr("Id");
    $.ajax({
        url: "../src/get-rincian-pinjam.php",
        method: "post",
        data: {
            id_pinjam: id_pinjam
        },
        success: function(data) {
            $("#staticBackdrop").modal("show");
            $(".detail").html(data);
        }
    })
})
$(".hapus-kembali").on("click", function() {
    var id_kembali = $(this).attr("Id");
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
                url: "../src/hapus.php",
                method: "post",
                data: {
                    id_kembali: id_kembali
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
                                'index.php?page=pengembalian'
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
})
$("#keyword").on('keyup', function() {
    $keyword = $("#keyword").val();
    $("#container").load("../src/cari-kembali.php?keyword=" + encodeURI($keyword));
});
</script>