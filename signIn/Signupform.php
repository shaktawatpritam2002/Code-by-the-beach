<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include_once("../config/config.php");
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['name'])) {
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $phone = trim($_POST['phone']);
        $sql = "SELECT * FROM `users` WHERE `email` = '$email' or `phone` = '$phone'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            echo "user already exist";
        }
        else{
            if (strlen(trim($_POST['password'])) < 5) {
                $_SESSION['err'] = "Password cannot be less than 5 characters";
            } else {
                $password = trim($_POST['password']);
                $password = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO users (email, password , name , phone) VALUES ('$email', '$password' , '$name' , '$phone')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    header("location: login.php");
                } else {
                    echo 'cannot redirect';
                    // $_SESSION['err'] = "cannot redirect, something went wrong";
                }
            }
        } 
    }
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
</head>
<script> if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
</script>
<body>
    <form action="" method="POST">
        <div class="container-fluid">
            <div class="row no-gutter">
                <!-- The image half -->
                <div class="col-md-6 d-none d-md-flex bg-image"></div>


                <!-- The content half -->
                <div class="col-md-6 bg-light">
                    <div class="login d-flex align-items-center py-5">

                        <!-- Demo content-->
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-10 col-xl-7 mx-auto">
                                    <h3 class="display-4">Parking Management System</h3>
                                    <p class="text-muted mb-4"></p>
                                    <form>
                                        <div class="form-group mb-3">
                                            <input id="fullname" type="text" placeholder="Full Name" name="name"
                                                required="" autofocus=""
                                                class="form-control rounded-pill border-0 shadow-sm px-4">
                                        </div>
                                        <div class="form-group mb-3">
                                            <input id="inputEmail" type="email" placeholder="Email address" name="email"
                                                required="" autofocus=""
                                                class="form-control rounded-pill border-0 shadow-sm px-4">
                                        </div>
                                        <div class="form-group mb-3">
                                            <input id="number" type="number" placeholder="Phone Number" name="phone"
                                                required="" autofocus=""
                                                class="form-control rounded-pill border-0 shadow-sm px-4">
                                        </div>
                                        <div class="form-group mb-3">
                                            <input id="inputPassword" type="password" placeholder="Password" required=""
                                                name="password"
                                                class="form-control rounded-pill border-0 shadow-sm px-4 text-primary">
                                        </div>
                                        <div class="custom-control custom-checkbox mb-3">
                                            <input id="customCheck1" type="checkbox" checked
                                                class="custom-control-input">
                                            <!-- <label for="customCheck1" class="custom-control-label">Remember password</label> -->
                                        </div>
                                        <button type="submit"
                                            class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm">Sign
                                            Up</button>
                                        <button onclick="window.open('login.php' , target = '_self')"
                                            class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm">Login</button>
                                    </form>
                                </div>
                            </div>
                        </div><!-- End -->

                    </div>
                </div><!-- End -->

            </div>
        </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>

</html>