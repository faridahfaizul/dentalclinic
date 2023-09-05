<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <link rel="icon" href="DentalClinic.svg" type="image/x-icon">
    <!-- <title>Random - Websetup</title> -->

    <meta name="description" content="The MDN Web Docs site">
    <meta name="author" content="Chris Mills">    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!--<link href="assets/layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">-->

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
    <!-- Topbar Start -->
    <div class="container-fluid bg-light d-none d-lg-block">
        <div class="row py-2 px-lg-5">
            <div class="col-lg-6 text-left mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center">
                <?php if($business_infos): foreach($business_infos as $contact): ?>
                    <small><a href="#our-contact"><i class="fa fa-phone-alt mr-2"></i><?php echo $contact['contact'];?></a></small>
                    <small class="px-3">|</small>
                    <small><a href="#our-email"><i class="fa fa-envelope mr-2"></i><?php echo $contact['email'];?></a></small>
                <?php endforeach; endif; ?>
                </div>
            </div>
            <div class="col-lg-6 text-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-primary px-2" href="/websetup/public/admin">Admin</a>
                    <small class="px-3">|</small>
                    <a class="text-primary px-2" href="/websetup/public/appointment">Appointment</a>
                    <small class="px-3">|</small>
                    <a class="text-primary px-2" href="/websetup/public/login">Login</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0 px-lg-5">
            <a class="navbar-brand ml-lg-3">
                <?php foreach($business_infos as $web): ?>
                    <h1 class="m-0 text-primary"><span class="text-dark"><?php echo $web['webname1'];?></span><?php echo $web['webname2'];?></h1>
                <?php endforeach; ?>
            </a>
            <!-- Hamburger button for mobile -->
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Menu Start -->
            <div class="collapse navbar-collapse justify-content-between px-lg-3" id="navbarCollapse">
                <div class="navbar-nav m-auto py-0" id="nav">
                    <a href="/websetup/public/" class="nav-item nav-link">Home</a>
                    <a href="/websetup/public/team" class="nav-item nav-link">Team</a>
                    <div class="nav-item dropdown">
                        <a href="" class="nav-item nav-link dropdown-toggle" data-toggle="dropdown">Services</a>
                        <div class="dropdown-menu rounded-0 m-0">
                        <a href="/websetup/public/services" class="dropdown-item">All</a>
                        <?php if($services):foreach($services as $servis): if( $servis['status'] == "show"): ?>  
                            <a href="/websetup/public/<?php echo $servis['view'];?>" class="dropdown-item"><?php echo $servis['name'];?></a>
                        <?php endif; endforeach; endif; ?>
                        </div>
                    </div>
                    <a href="/websetup/public/pricing" class="nav-item nav-link">Pricing</a>
                    <a href="/websetup/public/assessment" class="nav-item nav-link">Assessment</a>
                    <a href="/websetup/public/gallery" class="nav-item nav-link">Gallery</a>                  
                    <!-- Dynamic Menu Start -->
                    <?php if($menu):foreach($menu as $menu): if($menu['status'] == 'Enable'):?> 
                        <a href="<?php echo base_url($menu['url']);?>" class="nav-item nav-link"><?php echo $menu['name'];?></a>
                    <?php endif; endforeach; endif; ?>
                    <div class="nav-item dropdown">
                        <div class="dropdown-menu rounded-0 m-0">
                        <?php foreach($submenu as $sub): if($sub['status'] == 'Enable'):?>
                            <a href="<?php echo base_url($sub['url']);?>" class="dropdown-item"><?php echo $sub['name'];?></a>
                            <?php endif; endforeach; ?>
                        </div>
                    </div>
                    <!-- Dynamic Menu End -->
                </div>
            </div>
            <!-- Menu End -->
        </nav>
    </div>
    <!-- Navbar End -->
