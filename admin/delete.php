<?php
$id=$_GET['prdid'];
include("connection.php");
$q="delete from prdupload where prdid='$id'";
mysqli_query($cn,$q);
mysqli_close($cn);
echo "<script>alert('record deleted');window.location='prdupload.php';</script>"; 


?>