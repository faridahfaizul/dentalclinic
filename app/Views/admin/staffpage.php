<?php echo view('admin/head'); ?>

<div class="card-body">
<!--Main Content-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
        <?= \Config\Services::validation()->listErrors(); ?>
        <span class="d-none alert alert-success mb-3" id="res_message"></span>
            <div class="row"> 
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <strong>Doctors</strong>
                            <div class="float-right">
                                <button class="au-btn au-btn-icon au-btn--green au-btn--small" data-target="#addDoctorModal" data-toggle="modal">
                                    <i class="fa solid fa-plus"></i>
                                </button>
                            </div>                               
                        </div>
                        <div class="card-body card-block">
                            <div class="table-responsive table-responsive-data2">
                                <table is="tableSlider" class="table table-data2">
                                    <thead>
                                        <tr>
                                            <th style="display:none;">ID</th>
                                            <th>Staff ID</th>
                                            <th>Name</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($doctor as $doctor): ?>
                                        <tr class="tr-shadow">
                                            <td style="display:none;"><?php echo $doctor['id'];?></td>
                                            <td><?php echo $doctor['staff_id'];?></td>
                                            <td><?php echo $doctor['name'];?></td>
                                            <td><div class="table-data-feature">
                                                <button class="item" id="editButton" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </button>
                                                <button class="item" id="deleteButton" data-toggle="tooltip" data-placement="top" title="Delete">
                                                    <i class="zmdi zmdi-delete"></i>
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
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <strong>Nurses</strong>
                            <div class="float-right">
                                <button class="au-btn au-btn-icon au-btn--green au-btn--small" data-target="#addNurseModal" data-toggle="modal">
                                    <i class="fa solid fa-plus"></i>
                                </button>
                            </div>                               
                        </div>
                        <div class="card-body card-block">
                            <div class="table-responsive table-responsive-data2">
                                <table is="tableSlider" class="table table-data2">
                                    <thead>
                                        <tr>
                                            <th style="display:none;">ID</th>
                                            <tH>Staff ID</th>
                                            <th>Name</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($nurse as $nurse): ?>
                                        <tr class="tr-shadow">
                                            <td style="display:none;"><?php echo $nurse['id'];?></td>
                                            <td><?php echo $nurse['staff_id'];?></td>
                                            <td><?php echo $nurse['name'];?></td>
                                            <td><div class="table-data-feature">
                                                <button class="item" id="editNurseButton" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </button>
                                                <button class="item" id="deleteNurseButton" data-toggle="tooltip" data-placement="top" title="Delete">
                                                    <i class="zmdi zmdi-delete"></i>
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
</div>

<!-- MODALS --> 
<!-- Add Modal -->
<div class="modal fade" id="addDoctorModal" tabindex="-1" role="dialog" aria-labelledby="addDoctorModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDoctorModal">New Doctor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('/websetup/public/AdminPageStaff/storeDoctor');?>" name="add-doctor" id="add-doctor" method="post" accept-charset="utf-8" class="form-horizontal" >
            <div class="modal-body">    
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="staff_id" class=" form-control-label">Staff ID</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="staff_id" name="staff_id" class="form-control" required>
                    </div>
                </div>  
                
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="name" class=" form-control-label">Name</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                </div>     
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" id="send_form" class="btn btn-primary">Create</button>
            </div>            
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editDoctorModal" tabindex="-1" role="dialog" aria-labelledby="editDoctorModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editDoctorModal">Edit Doctor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('/websetup/public/AdminPageStaff/updateDoctor');?>" name="edit-doctor" id="edit-doctor" method="post" accept-charset="utf-8" class="form-horizontal" >
            <div class="modal-body">    
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="edit_id" class=" form-control-label" hidden>ID</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="hidden" id="edit_id" name="edit_id" class="form-control">
                    </div>
                </div>  
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="edit_staff_id" class=" form-control-label">Staff ID</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="edit_staff_id" name="edit_staff_id" readonly>
                    </div>
                </div>  
                
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="edit_name" class=" form-control-label">Name</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="edit_name" name="edit_name" class="form-control" required>
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

<!-- Delete Modal -->
<div class="modal fade" id="deleteDoctorModal" tabindex="-1" role="dialog" aria-labelledby="deleteDoctorModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteDoctorModal">Delete Doctor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('/websetup/public/AdminPageStaff/deleteDoctor');?>" name="delete-doctor" id="delete-doctor" method="post" accept-charset="utf-8" class="form-horizontal" >
            <div class="modal-body">    
            <h4>Details</h4>   
                <br>                  
                <input type="hidden" id="delete_id" name="delete_id" class="form-control"> 
                Staff ID: <input type="text" id="delete_staff_id" name="delete_staff_id"  readonly><br>
                Name: <input type="text" id="delete_name" name="delete_name"  readonly>
                
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" id="send_form" class="btn btn-danger">Delete</button>
            </div>            
            </form>
        </div>
    </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addNurseModal" tabindex="-1" role="dialog" aria-labelledby="addNurseModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNurseModal">New Nurse</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('/websetup/public/AdminPageStaff/storeNurse');?>" name="add-nurse" id="add-nurse" method="post" accept-charset="utf-8" class="form-horizontal" >
            <div class="modal-body">     
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="nurse_staff_id" class="form-control-label">Staff ID</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="nurse_staff_id" name="nurse_staff_id" class="form-control" required>
                    </div>
                </div>  
                
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="nurse_name" class=" form-control-label">Name</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="nurse_name" name="nurse_name" class="form-control" required>
                    </div>
                </div>     
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" id="send_form" class="btn btn-primary">Create</button>
            </div>            
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editNurseModal" tabindex="-1" role="dialog" aria-labelledby="editNurseModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editNurseModal">Edit Nurse</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('/websetup/public/AdminPageStaff/updateNurse');?>" name="edit-nurse" id="edit-nurse" method="post" accept-charset="utf-8" class="form-horizontal" >
            <div class="modal-body">    
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="edit_nurse_id" class=" form-control-label" hidden>ID</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="hidden" id="edit_nurse_id" name="edit_nurse_id" class="form-control">
                    </div>
                </div>  
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="edit_nurse_staff_id" class=" form-control-label">Staff ID</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="edit_nurse_staff_id" name="edit_nurse_staff_id" readonly>
                    </div>
                </div>  
                
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="edit_nurse_name" class=" form-control-label">Name</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="edit_nurse_name" name="edit_nurse_name" class="form-control" required>
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

<!-- Delete Modal -->
<div class="modal fade" id="deleteNurseModal" tabindex="-1" role="dialog" aria-labelledby="deleteNurseModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteNurseModal">Delete Nurse</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('/websetup/public/AdminPageStaff/deleteNurse');?>" name="delete-nurse" id="delete-nurse" method="post" accept-charset="utf-8" class="form-horizontal" >
            <div class="modal-body">    
            <h4>Details</h4>   
                <br>                  
                <input type="hidden" id="delete_nurse_id" name="delete_nurse_id" class="form-control"> 
                Staff ID: <input type="text" id="delete_nurse_staff_id" name="delete_nurse_staff_id"  readonly><br>
                Name: <input type="text" id="delete_nurse_name" name="delete_nurse_name"  readonly>
                
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" id="send_form" class="btn btn-danger">Delete</button>
            </div>            
            </form>
        </div>
    </div>
</div>



<?php echo view('admin/foot'); ?>

<script>
$('document').ready(function(){
    $('table #editButton').on('click', function(event){
        $('#editDoctorModal').modal();

            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();

        console.log(data);

        $('#edit_id').val(data[0]);
        $('#edit_staff_id').val(data[1]);       
        $('#edit_name').val(data[2]);    
    });
});
</script>

<script>
$('document').ready(function(){
    $('table #deleteButton').on('click', function(event){
        $('#deleteDoctorModal').modal();

            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();

        console.log(data);

        $('#delete_id').val(data[0]);
        $('#delete_staff_id').val(data[1]);       
        $('#delete_name').val(data[2]);    
    });
});
</script>

<script>
$('document').ready(function(){
    $('table #editNurseButton').on('click', function(event){
        $('#editNurseModal').modal();

            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();

        console.log(data);

        $('#edit_nurse_id').val(data[0]);
        $('#edit_nurse_staff_id').val(data[1]);       
        $('#edit_nurse_name').val(data[2]);    
    });
});
</script>

<script>
$('document').ready(function(){
    $('table #deleteNurseButton').on('click', function(event){
        $('#deleteNurseModal').modal();

            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();

        console.log(data);

        $('#delete_nurse_id').val(data[0]);
        $('#delete_nurse_staff_id').val(data[1]);       
        $('#delete_nurse_name').val(data[2]);    
    });
});
</script>