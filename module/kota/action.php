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

    include("../../function/connection.php");
    include("../../function/helper.php");

    $kota = $_POST['kota'];
    $status = $_POST['status'];
    $button = $_POST['button'];

    if($button == "Add"){
        mysqli_query($koneksi, "INSERT INTO kota (kota, status) VALUES('$kota','$status')");
    }
    else if($button == "Update"){
        $kota_id = $_GET['kota_id'];

        mysqli_query($koneksi, "UPDATE kota SET kota='$kota',
                                                status='$status' WHERE kota_id='$kota_id'");
    }

    header("location:".BASE_URL."index.php?page=my_profile&module=kota&action=list");
?>