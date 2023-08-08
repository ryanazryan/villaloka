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

    $kota_id = isset($_GET['kota_id']) ? $_GET['kota_id'] : false;

    $kota = "";
    $status  = "";
    $button ="Add";

    if($kota_id){
        $queryKota = mysqli_query($koneksi, "SELECT * FROM kota WHERE kota_id='$kota_id'");
        $row=mysqli_fetch_assoc($queryKota);

        $kota = $row['kota'];
        
        $status = $row['status'];
        $button = "Update";
    }
    
?>
<form action="<?php echo BASE_URL."module/kota/action.php?kota_id=$kota_id"; ?>" method="POST" style="text-align: center">
<div class="bgded overlay" style="background-image: url(images/background/gunung.jpg)";>
<div id="footer">
    <div class="element-form">
        <label>COUNTRY</label>
        <span><input style="margin-left: auto; margin-right: auto; width: 400px;" type="text" name="kota" value="<?php echo $kota; ?>" /></span>
    </div>

    <div class="element-form">
            <label>STATUS</label>
            <span>
            <div class="custom-select" style="margin-left: auto; margin-right: auto; width: 70px;">
                <select name="status">
                    <option>Turn</option>
                    <option value="on" <?php if($status == "on"){echo "selected='true'";} ?>>On</option>
                    <option value="off" <?php if($status == "off"){echo "selected='true'";} ?>>Off</option>
                </select>
            </div>
            </span>
    </div>
    <br>
    <div class="element-form">
        <span><button class="btn" name="button" type="submit" value="<?php echo $button?>">Save</button></span>
    </div>
</div>
</div>
<script src="js/custom-select.js"></script>
</form>