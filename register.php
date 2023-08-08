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

if($user_id){
    header("Location: ".BASE_URL);
}   
?>

<form action="<?php echo BASE_URL."register_process.php"; ?>" method="POST" class="form" style="text-align: center;">
    <div class="bgded overlay" style="background-image: url(images/background/gunung.jpg)";>
        <div id="footer">
        <?php
            $notif = isset($_GET['notif']) ? $_GET['notif'] : false;
            $nama_lengkap = isset($_GET['nama_lengkap']) ? $_GET['nama_lengkap'] : false;
            $email = isset($_GET['email']) ? $_GET['email'] : false;
    
            if($notif == "require") {
                echo "<div class='notif'>Sorry, you have to complete the form below</div>";
            }else if($notif == "password"){
                echo "<div class='notif'>Sorry, the password you entered does not match</div>";
            }else if($notif == "email"){
                echo "<div class='notif'>Sorry, the email entered is already registered</div>";
            }
        ?>

            <br> 
            <h1><a><img src="<?php echo BASE_URL."images/logo1.png"; ?>" class="logo"></a></h1>
            <br>
            <h1>REGISTER</h1>   
            <label>Full Name</label>
            <span><input style="margin-left: auto; margin-right: auto; width: 400px; color: #ffffff;" type="text" name="nama_lengkap" value="<?php echo $nama_lengkap; ?>"  /></span>
            <br>
            <label>Email Address</label>
            <span><input style="margin-left: auto; margin-right: auto; width: 400px; color: #ffffff;" type="text" name="email" value="<?php echo $email; ?>" /></span>
            <br>
            <label>Password</label>
            <span><input style="margin-left: auto; margin-right: auto; width: 400px; color: #ffffff;" type="password" name="password" /></span>
            <br>
            <label>Confirm Password</label>
            <span><input style="margin-left: auto; margin-right: auto; width: 400px; color: #ffffff;"type="password" name="re_password" /></span>
            <br>
            <span><button class="btn" type="submit">REGISTER</button></span>
        </div>
    </div>
</form>

<a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>