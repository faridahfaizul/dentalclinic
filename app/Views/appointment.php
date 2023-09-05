<title>DentalClinic - Appointment</title>

<?php echo view('layouts/header'); ?>

<!-- Header Start -->
<div class="jumbotron jumbotron-fluid" style="margin-bottom: 90px; background-color:#7E564E;">
  <div class="container text-center py-5">
    <h3 class="text-white display-3 mb-4">Appointment</h3>
    <div class="d-inline-flex align-items-center text-white">
      <p class="m-0"><a class="text-white" href="<?php echo base_url();?>">Home</a></p>
      <i class="far fa-circle px-3"></i>
      <p class="m-0"><a class="text-white" href="">Appointment</a></p>
    </div>
  </div>
</div>
<!-- Header End -->

<!-- Appointment Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row mx-0 justify-content-center text-center" >
            <div class="col-lg-6">
                <h6 class="d-inline-block bg-light text-primary text-uppercase py-1 px-2">Appointment</h6>
            </div>
        </div>
        <div class="row justify-content-center mx-0" style="background-color:#7E564E">
            <div class="col-lg-6 py-5">
                <div class="p-5 my-5" style="background: rgba(33, 30, 28, 0.7);">
                    <h1 class="text-white text-center mb-4">Make Appointment</h1>
                    <form action="<?php echo base_url();?>/appointment/save" method="post">
                        <div class="form-row">                      
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <span>Full Name</span>
                                    <input type="text" id="name" name="name" class="form-control bg-transparent p-4" placeholder="Your Name"  value="<?php echo $name?>" required/>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <span>I/C Number</span>
                                    <input type="text" id="identity" name="identity" class="form-control bg-transparent p-4" placeholder="Your Identity Card Number" required/>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <span>Contact Number</span>
                                    <input type="text" id="contact" name="contact" class="form-control bg-transparent p-4" placeholder="Your Number" value="<?php echo $phonenum?>" required/>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <span>Email</span>
                                    <input type="email" id="email" name="email" class="form-control bg-transparent p-4" placeholder="Your Email" value="<?php echo $email?>" required/>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <span>Service</span>
                                    <select id="service" name="service" class="custom-select bg-transparent px-4" style="height: 47px;" required>
                                        <option disabled selected value> -- Select a service -- </option>
                                        <?php foreach($services as $services): ?>
                                        <option value="<?php echo $services['id'];?>"><?php echo $services['name'];?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <span>Date</span>
                                    <input type="date" id="date" name="date" class="form-control bg-transparent p-4" required/>                                    
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <span>Time</span>
                                    <select id="time" name="time" class="custom-select bg-transparent px-4" style="height: 47px;" required>
                                        <option disabled selected value>00:00 AM/PM</option>
                                        <?php foreach($hour as $hour): if($hour['status'] == 'show'):?>
                                            <option value="<?php echo $hour['id'];?>"><?php echo $hour['time'];?></option>
                                        <?php endif; endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <span>Assessment Score</span>
                                    <input type="email" id="score" name="score" class="form-control bg-transparent p-4" placeholder="Your assessment score" value="<?php echo $score?>" readonly/>         
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <span>Additional Notes</span>
                                    <textarea id="notes" name="notes" rows="2" class="form-control bg-transparent p-4" placeholder="Notes"></textarea>                            
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <button type="submit"  id="send_form" class="btn btn-primary btn-block"style="height: 47px;" value="Submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Appointment End -->

<!-- Disable Past Date in calendar at Appointment page-->
<script language="javascript">
    var today = new Date();
    var dd = String(today.getDate() + 1).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0');
    var yyyy = today.getFullYear();

    today = yyyy + '-' + mm + '-' + dd;
    $('#date').attr('min',today);
</script>

<?php echo view('layouts/footer');?>