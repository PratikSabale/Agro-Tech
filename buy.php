
<html>
  <body>
    <style>
    
    body {
      background-color: #f8f8f8;
      font-family: Arial, sans-serif;
  }

  h1 {
      text-align: center;
      margin-top: 30px;
      color: #337ab7;
  }

  .row {
      margin-top: 50px;
      margin-bottom: 50px;
  }

  form {
      width: 400px;
      margin: 0 auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  }

  img {
      max-width: 100%;
      height: auto;
  }

  .form-control {
      margin-bottom: 15px;
  }

  .btn-primary {
      background-color: #337ab7;
      border: none;
  }

  .btn-primary:hover {
      background-color: #286090;
  }

  .input-group-addon {
      background-color: #f8f8f8;
  }

  select.form-control {
      appearance: none;
      -webkit-appearance: none;
      -moz-appearance: none;
      background: url('https://cdn2.iconfinder.com/data/icons/ios7-inspired-mac-icon-set/1024/settings_5122x.png')
          no-repeat scroll right center transparent;
      background-size: 20px 20px;
  }

  select.form-control::-ms-expand {
      display: none;
  }

  .btn {
    align : "center";
  }

    </style> 
    </body>
    </html>
   

<?php
session_start();
include("header.php");
$nm=0;
$id=0;
$pr="";
$im="";
$unm=$_SESSION["Email"];
if(isset($_GET["pid"]))
{
$nm=$_GET["prdname"];
$id=$_GET["pid"];
}
include("connection.php");
$rs=mysqli_query($cn,"select * from prdupload where prdname='$nm'");
if($a=mysqli_fetch_array($rs))
{

    $nm=$a["prdname"];
  $id=$a["prdid"];
  $pr=$a["price"];
$im=$a["prdimg"];

}
?>

<h1 align=center>Order Details</h1>
<div class="row">
<form id=frmreg method="post" width="600px" name="myForm">
  <div class="input-group">
<?php
echo "<center><img src=\"../images/$im\" width=200 height=200></center></div>";
?>
<br>
<div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
    <input ng-model="address" id="prdname" type="text" class="form-control" name="prdname" placeholder=" Product name" value="<?php echo $nm; ?>" required readonly>

  </div>
  <br>
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
    <input ng-model="address" id="prdid" type="text" class="form-control" name="prdid" placeholder="ID" value="<?php echo $id; ?>" required readonly>

  </div>
<br>
<div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
    <input ng-model="address" id="prdprice" type="text" class="form-control" name="prdprice" placeholder="Price" value="<?php echo $pr; ?>" required readonly>
<br>
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-shopping-cart"></i></span>
    <select id=prdquantity name=prdquantity onchange="cal()" class="form-control">
<option>--select Quantity--</option>
<option value="100">100</option>
<option value="200">200</option>
<option value="500">300</option>
<option value="500">500</option>
<option value="1000">1000</option>
<option value="2000">2000</option>
<option value="5000">5000</option>
</select>
 <script>
function cal()
{
  alert("amount");
  var p,w,a;
 p=document.getElementById("prdprice").value;
 w=document.getElementById("prdquantity").value;
a=p*w;
document.getElementById("amt").value=a;
}
</script>
  </div>

<br>
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
    <input ng-model="address" id="amt" type="text" class="form-control" name="amt" placeholder="0" required readonly>

  </div>

<br>
 
<br>
        <button type="submit" class="btn btn-primary" id="btnsub" name=btnsub>Buy Now</button>
        

</form>

</div>


<?php
include("footer.php");
if(isset($_POST['btnsub']))
{
$unm=$_SESSION['Email'];
Extract($_POST);
$prq=$_POST['prdquantity'];
$am=$_POST['amt'];

include("connection.php");
$q="insert into buy values('$nm','$id','$pr','$im','$prq','$am')";
mysqli_query($cn,$q);
mysqli_close($cn);
echo"<script>window.location='displayprd.php?amount=$am'</script>";
}
?>

