<?php
include('functions.php');
require 'vendor/autoload.php';
$db=dbConnect();
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\IOFactory;

$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');


if(isset($_FILES['file']['name']) && in_array($_FILES['file']['type'], $file_mimes)) {
 
    $arr_file = explode('.', $_FILES['file']['name']);
    $extension = end($arr_file);
 
    if('csv' == $extension) {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
    } else {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    }
 
    $spreadsheet = $reader->load($_FILES['file']['tmp_name']);

    $sheetData = $spreadsheet->getActiveSheet()->toArray();
	for($i = 1;$i < count($sheetData);$i++)
	{
        
        $id = $sheetData[$i]['0'];
        $id_kat = $sheetData[$i]['1'];
        $id_sup = $sheetData[$i]['2'];
        $nama = $sheetData[$i]['3'];
        $jml = $sheetData[$i]['4'];
        $sat = $sheetData[$i]['5'];
        $baik = $sheetData[$i]['6'];
        $rusak = $sheetData[$i]['7'];
        $berat = $sheetData[$i]['8'];
        $tgl = $sheetData[$i]['9'];
        $sumber = $sheetData[$i]['10'];

        mysqli_query($db,"insert into barang (id_barang,id_kat,id_supplier,nm_barang,jumlah,satuan,tanggal) values ('$id','$id_kat','$id_sup','$nama','$jml','$sat','$tgl')");
        mysqli_query($db,"insert into rincian_barang(id_barang,baik,rusak,rusak_berat,sumber) values('$id','$baik','$rusak','$berat','$sumber')");
    }
    // hapus kembali file .xls yang di upload tadi
    unlink($_FILES['file']['name']);
    header("Location: tes-brg.php"); 
}
?>