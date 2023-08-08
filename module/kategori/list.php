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
<div style="padding: 20px;">
    <span><a href="<?php echo BASE_URL."index.php?page=my_profile&module=kategori&action=form"; ?>" class="btn" style="background-color: #fc1919;">+ ADD CATEGORY</a></span>
    <span><a href="http://localhost/villaloka/" class="btn" style="background-color: #fc1919;"> BACK</a></span>
</div>

<?php	
$queryKategori = mysqli_query($koneksi, "SELECT * FROM kategori");

if(mysqli_num_rows($queryKategori) == 0){
        print("<br>");
    echo "<h3 style='color: #db1414; text-align: center;'>THERE ARE CURRENTLY NO ROOM CATEGORIES</h3>";
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
            <th style='background-color: #db1414; text-align: center;'>CATEGORY</th>
            <th style='background-color: #db1414; text-align: center;'>STATUS</th>
            <th style='background-color: #db1414; text-align: center;'>ACTION</th>
          </tr>";

    $no = 1;    
    while($row=mysqli_fetch_array($queryKategori)){
        echo "<tr>
                <td style='text-align: center;'>$no</td>
                <td style='text-align: center;'>$row[kategori]</td>
                <td style='text-align: center;'>$row[status]</td>
                <td style='text-align: center;'>
                    <a class='btn' style='background-color: #fc1919;' href='".BASE_URL."index.php?page=my_profile&module=kategori&action=form&kategori_id=$row[kategori_id]'>Edit</a>
                </td>
              </tr>";

        $no++;      
    }

    echo "</table>";
}
?>
<br>