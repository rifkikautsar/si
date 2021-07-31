<?php
include_once("../../functions.php");
$db=dbConnect();
if($db->connect_errno==0){
    if(isset($_POST['submit'])){
        $id_supplier =$db->escape_string($_POST['id_supplier']);
        $nm_supplier =$db->escape_string($_POST['nm_supplier']);

        $sql = "INSERT into supplier values('$id_supplier','$nm_supplier')";
        $res = $db->query($sql);
        if($res){
            if($db->affected_rows>0){
                echo "<script>
                alert('Data Supplier berhasil ditambahkan')
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

<title>Form Tambah Supplier</title>
<div class=" offset-lg-3 col-lg-6">
    <div class="container" style="color:black;">
        <form class="col" action="" method="post" enctype="multipart/form-data">
            <div class="mb-3" col="12">
                <label for="inputidmenu" class="form-label">ID Supplier</label>
                <div class="input-group">
                    <!--<span class="input-group-text">M</span>-->
                    <input type="text" class="form-control form-control-sm" name="id_supplier" id="id_supplier"
                        autocomplete="off" required>
                </div>
                <div id="isi"></div>
            </div>
            <div class="mb-3" col="12">
                <label for="inputNamaMenu" class="form-label">Nama Supplier</label>
                <input type="text" class="form-control form-control-sm" name="nm_supplier" id="nm_supplier"
                    autocomplete="off" required>
            </div>
            <div class="mb-3" col="12">
                <button class="btn btn-primary" type="submit" name="submit" id="submit">Submit</button>
                <button class="btn btn-danger" type="reset">Reset</button>
            </div>
        </form>
    </div>
</div>
<script>
$("#id_supplier").on("keyup", function() {
    var id_supplier = $("#id_supplier").val();
    $.ajax({
        url: "cek-supplier.php",
        method: "post",
        dataType: "json",
        data: {
            id_supplier: id_supplier
        },
        success: function(resp) {
            if (resp.status === "ERROR") {
                $("#isi").html("ID Supplier telah ADA!");
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