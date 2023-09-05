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
                            <strong>Menu</strong> Bar
                            <div class="float-right">
                                <button class="au-btn au-btn-icon au-btn--green au-btn--small" data-target="#addModal" data-toggle="modal">
                                    <i class="fa solid fa-plus"></i>
                                </button>
                            </div>                                  
                        </div>
                        <div class="card-body card-block">
                            <div class="table-responsive table-responsive-data2">
                                <table id="tableMenu" class="table table-data2">
                                    <thead>
                                        <tr>
                                            <th style="display:none;">ID</th>
                                            <th>Menu Name</th>                                            
                                            <th style="display:none;">URL Name</th>
                                            <th>URL</th>
                                            <th style="display:none;">Status</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if($menu):foreach($menu as $parentmenu): ?>
                                        <tr class="tr-shadow">
                                            <td style="display:none;"><?php echo $parentmenu['id'];?></td>
                                            <td><?php echo $parentmenu['name'];?></td>
                                            <td style="display:none;"><?php echo $parentmenu['url_name'];?></td>  
                                            <td><a href="<?php echo $parentmenu['url'];?>"><?php echo $parentmenu['url'];?></td>                                            
                                            <td style="display:none;"><?php echo $parentmenu['status'];?></td>
                                            <td>
                                                <?php if($parentmenu['status'] == 'Enable'){
                                                    echo '<p class="badge badge-pill badge-success">Enable</p>';                                                    
                                                } else {
                                                    echo '<p class="badge badge-pill badge-danger">Disable</p>';
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

<!-- MODALS -->
<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">New Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('/websetup/public/AdminPageHeader/storeMenu');?>" name="add-menu" id="add-menu" method="post" accept-charset="utf-8" class="form-horizontal" >
            <div class="modal-body">         
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="name" class=" form-control-label">Menu Name</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                </div> 
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="url_name" class=" form-control-label">Url</label>
                    </div>
                    <div class="col-12 col-md-9"> 
                    <label for="test"><?php foreach($business_infos as $info1): echo $info1['website'];endforeach;?></label>
                        <span>
                            <input type="text" id="url_name" name="url_name" style="width:350px" pattern="[a-zA-Z]{1,}" placeholder="Enter new url" required>
                        </span>
                       <small class="form-text text-muted">Only letters are accepted</small>
                    </div>
                </div>  
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="status" class=" form-control-label">Status</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <select class="selectpicker" type="text" id="status" name="status" required>
                            <option value="Enable">Enable</option>
                            <option value="Disable">Disable</option>
                        </select>
                    </div>
                </div> 
            </div>             
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" id="send_form" class="btn btn-primary" onclick="allLetter(document.add-menu.url)">Create</button>
            </div>            
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('/websetup/public/AdminPageHeader/updateMenu');?>" name="edit-menu" id="edit-menu" method="post" accept-charset="utf-8" class="form-horizontal" >
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
                        <label for="name_edit" class=" form-control-label">Menu Name</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="name_edit" name="name_edit" readonly>
                    </div>
                </div>                
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="url_edit" class="form-control-label">Url</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="url_edit" name="url_edit" style="width:350px" pattern="[a-zA-Z]{1,}" placeholder="Enter new url" readonly>
                    </div> 
                </div>  
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="status_edit" class=" form-control-label">Status</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <select class="selectpicker" type="text" id="status_edit" name="status_edit">
                            <option value="Enable">Enable</option>
                            <option value="Disable">Disable</option>
                        </select>
                    </div>
                </div>  
            </div>                
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" id="send_form" class="btn btn-primary" onclick="allLetter(document.edit-menu.url_edit)">Update</button>
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
                <h5 class="modal-title" id="deleteModalLabel">Delete Menu ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('/websetup/public/AdminPageHeader/deleteMenu');?>" name="delete-menu" id="delete-menu" method="post" accept-charset="utf-8" class="form-horizontal" enctype="multipart/form-data">
            <div class="modal-body"> 
                <h4>Details</h4>    
                <input type="hidden" id="delete_id" name="delete_id" class="form-control"> <br>
                Menu Name: <input type="text" id="delete_name" name="delete_name"  readonly><br>
                URL Name :<input type="text" id="delete_urlname" name="delete_urlname"  readonly><br>
                URL      :<input type="text" id="delete_url" name="delete_url" readonly><br>
                Status   :<input type="text" id="delete_status" name="delete_status"  readonly>
            </div>    
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
        $('#name_edit').val(data[1]);
        $('#urlname_edit').val(data[2]);
        $('#url_edit').val(data[3]);        
        $('#status_edit').val(data[4]);
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
        $('#delete_urlname').val(data[2]); 
        $('#delete_url').val(data[3]);           
        $('#delete_status').val(data[4]);    
    });
});
</script>