<?php
$message = "";
if(!isset($_POST)){
    $message = "ERROR";
}
else{
    if(isset($_POST['id_petugas'])){
        include("../../functions.php");
        $db=dbConnect();
        $id_petugas=$_POST['id_petugas'];
        $sql="DELETE from petugas where id_petugas='$id_petugas'";
        $res=$db->query($sql);
            if($res){
                if($db->affected_rows>0){
                    $message = "OK";
                }
            }
            else $message = "ERROR".(DEVELOPMENT?" : ".$db->error:"");
    }else if(isset($_POST['id_anggota'])){
        include("../../functions.php");
        $db=dbConnect();
        $id_anggota=$_POST['id_anggota'];
        $sql="DELETE from anggota where id_anggota='$id_anggota'";
        $res=$db->query($sql);
        if($res){
            if($db->affected_rows>0){
                $message = "OK";
            }
        }
        else $message = "ERROR" .(DEVELOPMENT?" : ".$db->error:"");
    }else if(isset($_POST['id_kembali'])){
        include("../../functions.php");
        $db=dbConnect();
        $id_kembali=$_POST['id_kembali'];
        $sql="DELETE from peminjaman where id_pinjam='$id_kembali'";
        $res=$db->query($sql);
        if($res){
            if($db->affected_rows>0){
                $message = "OK";
            }
        }
        else $message = "ERROR" .(DEVELOPMENT?" : ".$db->error:"");
    }
}
echo $message;
?>