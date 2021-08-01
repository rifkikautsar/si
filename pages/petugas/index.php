<?php
include_once("sidebar.php");


if(isset($_GET['page'])){
    $page = $_GET['page'];
    switch($page){
        case 'barang':
            include("../src/barang.php");
            break;
        case 'supplier':
        include("supplier.php");
            break;
        case 'kategori':
        include("kategori.php");
            break;
        case 'satuan':
        include("satuan.php");
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
        case 'tambah-supplier':
            include("tambah-supplier.php");
            break;
        case 'tambah-kategori':
            include("tambah-kategori.php");
            break;
        case 'tambah-satuan':
            include("tambah-satuan.php");
            break;
        case 'pengembalian':
            include("form-pengembalian.php");
            break;
        case 'tambah-peminjaman':
            include("form-peminjaman.php");
            break;
        case 'tambah-pengembalian':
            include("form-pengembalian.php");
            break;
            default:
            echo "Halaman Tidak ditemukan";
    }
}else{
    include("content.php");
}
include_once("../../footer.php");
?>