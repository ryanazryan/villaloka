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
		


<div id="kanan" style="background-color: #fff;">
	<?php	
		$barang_id = $_GET['barang_id'];

		$query = mysqli_query($koneksi, "SELECT barang.*, kategori.kategori FROM barang JOIN kategori  ON barang.kategori_id=kategori.kategori_id WHERE barang_id=$barang_id");
		$row = mysqli_fetch_assoc($query);

		echo "<div id='detail-barang' style='color: #db1414; text-align: center;'>
					<h2><br>$row[nama_barang]</h2>"
					?>
					
					<div id="frame-gambar">
						<img src="<?php echo BASE_URL."images/content/$row[gambar]"; ?>" style='width: 430px; height: 300px;'/>
					</div>

					<?php
					echo"
					<br>
					<div id='frame-harga'>
						<b>CATEGORY : </b> $row[kategori]
						<span><br><b>PRICE/DAY</b>: ".rupiah($row['harga'])."</span><br>
						<div id='keterangan'>
						<b>DESCRIPTION : </b> $row[spesifikasi]
					</div><br>
					</div><br>
				</div>";
	?>
	<!-- <button class='btn' href="<?php '".BASE_URL."tambah_keranjang.php?barang_id=$row[barang_id]'; ?>"  onMouseOver="this.style.color='red'"
        onMouseOut="this.style.color='white'" style='padding-bottom: 25px; float: center; margin-left: 570px; margin-right: auto;'><br> RESERVE</button> -->
		<div id="detail">
			<a style='margin-left: 570px' class='btn' href="<?php echo BASE_URL."index.php?page=tambah_keranjang&barang_id=$row[barang_id]"; ?>">Reserve</a>
		</div>
	<br>
	<br>
</div>
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