<title>DentalClinic - Gallery</title>

<?php echo view('layouts/header'); ?>

<!-- Header Start -->
<div class="jumbotron jumbotron-fluid" style="margin-bottom: 90px; background-color:#7E564E;">
  <div class="container text-center py-5">
    <h3 class="text-white display-3 mb-4">Gallery</h3>
    <div class="d-inline-flex align-items-center text-white">
      <p class="m-0"><a class="text-white" href="<?php echo base_url();?>">Home</a></p>
      <i class="far fa-circle px-3"></i>
      <p class="m-0"><a class="text-white" href="">Gallery</a></p>
    </div>
  </div>
</div>
<!-- Header End -->

<!-- Gallery Start -->
<div style="text-align:center">
  <h2>Gallery</h2>
  <p>Click on the image to view:</p>
</div>

<div class="row">
  <?php $count = 0; foreach($gallery as $gallery1): if($gallery1['status'] == 'show'):?>    
  <?php $count++; ?>
  <div class="column">
    <img onclick="openModal();currentSlide(<?php echo $count; ?>)" class="hover-shadow cursor gallery-image"
    <?php echo '<img src="data:image;base64, '.base64_encode($gallery1['image']).'">';?>
  </div>
  <?php endif; endforeach; ?>
</div>

<!-- The Modal -->
<div id="myModal" class="gallery-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <span class="gallery-close" onclick="closeModal()">&times;</span>
  <div class="modal-dialog modal-lg" role="document">
    <div class="gallery-modal-content">
      <?php $num = 0; foreach($gallery as $gallery2):  if($gallery2['status'] == 'show'): $num++; ?>
        <div class="mySlides">
          <div class="numbertext"><?php echo $num; ?> / <?php echo $count; ?></div>
          <br>
          <p class="caption"><?php echo $gallery2['caption'];?></p>
          <?php echo '<img src="data:image;base64, '.base64_encode($gallery2['image']).'" style="width:100%;">';?>
        </div>
      <?php endif; endforeach; ?>
    
      <a class="gallery-prev" onclick="plusSlides(-1)">&#10094;</a>
      <a class="gallery-next" onclick="plusSlides(1)">&#10095;</a>   
    </div>
  </div>
</div>
<!-- Gallery End -->


<?php echo view('layouts/footer');?>

<script>
function openModal() {
  document.getElementById("myModal").style.display = "block";
}

function closeModal() {
  document.getElementById("myModal").style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>