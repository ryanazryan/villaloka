<?php 

include_once("function/connection.php");
include_once("function/helper.php");

session_start();

$nama_penerima = $_POST['nama_penerima'];
$nomor_telepon = $_POST['nomor_telepon'];
$check_in = $_POST['check_in'];
$check_out = $_POST['check_out'];

$user_id = $_SESSION['user_id'];
$waktu_saat_ini = date("Y-m-d H:i:s");

$queryRating = mysqli_query($koneksi, "SELECT * FROM user WHERE user_id='$user_id'");
$rowRating = mysqli_fetch_array($queryRating);
$rating = $rowRating["rating"];

$query = mysqli_query($koneksi, "INSERT INTO pesanan (nama_penerima, user_id, rating, nomor_telepon, tanggal_pemesanan, check_in, check_out, status) VALUES ('$nama_penerima','$user_id','$rating','$nomor_telepon','$waktu_saat_ini','$check_in','$check_out','0')");

if($query){
    $last_pesanan_id = mysqli_insert_id($koneksi);

    $keranjang = $_SESSION['keranjang'];

    foreach($keranjang AS $key => $value){
        $barang_id = $key;
        $quantity = $value['quantity'];
        $harga = $value['harga'];

        mysqli_query($koneksi, "INSERT INTO pesanan_detail(pesanan_id, barang_id, quantity, harga) VALUES ('$last_pesanan_id','$barang_id','$quantity','$harga')");
    }

    unset($_SESSION["keranjang"]);

    header("location:".BASE_URL."index.php?page=my_profile&module=pesanan&action=detail&pesanan_id=$last_pesanan_id");
}

?>