<?php
include_once("../../functions.php");
$db=dbConnect();
if($db->connect_errno==0){
    if(isset($_POST['submit'])){
        $id_kat =$db->escape_string($_POST['id_kat']);
        $nm_kat =$db->escape_string($_POST['nm_kat']);

        $sql = "INSERT into kategori_barang values('$id_kat','$nm_kat')";
        $res = $db->query($sql);
        if($res){
            if($db->affected_rows>0){
                echo "<script>
                Swal.fire({
                    title: 'Data kategori berhasil ditambahkan',
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok!'
                }).then((result) => {
                    document.location.href = 'index.php?page=kategori'
                })
                </script>";
            }
            else{
                echo (DEVELOPMENT?'ERROR : '.$db->error:'');
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
        else{
            echo (DEVELOPMENT?'ERROR : '.$db->error:'');
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
}
?>

<title>Form Tambah Kategori</title>
<div class=" offset-lg-3 col-lg-6">
    <div class="container" style="color:black;">
        <form class="col" action="" method="post" enctype="multipart/form-data">
            <div class="mb-3" col="12">
                <label for="inputidKategori" class="form-label">ID Kategori</label>
                <div class="input-group">
                    <!--<span class="input-group-text">M</span>-->
                    <input type="text" class="form-control form-control-sm" name="id_kat" id="id_kat" autocomplete="off"
                        required>
                </div>
                <div id="isi"></div>
            </div>
            <div class="mb-3" col="12">
                <label for="inputNamakatergori" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control form-control-sm" name="nm_kat" id="nm_kat" autocomplete="off"
                    required>
            </div>
            <div class="mb-3" col="12">
                <button class="btn btn-primary" type="submit" name="submit" id="submit">Submit</button>
                <button class="btn btn-danger" type="reset">Reset</button>
            </div>
        </form>
    </div>
</div>
<script>
$("#id_kat").on("keyup", function() {
    var id_kat = $("#id_kat").val();
    $.ajax({
        url: "../src/cek-kategori.php",
        method: "post",
        dataType: "json",
        data: {
            id_kat: id_kat
        },
        success: function(resp) {
            if (resp.status === "ERROR") {
                $("#isi").html("ID Kategori telah ADA!");
                $("#isi").css("color", "red");
                $("#submit").attr("disabled", "disabled");
            } else if (resp.status === "OK") {
                $("#isi").html("");
                $("#submit").removeAttr("disabled");
            }
        }
    })
})
</script>