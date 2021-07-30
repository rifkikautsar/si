<?php  
 include("../../functions.php");
 $db=dbConnect();
 $message = '';
 if(!isset($_POST)){
      $message = "ERROR";
 }
 if(isset($_POST['id_petugas']))  
 {  
     $id_petugas = mysqli_real_escape_string($db, $_POST["id_petugas"]); 
     $nama = mysqli_real_escape_string($db, $_POST["nama"]);  
     $username = mysqli_real_escape_string($db, $_POST["username"]);  
     $jbt = mysqli_real_escape_string($db, $_POST["jabatan"]);
     $id = mysqli_real_escape_string($db, $_POST["id_petugas"]);
     if($id_petugas != '')
     {    
          $res=$db->query("SELECT * from petugas where username='$username'");
          if($res){
               if($res->num_rows>1){
                    $message = "ERROR1";
               }else{
                    $query = "UPDATE petugas set nm_petugas = '$nama', username='$username', hak_akses='$jbt' where id_petugas='$id_petugas'"; 
                    $result = $db->query($query);
                    if($result){
                         $message = 'OK';
                    }else{
                         $message = "ERROR";
                    }
               }
          }
          
     }
 }else if(isset($_POST['id_anggota'])){
      $id_anggota = $db->escape_string($_POST['id_anggota']);
      $nama = $db->escape_string($_POST['nama']);
      $jk = $db->escape_string($_POST['jk']);
      if($id_anggota!=""){
           $res=$db->query("UPDATE anggota set nm_anggota='$nama', jk='$jk' where id_anggota='$id_anggota'");
           if($res){
               $message='OK';
           }else{
               $message='ERROR';
           }
      }
 }
 echo $message;
 ?>