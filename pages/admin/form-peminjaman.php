<title>Form Peminjaman Barang</title>
<style>
h1 {
    font-size: 20px;
}
</style>
<div class=" offset-lg-2 col-lg-8">
    <div class="container justify-content-center" style="color:black;">
        <form class="col" action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="inputID-Pinjam" class="form-label">ID Pinjam</label>
                <input type="text" class="form-control form-control-sm" name="nm_barang" id="nm_barang"
                    autocomplete="off" required>
            </div>
            <div class="form-group row">
                <div class="col-sm-6">
                    <label for="id_petugas" class="form-label">ID Petugas</label>
                    <select class="form-control form-control-sm" name="id_petugas" id="id_petugas" autocomplete="off"
                        required>
                        <option value="0" selected>Pilih ID Petugas</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <label for="nama_petugas" class="form-label">Nama Petugas</label>
                    <div class="input-group">
                        <input type="text" class="form-control form-control-sm" readonly id="nama_petugas"
                            name="nama_petugas" autocomplete="off" required>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6">
                    <label for="id_anggota" class="form-label">ID Anggota</label>
                    <select class="form-control form-control-sm" name="id_anggota" id="id_anggota" autocomplete="off"
                        required>
                        <option value="0" selected>Pilih ID Anggotas</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <label for="nama_anggota" class="form-label">Nama Anggota</label>
                    <div class="input-group">
                        <input type="text" class="form-control form-control-sm" readonly id="nama_anggota"
                            name="nama_anggota" autocomplete="off" required>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                <button class="btn btn-danger" type="reset">Reset</button>
            </div>
    </div>
</div>
</form>