<?php
session_start();
include_once("../config/config.php");
if(!isset($_SESSION['email'])){
  header("location: ../signIn/login.php");
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  if (isset($_POST['pincode'])) {
    $pincode = $_POST['pincode'];
    $state = $_POST['state'];
  }
}
// if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || $_SESSION['username'] != 'admin@gym') {
//   header("location: loginform.php");
// }
// if (isset($_SESSION['err'])) {
// 	if ($_SESSION['err'] != '') {
// 		echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">' . $_SESSION['err'] . '
// 		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
// 	  </div>';
// 	}
// }
// $err = "";
// $_SESSION['err'] = "";
// if (isset($_GET['email'])) {
//   $email = $_GET['email'];
//   $sql = "DELETE FROM `user details` WHERE `email` = '$email'";
//   $result1 = mysqli_query($conn, $sql);
//   if (!$result1) {
//     $_SESSION['err'] = "cannot delete the record due to some internal network error";
//   }
//   header("location: showdetails.php");
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
	<title>Design</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<style>
  .main-content {
	padding : 0;}
  body {
  background-image: url('https://www.bproperty.com/blog/wp-content/uploads/2021/08/claudio-schwarz-I1xBVE3PDs-unsplash.jpg');
}


</style>
<body>
  <br>
        <?php
        //connecting to user database
        // $email = $_SESSION['email'];
        $sql = "SELECT * FROM `places` WHERE  `pincode` = '$pincode' and `state` = '$state' and `available` = 1";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result); //gives total number of rows
        while ($row = mysqli_fetch_assoc($result)) {
          $msg = '<a href = "../map/map.html">
          <section class="main-content">
          <div class="container">
            <!-- <h1 class="text-uppercase"></h1> -->
            <br>
            <br>
            <div class="row">
              <div class="col-sm-9 col-md-9 col-lg-9">
                <div class="hotel-card bg-white rounded-lg shadow overflow-hidden d-block d-lg-flex">
                  <div class="hotel-card_images">
                    <div id="bootstrapCarousel" class="carousel slide h-100" data-ride="carousel">
                      <div class="carousel-inner h-100">
                        <div class="carousel-item h-100 active">
                          <img src="https://d1hv7ee95zft1i.cloudfront.net/custom/blog-post-photo/gallery/parkinglot-5d0735479705b.jpg" class="d-block w-100" alt="Hotel Image">
                        </div>
                        <div class="carousel-item h-100">
                          <img src="https://www.alteravastgoed.nl/content/uploads/2022/09/AVEQ040811_0461RGB-800x507.jpg" class="d-block w-100" alt="Hotel Image">
                        </div>
                        <div class="carousel-item h-100">
                          <img src="https://i0.wp.com/www.saudigulfprojects.com/wp-content/uploads/2020/07/car-park.jpg?resize=678%2C381&ssl=1" class="d-block w-100" alt="Hotel Image">
                        </div>
                      </div>
                      <a class="carousel-control-prev" href="#bootstrapCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#bootstrapCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>
                  </div>
                  <div class="hotel-card_info p-4">
                    <div class="d-flex align-items-center mb-2">
      
                      <h5 class="mb-0 mr-2">' .$row['address'].' '.$row['city'].'</h5>
                      <div>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                      </div>
                      <!-- <a href="#!" class="text-dark ml-auto"><i class="far fa-heart fa-lg"></i></a> -->
                    </div>
                    <div class="d-flex justify-content-between align-items-end">
                      <div class="hotel-card_details">
                        <div class="text-muted mb-2"><i class="fas fa-map-marker-alt"></i>'.'   '.$row['state'].'</div>
                        <div class="mb-2"><p>(pincode - '.$row['pincode'].')</p><span class="badge badge-primary">4.5</span> </div>
                        <ul class="hotel-checklist pl-0 mb-0">
                          <li><i class="fa fa-check text-success"></i> Excellent</li>
                          <li><i class="fa fa-check text-success"></i> RESERVABLE</li>
                          <li><i class="fa fa-check text-success"></i> 100+ bookings</li>
                        </ul>
                      </div>
                      <div class="hotel-card_pricing text-center">
                        <h3>₹'.$row['twoprice'].' for two wheeler</h3>
                      <div class="hotel-card_pricing text-center">
                        <h3>₹'.$row['fourprice'].' for four wheeler</h3>
                      </div>
                      <button class="btn btn-primary" id = "book">Book Now</button>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
          
          
          ';
          echo $msg;
        }
        ?>
      </tbody>
    </table>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
    crossorigin="anonymous"></script>
  <script>
    document.getElementById('book').addEventListener('click' , ()=>{
      alert("booking confirmed");
    })
  </script>
</body>

</html>