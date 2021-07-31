<?php
include("../../functions.php");
$db=dbConnect();
?>
<style>
.table>tbody>tr>* {
    vertical-align: middle;
    text-align: center;
    color: black;
}

th {
    text-align: center;
}

th,
td {
    font-size: 12px;
}
</style>
<title>Data Barang</title>
<div class="container-fluid" style="height: 445px; overflow: scroll;">
    <div class="row">
        <form action="" method="post">
            <div class="mb-3">
                <!--<label for="inputidbarang" class="form-label">ID Barang</label>
                <span class="input-group-text">M</span>-->
                <input type="text" class="form-control form-control-sm" name="keyword" placeholder="Cari Barang"
                    id="keyword" autocomplete="off" size="50">
            </div>
        </form>
    </div>
    <div class="row pb-2">
        <a href="index.php?page=tambah-barang" class="btn btn-success">Tambah</a>
    </div>
    <div id="container">
        <div class="row">
            <table class="table table-bordered table-responsive-sm">
                <tr>
                    <th rowspan="2" style="width: 10%;">ID Barang</th>
                    <th rowspan="2" style="width: 10%;">Kategori</th>
                    <th rowspan="2" style="width: 10%;">Supplier</th>
                    <th rowspan="2" style="width: 15%;">Nama Barang</th>
                    <th rowspan="2" style="width: 10%;">Jml</th>
                    <th colspan="3" style="width: 10%;">Keterangan</th>
                    <th rowspan="2" style="width: 15%;">Tanggal</th>
                    <th rowspan="2" colspan="2" style="width: 20%;">Aksi</th>
                </tr>
                <tr>
                    <th>Baik</th>
                    <th>Ringan</th>
                    <th>Rusak</th>
                </tr>
                <tbody>
                    <form action="" method="post">
                        <?php $k = getDataBarang(); 
                foreach($k as $row):?>
                        <tr>
                            <td><?=$row['id_barang'];?></td>
                            <td><?=$row['nm_kat'];?></td>
                            <td><?=$row['nm_supplier'];?></td>
                            <td><?=$row['nm_barang'];?></td>
                            <td><?=$row['jumlah']." ".$row['nm_satuan']?></td>
                            <td><?=$row['baik'];?></td>
                            <td><?=$row['rusak'];?></td>
                            <td><?=$row['rusak_berat'];?></td>
                            <td><?=$row['tanggal'];?></td>
                            <td><button type="button" class="btn btn-primary edit-data" id="<?=$row['id_barang'];?>"
                                    name="edit">Edit</button>
                            </td>
                            <td><button type="button" class="btn btn-danger hapus-data" name="hapus"
                                    id="<?=$row['id_barang'];?>">Delete</button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </form>
                </tbody>
            </table>
            <!-- Modal Edit -->
            <form action="" method="post" id="insert_form">
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Edit Data</h5>
                            </div>

                            <div class="modal-body">
                                <table class="table table-borderless">
                                    <tr>
                                        <td>ID Barang</td>
                                        <td colspan="3"><input type="text" class="form-control" readonly
                                                name="id_barang" id="id_barang">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nama Barang</td>
                                        <td colspan="3"><input type="text" class="form-control" name="nm_barang"
                                                autocomplete="off" id="nm_barang">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Kategori</td>
                                        <td colspan="3">
                                            <select class="form-control" id="kategori" name="kategori" required>
                                                <?php $d = getKategori();
                                        foreach($d as $kat):?>
                                                <option value="<?=$kat['id_kat'];?>"><?=$kat['nm_kat'] ?>
                                                    <?php endforeach; ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Supplier</td>
                                        <td colspan="3"><select name="supplier" class="form-control" id="supplier">
                                                <?php $s = getSupplier();
                                    foreach($s as $dt):?>
                                                <option value="<?=$dt['id_supplier'];?>"><?=$dt['nm_supplier'];?>
                                                </option>
                                                <?php endforeach;?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah</td>
                                        <td><input type="text" class="form-control" readonly name="jml" id="jml"
                                                autocomplete="off" style="width: 5rem;">
                                        </td>
                                        <td>Satuan</td>
                                        <td><select name="satuan" id="satuan" autocomplete="off" class="form-control">
                                                <?php $k = getSatuan();
                                    foreach($k as $dt):?>
                                                <option value="<?=$dt['id_satuan'];?>"><?=$dt['nm_satuan'];?></option>
                                                <?php endforeach;?>
                                            </select></td>
                                    </tr>
                                    <tr>
                                        <td>Baik</td>
                                        <td colspan="3"><input type="text" autocomplete="off" name="baik" id="baik"
                                                class="form-control" style="width: 5rem;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Rusak ringan</td>
                                        <td colspan="3"><input type="text" name="ringan" autocomplete="off" id="ringan"
                                                class="form-control" style="width: 5rem;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Rusak Berat</td>
                                        <td colspan="3"><input type="text" name="berat" id="berat" autocomplete="off"
                                                class="form-control" style="width: 5rem;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal</td>
                                        <td colspan="3"><input type="date" class="form-control" name="tanggal"
                                                id="tanggal" style="width: 15rem;">
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>Sumber</td>
                                        <td colspan="3"><select name="sumber" id="sumber" class="form-control"
                                                style="width: 15rem;">
                                                <option value="APBD">APBD</option>
                                                <option value="mandiri">Mandiri</option>
                                            </select></td>
                                    </tr>
                                </table>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success" name="insert" id="insert"
                                    value="Insert">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
$(".edit-data").on("click", function() {
    var id_barang = $(this).attr("id");
    $.ajax({
        url: "getdetail.php",
        method: "post",
        dataType: "json",
        data: {
            id_barang: id_barang
        },
        success: function(resp) {
            if (resp.status === "OK") {
                $("#id_barang").val(resp.data.id_barang);
                $("#nm_barang").val(resp.data.nm_barang);
                $("#kategori").val(resp.data.id_kat);
                $("#supplier").val(resp.data.id_supplier);
                $("#jml").val(resp.data.jumlah);
                $("#satuan").val(resp.data.id_satuan);
                $("#baik").val(resp.data.baik);
                $("#ringan").val(resp.data.rusak);
                $("#berat").val(resp.data.rusak_berat);
                $("#tanggal").val(resp.data.tanggal);
                $("#sumber").val(resp.data.sumber);
                $("#staticBackdrop").modal("show");
            }
        }
    })
})
$("#baik").on("blur", function() {
    var ringan = parseInt($("#ringan").val());
    var jml = parseInt($("#jml").val());
    var baik = parseInt($("#baik").val());
    var berat = parseInt($("#berat").val());
    if (ringan == 0) {
        $("#jml").val(baik + berat);
    } else if (berat == 0) {
        $("#jml").val(baik + ringan);
    } else {
        $("#jml").val(baik + ringan + berat);
    }
})
$("#ringan").on("blur", function() {
    var ringan = parseInt($("#ringan").val());
    var jml = parseInt($("#jml").val());
    var baik = parseInt($("#baik").val());
    var berat = parseInt($("#berat").val());
    if (baik == 0) {
        $("#jml").val(ringan + berat);
    } else if (berat == 0) {
        $("#jml").val(ringan + baik);
    } else {
        $("#jml").val(baik + ringan + berat);
    }
})
$("#berat").on("blur", function() {
    var ringan = parseInt($("#ringan").val());
    var jml = parseInt($("#jml").val());
    var baik = parseInt($("#baik").val());
    var berat = parseInt($("#berat").val());
    if (baik == 0) {
        $("#jml").val(berat + ringan);
    } else if (ringan == 0) {
        $("#jml").val(berat + baik);
    } else {
        $("#jml").val(baik + ringan + berat);
    }
})
$('#insert_form').on("submit", function(event) {
    event.preventDefault();
    if ($("#nm_barang").val() == "") {
        alert("Nama barang tidak boleh kosong");
    } else if ($("#tanggal").val() == '') {
        alert("Tanggal tidak boleh kosong");
    } else {
        $.ajax({
            url: "ubah.php",
            method: "POST",
            data: $('#insert_form').serialize(),
            beforeSend: function() {
                $('#insert').val("Inserting");
            },
            success: function(data) {
                if (data === "OK") {
                    Swal.fire({
                        title: 'Data berhasil diubah',
                        icon: 'success',
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ok!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.location.href = "index.php?page=barang";
                        }
                    })
                } else {
                    Swal.fire({
                        title: 'Data gagal diubah',
                        text: data,
                        icon: 'error',
                        showCloseButton: true,
                    })
                }
            },
        });
    }
})
$(document).ready(function() {
    $("#keyword").on('keyup', function() {
        $keyword = $("#keyword").val();
        $("#container").load("cari.php?keyword=" + encodeURI($keyword));
    });

    $(".hapus-data").on("click", function() {
        var id_barang = $(this).attr("id");
        Swal.fire({
            title: 'Apakah anda ingin menghapus data barang?',
            icon: 'warning',
            allowOutsideClick: false,
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            cancelButtonText: 'Kembali',
            confirmButtonText: 'Hapus'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "delete.php",
                    method: "post",
                    data: {
                        id_barang: id_barang
                    },
                    success: function(data) {
                        if (data === "OK") {
                            Swal.fire({
                                title: 'Data berhasil dihapus',
                                icon: 'success',
                                confirmButtonText: `Ok`
                            }).then((result) => {
                                document.location.href =
                                    'index.php?page=barang'
                            })
                        } else {
                            Swal.fire({
                                title: 'Data gagal dihapus',
                                text: data,
                                icon: 'error',
                                showCloseButton: true
                            })
                        }
                    }
                })
            }
        })
    })
});
</script>