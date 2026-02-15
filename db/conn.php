<?php

$server   = "localhost";
$user     = "root";
$pass     = "";
$database = "db_inventory_management_system";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Set charset ke UTF-8
mysqli_set_charset($conn, "utf8");
