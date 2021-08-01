<?php
include_once("../../functions.php");
$db=dbConnect();
if($db->connect_errno==0){
    if(isset($_POST['simpan'])){
        $id = $_POST['id_barang'];
        $jml = $_POST['jml'];
        $id_anggota = $db->escape_string($_POST['nm_anggota']);
        $id_pinjam = $db->escape_string($_POST['id_pinjam']);
        $petugas = $db->escape_string($_POST['nm_petugas']);
        $tanggal = $db->escape_string($_POST['tanggal']);
        // echo "<pre>";
        // var_dump($id);
        // var_dump($jml);
        for($i=0; $i<count($id);$i++){
            $array[]=array("id_barang"=>$id[$i],
                           "id_anggota"=>$id_anggota,
                           "id_pinjam"=>$id_pinjam,
                           "tanggal"=>$tanggal,
                           "id_petugas"=>$petugas,
                           "jumlah"=>$jml[$i]);
        }
        $db1= new PDO('mysql:host=localhost; dbname=si', 'root', '');
        $db1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            $query = "";
            $db1->beginTransaction();
            $sh = $db1->exec("INSERT INTO peminjaman VALUES('$id_pinjam','$petugas','$id_anggota','$tanggal')");
                for($i=0;$i<count($array);$i++){
                    $id_barang = $array[$i]['id_barang'];
                    $id_anggota = $array[$i]['id_anggota'];
                    $id_pinjam = $array[$i]['id_pinjam'];
                    $tanggal = $array[$i]['tanggal'];
                    $id_petugas = $array[$i]['id_petugas'];
                    $jumlah = $array[$i]['jumlah'];
                    $query .= "('$id_pinjam','$id_barang','$jumlah'), ";
                    $sh = $db1->exec("UPDATE barang SET jumlah=jumlah-'$jumlah' WHERE barang.id_barang='$id_barang'");
                    $sh = $db1->exec("UPDATE rincian_barang SET baik=baik-'$jumlah' WHERE rincian_barang.id_barang='$id_barang'");
                }
            $sh = $db1->exec("INSERT INTO rincian_peminjaman VALUES ".rtrim($query,", "));
            $db1->commit();
            echo "
                    <script>
                    Swal.fire({
                        title: 'Data berhasil ditambahkan',
                        icon: 'success',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Ok!'
                    }).then((result) => {
                        document.location.href =
                            'index.php?page=peminjaman'
                    })
                    </script>";
        }catch ( \PDOException $e ) {
            $db1->rollBack();
            echo (DEVELOPMENT?'ERROR : '.$e->getMessage():'');
            echo "
                <script>
                Swal.fire({
                title: 'Data gagal ditambahkan',
                icon: 'error',
                showCloseButton: true,
                })
                </script>
                ";
        }
        
        // for($i=0;$i<count($array);$i++){
        //     $id_barang = $array[$i]['id_barang'];
        //     $id_anggota = $array[$i]['id_anggota'];
        //     $id_pinjam = $array[$i]['id_pinjam'];
        //     $tanggal = $array[$i]['tanggal'];
        //     $id_petugas = $array[$i]['id_petugas'];
        //     $jumlah = $array[$i]['jumlah'];
            
            // $res=$db->query("INSERT INTO peminjaman VALUES('$id_pinjam','$id_petugas','$id_anggota','$tanggal')");
            // $res=$db->query("INSERT INTO rincian_peminjaman VALUES('$id_pinjam','$id_barang','$jumlah')");
            // $res=$db->query("UPDATE barang SET jumlah=jumlah-'$jumlah' WHERE barang.id_barang='$id_barang'");
            // $res=$db->query("UPDATE rincian_barang SET baik=baik-'$jumlah' WHERE rincian_barang.id_barang='$id_barang'");
            
            // $res=$db->query("CALL inputPeminjaman('$id_pinjam','$id_petugas','$id_anggota','$tanggal','$id_barang','$jumlah')");
        //}
    }
    $Id = "PJM-";
    $sql = "SELECT MAX(CAST(SUBSTRING(id_pinjam,5) AS SIGNED)) as id_pinjam FROM peminjaman";
    $res=$db->query($sql);
    if($res){
        if($res->num_rows>0){
            $data = $res->fetch_assoc();
            $count = (int)$data['id_pinjam'];
            $Id .= $count+1;
        }else{
            $Id = "PJM-1";
        }
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
<div class="container">
    <form class="col" action="" method="post" name="f">
        <div class="row">
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Form Peminjaman Barang Laboratorium</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="container" style="color:black;">

                            <!-- <div class="mb-3">
                                <label for="inputID-Pinjam" class="form-label">ID Pinjam</label>
                                <input type="text" class="form-control form-control-sm" name="id_pinjam" id="id_pinjam"
                                    autocomplete="off" required>
                            </div> -->
                            <div class="form-group row">
                                <!-- <div class="col-sm-6">
                                    <label for="id_petugas" class="form-label">ID Petugas</label>
                                    <select class="form-control form-control-sm" name="id_petugas" id="id_petugas"
                                        autocomplete="off" required>
                                        <option value="0" selected>Pilih ID Petugas</option>
                                    </select>
                                </div> -->
                                <div class="col-sm-6">
                                    <label for="inputID-Pinjam" class="form-label">ID Pinjam</label>
                                    <input type="text" class="form-control form-control-sm" name="id_pinjam"
                                        id="id_pinjam" autocomplete="off" required value="<?=$Id;?>" readonly>
                                </div>
                                <div class="col-sm-6">
                                    <label for="nama_petugas" class="form-label">Nama Petugas</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-sm" id="nm_petugas"
                                            name="nm_petugas" autocomplete="off" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label for="id_anggota" class="form-label">Nama Peminjam</label>
                                    <select class="form-control form-control-sm" name="nm_anggota" id="nm_anggota"
                                        autocomplete="off" required>
                                        <option value="" selected>Pilih</option>
                                        <?php
                                        $k = getAnggota();
                                        foreach($k as $row):?>
                                        <option value="<?=$row['id_anggota'];?>"><?=$row['nm_anggota'];?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label for="tanggal" class="form-label">Tanggal</label>
                                    <input type="date" class="form-control form-control-sm" id="tanggal" name="tanggal"
                                        autocomplete="off" required>
                                </div>
                                <!-- <div class="col-sm-6">
                                    <label for="nama_anggota" class="form-label">Nama Anggota</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-sm" readonly
                                            id="nama_anggota" name="nama_anggota" autocomplete="off" required>
                                    </div>
                                </div> -->
                            </div>
                            <!-- <div class="mb-3">
                                <button class="btn btn-primary" type="button" name="simpan" id="simpan">Simpan</button>
                                <button class="btn btn-danger" type="reset">Reset</button>
                            </div> -->

                            <div id="container">
                                <div class="row">
                                    <div class="table-scroll">
                                        <table class="table table-bordered table-responsive-sm" style="color: black;">
                                            <tr>
                                                <th style="width: 10%;">ID Barang</th>
                                                <th style="width: 15%;">Nama Barang</th>
                                                <th style="width: 10%;">Tersedia</th>
                                                <th style="width: 10%;">Aksi</th>
                                            </tr>
                                            <?php
                                            $k = getDataBarang();
                                            foreach($k as $row):?>
                                            <tr>
                                                <td><?=$row['id_barang'];?></td>
                                                <td><?=$row['nm_barang'];?></td>
                                                <td><?=$row['baik'];?></td>
                                                <td>
                                                    <button type="button" class="btn btn-primary pinjam"
                                                        id="<?=$row['id_barang'];?>"
                                                        name="pinjam-barang">Pinjam</button>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Barang yang Akan Dipinjam</h6>
                    </div>
                    <div class="card-body">
                        <table id="rincian" class="table table-bordered table-responsive-md" style="color: black;">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 50%">ID</th>
                                    <th style="width: 30%">Jumlah</th>
                                    <th style="width: 20%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td><button type="button" id="simpan" class="btn btn-success" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop" hidden>Simpan</button></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Modal Konfirmasi simpan -->
            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog" style="color: black;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi</h5>
                        </div>
                        <div class="modal-body">
                            Apakah data yang dimasukkan sudah benar?
                            Jika benar maka klik simpan.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<script>
$(".pinjam").on("click", function() {
    var id_barang = $(this).attr("Id");
    $("#rincian tbody").append("<tr><td><input type='text' name='id_barang[]' value='" + id_barang +
        "' style='width:6rem;'></td><td><input type='number' name='jml[]' style='width:4rem;'></td><td><button class='btn btn-danger btn-mini' id='hapus'><i class='uil uil-trash'></i></button></td>"
    );
    $("#simpan").removeAttr("hidden");
})
$("#rincian tbody").on('click', '#hapus', function(event) {
    $(this).parent().parent().remove();
    if ($("#rincian tbody").children().length == 0) {
        $("#simpan").attr("hidden", "hidden");
    }
});
</script>