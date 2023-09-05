<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<link rel="icon" href="DentalClinic.svg" type="image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="au theme template">
<meta name="author" content="Hau Nguyen">
<meta name="keywords" content="au theme template">

<title>Dashboard</title>

<link href="https://colorlib.com/polygon/cooladmin/css/font-face.css" rel="stylesheet" media="all">
<link href="https://colorlib.com/polygon/cooladmin/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
<link href="https://colorlib.com/polygon/cooladmin/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
<link href="https://colorlib.com/polygon/cooladmin/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

<link href="https://colorlib.com/polygon/cooladmin/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

<link href="css/admin/animsition.min.css" rel="stylesheet" media="all">
<link href="https://colorlib.com/polygon/cooladmin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
<link href="https://colorlib.com/polygon/cooladmin/vendor/wow/animate.css" rel="stylesheet" media="all">
<link href="https://colorlib.com/polygon/cooladmin/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
<link href="https://colorlib.com/polygon/cooladmin/vendor/slick/slick.css" rel="stylesheet" media="all">
<link href="https://colorlib.com/polygon/cooladmin/vendor/select2/select2.min.css" rel="stylesheet" media="all">
<link href="https://colorlib.com/polygon/cooladmin/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">-->

<link href="https://colorlib.com/polygon/cooladmin/css/theme.css" rel="stylesheet" media="all">

<!-- Calendar -->
<link href="css/admin/fullcalendar.min.css" rel="stylesheet" media="all">
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.7/semantic.min.css" rel="stylesheet" media="all"> -->

 <!--Datatable plugin CSS file -->
 <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" />

 <meta name="robots" content="index, nofollow">
<script nonce="85ac7c56-8f43-4583-936a-aef84db71f5c">(function(w,d){!function(a,e,t,r,z){a.zarazData=a.zarazData||{},a.zarazData.executed=[],a.zarazData.tracks=[],a.zaraz={deferred:[]};var s=e.getElementsByTagName("title")[0];s&&(a.zarazData.t=e.getElementsByTagName("title")[0].text),a.zarazData.w=a.screen.width,a.zarazData.h=a.screen.height,a.zarazData.j=a.innerHeight,a.zarazData.e=a.innerWidth,a.zarazData.l=a.location.href,a.zarazData.r=e.referrer,a.zarazData.k=a.screen.colorDepth,a.zarazData.n=e.characterSet,a.zarazData.o=(new Date).getTimezoneOffset(),a.dataLayer=a.dataLayer||[],a.zaraz.track=(e,t)=>{for(key in a.zarazData.tracks.push(e),t)a.zarazData["z_"+key]=t[key]},a.zaraz._preSet=[],a.zaraz.set=(e,t,r)=>{a.zarazData["z_"+e]=t,a.zaraz._preSet.push([e,t,r])},a.dataLayer.push({"zaraz.start":(new Date).getTime()}),a.addEventListener("DOMContentLoaded",(()=>{var t=e.getElementsByTagName(r)[0],z=e.createElement(r);z.defer=!0,z.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(a.zarazData))),t.parentNode.insertBefore(z,t)}))}(w,d,0,"script");})(window,document);</script></head>
<body class="animsition">
<div class="page-wrapper">

<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <!--<a class="logo" href="index.html">
                    <img src="assets/images/demo/Transp-Logo.png" alt="dentalclinic" />
                    //<img src="assets/images/demo/random.png"  />
                </a>-->
                <a class="logo" href="">
                    <?php foreach($business_infos as $web): ?>
                        <?php echo '<img src="data:image;base64, '.base64_encode($web['logo']).'">';?>
                    <?php endforeach; ?>
                </a>
                <button class="hamburger hamburger--slider" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>    
    <nav class="navbar-mobile">
        <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">   
                <li>
                    <a class="js-arrow" href="<?php echo base_url();?>/adminpagebusiness"><i class="fas fa-info"></i>Business Info</a>
                </li>                             
                <li>
                    <a class="js-arrow" href="<?php echo base_url();?>/adminpagestaff"><i class="fas fa-user"></i>Staff</a>
                </li>            
                <li>
                    <a class="js-arrow" href="<?php echo base_url();?>/adminpageappointment"><i class="fas fa-book"></i>Appointments</a>
                </li>               
                <li>
                    <a class="js-arrow" href="<?php echo base_url();?>/adminpageassessment"><i class="fas fa-clipboard"></i>Assessment</a>
                </li>
                <li>
                    <a class="js-arrow" href="<?php echo base_url();?>/adminpageriskanalysis"><i class="fas fa-tachometer-alt"></i>Risk Analysis</a>
                </li>               
                <li class="has-sub"><a class="js-arrow" href="#"><i class="fas fa-copy"></i></i>Page Contents</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">                                     
                        <li><a href="<?php echo base_url();?>/adminpageheader">Menu Bar</a></li>   
                        <li><a href="<?php echo base_url();?>/adminpagehome">Home</a></li>
                        <li><a href="<?php echo base_url();?>/adminpageteam">Team</a></li>
                        <li><a href="<?php echo base_url();?>/adminpageservices">Services</a></li>                 
                        <li><a href="<?php echo base_url();?>/adminpagequestionnaire">Questionnaire</a></li>      
                        <li><a href="<?php echo base_url();?>/adminpagegallery">Gallery</a></li>      
                        <li><a href="<?php echo base_url();?>/adminpageappointmentinfo">Appointment Page</a></li>  
                    </ul>
                </li> 
            </ul>
        </div>
    </nav>
</header>

<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="">
            <!--<img src="assets/images/demo/Transp-Logo.png" alt="dentalclinic" />-->
            <?php foreach($business_infos as $web): ?>
                <?php echo '<img src="data:image;base64, '.base64_encode($web['logo']).'">';?>
            <?php endforeach; ?>
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li>
                    <a class="js-arrow" href="<?php echo base_url();?>/adminpagebusiness"><i class="fas fa-info"></i>Business Info</a>
                </li>                                         
                <li>
                    <a class="js-arrow" href="<?php echo base_url();?>/adminpagestaff"><i class="fas fa-user"></i>Staff</a>
                </li>     
                <li>
                    <a class="js-arrow" href="<?php echo base_url();?>/adminpageappointment"><i class="fas fa-book"></i>Appointments</a>
                </li>               
                <li>
                    <a class="js-arrow" href="<?php echo base_url();?>/adminpageassessment"><i class="fas fa-clipboard"></i></i>Assessment</a>
                </li>
                <li>
                    <a class="js-arrow" href="<?php echo base_url();?>/adminpageriskanalysis"><i class="fas fa-tachometer-alt"></i>Risk Analysis</a>
                </li>             
                <li class="has-sub"><a class="js-arrow" href="#"><i class="fas fa-copy"></i></i>Page Contents</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">                                        
                        <li><a href="<?php echo base_url();?>/adminpageheader">Menu Bar</a></li>                                  
                        <li><a href="<?php echo base_url();?>/adminpagehome">Home</a></li>
                        <li><a href="<?php echo base_url();?>/adminpageteam">Team</a></li>
                        <li><a href="<?php echo base_url();?>/adminpageservices">Services</a></li>                
                        <li><a href="<?php echo base_url();?>/adminpagequestionnaire">Questionnaire</a></li>      
                        <li><a href="<?php echo base_url();?>/adminpagegallery">Gallery</a></li>      
                        <li><a href="<?php echo base_url();?>/adminpageappointmentinfo">Appointment Page</a></li> 
                    </ul>
                </li> 
            </ul>
        </nav>
    </div>
</aside>

<div class="page-container">
    <header class="header-desktop">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="header-wrap">
                    <form class="form-header" action="" method="POST">
                        <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                        <button class="au-btn--submit" type="submit">
                            <i class="zmdi zmdi-search"></i>
                        </button>
                    </form>
                    
                    <div class="header-button">
                        <div class="noti-wrap">  
                            <div class="noti__item">
                                <a href="<?php echo base_url();?>/admin" title="Home"><i class="fas fa-home"></i></a>                         
                            </div>                        
                            <div class="noti__item js-item-menu">
                                <i class="zmdi zmdi-notifications"></i>
                                <span class="quantity">3</span>
                                <div class="notifi-dropdown js-dropdown">
                                    <div class="notifi__title">
                                        <p>You have 3 Notifications</p>
                                    </div>
                                    <div class="notifi__item">
                                        <div class="bg-c1 img-cir img-40">
                                            <i class="zmdi zmdi-email-open"></i>
                                        </div>
                                        <div class="content">
                                            <p>You got a email notification</p>
                                            <span class="date">April 12, 2018 06:50</span>
                                        </div>
                                    </div>
                                    <div class="notifi__item">
                                        <div class="bg-c2 img-cir img-40">
                                            <i class="zmdi zmdi-account-box"></i>
                                        </div>
                                        <div class="content">
                                            <p>Your account has been blocked</p>
                                            <span class="date">April 12, 2018 06:50</span>
                                        </div>
                                    </div>
                                    <div class="notifi__item">
                                        <div class="bg-c3 img-cir img-40">
                                            <i class="zmdi zmdi-file-text"></i>
                                        </div>
                                        <div class="content">
                                            <p>You got a new file</p>
                                            <span class="date">April 12, 2018 06:50</span>
                                        </div>
                                    </div>
                                    <div class="notifi__footer">
                                        <a href="#">All notifications</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="account-wrap">
                            <div class="account-item clearfix js-item-menu">
                                <div class="image">
                                    <img src="assets/images/demo/avatar.png" alt="<?= $user; ?>" />
                                </div>
                                <div class="content">
                                    <a class="js-acc-btn" href="#"><?= $user; ?></a>
                                </div>
                                <div class="account-dropdown js-dropdown">
                                    <div class="info clearfix">
                                        <div class="image">
                                            <a href="#">
                                                <img src="assets/images/demo/avatar.png" alt="<?= $user; ?>" />
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h5 class="name">
                                                <a href="#"><?= $user; ?></a>
                                            </h5>
                                            <span class="email"><?php echo $email;?></span>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="#"><i class="zmdi zmdi-account"></i>Account</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                            <i class="zmdi zmdi-settings"></i>Setting</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#"><i class="zmdi zmdi-money-box"></i>Billing</a>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__footer">
                                        <a href="<?php echo base_url('/Login/logout/')?>"><i class="zmdi zmdi-power"></i>Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>