<?php
if(!isset($_SESSION)){
    session_start();
}
?>
<?php
    include('./dbconnection.php');
     include('./maininclude/header.php');
?>


<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <link rel="stylesheet" href="style.css">

    <link rel="icon" href="Favicon.png">

    
    <title>Login Form</title>
</head>
<body>
    <div class="slider-area ">
        <div class="single-slider slider-height2  hero-overly d-flex align-items-center"
            style="background-color:black;">
            <section style=" position: relative;height:400px;width:100%;overflow: hidden;text-align:center; ">
            <img src="img/slider/bg1.jpg">
                <!-- <video class="bgvid" autoplay="autoplay" muted="muted" preload="auto" loop>
                    <source src="assets/img/hero/video2.mp4" type="video/mp4">
                </video> -->
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <!-- <div class="hero-cap text-center">
                                <h2 style="margin-top:15%;">Success Stories</h2>
                                <h4 style="color:#f8f8f8;">As our numerous success stories prove, marriages are really made at Mr&Mrs.com</h4>
                            </div> -->
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div><br><br>

<!-- <nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="#">User Password Recover</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

    </div>
</nav> -->

<main class="login-form mb-100">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center"><h2>Password Recover</h2></div>
                    <div class="card-body">
                        <form action="#" method="POST" name="recover_psw">
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <input type="submit" value="Recover" name="recover">
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

<?php 
    if(isset($_POST["recover"])){
        include('./dbconnection.php');
        $email = $_POST["email"];

        $sql = mysqli_query($conn, "SELECT * FROM student WHERE stu_email='$email'");
        $query = mysqli_num_rows($sql);
  	    $fetch = mysqli_fetch_assoc($sql);

        if(mysqli_num_rows($sql) <= 0){
            ?>
            <script>
                alert("<?php  echo "Sorry, no emails exists "?>");
            </script>
            <?php
        }else if($fetch["status"] == 0){
            ?>
               <script>
                   alert("Sorry, your account must verify first, before you recover your password !");
                   window.location.replace("index.php");
               </script>
           <?php
        }else{
            // generate token by binaryhexa 
            $token = bin2hex(random_bytes(50));

            //session_start ();
            $_SESSION['token'] = $token;
            $_SESSION['email'] = $email;

            require "Mail/phpmailer/PHPMailerAutoload.php";
            $mail = new PHPMailer;

            $mail->isSMTP();
            $mail->Host='smtp.gmail.com';
            $mail->Port=587;
            $mail->SMTPAuth=true;
            $mail->SMTPSecure='tls';

            // h-hotel account
            $mail->Username='karadshreya236@gmail.com';
            $mail->Password='shreya236';

            // send by h-hotel email
            $mail->setFrom('karadshreya236@gmail.com', 'Password Reset');
            // get email from input
            $mail->addAddress($_POST["email"]);
            //$mail->addReplyTo('lamkaizhe16@gmail.com');

            // HTML body
            $mail->isHTML(true);
            $mail->Subject="Recover your password";
            $mail->Body="<b>Dear User</b>
            <h3>We received a request to reset your password.</h3>
            <p>Kindly click the below link to reset your password</p>
            http://localhost/siksha2.com/reset_psw.php
            <br><br>
            <p>With regrads,</p>
            <b>siksha.com</b>";

            if(!$mail->send()){
                ?>
                    <script>
                        alert("<?php echo " Invalid Email "?>");
                    </script>
                <?php
            }else{
                ?>
                    <script>
                        window.location.replace("notification.html");
                    </script>
                <?php
            }
        }
    }


?>
<?php
     include('./maininclude/footer.php');
?>
