<?php
include("../../functions.php");
$db=dbConnect();
if($db->connect_errno==0){
    $response = array();
    if(!isset($_POST)){
        $response['status'] = "ERROR";
    }
    if(isset($_POST['id_supplier'])){
        $id_supplier = $db->escape_string($_POST['id_supplier']);
        $sql = "SELECT * from supplier where id_supplier = '$id_supplier'";
        $res = $db->query($sql);
        if($res){
            if($db->affected_rows>0){
                $data = $res->fetch_assoc();
                $response['status']="OK";
                $response['data']= $data;
            }else{
                $response['status']="ERROR".(DEVELOPMENT?" : ".$db->error:"");
            }
        }else{
            $response['status']= "ERROR".(DEVELOPMENT?" : ".$db->error:"");
        }
    }
}echo json_encode($response);