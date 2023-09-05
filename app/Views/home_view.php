<title>DentalClinic - Home</title>

<?php echo view('layouts/header'); ?>

<!-- Carousel Start -->
<div class="container-fluid p-0 mb-5 pb-5">
  <div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">      
      <?php $count = 0;
      if($slider):foreach($slider as $row): if($row['showCheck'] == 'show'):
        if ($count == 0):?>        
        <li data-target="#header-carousel" data-slide-to="<?php echo $count?>" class="active"></li>
        <?php $count = $count + 1; ?>
      <?php else: ?>
        <li data-target="#header-carousel" data-slide-to="<?php echo $count?>"></li>
        <?php $count = $count + 1; ?>
      <?php endif; endif; endforeach; endif;?>
    </ol>
    <div class="carousel-inner">
    <?php $count1 = 0; if($slider):foreach($slider as $slider): if($slider['showCheck'] == 'show'): if ($count1 == 0):?>
      <div class="carousel-item position-relative active" style="min-height: 100vh;">
        <img class="position-absolute w-100 h-100" style="object-fit: cover;"      
        <?php echo '<img src="data:image;base64, '.base64_encode($slider['image']).'">';?>>
        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
          <div class="p-3" style="max-width: 900px;">
            <h6 class="text-white text-uppercase mb-3 animate__animated animate__fadeInDown" style="letter-spacing: 3px;"></h6>
            <h3 class="display-3 text-capitalize text-white mb-3 animate__animated animate__fadeInDown"><?php echo $slider['topic'];?></h3>
            <p class="mx-md-5 px-5"><?php echo $slider['description'];?></p>
            <a class="btn btn-outline-light py-3 px-4 mt-3 animate__animated animate__fadeInUp" href="<?php echo $slider['link'];?>">Read More</a>
          </div>
        </div>
      </div>  
      <?php $count1 = $count1 + 1; ?>    
      <?php else: ?>
      <div class="carousel-item position-relative" style="min-height: 100vh;">
      <img class="position-absolute w-100 h-100" style="object-fit: cover;"      
        <?php echo '<img src="data:image;base64, '.base64_encode($slider['image']).'">';?>>
        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
          <div class="p-3" style="max-width: 900px;">
            <h6 class="text-white text-uppercase mb-3 animate__animated animate__fadeInDown" style="letter-spacing: 3px;"></h6>
            <h3 class="display-3 text-capitalize text-white mb-3 animate__animated animate__fadeInDown"><?php echo $slider['topic'];?></h3>
            <p class="mx-md-5 px-5"><?php echo $slider['description'];?></p>
            <a class="btn btn-outline-light py-3 px-4 mt-3 animate__animated animate__fadeInUp" href="<?php echo $slider['link'];?>">Read More</a>
          </div>
        </div>
      </div>  
      <?php $count1 = $count1 + 1; ?>    
    <?php endif; endif; endforeach; endif; ?>
    </div>
  </div>
</div>
<!-- Carousel End -->

<!-- About Start -->
<div class="container-fluid py-5">
  <div class="container py-5">
    <div class="row align-items-center">
      <div class="col-lg-6 pb-5 pb-lg-0">  
        <?php if($logo):foreach($logo as $logo):     
          echo '<img class="img-fluid w-100" src="data:image;base64, '.base64_encode($logo['image']).'">';?> 
        <?php endforeach; endif; ?>          
      </div>
      <?php if($text_info): foreach($text_info as $text_info): ?>
      <div class="col-lg-6">
        <h6 class="d-inline-block text-primary text-uppercase bg-light py-1 px-2"><?php echo $text_info['welcome_text']; ?></h6>
        <h1 class="mb-4"><?php echo $text_info['heading']; ?></h1>
        <p class="pl-4 border-left border-primary"><?php echo $text_info['info_text']; ?></p>
        <!--<div class="row pt-3">
          <div class="col-6">
            <div class="bg-light text-center p-4">
              <h3 class="display-4 text-primary" data-toggle="counter-up">99</h3>
              <h6 class="text-uppercase">Spa Specialist</h6>
            </div>
          </div>
          <div class="col-6">
            <div class="bg-light text-center p-4">
              <h3 class="display-4 text-primary" data-toggle="counter-up">999</h3>
              <h6 class="text-uppercase">Happy Clients</h6>
            </div>
          </div>
        </div>-->
        
      <footer>
          <ul class="nospace inline pushright">
            <a class="btn" id="myBtn"></a>
          </ul>
        </footer>
      </div>
      <?php endforeach; endif; ?>
    </div>
  </div>
</div>
<!-- About End -->

<!-- Service Start -->
<div class="container-fluid px-0 py-5 my-5">
  <div class="row mx-0 justify-content-center text-center">
    <div class="col-lg-6">
      <h6 class="d-inline-block bg-light text-primary text-uppercase py-1 px-2">Our Service</h6>
      <h1>Dental Care & Services</h1>
    </div>
  </div>
  <!-- Owl Carousel Start -->
  <div class="owl-carousel service-carousel">
  <?php if($services):foreach($services as $services):if($services['status'] == "show"):?>
    <div class="service-item position-relative">
        <?php echo '<img src="data:image;base64, '.base64_encode($services['image']).'">';?>
      <div class="service-text text-center">
        <h4 class="text-white font-weight-medium px-3"><?php echo $services['name']; ?></h4>
        <p class="text-white px-3 mb-3"></p>
        <div class="w-100 bg-white text-center p-4" >
          <a class="btn btn-primary" href="<?php echo base_url();?>/<?php echo $services['view']; ?>">Read More</a>
        </div>
      </div>
    </div>
    <?php endif; endforeach; endif; ?>
  </div>
  <!-- Owl Carousel End -->
  <div class="row justify-content-center mx-0" style="background-color:#7E564E">
    <div class="col-lg-4 py-5">
      <div class="p-4 my-5" style="background: rgba(33, 30, 28, 0.7);">      
        <a class="btn btn-primary btn-block" href="<?php echo base_url();?>/appointment" style="height: 47px;">Make an Appointment</a>
        <a class="btn btn-primary btn-block" href="<?php echo base_url();?>/pricing" style="height: 47px;">Pricing</a>
      </div>
    </div>
  </div>
</div>
<!-- Service End -->

<!-- Team Start -->
<div class="container-fluid py-5">
  <div class="container pt-5">
    <div class="row justify-content-center text-center">
      <div class="col-lg-6">
        <h6 class="d-inline-block bg-light text-primary text-uppercase py-1 px-2">Our Team</h6>
        <h1 class="mb-5">Dental Specialist</h1>
      </div>
    </div>
    <div class="row">
      <?php if($team): foreach($team as $team):  if($team['status'] == 'show'): ?>
      <div class="col-lg-3 col-md-6">
        <div class="team position-relative overflow-hidden mb-5">          
        <?php echo '<img src="data:image;base64, '.base64_encode($team['image']).'">';?>
          <div class="position-relative text-center">
            <div class="team-text bg-primary text-white">
              <h5 class="text-white text-uppercase"><?php echo $team['name'];?></h5>
              <p class="m-0"><?php echo $team['position'];?></p>
            </div>
            <div class="team-social bg-dark text-center">
              <a class="btn btn-outline-primary btn-square mr-2" href="<?php echo base_url();?>/team"><i class="fas fa-angle-double-right"></i></a>
            </div>
          </div>
        </div>
      </div>      
      <?php endif; endforeach; endif; ?>
    </div>
  </div>
</div>
<!-- Team End -->

<!-- The Modal -->
<div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="notice-modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Announcement !</h5>
        <button type="button" class="notice-close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row form-group">
          <div class="col col-md-3">
            <label for="check1" class=" form-control-label">Checking</label>
          </div>
          <div class="col-12 col-md-9">
            <input type="checkbox" name="check1" value="Test" /> Test check box                      
          </div>
        </div> 
      </div>
    </div>
  </div>
</div>

<script>

// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("notice-close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
//window.onclick = function(event) {
//if (event.target == modal) {
//  modal.style.display = "none";
//}
//}

$(document).ready(function(){
  modal.style.display = "block";
});

</script>
</div>


<?php echo view('layouts/footer'); ?>