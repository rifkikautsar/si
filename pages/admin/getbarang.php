<?php
include("../../functions.php");
$db=dbConnect();

$response = array();
if(!isset($_POST)){
    $response['status'] = "ERROR";
}else if(isset($_POST['id_barang'])){
    $id_barang = $_POST['id_barang'];
}
echo json_encode($response);