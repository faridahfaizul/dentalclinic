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
                            <strong>Details</strong>                                 
                        </div>
                        <form action="<?php echo base_url('/websetup/public/AdminPageQuestionnaire/updateTerms');?>" name="edit-terms" id="edit-terms" method="post" accept-charset="utf-8" class="form-horizontal">
                            <div class="card-body card-block">
                            <?php if($terms):foreach($terms as $terms): ?>                                
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="topic" class="form-control-label">Topic</label>
                                    </div>
                                    <div class="col-12 col-md-9"> 
                                        <input type="text" id="topic" name="topic" class="form-control" value="<?php echo $terms['topic']; ?>" required>
                                    </div> 
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="description" class="form-control-label">Description</label>
                                    </div>
                                    <div class="col-12 col-md-9">                                        
                                        <textarea id="description" name="description" rows="5" class="form-control" required><?php echo $terms['description']; ?></textarea>
                                    </div> 
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="terms" class="form-control-label">Terms</label>
                                    </div>
                                    <div class="col-12 col-md-9">                                        
                                        <textarea id="terms" name="terms" rows="5" class="form-control" required><?php echo $terms['terms']; ?></textarea>
                                    </div> 
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" id="send_form" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Update 
                                </button>
                            </div>                               
                            <?php endforeach; endif; ?>
                        </form>
                    </div>
                </div>   
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Questions</strong> 
                            <div class="float-right">
                                <button class="au-btn au-btn-icon au-btn--green au-btn--small" id="add">
                                <!--<button class="au-btn au-btn-icon au-btn--green au-btn--small" data-target="addModal" data-toggle="modal">-->
                                    <i class="fa solid fa-plus"></i>
                                </button>
                            </div>                                 
                        </div>
                        <div class="card-body card-block">
                            <div class="table-responsive table-responsive-data2">
                                <table id="tableQuestion" class="table table-data2">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Question</th>
                                            <th>Answer</th>
                                            <th>Points</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>                            
                                        <?php if ($question): foreach($question as $ques): ?>
                                        <tr class="tr-shadow">
                                            <td><?php echo $ques['id'];?></td>
                                            <td><?php echo $ques['question'];?></td>
                                            <td><?php echo $ques['answer'];?></td>
                                            <td><?php echo $ques['point'];?></td>
                                            <td><div class="table-data-feature">
                                                <button type="button" name="editButton" id="<?php $ques['id'];?>" class="item editButton" data-toggle="tooltip" data-placement="top" title="Edit">
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
<!-- Add Modal -->
<div id="add_dynamic_field_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <form action="<?php echo base_url('/websetup/public/AdminPageQuestionnaire/storeQuestion');?>" name="add-question" id="add-question" method="post" accept-charset="utf-8" class="form-horizontal">           
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add Question</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">               
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="question" class=" form-control-label">Question</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <textarea id="question" name="question" rows="2" class="form-control" required></textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="choice" class=" form-control-label">Answer Choice</label>
                    </div>
                    <div class="col-12 col-md-9">  
                        <div class="table-responsive">
                            <table class="table" id="dynamic_field"></table>
                        </div>
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

<!-- Edit Modal -->
<div id="edit_dynamic_field_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <form action="<?php echo base_url('/websetup/public/AdminPageQuestionnaire/updateQuestion');?>" name="edit-question" id="edit-question" method="post" accept-charset="utf-8" class="form-horizontal">           
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Question</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">   
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="id" class="form-control-label">Number</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="id" name="id" readonly>
                    </div>
                </div>             
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="question" class=" form-control-label">Question</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <textarea id="edit_question" name="edit_question" rows="2" class="form-control" required></textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="choice" class=" form-control-label">Answer Choice</label>
                    </div>
                    <div class="col-12 col-md-9">  
                        <div class="table-responsive">
                            <table class="table" id="dynamic_edit_field"></table>
                        </div>
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
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Delete ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('/websetup/public/AdminPageQuestionnaire/deleteQuestion');?>" name="delete-question" id="delete-question" method="post" accept-charset="utf-8" class="form-horizontal">
            <div class="modal-body">    
                <h4>Details</h4>   
                <br>                
                <input type="hidden" id="delete_id" name="delete_id" class="form-control"> 
                Question:  <textarea id="delete_question" name="delete_question" rows="2" class="form-control" readonly></textarea>                
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
    $('table #deleteButton').on('click', function(event){
        $('#deleteModal').modal();

            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();

        console.log(data);

        $('#delete_id').val(data[0]);
        $('#delete_question').val(data[1]);
    });
});
</script>

<script>
$('document').ready(function(){
    
    var count = 1;

    function add_dynamic_input_field(count) {
        var button = '';
        if(count > 1) {
            button = '<button type="button" name="remove" id="'+count+'" class="btn btn-danger btn_remove"><i class="fas fa-times"></i></button>';
        } else {
            button = '<button type="button" name="add_more" id="add_more" class="btn btn-success btn_add"><i class="fa solid fa-plus"></i></button>';
        }
        
        output = '<tr id="row'+count+'">';
        output += '<td><textarea name="answer[]" rows="1" placeholder="Answer" class="form-control name_list" required></textarea></td><td><input type="text" name="point[]" placeholder="Point" class="form-control name_list" required /></td>';
        output += '<td align="center">'+button+'</td></tr>';
        $('#dynamic_field').append(output);
    }

    
    $('#add').on('click', function(event){
        $('#dynamic_field').html('');
        add_dynamic_input_field(1);
        $('#add-question')[0].reset();
        $('#add_dynamic_field_modal').modal();  
    });   

   $(document).on('click', '.btn_add', function(){  
        count = count + 1;
        add_dynamic_input_field(count);  
    });

    $(document).on('click', '.btn_remove', function(){  
        var button_id = $(this).attr("id");   
        $('#row'+button_id+'').remove();  
    });   
      
    $(document).on('click', '.editButton', function(){
        $('#dynamic_edit_field').html('');
        $('#edit_dynamic_field_modal').modal();

        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();

        console.log(data);
        var id = data[0];
        var question = data[1];
        var getanswer = data[2];
        var getpoint = data[3];
        $('#id').val(id);
        $('#edit_question').val(question);
        var answer_array = getanswer.split(",");
        var point_array = getpoint.split(",");

        // Display array values on page  
        var count = 1;
        var button = '';     
        for(var i = 0; i < answer_array.length; i++){    
            if(i == 0){
                button = '<button type="button" name="add_more" id="add_more" class="btn btn-success btn_addedit"><i class="fa solid fa-plus"></i></button>';
            } else {
                button = '<button type="button" name="remove" id="'+count+'" class="btn btn-danger btn_remove"><i class="fas fa-times"></i></button>';
            }           
            output = '<tr id="row'+count+'">';
            output += '<td><textarea id="answer" name="answer[]" rows="1" placeholder="Answer" class="form-control name_list" required>'+ answer_array[i] +'</textarea></td><td><input type="text" name="point[]" placeholder="Point" class="form-control name_list" value="' + point_array[i] + '"required></td>';
            output += '<td allign="center">'+button+'</td></tr>';            
            $('#dynamic_edit_field').append(output);  
            count++;          
        }
    });

    $(document).on('click', '.btn_addedit', function(count){  
        count++;
        var button = '<button type="button" name="remove" id="'+count+'" class="btn btn-danger btn_remove"><i class="fas fa-times"></i></button>';
        output = '<tr id="row'+count+'">';
        output += '<td><textarea id="answer" name="answer[]" rows="1" placeholder="Answer" class="form-control name_list" required></textarea></td><td><input type="text" name="point[]" placeholder="Point" class="form-control name_list" required></td>';
        output += '<td allign="center">'+button+'</td></tr>';
        count++;
        $('#dynamic_edit_field').append(output); 
    });
});
</script>
