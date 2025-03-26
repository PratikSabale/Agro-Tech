<?php
include("header.php");
$nm="Farming";
if(isset($_GET["product"]))
$nm=$_GET["product"];
?>
<h1 align=center>OUR <?php echo ucfirst($nm);?> Products</h1>
<div class= "row">


<?php
include("connection.php");
$rs=mysqli_query($cn,"select * from prdupload where prdtype='$nm'");
$i=0;
while($a=mysqli_fetch_array($rs))
{
    $nm=$a["prdname"];
    $pid=$a["prdid"];
    $pr=$a["price"];
    $file1=$a["prdimg"];
  
    echo"<div class='col-md-4'>";
    echo"<div class=\"thumbnail\">";
    echo"<a href=\"images/$file1\"target=\"_blank\">";
    echo"<img src=\"images/$file1\"class=\"img-responsive\">";
    echo"<div class=\"caption\">";
    echo"<b>$nm Product</b><br><b>Product Id :$pid</b><br><b>Product Price :$pr</b><br></div></a><a class=\"btn btn-primary\"
    href=buy.php?prdname=$nm&pid=$pid>Buy now</a></div></div>";
    $i++;
    if($i==3)
    {
        echo"</div>";
        echo"<div class=\"row\">";
        $i=0;
    }

}
?>
</div>
<?php
include("footer.php");
?>