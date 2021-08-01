<?php
include_once("../../functions.php");
$db=dbConnect();
if($db->connect_errno==0){
    if(isset($_POST['reg'])){
        $id_anggota =$db->escape_string($_POST['id_anggota']);
        $nama =$db->escape_string($_POST['nama']);
        $jk = $db->escape_string($_POST['jk']);
        $sql = "INSERT into anggota values('$id_anggota','$nama','$jk')";
        $res=$db->query($sql);
        if($res){
            if($db->affected_rows>0){
                echo "<script>
                Swal.fire({
                    title: 'Data anggota berhasil ditambahkan',
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok!'
                }).then((result) => {
                    document.location.href = 'index.php?page=supplier'
                })
                </script>";
            }else{
                echo (DEVELOPMENT?'ERROR : '.$db->error:'');
                echo "
                    <script>
                    Swal.fire({
                    title: 'Data gagal ditambahkan',
                    icon: 'error',
                    showCloseButton: true,
                    })
                    </script>
                    ";
            }
        }else {
            echo (DEVELOPMENT?'ERROR : '.$db->error:'');
            echo "
                <script>
                Swal.fire({
                title: 'Data gagal ditambahkan',
                icon: 'error',
                showCloseButton: true,
                })
                </script>
                ";
        }
    }
?>
<title>Tambah Anggota</title>
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
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" placeholder="ID Petugas (NIP)"
                                required name="id_anggota" autocomplete="off" id="id_anggota">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="nama" name="nama" required
                                placeholder="Masukkan Nama" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="jk" name="jk" required>
                                <option value="">Jenis Kelamin</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <!-- <div class="form-group">
                            <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                placeholder="Email Address">
                        </div> -->
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