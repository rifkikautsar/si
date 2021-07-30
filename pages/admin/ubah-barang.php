<?php  
 include("../../functions.php");
 $db=dbConnect();
 $message = '';
 if(!isset($_POST)){
      $message = "ERROR".$db->error;
 }
if(isset($_POST['id_barang'])){
        $id_barang = mysqli_real_escape_string($db, $_POST["id_barang"]); 
        $nama = mysqli_real_escape_string($db, $_POST["nm_barang"]);  
        $kat = mysqli_real_escape_string($db, $_POST["kategori"]);  
        $sup = mysqli_real_escape_string($db, $_POST["supplier"]);
        $jml = mysqli_real_escape_string($db, $_POST["jml"]);
        $sat = mysqli_real_escape_string($db, $_POST["satuan"]);
        $baik = mysqli_real_escape_string($db, $_POST["baik"]);
        $ringan = mysqli_real_escape_string($db, $_POST["ringan"]);
        $berat = mysqli_real_escape_string($db, $_POST["berat"]);
        $tanggal = mysqli_real_escape_string($db, $_POST["tanggal"]);
        $sumber = mysqli_real_escape_string($db, $_POST["sumber"]);
      if($id_barang!=""){
                $db1= new PDO('mysql:host=localhost; dbname=si', 'root', '');
                $db1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            try {
                $db1->beginTransaction();
                $sh = $db1->prepare("UPDATE barang set id_kat=?, id_supplier=?, id_satuan=?, nm_barang=?, jumlah=?, tanggal=? where id_barang=?");
                $sh->execute([$kat,$sup,$sat,$nama,$jml,$tanggal,$id_barang]);
                $sh = $db1->prepare("UPDATE rincian_barang set baik=?, rusak=?, rusak_berat=?, sumber=? where id_barang=?");
                $sh->execute([$baik,$ringan,$berat,$sumber,$id_barang]);
                $db1->commit();
                $message = "OK";
            } catch ( Exception $e ) {
                $db1->rollBack();
                $message="ERROR" .$db->error;
            }
      }else $message = "ERROR" .$db->error;
 }
 echo $message;
 ?>