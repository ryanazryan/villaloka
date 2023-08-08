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

    $user_id = isset($_GET['user_id']) ? $_GET['user_id'] : "";

    $button = "UPDATE";
    $queryUser = mysqli_query($koneksi, "SELECT * FROM user WHERE user_id='$user_id'");

    $row=mysqli_fetch_array($queryUser);

    $nama = $row["nama"];
    $email = $row["email"];
    $rating = $row["rating"];
    $status = $row["status"];
    $level = $row["level"];
?>
<form action="<?php echo BASE_URL."module/user/action.php?user_id=$user_id"?>" method="POST" style="text-align: center">
<div class="bgded overlay" style="background-image: url(images/background/gunung.jpg)";>
<div id="footer">
    <div class="element-form">
        <label>Nama Lengkap</label>
        <span><input style="margin-left: auto; margin-right: auto; width: 400px;" type="text" name="nama" value="<?php echo $nama; ?>" /></span>
    </div>

    <div class="element-form">
        <label>Email</label>
        <span><input style="margin-left: auto; margin-right: auto; width: 400px;" type="text" name="email" value="<?php echo $email; ?>" /></span>
    </div>

    <div class="element-form">
        <label>Rating</label>
        <span>
            <div class="custom-select" style="margin-left: auto; margin-right: auto; width: 400px;">
            <select name="rating">
                <option>Select Rating:</option>
                <option value="bronzecard" <?php if($rating == "bronzecard"){echo "selected='true'";} ?>>Bronze Card</option>
                <option value="silvercard" <?php if($rating == "silvercard"){echo "selected='true'";} ?>>Silver Card</option>
                <option value="goldcard" <?php if($rating == "goldcard"){echo "selected='true'";} ?>>Gold Card</option>
                <option value="platinumcard" <?php if($rating == "platinumcard"){echo "selected='true'";} ?>>Platinum Card</option>
                <option value="diamondcard" <?php if($rating == "diamondcard"){echo "selected='true'";} ?>>Diamond Card</option>
            </select>
        </div>
        </span>
    </div>
    <div class="element-form">
        <label>Level</label>
        <span>
            <div class="custom-select" style="margin-left: auto; margin-right: auto; width: 400px;">
            <select name="level">
                <option>Select Level:</option>
                <option value="admin" <?php if($level == "admin"){echo "selected='true'";} ?>>Admin</option>
                <option value="guest" <?php if($level == "guest"){echo "selected='true'";} ?>>Guest</option>
            </select>
            </div>
        </span>
    </div>
    
    <div class="element-form">
        <label>Status</label>
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