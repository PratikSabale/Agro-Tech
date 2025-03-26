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


<h1 align=center>Recent Registrations</h1>
 <table class="table"align=center width=60% height=60% cellpadding=10px border=1px>
    <thead>
      <tr>
        <th>Name</th>
        <th>Address</th>
        <th>Mobile no</th>
        <th >Emailid</th>
       <th>City</th>
      </tr>
    </thead>
    <tbody>
<?php
include("../connection.php");

$rs=mysqli_query($cn,"select * from signup");
while($a=mysqli_fetch_array($rs))
{
 extract($a);

echo "<tr><td>$name</td><td>$address</td><td>$mobile</td><td>$email</td><td>$city</td></tr>";
}
?>
    </tbody>
  </table>
