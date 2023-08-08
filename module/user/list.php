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
    $no=1;

    $queryAdmin = mysqli_query($koneksi, "SELECT * FROM user ORDER BY nama ASC");

    if(mysqli_num_rows($queryAdmin) == 0) {
        print("<br>");
        echo "<h3 style='text-align: center; color: #db1414;'>THERE IS CURRENTLY NO USER DATA ENTERED</h3>";
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
        echo "<table class='font' style='padding; 10px; border: 1; width: 1200px; margin-left: auto; margin-right: auto;'>";
 
        echo "<tr class='baris-title'>
                <th style='background-color: #db1414; text-align: center;'>No</th>
                <th style='background-color: #db1414;  text-align: center;'>Nama</th>
                <th style='background-color: #db1414;  text-align: center;'>Email</th>
                <th style='background-color: #db1414;  text-align: center;'>Rating</th>
                <th style='background-color: #db1414;  text-align: center;'>Level</th>
                <th style='background-color: #db1414;  text-align: center;'>Status</th>
                <th style='background-color: #db1414;  text-align: center;'>Action</th>
            </tr>";

        while($rowUser=mysqli_fetch_array($queryAdmin)){
            echo "<tr>
                    <td style='text-align: center;'>$no</td>
                    <td style='text-align: center;'>$rowUser[nama]</td>
                    <td style='text-align: center;'>$rowUser[email]</td>
                    <td style='text-align: center;'>$rowUser[rating]</td>
                    <td style='text-align: center;'>$rowUser[level]</td>
                    <td style='text-align: center;' >$rowUser[status]</td>
                    <td style='text-align: center;'><a class='btn' style='background-color: #fc1919;' href='".BASE_URL."index.php?page=my_profile&module=user&action=form&user_id=$rowUser[user_id]"."'>Edit</a></td>
                </tr>";

            $no++;      
        }

        //Akhir dari table//
        echo "</table>";
    }
?>