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
<link rel="icon" href="<?php echo BASE_URL."images/logo2.png"; ?>" media="all">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="<?php echo BASE_URL."css/layout.css"; ?>" rel="stylesheet" type="text/css" media="all"> 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
</head>
<body id="top">
<div class="bgded overlay padtop" style="background-image: url(../images/background/tokyobackground.jpg); background-size: cover;";>
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
          </li>
          <li>
            <a  <?php if($module == "user"){echo "class='active'";} ?> href="<?php echo BASE_URL."index.php?page=my_profile&module=user&action=list"; ?>">User</a>
          </li>
            <li>
              <a  <?php if($module == "pesanan"){echo "class='active'";} ?>href="<?php echo BASE_URL."index.php?page=my_profile&module=pesanan&action=list"; ?>">Reserved</a>
          </li>
          <li>
              <a  <?php if($module == "saran"){echo "class='active'";} ?>href="<?php echo BASE_URL."index.php?page=my_profile&module=saran&action=list"; ?>">Suggestions</a>
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
      <h3 class="heading" style="text-align: center;">T O K Y O</h3>
      <p style="text-align: center;">私たちとの一体感と幸せの瞬間をお楽しみください</p>
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
        <div class="block clear"><a  href="https://mail.google.com/mail/u/0/#inbox/KtbxLvHkSwSNNpQJMxgCRSXwSkVDqXQZkL?compose=GTvVlcSDXmbBCpZLXLbfjzlnQmPgJTjXXNNWMBQzpRJDFDCrhHpQWzhvswjHvnGhFkFqcBmRgktDr" target="_blank"><i class="fas fa-envelope"></i></a> <span><strong>Send us a mail :</strong> villaloka2022@gmail.com</span></div>
      </li>
      <li class="one_quarter">
        <div class="block clear"><a><i class="fas fa-clock"></i></a> <span><strong> Mon. - Sat :</strong> 08.00am - 18.00pm</span></div>
      </li>
      <li class="one_quarter">
        <div class="block clear"><a href='https://www.google.com/maps/place/Tokyo,+Japan/@35.6681625,139.6007813,11z/data=!3m1!4b1!4m5!3m4!1s0x60188b857628235d:0xcdd8aef709a2b520!8m2!3d35.6803997!4d139.7690174' target='_blank'><i class="fas fa-map-marker-alt"></i></a> <span><strong>Come visit us :</strong> Directions to </span></div>
      </li>
    </ul>
  
  </section>

  <div class="wrapper row3">
    <div class="content" style="padding: 30px;">
      <br>
      <h1 style="text-align: center; font-size: 30px; margin-bottom: 30px; ">TOKYO</h1>
      <p style="text-align: center; "><b>Tokyo</b> is the capital city of Japan, historically Tokio and officially the Tokyo Metropolis (東京都, Tōkyō-to), is the capital and largest city of Japan. Its metropolitan area is the most populous in the world, with an estimated 37.468 million residents in 2018. Located at the head of Tokyo Bay, the prefecture forms part of the Kantō region on the central Pacific coast of Japan's main island of Honshu. Tokyo is the political and economic center of the country, as well as the seat of the Emperor of Japan and the national government. As of 2021, the prefecture has an estimated population of 14.04 million.</p>
      <br>
      <p style="text-align: center; ">Originally a fishing village, named Edo, the city became a prominent political center in 1603, when it became the seat of the Tokugawa shogunate. By the mid-18th century, Edo was one of the most populous cities in the world at over one million. Following the end of the shogunate in 1868, the imperial capital in Kyoto was moved to the city, which was renamed Tokyo (literally "eastern capital"). Tokyo was devastated by the 1923 Great Kantō earthquake, and again by Allied bombing raids during World War II. Beginning in the 1950s, the city underwent rapid reconstruction and expansion, going on to lead Japan's post-war economic recovery. Since 1943, the Tokyo Metropolitan Government has administered the prefecture's 23 special wards (formerly Tokyo City), various bed towns and suburbs in the western area, and two outlying island chains.</p>
      <br>
      <p style="text-align: center; ">Tokyo is the largest urban economy in the world by gross domestic product, and is categorized as an Alpha+ city by the Globalization and World Cities Research Network. Part of an industrial region that includes the cities of Yokohama, Kawasaki, and Chiba, Tokyo is Japan's leading center of business and finance. In 2019, it hosted 36 of the Fortune Global 500 companies. In 2020, it ranked fourth on the Global Financial Centres Index, behind New York City, London, and Shanghai. Tokyo has the world's tallest tower, Tokyo Skytree, and the world's largest underground floodwater diversion facility, MAOUDC. The Tokyo Metro Ginza Line is the oldest underground metro line in East Asia (1927).</p>
      <br>
      <p style="text-align: center; ">The city has hosted multiple international events, including the 1964 Summer Olympics and Paralympics, the postponed 2020 Summer Olympics and Paralympics and three G7 Summits (1979, 1986, and 1993). Tokyo is an international center of research and development and is represented by several major universities, notably the University of Tokyo. Tokyo Station is the central hub for Japan's Shinkansen bullet train system, and the city is served by an extensive network of rail and subways. Shinjuku Station is also the world's busiest train station. Notable districts of Tokyo include Chiyoda (the site of the National Diet Building and the Imperial Palace), Shinjuku (the city's administrative center), and Shibuya (a commercial, cultural and business hub)</p>
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