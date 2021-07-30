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
</style>
<div class="container-fluid" style="height: 445px; overflow: scroll;">
    <div class="row">
        <form action="" method="post">
            <div class="mb-3">
                <!--<label for="inputidbarang" class="form-label">ID Barang</label>
                <span class="input-group-text">M</span>-->
                <input type="text" class="form-control form-control-sm" name="keyword" placeholder="Cari Barang"
                    autocomplete="off" size="50">
            </div>
        </form>
    </div>
    <div class="row pb-2">
        <a href="index.php?page=tambah-barang" class="btn btn-success">Tambah</a>
    </div>
    <div class="row">
        <table class="table table-bordered table-responsive-sm">
            <tr>
                <th rowspan="2" style="width: 10%;">ID Barang</th>
                <th rowspan="2" style="width: 10%;">Kategori</th>
                <th rowspan="2" style="width: 10%;">Supplier</th>
                <th rowspan="2" style="width: 15%;">Nama Barang</th>
                <th rowspan="2" style="width: 5%;">Jml</th>
                <th colspan="3" style="width: 15%;">Keterangan</th>
                <th rowspan="2" style="width: 15%;">Tanggal</th>
                <th rowspan="2" colspan="2" style="width: 20%;">Aksi</th>
            </tr>
            <tr>
                <th>Baik</th>
                <th>Ringan</th>
                <th>Rusak</th>
            </tr>
            <tbody>
                <?php $k = getDataBarang(); 
                foreach($k as $row):?>
                <tr>
                    <td><?=$row['id_barang'];?></td>
                    <td><?=$row['nm_kat'];?></td>
                    <td><?=$row['nm_supplier'];?></td>
                    <td><?=$row['nm_barang'];?></td>
                    <td><?=$row['jumlah'];?></td>
                    <td><?=$row['baik'];?></td>
                    <td><?=$row['rusak'];?></td>
                    <td><?=$row['rusak_berat'];?></td>
                    <td><?=$row['tanggal'];?></td>
                    <td><button class="btn btn-primary edit-data" id="<?=$row['id_barang'];?>" name="edit">Edit</button>
                    </td>
                    <td><button class="btn btn-danger">Delete</button></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <!-- Modal Edit -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Understood</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(".edit-data").on("click", function() {
    $("#staticBackdrop").modal("show");
})
</script>