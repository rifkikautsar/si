<title>Form Tambah Kategori</title>
<div class=" offset-lg-3 col-lg-6">
    <div class="container" style="color:black;">
        <form class="col" action="" method="post" enctype="multipart/form-data">
            <div class="mb-3" col="12">
                <label for="inputidKategori" class="form-label">ID Kategori</label>
                <div class="input-group">
                    <!--<span class="input-group-text">M</span>-->
                    <input type="text" class="form-control form-control-sm" name="id_kat" id="id_kat" autocomplete="off"
                        required>
                </div>
            </div>
            <div class="mb-3" col="12">
                <label for="inputNamakatergori" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control form-control-sm" name="nm_kat" id="nm_kat" autocomplete="off"
                    required>
            </div>
            <div class="mb-3" col="12">
                <button class="btn btn-primary" type="submit" name="submit-menu">Submit</button>
                <button class="btn btn-danger" type="reset">Reset</button>
            </div>
        </form>
    </div>
</div>