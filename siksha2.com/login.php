<?php
if(!isset($_SESSION)){
    session_start();
}
?>
<?php
    include('./dbconnection.php');
     include('./maininclude/header.php');
?>
<div class="slider-area">
        <div class="page-title">
            <div class="single-slider  d-flex align-items-center" style="background-image: url(img/slider/i_15.jpg); height: 400px;">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider-content slider-content-breadcrumb text-center">
                                <h1 class="white-color f-700">Login</h1>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php

    if(isset($_POST["login"])){
        $email = mysqli_real_escape_string($conn, trim($_POST['email']));
        $hpassword = trim($_POST['password']);
        // $stuid = trim($_post['stu_id']);

        $sql = mysqli_query($conn, "SELECT * FROM student where stu_email = '$email'");
         
        $count = mysqli_num_rows($sql);
       
         
            
            if($count > 0){
                $fetch = mysqli_fetch_assoc($sql);
                $password = $fetch["password"];
                $sid = $fetch["stu_id"];
                $stu_name=$fetch["stu_name"];
      if($fetch["status"] == 0){
                    ?>
                    <script>
                        alert("Please verify email account before login.");
                    </script>
                    <?php
                }
                // else if(password_verify($password, $hpassword)){
                elseif($password == $hpassword){
                    
                         $_SESSION['is_login'] = true;
                         $_SESSION['stuLogEmail'] = $email;
                         $_SESSION['stu_id'] = $sid;
                         $_SESSION['stu_name']=$stu_name;
                    ?>
                    
                    <script>
                        alert("login is successfully");
                        <?php
                        
                         if($fetch['role_id'] == 0){
                        ?>
                        window.location.replace('index.php');
                        
                        <?php }elseif($fetch['role_id']==1){?>
                         window.location.replace('./admin1/Admin/adminDashboard.php');
                         <?php } ?>
                    </script>
                    <?php
                }else{
                    ?>
                    <script>
                        alert("email or password invalid, please try again.");
                    </script>
                    <?php
                }
            }
                
    }
    else{

    }


?>

<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<!------ Include the above in your HEAD tag ---------->

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fonts -->
    <!-- <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css"> -->

    <link rel="stylesheet" href="style.css">

    <link rel="icon" href="Favicon.png">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> -->

    <title>Login Form</title>
</head>
<body>

<!-- <nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="#">Login Form</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php" style="font-weight:bold; color:black; text-decoration:underline">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.php">Register</a>
                </li>
            </ul>

        </div>
    </div>
</nav> -->

<main class="login-form mb-100 mt-5" >
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" >
                    <div class="card-header text-center"><h2>Login</h2></div>
                    <div class="card-body">
                        <form action="#" method="POST" name="login">
                            
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control" name="password" required>
                                    <i class="bi bi-eye-slash" id="togglePassword"></i>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> Remember Me
                                           
                                        </label>
                                         <a href="recover_psw.php" class=" btn-link" style="padding-left:40%" >
                                               forgot Your Password?
                                            </a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <button type="submit" name="login" id="withdraw" class="mt-2"style="width: 150px; height: 40px;border-radius:10px; background:#000; border:0px; color:#fff;" >Login</button><br>
                                <!-- <input type="submit" value="Login" name="login" class="btbn-text"> -->
                                <h6 class="mt-3">Don't have an account?
                                <a href="register.php" class=" btn-link"  >
                                               Sign Up
                                </a>
                                </h6>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

</main>
</body>
</html>
<script>
    const toggle = document.getElementById('togglePassword');
    const password = document.getElementById('password');

    toggle.addEventListener('click', function(){
        if(password.type === "password"){
            password.type = 'text';
        }else{
            password.type = 'password';
        }
        this.classList.toggle('bi-eye');
    });
</script>
<?php
include('./maininclude/footer.php');
?>
