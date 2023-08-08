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

    $pesanan_id = $_GET["pesanan_id"];
    $button = "CONFIRM";        
?>


    <form action="<?php echo BASE_URL. "module/pesanan/action.php?pesanan_id=$pesanan_id"; ?>" method="POST" style="text-align: center">
    <div class="bgded overlay" style="background-image: url(images/background/gunung.jpg)";>
    <div id="footer"> 
        <div class="element-form">
            <label>ACCOUNT NUMBER</label>
            <span><input style="margin-left: auto; margin-right: auto; width: 400px;" type="text" name="nomor_rekening" placeholder="bca/bni/bri/Mandiri " /></span>
        </div>

        <div class= element-form>
            <label>ACCOUNT NAME</label>
            <span><input style="margin-left: auto; margin-right: auto; width: 400px;" type="text" name="nama_account" /></span>
        </div>

        <div class="element-form">
            <label> TRANSFER DATE(format: yyyy-mm-dd) </label>
            <span><input style="margin-left: auto; margin-right: auto; width: 400px;" type="date" name="tanggal_transfer" /></span>
        </div>
        <br>
        <div class="element-form">
            <span><button class="btn" name="button" type="submit" value="<?php echo $button?>">Save</button></span>
        </div>
    </div>
    </div>
    </form>
