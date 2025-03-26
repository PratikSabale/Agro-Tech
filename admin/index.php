<?php
session_start();
include("header.php");
?>
<center>
  <h1> Admin Login </h1>
  <?php 
    if(isset($_POST['btnsub']))
    {
      $unm=$_POST['unm'];
      $pass=$_POST['pass'];
      include("connection.php");
      $q="select * from adminlogin where username='$unm' and password='$pass'";
      $result=mysqli_query($cn,$q);
      if($a=mysqli_fetch_array($result))
      {
        $_SESSION['username']=$unm;
       echo "<script>window.location='index1.php'</script>";
        
      }
      else
      echo "<center><b><font color=red>incorrect Email id or password</font></b></center>";
    }
     ?>
<form style="width:50%" method="post">  

   
  <div class="form-group">  
    <label for="exampleInputEmail1">User name/Email id</label>  
    <input type="text" name="unm" class="form-control" id="exampleInputEmail1" placeholder="Email">  
  </div>  
 
  <div class="form-group">  
    <label for="exampleInputPassword1">Password</label>  
    <input type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="Password">  
  </div>  
    
  <button type="submit" name="btnsub" class="btn btn-primary">Login</button>  
</form>  
  
</div>  
</center>
<?php
include("footer.php");
?>