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
                            <strong>Team</strong>
                            <div class="float-right">
                                <button class="au-btn au-btn-icon au-btn--green au-btn--small" data-target="#addModal" data-toggle="modal">
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
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th style="display:none;">Information</th>
                                            <th>Status</th>
                                            <th>Image</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if($team):foreach($team as $team): ?>
                                        <tr class="tr-shadow">
                                            <td style="display:none;"><?php echo $team['id'];?></td>
                                            <td><?php echo $team['name'];?></td>
                                            <td><?php echo $team['position'];?></td>
                                            <td style="display:none;"><?php echo $team['info'];?></td>   
                                            <td>
                                                <?php if($team['status'] == 'show'){
                                                    echo '<p class="badge badge-pill badge-success">Show</p>';                                                    
                                                } else {
                                                    echo '<p class="badge badge-pill badge-danger">Hidden</p>';
                                                }?>
                                            </td>
                                            <td style="width: 20%; height: auto;">
                                                <?php echo '<img src="data:image;base64, '.base64_encode($team['image']).'">';?>
                                            </td>
                                            <td><div class="table-data-feature">
                                                <button class="item" id="editButton" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="zmdi zmdi-edit"></i>
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
<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('/websetup/public/AdminPageTeam/updateTeam');?>" name="edit-team" id="edit-team" method="post" accept-charset="utf-8" class="form-horizontal">
            <div class="modal-body">    
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="id" class=" form-control-label" hidden>ID</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="hidden" id="id" name="id" class="form-control" readonly>
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
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="position" class=" form-control-label">Position</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="position" name="position" class="form-control" required>
                    </div>
                </div>                
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="info" class=" form-control-label">Information</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <textarea name="info" id="info" rows="6" class="form-control" required></textarea>
                     </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="status" class=" form-control-label">Status</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="checkbox" name="status" value="show" /> Show this info                            
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="file-input" class=" form-control-label">Image</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="file" id="image" name="image" class="form-control-file" required>
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

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">New Team</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('/websetup/public/AdminPageTeam/storeTeam');?>" name="add-team" id="add-team" method="post" accept-charset="utf-8" class="form-horizontal">
            <div class="modal-body">         
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="name" class=" form-control-label">Name</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                </div>   
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="position" class=" form-control-label">Position</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="position" name="position" class="form-control" required>
                    </div>
                </div>                
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="info" class=" form-control-label">Information</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <textarea name="info" id="info" rows="6" class="form-control" required></textarea>
                     </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="status" class=" form-control-label">Status</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="checkbox" name="status" value="show" /> Show this info                            
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="file-input" class=" form-control-label">Image</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="file" id="image" name="image" class="form-control-file" size="100000" accept="image/*" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" id="send_form" class="btn btn-primary">Add</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Delete ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('/websetup/public/AdminPageTeam/deleteTeam');?>" name="delete-team" id="delete-team" method="post" accept-charset="utf-8" class="form-horizontal" enctype="multipart/form-data">
            <div class="modal-body">    
                <h4>Details</h4>   
                <br>                
                <input type="hidden" id="delete_id" name="delete_id" class="form-control"> 
                Name: <input type="text" id="delete_name" name="delete_name" readonly><br>                
                Position: <input type="text" id="delete_position" name="delete_position" readonly><br>
                
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" id="send_form" class="btn btn-danger">Delete</button>
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
    $('table #editButton').on('click', function(event){
        $('#editModal').modal();

            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();

        console.log(data);

        $('#id').val(data[0]);
        $('#name').val(data[1]);
        $('#position').val(data[2]);
        $('#info').val(data[3]);
        $('#status').val(data[4]);
        $('#image').val(data[5]);
    });
});
</script>

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
        $('#delete_position').val(data[2]);
    });
});
</script>