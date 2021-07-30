<?php include_once("functions.php");?>
<?php
    $db = dbConnect();
    if ($db->connect_errno == 0) {
        if (isset($_POST["TblLogin"])) {
        $id_pegawai = $db->escape_string($_POST["uname"]);
        $password = $db->escape_string($_POST["pswd"]);
        $sql = "SELECT id_pegawai, nama, jabatan FROM pegawai
        WHERE id_pegawai='$id_pegawai' and pass=md5('$password')";
        $res = $db->query($sql);
            if ($res) {
                if ($res->num_rows == 1) {
                $data = $res->fetch_assoc();
                session_start();
                $_SESSION["id_pegawai"] = $data["id_pegawai"];
                $_SESSION["nama"] = $data["nama"];
                $_SESSION["jabatan"] = $data["jabatan"];
                $_SESSION['passphrase'] = openssl_random_pseudo_bytes(16);
                $_SESSION['iv'] = openssl_random_pseudo_bytes(16);
                if($_SESSION["jabatan"]=="pelayan"){
                header("Location: app/pelayan/");
                }else if($_SESSION["jabatan"]=="owner"){
                    header("Location: app/owner/");
                }else if($_SESSION["jabatan"]=="koki"){
                    header("Location: app/koki/");
                }else if($_SESSION["jabatan"]=="kasir"){
                    header("Location: app/kasir/");
                }
        } else
        header("Location: index.php?error=1");
        }
    } else
        header("Location: index.php?error=2");
} else
        header("Location: index.php?error=3");
?>