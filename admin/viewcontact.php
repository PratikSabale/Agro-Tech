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
<h1 align=center>Contact Details</h1>
 <table class="table" align=center width=60% height=80% cellpadding=10px border=1px>
    <thead>
      <tr>
        <th>Name</th>
        <th>Contact</th>
        <th>Email</th>
        <th>message</th>
      </tr>
    </thead>
    <tbody>
<?php
include("../connection.php");

$rs=mysqli_query($cn,"select * from contact ");
while($a=mysqli_fetch_array($rs))
{
 extract($a);

echo "<tr><td>$name</td><td>$contact</td><td>$email</td><td>$message</tr>";
}
?>
    </tbody>
  </table>
