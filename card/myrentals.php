<?php
session_start();
include_once("../config/config.php");
if(!isset($_SESSION['email'])){
  header('location: ../signIn/login.php');
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
	padding : 0;
}
.available{
  background-color: aquamarine;
}
</style>
<body>
<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="modal">Edit Details</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="form-group" action="edit.php" method="post">
            <input type="text" name="id" class="form-control" id="id" hidden><br>
            <label>Full Name:</label>
            <input type="text" name="name" class="form-control" id="name"><br>
            <label>Email</label>
            <input type="email" name="email" class="form-control" id="email"><br>
            <label>Phone</label>
            <input type="number" name="phone" class="form-control" id="phone"><br>
            <label>Plan</label>
            <input type="text" name="plan" class="form-control" id="plan"><br>
            <input type="submit" class="btn btn-primary" name="pat_submit" value="Save Changes" data-bs-dismiss="modal">
          </form>
        </div>
      </div>
    </div>
  </div>
  <br>
        <?php
        //connecting to user database
        $email = $_SESSION['email'];
        $sql = "SELECT * FROM `places` WHERE  `email` =  '$email'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result); //gives total number of rows
        while ($row = mysqli_fetch_assoc($result)) {
          $available = "Not Booked";
          if($row['available'] == 0) $available = "Booked";
          $msg = '<section class="main-content">
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
                        <h4>₹'.$row['twoprice'].' for two wheeler</h4>
                      <div class="hotel-card_pricing text-center">
                        <h4>₹'.$row['fourprice'].' for four wheeler</h4>
                      </div>
                      <div class="available">
                        <h4>'.$available.'</h4>
                      </div>
                      <button type="button" class="edit btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal">Edit</button>' . " " . '<button type="button" class="delete btn btn-danger">Delete</button>'." ".'<button type="button" class="markfull btn btn-warning">Mark Full</button>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>';
          echo $msg;
        }
        ?>
      </tbody>
    </table>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
    crossorigin="anonymous"></script>
    <script>
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
      element.addEventListener('click', (e) => {
        tr = e.target.parentNode.parentNode;
        id = tr.getElementsByTagName('td')[0].innerText;
        name = tr.getElementsByTagName('td')[1].innerText;
        email = tr.getElementsByTagName('td')[2].innerText;
        phone = tr.getElementsByTagName('td')[3].innerText;
        plan = tr.getElementsByTagName('td')[4].innerText;
        document.getElementById('id').value = id;
        document.getElementById('name').value = name;
        document.getElementById('email').value = email;
        document.getElementById('phone').value = phone;
        document.getElementById('plan').value = plan;
      })
    })
    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener('click', (e) => {
        tr = e.target.parentNode.parentNode;
        id = tr.getElementsByTagName('td')[0].innerText;
        if (confirm("Do you really want to delete this record?")) {
          window.location = `edit.php?delete=${id}`;
        }
      })
    })
  </script>
</body>

</html>