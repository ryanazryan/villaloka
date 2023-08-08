<!-- <ul class="kategori"> -->
    <?php

    // $query = mysqli_query($koneksi, "SELECT * FROM kategori WHERE status='on'");

    // while($row=mysqli_fetch_array($query)){
    //     if($kategori_id == $row['kategori_id']){
    //         echo "<li><a href='".BASE_URL."index.php?kategori_id=$row[kategori_id]' class='active'>$row[kategori]</a></li>";
    //     } else {
    //         echo "<li><a href='".BASE_URL."index.php?kategori_id=$row[kategori_id]'>$row[kategori]</a></li>";
    //     }
    // }
    ?>
<!-- </ul> -->

<div class="wrapper row3">
  <main class="hoc container clear"> 
    <section id="services">
      <div class="sectiontitle">
        <p class="nospace font-xs">Your comfort is our happiness</p>
        <h6 class="heading">V I L L A L O K A</h6>
      </div>
      <ul class="nospace group grid-3">
        <li class="one_third">
          <article><a><i style="background: transparent; border: none;"><img src="<?php echo BASE_URL."images/logo/indonesialogo.png"; ?>" alt="indonesia"></i></a>  <!-- ukuran foto 1980x1080 -->
            <h6 class="heading">INDONESIA</h6>
            <img src="<?php echo BASE_URL."images/background/candiprambanan.jpg"; ?>" alt="Candi Prambanan" style="background-size: cover;">
            <footer><a href="<?php echo BASE_URL."pages/indonesia.php"; ?>">More Details &raquo;</a></footer>
          </article>
        </li>
        <li class="one_third">
          <article><a href="#"><i style="background: transparent; border: none;"><img src="<?php echo BASE_URL."images/logo/vietnamlogo.png"; ?>" alt="Vietnam"></i></a>
            <h6 class="heading">VIETNAM</h6>
            <img src="<?php echo BASE_URL."images/background/yenbai.jpg"; ?>" alt="Yen Bai" style="background-size: cover;">
            <footer><a href="<?php echo BASE_URL."pages/vietnam.php"; ?>">More Details &raquo;</a></footer>
          </article>
        </li>
        <li class="one_third">
          <article><a href="#"><i style="background: transparent; border: none;"><img src="<?php echo BASE_URL."images/logo/southkorealogo.png"; ?>" alt="South Korea"></i></a>
            <h6 class="heading">SOUTH KOREA</h6>
            <img src="<?php echo BASE_URL."images/background/buckhonhanokvillage.png"; ?>" alt="Buckhon Hanok Village" style="background-size: cover;">
            <footer><a href="<?php echo BASE_URL."pages/southkorea.php"; ?>">More Details &raquo;</a></footer>
          </article>
        </li>
        <li class="one_third">
          <article><a href="#"><i style="background: transparent; border: none;"><img src="<?php echo BASE_URL."images/logo/turkeylogo.png"; ?>" alt="Turkey"></i></a>
            <h6 class="heading">TURKEY</h6>
            <img src="<?php echo BASE_URL."images/background/istanbul.jpg"; ?>" alt="Istanbul Turkey" style="background-size: cover;">
            <footer><a href="<?php echo BASE_URL."pages/turkey.php"; ?>">More Details &raquo;</a></footer>
          </article>
        </li>
        <li class="one_third">
          <article><a href="#"><i style="background: transparent; border: none;"><img src="<?php echo BASE_URL."images/logo/chinalogo.png"; ?>" alt="China"></i></a>
            <h6 class="heading">CHINA</h6>
            <img src="<?php echo BASE_URL."images/background/chinatown.jpg"; ?>" alt="China Tower" style="background-size: cover;">
            <footer><a href="<?php echo BASE_URL."pages/china.php"; ?>">More Details &raquo;</a></footer>
          </article>
        </li>
        <li class="one_third">
          <article><a href="#"><i style="background: transparent; border: none;"><img src="<?php echo BASE_URL."images/logo/japanlogo.png"; ?>" alt="Japan"></i></a>
            <h6 class="heading">JAPAN</h6>
            <img src="<?php echo BASE_URL."images/background/japanskynature.jpg"; ?>" alt="Paris" style="background-size: cover;">
            <footer><a href="<?php echo BASE_URL."pages/japan.php"; ?>">More Details &raquo;</a></footer>
          </article>
        </li>
      </ul>
    </section>
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>


<div class="bgded overlay" style="background-color:#db1414;">
  <section class="hoc container clear"> 
    <div class="sectiontitle">
      <p class="nospace font-xs">Be Better Every Day</p>
      <h6 class="heading">V I L L A L O K A </h6>
    </div>
    <article id="points" class="group">
      <div class="two_third first">
        <h6 class="heading" style="text-align: center;">TERMS AND CONDITIONS</h6>
        <p style="text-align: center;">Please read these terms and conditions of use carefully before accessing, using or obtaining any materials, information, products or services. By accessing the <b>Villaloka</b> website, mobile or tablet application, or any other feature or other <b>Villaloka</b> platform (collectively "Our Website") you agree to be bound by these terms and conditions ("Terms") and our Privacy Policy.</p>
        <ul class="nospace group" style="text-align: center;">
          <li><span>1</span> follow health protocol</li>
          <li><span>5</span> violence is prohibited</li>
          <li><span>2</span>The check-in schedule is usually 13.00 or 14.00, while the maximum check-out schedule is 12.00.</li>
          <li><span>6</span> Guests are prohibited from making disturbing noises, engaging in unlawful acts, and bringing in liquor and drugs</li>
          <li><span>3</span> The hotel may cancel a reservation if the hotel finds the reservation information provided false or incomplete.</li>
          <li><span>7</span> Guests must be at least 18 years old to check in and register for rooms.</li>
          <li><span>4</span> A child's breakfast fee applies to children between the ages of four and eleven. Breakfast for children under four years is free.</li>
          <li><span>8</span> A valid government-issued identity card or passport is required upon check-in</li>
        </ul>
      </div>
    </article>
  </section>
</div>



<div class="wrapper row2">
  <section class="hoc container clear"> 
    <div class="sectiontitle">
      <p class="nospace font-xs">DEVELOPER</p>
      <h6 class="heading">V I L L A L O K A</h6>
    </div>
    <ul id="latest" class="nospace group sd-third">
      <li class="one_third first">
        <article>
          <figure><a class="imgover" class="pfp" href="#"><img src="#" style="background-size: cover;" alt=""></a>
            <figcaption>
              <ul class="nospace meta clear">
                <li><i class="fas fa-user"></i> <a style='color: #db1414;'>Admin</a></li>
                <li>
                  <time datetime="2045-04-06T08:15+00:00">23 APRIL 2005</time>
                </li>
              </ul>
              <h6 class="heading"><a style='color: #db1414;'>NAUFAL FAIQ AZRYAN</a></h6>
            </figcaption>
          </figure>
        </article>
      </li>
      <li class="one_third">
        <article>
          <figure><a class="imgover" href="#"><img src="#" alt=""></a>
            <figcaption>
              <ul class="nospace meta clear">
                <li><i class="fas fa-user"></i> <a style='color: #db1414;'>Admin</a></li>
                <li>
                  <time datetime="2045-04-05T08:15+00:00">04 November 2005</time>
                </li>
              </ul>
              <h6 class="heading"><a style='color: #db1414;'>EDWIN LOUIS GARCIA</a></h6>
            </figcaption>
          </figure>
          <p></p>
        </article>
      </li>
      <li class="one_third">
        <article>
          <figure><a class="imgover"><img src="" alt=""></a>
            <figcaption>
              <ul class="nospace meta clear">
                <li><i class="fas fa-user"></i> <a style='color: #db1414;'>Admin</a></li>
                <li>
                  <time datetime="2045-04-04T08:15+00:00">28 Mei 2006</time>
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