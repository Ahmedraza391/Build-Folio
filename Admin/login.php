<?php include("../connection.php");
session_start();
?>
<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
<style>
    body{
        width:100%;
        height:80vh;
    }
    .container{
        width:400px;
        border:1px solid #efefef;
        box-shadow:0 0 8px #888;
        margin-top:5%;
        transform:translateY(-5%);
    }
</style>
<body>
<div class="container py-3">
    <h1 class="text-center">Login</h1>
    <form method="post">
  <!-- Email input -->
  <div  class="form-outline mb-4">
    <input type="email" name="txtemail"  class="form-control" />
    <label class="form-label" for="form2Example1">Email address</label>
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <input type="password" name="txtpass"  class="form-control" />
    <label class="form-label" for="form2Example2">Password</label>
  </div>

  <!-- 2 column grid layout for inline styling -->
  <div class="row mb-4">
    <div class="col d-flex justify-content-center">
      <!-- Checkbox -->
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="rememberMe" id="form2Example31" />
        <label class="form-check-label" for="form2Example31"> Remember me </label>
      </div>
    </div>

    <div class="col">
      <!-- Simple link -->
      <a href="#!">Forgot password?</a>
    </div>
  </div>

  <!-- Submit button -->
  <input  type="submit" name="btnLogin" class="btn btn-primary btn-block mb-4" value="Sign in">
 
</form>
</div>
</body>
<?php 
  if(isset($_POST['btnLogin'])){
      
    $email = $_POST['txtemail'];
   $pass =  $_POST['txtpass'];
  $query = mysqli_query($connection,"SELECT * FROM tbl_admin WHERE admin_email='$email'");

  if(mysqli_num_rows($query)){
   $admin =  mysqli_fetch_assoc($query);
   $hashpass = $admin['admin_password'];
    if(password_verify($pass,$hashpass)){
      if(isset($_POST['rememberMe'])){
        setcookie("email",$email,time()+136000);
        setcookie("password",$hashpass,time()+136000);
        header("location:index.php");
      }else{
        header("location:index.php");
      };
      $_SESSION['user'] = $admin;
    }else{
      echo  "<script>alert('password not matched')</script>";
    }
  }else{
    echo  "<script>alert('user not found')</script>";
  }
  }
?>