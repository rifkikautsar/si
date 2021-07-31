<?php
include_once("../../functions.php");
$db=dbConnect();
if($db->connect_errno==0){
    if(isset($_POST['reg'])){
        $id_petugas =$db->escape_string($_POST['id_petugas']);
        $nama =$db->escape_string($_POST['nama']);
        $akses = $db->escape_string($_POST['akses']);
        $username = $db->escape_string($_POST['username']);
        $pwd1 =$db->escape_string($_POST['inputPassword']);
        $pwd2 =$db->escape_string($_POST['repeatPassword']);
        if($pwd1 === $pwd2){
        $pwd = md5($pwd1);
        $sql = "INSERT into petugas values('$id_petugas','$nama','$akses','$username','$pwd')";
        $res=$db->query($sql);
        if($res){
            if($db->affected_rows>0){
                echo "<script>
            alert('Data Petugas berhasil ditambahkan')
            document.location.href = 'index.php'
            </script>";
            }else{
                echo "<script>alert('Data Gagal ditambahkan ".$db->error."')</script>";
            }
        }else echo "GAGAL SQL : ".$db->error;
        }else{
            echo "<script>
            alert('Password tidak sama!')
            document.location.href = 'index.php'
            </script>";
        }
    }
?>
<title>Register</title>
<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Buat Akun!</h1>
                    </div>
                    <form class="user" action="" method="post">
                        <div class="form-group row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" placeholder="ID Petugas"
                                    required name="id_petugas" autocomplete="off" id="id_petugas">
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-user" id="nama" name="nama" required
                                    placeholder="Masukkan Nama" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="username" name="username"
                                required placeholder="Masukkan Username" autocomplete="off">
                            <div class="uname" id="uname"></div>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="akses" name="akses" required>
                                <option value="">Hak Akses</option>
                                <option value="admin">Admin</option>
                                <option value="kepala">Kepala</option>
                                <option value="petugas">Petugas</option>
                            </select>
                        </div>
                        <!-- <div class="form-group">
                            <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                placeholder="Email Address">
                        </div> -->
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="password" class="form-control form-control-user" id="inputPassword"
                                    required name="inputPassword" placeholder="Password" autocomplete="off">
                            </div>
                            <div class="col-sm-6">
                                <input type="password" class="form-control form-control-user" id="repeatPassword"
                                    required name="repeatPassword" placeholder="Repeat Password" autocomplete="off">
                            </div>
                        </div>
                        <div class="isi"></div>
                        <button type="submit" id="reg" name="reg" class="btn btn-primary btn-user btn-block">
                            Register
                        </button>
                    </form>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }
?>
<script>
$("#repeatPassword").on('keyup', function() {
    var inp = $("#inputPassword").val().trim();
    var rep = $("#repeatPassword").val().trim();
    if (inp.length > 0) {
        if (inp != rep) {
            $(".isi").html("Password tidak sama!")
            $("#reg").attr("disabled", "disabled");
        } else if (inp == rep) {
            $(".isi").html("Password match!")
            $("#reg").removeAttr("disabled");
        }
    }

})
$("#username").on("keyup", function() {
    var username = $("#username").val();
    if (username != "") {
        $.ajax({
            url: "getdetail.php",
            method: "post",
            dataType: "json",
            data: {
                username: username
            },
            success: function(resp) {
                if (resp.status === "OK") {
                    $("#uname").html("Username tersedia");
                    $("#uname").css("color", "green");
                    $("#reg").removeAttr("disabled");
                } else if (resp.status === "ERROR") {
                    $("#uname").html("Username telah digunakan!");
                    $("#uname").css("color", "red");
                    $("#reg").attr("disabled", "disabled");
                }
            }
        })
    } else if (username.trim().length == 0) {
        $("#uname").html("");
        $("#reg").attr("disabled", "disabled");
    }

})
</script>