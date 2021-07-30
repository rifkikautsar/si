<title>Tambah Barang</title>
<style>
h1 {
    font-size: 20px;
}
</style>
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