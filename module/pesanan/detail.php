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
<script>
function printContent(el){
    var restorepage = document.body.innerHTML;
    var printcontent = document.getElementById(el).innerHTML;
    document.body.innerHTML = printcontent;
    window.print();
    document.body.innerHTML = restorepage;
}
</script>

<?php
    

    $pesanan_id = $_GET["pesanan_id"];
    $query = mysqli_query($koneksi, "SELECT pesanan.nama_penerima, pesanan.rating, pesanan.nomor_telepon, pesanan.tanggal_pemesanan, pesanan.check_in, pesanan.check_out, user.nama
                                    FROM pesanan JOIN user ON pesanan.user_id=user.user_id WHERE pesanan.pesanan_id='$pesanan_id'");

    $row = mysqli_fetch_assoc($query);


    $tanggal_pemesanan = $row['tanggal_pemesanan'];
    $nama_penerima = $row['nama_penerima'];
    $rating = $row['rating'];
    $nomor_telepon = $row['nomor_telepon'];
    $nama = $row['nama'];   
    $check_in = $row['check_in'];
    $check_out = $row['check_out'];

?>
<div id="div1">
<div>
    <br>

    <h3 style="text-align: center; color: #db1414;">DETAIL DATA BOOKING</h3>

    <hr/>

    <table class='font' style='padding; 10px; border: 1; width: 1200px; margin-left: auto; margin-right: auto;'>

        <tr style="color: #db1414;">
            <td style="color: #db1414;">ID BOOKING</td>
            <td style="color: #db1414;">:</td>
            <td style="color: #db1414;"><?php echo $pesanan_id; ?></td>
        </tr>
        <tr>
            <td style="color: #db1414;">NAME</td>
            <td style="color: #db1414;">:</td>
            <td style="color: #db1414;"><?php echo $nama; ?></td>
        </tr>
        <tr>
            <td style="color: #db1414;">PHONE NUMBER</td>
            <td style="color: #db1414;">:</td>
            <td style="color: #db1414;"><?php echo $nomor_telepon; ?></td>
        </tr>
        <tr>
            <td  style="color: #db1414;">BOOKING DATE</td>
            <td style="color: #db1414;">:</td>
            <td style="color: #db1414;"><?php echo $tanggal_pemesanan; ?></td>
        </tr>
        <tr>
            <td style="color: #db1414;">CHECK IN</td>
            <td style="color: #db1414;">:</td>
            <td style="color: #db1414;"><?php echo $check_in; ?></td>
        </tr>
        <tr>
            <td style="color: #db1414;">CHECK OUT</td>
            <td style="color: #db1414;">:</td>
            <td style="color: #db1414;"><?php echo $check_out; ?></td>
        </tr>
    </table>
</div>
<table class='font' style='padding; 10px; border: 1; width: 1200px; margin-left: auto; margin-right: auto;'>

    <tr style='text-align: center;'>
        <th style='background-color: #db1414;'>NO</th>
        <th style='background-color: #db1414;'>ROOM NAME</th>
        <th style='background-color: #db1414;'> PRICE / NIGHT</th>
        <th style='background-color: #db1414;'>UNIT OF ROOMS</th>
        <th style='background-color: #db1414;'>DAYS OF STAY</th>
        <th style='background-color: #db1414;'>TOTAL</th>
    </tr>
    
    <?php

$queryDetail = mysqli_query($koneksi, "SELECT pesanan_detail.*, barang.nama_barang FROM pesanan_detail JOIN barang ON
                                       pesanan_detail.barang_id=barang.barang_id WHERE pesanan_detail.pesanan_id='$pesanan_id'");

$no = 1;
while($rowDetail=mysqli_fetch_assoc($queryDetail)){

        $quantity = $rowDetail['quantity'];

        $hari1 = $row["check_in"];
        $hari2 = $row["check_out"];
        $early = new DateTime($hari1);
        $late = new DateTime($hari2);

        $days = $late->diff($early)->format("%a");
    
        if($rating == "diamondcard"){
            $discount = "20%";
            $diskon = 0.2;
            $rank = "Diamond Card";
        }
        if($rating == "platinumcard"){
            $discount = "15%";
            $diskon = 0.15;
            $rank = "Platinum Card";
        }
        if($rating == "goldcard"){
            $discount = "10%";
            $diskon = 0.1;
            $rank = "Gold Card";
        }
        if($rating == "silvercard"){
            $discount = "5%";
            $diskon = 0.05;
            $rank = "Silver Card";
        }
        if($rating == "bronzecard"){
            $discount = "0%";
            $diskon = 0;
            $rank = "Bronze Card";
        }

        $total = $rowDetail["harga"] * $days * $quantity;
        $totaldiskon = $total * $diskon;
        $subtotal = $total - $totaldiskon;

        echo "<tr>
                <td style='text-align: center;'>$no</td>
                <td style='text-align: center;''>$rowDetail[nama_barang]</td>
                <td style='text-align: center;'>".rupiah($rowDetail["harga"])."</td>
                <td style='text-align: center;''>$quantity</td>
                <td style='text-align: center;''>$days</td>
                
                <td style='text-align: center;'>".rupiah($total)."</td>
             </tr>";
    $no++;
}   
?>    
    <tr>
        <td style="background-color: #db1414; color: #fff;" colspan="5">Discount Member :  <?php echo $rank; ?> </td>
        <td style="background-color: #db1414; color: #fff; text-align: center;"><?php echo $discount; ?></td>
    </tr>
</table>
<table class='font' style='padding; 10px; border: 1; width: 1200px; margin-left: auto; margin-right: auto;'>
<tr>
        <td style="background-color: #db1414; color: #fff; text-align: center;" colspan="5">SUB TOTAL</td>
        <td style="background-color: #db1414; color: #fff; text-align: center;"><b><?php echo rupiah ($subtotal); ?></b></td>
    </tr>
</table>
</div>

<div>
<p style="color: #db1414; text-align: center; font-family: Calibri, Calibri;"><br/>
        <a class="btn" href="<?php echo BASE_URL."index.php?page=my_profile&module=pesanan&action=konfirmasi_pembayaran&pesanan_id=$pesanan_id"?>" style="background-color: #fc1919;">PAY</a>
        <a class="btn" href="<?php echo BASE_URL."index.php?page=my_profile&module=pesanan&action=list"?>" style="background-color: #fc1919;">Back</a>
        <a class="btn" style="background-color: #fc1919; cursor: pointer;" onclick="printContent('div1')">PRINT</a>
    </p>
    <br>
</div>