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

    $subkota_id = isset($_GET['subkota_id']) ? $_GET['subkota_id'] : false;

    $subkota = "";
    $kota_id = "";
    $status  = "";
    $button ="Add";

    if($subkota_id){
        $querySubkota = mysqli_query($koneksi, "SELECT subkota.*, kota.kota FROM subkota JOIN kota ON subkota.kota_id=kota.kota_id WHERE subkota_id='$subkota_id'");
        $row=mysqli_fetch_assoc($querySubkota);

        $subkota = $row['subkota'];
        $kota_id = $row['kota_id'];
        $status = $row['status'];
        $button = "Update";
    }
    
?>
<form action="<?php echo BASE_URL."module/subkota/action.php?subkota_id=$subkota_id"; ?>" method="POST" style="text-align: center">
<div class="bgded overlay" style="background-image: url(images/background/gunung.jpg)";>
<div id="footer">
    <div class="element-form">
        <label>CITY</label>
        <span><input style="margin-left: auto; margin-right: auto; width: 400px;" type="text" name="subkota" value="<?php echo $subkota; ?>" /></span>
    </div>
    <div class="element-form">
            <label>Negara</label>
            <span>
            <div class="custom-select" style="margin-left: auto; margin-right: auto; width: 400px;">
               <select name="kota_id">
                   <option>Choose your Country:</option>
                   <?php
                    $query = mysqli_query($koneksi, "SELECT kota_id, kota FROM kota WHERE status='on' ORDER BY kota ASC");
                    while($row=mysqli_fetch_array($query)){
                        if($kota_id == $row['kota_id']){
                            echo "<option value='$row[kota_id]' selected='true'>$row[kota]</option>";
                        }else{
                            echo "<option value='$row[kota_id]'>$row[kota]</option>";
                        }
                    }
                    ?>
                </select>
            </div>
        </span>
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