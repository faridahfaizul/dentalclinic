<?php
    echo view('admin/head');
?>

<div class="card-body">
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
                        <strong>Appointment Hours</strong>
                            <div class="float-right">
                            </div>                                   
                        </div>
                        <div class="card-body card-block">
                            <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="custom-nav-pending" role="tabpanel" aria-labelledby="custom-nav-pending-tab">
                                    <div class="table-responsive table-responsive-data2">
                                        <table is="tablePending" class="table table-data2">
                                            <thead>
                                                <tr>
                                                    <th style="display:none;">ID</th>
                                                    <th>Time</th>
                                                    <th>Number of patient/session</th>  
                                                    <th>Status</th>  
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach($hour as $hour):?>
                                                <tr class="tr-shadow">
                                                    <td style="display:none;"><?php echo $hour['id'];?></td>
                                                    <td><?php echo $hour['time'];?></td>
                                                    <td><?php echo $hour['number'];?></td>
                                                    <td><?php if($hour['status'] == 'show'){
                                                        echo '<p class="badge badge-pill badge-success">Show</p>';                                                    
                                                        } else {
                                                        echo '<p class="badge badge-pill badge-danger">Hidden</p>';
                                                    }?></td>
                                                    <td><div class="table-data-feature">
                                                        <button class="item" id="editButton" data-toggle="tooltip" data-placement="top" title="Respond">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                    </div></td>
                                                </tr>
                                            <?php endforeach; ?>
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
                        <p>© <a href="<?php echo base_url();?>/admin">DentalClinic</a> by <a href= "https://sites.google.com/view/faridahfaizul/home">FaridahFaizul</a>. All rights reserved.</p>
                        <p>Designed by <a href="https://htmlcodex.com"> <i class="fa fa-fire"></i></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- MODALS --> 
<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Appointment Hours</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('/AdminPageAppointmentInfo/updateTime');?>" name="edit-hour" id="edit-hour" method="post" accept-charset="utf-8" class="form-horizontal">
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
                        <label for="time" class=" form-control-label">Time</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="time" name="time" readonly>
                    </div>
                </div> 
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="number" class=" form-control-label">Number</label>
                    </div>
                    <div class="col-12 col-md-9">                                        
                        <input type="text" id="number" name="number" class="form-control" required>
                    </div>
                </div>  
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="status" class=" form-control-label">Status</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="checkbox" name="status" value="show" /> Show this time                            
                    </div>
                </div> 
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" id="send_form" class="btn btn-primary">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>

<?php echo view('admin/foot'); ?>

<script>
$('document').ready(function(){
    $('table #editButton').on('click', function(event){
        $('#editModal').modal();

            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();

        console.log(data);

        $('#id').val(data[0]);
        $('#time').val(data[1]);
        $('#number').val(data[2]);
        $('#status').val(data[3]);
    });
});
</script>