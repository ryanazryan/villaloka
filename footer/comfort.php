<?php	
session_start();

include_once("../function/connection.php");
include_once("../function/helper.php");

$page = isset($_GET['page']) ? $_GET['page'] : false;
$kategori_id = isset($_GET['kategori_id']) ? $_GET['kategori_id'] : false;

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
$nama = isset($_SESSION['nama']) ? $_SESSION['nama'] : false;
$level = isset($_SESSION['level']) ? $_SESSION['level'] : false;
$keranjang = isset($_SESSION['keranjang']) ? $_SESSION['keranjang'] : array();
$totalBarang = count($keranjang);
$module = isset($_GET['module']) ? $_GET['module'] : false;
$action = isset($_GET['action']) ? $_GET['action'] : false;
$mode = isset($_GET['mode']) ? $_GET['mode'] : false;
?>

<?php	
include_once("../function/helper.php");
$page = isset($_GET['page']) ? $_GET['page'] : false;
?>


<!DOCTYPE html>
<html lang="">
<head>
<title>villaloka</title>
<link rel="icon" href="<?php echo BASE_URL."images/villalokalogo.jpg"; ?>" media="all">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="<?php echo BASE_URL."css/layout.css"; ?>" rel="stylesheet" type="text/css" media="all"> 
<link rel="icon" href="<?php echo BASE_URL."images/logo2.png"; ?>">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
</head>
<body id="top">
<div class="bgded overlay padtop" style="background-image: url(../images/background/comfortbackground1.jpg)";>
<header class="hoc clear">
    <div class="login">
    <ul style="list-style: none;">
        <li>
          <?php	
            if($user_id){
              $queryUser = mysqli_query($koneksi, "SELECT * FROM user WHERE user_id='$user_id'");
              $rowUser=mysqli_fetch_array($queryUser);
              $rating = $rowUser["rating"];

              if($rating == "admin"){
                echo "<img src='../images/badges/admin.png' class='badges'> ";
                echo "<a style='color: #F3950D;'>Admin</a>&nbsp; ||"; 
              }
              if($rating == "diamondcard"){
                echo "<img src='../images/badges/diamond.png' class='badges'> ";
                echo "<a style='color: #30AADD; font-weight: bold; background-color: #fff; border-radius: 2px; background-size: 50px; height: 10px;'>&nbspDiamond&nbsp;</a>&nbsp; ||"; 
              }
              if($rating == "platinumcard"){
                echo "<img src='../images/badges/platinum.png' class='badges'> ";
                echo "<a style='color: #C8C6C6; font-weight: bold; background-color: #fff; border-radius: 2px; background-size: 50px; height: 10px;'>&nbspPlatinum&nbsp;</a>&nbsp; ||"; 
              }
              if($rating == "goldcard"){
                echo "<img src='../images/badges/gold.png' class='badges'> ";
                echo "<a style='color: #FFD124; font-weight: bold; background-color: #fff; border-radius: 2px; background-size: 50px; height: 10px;'>&nbspGold&nbsp;</a>&nbsp; ||"; 
              }
              if($rating == "silvercard"){
                echo "<img src='../images/badges/silver.png' class='badges'> ";
                echo "<a style='color: #A6A9B6; font-weight: bold; background-color: #fff; border-radius: 2px; background-size: 50px; height: 10px;'>&nbspSilver&nbsp;</a>&nbsp; ||"; 
              }
              if($rating == "bronzecard"){
                echo "<img src='../images/badges/bronze.png' class='badges'> ";
                echo "<a style='color: #A97155; font-weight: bold; background-color: #fff; border-radius: 2px; background-size: 50px; height: 10px;'>&nbspBronze&nbsp;</a>&nbsp; ||"; 
              }

              echo "$nama ||   
              <a href='".BASE_URL."logout.php'>LOGOUT</a>";
            } else {
              echo "<a href='".BASE_URL."index.php?page=login'>LOGIN</a>
              or
              <a href='".BASE_URL."index.php?page=register'>REGISTER</a>";
            }
          ?>
        </li>
      </ul>
    </div>
  </header>
  <header id="header" class="hoc clear">
    <div id="logo" class="fl_left">
      <h1><a href="<?php echo BASE_URL."index.php"; ?>"><img src="<?php echo BASE_URL."images/logo1.png"; ?>" class="logo"></a></h1>
    </div>
    <nav>
    </nav>
    <nav id="mainav" class="fl_right"> 
      <ul class="clear">
        <li class="active"><a href="<?php echo BASE_URL."index.php"; ?>">HOME</a></li>
        <li><a href="<?php echo BASE_URL."pages/about.php"; ?>">ABOUT</a>
        <li><a class="drop" href="#">DESTINATON</a>
          <ul>  
            <li><a href="<?php echo BASE_URL."pages/indonesia.php"; ?>">Indonesia</a></li>
            <li><a href="<?php echo BASE_URL."pages/vietnam.php"; ?>">Vietnam</a></li>
            <li><a href="<?php echo BASE_URL."pages/japan.php"; ?>">Japan</a></li>
            <li><a href="<?php echo BASE_URL."pages/china.php"; ?>">China</a></li>
            <li><a href="<?php echo BASE_URL."pages/turkey.php"; ?>">Turkey</a></li>
            <li><a href="<?php echo BASE_URL."pages/southkorea.php"; ?>">South Korea</a></li>
            <!-- <li><a href="<?php echo BASE_URL."pages/france.php"; ?>">France</a></li> -->
          </ul>
        </li>
        <li><a href="<?php echo BASE_URL."gallery.php"; ?>">Gallery</a></li>
         <!--<li><a href="#">SETTING</a></li> -->
        <?php
          if($level == "admin"){
        ?>
        <li><a class="drop" href="#">DASHBOARD</a>
          <ul>  
          <li>
            <a <?php if($module == "kategori"){echo "class='active'";} ?> href="<?php echo BASE_URL."index.php?page=my_profile&module=kategori&action=list";?>">Category</a>
          </li>
          <li>
            <a  <?php if($module == "barang"){echo "class='active'";} ?> href="<?php echo BASE_URL."index.php?page=my_profile&module=barang&action=list"; ?>">Villa</a>
          <li>
          <li>
            <a  <?php if($module == "kota"){echo "class='active'";} ?> href="<?php echo BASE_URL."index.php?page=my_profile&module=kota&action=list"; ?>">Country</a>
          </l          <li>
            <a  <?php if($module == "user"){echo "class='active'";} ?> href="<?php echo BASE_URL."index.php?page=my_profile&module=user&action=list"; ?>">User</a>
          </li>
            <li>
              <a  <?php if($module == "pesanan"){echo "class='active'";} ?>href="<?php echo BASE_URL."index.php?page=my_profile&module=pesanan&action=list"; ?>">Reserved</a>
          </li>
          </ul>
        </li>
        <?php
          }
          if($level == "guest"){
        ?>
            <li>
              <a <?php if($module == "pesanan"){echo "class='active'";} ?>href="<?php echo BASE_URL."index.php?page=my_profile&module=pesanan&action=list"; ?>">RESERVED</a>
            </li>
        <?php
          }
        ?>
      </ul>
  
    </nav>  
  </header>
  <div id="pageintro" class="hoc clear">
    <article> 
      <h3 class="heading" style="text-align: center">COMFORTABLE <h3>
       <footer>  
      </footer> 
      
    </article>
  </div>

</div>
<!-- End Top Background Image Wrapper -->
<div class="wrapper row1">
  <section id="ctdetails" class="hoc clear"> 
  
    <ul class="nospace clear">
      <li class="one_quarter first">
        <div class="block clear"><a><i class="fas fa-phone"></i></a> <span><strong>Give us a call :</strong>+62 999 8888 7777</span></div>
      </li>
      <li class="one_quarter">
        <div class="block clear"><a href="https://mail.google.com/mail/u/0/#inbox/KtbxLvHkSwSNNpQJMxgCRSXwSkVDqXQZkL?compose=GTvVlcSDXmbBCpZLXLbfjzlnQmPgJTjXXNNWMBQzpRJDFDCrhHpQWzhvswjHvnGhFkFqcBmRgktDr" target="_blank"><i class="fas fa-envelope"></i></a> <span><strong>Send us a mail :</strong> villaloka@gmail.com</span></div>
      </li>
      <li class="one_quarter">
        <div class="block clear"><a><i class="fas fa-clock"></i></a> <span><strong> Mon. - Sat :</strong> 08.00am - 18.00pm</span></div>
      </li>
      <li class="one_quarter">
        <div class="block clear"><a><i class="fas fa-map-marker-alt"></i></a> <span><strong>Come visit us :</strong> Directions to </span></div>
      </li>
    </ul>
  
  </section>

  <div class="wrapper row3" style="padding: 30px;">
    <div class="content">
      <br>
        <h1 style="text-align: center; font-size: 30px; margin-bottom: 30px;">COMFORT</h1>
        <p style="text-align: center;">often characterized as a lack of hardship. Persons who are lacking in comfort are uncomfortable, or experiencing discomfort. A degree of psychological comfort can be achieved by recreating experiences that are associated with pleasant memories, such as engaging in familiar activities, maintaining the presence of familiar objects, and consumption of comfort foods. Comfort is a particular concern in health care, as providing comfort to the sick and injured is one goal of healthcare, and can facilitate recovery. Persons who are surrounded with things that provide psychological comfort may be described as being "in their comfort zone". Because of the personal nature of positive associations, psychological comfort is highly subjective.</p>
        <br>
        <p style="text-align: center;">The use of "comfort" as a verb generally implies that the subject is in a state of pain, suffering or affliction, and requires alleviation from that state. Where the term is used to describe the support given to someone who has experienced a tragedy, the word is synonymous with consolation or solace. However, comfort is used much more broadly, as one can provide physical comfort to someone who is not in a position to be uncomfortable. For example, a person might sit in a chair without discomfort, but still find the addition of a pillow to the chair to increase their feeling of comfort. Something that provides this type of comfort, which does not seek to relieve hardship.</p>
        <br>
        <p style= text-align: center;">There are various psychological studies about the feeling of comfort, and they have resulted in a few conclusions. The idea of comfort varies among each person; however, there are a few universal themes of comfort that apply to everyone. Most of these universal themes falls under the physical comfort such as contact comfort, comfort food, and thermal comfort.</p>
        <br>
    </div>
    </div>
</div>
<div class="wrapper row4">
  <footer id="footer" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div class="one_quarter first">
      <h6 class="heading">SOCIAL MEDIA</h6>
      <p> please contact or follow us below below [<a href="#">&hellip;</a>]</p>
      <ul class="faico clear">
        <li><a class="faicon-facebook" href="#"><i class="fab fa-facebook"></i></a></li>
        <li><a class="faicon-google-plus" href="https://www.instagram.com/villaloka2022/" target="_blank"><i class="fab fa-instagram"></i></a></li>
        <li><a class="faicon-twitter" href="#"><i class="fab fa-twitter"></i></a></li>
        <li><a class="faicon-vk" href="#"><i class="fab fa-telegram"></i></a></li>
      </ul>
    </div>
    <div class="one_quarter">
      <h6 class="heading">TERMS AND SERVICES</h6>
      <ul class="nospace linklist">
        <li><a href="<?php echo BASE_URL."footer/sanitation.php"; ?>">Sanitation</a></li>
        <li><a href="<?php echo BASE_URL."footer/privacyandpolicy.php"; ?>">Privacy and Policy</a></li>
        <li><a href="<?php echo BASE_URL."footer/comfort.php"; ?>">Comfort</a></li>
        <li><a href="<?php echo BASE_URL."footer/maintain.php"; ?>">Maintain</a></li>
        <li><a href="<?php echo BASE_URL."footer/security.php"; ?>">Security</a></li>
      </ul>
    </div>
    <div class="one_quarter">
      <h6 class="heading">SUGGESTION</h6>
      <p class="nospace btmspace-15">please if there is criticism or suggestions to be submitted</p>
      <form action="<?php echo BASE_URL."suggest_process.php"; ?>" method="POST">
      <?php

        $nama = isset($_GET['nama']) ? $_GET['nama'] : false; 
        $suggestion = isset($_GET['$suggestion']) ? $_GET['$suggestion'] : false;  

      ?>
        <fieldset>
          <legend>Newsletter:</legend>
          <input class="btmspace-15" type="text" name="nama" placeholder="Name" value="<?php echo $nama; ?>" >
          <input class="btmspace-15" type="textarea" name="suggestion" placeholder="Suggestion" value="<?php echo $suggestion; ?>" >
          <button class="btn" type="submit" value="submit" onClick="alert('Thanks for the Feedback')">SEND</button>
        </fieldset>
      </form>
    </div>
    <div class="one_quarter last">
      <h6 class="heading">VILLALOKA COMPANY</h6>
      <ul class="nospace linklist">
        <li>
          <article>
            <h6 class="nospace font-x1"><a href="<?php echo BASE_URL."footer/banjarbaru.php"; ?>">BANJARBARU</a></h6>
            <time class="font-xs block btmspace-10" datetime="2045-04-06">Friday, 6<sup>th</sup> January 2043</time>
          </article>
        </li>
        <li>
          <article>
            <h6 class="nospace font-x1"><a href="<?php echo BASE_URL."footer/tokyo.php"; ?>"> TOKYO</a></h6>
            <time class="font-xs block btmspace-10" datetime="2045-04-05">Thursday, 5<sup>th</sup> April 2041</time>
          </article>
        </li>
        <li>
          <article>
            <h6 class="nospace font-x1"><a href="<?php echo BASE_URL."footer/paris.php"; ?>"> PARIS</a></h6>
            <time class="font-xs block btmspace-10" datetime="2045-04-05">Thursday, 5<sup>th</sup> April 2041</time>
          </article>
        </li>
      </ul>
    </div>
  
  </footer>
</div>
<div class="wrapper row5">
  <div id="copyright" class="hoc clear"> 
  
    <p class="fl_left">Copyright &copy; 2022 - All Rights Reserved - <a href="#">V I L L A L O K  A</a></p>
    
  </div>
</div>

<a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>

</body>
</html>