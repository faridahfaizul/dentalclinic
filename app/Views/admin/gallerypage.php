<?php echo view('admin/head'); ?>

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
                            <strong>Gallery</strong>
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
                                            <th>Image</th>
                                            <th>Caption</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($gallery as $gallery): ?>
                                        <tr class="tr-shadow">
                                            <td style="display:none;"><?php echo $gallery['id'];?></td>
                                            <td style="width: 20%; height: 10%;">
                                                <?php echo '<img src="data:image;base64, '.base64_encode($gallery['image']).'">';?>
                                            </td>
                                            <td><?php echo $gallery['caption'];?></td>
                                            <td>
                                                <?php if($gallery['status'] == 'show'){
                                                    echo '<p class="badge badge-pill badge-success">Show</p>';                                                    
                                                } else {
                                                    echo '<p class="badge badge-pill badge-danger">Hidden</p>';
                                                }?>
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
<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModal">New Gallery</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('/AdminPageGallery/storeGallery');?>" name="add-gallery" id="add-gallery" method="post" accept-charset="utf-8" class="form-horizontal" >
            <div class="modal-body">    
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="caption" class=" form-control-label">Caption</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="caption" name="caption" class="form-control" required>
                    </div>
                </div>                  
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="status" class=" form-control-label">Status</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="checkbox" name="status" value="show" /> Show in gallery                            
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
                <button type="submit" id="send_form" class="btn btn-primary">Create</button>
            </div>            
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editGalleryModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editGalleryModal">Edit Gallery</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('/AdminPageGallery/updateGallery');?>" name="edit-doctor" id="edit-doctor" method="post" accept-charset="utf-8" class="form-horizontal" >
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
                        <label for="edit_caption" class=" form-control-label">Caption</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="edit_caption" name="edit_caption" class="form-control" required>
                    </div>
                </div>                  
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="edit_status" class=" form-control-label">Status</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="checkbox" name="edit_status" value="show" /> Show in gallery                            
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="file-input" class=" form-control-label">Image</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="file" id="edit_image" name="edit_image" class="form-control-file" size="100000" accept="image/*" required>
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
<div class="modal fade" id="deleteDoctorModal" tabindex="-1" role="dialog" aria-labelledby="deleteGalleryModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteGalleryModal">Delete Gallery ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('/AdminPageGallery/deleteGallery');?>" name="delete-doctor" id="delete-doctor" method="post" accept-charset="utf-8" class="form-horizontal" >
            <div class="modal-body">    
            <h4>Details</h4>               
            <br>  
            <input type="hidden" id="delete_id" name="delete_id" class="form-control"> 
            Caption: <input type="text" id="delete_caption" name="delete_caption" readonly>
                
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
        $('#editModal').modal();

            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();

        console.log(data);

        $('#edit_id').val(data[0]);     
        $('#edit_caption').val(data[2]);       
        $('#edit_status').val(data[3]);  
        $('#edit_image').val(data[1]);    
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
        $('#delete_caption').val(data[2]);    
    });
});
</script>
