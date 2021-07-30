<?php
include("../../functions.php");
$db=dbConnect();
if(isset($_POST['id_petugas'])){
    $id_petugas=$_POST['id_petugas'];
    $sql="SELECT nm_petugas,hak_akses,username,id_petugas from petugas where id_petugas='$id_petugas'";
    $res=$db->query($sql);
    $k=$res->fetch_assoc();
echo json_encode($k);
}else if(isset($_POST['id_anggota'])){
    $id_anggota = $_POST['id_anggota'];
    $sql = "SELECT * from anggota where id_anggota='$id_anggota'";
    $res=$db->query($sql);
    $k=$res->fetch_assoc();
echo json_encode($k);
};
?>