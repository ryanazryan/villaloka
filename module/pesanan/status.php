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

    $query = mysqli_query ($koneksi, "SELECT status FROM pesanan WHERE pesanan_id='$pesanan_id'");
    $row=mysqli_fetch_assoc($query);
    $status = $row['status'];
    $button = "Edit Status";

?>
<form action="<?php echo BASE_URL."module/pesanan/action.php?pesanan_id=$pesanan_id"; ?>" method="POST" style="text-align: center">
<div class="bgded overlay" style="background-image: url(images/background/gunung.jpg)";>
<div id="footer">    
    <br>
    <div class="element-form">
        <label>BOOKING ID</label>
        <span><input style="margin-left: auto; margin-right: auto; width: 400px; cursor: default;" type="text" value="<?php echo $pesanan_id; ?>" name="pesanan_id" readonly="true" /></span>
    </div>
        <div class="element-form">
        <label>PAYMENT STATUS</label>
        <span>
        <div class="custom-select" style="margin-left: auto; margin-right: auto; width: 400px;">
            <select name='status'>  
                <option>Select your Status:</option>
                <?php
                    
                    foreach($arrayStatusPesanan AS $key => $value) {
                        if($status == $key){
                            echo "<option value='$key' selected='true'>$value</option>";
                        }
                        else{
                            echo "<option value='$key'>$value</option>";
                        }
                    }

                ?>        
            </select>
        </div>
        </span>
    </div>
    <br>
    <div class="element-form">
        <span><button class="btn" name="button" type="submit" value="<?php echo $button?>">Save</button></span>
    </div>
</div>
<br>
<br>
</div>
<script src="js/custom-select.js"></script>
</form>