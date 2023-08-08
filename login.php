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

if ($user_id) {
    header("location: ".BASE_URL);
}

?>

<form action="<?php echo BASE_URL."login_process.php"; ?>" method="POST" style="text-align: center;">

<div class="bgded overlay" style="background-image: url(images/background/gunung.jpg)";>
<div id="footer">
<?php 

$notif = isset($_GET['notif']) ? $_GET['notif'] : false;

if ($notif == true) {
    echo "Email or Password are Incorrect";
}

?>
<br><br>
<h1><a><img src="<?php echo BASE_URL."images/logo1.png"; ?>" class="logo"></a></h1>
<br>
<h1>LOGIN</h1>
<br>
<label for="">Email Address</label>
<span><input style="margin-left: auto; margin-right: auto; width: 400px;" type="text" name="email"></span>
<br>
<label for="">Password</label>
<span><input style="margin-left: auto; margin-right: auto; width: 400px;" type="Password" name="password"></span>
<br><br>
<span><button class="btn" type="submit">Login</button></span>
<br><br>
</div>
</div>
</form>

<a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>