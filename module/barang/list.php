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
<div id="frame-tambah" style="padding: 20px;">
    <a href="<?php echo BASE_URL."index.php?page=my_profile&module=barang&action=form"; ?>" class="btn" style="background-color: #fc1919;">+ ADD ROOMS</a>
    <a href="http://localhost/villaloka/" class="btn" style="background-color: #fc1919;"> BACK</a>
</div>
<?php

    $query = mysqli_query($koneksi, "SELECT barang.*, subkota.subkota, kategori.kategori, kota.kota FROM barang JOIN subkota ON barang.subkota_id=subkota.subkota_id JOIN kategori ON barang.kategori_id=kategori.kategori_id JOIN kota ON barang.kota_id=kota.kota_id");
    
    if(mysqli_num_rows($query) == 0){
        print("<br>");
        echo "<h3 style='color: #db1414; text-align: center;'>THERE ARE CURRENTLY NO ROOMS AVAILABLE</h3>";
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
    }else{

        echo "<table class='font' style='padding; 10px; border: 1; width: 1200px; margin-left: auto; margin-right: auto;'>";

        echo "<tr class='baris-title'  >
                <th style='background-color: #db1414; text-align: center;'>NO</th>
                <th style='background-color: #db1414; text-align: center;'>ROOM NAME</th>
                <th style='background-color: #db1414; text-align: center;'>CATEGORY</th>
                <th style='background-color: #db1414; text-align: center;'>COUNTRY</th>
                <th style='background-color: #db1414; text-align: center;'>CITY</th>
                <th style='background-color: #db1414; text-align: center;'>PRICE / NIGHT</th>
                <th style='background-color: #db1414; text-align: center;'>STATUS</th>
                <th style='background-color: #db1414; text-align: center;'>ACTION</th>
            </tr>";

            $no=1;
            while($row=mysqli_fetch_assoc($query)){

                echo "<tr>
                        <td style='text-align: center;'>$no</td>
                        <td style='text-align: center;'>$row[nama_barang]</td>
                        <td style='text-align: center;'>$row[kategori]</td>
                        <td style='text-align: center;'>$row[kota]</td>
                        <td style='text-align: center;'>$row[subkota]</td>
                        <td style='text-align: center;'>".rupiah($row['harga'])."</td>
                        <td style='text-align: center;'>$row[status]</td>
                        <td style='text-align: center;'>
                            <a class='btn' style='background-color: #fc1919;' href='".BASE_URL."index.php?page=my_profile&module=barang&action=form&barang_id=$row[barang_id]'>Edit</a>
                        </td>
                    </tr>";

                $no++;
            }

            echo "</table>";

    }

?>
<br>