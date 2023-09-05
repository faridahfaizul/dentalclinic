<!-- Footer Start -->
<div class=" container-fluid position-relative bg-dark py-5" style="margin-top: 90px;">
  <div class="container pt-6">
    <div class="row">
      <!-- First Column -->
      <div class="col-lg-4 pr-lg-5 mb-10">
        <a class="navbar-brand">
          <?php foreach($business_infos as $web): ?>
            <h1 class="mb-3 text-white"><span class="text-primary"><?php echo $web['webname1'];?></span><?php echo $web['webname2'];?></h1>
          <?php endforeach; ?>
        </a>
        <!-- Map -->
        <p>          
          <div class="mapouter">
            <div class="gmap_canvas">
              <?php if($business_infos):foreach($business_infos as $map):?>
              <iframe src="<?php echo $map['map']; endforeach; endif; ?>" width="270" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              <br>
            </div>
          </div>
        </p>
        <!-- Business Info -->
        <?php if($business_infos):foreach($business_infos as $address):?>
        <p><i class="fa fa-map-marker-alt mr-2"></i><?php echo $address['address1'];?> <?php echo $address['address2'];?>
        <?php echo $address['postal_code'];?><?php echo $address['city'];?> <?php echo $address['state'];?>
        <?php echo $address['country'];?></p>
        <?php if($business_infos):foreach($business_infos as $contact2):?>
        <p id="our-contact"><i class="fa fa-phone-alt mr-2"></i><?php echo $contact2['contact'];?></p>
        <p id="our-email"><i class="fa fa-envelope mr-2"></i><?php echo $contact2['email'];?></p>
        <p><i class="fa fa-globe mr-2"></i><?php echo $address['website'];?></p><?php endforeach; endif; ?>
        <?php endforeach; endif; ?>
        <div class="d-flex justify-content-start mt-4">
          <?php if($business_links):foreach($business_links as $business_links): if($business_links['status'] == 'show'):?>
            <a class="btn btn-lg btn-primary btn-lg-square mr-2" href="http://<?php echo $business_links['link'];?>"><i class="<?php echo $business_links['logo'];?>"></i></a>
          <?php endif; endforeach; endif; ?>
        </div>
      </div>
      <!-- Second Column -->
      <div class="col-lg-4 pr-lg-5 mb-10"> 
        <!-- Calendar for Business Hour -->
        <p>          
        <h5 class="text-white text-uppercase mb-4">Business Hours</h5>
        <div id="calendar"></div>
        </p>        
      </div>
      <!-- Third Column -->
      <div class="col-lg-4 pr-lg-5 mb-10">
        <!-- Newsletter Form -->
        <p>   
        <h5 class="text-white text-uppercase mb-4">Newsletter</h5> 
        <div class="w-100">          
          <form action="<?php echo base_url('/HomePage/storeSubscribe');?>" method="post">
            <input type="text" id="name" name="name" class="form-control border-light" style="padding: 30px;" placeholder="Your Name" required>
            <br>
            <input  type="email" id="email" name="email" class="form-control border-light" style="padding: 30px;" placeholder="Your Email Address" required>           
            <br>
            <button class="btn btn-primary px-4" type="submit" value="submit">Subscribe</button>
          </form>
        </div>
        </p>        
      </div>      
    </div>
  </div>
</div>
  
<div class="container-fluid bg-dark text-light border-top py-4" style="border-color: rgba(256, 256, 256, .15) !important;">
  <div class="container">
    <div class="row">
      <div class="col-md-6 text-center text-md-left mb-3 mb-md-0">
        <p class="m-0 text-white">&copy; <a href="<?php echo base_url();?>">DentalClinic </a>by <a href= "https://sites.google.com/view/faridahfaizul/home">FaridahFaizul</a>. All Rights Reserved.</p>
      </div>
      <div class="col-md-6 text-center text-md-right">
        <p class="m-0 text-white">Designed by <a href="https://htmlcodex.com"> <i class="fa fa-fire"></i></a></p>
      </div>
    </div>
  </div>
</div>
<!-- Footer End -->

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

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

<!-- Calendar -->
<script src="js/admin/moment.min.js"></script> 
<script src="js/admin/fullcalendar.min.js"></script>
<script src="js/main/fullcalendar@5.10.2/main.min.js"></script>

<!-- JAVASCRIPTS 
<script src="js/main/jquery.min.js"></script>
<script src="js/main/jquery.backtotop.js"></script>
<script src="js/main/jquery.mobilemenu.js"></script> -->

<!-- Homepage specific
<script src="js/main/jquery.easypiechart.min.js"></script> -->

</body>
</html>

<!-- Calendar Script (Business Hours) -->
<script>
$('document').ready(function() {         
  var calendar = $('#calendar').fullCalendar({ 
    header:false,
    footer:{
      right:'today',
      left: 'prev,next'
    },
    buttonText: { today: "Current Week" },
    defaultView: 'listWeek',
    //Array,hiddenDays: [ 6, 0 ],
    events: [
      {
        title:"Open",
        dow:[1, 2, 3, 4, 5],
        start: '09:00', 
        end: '18:00', 
        color: '#4BB543'
      },
      {
        title:"Close",
        dow:[6, 0],
        color: '#FF0000'
      },
      <?php if($calendar):foreach($calendar as $calendar): ?>
      {
        title: '<?php echo $calendar['operation'];?>',
        start: '<?php echo $calendar['start'];?>',
        end: '<?php echo $calendar['end'];?>',
        <?php if($calendar['operation'] == 'Holiday'){?>
          color: '#eed202'
        <?php } elseif ($calendar['operation'] == "Open"){?>
          color: '#4BB543'
        <?php } else { ?>
          color: '#FF0000'
        <?php } ?>
      },
      <?php endforeach; endif; ?>
    ],
  }); 
});
</script>