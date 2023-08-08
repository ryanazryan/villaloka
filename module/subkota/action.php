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

    $subkota = $_POST['subkota'];
    $kota_id = $_POST['kota_id'];
    $status = $_POST['status'];
    $button = $_POST['button'];

    if($button == "Add"){
        mysqli_query($koneksi, "INSERT INTO subkota (subkota, kota_id, status) VALUES('$subkota', '$kota_id', '$status')");
    }
    else if($button == "Update"){
        $subkota_id = $_GET['subkota_id'];

        mysqli_query($koneksi, "UPDATE subkota SET subkota='$subkota', kota_id='$kota_id',
                                                status='$status' WHERE subkota_id='$subkota_id'");
    }

    header("location:".BASE_URL."index.php?page=my_profile&module=subkota&action=list");
?>