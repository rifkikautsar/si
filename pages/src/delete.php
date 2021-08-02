<?php
include("../../functions.php");
$db=dbConnect();
if($db->connect_errno==0){
    $message="";
    if(isset($_POST['id_barang'])){
    $id_barang = $db->escape_string($_POST['id_barang']);
    $sql = "SELECT rp.id_barang FROM rincian_peminjaman rp JOIN peminjaman p USING(id_pinjam) WHERE rp.id_pinjam NOT IN
    (SELECT id_pinjam FROM pengembalian)";
    $result = $db->query($sql);
    if($result){
        $dt = $result->fetch_all(MYSQLI_ASSOC);
        $array=[];
        foreach($dt as $row){
            $array[] = $row['id_barang'];
        }
        if(in_array($id_barang,$array)){
            $message = "ERROR! Data barang masih dipinjam!";
        }else if (!in_array($id_barang,$array)){
            $sql = "DELETE from barang where id_barang = '$id_barang'";
            $res = $db->query($sql);
            if($res){
                if($db->affected_rows>0){
                    $message="OK";
                }else{
                    $message="ERROR".(DEVELOPMENT?" : ".$db->error:"");
                }
            }else {
                $message = "ERROR".(DEVELOPMENT?" : ".$db->error:"");
            }
        }
        
    }
    
    }else if(isset($_POST['id_kat'])){
        $id_kat = $db->escape_string($_POST['id_kat']);
        $sql = "DELETE from kategori_barang where id_kat = '$id_kat'";
        $res = $db->query($sql);
            if($res){
                if($db->affected_rows>0){
                    $message="OK";
                }else{
                    $message="ERROR".(DEVELOPMENT?" : ".$db->error:"");
                }
            }else {
                $message = "ERROR".(DEVELOPMENT?" : ".$db->error:"");
            }
    }else if(isset($_POST['id_supplier'])){
        $id_supplier = $db->escape_string($_POST['id_supplier']);
        $sql = "DELETE from supplier where id_supplier = '$id_supplier'";
        $res = $db->query($sql);
            if($res){
                if($db->affected_rows>0){
                    $message="OK";
                }else{
                    $message="ERROR".(DEVELOPMENT?" : ".$db->error:"");
                }
            }else {
                $message = "ERROR".(DEVELOPMENT?" : ".$db->error:"");
            }
    }else if(isset($_POST['id_satuan'])){
        $id_satuan = $db->escape_string($_POST['id_satuan']);
        $sql = "DELETE from satuan where id_satuan = '$id_satuan'";
        $res = $db->query($sql);
            if($res){
                if($db->affected_rows>0){
                    $message="OK";
                }else{
                    $message="ERROR".(DEVELOPMENT?" : ".$db->error:"");
                }
            }else {
                $message = "ERROR".(DEVELOPMENT?" : ".$db->error:"");
            }
    }
}echo $message;