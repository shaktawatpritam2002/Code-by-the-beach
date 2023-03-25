<?php
session_start();
include_once("../config/config.php");
if(!isset($_SESSION['email'])){
    header('location: ../signIn/login.php');
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['state'])) {
        $state = $_POST['state'];
        $city = $_POST['city'];
        $address = $_POST['address'];
        $pincode = $_POST['pincode'];
        $price2 = $_POST['price2'];
        $price4 = $_POST['price4'];
        $number2 = $_POST['number2'];
        $number4 = $_POST['number4'];
        $email = $_SESSION['email'];
        $available = 1;
        $sql = "INSERT INTO places (state, city , address , pincode , twowheeler , fourwheeler , twoprice , fourprice ,available , email) VALUES ('$state', '$city' , '$address' , '$pincode' , '$number2' , '$number4' , '$price2' , '$price4' , '$available' , '$email')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "successfully added";
            header("location: ../index.php");
        } else {
            echo 'cannot redirect';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Title Page-->
    <title>form</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i"
        rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
    <style>
body {
  background-image: url('https://www.bproperty.com/blog/wp-content/uploads/2021/08/brydon-mccluskey-vMneecAwo34-unsplash.jpg');
}
</style>
</head>

<body >
    
    
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Rental Form</h2>
                </div>
                <div class="card-body">
                    <form method="POST">

                        <div class="form-row m-b-55">
                            <div class="name">State</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="state">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">City</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="city">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Complete-Address</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text-area" name="address">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Pincode</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="pincode" name="pincode">
                                </div>
                            </div>
                        </div>

                        <div class="form-row m-b-55">
                            <div class="name">No of Vechicle</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="number" name="number2">
                                            <label class="label--desc">2-Wheeler</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="number" name="number4">
                                            <label class="label--desc">4-Wheeler</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row m-b-55">
                            <div class="name">Price/hr</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="number" name="price2">
                                            <label class="label--desc">2-Wheeler</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="number" name="price4">
                                            <label class="label--desc">4-Wheeler</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn--radius-2 btn--red" type="submit">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->