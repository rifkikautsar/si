<?php
include("../../functions.php");
$db=dbConnect();
if($db->connect_errno==0){
    if(isset($_POST['id_pinjam'])){
        $id_pinjam = $db->escape_string($_POST['id_pinjam']);
        $tgl = $db->escape_string($_POST['tgl']);
        $petugas=$db->escape_string($_POST['petugas']);
        $k = getPeminjaman($id_pinjam);
        ?>
<input type="hidden" name="id_pinjam" id="id_pinjam" value="<?=$id_pinjam;?>">
<table class="table table-bordered" style="color: black;">
    <tr>
        <td>Nama Barang</td>
        <td>Jumlah</td>
    </tr>
    Petugas Peminjaman : <?=$k[0]['nm_petugas'];?>
    <?php foreach($k as $row):?>
    <tr>
        <td><?=$row['nm_barang'];?></td>
        <td><?=$row['jml_barang']." ".$row['nm_satuan'];?></td>
    </tr>
    <?php endforeach;?>
</table>

<div class="mb-3">
    <button class="btn btn-primary" type="submit" name="submit">Submit</button>
</div>
<?php
    }
    
}