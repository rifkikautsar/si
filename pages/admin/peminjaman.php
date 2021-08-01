<?php
include("../../functions.php");
$db=dbConnect();
?>

<title>Data Peminjaman</title>
<div class="container-fluid" style="height: 445px; overflow: scroll;">
    <div class="row">
        <form action="" method="post">
            <div class="mb-3">
                <!--<label for="inputidbarang" class="form-label">ID Barang</label>
                <span class="input-group-text">M</span>-->
                <input type="text" class="form-control form-control-sm" name="keyword" placeholder="Cari Data Peminjaman"
                    id="keyword" autocomplete="off" size="50">
            </div>
        </form>
    </div>
    <div class="row pb-2">
        <a href="index.php?page=tambah-peminjaman" class="btn btn-success">Tambah</a>&emsp;
        <!--<a href="../../excel-barang.php" target="_blank" class="btn btn-primary">Generate Excel</a>-->
    </div>
    <div id="container">
        <div class="row">
            <table class="table table-bordered table-responsive-sm">
                <tr>
                    <th rowspan="2" style="width: 10%;">ID Pinjam</th>
                    <th rowspan="2" style="width: 10%;">Nama Peminjam</th>
                    <th rowspan="2" style="width: 10%;">Petugas</th>
                    <th rowspan="2" style="width: 15%;">Barang Yang Dipinjam</th>
                    <th rowspan="2" style="width: 15%;">Tanggal Pinjam</th>
                    <th rowspan="2" colspan="2" style="width: 20%;">Aksi</th>
                </tr>
                <tbody>
                    <form action="" method="post">
                        <?php $k = getDataPeminjaman();
                        foreach($k as $row):?>
                        <tr>
                            <td><?=$row['id_pinjam'];?></td>
                            <td><?=$row['nm_anggota'];?></td>
                            <td><?=$row['nm_petugas'];?></td>
                            <td><button type="button" class="btn btn-primary view-data" value="view"
                                id="<?=$row['id_pinjam'];?>">
                                Detail</button></td>
                            <td><?=date("d-m-Y",strtotime($row['tgl_pinjam']));?></td>
                            <td><button type="button" class="btn btn-primary edit-pinjam" id="<?=$row['id_pinjam'];?>"
                                    name="edit">Edit</button>
                            </td>
                            <td><button type="button" class="btn btn-danger hapus-pinjam" name="hapus"
                                    id="<?=$row['id_pinjam'];?>">Delete</button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </form>
                </tbody>
            </table>
        </div>
    </div>
    <!--Modal Detail-->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">List Barang Yang Dipinjam</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body detail">
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
