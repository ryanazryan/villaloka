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
    <span><a href="<?php echo BASE_URL."index.php?page=my_profile&module=kota&action=form";?>" class="btn" style="background-color: #fc1919;">+ ADD COUNTRY</a></span>
    <span><a href="http://localhost/villaloka/" class="btn" style="background-color: #fc1919;"> BACK</a></span>
</div>
<?php	

$queryKota = mysqli_query($koneksi, "SELECT * FROM kota ORDER BY kota ASC");

if(mysqli_num_rows($queryKota) == 0){
        print("<br>");
    echo "<h3 style='text-align: center; color: #db1414;'>CURRENTLY THERE IS NO STATE COOPERATION</h3>";
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

    echo "<tr class='baris-title'>
            <th style='background-color: #db1414; text-align: center;'>NO</th>
            <th style='background-color: #db1414; text-align: center;'>COUNTRY</th>
            <th style='background-color: #db1414; text-align: center;'>STATUS</th>
            <th style='background-color: #db1414; text-align: center;'>ACTION</th>
          </tr>";

    $no = 1;
    while($rowKota = mysqli_fetch_assoc($queryKota)){
        echo "<tr>
                <td style='text-align: center;'>$no</td>
                <td style='text-align: center;'>$rowKota[kota]</td>
                <td style='text-align: center;'>$rowKota[status]</td>
                <td style='text-align: center;'>
                    <a class='btn' style='background-color: #fc1919;' href='".BASE_URL."index.php?page=my_profile&module=kota&action=form&kota_id=$rowKota[kota_id]"."'>Edit</a>
                </td>
              </tr>";   
              
              $no++;
    }

    echo "</table>";
}

?>