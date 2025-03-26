<html>
    <body>
        <style>
            /* Style for Payment Details page */
body {
  font-family: Arial, sans-serif;
  background-color: #f5f5f5;
}

h1 {
  font-size: 36px;
  text-align: center;
  margin-top: 50px;
  margin-bottom: 30px;
}

.row {
  display: flex;
  justify-content: center;
}

form {
  width: 400px;
  background-color: #fff;
  border-radius: 10px;
  padding: 30px;
  box-shadow: 0px 0px 10px #999;
}

.input-group {
  margin-bottom: 20px;
}

.input-group-addon {
  background-color: #f5f5f5;
  border: none;
}

.form-control {
  border-radius: 0;
  border: none;
  box-shadow: none;
}


.btn-primary {
  background-color: #337ab7;
  border-color: #2e6da4;
}

.btn-primary:hover {
  background-color: #2e6da4;
  border-color: #285e8e;
}

.btn-danger {
  background-color: #d9534f;
  border-color: #d43f3a;
}

.btn-danger:hover {
  background-color: #c9302c;
  border-color: #ac2925;
}
        </style>
    </body>
</html>

<?php
session_start();
include("header.php");
$am=0;
if(isset($_GET["amount"]))
{
$am=$_GET["amount"];
}
include("connection.php");
?>

<h1 align=center>Payment Details</h1>
<div class="row">
<form id=frmreg method="post" name="myForm">
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
    <input id="Flavour" type="text" class="form-control" name="amount" placeholder="Amount" value="<?php echo $am; ?>" required readonly>

  </div>
<br>
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-shopping-cart"></i></span>
    <h5>Only Cash On Delivery Available</h5>
  </div>
<br>
  
        <button type="submit" class="btn btn-primary" id="btnsub" name=btnsub>Place Order</button>
        <button type="reset" class="btn btn-danger" id="btnres" >Cancel</button>
</form>
</div>
<?php
include("footer.php");
if(isset($_POST['btnsub']))
{
$unm=$_SESSION['emailid'];
$wt=$_POST['mode'];
$am=$_POST['amount'];
$add=$_POST['num'];
include("connection.php");
$dt=date("d-m-Y");
$q="insert into payment values('$dt','$unm','$wt',$am)";
mysqli_query($cn,$q);
mysqli_close($cn);
echo"<script>alert('Thank You for ordering..');window.location='displayprd.php'</script>";
}

?>
