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

    $barang_id = isset($_GET['barang_id']) ? $_GET['barang_id'] : false;

    $nama_barang = "";
    $kategori_id = "";
    $kota_id = "";
    $subkota_id = "";
    $spesifikasi = "";
    $gambar = "";
    $harga = "";
    $stok = "";
    $status = "";
    $keterangan_gambar = "";
    $button = "Add";

    if($barang_id){
        $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE barang_id='$barang_id'");
        $row = mysqli_fetch_assoc($query);

        $nama_barang = $row['nama_barang'];
        $kategori_id = $row['kategori_id'];
        $kota_id = $row['kota_id'];
        $subkota_id = $row['subkota_id'];
        $spesifikasi = $row['spesifikasi'];
        $gambar = $row['gambar'];
        $harga = $row['harga'];
        $stok = $row['stok'];
        $status = $row['status'];
        $button = "Update";

        $keterangan_gambar = "(Click Choose File if you want to replace the image below)";
        $gambar = "<img src='".BASE_URL."images/content/$gambar' style='width: 200px;vertical-align: middle;' />";
    }

?>

<script src="<?php echo BASE_URL."js/ckeditor/ckeditor.js"; ?>"></script>

<form action="<?php echo BASE_URL."module/barang/action.php?barang_id=$barang_id"; ?>" method="POST" enctype="multipart/form-data" style="text-align: center">

<div class="bgded overlay" style="background-image: url(images/background/gunung.jpg);">
<div id="footer">
    <div>
            <label>CATEGORY</label>
            <span>
            <div class="custom-select" style="margin-left: auto; margin-right: auto; width: 400px;">
               <select name="kategori_id">
                   <option>Choose your Category:</option>
                   <?php
                    $query = mysqli_query($koneksi, "SELECT kategori_id, kategori FROM kategori WHERE status='on' ORDER BY kategori ASC");
                    while($row=mysqli_fetch_array($query)){
                        if($kategori_id == $row['kategori_id']){
                            echo "<option value='$row[kategori_id]' selected='true'>$row[kategori]</option>";
                        }else{
                            echo "<option value='$row[kategori_id]'>$row[kategori]</option>";
                        }
                    }
                    ?>
                </select>
            </div>
        </span>
    </div>
    <div>
            <label>COUNTRY</label>
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
            <label>CITY</label>
            <span>
            <div style="margin-left: auto; margin-right: auto; width: 400px;">
                <input type="text" list="city" name="subkota_id"/>
                <datalist id="city" name="subkota_id">
                    <?php
                    $query = mysqli_query($koneksi, "SELECT subkota_id, subkota FROM subkota WHERE status='on' ORDER BY subkota ASC");
                    while($row=mysqli_fetch_array($query)){
                            echo "<option value='$row[subkota_id]'>$row[subkota]</option>";
                        }
                    ?>
            </div>
        </span>
    </div>
    <div class="element-form">
        <label>ROOM NAME</label>
        <span><input style="margin-left: auto; margin-right: auto; width: 400px;" type="text" name="nama_barang" value="<?php echo $nama_barang; ?>" /></span>
    </div>

    <div class="element-form">
    <label>DESCRIPTION</label>
        <span><input style="margin-left: auto; margin-right: auto; width: 400px;" type="text" name="spesifikasi" value="<?php echo $spesifikasi; ?>" /></span>
    </div>

    <div class="element-form">
         <label>UNIT ROOMS</label>
        <span><input style="margin-left: auto; margin-right: auto; width: 400px;" type="text" name="stok" value="<?php echo $stok; ?>" /></span>
    </div>

    <div class="element-form">
            <label>PRICE / NIGHT</label>
            <span><input style="margin-left: auto; margin-right: auto; width: 400px;" type="text" name="harga" value="<?php echo $harga; ?>" /></span>
    </div>
    <div class="element-form">
            <label>IMAGE</label>
            <span>
                <input style="margin-left: auto; margin-right: auto; width: 400px;" type="file" name="file" /><br><?php echo $gambar; ?>
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
        <span><button class="btn" type="submit" name="button" value="<?php echo $button ?>" >Save</button></span>
        <span><button href="index.php?page=my_profile&module=barang&action=list" class="btn"> Back</button></span>
    </div>
</div>
</div>
</form>
<script src="js/custom-select.js"></script>
<script>
    CKEDITOR.replace("editor");
</script>