<?php
include("header1.php");
$id=$_GET['id'];
include("connection.php");
$q="select * from crop where ID='$id'";
$rs=mysqli_query($cn,$q);
$id="";
$img="";
$nm="";
$duration="";
if($a=mysqli_fetch_array($rs))
{
    $id=$a['ID'];
    $img=$a['Image'];
    $nm=$a['Name'];
    $duration=$a['Duration'];
}
?>
<div class="row">
<div class="col-sm-8">
    <form id=frmreg method="post" name="myForm" enctype="multipart/form-data">
        
        <input type=text name=ID  value="<?php echo $id;?>">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-camera"></i></span>
            <img src="img/<?php echo$im;?>"width=200 height=200>
            <input ng-model="address" id="address" type="file" class="form-control" name="file1" placeholder="Select image"required>
</div>
            <input type=text name=Name value="<?php echo $nm;?>"><br>
            <input type=text name=Duration value="<?php echo $duration;?>"><br>
            <br>
            <button type="submit" class="btn btn-primary" id="btnsub" name=btnsub>Update</button>
            <button type="reset" class="btn btn-danger" id="btnres">Reset</button>
</form>
</div>
</div>
<br>
<div class="col-sm-8">
    <h1>Crop</h1>
    <table class=table>
        <thead>
            <tr>
                <th>ID</th><th>Image</th><th>Name</th><th>Duration</th><th>Actions</th>
            </tr>
        </thead>
        
<tbody>
    <?php
    include("connection.php");
    $q="select * from crop";
    $rs=mysqli_query($cn,$q);
    while($a=mysqli_fetch_array($rs))
    {
        $id=$a['ID'];
        $img=$a['Image'];
        $nm=$a['Name'];
        $duration=$a['Duration'];
        echo "<tr>";
        echo "<td>$id</td><td><img src=img/$img width=100 height=100></td><td>$nm</td><td>$duration</td><td><a class='btn btn-danger'href=delcrop.php?ID=$id>Delete</a>   <a class='btn btn-info'href=upcrop.php?ID=$id>Update</a></td>";
        echo "</tr>";
    }
    ?>
    </tbody>
</table>
</div>
</div>

<?php
include("footer.php");
if(isset($_POST['btnsub']))
{
$id=$_POST["ID"];
$nm=$_POST["Name"];
$duration=$_POST["Duration"];
$fn=$_FILES['file1']['name'];
$s=$_FILES['file1']['size'];
$tnm=$_FILES['file1']['tmp_name'];
$ptr1=fopen($tnm,"r");
$ptr2=fopen("img/$fn","w");
$data=fread($ptr1,$s);
fwrite($ptr2,$data);
fclose($ptr1);
fclose($ptr2);
include("connection.php");
$q="update crop set Image='$fn',Name='$nm',Duration='$duration'where ID=$id";
mysqli_query($cn,$q);
mysqli_close($cn);
echo"<script>alert('Crop Updated Successfully..');window.location='crop.php'</script>";
}
?>