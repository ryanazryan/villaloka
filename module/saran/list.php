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
    <span><a href="http://localhost/villaloka/" class="btn" style="background-color: #fc1919;"> BACK</a></span>
</div>

<?php	
$querySaran = mysqli_query($koneksi, "SELECT * FROM saran");

if(mysqli_num_rows($querySaran) == 0){
        print("<br>");
    echo "<h3 style='color: #db1414; text-align: center;'>AT THIS TIME NO ONE HAS GIVEN ADVICE</h3>";
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
            <th style='background-color: #db1414; text-align: center;'>NAMA</th>
            <th style='background-color: #db1414; text-align: center;'>SARAN</th>
          </tr>";

    $no = 1;    
    while($row=mysqli_fetch_array($querySaran)){
        echo "<tr>
                <td style='text-align: center;'>$no</td>
                <td style='text-align: center;'>$row[nama]</td>
                <td style='text-align: center;'>$row[suggestion]</td>
              </tr>";

        $no++;      
    }

    echo "</table>";
}
?>
<br>