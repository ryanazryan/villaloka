<?php	
session_start();

include_once("function/connection.php");
include_once("function/helper.php");

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
include_once("function/helper.php");
$page = isset($_GET['page']) ? $_GET['page'] : false;
?>


<!DOCTYPE html>
<html lang="">
<head>
<title>VILLALOKA</title>
<link rel="icon" href="<?php echo BASE_URL."images/logo2.png"; ?>">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="<?php echo BASE_URL."css/layout.css"; ?>" rel="stylesheet" type="text/css" media="all"> 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
</head>

<style>


.mySlides {
display: none;

}
.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 40%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: white;
  font-weight: bold;
  font-size: 20px;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* Container for image text */
.caption-container {
  text-align: center;
  background-color: #222;
  padding: 2px 16px;
  color: white;
}
row:after {
  content: "";
  display: table;
  clear: both;
}

/* Six columns side by side */
.column {
  float: left;
  width: 16.66%;
}

/* Add a transparency effect for thumnbail images */
.demo {
  opacity: 0.6;
}

.active,
.demo:hover {
  opacity: 1;
}
.cursor {
  cursor: pointer;
}
</style>

<body id="top">
<div class="bgded overlay " style="background-image: url(images/background/gallery1.jpg)";>
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
                echo "<img src='images/badges/admin.png' class='badges'> ";
                echo "<a style='color: #F3950D;'>Admin</a>&nbsp; ||"; 
              }
              if($rating == "diamondcard"){
                echo "<img src='images/badges/diamond.png' class='badges'> ";
                echo "<a style='color: #30AADD; font-weight: bold; background-color: #fff; border-radius: 2px; background-size: 50px; height: 10px;'>&nbspDiamond&nbsp;</a>&nbsp; ||"; 
              }
              if($rating == "platinumcard"){
                echo "<img src='images/badges/platinum.png' class='badges'> ";
                echo "<a style='color: #C8C6C6; font-weight: bold; background-color: #fff; border-radius: 2px; background-size: 50px; height: 10px;'>&nbspPlatinum&nbsp;</a>&nbsp; ||"; 
              }
              if($rating == "goldcard"){
                echo "<img src='images/badges/gold.png' class='badges'> ";
                echo "<a style='color: #FFD124; font-weight: bold; background-color: #fff; border-radius: 2px; background-size: 50px; height: 10px;'>&nbspGold&nbsp;</a>&nbsp; ||"; 
              }
              if($rating == "silvercard"){
                echo "<img src='images/badges/silver.png' class='badges'> ";
                echo "<a style='color: #A6A9B6; font-weight: bold; background-color: #fff; border-radius: 2px; background-size: 50px; height: 10px;'>&nbspSilver&nbsp;</a>&nbsp; ||"; 
              }
              if($rating == "bronzecard"){
                echo "<img src='images/badges/bronze.png' class='badges'> ";
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
            <li><a class="drop" href="<?php echo BASE_URL."pages/indonesia.php"; ?>">Indonesia</a>
              <ul>
                <li><a href ="<?php echo BASE_URL."pages/indonesia/jakarta.php"; ?>">Jakarta</a>
                <li><a href ="<?php echo BASE_URL."pages/indonesia/bogor.php"; ?>">Bogor</a>
                <li><a href ="<?php echo BASE_URL."pages/indonesia/makassar.php"; ?>">Makassar</a>
                <li><a href ="<?php echo BASE_URL."pages/indonesia/surabaya.php"; ?>">Surabaya</a>
                <li><a href ="<?php echo BASE_URL."pages/indonesia/bali.php"; ?>">Bali</a>
                <li><a href ="<?php echo BASE_URL."pages/indonesia/banjarbaru.php"; ?>">Banjarbaru</a>
              </ul>
            </li>
            <li><a class="drop" href="<?php echo BASE_URL."pages/vietnam.php"; ?>">Vietnam</a>
              <ul>
                <li><a href ="<?php echo BASE_URL."pages/vietnam/hanoi.php"; ?>">Hanoi</a>
                <li><a href ="<?php echo BASE_URL."pages/vietnam/hochiminhcity.php"; ?>">Ho Chi Minh City</a>
                <li><a href ="<?php echo BASE_URL."pages/vietnam/hue.php"; ?>">Hue</a>
                <li><a href ="<?php echo BASE_URL."pages/vietnam/bienhoa.php"; ?>">Bien Hoa</a>
                <li><a href ="<?php echo BASE_URL."pages/vietnam/danang.php"; ?>">Da Nang</a>
                <li><a href ="<?php echo BASE_URL."pages/vietnam/haiphong.php"; ?>">Haiphong</a>
              </ul>
            </li>
            <li><a class="drop" href="<?php echo BASE_URL."pages/japan.php"; ?>">Japan</a>
              <ul>
                <li><a href ="<?php echo BASE_URL."pages/japan/tokyo.php"; ?>">Tokyo</a>
                <li><a href ="<?php echo BASE_URL."pages/japan/yokohama.php"; ?>">Yokohama</a>
                <li><a href ="<?php echo BASE_URL."pages/japan/nagoya.php"; ?>">Nagoya</a>
                <li><a href ="<?php echo BASE_URL."pages/japan/osaka.php"; ?>">Osaka</a>
                <li><a href ="<?php echo BASE_URL."pages/japan/sapporo.php"; ?>">Sapporo</a>
                <li><a href ="<?php echo BASE_URL."pages/japan/kobe.php"; ?>">Kobe</a>
              </ul>
            </li>
            <li><a class="drop" href="<?php echo BASE_URL."pages/china.php"; ?>">China</a>
              <ul>
                <li><a href ="<?php echo BASE_URL."pages/china/beijing.php"; ?>">Beijing</a>
                <li><a href ="<?php echo BASE_URL."pages/china/shanghai.php"; ?>">Shanghai</a>
                <li><a href ="<?php echo BASE_URL."pages/china/shenzhen.php"; ?>">Shenzhen</a>
                <li><a href ="<?php echo BASE_URL."pages/china/guangzhou.php"; ?>">Guangzhou</a>
                <li><a href ="<?php echo BASE_URL."pages/china/chongqing.php"; ?>">Chongqing</a>
                <li><a href ="<?php echo BASE_URL."pages/china/tianjin.php"; ?>">Tianjin</a>
              </ul>
            </li>
            <li><a class="drop" href="<?php echo BASE_URL."pages/turkey.php"; ?>">Turkey</a>
              <ul>
                <li><a href ="<?php echo BASE_URL."pages/turkey/istanbul.php"; ?>">Istanbul</a>
                <li><a href ="<?php echo BASE_URL."pages/turkey/bursa.php"; ?>">Bursa</a>
                <li><a href ="<?php echo BASE_URL."pages/turkey/izmir.php"; ?>">Izmir</a>
                <li><a href ="<?php echo BASE_URL."pages/turkey/gaziantep.php"; ?>">Gaziantep</a>
                <li><a href ="<?php echo BASE_URL."pages/turkey/adana.php"; ?>">Adana</a>
                <li><a href ="<?php echo BASE_URL."pages/turkey/ankara.php"; ?>">Ankara</a>
              </ul>
            </li>
            <li><a class="drop" href="<?php echo BASE_URL."pages/southkorea.php"; ?>">South Korea</a>
              <ul>
                <li><a href ="<?php echo BASE_URL."pages/southkorea/seoul.php"; ?>">Seoul</a>
                <li><a href ="<?php echo BASE_URL."pages/southkorea/busan.php"; ?>">Busan</a>
                <li><a href ="<?php echo BASE_URL."pages/southkorea/jeonju.php"; ?>">Jeonju</a>
                <li><a href ="<?php echo BASE_URL."pages/southkorea/daejeon.php"; ?>">Daejeon</a>
                <li><a href ="<?php echo BASE_URL."pages/southkorea/incheon.php"; ?>">Incheon</a>
                <li><a href ="<?php echo BASE_URL."pages/southkorea/daegu.php"; ?>">Daegu</a>
              </ul>
            </li>
            
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
      <h3 class="heading" style="text-align: center">G A L L E R Y</h3>
      <p style="text-align: center;">The Art of Villa</p>
       <footer>  
      </footer> 
      
    </article>
  </div>

</div>
<!-- End Top Background Image Wrapper -->
<div class="wrapper row1" style="background-color: black;">
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
        <div class="block clear"><a href="map.php"><i class="fas fa-map-marker-alt"></i></a> <span><strong>Come visit us :</strong> Directions to <a style="color: white;">Your Location</a></span></div>
      </li>
    </ul>
  
  </section>

  <div class="wrapper row3" style="background-color: #222;">
    <div class="content">
        <br>
        <h1 style="text-align: center;color: white; font-size: 30px; margin-bottom: 30px;">GALLERY</h1>
        <p style="text-align: center; color: white; font-size: 15px;">Enjoy and Make The Closest People Happy In Your Best Way</p>
        <div class="container">

  <!-- Full-width images with number text -->
  <div class="mySlides">
    <div class="numbertext">1 / 12</div>
      <img src="images/background/gallery2.jpg" style="width:100%">
  </div>

  <div class="mySlides">
    <div class="numbertext">2 / 12</div>
      <img src="images/background/gallery3.jpg" style="width:100%">
  </div>

  <div class="mySlides">
    <div class="numbertext">3 / 12</div>
      <img src="images/background/gallery4.jpg" style="width:100%">
  </div>

  <div class="mySlides">
    <div class="numbertext">4 / 12</div>
      <img src="images/background/gallery5.jpg" style="width:100%">
  </div>

  <div class="mySlides">
    <div class="numbertext">5 / 12</div>
      <img src="images/background/gallery6.jpg" style="width:100%">
  </div>

  <div class="mySlides">
    <div class="numbertext">6 / 12</div>
      <img src="images/background/gallery7.jpg" style="width:100%">
  </div>
  <div class="mySlides">
    <div class="numbertext">7 / 12</div>
      <img src="images/background/gallery8.jpg" style="width:100%">
  </div>
  <div class="mySlides">
    <div class="numbertext">8 / 12</div>
      <img src="images/background/gallery9.jpg" style="width:100%">
  </div>
  <div class="mySlides">
    <div class="numbertext">9 / 12</div>
      <img src="images/background/gallery10.jpg" style="width:100%">
  </div>
  <div class="mySlides">
    <div class="numbertext">10 / 12</div>
      <img src="images/background/gallery11.jpg" style="width:100%">
  </div>
  <div class="mySlides">
    <div class="numbertext">11 / 12</div>
      <img src="images/background/gallery12.jpg" style="width:100%">
  </div>
  <div class="mySlides">
    <div class="numbertext">12 / 12</div>
      <img src="images/background/gallery13.jpg" style="width:100%">
  </div>

  <!-- Next and previous buttons -->
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>

  <!-- Image text -->
  <div class="caption-container">
    <p id="caption"></p>
  </div>

  <!-- Thumbnail images -->
  <div class="row">
    <div class="column">
      <img class="demo cursor" src="images/background/gallery2.jpg" style="width:100%" onclick="currentSlide(1)">
    </div>
    <div class="column">
      <img class="demo cursor" src="images/background/gallery3.jpg" style="width:100%" onclick="currentSlide(2)">
    </div>  
    <div class="column">
      <img class="demo cursor" src="images/background/gallery4.jpg" style="width:100%" onclick="currentSlide(3)">
    </div>
    <div class="column">
      <img class="demo cursor" src="images/background/gallery5.jpg" style="width:100%" onclick="currentSlide(4)">
    </div>
    <div class="column">
      <img class="demo cursor" src="images/background/gallery6.jpg" style="width:100%" onclick="currentSlide(5)">
    </div>
    <div class="column">
      <img class="demo cursor" src="images/background/gallery7.jpg" style="width:100%" onclick="currentSlide(6)">
    </div>
    <div class="column">
      <img class="demo cursor" src="images/background/gallery8.jpg" style="width:100%" onclick="currentSlide(7)">
    </div>
    <div class="column">
      <img class="demo cursor" src="images/background/gallery9.jpg" style="width:100%" onclick="currentSlide(8)">
    </div>
    <div class="column">
      <img class="demo cursor" src="images/background/gallery10.jpg" style="width:100%" onclick="currentSlide(9)">
    </div>
    <div class="column">
      <img class="demo cursor" src="images/background/gallery11.jpg" style="width:100%" onclick="currentSlide(10)">
    </div>
    <div class="column">
      <img class="demo cursor" src="images/background/gallery12.jpg" style="width:100%" onclick="currentSlide(11)">
    </div>
    <div class="column">
      <img class="demo cursor" src="images/background/gallery13.jpg" style="width:100%" onclick="currentSlide(12)">
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
  </div>
</div>
    </div>
  </div>
</div>


<a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
<script>
  var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>

</body>
</html>