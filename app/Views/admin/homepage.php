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
                            <strong>Slider</strong> Details
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
                                            <th>Topic</th>
                                            <th style="display:none;">Description</th>
                                            <th>Link</th>
                                            <th>Image</th>
                                            <th>Show</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if($slider):foreach($slider as $slider): ?>
                                        <tr class="tr-shadow">
                                            <td style="display:none;"><?php echo $slider['id'];?></td>
                                            <td><?php echo $slider['topic'];?></td>
                                            <td style="display:none;"><?php echo $slider['description'];?></td>
                                            <td><a href="<?php echo $slider['link'];?>"><?php echo $slider['link'];?></td>
                                            <td style="width: 20%; height: auto;">
                                                <?php echo '<img src="data:image;base64, '.base64_encode($slider['image']).'">';?>
                                            </td>
                                            <td>
                                                <?php if($slider['showCheck'] == 'show'){
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

<?php
    echo view('admin/foot');
?>

 <!-- MODALS -->
<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Slide</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('/websetup/public/AdminPageHome/updateSlider');?>" name="edit-slider" id="edit-slider" method="post" accept-charset="utf-8" class="form-horizontal">
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
                        <label for="topic" class=" form-control-label">Topic</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="topic" name="topic" class="form-control" required>
                    </div>
                </div>                
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="description" class=" form-control-label">Description</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <textarea name="description" id="description" rows="6" class="form-control" required></textarea>
                     </div>
                </div>   
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="link" class=" form-control-label">Link</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="link" name="link" class="form-control" required>
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
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="showCheck" class=" form-control-label"></label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="checkbox" name="showCheck" value="show" /> Show this link                            
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
                <h5 class="modal-title" id="addModalLabel">New Slide</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('/websetup/public/AdminPageHome/storeSlider');?>" name="add-slider" id="add-slider" method="post" accept-charset="utf-8" class="form-horizontal">
            <div class="modal-body">         
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="topic" class=" form-control-label">Topic</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="topic" name="topic" class="form-control" required>
                    </div>
                </div>                
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="description" class=" form-control-label">Description</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <textarea name="description" id="description" rows="6" class="form-control" required></textarea>
                     </div>
                </div>   
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="link" class=" form-control-label">Link</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="link" name="link" class="form-control" required>
                        <small class="form-text text-muted">Please include http://</small>
                    </div>
                </div>        
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="file-input" class=" form-control-label">Image</label>
                    </div>
                    <div class="col-12 col-md-9">          
                        <input type="file" id="image" name="image" class="form-control-file" size="100000" accept="image/*" required>
                        <!--<img src="image" class="img-thumbnail">-->
                    </div>
                </div>                
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="showCheck" class=" form-control-label"></label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="checkbox" name="showCheck" value="show" /> Show this link                            
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

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Delete Slide ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('/websetup/public/AdminPageHome/deleteSlider');?>" name="delete-slider" id="delete-slider" method="post" accept-charset="utf-8" class="form-horizontal" enctype="multipart/form-data">
            <div class="modal-body">    
                <h4>Details</h4>        
                <input type="hidden" id="delete_id" name="delete_id" class="form-control"> 
                Topic: <input type="text" id="delete_topic" name="delete_topic" readonly><br>
                Description: <textarea name="description" id="delete_description" rows="1" readonly></textarea><br>
                Link: <input type="text" id="delete_link" name="delete_link" readonly>
                
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" id="send_form" class="btn btn-danger">Delete</button>
            </div>
            </form>
        </div>
    </div>
</div>

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
        $('#topic').val(data[1]);
        $('#description').val(data[2]);
        $('#link').val(data[3]);
        $('#image').val(data[4]);
        $('#showCheck').val(data[5]);
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
        $('#delete_topic').val(data[1]);
        $('#delete_description').val(data[2]);
        $('#delete_link').val(data[3]);
    });
});
</script>