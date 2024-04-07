 <?php
 session_start();
 ?>
  <!DOCTYPE html>
<html lang="en">

<head>
    <title>Ragistration page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- google front -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

  <?php
  include ('connect.php');
  if(isset($_POST['submit'])){
    $username = mysqli_real_escape_string ($con, $_POST['username']);
    $email = mysqli_real_escape_string ($con, $_POST['email']);
    $mobile = mysqli_real_escape_string ($con, $_POST['mobile']);
    $password = mysqli_real_escape_string ($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string ($con, $_POST['cpassword']);

    $pass = password_hash($password, PASSWORD_BCRYPT);
    $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

    $emailquery ="select * from registrationdata where email ='$email' ";
    $query = mysqli_query($con,$emailquery);
    $emailcount = mysqli_num_rows($query);
    if ($emailcount>0){
      ?>
  <script >
    alert("email already exist "); 
  </script>
  <?php
                       }
    else{
       if ($password === $cpassword) {

        $insertquery = "insert into registrationdata ( username, email, mobile, password, cpassword) values('$username','$email','$mobile','$pass','$cpass')";
           $iquery = mysqli_query($con, $insertquery);
           if( $iquery){
  ?>
  <script >
    alert("insert Successfully"); 
  </script>
  <?php
        }
else{

  ?>
  <script >
    alert("no connection "); 
  </script>
  <?php

     }
      } else{
          ?>
  <script >
    alert("password not matching "); 
  </script>
  <?php
      }
    }
  }
  ?>

  <!-- ======= Header ======= -->

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">

        <div class="container d-flex align-items-center justify-content-between ">


            
                <a href="index.html" class="logo"><img src="assets/img/kalles.svg" alt="logo" class="img-fluid"></a>

           
            <!--navbar-->
            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li class="drop-down"><a href=>Mobile covers</a>
                        <ul>
                            <li><a href="#">Designer Slim Covers</a></li>
                            <li><a href="#">Pop Cases</a></li>
                            <li><a href="#">Premium Glass Covers</a></li>
                            <li><a href="#">Glasscase With Pop</a></li>
                            <li><a href="#">4D Cases</a></li>
                            <li><a href="#">Name Cases</a></li>
                            <li><a href="#">Clear Cases</a></li>
                            <li><a href="#">Premium Matt Case</a></li>
                        </ul>

                    </li>
                    <li><a href="#men">Men</a></li>
                    <li><a href="#Woman">Woman</a></li>
                    <li><a href="#CustomisedProduct">Customised Product</a></li>
                    <li><a href="#team">Watches</a></li>
                    <li><a href="#contact">Name Neklaces</a></li>
                    <li><a href="pricing.html"> Pricing</a></li>

                </ul>
            </nav>
            <!-- .nav-menu -->
            <div>
                <!-- <ul class="top-menu text-right list-inline">
					<li class="dropdown cart-nav dropdown-slide">
						<a href="#!"><i class="tf-ion-android-cart"></i>Cart</a> -->
                <!-- <a href="#seachbutton" class="get-started-btn scrollto"><img src="assets/img/flaticon/magnifying-glass (1).png" alt="searchlogo" width="30px"></a> -->
               
                    <a href="#seachbutton" class="get-started-btn scrollto"><img src="assets/img/flaticon/profile.png"
                        alt="searchlogo" width="20px" height="20px"></a>
                      <a href="#seachbutton" class="get-started-btn scrollto"><img src="assets/img/flaticon/shopping-cart.png"
                            alt="searchlogo" width="20px" hight="20px"><sup style="font-weight: 200;">0</sup></a>
                
                
                

            </div>
    </header><!-- End Header -->

  <main id="main" data-aos="fade-in">
<br>
  <br>
  <article class="card-body mx-auto" style="max-width: 400px;">
  <h4 class="card-title mt-3 text-center" style="color: black;">Create Account</h4>
  <p class="text-center">Get started with your free account</p>
  <p>
    <a href="" class="btn btn-block btn-twitter"> <i class="fa fa-google" aria-hidden="true"></i>  Login via gmail</a>
    <a href="" class="btn btn-block btn-facebook"> <i class="fa fa-facebook-official" ></i>   Login via facebook</a>
  </p>
  <p class="divider-text">
        <span class="bg-light">OR</span>
    </p>
  <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method = "POST" class="form">
  <div class="form-group">
    <label for="Fname"style ="color:grey">First name</label><span  class="text-danger">*</span>
    <input name ="fname" type="text" class="form-control " id="Fname"   required>
    
  </div>
  <div class="form-group">
    <label for="lname" style ="color:grey">Last name</label><span  class="text-danger">*</span>
    <input name ="lname" type="text" class="form-control" id="lname"   required>
    
  </div>
  <div class="form-group">
    <label for="number" style ="color:grey">Phone number</label><span  class="text-danger">*</span>
    <input name ="number" type="text" class="form-control" id="number"   required>
    
  </div>
  <div class="form-group">
    <label for="emailid" style ="color:grey">Email address</label><span  class="text-danger">*</span>
    <input name="email" type="email" class="form-control" id="emailid"  required>
    
  </div>
  <div class="form-group">
    <label for="password" style ="color:grey">Password</label><span  class="text-danger">*</span>
    <input name="pass" type="password" class="form-control" id="password" value="" >
  </div>
  
  <button type="submit" class="btn btn-light" >Register</button>
   

    <p class="text-center">Have an account? <a href="login.php">Log In</a> </p>  

                                                              
</form>
</article>
  <!-- footer start-->
 <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-6 col-md-6">
            <div class="footer-info">
                <a href="index.html" class="logo"><img src="assets/img/kalles.svg" alt="logo" class="img-fluid"></a>
              <h3><span></span></h3>
              <p>
                Dighirpar <br>
               Canning 743329 , India<br><br>
                <strong>Phone:</strong> <a href="tel:+919851350560"> +919851350560</a><br>
                <strong>Email:</strong> <a href="mailto:souravjoyti@gmail.com"> contact@futuresolution.com</a><br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6 col-md-6 footer-links">
            <h4>Categories</h4>
            <ul>
              <li></i> <a href="#">Web Design</a></li>
              <li></i> <a href="#">Web Development</a></li>
              <li></i> <a href="#">Product Management</a></li>
              <li></i> <a href="#">Marketing</a></li>
              <li></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>
          <div class="col-lg-2 col-6 col-md-6 footer-links">
            <h4>Information</h4>
            <ul>
              <li></i> <a href="#">Home</a></li>
              <li></i> <a href="#">About us</a></li>
              <li></i> <a href="#">Services</a></li>
              <li></i> <a href="#">Terms of service</a></li>
              <li></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

         
          <div class="col-lg-3 col-6 col-md-6 footer-links">
            <h4>Useful links</h4>
            <ul>
              <li></i> <a href="#">Store location</a></li>
              <li></i> <a href="#">Latest news</a></li>
              <li></i> <a href="#">Product Management</a></li>
              <li></i> <a href="#">Marketing</a></li>
              <li></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>
          
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>KALLAS</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
       
        
       
      </div>
    </div>
  </footer>
<!-- end footer -->
</body>

<a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>
<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="assets/vendor/counterup/counterup.min.js"></script>
<script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="assets/vendor/aos/aos.js"></script>

<!-- Template Main JS File -->

<script src="assets/js/main.js"></script>

</html>