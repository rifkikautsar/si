<?php include_once("functions.php");?>
<?php
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        if (isset($_POST["TblLogin"])) {
        $username = $db->escape_string($_POST["uname"]);
        $password = $db->escape_string($_POST["pswd"]);
        $sql = "SELECT * FROM petugas
        WHERE username='$username' and pass=md5('$password')";
        $res = $db->query($sql);
            if ($res) {
                if ($res->num_rows == 1) {
                $data = $res->fetch_assoc();
                session_start();
                $_SESSION["username"] = $data["username"];
                $_SESSION["id_petugas"] = $data["id_petugas"];
                $_SESSION["nm_petugas"] = $data["nm_petugas"];
                $_SESSION["hak_akses"] = $data["hak_akses"];
                $_SESSION['passphrase'] = openssl_random_pseudo_bytes(16);
                $_SESSION['iv'] = openssl_random_pseudo_bytes(16);
                if($_SESSION["hak_akses"]=="admin"){
                header("Location: pages/admin/");
                }else if($_SESSION["hak_akses"]=="kepala"){
                    header("Location: pages/kepala/");
                }else if($_SESSION["hak_akses"]=="petugas"){
                    header("Location: pages/petugas/");
                }
        } else
        header("Location: index.php?error=1");
        }
    } else
        header("Location: index.php?error=2");
} else
        header("Location: index.php?error=3");
?>