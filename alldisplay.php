<?php
include("header.php");
?>
<h1 align=center>OUR Products</h1>
<div class= "row">


<?php
include("connection.php");
$rs=mysqli_query($cn,"select * from prdupload");
$i=0;
while($a=mysqli_fetch_array($rs))
{
    $nm=$a["prdname"];
    $pid=$a["prdid"];
    $file1=$a["prdimg"];
   
    echo"<div class='col-md-3'>";
    echo"<div class=\"thumbnail\">";
    echo"<a href=\"images/$file1\"target=\"_blank\">";
    echo"<img src=\"images/$file1\"class=\"img-responsive\">";
    echo"<div class=\"caption\">";
    echo"<b>$nm Product</b><br>Product Id :$pid</b> </div></a></div></div>";
    $i++;
    if($i==4)
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