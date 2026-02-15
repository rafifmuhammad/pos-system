<?php
require './db/conn.php';
header('Content-Type: application/json');

if (!isset($_POST['cart']) || empty($_POST['cart'])) {
    echo json_encode(["status" => "error", "message" => "Cart kosong"]);
    exit;
}

$cart = json_decode($_POST['cart'], true);
if (!$cart) {
    echo json_encode(["status" => "error", "message" => "Format cart tidak valid"]);
    exit;
}

$id_penjualan = $_POST['id_penjualan'] ?? uniqid();
$id_kasir     = $_POST['id_kasir'] ?? 'KSR001';
$tanggal      = date('Y-m-d');

mysqli_begin_transaction($conn);

try {
    $total = 0;
    foreach ($cart as $item) {
        $total += $item['qty'] * $item['harga'];
    }

    $cek_penjualan = mysqli_query(
        $conn,
        "SELECT id_penjualan 
         FROM tb_penjualan 
         WHERE id_penjualan = '$id_penjualan' 
         LIMIT 1"
    );

    if (mysqli_num_rows($cek_penjualan) == 0) {

        mysqli_query(
            $conn,
            "INSERT INTO tb_penjualan 
            (id_penjualan, id_kasir, total, tanggal)
            VALUES 
            ('$id_penjualan', '$id_kasir', $total, '$tanggal')"
        );
    }

    foreach ($cart as $barcode => $item) {

        $id_detail = uniqid();
        $id_keluar = uniqid();
        $id_barang = $item['id_barang'];
        $qty       = (int)$item['qty'];
        $harga     = (int)$item['harga'];
        $subtotal  = $qty * $harga;

        mysqli_query(
            $conn,
            "INSERT INTO tb_detail_penjualan
            (id_detail, id_penjualan, id_barang, jumlah, harga, subtotal, created_at)
            VALUES
            ('$id_detail', '$id_penjualan', '$id_barang', $qty, $harga, $subtotal, '$tanggal')"
        );

        mysqli_query(
            $conn,
            "INSERT INTO tb_barang_keluar
            (id_barang, id_keluar, jumlah, tanggal_keluar)
            VALUES
            ('$id_barang', '$id_keluar', $qty, '$tanggal')"
        );
    }

    mysqli_commit($conn);

    echo json_encode([
        "status" => "success",
        "id_penjualan" => $id_penjualan
    ]);
    exit;

} catch (Exception $e) {
    mysqli_rollback($conn);
    echo json_encode(["status" => "error", "message" => "Gagal simpan transaksi"]);
    exit;
}
