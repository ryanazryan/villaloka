<?php	

include_once("function/connection.php");
include_once("function/helper.php");

$nama = $_POST["nama"];
$suggestion = $_POST["suggestion"];


mysqli_query($koneksi, "INSERT INTO saran (nama,  suggestion) VALUES ('$nama', '$suggestion')");


 header("Location: ".BASE_URL."index.php?pesan=input");


?>