<title>DentalClinic - Assessment</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
<script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
<script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>

<script type="text/javascript">
window.html2canvas = html2canvas;
window.jsPDF = window.jspdf.jsPDF;

function makePDF() {
var doc = new jsPDF();
var elementHTML = document.querySelector('#page3').innerHTML;
var specialElementHandlers = {
    '#elementH': function (element, renderer) {
        return true;
    }
};
doc.fromHTML(elementHTML, 15, 15, {
    'width': 170,
    'elementHandlers': specialElementHandlers
});

// Save the PDF
doc.save('sample-document.pdf');
}
</script>

<?php echo view('layouts/header'); ?>

<!-- Header Start -->
<div class="jumbotron jumbotron-fluid" style="margin-bottom: 90px; background-color:#7E564E;">
  <div class="container text-center py-5">
    <h3 class="text-white display-3 mb-4">Assessment</h3>
    <div class="d-inline-flex align-items-center text-white">
      <p class="m-0"><a class="text-white" href="<?php echo base_url();?>">Home</a></p>
      <i class="far fa-circle px-3"></i>
      <p class="m-0"><a class="text-white" href="">Assessment</a></p>
    </div>
  </div>
</div>
<!-- Header End -->

<!-- ################################################################################################ -->
<div id="capture" class="wrapper row3">
    <main class="hoc container clear"> 
      <div class="content divborder"> 
        <form id="msform" name="msform" action="<?php echo base_url();?>/assessment/storeAssessment" method="post">
          <!-- progressbar -->
            <ul id="progressbar">
              <li class="active" id="intro"><strong>Introduction</strong></li>
              <li id="details"><strong>Details</strong></li>
              <li id="assessment"><strong>Assessment</strong></li>              
              <li id="terms"><strong>Terms</strong></li>   
            </ul>
            <div class="progress">
              <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="20" aria-valuemax="100"></div>
            </div>
            <br>
          <!-- fieldsets -->
          <fieldset id="page1">
            <h2 class="fs-title" style="text-align:center"><?php foreach($terms as $info): echo $info['topic'];?></h2>
            <p><?php  echo $info['description']; endforeach;?></p>  
            <input type="submit" name="next" class="next action-button" value="Next"/>
          </fieldset>
          <fieldset id="page2">
            <h2 class="fs-title" style="text-align:center">Personal Details</h2>
            <input type="text" id="name" name="name" class="form-control" placeholder="Full Name" required>             
            <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>             
            <input type="text" id="phonenum" name="phonenum" class="form-control" placeholder="Phone Number" required> 
            <input type="submit" name="next" id="next" class="next action-button" value="Next"/>
            <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
            <!--<button onclick="window.open('generated.pdf', '_blank');">PDF</button>-->
          </fieldset>  
          <fieldset id="page3">          
            <h2 class="fs-title" style="text-align:center">Assessment</h2>
            <?php $count = 0;
            $sum = 0;
            foreach($question as $question): ?>
            <?php // use of explode
            $count++;
            $stringAnswer = $question['answer'];
            $stringPoint = $question['point'];
            $answer_arr = explode (",", $stringAnswer);
            $point_arr = explode (",", $stringPoint);
            $length = count($answer_arr);
            $answer = "answer".$count;
            $choice = "choice".$count;?> 
            <p style="color:black;"><b><?php echo $count?>) <?php echo $question['question'];?></b></p>
            
            <?php for ($i = 0; $i < $length; $i++) { ?>
            <div>
              <input type="radio" name="<?php echo $answer ?>" value="<?php echo $point_arr[$i] ?>" required>
              <span><?php echo $answer_arr[$i] ?></span>
              <input type="text" name="<?php echo $choice ?>" value="<?php echo $answer_arr[$i] ?>" hidden>
            </div>
              <?php } ?>            
              <br><br>
            <?php endforeach; ?>                 
            <input type="submit" id="next" name="next" class="next action-button" value="Next" onclick="getScore()"/>
            <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
            <!--<button onclick="makePDF()">PDF</button>-->
            
          </fieldset>  
          <fieldset id="page4">
            <h2 class="fs-title" style="text-align:center">Terms</h2>
            <p><?php foreach($terms as $term): ?>
            <input type="radio" name="terms" value="Agree" required><?php echo $term['terms']; endforeach;?></p>                  
            <input type="hidden" name="score" id="score" required/>      
            <button type="submit" id="next" name="next" class="next action-button" value="Submit">Submit</button>          
            <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
          </fieldset>
        </form>
      </div>
    </main>
  </div>
</div>

<script>
    $(document).ready(function(){
    
    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;
    var current = 1;
    var steps = $("fieldset").length;
    
    setProgressBar(current);
    
    $(".next").click(function(){
        
        current_fs = $(this).parent();
        next_fs = $(this).parent().next();
        
        //Add Class Active
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
        
        //show the next fieldset
        next_fs.show(); 
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function(now) {
                // for making fielset appear animation
                opacity = 1 - now;
    
                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                next_fs.css({'opacity': opacity});
            }, 
            duration: 500
        });
        setProgressBar(++current);
    });
    
    $(".previous").click(function(){
        
        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();
        
        //Remove class active
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
        
        //show the previous fieldset
        previous_fs.show();
    
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function(now) {
                // for making fielset appear animation
                opacity = 1 - now;
    
                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                previous_fs.css({'opacity': opacity});
            }, 
            duration: 500
        });
        setProgressBar(--current);
    });
    
    function setProgressBar(curStep){
        var percent = parseFloat(100 / steps) * curStep;
        percent = percent.toFixed();
        $(".progress-bar")
          .css("width",percent+"%")   
    }
    
    $(".submit").click(function(){
        return false;
    })
        
  });
</script>

<script>
  function getScore() {
    var total = 0;
    for (var i = 1; i < 18;i++) {
      var count = i;
      var value = "answer".concat(count);
      var name = document.getElementsByName(value);
      
      name.forEach((evnt) => {
      if (evnt.checked) {
        total = total + parseInt(evnt.value);
        return;
      }
    });
    }
    $('#score').val(total);
  }
</script>

<?php echo view('layouts/footer');?>
