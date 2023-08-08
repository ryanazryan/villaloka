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

    if($level == "admin"){
        $queryPesanan=mysqli_query($koneksi, "SELECT pesanan.*, user.nama FROM pesanan JOIN user ON pesanan.user_id=user.user_id ORDER BY pesanan.tanggal_pemesanan DESC");
    } else {
        $queryPesanan=mysqli_query($koneksi, "SELECT pesanan.*, user.nama FROM pesanan JOIN user ON pesanan.user_id=user.user_id WHERE pesanan.user_id='$user_id' ORDER BY
        pesanan.tanggal_pemesanan DESC");
    }
    
    if(mysqli_num_rows($queryPesanan) == 0){
        print("<br>");
        echo "<h3 style='text-align: center; color: #db1414;'>YOU HAVEN'T MADE A BOOKING</h3>";
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
        print("<br>");
        echo "<table class='font' style='padding; 10px; border: 1; width: 1200px; margin-left: auto; margin-right: auto;'>
                <tr class='baris-title'>
                    <th style='background-color: #db1414; text-align: center;'>BOOKING NUMBER</th>
                    <th style='background-color: #db1414; text-align: center;'>STATUS</th>
                    <th style='background-color: #db1414; text-align: center;'>NAME</th>
                    <th style='background-color: #db1414; text-align: center;'>ACTION</th>
        </tr>";
        $adminButton ="";
        while($row=mysqli_fetch_assoc($queryPesanan)){
            if($level == "admin"){
                $adminButton = "<a class='btn' style='background-color: #fc1919;' href='".BASE_URL."index.php?page=my_profile&module=pesanan&action=status&pesanan_id=$row[pesanan_id]' style='background-color: #fc1919;'>UPDATE</a>";
            }

            $status = $row['status'];
            echo "<tr class='font'>
                    <td style='text-align: center;'>$row[pesanan_id]</td>
                    <td style='text-align: center;'>$arrayStatusPesanan[$status]</td>
                    <td style='text-align: center;'>$row[nama]</td>
                    <td style='text-align: center;'>
                        <a class='btn' style='background-color: #fc1919;' href='".BASE_URL."index.php?page=my_profile&module=pesanan&action=detail&pesanan_id=$row[pesanan_id]' style='background-color: #fc1919;'>DETAIL</a> &ensp;
                        $adminButton
                    </td>
                 </tr>";

        }

        echo "</table>";
    }

?>
<br>