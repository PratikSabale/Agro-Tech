<?php
include("header.php");
?>
<style>
  .b1{
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

<!-- <body background="images\bg12.jpeg" style="background-size:100% 100%"> -->
<center>
<div class="container">  
  <h1 class=b1> order</h1>  
  
<form method="post" style="width:50%" enctype="multipart/form-data">  
  <div class="form-group">  
    <label for="exampleInputEmail1">Name:</label>  
    <input type="text" class="form-control" name="nm" id="exampleInputEmail1" placeholder="Name" pattern="\D+" oninvalid="this.setCustomValidity('Please enter valid name')" oninput="this.setCustomValidity('')" required>  
  </div>    
  <div class="form-group">  
    <label for="exampleInputEmail1">Mobile no:</label>  
    <input type="text" class="form-control" name="mob" id="exampleInputEmail1" placeholder="Mobile no" pattern="\d{10}" oninvalid="this.setCustomValidity('Please enter valid contact no')" oninput="this.setCustomValidity('')" required>  
  </div>  
   
  <div class="form-group">  
    <label for="exampleInputEmail1">Email address:</label>  
    <input type="email" class="form-control"name="email" id="exampleInputEmail1" placeholder="Email" oninvalid="this.setCustomValidity('Please enter valid email')" oninput="this.setCustomValidity('')" required>  
  </div>  
  <div class="form-group">  
    <label for="exampleInputEmail1">Birth date:</label>  
    <input type="date" class="form-control" name="bdate" id="exampleInputEmail1" required>  
  </div> 
  <div class="form-group">  
    <label for="exampleInputEmail1">Qualification:</label>  
    <input type="text" class="form-control" name="qualification" id="exampleInputEmail1" placeholder="Qualification" required>  
  </div> 
  

  <div class="form-group">  
    <label for="exampleInputPassword1">Upload photo:</label>  
    <input type="file" class="form-control" name="uphoto" placeholder="upload photo">  
  </div> 
  <div class="form-group">
    <label for="city">Gender</label>
    <select class="form-control" name="gen" id="city" required>
      <option>---select gender---</option>
      <option value=Male>Male</option>
      <option value=female>Female</option>
      <option value=other>other</option> 
</select></div>
<div class="form-group">  
    <label for="exampleInputEmail1">Height:</label>  
    <input type="text" class="form-control" name="height" id="exampleInputEmail1" placeholder="Height" required>  
  </div>
  <div class="form-group">  
    <label for="exampleInputEmail1">Weight:</label>  
    <input type="text" class="form-control" name="weight" id="exampleInputEmail1" placeholder="Weight" required>  
  </div> 

  <button type="submit" class="btn btn-primary" name="btnsub">Submit</button>  
  <button type="submit" class="btn btn-danger">&nbsp;&nbsp;Reset</button>  


</form>  

    
 
</div>  
</center>

</body>
  
<?php
include("footer.php");
if(isset($_POST['btnsub']))
{
  extract($_POST);
  $uphoto=$_FILES['uphoto']['name'];
  $s=$_FILES['uphoto']['size'];
  $tnm=$_FILES['uphoto']['tmp_name'];

  $ptr1=fopen($tnm,"r");
  $ptr2=fopen("./admin/images/$uphoto","w");

  $data=fread($ptr1,$s);
  fwrite($ptr2,$data);
  fclose($ptr1);
  fclose($ptr2);

  include("connection.php");
  $q="insert into admission  values('$nm','$mob','$email','$bdate','$gen','$qualification','$uphoto',$height,$weight)";
  mysqli_query($cn,$q);
  mysqli_close($cn);
  echo"<script>alert('Admission successful');window.location='index.php'</script>";
}
?>