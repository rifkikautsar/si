<?php
include("../../functions.php");
$db=dbConnect();
if($db->connect_errno==0){
    if(isset($_POST['submit'])){
        $id_barang = mysqli_real_escape_string($db, $_POST["id_barang"]); 
        $nama = mysqli_real_escape_string($db, $_POST["nm_barang"]);  
        $kat = mysqli_real_escape_string($db, $_POST["id_kat"]);  
        $sup = mysqli_real_escape_string($db, $_POST["id_supplier"]);
        $jml = mysqli_real_escape_string($db, $_POST["jml"]);
        $sat = mysqli_real_escape_string($db, $_POST["satuan"]);
        $baik = mysqli_real_escape_string($db, $_POST["baik"]);
        $ringan = mysqli_real_escape_string($db, $_POST["ringan"]);
        $berat = mysqli_real_escape_string($db, $_POST["berat"]);
        $tanggal = mysqli_real_escape_string($db, $_POST["tanggal"]);
        $sumber = mysqli_real_escape_string($db, $_POST["sumber"]);
            if($id_barang!=""){
                $db1= new PDO('mysql:host=localhost; dbname=si', 'root', '');
                $db1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                try {
                    $db1->beginTransaction();
                    $sh = $db1->prepare("INSERT into barang values(?,?,?,?,?,?,?)");
                    $sh->execute([$id_barang,$kat,$sup,$sat,$nama,$jml,$tanggal]);
                    $sh = $db1->prepare("INSERT into rincian_barang values(?,?,?,?,?)");
                    $sh->execute([$id_barang,$baik,$ringan,$berat,$sumber]);
                    $db1->commit();
                    echo "
                    <script>
                    Swal.fire({
                        title: 'Data berhasil ditambahkan',
                        icon: 'success',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Ok!'
                    })
                    </script>";
                } catch ( Exception $e ) {
                    $db1->rollBack();
                    echo "
                    <script>
                    Swal.fire({
                        title: 'Data gagal ditambahkan',
                        text: (DEVELOPMENT?' : '.$db->error:''),
                        icon: 'error',
                        showCloseButton: true,
                    })
                    </script>
                    ";
                }
            }
    }
?>
<title>Tambah Barang</title>
<style>
h1 {
    font-size: 20px;
}

.container {
    color: black;
}
</style>
<div class=" offset-lg-2 col-lg-8">
    <div class="container">
        <form class="col" action="" method="post" enctype="multipart/form-data">
            <div class="form-group row">
                <div class="col-sm-6">
                    <label for="inputidbarang" class="form-label">ID Barang</label>
                    <div class="input-group">
                        <input type="text" class="form-control form-control-sm" readonly id="id_barang" name="id_barang"
                            autocomplete="off" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <label for="inputidkategori" class="form-label">ID Kategori</label>
                    <select class="form-control form-control-sm" name="id_kat" id="id_kat" autocomplete="off" required>
                        <option value="">Pilih Kategori</option>
                        <?php $k = getKategori();
                            foreach($k as $row):?>
                        <option value="<?=$row['id_kat'];?>"><?=$row['nm_kat'];?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <label for="inputidsupplier" class="form-label">ID Supplier</label>
                <select class="form-control form-control-sm" name="id_supplier" id="id_supplier" autocomplete="off"
                    required>
                    <option value="0" selected>Pilih Supplier</option>
                    <?php $k = getSupplier();
                            foreach($k as $row):?>
                    <option value="<?=$row['id_supplier'];?>"><?=$row['nm_supplier'];?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="form-group row">
                <div class="col-sm-6">
                    <label for="inputNama-barang" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control form-control-sm" name="nm_barang" id="nm_barang"
                        autocomplete="off" required>
                </div>
                <div class="col-sm-6">
                    <label for="inputTanggal" class="form-label">Tanggal Diterima</label>
                    <input type="date" class="form-control form-control-sm" name="tanggal" id="tanggal"
                        autocomplete="off" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="inputjml" class="form-label">Jumlah</label>
                    <input type="number" class="form-control form-control-sm" readonly rows="3" name="jml" id="jml"
                        autocomplete="off" required>
                </div>
                <div class="col-sm-3">
                    <label for="inputjml" class="form-label">Baik</label>
                    <input type="number" class="form-control form-control-sm" rows="3" name="baik" id="baik"
                        autocomplete="off" required>
                </div>
                <div class="col-sm-3">
                    <label for="inputjml" class="form-label">Rusak Ringan</label>
                    <input type="number" class="form-control form-control-sm" rows="3" name="ringan" id="ringan"
                        autocomplete="off" required>
                </div>
                <div class="col-sm-3">
                    <label for="inputjml" class="form-label">Rusak Berat</label>
                    <input type="number" class="form-control form-control-sm" rows="3" name="berat" id="berat"
                        autocomplete="off" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6">
                    <label for="inputsatuan" class="form-label">Satuan</label>
                    <select class="form-control form-control-sm" rows="3" name="satuan" id="satuan" autocomplete="off"
                        required>
                        <option value="0" selected>Pilih Satuan</option>
                        <?php $k = getSatuan();
                            foreach($k as $row):?>
                        <option value="<?=$row['id_satuan'];?>"><?=$row['nm_satuan'];?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="col-sm-6">
                    <label for="inputsumber" class="form-label">Sumber</label>
                    <select class="form-control form-control-sm" rows="3" name="sumber" id="sumber" autocomplete="off"
                        required>
                        <option value="0" selected>Pilih Sumber</option>
                        <option value="APBD">APBD</option>
                        <option value="mandiri">Mandiri</option>
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                <button class="btn btn-danger" type="reset">Reset</button>
            </div>
        </form>
    </div>
</div>
<?php }
?>
<script>
$("#baik").on("blur", function() {
    var ringan = parseInt($("#ringan").val());
    var jml = parseInt($("#jml").val());
    var baik = parseInt($("#baik").val());
    var berat = parseInt($("#berat").val());
    if (ringan == 0) {
        $("#jml").val(baik + berat);
    } else if (berat == 0) {
        $("#jml").val(baik + ringan);
    } else {
        $("#jml").val(baik + ringan + berat);
    }
})
$("#ringan").on("blur", function() {
    var ringan = parseInt($("#ringan").val());
    var jml = parseInt($("#jml").val());
    var baik = parseInt($("#baik").val());
    var berat = parseInt($("#berat").val());
    if (baik == 0) {
        $("#jml").val(ringan + berat);
    } else if (berat == 0) {
        $("#jml").val(ringan + baik);
    } else {
        $("#jml").val(baik + ringan + berat);
    }
})
$("#berat").on("blur", function() {
    var ringan = parseInt($("#ringan").val());
    var jml = parseInt($("#jml").val());
    var baik = parseInt($("#baik").val());
    var berat = parseInt($("#berat").val());
    if (baik == 0) {
        $("#jml").val(berat + ringan);
    } else if (ringan == 0) {
        $("#jml").val(berat + baik);
    } else {
        $("#jml").val(baik + ringan + berat);
    }
})
$("#id_kat").on("change", function() {
    var id_kat = $('select option').filter(':selected').val()
    $.ajax({
        url: "generateID.php",
        method: "post",
        dataType: "json",
        data: {
            id_kat: id_kat,
        },
        success: function(resp) {
            if (resp.status === "OK") {
                var id = resp.data.id_barang;
                if (id.length == 2) {
                    $("#id_barang").val(id_kat + "0" + id);
                } else if (id.length == 1) {
                    $("#id_barang").val(id_kat + "00" + id);
                } else if (id.length == 3) {
                    $("#id_barang").val(id_kat + id);
                }
            }
        }
    })
})
</script>