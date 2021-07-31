<?php
include("../../functions.php");
$db=dbConnect();
if($db->connect_errno==0){
    $message="";
    if(isset($_POST['id_barang'])){
    $id_barang = $db->escape_string($_POST['id_barang']);
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