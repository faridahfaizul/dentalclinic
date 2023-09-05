<title>DentalClinic - Pricing</title>

<?php echo view('layouts/header'); ?>

<!-- Header Start -->
<div class="jumbotron jumbotron-fluid" style="margin-bottom: 90px; background-color:#7E564E;">
  <div class="container text-center py-5">
    <h3 class="text-white display-3 mb-4">Pricing</h3>
    <div class="d-inline-flex align-items-center text-white">
      <p class="m-0"><a class="text-white" href="/websetup/public">Home</a></p>
      <i class="far fa-circle px-3"></i>
      <p class="m-0"><a class="text-white" href="">Pricing</a></p>
    </div>
  </div>
</div>
<!-- Header End -->

<!-- Pricing Start -->
<div class="container-fluid py-5">
  <div class="container py-5">,
    <div class="row mx-0 justify-content-center text-center">
      <div class="col-lg-6">
        <h6 class="d-inline-block bg-light text-primary text-uppercase py-1 px-2">Pricing</h6>
      </div>
    </div>
    <div class="row">
      <!--<div class="col-lg-5" style="min-height: 500px;">
        <div class="position-relative h-100">
          <img class="position-absolute w-100 h-100" src="img/pricing.jpg" style="object-fit: cover;">
        </div>
      </div>-->
      <div class="col-lg-7 pt-5 pb-lg-5" style="width:800px; margin:0 auto;">
        <div class="pricing-text bg-light p-4 p-lg-5 my-lg-5">
          <div class="bg-white">
            <?php if($services):foreach($services as $services): ?>
            <div class="d-flex align-items-center justify-content-between border-bottom border-primary p-4">
              <div class="p-4">
                <p><b><?php echo $services['name'];?></b></p>
                <span>RM <?php echo $services['price'];?></span>
              </div>
            </div>
            <?php endforeach; endif; ?>
            <br>
            <center><a href="/websetup/public/appointment" class="btn btn-primary my-2">Make an Appointment</a></center>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Pricing End -->

<?php echo view('layouts/footer');?>