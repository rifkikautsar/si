<title>Tambah Barang</title>
<style>
h1 {
    font-size: 20px;
}
</style>
    <div class=" offset-lg-2 col-lg-8">
        <div class="container">
            <form class="col" action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="inputidbarang" class="form-label">ID Barang</label>
                    <div class="input-group">
                        <!--<span class="input-group-text">M</span>-->
                        <input type="text" class="form-control form-control-sm" name="idbarang" autocomplete="off"
                            required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="inputidkategori" class="form-label">ID Kategori</label>
                    <select class="form-control form-control-sm" name="idkategori" autocomplete="off" required>
                            <option value="0" selected>1</option>
                            <option value="1">2</option>
                            <option value="2">3</option>
                            <option value="3">4</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="inputidsupplier" class="form-label">ID Supplier</label>
                    <select class="form-control form-control-sm" name="idsupplier" autocomplete="off" required>
                            <option value="0" selected>1</option>
                            <option value="1">2</option>
                            <option value="2">3</option>
                            <option value="3">4</option>
                    </select>
                </div>
                <!--<div class="mb-3">
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="inputidkategori" class="form-label">ID Kategori</label>
                            <select class="form-control form-control-sm" id="idkategori" name="idkategori" autocomplete="off"
                            required>
                            <option value="0" selected>1</option>
                            <option value="1">2</option>
                            <option value="2">3</option>
                            <option value="3">4</option>
                            </select>
                        </div>
                    </div>    
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="inputidsupplier" class="form-label">ID Supplier</label>
                            <select class="form-control form-control-sm" id="idsupplier" name="idsupplier" autocomplete="off"
                            required>
                            <option value="0" selected>1</option>
                            <option value="1">2</option>
                            <option value="2">3</option>
                            <option value="3">4</option>
                            </select>
                        </div>
                    </div>    
                </div>-->
                <div class="mb-3">
                    <label for="inputNama-barang" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control form-control-sm" name="nama-barang" autocomplete="off" required>
                </div>
                <div class="mb-3">
                    <label for="inputjml" class="form-label">Jumlah Barang</label>
                    <input type="number" class="form-control form-control-sm" rows="3" name="jml" autocomplete="off"
                        required>
                </div>
                <div class="mb-3">
                    <label for="inputsatuan" class="form-label">Satuan</label>
                    <select class="form-control form-control-sm" rows="3" name="satuan" autocomplete="off"
                        required>
                            <option value="0" selected>1</option>
                            <option value="1">2</option>
                            <option value="2">3</option>
                            <option value="3">4</option>
                    </select>
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary" type="submit" name="submit-menu">Submit</button>
                    <button class="btn btn-danger" type="reset">Reset</button>
                </div>
            </form>
        </div>
    </div>

<!--
<div class="container justify-content-center" style="color: black;">
    <div class="row">
        <div class="mx-4">
            <h1>Tambah Barang</h1>
        </div>
    </div>
    <div class="row">
        <div class=" justify-content-center">
            <div class="card-body">
                <div class="mx-4 mt-4 mb-2">
                    <label for="id_barang class=" form-label">ID Barang</label>
                    <input class="form-control form-control-sm" name="id_barang" style="width: 1000px;" type="text">
                </div>
                <div class="d-flex flex-row bd-highlight mb-3">
                    <div class="form-group mx-4 mb-2">
                        <label for="id_kategori class=" form-label">ID Kategori</label>
                        <select class="form-control" id="id_kategori" name="id_kategori" style="width: 475px;">
                            <option value="0" selected>1</option>
                            <option value="1">2</option>
                            <option value="2">3</option>
                            <option value="3">4</option>
                        </select>
                    </div>
                    <div class="form-group mx-4 mb-2">
                        <label for="id_supplier class=" form-label">ID Supplier</label>
                        <select class="form-control" id="id_supplier" name="id_supplier" style="width: 475px;">
                            <option value="0" selected>1</option>
                            <option value="1">2</option>
                            <option value="2">3</option>
                            <option value="3">4</option>
                        </select>
                    </div>
                </div>
                <div class="mx-4 mb-2">
                    <label for="nama_barang class=" form-label">Nama Barang</label>
                    <input class="form-control form-control-sm" name="nama_barang" style="width: 1000px;" type="text">
                </div>
                <div class="d-flex flex-row bd-highlight mb-3">
                    <div class="mx-4 mb-2">
                        <label for="jumlah_barang class=" form-label">Jumlah Barang</label>
                        <input class="form-control form-control-sm" name="jumlah_barang" style="width: 475px;"
                            type="text">
                    </div>
                    <div class="form-group mx-4 mb-2">
                        <label for="satuan class=" form-label">Satuan</label>
                        <select class="form-control" id="satuan" name="satuan" style="width: 475px; height:32px;">
                            <option value="0" selected>1</option>
                            <option value="1">2</option>
                            <option value="2">3</option>
                            <option value="3">4</option>
                        </select>
                    </div>
                </div>
                <div class="d-flex flex-row bd-highlight mb-3">
                    <div class="mx-4 mb-2">
                        <label for="tanggal class=" form-label">Tanggal</label>
                        <input class="form-control form-control-sm" name="tanggal" style="width: 475px; height:31px;"
                            type="date">
                    </div>
                    <div class="mx-4 mb-2">
                        <label for="sumber_dana class=" form-label">Sumber Dana</label>
                        <input class="form-control form-control-sm" name="sumber_dana" style="width: 475px;"
                            type="text">
                    </div>
                </div>
                <div class="d-flex flex-row justify-content-center bd-highlight mb-3">
                    <button type="button" class="btn mx-3 mt-3"
                        style="background-color:#366ad0; color:white;">Save</button>
                    <button type="button" class="btn mx-3 mt-3"
                        style="background-color:#366ad0; color:white;">Reset</button>

                </div>
            </div>
        </div>
    </div>
</div>
-->