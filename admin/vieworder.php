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


<h1 align=center>Recent Orders</h1>
 <table class="table"align=center width=60% height=60% cellpadding=10px border=1px>
    <thead>
      <tr>
        <th>Product Name</th>
        <th>Product Id</th>
        <th>Product Price</th>
        <th >Product Image</th>
       <th>Product Quantity</th>
       <th>Product Amount</th>
      </tr>
    </thead>
    <tbody>
<?php
include("../connection.php");

$rs=mysqli_query($cn,"select * from buy");
while($a=mysqli_fetch_array($rs))
{
 extract($a);

echo "<tr><td>$Productnm</td><td>$ProductId</td><td>$ProductPr</td><td><img src = images/$ProductImg width=100px hight=100px> </td><td>$ProductQuantity</td><td>$ProductAmt</td></tr>";
}
?>
    </tbody>
  </table>
