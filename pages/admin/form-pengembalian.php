<?php
include("../../functions.php");
$db=dbConnect();
if($db->connect_errno==0){
    $k = getIdPinjam();

    if(isset($_POST['submit'])){
        $id_pinjam = $db->escape_string($_POST['id_pinjam']);
        $id_petugas = $db->escape_string($_POST['nm_petugas']);
        $tgl = $db->escape_string(($_POST['tgl_kembali']));

        $db1= new PDO('mysql:host=localhost; dbname=si', 'root', '');
        $db1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            $d = getPeminjaman($id_pinjam);
            for($i=0;$i<count($d);$i++){
            $array[] = array("id_barang"=>$d[$i]['id_barang'],
                             "jml_barang"=>$d[$i]['jml_barang']);
            }
            $db1->beginTransaction();
            $sh = $db1->exec("INSERT into pengembalian values('$id_pinjam','$id_petugas','$tgl')");
            for($i=0;$i<count($array);$i++){
                $id_barang = $array[$i]['id_barang'];
                $jml_barang = $array[$i]['jml_barang'];
                $sh = $db1->exec("UPDATE rincian_barang set baik=baik+$jml_barang where id_barang='$id_barang'");
                $sh = $db1->exec("UPDATE barang set jumlah=jumlah+$jml_barang where id_barang='$id_barang'");
            }
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
        }catch ( PDOException $e ) {
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
    }
?>
<title>Form Pengembalian Barang</title>
<style>
h1 {
    font-size: 20px;
}
</style>
<div class=" offset-lg-2 col-lg-8">
    <div class="container justify-content-center" style="color:black;">
        <form class="col" action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="id_pinjam" class="form-label">ID Pinjam</label>
                <select class="form-control form-control-sm" name="id_pinjam" id="id_pinjam" autocomplete="off"
                    required>
                    <option value="0" selected>Pilih ID Pinjam</option>
                    <?php foreach($k as $row):?>
                    <option value="<?=$row['id_pinjam'];?>"><?=$row['id_pinjam'];?>-<?=$row['nm_anggota'];?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group row">
                <div class="col-sm-6">
                    <label for="tgl_kembali" class="form-label">Tanggal Pengembalian</label>
                    <input type="date" class="form-control form-control-sm" name="tgl_kembali" id="tgl_kembali"
                        autocomplete="off" required>
                </div>
                <!-- <div class="col-sm-6">
                    <label for="id_petugas" class="form-label">ID Petugas</label>
                    <select class="form-control form-control-sm" name="id_petugas" id="id_petugas" autocomplete="off"
                        required>
                        <option value="0" selected>Pilih ID Petugas</option>
                    </select>
                </div> -->
                <div class="col-sm-6">
                    <label for="nm_petugas" class="form-label">Nama Petugas</label>
                    <div class="input-group">
                        <input type="text" class="form-control form-control-sm" id="nm_petugas" name="nm_petugas"
                            autocomplete="off" required>
                    </div>
                </div>
            </div>
            <div id="detail">
                Pilih ID Peminjaman terlebih dahulu
            </div>
        </form>
    </div>
</div>

<?php
}
?>
<script>
$("#id_pinjam").on("change", function() {
    var id_pinjam = $("#id_pinjam").val();
    var tgl = $("#tgl_kembali").val();
    var petugas = $("#nm_petugas").val();
    if (id_pinjam != 0) {
        $.ajax({
            url: "getpeminjaman.php",
            method: "post",
            data: {
                id_pinjam: id_pinjam,
                tgl: tgl,
                petugas: petugas,
            },
            success: function(resp) {
                $("#detail").html(resp);
            }
        })
    } else {
        $("#detail").html("Pilih ID Peminjaman terlebih dahulu");
    }

})
</script>