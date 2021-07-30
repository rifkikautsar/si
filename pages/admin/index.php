<?php
include_once("sidebar.php");


if(isset($_GET['page'])){
    $page = $_GET['page'];
    switch($page){
        case 'kepala':
            include("kepala.php");
            break;
        case 'petugas':
            include("petugas.php");
            break;
        case 'anggota':
            include("anggota.php");
            break;
        case 'admin':
            include("admin.php");
            break;
        case 'barang':
            include("barang.php");
            break;
        case 'tambah-barang':
            include("tambah-barang.php");
            break;
        case 'register':
            include("register.php");
            break;
        case 'tambah-anggota':
            include("tambah-anggota.php");
            break;
            default:
            echo "Halaman Tidak ditemukan";
    }
}else{
    include("content.php");
}
include_once("footer.php");
?>