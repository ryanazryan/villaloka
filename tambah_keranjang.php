<?php

include_once("function/connection.php");
include_once("function/helper.php");

if (!isset($_SESSION)) {

    session_start();
    
    }

$barang_id = $_GET['barang_id'];  
$keranjang = isset($_SESSION['keranjang']) ? $_SESSION['keranjang'] : false;

$query = mysqli_query($koneksi, "SELECT nama_barang, gambar, harga FROM barang WHERE barang_id='$barang_id'");
$row = mysqli_fetch_assoc($query);

$keranjang[$barang_id] = array("nama_barang" => $row["nama_barang"],"gambar" => $row["gambar"],"harga" => $row["harga"],"quantity" => 1);

$_SESSION["keranjang"] = $keranjang;

?>