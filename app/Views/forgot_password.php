<!DOCTYPE html>
<html lang="">

<head>
  <meta charset="utf-8">
  <link rel="icon" href="favicon.ico" type="image/x-icon">
  <title>Random - Forgot Password</title>

  <meta name="description" content="The MDN Web Docs site">
  <meta name="author" content="Chris Mills">    
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <!--<link href="assets/layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">-->

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  

  <!-- Latest compiled and minified CSS -->
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <!-- Favicon -->
  <link href="img/favicon.ico" rel="icon">

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

  <!-- Libraries Stylesheet -->
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

  <!-- Customized Bootstrap Stylesheet -->
  <link href="css/style.css" rel="stylesheet">
</head>

<body>   

<!-- Log In Start -->
<div class="container-fluid">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 pt-5 pb-lg-5">
        <div class="position-relative w-25" style="float:right">
          <div class="hours-text bg-light p-4 p-lg-5 my-lg-5"> 
            <a href="<?php echo base_url();?>" class="navbar-brand ml-lg-3" data-toggle="tooltip" data-placement="top" title="Back to Home"><i class="fas fa-home"></i></a>
          </div>
        </div>                    
      </div>
      <div class="col-lg-6 pt-5 pb-lg-5">
        <div class="position-relative h-100">
          <div class="hours-text bg-light p-4 p-lg-5 my-lg-5">
            <h2 class="mb-4">Forgot Password</h2>
            <?php if(isset($validation)):?>
              <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
            <?php endif;?> 
      
            <form action="/login" method="post">                
              <div class="wrap-input100 validate-input m-b-26">
                <div>
                  <span>Email</span>
                  <input type="email" id="InputForEmail" name="email" class="form-control">
                    <span class="focus-input100"></span>
                </div>   
                <p></p>  
              </div>
              <div class="container-login100-form-btn" style="margin: top 20px;">
                <button class="login100-form-btn">Submit</button>
              </div>
            </form>   
          </div>
        </div>                    
      </div>
    </div>
  </div>
</div>
<!-- Log In End -->

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/counterup/counterup.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="lib/tempusdominus/js/moment.min.js"></script>
<script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
<script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Contact Javascript File -->
<script src="mail/jqBootstrapValidation.min.js"></script>
<script src="mail/contact.js"></script>

<!-- Template Javascript -->
<script src="js/main.js"></script>

<!-- Popper.js first, then Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  

</body>
</html>