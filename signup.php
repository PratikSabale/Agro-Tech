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

<center>
<div class="container">  
  <h1 >Signup here</h1>  
  
<form method="post" style="width:600px" >  
  <div class="form-group">  
    <label for="exampleInputEmail1">Name</label>  
    <input type="text" class="form-control" name="nm" id="exampleInputEmail1" placeholder="Name" pattern="\D+" oninvalid="this.setCustomValidity('Please enter valid name')" oninput="this.setCustomValidity('')" required>  
  </div>    
  <div class="form-group">  
    <label for="exampleInputEmail1">Address</label>  
    <textarea class="form-control" name="Address" id="exampleInputEmail1" placeholder="Address"  required>  
</textarea>
  </div>    
  <div class="form-group">  
    <label for="exampleInputEmail1">Mobile no</label>  
    <input type="text" class="form-control" name="mobno" id="exampleInputEmail1" placeholder="Mobile no" pattern="\d{10}" oninvalid="this.setCustomValidity('Please enter valid contact no')" oninput="this.setCustomValidity('')" required>  
  </div>  
   
  <div class="form-group">  
    <label for="exampleInputEmail1">Email address</label>  
    <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Email" oninvalid="this.setCustomValidity('Please enter valid email')" oninput="this.setCustomValidity('')" required>  
  </div>  
  

  <div class="form-group">
    <label for="city">City</label>
    <select class="form-control" name="city" id="city"  required>
      <option>---select city---</option>
      <option value=satara>Satara</option>
      <option value=pune>Pune</option>
      <option value=mumbai>Mumbai</option>
      <option value=nashik>Nashik</option>
</select>
  </div>
  <div class="form-group">  
    <label for="exampleInputPassword1">Password</label>  
    <input type="password" class="form-control" name="pass" id="exampleInputPassword1" placeholder="Password" required>  
  </div>  
    
  <button type="submit" class="btn btn-primary" name="btnsub">Register</button>  
  <button type="submit" class="btn btn-danger">Reset</button>  
</form>  
  
</div>  
</center>
<?php
include("footer.php");
if(isset($_POST['btnsub']))
{
  extract($_POST);
  include("connection.php");
  $q="insert into signup values('$nm','$Address','$mobno','$email','$city','$pass')";
  mysqli_query($cn,$q);
  mysqli_close($cn);
  echo"<script>alert('registration successful');window.location='login.php'</script>";
}
?>