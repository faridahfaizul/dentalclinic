<title>DentalClinic - Result</title>

<?php echo view('layouts/header'); ?>

<!-- Header Start -->
<div class="jumbotron jumbotron-fluid" style="margin-bottom: 90px; background-color:#7E564E;">
  <div class="container text-center py-5">
    <h3 class="text-white display-3 mb-4">Result</h3>
    <div class="d-inline-flex align-items-center text-white">
      <p class="m-0"><a class="text-white" href="/websetup/public">Home</a></p>
      <i class="far fa-circle px-3"></i>
      <p class="m-0"><a class="text-white" href="">Result</a></p>
    </div>
  </div>
</div>
<!-- Header End -->

<!-- Result Start -->
<div class="wrapper row3">
    <main class="hoc container clear" style=" max-width: 800px;"> 
      <div class="content divborder"> 
          <!-- fieldsets -->
          <fieldset>
            <h2 class="fs-title" style="text-align:center">Result</h2>
            <br>   
            <p>Name : <?php echo $name?></p>         
            <p>Email : <?php echo $email?></p>         
            <p>Phone Number : <?php echo $phonenum?></p>         
            <p>Score : Assesment score is <?php echo $score?></p> 
            <br>
            <?php foreach($resultlevel as $risk):
            if($risk['id'] == "1"): $highscore = $risk['minscore']; $deshigh = $risk['risklevel'];
            elseif($risk['id'] == "2"): $desmid = $risk['risklevel'];
            elseif($risk['id'] == "3"): $lowscore = $risk['maxscore'];  $deslow = $risk['risklevel']; endif; endforeach;?>       
            
            <?php if($score >= $highscore): ?>
              <center><p><b><a style="color:red;"><?php echo $deshigh;?>!<br>You must have a checkup.<br>Please book your appointment now.</a></b></p></center>
              <center><a class="btn btn-outline-score py-3 px-4 mt-3" href="/websetup/public/appointment">Book an Appointment</a></center>
            <?php elseif($score <= $lowscore): ?>
              <center><p><b><a style="color:green;"><?php echo $deslow;?>!</a></b></p></center>
            <?php elseif($score > $lowscore && $score < $highscore): ?>
              <center><p><b><a style="color:orange;"><?php echo $desmid;?>!</b><br>You can have a checkup.<br>Please book your appointment.</a></p></center>
              <center><a class="btn btn-outline-score py-3 px-4 mt-3" href="/websetup/public/appointment">Book an Appointment</a></center>
            <?php endif;?>            
          </fieldset>
      </div>
    </main>
</div>

<?php echo view('layouts/footer');?>