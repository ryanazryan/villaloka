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
<link rel="icon" href="<?php echo BASE_URL."images/logo2.png";  ?>">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="<?php echo BASE_URL."css/layout.css"; ?>" rel="stylesheet" type="text/css" media="all"> 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
</head>
<body id="top">
<div class="bgded overlay" style="background-image: url(images/background/gunung.jpg)";>
<header class="hoc clear">
    <div class="login">
      <!-- Badges -->
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
        <!-- Destination Dropdown -->
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
        <li><a href="<?php echo "../villaloka/gallery.php"; ?>">Gallery</a></li>
        <?php
          if($level == "admin"){
        ?>
        <!-- Dashboard Dropdown -->
        <li><a class="drop" href="#">DASHBOARD</a>
          <ul>  
          <li>
            <a <?php if($module == "kategori"){echo "class='active'";} ?> href="<?php echo BASE_URL."index.php?page=my_profile&module=kategori&action=list";?>">Category</a>
          </li>
          <li>
            <a <?php if($module == "barang"){echo "class='active'";} ?> href="<?php echo BASE_URL."index.php?page=my_profile&module=barang&action=list"; ?>">Villa</a>
          </li>
          <li>
            <a  <?php if($module == "kota"){echo "class='active'";} ?> href="<?php echo BASE_URL."index.php?page=my_profile&module=kota&action=list"; ?>">Country</a>
          </li>
          <li>
            <a  <?php if($module == "subkota"){echo "class='active'";} ?> href="<?php echo BASE_URL."index.php?page=my_profile&module=subkota&action=list"; ?>">City</a>
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
      <h3 class="heading">V I L L A L O K A</h3>
      <p>enjoy your moment of togetherness and happiness with us</p>
      <footer>  
      <ul class="nospace inline pushright">
        <li>
          <a class="btn" href="<?php echo BASE_URL. "index.php?page=keranjang"; ?>">BOOKING         
            <?php	
              if($totalBarang != 0) {
                echo "<span>$totalBarang</span>";
              }
            ?>
          </a>
        </li>
          <form action="index.php" method="get" enctype="multipart/form-data" style="text-align: center;">
            <li class="search">
              <input type="text" name="cari" placeholder="Search Villa...">
            </li>
            <li style="width: 200px;" class="search">
              <input type="text" list="nat" name="nat" placeholder="Country..."/>
              <div style="display: none;">
                <datalist id="nat" name="nat">
                
                    <?php
                    $query = mysqli_query($koneksi, "SELECT kota_id, kota FROM kota WHERE status='on' ORDER BY kota_id");
                    while($row=mysqli_fetch_array($query)){
                            echo "<option value='$row[kota_id]'>$row[kota]</option>";
                        }
                    ?>
                </div>
            </li>
            <li style="width: 200px;" class="search">
              <input type="text" list="cat" name="cat" placeholder="Category..."/>
              <div style="display: none;">
                <datalist id="cat" name="cat">
                  
                    <?php
                    $query = mysqli_query($koneksi, "SELECT kategori_id, kategori FROM kategori WHERE status='on' ORDER BY kategori_id");
                    while($row=mysqli_fetch_array($query)){
                            echo "<option value='$row[kategori_id]'>$row[kategori]</option>";
                        }
                    ?>
                </div>
            </li>
        
        <li>
          <button class="btn" style='border: 1px solid #db1414; background-color: #db1414;' type="submit"><img style="width: 25px;" src="images/search.png"></button>
        </li>
      </form>
       </ul>
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
        <div class="block clear"><a href="https://mail.google.com/mail/u/0/#inbox?compose=CllgCJTNqQVxrnRLLpcvmGXszSLxWsbsmSsSxHGVQwrxmrtMrNsdmhzxcSnZsTmDtpSXtFqxVdV" target="_blank"><i class="fas fa-envelope"></i></a> <span><strong>Send us a mail :</strong> villaloka@gmail.com</span></div>
      </li>
      <li class="one_quarter">
        <div class="block clear"><a><i class="fas fa-clock"></i></a> <span><strong> Mon. - Sat :</strong> 08.00am - 18.00pm</span></div>
      </li>
      <li class="one_quarter">
        <div class="block clear"><a href="https://www.google.com/maps/place/Telkom+Schools+-+SMK+Telkom+Banjarbaru/@-3.441033,114.8301793,17z/data=!3m1!4b1!4m5!3m4!1s0x2de681d47b0ffd3b:0x3b48838a3c931f5b!8m2!3d-3.441033!4d114.832368" target="_blank"><i class="fas fa-map-marker-alt"></i></a> <span><strong>Come visit us :</strong> Directions to </span></div>
      </li>
    </ul>
  
  </section>

  <div class="wrapper row3" style="background: #ffffff;">
    <div class="content">
  <?php
  if(isset($_GET['cari'])){
    ?>
    <div class="wrapper row3">
      <main class="hoc container clear"> 
        <section id="services">
          <ul class="nospace group grid-3">
            
    <?php
    $cari = $_GET['cari'];
    $nat = $_GET['nat'];
    $cat = $_GET['cat'];

      $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE kota_id like '%$nat%' AND kategori_id like '%$cat%' AND nama_barang like '%$cari%'");
      // $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE kota_id = $nat AND subkota_id = $city AND kategori_id = $cat AND nama_barang like '%$cari%'");

    while($row=mysqli_fetch_assoc($query)){
      if ($row == 0){
        echo "<h3>There Seems to be no Villa named $cari</h3>";
    }
    ?>
            <li class="one_third" style="float: left">
              <article>
                <h6 class="heading"><a href="<?php echo BASE_URL."index.php?page=detail&barang_id=$row[barang_id]"?>"><?php echo "$row[nama_barang]"?></h6>
                <img style="aspect-ratio: 1.75" src="<?php echo BASE_URL."images/content/$row[gambar]"; ?>" alt="Candi Prambanan" style="background-size: cover;">
                <span>Number of Rooms : <?php echo "$row[stok]"?></span>
                <footer><a class='btn' style='padding: 4.5px' href="<?php echo BASE_URL."index.php?page=tambah_keranjang&barang_id=$row[barang_id]"; ?>">Reserve</a></footer>
                <a style='background: transparent;'><i style="background-color: white; border-radius: 14px; border: none;"><img src="<?php echo BASE_URL."images/logo2.png"; ?>" alt="Villaloka"></i></a>
              </article>
              
            </li>
            <?php
  }
  ?>
        </ul>
      </section>
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>
<?php
}

  $filename = "$page.php";

  if(file_exists($filename)){
    include_once($filename);
  } else {
   include_once("main.php");
  }

  ?>

  <?php

$file = "module/$module/$action.php";
if (file_exists($file)) {
   include_once($file);
}

?>
    </div>
  </div>
</div>


<a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
<script src="js/custom-select.js"></script>

</body>
</html>