<div class="container-fluid" style="height: 440px; overflow: scroll;">
    <div class="row">
        <form action="" method="post">
            <div class="mb-3">
                <!--<label for="inputidbarang" class="form-label">ID Barang</label>
                <span class="input-group-text">M</span>-->
                <input type="text" class="form-control form-control-sm" name="keyword" 
                    placeholder="Cari Barang" autocomplete="off" size="50">
            </div>
        </form>
    </div>
    <div class="row">
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

    <!--<div class="row">
        <div class="row row-cols-1 row-cols-md-4 g-4">
            <?php /*for($i=0;$i<100;$i++): */?>
            <div class="col pb-2">
                <div class="card h-80">
                    <img src="../../assets/images/foto.jpg" class="card-img-top" alt="..."
                        style="max-width: 420px; height: 150px;">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a short card.</p>
                        <p class="card-text">This is a short card.</p>
                        <p class="card-text">This is a short card.</p>
                        <p class="card-text">This is a short card.</p>
                        <p class="card-text">This is a short card.</p>
                        <p class="card-text">This is a short card.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>