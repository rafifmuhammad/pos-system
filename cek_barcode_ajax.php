<?php

require './db/conn.php';

header('Content-Type: application/json');

global $conn;

if(!isset($_POST['barcode'])){
    echo json_encode(["status"=>"error"]);
    exit;
}

$barcode = mysqli_real_escape_string($conn, $_POST['barcode']);

$query = mysqli_query($conn,"
    SELECT * FROM tb_barang
    WHERE barcode = '$barcode'
    OR nama_barang LIKE '%$barcode%'
    LIMIT 1
");

if(mysqli_num_rows($query) > 0){

    $data = mysqli_fetch_assoc($query);

    echo json_encode([
        "status"=>"exists",
        "id_barang"=>$data['id_barang'],
        "nama_barang"=>$data['nama_barang'],
        "harga_jual"=>$data['harga_jual']
    ]);

}else{
    echo json_encode([
        "status"=>"not_found"
    ]);

}
