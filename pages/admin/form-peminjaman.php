<?php
include_once("../../functions.php");
$db=dbConnect();
if($db->connect_errno==0){
    if(isset($_REQUEST['pinjam-barang'])){
        $str =$db->escape_string($_REQUEST['pinjam-barang']);
        $id_pinjam =$db->escape_string($_POST['id_pinjam']);
        $id_petugas =$db->escape_string($_POST['id_petugas']);
        $id_anggota =$db->escape_string($_POST['id_anggota']);
        $tgl_pinjam =$db->escape_string($_POST['tgl_pinjam']);
        $id_barang = $db->escape_string($_POST['id_barang']);
        $nm_barang = $db->escape_string($_POST['nm_barang']);
        $jml = $db->escape_string($_POST['jumlah']);

        /*$sql_tb_pesanan = "insert into pemesanan(id_pesanan,id_pelanggan) values('$id_pesanan','$id_pel')";
          $res=$db->query($sql_tb_pesanan);
          $sql_tb_rincian = "insert into rincian_pesanan(id_menu,id_pesanan) 
                      values ('$id_menu','$id_pesanan')";
          $res2=$db->query($sql_tb_rincian);*/

        $sql_tb_peminjaman = "INSERT into peminjaman values('$id_pinjam','$id_petugas','$id_anggota','$tgl_pinjam')";
        $res_peminjaman = $db->query($sql_tb_peminjaman);
        $sql_tb_rincian_pinjam = "INSERT into rincian_peminjaman values('$id_pinjam','$id_barang','$jumlah')";
        $res_tb_rincian_pinjam = $db->query($sql_tb_rincian_pinjam);
        if($res_rincian_pijam){
            if($db->affected_rows>0){
                echo "<script>
            alert('Data Peminjaman berhasil ditambahkan')
            document.location.href = 'index.php'
            </script>";
            }
            else{
                echo "<script>alert('Data Gagal ditambahkan ".$db->error."')</script>";
            }
        }
        else echo "GAGAL SQL : ".$db->error;
    }
}


?>

<title>Form Peminjaman Barang</title>
<style>
h1 {
    font-size: 20px;
}

.table-scroll {
    height: 300px;
    overflow: scroll;
}
</style>

<div class="card shadow mb-4">
<!-- Card Header -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary">Form Peminjaman Barang Laboratorium</h6>
    </div>
<!-- Card Body -->
<div class="card-body">
    <div class=" offset-lg-2 col-lg-8">
    <div class="container" style="color:black;">
        <form class="col" action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="inputID-Pinjam" class="form-label">ID Pinjam</label>
                <input type="text" class="form-control form-control-sm" name="id_pinjam" id="id_pinjam"
                    autocomplete="off" required>
            </div>
            <div class="form-group row">
                <div class="col-sm-6">
                    <label for="id_petugas" class="form-label">ID Petugas</label>
                    <select class="form-control form-control-sm" name="id_petugas" id="id_petugas" autocomplete="off"
                        required>
                        <option value="0" selected>Pilih ID Petugas</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <label for="nama_petugas" class="form-label">Nama Petugas</label>
                    <div class="input-group">
                        <input type="text" class="form-control form-control-sm" readonly id="nama_petugas"
                            name="nama_petugas" autocomplete="off" required>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6">
                    <label for="id_anggota" class="form-label">ID Anggota</label>
                    <select class="form-control form-control-sm" name="id_anggota" id="id_anggota" autocomplete="off"
                        required>
                        <option value="0" selected>Pilih ID Anggota</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <label for="nama_anggota" class="form-label">Nama Anggota</label>
                    <div class="input-group">
                        <input type="text" class="form-control form-control-sm" readonly id="nama_anggota"
                            name="nama_anggota" autocomplete="off" required>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <button class="btn btn-primary" type="submit" name="submit">Simpan</button>
                <button class="btn btn-danger" type="reset">Reset</button>
            </div>

            <div id="container">
                <div class="row">
                    <div class="table-scroll">
                    <table class="table table-bordered table-responsive-sm">
                        <tr>
                            <th rowspan="2" style="width: 10%;">ID Barang</th>
                            <th rowspan="2" style="width: 15%;">Nama Barang</th>
                            <th rowspan="2" style="width: 10%;">Jumlah</th>
                            <th rowspan="2" style="width: 10%;">Aksi</th>
                        </tr>
                    <?php
                    $k = getBarang();
                    foreach($k as $row):?>
                            <tr>
                                <td><?=$row['id_barang'];?></td>
                                <td><?=$row['nm_barang'];?></td>
                                <td><?=$row['jumlah'];?></td>
                                <td><button type="button" class="btn btn-primary" id="<?=$row['id_barang'];?>"
                                    name="pinjam-barang">Pinjam</button>
                                </td>
                            </tr>
                    <?php endforeach; ?>
                    </table>
                    </div>
                </div>
            </div>        
        </form>
    </div>
    </div>
</div>
</div>

<div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Barang yang Akan Dipinjam</h6>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-responsive-md">
            <thead class="table-light">
                <tr>
                    <th style="width: 50%">Nama Barang</th>
                    <th style="width: 30%">Jumlah</th>
                    <th style="width: 20%">Aksi</th>
                </tr>
            </thead>
