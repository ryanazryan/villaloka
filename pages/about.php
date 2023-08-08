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
<title>VILLALOKA</title>
<link rel="icon" href="<?php echo BASE_URL."images/logo2.png"; ?>" media="all">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="../css/layout.css" rel="stylesheet" type="text/css" media="all"> 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
</head>
<body id="top">
<div class="bgded overlay " style="background-image: url(../images/background/sunshine2.jpg)";>
<div class="hoc clear">
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
  </div>
  <header id="header" class="hoc clear">
    <div id="logo" class="fl_left"> 
      <h1><a href="../index.php"><img src="../images/logo1.png" class="logo"></a></h1>
    </div>
    <nav>
    </nav>
    <nav id="mainav" class="fl_right"> 
      <ul class="clear">
        <li class="active"><a href="../index.php">HOME</a></li>
        <li><a class="drop" href="#">DESTINATON</a>
          <ul>  
            <li><a href="../pages/indonesia.php">Indonesia</a></li>
            <li><a href="../pages/vietnam.php">Vietnam</a></li>
            <li><a href="../pages/japan.php">Japan</a></li>
            <li><a href="../pages/china.php">China</a></li>
            <li><a href="../pages/turkey.php">Turkey</a></li>
            <li><a href="../pages/southkorea.php">South Korea</a></li>
          </ul>
        </li>
        <li><a href="<?php echo BASE_URL."gallery.php"; ?>">Gallery</a></li>
      </ul>
      
  
    </nav>
  </header>
  <div id="pageintro" class="hoc clear">
    <article>
      <h3 class="heading">V I L L A L O K A</h3>
      <p>enjoy your moment of togetherness and happiness with us</p>
    </article>
  
  </div>

</div>
<!-- End Top Background Image Wrapper -->
<div class="wrapper row1">
  <section id="ctdetails" class="hoc clear"> 
  
    <ul class="nospace clear">
      <li class="one_quarter first">
        <div class="block clear"><a><i class="fas fa-phone"></i></a> <span><strong>Give us a call :</strong> +62 999 8888 7777</span></div>
      </li>
      <li class="one_quarter">
        <div class="block clear"><a href="https://mail.google.com/mail/u/0/#inbox?compose=GTvVlcSDXmbBCpZLXLbfjzlnQmPgJTjXXNNWMBQzpRJDFDCrhHpQWzhvswjHvnGhFkFqcBmRgktDr" target="_blank"><i class="fas fa-envelope"></i></a> <span><strong>Send us a mail :</strong> villaloka@gmail.com</span></div>
      </li>
      <li class="one_quarter">
        <div class="block clear"><a><i class="fas fa-clock"></i></a> <span><strong> Mon. - Sat :</strong> 08.00am - 18.00pm</span></div>
      </li>
      <li class="one_quarter">
        <div class="block clear"><a href="https://timeline.google.com/maps/timeline?hl=en&authuser=0&ei=J7tLYtyBN92OseMPuJCx4A0%3A42&ved=1t%3A17706&pli=1&rapt=AEjHL4NOHinY-GsTVeOIa86dnWzFxx58Fcs0T6Y2WjFNlYekqCJKjUzbGCkPCHB40NCvmOSUQikCNeEVysCdPhRyiMBgVo66XQ&pb" target="_blank"><i class="fas fa-map-marker-alt"></i></a> <span><strong>Come visit us :</strong> Directions to</span></div>
      </li>
    </ul>
  
  </section>

  <div class="wrapper row3">
    <div class="content">
</div>
  </div>

</div>
<div class="wrapper row3 bgded overlay" style="background-image: url('../images/background/sunshine.jpg'); background-size: cover;">
  <main class="hoc container clear"> 
    <section id="services">
      <div class="sectiontitle">
        <h6 class="heading" style="color: #fff;">TERMS AND SERVICES</h6>
        <br>
        <p style="color: #fff; text-align: justify;">These Terms of Service (“Terms”) and our Privacy Policy incorporated herein by reference, constitute a legally binding agreement between you ("user" or "you") and us, VILLALOKA Ltd. ("we", "us" “Company” or "our") and govern your use of this website (“website”) and your use of the following products (collectively "Products"): VPN SharedComputing browser extension (“Extension”); VPN SharedComputing Desktop software for Windows and Mac (“Software”); and VPN SharedComputing mobile applications (“App”). The website and Products including with any revisions, improvements, new releases therein, shall be referred as the "Service(s)".</p>
        <br>
        <h6 class="heading" style="color: #fff;"> ACCEPTANCE</h6>
        <br>
        <p style="color: #fff; text-align: justify;">By clicking the "BOOKING" or “LOGIN REGISTER” (Or similar button), Installing or using the service, You Acknowledge that you have read,Understood,And agree to be Bound By These Terms In Their Entirety. These terms constitute a legally binding agreement  (The “Agreement”) Between you and us. If you do not agree with Any part of terms, You may not use our services.</p>
        <br>
        <h6 class="heading" style="color: #fff;"> BACKGROUND</h6>
        <br>
        <p style="color: #fff; text-align: justify;">The Services provide unique features that enable you to easily use the Extension directly from your browser or from your device, as well as alerts when you browse a website which might not be safe. VPN stands for "Virtual Private Network" and is a way for customers to remain anonymous on the Internet by using only secure computer connections. The security is ensured by the fact that Internet traffic is encrypted to such an extent that only the customer’s computer and the computer communicating with the client can interpret the data sent between computers. The traffic can still be bugged, but the person intercepting it will not be able to understand the collected information.In consideration of our provision of the VPN services at no cost to you, you grant permission to us to harness the power of your computer for various purposes, all in accordance with the terms and conditions set forth herein. This means that after you accepted the Services, we may assign you a particular computing power intensive task and you will then use your hardware to perform the assigned task and to communicate to us the solution. See Section 7 below for more information.
Please read these Terms carefully before downloading or using our Services and any feature provided therein.</p>


      <!--

2. Acceptance
BY CLICKING THE "DOWNLOAD" OR “ADD TO CHROME” (OR SIMILAR BUTTON), INSTALLING OR USING THE SERVICES, YOU ACKNOWLEDGE THAT YOU HAVE READ, UNDERSTOOD, AND AGREE TO BE BOUND BY THESE TERMS IN THEIR ENTIRETY. THESE TERMS CONSTITUTE A LEGALLY BINDING AGREEMENT (THE “AGREEMENT”) BETWEEN YOU AND US. IF YOU DO NOT AGREE WITH ANY PART OF THE TERMS, YOU MAY NOT USE OUR SERVICES.
By creating an account for using our Services, you represent that you are at least eighteen (18) years of age or that you are a valid legal entity, and that the registration information you have provided is accurate and complete. We reserve the right to request proof of age at any stage so that we can verify that children (as defined under applicable law) are not using the Services. If you are under 18, please be sure to read these Terms with your parents or legal guardians and ask questions about things you do not understand.
3. Amendments to Services and to Terms
We reserve the right, at any time and from time to time, at its own discretion, to add Services, to modify, suspend, terminate or discontinue any or all the Services, or any part thereof or any user’s access thereto. Where we assume that such change may materially affects an existing Service, we will provide you with a prior written notice.
We also may update the Terms from time to time without notice. If you continue to use the Services, including the Extension, the Software or the App after these changes take effect, then you agree to the revised Terms. The current version of the Terms is available on the Site. You understand and agree that it is your obligation to review these Terms from time to time in order to stay informed on current rules and obligations. [Notification on any core changes to the Terms will be provided to subscribers through an email message or update to the Site.] Your use of the Services following the changes to these Terms constitutes your acceptance of the changed Terms.
4. Privacy Policy
We are committed to your privacy and do not collect or log browsing history, traffic destination, data content, or DNS queries from you. During your registration, we may collect some personal information, such as your email address. We only collect such information as is strictly necessary for the proper delivery of the Site and Services.
For the sake of clarity and transparency, we have placed all information related to data collection in a separate document known as the Privacy Policy, which is available on the Site. Please review the Privacy Policy in its entirety to get a clear understanding of how we handle your personal information.
5. Subscriptions
The Extension and VPN SharedComputing Services are available to you upon registration on the Site. By subscribing to the Services, you agree to become a subscriber (“Subscriber”). Each subscription grants you one (1) license to use on five (5) different devices at any given time. [If you want to use the Services on more than five devices at a time, then you need to use VPN SharedComputing on your router.]
6. Acceptable Use Policy
VPN SharedComputing Services may be accessed from all around the world, so it is your responsibility to assess whether using the Site, Apps, Software, or Services is in compliance with local laws and regulations and our policies. We reserve the right to limit, in our sole discretion, the availability of our Services or any portion thereof, to any person, entity, geographic area, or jurisdiction at any time. By downloading and using our Service or Software, you certify that you are not a target of any sanctions regime, and you do not reside in, nor will you access our Service or Software from, a country from which such access is prohibited under any applicable sanctions regime.
You understand that it is your responsibility to keep your VPN SharedComputing account information confidential. You are responsible for all activity under your account. If you ever discover or suspect that someone has accessed your account without your authorization, you are advised to inform us immediately so that we may revoke your account credentials and issue new ones.
In aiming to provide the best service possible to all of our Subscribers, we require that you do not misuse our Services. A misuse refers to any use, access, or interference with the Services contrary to the Terms or applicable laws and regulations. In order to protect the Services from being misused or used to harm someone, we reserve the right to take appropriate measures when our Services are being used contrary to these Terms and applicable laws. You agree that we may terminate your account or take any other legal measure provided by law if you misuse the Service. In using our Services, you agree not to:
Send, post, or transmit over the Service any content which is illegal, hateful, threatening, insulting, or defamatory; infringes on intellectual property rights; invades privacy; or incites violence;

Use the Service for anything other than lawful purposes.

Use the Services for any criminal, illicit, and illegal acts;

Upload, download, post, reproduce, or distribute any content protected by copyright or any other proprietary right without first having obtained permission from the owner of the proprietary content;

Upload, download, post, reproduce, or distribute any content that includes sexual or explicit depictions of minors;

Send or transmit unsolicited advertisements or content (i.e., “spam”) over the Service;

Engage in any conduct that restricts or inhibits any other Subscriber from using or enjoying the Service;

Attempt to access, probe, or connect to computing devices without proper authorization (i.e., any form of “hacking”); or

Attempt to compile, utilize, or distribute a list of IP addresses operated by VPN SharedComputing in conjunction with the Service -->
      </div>
  </section>
</div>



<div class="wrapper row3">
  <section class="hoc container clear" style="background-image: url(images/background/sunshine3.jpg)"> 
    <div class="sectiontitle">
      <p class="nospace font-xs">ABOUT OUR DEVELOPERS</p>
      <h6 class="heading">V I L L A L O K A</h6>
    </div>
    <ul id="latest" class="nospace group sd-third">
      <li class="one_third first">
        <article>
          <figure><a class="imgover" href="#"><img src="" alt=""></a>
            <figcaption>
              <ul class="nospace meta clear">
                <li><i class="fas fa-user"></i> <a style='color: #db1414;'>Admin</a></li>
                <li>
                  <time datetime="2045-04-06T08:15+00:00">23 APRIL 2005</time>
                </li>
              </ul>
              <h6 class="heading"><a href="#">NAUFAL FAIQ AZRYAN</a></h6>
            </figcaption>
          </figure>
        </article>
      </li>
      <li class="one_third">
        <article>
          <figure><a class="imgover" href="#"><img src="" alt=""></a>
            <figcaption>
              <ul class="nospace meta clear">
                <li><i class="fas fa-user"></i> <a style='color: #db1414;'>Admin</a></li>
                <li>
                  <time datetime="2045-04-05T08:15+00:00">05 Apr 2045</time>
                </li>
              </ul>
              <h6 class="heading"><a style='color: #db1414;'>EDWIN LOUWIS GARCIA</a></h6>
            </figcaption>
          </figure>
        </article>
      </li>
      <li class="one_third">
        <article>
          <figure><a class="imgover" href="#"><img src="images/demo/348x261.png" alt=""></a>
            <figcaption>
              <ul class="nospace meta clear">
                <li><i class="fas fa-user"></i> <a style='color: #db1414;'>Admin</a></li>
                <li>
                  <time datetime="2045-04-04T08:15+00:00">04 Apr 2045</time>
                </li>
              </ul>
              <h6 class="heading"><a style='color: #db1414;'>MUHAMMAD FARHAN ABDILLAH</a></h6>
            </figcaption>
          </figure>
        </article>
      </li>
    </ul>
    <!-- ################################################################################################ -->
  </section>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row4">
  <footer id="footer" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div class="one_quarter first">
      <h6 class="heading">SOCIAL MEDIA</h6>
      <p> please contact or follow us below below [<a href="#">&hellip;</a>]</p>
      <ul class="faico clear">
        <li><a class="faicon-facebook" href="#"><i class="fab fa-facebook"></i></a></li>
        <li><a class="faicon-google-plus" href="#"><i class="fab fa-instagram"></i></a></li>
        <li><a class="faicon-linkedin" href="#"><i class="fab fa-linkedin"></i></a></li>
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
      <form action="../suggest_process.php" method="POST">
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