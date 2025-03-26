<?php
include("header1.php");
?>

<style>
  h1{
    font-family: "Times New Roman";
    
    font-stretch:normal;
    font-variant:small-caps;
    background-image:linear-gradient(to right, #ef0000,#6222be,#e91410);
        -webkit-background-clip:text;
        color:transparent;
            font-style:italic;
            font-weight:bold;
  }
</style>
<h1 align=center>Recent Feedback</h1>
 <table class="table" align=center width=60% height=80% cellpadding=10px border=1px>
    <thead>
      <tr>
        <th>Rating</th>
        <th>satisfication</th>
        <th>Prices</th>
        <th>Timeliness</th>
       <th>Customer support</th>
       <th>Recommend</th>
       <th>Message</th>
       <th>Email</th>
      </tr>
    </thead>
    <tbody>
<?php
include("../connection.php");

$rs=mysqli_query($cn,"select * from feedback ");
while($a=mysqli_fetch_array($rs))
{
 extract($a);

echo "<tr><td>$rating</td><td>$satisfication</td><td>$prices</td><td>

$timeliness</td><td>$custsupport</td><td>$recommend</td><td>$message</td><td>$email</td></tr>";
}
?>
    </tbody>
  </table>
