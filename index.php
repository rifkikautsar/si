<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <!-- <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" /> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!--==================== UNICONS ====================-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <title>Login | LAB IPA</title>
</head>

<?php
session_start();
if(isset($_SESSION["hak_akses"])){
    $hak_akses = $_SESSION["hak_akses"];
    if($hak_akses=="admin"){
        header("Location: pages/admin/");
    }
    else if($hak_akses=="kepala"){
        header("Location: pages/kepala/");
    }
    else if($hak_akses=="petugas"){
        header("Location: pages/petugas/");
    }
};
include("functions.php");

?>
<?php
if (isset($_GET["error"])) {
$error = $_GET["error"];
if ($error == 1)
showError("Username dan password tidak sesuai.");
else if ($error == 2)
showError("Error database. Silahkan hubungi administrator");
else if ($error == 3)
showError("Koneksi ke Database gagal. Autentikasi gagal.");
else if ($error == 4)
showError("Anda tidak boleh mengakses halaman sebelumnya karena belum login.
Silahkan login terlebih dahulu.");
else
showError("Unknown Error.");
};
include("login.php");

?>
<!-- Bootstrap core JavaScript-->
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="assets/js/sb-admin-2.min.js"></script>

</html>