<title>DentalClinic - Services</title>

<?php echo view('layouts/header'); ?>

<!-- Header Start -->
<div class="jumbotron jumbotron-fluid" style="margin-bottom: 90px; background-color:#7E564E;">
  <div class="container text-center py-5">
    <h3 class="text-white display-3 mb-4">Services</h3>
    <div class="d-inline-flex align-items-center text-white">
      <p class="m-0"><a class="text-white" href="<?php echo base_url();?>">Home</a></p>
      <i class="far fa-circle px-3"></i>
      <p class="m-0"><a class="text-white" href="">Services</a></p>
    </div>
  </div>
</div>
<!-- Header End -->

<!-- Service Start -->
<div class="container-fluid py-5">
  <div class="container pt-5">
    <div class="row">
      <?php if($services):foreach($services as $services): if($services['status'] == "show"): ?>
      <div class="col-lg-3 col-md-6">
        <div class="team position-relative overflow-hidden mb-5">
        <?php echo '<img src="data:image;base64, '.base64_encode($services['image']).'">';?>          
          <div class="position-relative text-center">
            <div class="team-text bg-primary text-white">
              <h5 class="text-white text-uppercase"><?php echo $services['name'];?></h5>
              <p class="m-0"></p>
            </div>
            <div class="team-social bg-dark text-center">
              <a class="btn btn-outline-primary btn-square mr-2" href="<?php echo base_url();?>/<?php echo $services['view'];?>"><i class="fas fa-angle-double-right"></i></a>
            </div>
          </div>
        </div>
      </div>      
      <?php endif; endforeach; endif; ?>
    </div>
  </div>
</div>
<!-- Service End -->

<div class="row justify-content-center mx-0">
  <div class="col-lg-6 py-5">
    <div class="p-5 my-5" style="background: rgba(33, 30, 28, 0.7);">      
      <a class="btn btn-primary btn-block" href="<?php echo base_url();?>/appointment" style="height: 47px;">Make an Appointment</a>
    </div>
  </div>
</div>

<?php echo view('layouts/footer'); ?>