<?php	

include_once("function/connection.php");
include_once("function/helper.php");

$level = "guest";
$status = "on";
$nama_lengkap = $_POST["nama_lengkap"];
$email = $_POST["email"];
$password = $_POST["password"];
$re_password = $_POST["re_password"];

unset($_POST["password"]);
unset($_POST["re_password"]);
$dataForm = http_build_query($_POST);

$query = mysqli_query($koneksi, "SELECT * FROM user WHERE email = '$email'");

if(empty($nama_lengkap) || empty($email) || empty($password)) {
   header("location: ".BASE_URL."index.php?page=register&notif=require&$dataForm"); 
} else if($password != $re_password){
   header("location: ".BASE_URL."index.php?page=register&notif=password&$dataForm");
} else if(mysqli_num_rows($query) == 1){
   header("location: ".BASE_URL."index.php?page=register&notif=email&$dataform");
} else {
   $password = ($password);
   mysqli_query($koneksi, "INSERT INTO user (level, nama, email, password, status)
   VALUES ('$level', '$nama_lengkap', '$email', '$password', '$status')");

   header("Location: ".BASE_URL."index.php?page=login");
}

?>