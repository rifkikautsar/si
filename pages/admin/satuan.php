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

th, td {
    font-size: 14px;
}
</style>
<div class="container-fluid" style="height: 445px; overflow: scroll;">
    <div class="row">
        <form action="" method="post">
            <div class="mb-3">
                <input type="text" class="form-control form-control-sm" name="keyword" placeholder="Cari Supplier"
                    autocomplete="off" size="50">
            </div>
        </form>
    </div>
    <div class="row pb-2">
        <a href="index.php?page=tambah-supplier" class="btn btn-success">Tambah</a>
    </div>
    <div class="row">
        <table class="table table-bordered table-responsive-sm">
            <tr>
                <th rowspan="2" style="width: 10%;">ID Satuan</th>
                <th rowspan="2" style="width: 15%;">Nama Satuan</th>
                <th rowspan="2" colspan="2" style="width: 20%;">Aksi</th>
            </tr>
            <tbody>
                <?php $k = getSatuan(); 
                foreach($k as $row):?>
                <tr>
                    <td><?=$row['id_satuan'];?></td>
                    <td><?=$row['nm_satuan'];?></td>
                    <td><button class="btn btn-primary edit-data" id="<?=$row['id_satuan'];?>" name="edit">Edit</button></td>
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