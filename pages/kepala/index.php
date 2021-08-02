<?php
session_start();
if (!isset($_SESSION["username"])){
header("Location: ../../index.php?error=4");
}else if($_SESSION["hak_akses"]!="kepala"){
    $hak_akses = $_SESSION["hak_akses"];
    if($hak_akses=="admin"){
        echo "
        <script>
        alert('Anda tidak memiliki akses ke halaman tersebut');
        document.location.href = '../admin/';
        </script>";
        
    }
    if($hak_akses=="petugas"){
        echo "
        <script>
        alert('Anda tidak memiliki akses ke halaman tersebut');
        document.location.href = '../petugas/';
        </script>";   
    }
}
?>
<?php
include_once("sidebar.php");


if(isset($_GET['page'])){
    $page = $_GET['page'];
    switch($page){
        case 'barang':
            include("../src/barang.php");
            break;
        case 'supplier':
        include("../src/supplier.php");
            break;
        case 'kategori':
        include("../src/kategori.php");
            break;
        case 'satuan':
        include("../src/satuan.php");
            break;
        case 'peminjaman':
            include("../src/peminjaman.php");
            break;
        case 'pengembalian':
            include("../src/pengembalian.php");
            break;
            default:
            echo "Halaman Tidak ditemukan";
    }
}else{
    include("content.php");
}
include_once("../../footer.php");
?>