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

<div id="frame-tambah" style="padding: 20px;">
    <span><a class="btn" href="<?php echo BASE_URL."index.php?page=my_profile&module=subkota&action=form";?>" style="background-color: #fc1919;">+ ADD CITY</a></span>
    <span><a href="http://localhost/villaloka/" class="btn" style="background-color: #fc1919;"> BACK</a></span>
</div>
<?php	

$querySubkota = mysqli_query($koneksi, "SELECT subkota.*, kota.kota FROM subkota JOIN kota ON subkota.kota_id=kota.kota_id ORDER BY kota_id");

if(mysqli_num_rows($querySubkota) == 0){
        print("<br>");
    echo "<h3>CURRENTLY THERE IS NO STATE COOPERATION</h3>";
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
    echo "<table class='font' style='padding; 10px; border: 1; width: 1200px; margin-left: auto; margin-right: auto;'>";

    echo "<tr>
            <th style='background-color: #db1414; text-align: center;''>NO</th>
            <th style='background-color: #db1414; text-align: center;''>CITY</th>
            <th style='background-color: #db1414; text-align: center;''>ID</th>
            <th style='background-color: #db1414; text-align: center;''>COUNTRY</th>
            <th style='background-color: #db1414; text-align: center;''>STATUS</th>
            <th style='background-color: #db1414; text-align: center;''>ACTION</th>
          </tr>";

    $no = 1;
    while($rowSubkota = mysqli_fetch_assoc($querySubkota)){
        echo "<tr>
                <td style='text-align: center;'>$no</td>
                <td style='text-align: center;'>$rowSubkota[subkota]</td>
                <td style='text-align: center;'>$rowSubkota[subkota_id]</td>
                <td style='text-align: center;'>$rowSubkota[kota]</td>
                <td style='text-align: center;'>$rowSubkota[status]</td>
                <td style='text-align: center;'>
                    <a class='tombol-action' href='".BASE_URL."index.php?page=my_profile&module=subkota&action=form&subkota_id=$rowSubkota[subkota_id]"."'>Edit</a>
                </td>
              </tr>";   
              
              $no++;
    }

    echo "</table>";
}

?>
<br>