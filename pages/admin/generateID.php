<?php
include("../../functions.php");
$db=dbConnect();
if($db->connect_errno==0){
    $message = array();
    if(!isset($_POST)){
        $message['status'] = "ERROR";
    }else if(isset($_POST['id_kat'])){
        $id_kat = $db->escape_string($_POST['id_kat']);
        $sql = "SELECT RIGHT(MAX(id_barang),3)+1 as id_barang FROM barang WHERE id_kat = '$id_kat'";
        $res=$db->query($sql);
        if($res){
            if($db->affected_rows>0){
                $data=$res->fetch_assoc();
                $message['status']="OK";
                $message['data']=$data;
            }else{
                $message['status'] = "ERROR".(DEVELOPMENT?" : ".$db->error:"");
            }
        }else{
            $message['status'] = "ERROR".(DEVELOPMENT?" : ".$db->error:"");
        }
    }
} echo json_encode($message);