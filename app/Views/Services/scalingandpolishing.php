<title>DentalClinic - Services</title>

<?php echo view('layouts/header'); ?>

<!-- Header Start -->
<div class="jumbotron jumbotron-fluid" style="margin-bottom: 90px; background-color:#7E564E;">
  <div class="container text-center py-5">
    <h3 class="text-white display-3 mb-4">Services</h3>
    <div class="d-inline-flex align-items-center text-white">
      <p class="m-0"><a class="text-white" href="/websetup/public">Home</a></p>
      <i class="far fa-circle px-3"></i>
      <p class="m-0"><a class="text-white" href="/websetup/public/services">Services</a></p>
      <i class="far fa-circle px-3"></i>
      <p class="m-0"><a class="text-white" href="">Scaling and Polishing</a></p>
    </div>
  </div>
</div>
<!-- Header End -->

<!-- Service Info Start -->
<?php if($services): foreach($services as $vice): if($vice['view'] == 'scalingandpolishing'):?>
<div class="container-fluid py-5">
  <div class="container py-5">
    <div class="row">
      <div class="col-lg-6" style="min-height: 500px;">
        <div class="position-relative h-100">
        <?php echo '<img src="data:image;base64, '.base64_encode($vice['image']).'">';?>          
          
        </div>
      </div>
      <div class="col-lg-6 pt-5 pb-lg-5">
        <div class="hours-text bg-light p-4 p-lg-5 my-lg-5">
          <h6 class="d-inline-block text-white text-uppercase bg-primary py-1 px-2"></h6>
          <h1 class="mb-4"><?php echo $vice['name'];?></h1>
          <p><?php echo $vice['details'];?></p>
        </div>
      </div>
    </div>
  </div>
</div>
<?php endif; endforeach; endif; ?>
<!-- Service Info End -->

<?php echo view('layouts/footer'); ?>