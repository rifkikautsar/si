<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data barang.xls");
    include("../../functions.php");
    $db=dbConnect();
?>
<table border="1">
    <tr>
        <th rowspan="2" style="width: 10%;">ID Barang</th>
        <th rowspan="2" style="width: 10%;">Kategori</th>
        <th rowspan="2" style="width: 10%;">Supplier</th>
        <th rowspan="2" style="width: 15%;">Nama Barang</th>
        <th rowspan="2" style="width: 10%;">Jml</th>
        <th colspan="3" style="width: 10%;">Keterangan</th>
        <th rowspan="2" style="width: 15%;">Tanggal</th>
    </tr>
    <tr>
        <th>Baik</th>
        <th>Ringan</th>
        <th>Rusak</th>
    </tr>
    <tbody>
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
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>