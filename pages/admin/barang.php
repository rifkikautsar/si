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

        <table class="table mt-3 table-striped">
            <?php
	    include_once("../../functions.php");
	    $db = dbconnect();
	    if($db->connect_errno == 0 ){
    	?>

            <tr>
                <th>ID Barang</th>
                <th>ID Kategori</th>
                <th>ID Supplier</th>
                <th>Nama barang</th>
                <th>Tanggal</th>
                <th>Jumlah Barang</th>
                <th>Satuan</th>
            </tr>
            <?php
        $data = getBarang();
            foreach($data as $dt){
            $id_barang = $dt['id_barang'];
            ?>
            <tr>
                <td><?php echo $dt["id_barang"]; ?></td>
                <td><?php echo $dt["id_kat"]; ?></td>
                <td><?php echo $dt["id_supplier"]; ?></td>
                <td><?php echo $dt["nm_barang"]; ?></td>
                <td><?php echo $dt["jumlah"]; ?></td>
                <td><?php echo $dt["satuan"]; ?></td>
                <td><?php echo $dt["tanggal"]; ?></td>
            </tr>
            <?php
		    }
		}else
			echo "Gagal Koneksi : "." : ".$db->connect_error."<br>";
			?>
        </table>
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
                    <td><button class="btn btn-primary" id="<?=$row['id_barang'];?>">Edit</button></td>
                    <td><button class="btn btn-danger">Delete</button></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>