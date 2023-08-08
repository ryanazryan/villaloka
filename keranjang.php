<?php
error_reporting(0);
?>
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
<div class="wrapper ro3">
	<div class="content">
		<br>
	</div>
</div>
<?php

	if ($totalBarang == 0) {
		print("<br>");
        echo "<h3 style='text-align: center; color: #db1414;'>THERE ARE CURRENTLY NO ROOM RESERVATIONS IN YOUR LIST</h3>";
        print("<br>");
        print("<br>");
        print("<br>");
        print("<br>");
        print("<br>");
        print("<br>");
        print("<br>");
        print("<br>");
        print("<br>");
        print("<br>");
        print("<br>");
        print("<br>");
        print("<br>");
        print("<br>");
        print("<br>");
	} else {
		
		$no = 1;

		echo "<table class='font' style='padding; 10px; border: 1; width: 1200px; margin-left: auto; margin-right: auto;'>
						<tr>
							<th style='background-color: #db1414; text-align: center;'>NO</th>
							<th style='background-color: #db1414; text-align: center;'>IMAGE</th>
							<th style='background-color: #db1414; text-align: center;'>ROOM NAME</th>
							<th style='background-color: #db1414;text-align: center;'>PRICE / NIGHT</th>
							<th style='background-color: #db1414;text-align: center;'>UNIT ROOMS</th>
							
							
							<th style='background-color: #db1414; text-align: center;'>TOTAL</th>
						</tr>";

		$subtotal = 0;
		foreach($keranjang AS $key => $value) {
				
			$barang_id = $key;
			$nama_barang = $value["nama_barang"];
			$quantity = $value["quantity"];
			$gambar = $value["gambar"];
			$harga = $value["harga"];

			$total = $quantity * $harga;
			$subtotal = $subtotal + $total;

			echo "<tr>
							<td style='text-align: center;'>$no</td>
							<td><img style='aspect-ratio: 1.75; text-align: center; width: 250px; margin-left: 55px;'src='".BASE_URL."images/content/$gambar' height='50px'></td>
							<td>$nama_barang</td>
							<td>".rupiah($harga)."</td>
							<div class='quantity'>
							<td><input style='color: #db1414; border: 2px solid #db1414; margin-left: auto; margin-right: auto; width: 50px; text-align: center;' type='number' name='$barang_id' value='$quantity' min='1' class='update-quantity' step='1'></td>
							</div>
							<td style='text-align: center;'>".rupiah($total)." <a class='btn' href='".BASE_URL."hapus_item.php?barang_id=$barang_id' style='background-color: #fc1919;'>DELETE</a></td>
						</tr>";

				$no++;						
		}

		echo "<tr>
						<th colspan='5' style='background-color: #db1414; text-align: center;'><b>SUB TOTAL</b></th>
						<th style='background-color: #db1414; text-align: center;'><b>".rupiah($subtotal)."</b></th>
					</tr>";

		echo "</table>";

		echo "<div>
				<a style='margin-left: 10px; background-color: #fc1919;' class='btn' id='lanjut-belanja' href='".BASE_URL."index.php'>ADD MORE ROOM</a>
				<a style='float: right; margin-right: 10px; background-color: #fc1919;' class='btn' id='lanjut-pemesanan' href='".BASE_URL."index.php?page=data_pemesan'>CONTINUE TO BOOK</a>
			</div>";

	}

?>
<ul class="nospace inline pushright">
		<li><a class="btn" style="margin: 20px; background-color: #fc1919;" href="<?php echo BASE_URL. "index.php"; ?>">BACK</a></li>
</ul>

<script>
	
	$(".update-quantity").on("input", function(e){
		var barang_id = $(this).attr("name");
		var value = $(this).val();

		$.ajax({
			method: "POST",
			url: "update_keranjang.php",
			data: "barang_id="+barang_id+"&value="+value
		})
		.done(function(data){
			location.reload();
		});

	});

</script>
<script>
	    jQuery('<div class="quantity-nav"><div class="quantity-button quantity-up">+</div><div class="quantity-button quantity-down">-</div></div>').insertAfter('.quantity input');
    jQuery('.quantity').each(function() {
      var spinner = jQuery(this),
        input = spinner.find('input[type="number"]'),
        btnUp = spinner.find('.quantity-up'),
        btnDown = spinner.find('.quantity-down'),
        min = input.attr('min'),
        max = input.attr('max');

      btnUp.click(function() {
        var oldValue = parseFloat(input.val());
        if (oldValue >= max) {
          var newVal = oldValue;
        } else {
          var newVal = oldValue + 1;
        }
        spinner.find("input").val(newVal);
        spinner.find("input").trigger("change");
      });

      btnDown.click(function() {
        var oldValue = parseFloat(input.val());
        if (oldValue <= min) {
          var newVal = oldValue;
        } else {
          var newVal = oldValue - 1;
        }
        spinner.find("input").val(newVal);
        spinner.find("input").trigger("change");
      });

    });
</script>