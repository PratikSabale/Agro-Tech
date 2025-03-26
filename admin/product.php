<?php
include("header1.php");
?>
<h1 align=center>Add Products</h1>
<form id=frmreg method="post" name="myform" enctype="multipart/form-data">
  <div class="productnm">
    <label for="email">Product Name:</label>
    <input type="name" class="form-control" name="nm">
  </div>
  <div class="productid">
    <label for="pwd">Product Id:</label>
    <input type="productid" class="form-control" name="pid">
  </div>
<br>
<div class="img">
<span ckass="input-group-addon"><i class="glyphicon glyphicon-camera"></i><span>
<input ng-model="address" id="address" type="file" class="form-control" name="file1" placeholder="Select Image" required>
  </div>
<br>
  <button type="submit" class="btn btn-primary">Submit</button>

</form>
<?php
include("footer.php");
if(isset($_POST['btnsub']))
{
extract($_POST);
$nm=$_FILES['file1']['name'];
$pid=$_FILES['file1']['productid'];
$tnm=$_FILES['file1']['tmp_name'];
$ptr1=fopen($tnm,"r");
$ptr2=fopen("images/$fn","w");
$data=fread($ptr1,$pid);
fwrite($ptr2,$data);
fclose($ptr1);
fclose($ptr2);
include("connection.php");
$q="insert into purchase(productname,productid,img)values('$nm','$pid',,'$fn')";
mysqli_query($cn,$q);
mysqli_close($cn);
echo"<script>alert('Product added successfully'):window.location='product.php'</script>";
}
?>