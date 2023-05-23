<?php

require ("function.php");

if ( isset($_POST["register"])) {
  
  if (registrasi($_POST) > 0 ) {
    echo "<script>
            alert('user baru berhasil ditambahkan!, silahkan login')
          </script>" ;
  } else {

    echo mysqli_error($conn);
  }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Registrasi User</title>
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
            <div class="img" style="background-image: url(images/bg-bnb.jpg);"></div>
            <div class="login-wrap p-4 p-md-5">
              <div class="d-flex">
                <div class="w-100">
                  <h3 class="mb-4" style="color: #cbb93b;"><b>BSCNewspaper</b></h3>
                </div>
              </div>
              <form  class="signin-form" action="" method="post">
                <div class="form-group mt-3">
                  <input type="text" class="form-control" name="username"  required>
                  <label class="form-control-placeholder" for="username" style="color: #cbb93b;" >Username</label>
                </div>
                <div class="form-group mt-3">
                  <input type="email" class="form-control" name="email"  required>
                  <label class="form-control-placeholder" for="email" style="color: #cbb93b;" >Email</label>
                </div>
                <div class="form-group">
                  <input id="password-field" type="password"  name="password" class="form-control" required>
                  <label class="form-control-placeholder" for="password" style="color: #cbb93b;" >Password</label>
                  <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                </div>
                <div class="form-group">
                  <input id="password-field" type="password" name="password2" class="form-control" required>
                  <label class="form-control-placeholder" for="password" style="color: #cbb93b;" >Konfirm. Password</label>
                  <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                </div>
                <div class="form-group">
                  <button type="submit" class="form-control btn btn-primary rounded submit px-3" name="register" style="color: #cbb93b !important;">Daftar</button>
                </div>
                <div class="form-group d-md-flex">
                  <div class="w-50 text-left">
                    <p class="text-center" style="color: #cbb93b;" >Sudah Punya? <a data-toggle="tab" href="login.php" style="color: #cbb93b;" >Log in</a></p>
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

