<?php
include("../../functions.php");
$db=dbConnect();
$response = array();
if($db->connect_errno==0){
    if(!isset($_POST)){
        $response['status'] = "ERROR";
    }else if(isset($_POST['id_barang'])){
        $id_barang = $_POST['id_barang'];
        $sql= "SELECT b.id_barang,b.nm_barang,b.tanggal, b.jumlah,k.id_kat,k.nm_kat,s.nm_supplier,s.id_supplier,st.id_satuan,st.nm_satuan,rb.baik,rb.rusak,rb.rusak_berat,rb.sumber from barang b join rincian_barang rb using(id_barang) join kategori_barang k using(id_kat) join satuan st using(id_satuan) join supplier s using(id_supplier) where b.id_barang='$id_barang'";
        $res=$db->query($sql);
        if($res){
            if($db->affected_rows>0){
                $data = $res->fetch_assoc();
                $response['status'] = "OK";
                $response['data'] = $data;
            }
        }
    }
    echo json_encode($response);
}