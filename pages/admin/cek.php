<?php
include("../../functions.php");
$db=dbConnect();
if($db->connect_errno==0){
    $response = array();
    if(!isset($_POST)){
        $response['status'] = "ERROR";
    }else if(isset($_POST['id_supplier'])){
        $id_supplier=$db->escape_string($_POST['id_supplier']);
        $sql = "SELECT * from supplier where id_supplier='$id_supplier'";
        $res=$db->query($sql);
            if($res){
                if($res->num_rows>0){
                    $response['status']="ERROR";
                }else if($res->num_rows==0){
                    $response['status']="OK";
                }
            }
    }
}else {
    $response['status']="ERROR";
    $response['keterangan']="GAGAL KONEKSI";
}
echo json_encode($response);