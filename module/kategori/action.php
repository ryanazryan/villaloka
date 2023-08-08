<script src=
    "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
</script>
  
<script>
    $(document).ready(function() {
            $("html, body").animate({
                scrollTop: 
                $('html, body').get(0).scrollHeight}, 1000);
            });
</script>
<?php	
include("../../function/helper.php");
include("../../function/connection.php");

$kategori = $_POST['kategori'];
$status = $_POST['status'];
$button = $_POST['button'];

if($button == "Add"){
    mysqli_query($koneksi, "INSERT INTO kategori (kategori, status) VALUES('$kategori', '$status')");
} else if($button == "Update"){
    $kategori_id = $_GET['kategori_id'];

    mysqli_query($koneksi, "UPDATE kategori SET kategori='$kategori', status='$status' WHERE kategori_id='$kategori_id'");
}

header("location: ".BASE_URL."index.php?page=my_profile&module=kategori&action=list");
?>