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
                            <strong>Contact</strong> Us
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
                                            <th>Address</th>
                                            <th style="display:none;">Address 1</th>
                                            <th style="display:none;">Address 2</th>
                                            <th style="display:none;">Postal Code</th>
                                            <th style="display:none;">City</th>
                                            <th style="display:none;">State</th>
                                            <th>Contact</th>
                                            <th>Email</th>
                                            <th>Display</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if($contact):foreach($contact as $contact): ?>
                                        <tr class="tr-shadow">
                                            <td style="display:none;"><?php echo $contact['id'];?></td>
                                            <td><?php echo $contact['address1'];?>, <?php echo $contact['address2'];?>, <?php echo $contact['postal_code'];?>, <?php echo $contact['city'];?>, <?php echo $contact['state'];?></td>
                                            <td style="display:none;"><?php echo $contact['address1'];?></td>
                                            <td style="display:none;"><?php echo $contact['address2'];?></td>
                                            <td style="display:none;"><?php echo $contact['postal_code'];?></td>
                                            <td style="display:none;"><?php echo $contact['city'];?></td>
                                            <td style="display:none;"><?php echo $contact['state'];?></td>
                                            <td><?php echo $contact['contact'];?></td>
                                            <td><?php echo $contact['email'];?></td>
                                            <td>
                                                <?php if($contact['status'] == 'show'){
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
                        <p>Copyright © 2018 Colorlib. All rights reserved.</p></div>
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
                <h5 class="modal-title" id="editModalLabel">Edit Info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('AdminPageContact/updateContact');?>" name="edit-contact" id="edit-contact" method="post" accept-charset="utf-8" class="form-horizontal">
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
                        <label for="address1" class=" form-control-label">Address 1</label>
                    </div>
                    <div class="col-12 col-md-9">                        
                        <textarea id="address1" name="address1" rows="1" class="form-control" required></textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="address2" class=" form-control-label">Address 2</label>
                    </div>
                    <div class="col-12 col-md-9">                        
                        <textarea id="address2" name="address2" rows="1" class="form-control" required></textarea>
                    </div>
                </div>   
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="postal_code" class=" form-control-label">Postal Code</label>
                    </div>
                    <div class="col-12 col-md-9">                        
                        <input type="text" name="postal_code" id="postal_code" class="form-control" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="city" class=" form-control-label">City</label>
                    </div>
                    <div class="col-12 col-md-9">                        
                        <input type="text" name="city" id="city" class="form-control" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="state" class=" form-control-label">State</label>
                    </div>
                    <div class="col-12 col-md-9">                        
                        <input type="text" name="state" id="state" class="form-control" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="contact" class=" form-control-label">Phone Number</label>
                    </div>
                    <div class="col-12 col-md-9">                        
                        <input type="text" name="contact" id="contact" class="form-control" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="email" class=" form-control-label">Email</label>
                    </div>
                    <div class="col-12 col-md-9">                        
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                </div>                       
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="status" class=" form-control-label"></label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="checkbox" name="status" value="show" /> Show this link                            
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
                <h5 class="modal-title" id="addModalLabel">Add Info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('AdminPageContact/storeContact');?>" name="add-contact" id="add-contact" method="post" accept-charset="utf-8" class="form-horizontal">
            <div class="modal-body">             
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="address1" class=" form-control-label">Address 1</label>
                    </div>
                    <div class="col-12 col-md-9">                        
                        <textarea id="address1" name="address1" rows="1" class="form-control" required></textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="address2" class=" form-control-label">Address 2</label>
                    </div>
                    <div class="col-12 col-md-9">                        
                        <textarea id="address2" name="address2" rows="1" class="form-control" required></textarea>
                    </div>
                </div>   
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="postal_code" class=" form-control-label">Postal Code</label>
                    </div>
                    <div class="col-12 col-md-9">                        
                        <input type="text" name="postal_code" id="postal_code" class="form-control" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="city" class=" form-control-label">City</label>
                    </div>
                    <div class="col-12 col-md-9">                        
                        <input type="text" name="city" id="city" class="form-control" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="state" class=" form-control-label">State</label>
                    </div>
                    <div class="col-12 col-md-9">                        
                        <input type="text" name="state" id="state" class="form-control" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="contact" class=" form-control-label">Phone Number</label>
                    </div>
                    <div class="col-12 col-md-9">                        
                        <input type="text" name="contact" id="contact" class="form-control" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="email" class=" form-control-label">Email</label>
                    </div>
                    <div class="col-12 col-md-9">                        
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                </div>                       
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="status" class=" form-control-label"></label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="checkbox" name="status" value="show" /> Show this link                            
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
                <h5 class="modal-title" id="deleteModalLabel">Delete Info ? </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('AdminPageContact/deleteContact');?>" name="delete-contact" id="delete-contact" method="post" accept-charset="utf-8" class="form-horizontal">
            <div class="modal-body"> 
                <h4>Details</h4>   
                <br>                  
                <input type="hidden" id="delete_id" name="delete_id" class="form-control"> 
                Address: <input type="text" id="delete_address" name="delete_address"  style="width:500px" readonly><br>
                Phone Number: <input type="text" id="delete_contact" name="delete_contact"  readonly><br>
                Email: <input type="text" id="delete_email" name="delete_email"  readonly>
                
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" id="send_form" class="btn btn-primary">Delete</button>
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
        $('#address1').val(data[2]);       
        $('#address2').val(data[3]);
        $('#postal_code').val(data[4]);         
        $('#city').val(data[5]);         
        $('#state').val(data[6]);         
        $('#contact').val(data[7]);         
        $('#email').val(data[8]);         
        $('#status').val(data[9]);
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
        $('#delete_address').val(data[1]);
        $('#delete_contact').val(data[7]);
        $('#delete_email').val(data[8]); 
    });
});
</script>