<title>Form Pengembalian Barang</title>
<style>
h1 {
    font-size: 20px;
}
</style>
<div class=" offset-lg-2 col-lg-8">
    <div class="container justify-content-center">
        <form class="col" action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="id_pinjam" class="form-label">ID Pinjam</label>
                <select class="form-control form-control-sm" name="id_pinjam" id="id_pinjam" autocomplete="off"
                    required>
                    <option value="0" selected>Pilih ID Pinjam</option>
                </select>
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
            <div class="mb-3">
                <label for="tanngal_pengembalian" class="form-label">Tanggal Pengembalian</label>
                <input type="date" class="form-control form-control-sm" name="tanggal_pengembalian"
                    id="tanggal_pengembalian" autocomplete="off" required>
            </div>
            <div class="mb-3">
                <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                <button class="btn btn-danger" type="reset">Reset</button>
            </div>
    </div>
</div>
</form>
<?php
?>