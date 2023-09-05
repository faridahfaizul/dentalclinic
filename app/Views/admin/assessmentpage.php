<?php
    echo view('admin/head');
?>

<!--Main Content-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
        <?= \Config\Services::validation()->listErrors(); ?>
        <span class="d-none alert alert-success mb-3" id="res_message"></span>
            <div class="row">  
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            Assessment <strong>Results</strong>
                        </div>
                        <div class="card-body card-block">
                            <!-- Tab for each appointment category -->
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="custom-nav-all-tab" data-toggle="tab" href="#custom-nav-all" role="tab" aria-controls="custom-nav-all" aria-selected="true">All</a>
                                    <a class="nav-item nav-link" id="custom-nav-low-tab" data-toggle="tab" href="#custom-nav-low" role="tab" aria-controls="custom-nav-low" aria-selected="false">Low Risk</a>                                    
                                    <a class="nav-item nav-link" id="custom-nav-medium-tab" data-toggle="tab" href="#custom-nav-medium" role="tab" aria-controls="custom-nav-medium" aria-selected="false">Medium Risk</a>                                    
                                    <a class="nav-item nav-link" id="custom-nav-high-tab" data-toggle="tab" href="#custom-nav-high" role="tab" aria-controls="custom-nav-high" aria-selected="false">High Risk</a></div>
                                </div>
                            </nav>
                            <!-- All -->
                            <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="custom-nav-all" role="tabpanel" aria-labelledby="custom-nav-all-tab">
                                    <div class="table-responsive table-responsive-data2">
                                        <table is="tableAll" class="table table-data2">
                                            <thead>
                                                <tr>
                                                    <th style="display:none;">ID</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Contact Number</th>
                                                    <th>Score</th>   
                                                    <th>Date</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php if($assessment):foreach($assessment as $all): ?>
                                                <tr class="tr-shadow">
                                                    <td style="display:none;"><?php echo $all['id'];?></td>
                                                    <td><?php echo $all['name'];?></td>
                                                    <td><?php echo $all['email'];?></td>
                                                    <td><?php echo $all['phonenum'];?></td>
                                                    <td><?php echo $all['score'];?></td>
                                                    <td><?php echo $all['created_date'];?></td>
                                                    <td><div class="table-data-feature">
                                                        <button class="item" id="viewButton" data-toggle="tooltip" data-placement="top" title="Details">
                                                            <i class="fas fa-info"></i>
                                                        </button>
                                                        <button class="item" id="deleteButton" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                    </div></td>
                                                </tr>
                                            <?php endforeach; endif; ?>
                                            </tbody>
                                        </table>
                                    </div>  
                                </div>
                                <?php foreach($resultlevel as $high): if($high['id'] == "1"): $highscoremin = $high['minscore']; endif; endforeach;?>
                                <?php foreach ($resultlevel as $medium): if ($medium['id'] == "2"): $mediumscoremax = $medium['maxscore']; $mediumscoremin = $medium['minscore']; endif; endforeach;?>
                                <?php foreach ($resultlevel as $low): if ($low['id'] == "3"): $lowscoremax = $low['maxscore']; endif; endforeach;?>
                                <!-- Low Risk -->
                                <div class="tab-pane fade show" id="custom-nav-low" role="tabpanel" aria-labelledby="custom-nav-low-tab">
                                    <div class="table-responsive table-responsive-data2">
                                        <table is="tableLow" class="table table-data2">
                                            <thead>
                                                <tr>
                                                <th style="display:none;">ID</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Contact Number</th>
                                                    <th>Score</th>   
                                                    <th>Date</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach($assessment as $low): if ($low['score'] <= $lowscoremax): ?>
                                                <tr class="tr-shadow">
                                                    <td style="display:none;"><?php echo $low['id'];?></td>
                                                    <td><?php echo $low['name'];?></td>
                                                    <td><?php echo $low['email'];?></td>
                                                    <td><?php echo $low['phonenum'];?></td>
                                                    <td><?php echo $low['score'];?></td>
                                                    <td><?php echo $low['created_date'];?></td>
                                                    <td><div class="table-data-feature">
                                                        <button class="item" id="viewButton" data-toggle="tooltip" data-placement="top" title="Details">
                                                            <i class="fas fa-info"></i>
                                                        </button>
                                                        <button class="item" id="deleteButton" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                    </div></td>
                                                </tr>
                                            <?php endif; endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>  
                                </div>
                                <!-- Medium Risk -->
                                <div class="tab-pane fade show" id="custom-nav-medium" role="tabpanel" aria-labelledby="custom-nav-medium-tab">
                                    <div class="table-responsive table-responsive-data2">
                                        <table is="tableMedium" class="table table-data2">
                                            <thead>
                                                <tr>
                                                    <th style="display:none;">ID</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Contact Number</th>
                                                    <th>Score</th>   
                                                    <th>Date</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach($assessment as $medium): if ($medium['score'] >= $mediumscoremin && $medium['score'] <= $mediumscoremax): ?>
                                                <tr class="tr-shadow">
                                                    <td style="display:none;"><?php echo $medium['id'];?></td>
                                                    <td><?php echo $medium['name'];?></td>
                                                    <td><?php echo $medium['email'];?></td>
                                                    <td><?php echo $medium['phonenum'];?></td>
                                                    <td><?php echo $medium['score'];?></td>
                                                    <td><?php echo $medium['created_date'];?></td>
                                                    <td><div class="table-data-feature">
                                                        <button class="item" id="viewButton" data-toggle="tooltip" data-placement="top" title="Details">
                                                            <i class="fas fa-info"></i>
                                                        </button>
                                                        <button class="item" id="deleteButton" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                    </div></td>
                                                </tr>
                                            <?php endif; endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>  
                                </div>
                                <!-- High Risk -->
                                <div class="tab-pane fade show" id="custom-nav-high" role="tabpanel" aria-labelledby="custom-nav-high-tab">
                                    <div class="table-responsive table-responsive-data2">
                                        <table is="tableHigh" class="table table-data2">
                                            <thead>
                                                <tr>
                                                <th style="display:none;">ID</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Contact Number</th>
                                                    <th>Score</th>   
                                                    <th>Date</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach($assessment as $high): if ($high['score']  >= $highscoremin): ?>
                                                <tr class="tr-shadow">
                                                    <td style="display:none;"><?php echo $high['id'];?></td>
                                                    <td><?php echo $high['name'];?></td>
                                                    <td><?php echo $high['email'];?></td>
                                                    <td><?php echo $high['phonenum'];?></td>
                                                    <td><?php echo $high['score'];?></td>
                                                    <td><?php echo $high['created_date'];?></td>
                                                    <td><div class="table-data-feature">
                                                        <button class="item" id="viewButton" data-toggle="tooltip" data-placement="top" title="Details">
                                                            <i class="fas fa-info"></i>
                                                        </button>
                                                        <button class="item" id="deleteButton" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                    </div></td>
                                                </tr>
                                            <?php endif; endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- KEEP -->               
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <p>© <a href="/websetup/public/admin">DentalClinic</a> by <a href= "https://sites.google.com/view/faridahfaizul/home">FaridahFaizul</a>. All rights reserved.</p>
                        <p>Designed by <a href="https://htmlcodex.com"> <i class="fa fa-fire"></i></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODALS --> 
<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Delete Result ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('/websetup/public/AdminPageAssessment/deleteAssessment');?>" name="delete-assessment" id="delete-assessment" method="post" accept-charset="utf-8" class="form-horizontal">
            <div class="modal-body">    
                <h4>Details</h4>          
                <input type="hidden" id="delete_id" name="delete_id" class="form-control"><br>
                Name: <input type="text" id="delete_name" name="delete_name" readonly><br>  
                Email: <input type="text" id="delete_email" name="delete_email" readonly><br>
                Phone Number : <input type="text" id="delete_phone" name="delete_phone" readonly><br>
                Score: <input type="text" id="delete_score" name="delete_score" readonly><br>
                Date: <input type="text" id="delete_date" name="delete_date" readonly>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" id="send_form" class="btn btn-danger">Delete</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- View Modal -->
<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewModalLabel">Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" name="view-assessment" id="view-assessment" method="post" accept-charset="utf-8" class="form-horizontal">
            <div class="modal-body">    
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="id" class=" form-control-label" hidden>ID</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="hidden" id="id" name="id" readonly>
                    </div>
                </div>            
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="name" class=" form-control-label">Name</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="name" name="name" readonly>
                    </div>
                </div>        
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="email" class=" form-control-label">Email</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="email" id="email" name="email" readonly>
                    </div>
                </div>           
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="phone" class=" form-control-label">Contact Number</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="phone" name="phone" readonly>
                    </div>
                </div>                 
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="score" class=" form-control-label">Score</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="score" name="score" readonly>
                    </div>
                </div> 
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="date" class=" form-control-label">Date</label>
                    </div>
                     <div class="col-12 col-md-9">
                        <input type="text" id="date" name="date" readonly>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>

<?php
    echo view('admin/foot');
?>

<script>
$('document').ready(function(){
    $('table #deleteButton').on('click', function(event){
        $('#deleteModal').modal();

            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();

        console.log(data);

        $('#delete_id').val(data[0]);
        $('#delete_name').val(data[1]);
        $('#delete_email').val(data[2]);
        $('#delete_phone').val(data[3]);
        $('#delete_score').val(data[4]);
        $('#delete_date').val(data[5]);
    });
});
</script>

<script>
$('document').ready(function(){
    $('table #viewButton').on('click', function(event){
        $('#viewModal').modal();

            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();

        console.log(data);

        $('#id').val(data[0]);
        $('#name').val(data[1]);
        $('#email').val(data[2]);
        $('#phone').val(data[3]);
        $('#score').val(data[4]);
        $('#date').val(data[5]);
    });
});
</script>