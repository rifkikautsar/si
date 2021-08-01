<?php
include('functions.php');
$db=dbConnect();
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
 
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(10);
$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(25);
$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(10);
$spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(15);
$spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(25);
$spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(10);
$spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(15);
$spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(25);
$sheet->setCellValue('A1', 'ID Pinjam');
$sheet->setCellValue('B1', 'Nama Peminjam');
$sheet->setCellValue('C1', 'ID Barang');
$sheet->setCellValue('D1', 'Kategori');
$sheet->setCellValue('E1', 'Nama Barang');
$sheet->setCellValue('F1', 'Jumlah');
$sheet->setCellValue('G1','Tanggal Pinjam');
$sheet->setCellValue('H1','Petugas');
$query = mysqli_query($db,"SELECT p.id_pinjam, p.tgl_kembali, rp.id_barang,rp.jml_barang, b.nm_barang, k.nm_kat, a.nm_anggota, pt.nm_petugas, s.nm_satuan
FROM pengembalian p JOIN peminjaman pp USING(id_pinjam) JOIN anggota a USING(id_anggota)
JOIN rincian_peminjaman rp USING(id_pinjam) JOIN barang b USING(id_barang)
JOIN kategori_barang k USING(id_kat) JOIN petugas pt ON p.`id_petugas`=pt.`id_petugas` JOIN satuan s USING(id_satuan)");
$i = 2;
while($row = mysqli_fetch_array($query))
{
	$sheet->setCellValue('A'.$i, $row['id_pinjam']);
	$sheet->setCellValue('B'.$i, $row['nm_anggota']);
	$sheet->setCellValue('C'.$i, $row['id_barang']);
	$sheet->setCellValue('D'.$i, $row['nm_kat']);
	$sheet->setCellValue('E'.$i, $row['nm_barang']);	
	$sheet->setCellValue('F'.$i, $row['jml_barang']." ".$row['nm_satuan']);	
	$sheet->setCellValue('G'.$i, $row['tgl_kembali']);	
	$sheet->setCellValue('H'.$i, $row['nm_petugas']);	
	$i++;
}
 
$styleArray = [
			'borders' => [
				'allBorders' => [
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
				],
			],
		];
$i = $i - 1;
$sheet->getStyle('A1:H'.$i)->applyFromArray($styleArray);

$writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Data Pengembalian.xlsx"');
		ob_end_clean();
        $writer->save('php://output');
// $writer = new Xlsx($spreadsheet);
// $writer->save('Data barang.xlsx');
// echo "<script>window.location = 'Data barang.xlsx'</script>";
?>