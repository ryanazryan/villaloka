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

    $user_id = $_GET['user_id'];

    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $rating = $_POST["rating"];
    $level = $_POST["level"];
    $status = $_POST["status"];

    mysqli_query($koneksi, "UPDATE user SET nama='$nama', 
                                            email='$email',
                                            rating='$rating',
                                            level='$level', 
                                            status='$status'
                                            WHERE user_id='$user_id'");

    header("Location: ".BASE_URL."index.php?page=my_profile&module=user&action=list");                                        
?>