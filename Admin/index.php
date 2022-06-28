<?php
session_start();
$_SESSION["user"]="";


if(isset($_POST["btn_login"]))
{
    $user = $_POST["username_txt"];
    $pswrd = $_POST["password_txt"];
  
    if($user=="admin" && $pswrd=="admin")
    {
      $_SESSION["user"]=$user;
      header("Location:Admin_Dashboard.php");
    }
    else
    {
      echo "Login Failed";
    }
}





?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/index.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
</head>
  <body>


  <div class="wrapper">
        <div class="card">
            <form method="post" action="#" class="d-flex flex-column">
                <div class="h3 text-center text-white">Login</div>
                <div class="d-flex align-items-center input-field my-3 mb-4"> <span class="far fa-user p-2"></span> 
                    <input type="text" placeholder="Username or Email" required class="form-control" name="username_txt">  
                </div>
                <div class="d-flex align-items-center input-field mb-4"> <span class="fas fa-lock p-2"></span> 
                    <input type="password" placeholder="Password" required class="form-control" id="pwd" name="password_txt"> 
                    <button class="btn" onclick="showPassword()"> 
                        <span class="fas fa-eye-slash"></span> 
                    </button> 
                </div>
                <div class="d-sm-flex align-items-sm-center justify-content-sm-between">
                    <div class="d-flex align-items-center"> <label class="option"> <span class="text-light-white">Remember Me</span> <input type="checkbox" checked> <span class="checkmark"></span> </label> </div>
                    <div class="mt-sm-0 mt-3"><a href="#">Forgot password?</a></div>
                </div>
                <div class="my-3"> <input type="submit" value="Login" class="btn btn-primary" name="btn_login"> </div>
               
            </form>
         </div>
    </div>




<script>

function showPassword() {
var password = document.getElementById('pwd');
if (password.type === 'password') {
password.type = "text";
}
else {
password.type = "password";
}
}
</script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>