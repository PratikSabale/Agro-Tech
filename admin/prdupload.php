<?php
include("header1.php");
?>
<h1 align=center>Add Products</h1>
<form id=frmreg method="post" name="myform" enctype="multipart/form-data">
<label for="Product Type">Product Type</label>
    <select class="form-control" name="nm" id="nm"  required>
      <option>---select Product---</option>
      <option value=Farming>Farming</option>
      <option value=Fruits>Fruits</option>
      <option value=Flowers>Flowers</option>
      
</select>
  </div>
  <div class="product">
    <label for="productname">Product Name:</label>
    <input type="text" class="form-control" name="pnm" required>
  </div>
  </div>
  <div class="productid">
    <label for="productid">Product Id:</label>
    <input type="text" class="form-control" name="pid" required>
  </div>
<br>
<div class="productid">
    <label for="price">Product Price:</label>
    <input type="text" class="form-control" name="pr" required>
  </div>
  <br>
<div class="img">
<span ckass="input-group-addon"><i class="glyphicon glyphicon-camera"></i><span>
<input ng-model="address" id="address" type="file" class="form-control" name="file1" placeholder="Select Image" required>
  </div>
<br>
  <button type="submit" class="btn btn-primary" name="btnsub">Submit</button>

</form>

<div>
<h2>Products</h2>
<table class=table>
  <thead>
    <tr>
      <th>Actions</th><th>Product Name</th><th>Product Id</th><th>Price</th><th>Image</th>
</tr>
</thead>
<tbody>
  <?php
  include("connection.php");
  $q="select * from prdupload";
  $rs=mysqli_query($cn,$q);
  while($a=mysqli_fetch_array($rs))
  {
    extract($a);
    echo "<tr>";
    echo "<td><a href=delete.php?prdid=$prdid>Delete</a><a href=update.php?prdid=prdid> Update</a></td><td>$prdtype</td><td>$prdid</td><td>$price</td><td><img src='images/$prdimg' width=100</td>";
    echo "</tr>";
  }
  ?>
  </tbody>
</table>
</div>

<?php
include("footer.php");
if(isset($_POST['btnsub']))
{
extract($_POST);
$file1=$_FILES['file1']['name'];
$s=$_FILES['file1']['size'];
$tnm=$_FILES['file1']['tmp_name'];

$ptr1=fopen($tnm,"r");
$ptr2=fopen("images/$file1","w");

$data=fread($ptr1,$s);
fwrite($ptr2,$data);
fclose($ptr1);
fclose($ptr2);

include("connection.php");
$q="insert into prdupload values('$nm','$pnm','$pid','$pr','$file1')";
mysqli_query($cn,$q);
mysqli_close($cn);
echo"<script>alert('Product added Successfully');window.location='index.php'</script>";
}
?>