<?php
session_start();

if ( isset($_SESSION["login"]) ) {
  header("Location: index.php");
  exit;
}

require ("function.php");

if (isset($_POST['login'])) {
  
  $email = $_POST["email"];
  $password = $_POST["password"];

  $sql = "SELECT * FROM user WHERE email = '$email'";
    $result = $conn->query($sql);

    // cek email
    if (mysqli_num_rows($result)  == 1 ) {
      
      // cek password
      $row = mysqli_fetch_assoc($result);
      if(password_verify($password, $row["password"]) ) {

            $_SESSION["login"] = true;
            $_SESSION["username"] = $row["username"];
            $_SESSION["email"] = $row["email"];
            $_SESSION["id"] = $row["id"];
        header("Location: index.php");
        exit;
      }
    }

    $error = true;

}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Silahkan Masuk</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <link rel="stylesheet" href="css/style.css">
    <style>
      .btn.btn-primary{
        background: #0c0c0e !important;
        border: 1px solid #0c0c0e !important;
      }
    </style>
  </head>
  <body style="background-color: #0c0c0e">
  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-7 col-lg-5">
          <div class="wrap">
            <div class="img" style="background-image: url(images/logo.png);"></div>
            <div class="login-wrap p-4 p-md-5">
              <div class="d-flex">
                <div class="w-100">
                  <h3 class="mb-4" style="color: #cbb93b;"><b>BSCNewspaper Admin Login</b></h3>
                </div>
              <!--   <div class="w-100">
                  <p class="social-media d-flex justify-content-end">
                    <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
                    <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
                  </p>
                </div> -->
              </div>
              <form action="#" class="signin-form" method="post">
                <div class="form-group mt-3">
                  <input type="email" class="form-control" name="email" required>
                  <label class="form-control-placeholder" for="email" style="color: #cbb93b;" >email</label>
                </div>
                <div class="form-group">
                  <input id="password-field" type="password" class="form-control" name="password" required>
                  <label class="form-control-placeholder" for="password" style="color: #cbb93b;" >Password</label>
                  <!-- <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span> -->
                </div>
                <div class="form-group">
                  <button type="submit" class="form-control btn btn-primary rounded submit px-3" style="color: #cbb93b !important;" name="login" >Sign In</button>
                </div>
                <div class="form-group d-md-flex">
                  <div class="w-50 text-left">
                    <p class="text-center" style="color: #cbb93b;" >Belum Punya? <a data-toggle="tab" href="signup.php" style="color: #cbb93b;" >Sign Up</a></p>
                    </label>
                  </div>
                </div>
              </form>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

  </body>
</html>

