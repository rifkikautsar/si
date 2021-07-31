<title>Form Tambah Supplier</title>
<div class=" offset-lg-3 col-lg-6">
    <div class="container" style="color:black;">
        <form class="col" action="" method="post" enctype="multipart/form-data">
            <div class="mb-3" col="12">
                <label for="inputidSatuan" class="form-label">ID Satuan</label>
                <div class="input-group">
                    <!--<span class="input-group-text">M</span>-->
                    <input type="text" class="form-control form-control-sm" name="id_satuan" name="id_satuan"
                        autocomplete="off" required>
                </div>
            </div>
            <div class="mb-3" col="12">
                <label for="inputNamaSatuan" class="form-label">Nama Satuan</label>
                <input type="text" class="form-control form-control-sm" name="nm_satuan" id="nm_satuan"
                    autocomplete="off" required>
            </div>
            <div class="mb-3" col="12">
                <button class="btn btn-primary" type="submit" name="submit-menu">Submit</button>
                <button class="btn btn-danger" type="reset">Reset</button>
            </div>
        </form>
    </div>
</div>