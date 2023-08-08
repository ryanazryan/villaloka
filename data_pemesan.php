<script src=
    "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
</script>
  
<script>
    $(document).ready(function() {
            $("html, body").animate({
                scrollTop: 
                $('html, body').get(0).scrollHeight}, 1500);
            });
</script>
<?php 

if($user_id == false){
    $_SESSION["proses_pesanan"] = true;

    header("location: ".BASE_URL."index.php?page=login");
    exit;
}
?>
<div id="frame-data-pengiriman">
    <br>
    <h6 class="heading" style="text-align: center; color: #db1414;">GUEST DATA</h6>

    <div>
        <form action="<?php echo BASE_URL."proses_pemesanan.php"; ?>" method="POST" style="text-align: center">
        <div class="bgded overlay" style="background-image: url(images/background/gunung.jpg)";>
        <div id="footer">
        <div class="element-form">
            <label for="">GUEST'S NAME</label>
            <span><input style="margin-left: auto; margin-right: auto; width: 400px;" type="text" name="nama_penerima"></span>
        </div>
        <div class="element-form">
            <label for="">PHONE NUMBER</label>
            <span><input style="margin-left: auto; margin-right: auto; width: 400px;" type="text" name="nomor_telepon"></span>
        </div>
        <div class="element-form">
            <label for="">CHECK IN</label>
            <span><input style="margin-left: auto; margin-right: auto; width: 400px;" type="date" name="check_in"></span>
        </div>
        <div class="element-form">
            <label for="">CHECK OUT</label>
            <span><input style="margin-left: auto; margin-right: auto; width: 400px;" type="date" name="check_out"></span>
        </div>
        <script src="js/custom-select.js"></script>
        <div class="element-form">
            <br>
            <span><button class="btn" type="submit" name="button" value="submit">Submit</button></span>
        </div>
        </div>
        </div>
        </form>
    </div>
</div>

<div id="frame-data-detail">
    <br>
    <h6 class="heading" style="text-align: center; color: #db1414;">BOOKING DETAIL</h6>
    <div id="frame-detail-order">
        <table style="padding: 10px; border: 1; width: 1200px; margin-left: auto; margin-right: auto;" class="font">
            <tr>
                <th style="background-color: #db1414; text-align: center;">ROOM NAME</th>
                <th style="background-color: #db1414;  text-align: center;"> UNIT ROOMS</th>
                <th style="background-color: #db1414;  text-align: center;"> TOTAL</th>
            </tr>

            <?php	
                $subtotal = 0;
                foreach($keranjang AS $key => $value) {
                    $barang_id = $key;
        
                    $nama_barang = $value["nama_barang"];
                    $harga = $value["harga"];
                    $quantity = $value["quantity"];
        
                    $total = $quantity * $harga;
                    $subtotal = $subtotal + $total;
        
                    echo "<tr class='font'>
                            <td style='text-align: center;'>$nama_barang</td>
                            <td style='text-align: center;'>$quantity</td>
                            <td style='text-align: center;'>".rupiah($harga)."</td>
                        </tr>";			
                }
        
                echo "<tr class='font'>
                        <th colspan='2' style='background-color: #db1414; text-align: center;' class='font'>SUB TOTAL</th>
                        <th style='background-color: #db1414; text-align: center;'><b>".rupiah($subtotal)."</b></th>
                     </tr>";
        
            ?>
        </table>
        <br>
    </div>
</div>