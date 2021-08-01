<?php
if(isset($_POST['id_pinjam'])){
    $output = '';
    include("../../functions.php");
    $db=dbConnect();
    $k = getRincianPeminjaman($_POST['id_pinjam']);
    $output .= "
    <table class='table table-borderless' style='color:black;'>";
    foreach($k as $row){
        $output .= '
        <tr>
            <td>'.$row["nm_barang"].'</td>
            <td>'.$row["jml_barang"].'</td>
        </tr>';
    };
$output .= "</table>";
echo $output;
};
?>