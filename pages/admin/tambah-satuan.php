<?php
include_once("../../functions.php");
$db=dbConnect();
$k=0;
if($db->connect_errno==0){
    $satuan=0;
    $sql = "SELECT MAX(id_satuan) as id_satuan from satuan";
    $res=$db->query($sql);
    if($res){
        if($db->affected_rows>0){
        $data = $res->fetch_assoc();
        }
    }
};?>
<title>Form Tambah Supplier</title>
<div class=" offset-lg-3 col-lg-6">
    <div class="container" style="color:black;">
        <form class="col" action="" method="post" enctype="multipart/form-data">
            <div class="mb-3" col="12">
                <label for="inputidSatuan" class="form-label">ID Satuan</label>
                <div class="input-group">
                    <!--<span class="input-group-text">M</span>-->
                    <input type="text" class="form-control form-control-sm" readonly name="id_satuan" name="id_satuan"
                        autocomplete="off" required value="<?=$data['id_satuan']+1;?>">
                </div>
            </div>
            <div class="mb-3" col="12">
                <label for="inputNamaSatuan" class="form-label">Nama Satuan</label>
                <input type="text" class="form-control form-control-sm" name="nm_satuan" id="nm_satuan"
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