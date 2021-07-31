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
$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(15);
$spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(35);
$spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(10);
$spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(10);
$spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(10);
$spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(13);
$spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(15);
$sheet->setCellValue('A1', 'ID Barang');
$sheet->mergeCells('A1:A2');
$sheet->setCellValue('B1', 'Kategori');
$sheet->mergeCells('B1:B2');
$sheet->setCellValue('C1', 'Supplier');
$sheet->mergeCells('C1:C2');
$sheet->setCellValue('D1', 'Nama Barang');
$sheet->mergeCells('D1:D2');
$sheet->setCellValue('E1', 'Jumlah');
$sheet->mergeCells('E1:E2');
$sheet->setCellValue('F1','Keterangan');
$sheet->mergeCells('F1:H1');
$sheet->setCellValue('F2','Baik');
$sheet->setCellValue('G2','Ringan');
$sheet->setCellValue('H2','Rusak Berat');
$sheet->setCellValue('I1','Tanggal Terima');
$query = mysqli_query($db,"SELECT b.id_barang,b.nm_barang,b.tanggal, b.jumlah,k.nm_kat,s.nm_supplier,st.nm_satuan,rb.baik,rb.rusak,rb.rusak_berat,rb.sumber from barang b join rincian_barang rb using(id_barang) join kategori_barang k using(id_kat) join satuan st using(id_satuan) join supplier s using(id_supplier)");
$i = 3;
while($row = mysqli_fetch_array($query))
{
	$sheet->setCellValue('A'.$i, $row['id_barang']);
	$sheet->setCellValue('B'.$i, $row['nm_kat']);
	$sheet->setCellValue('C'.$i, $row['nm_supplier']);
	$sheet->setCellValue('D'.$i, $row['nm_barang']);	
	$sheet->setCellValue('E'.$i, $row['jumlah']." ".$row['nm_satuan']);	
	$sheet->setCellValue('F'.$i, $row['baik']);	
	$sheet->setCellValue('G'.$i, $row['rusak']);	
	$sheet->setCellValue('H'.$i, $row['rusak_berat']);	
	$sheet->setCellValue('I'.$i, $row['tanggal']);	
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
$sheet->getStyle('A1:I'.$i)->applyFromArray($styleArray);

$writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Data Barang.xlsx"');
		ob_end_clean();
        $writer->save('php://output');
// $writer = new Xlsx($spreadsheet);
// $writer->save('Data barang.xlsx');
// echo "<script>window.location = 'Data barang.xlsx'</script>";
?>