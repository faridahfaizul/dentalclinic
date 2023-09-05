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
                        <strong>Appointments</strong>
                            <div class="float-right">
                                <button class="au-btn au-btn-icon au-btn--green au-btn--small" data-target="#addModal" data-toggle="modal">
                                    <i class="fa solid fa-plus"></i>
                                </button>
                            </div>                                   
                        </div>
                        <div class="card-body card-block">
                            <!-- Tab for each appointment category -->
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="custom-nav-pending-tab" data-toggle="tab" href="#custom-nav-pending" role="tab" aria-controls="custom-nav-pending" aria-selected="true">Pending</a>
                                    <a class="nav-item nav-link" id="custom-nav-schedule-tab" data-toggle="tab" href="#custom-nav-schedule" role="tab" aria-controls="custom-nav-schedule" aria-selected="false">Scheduled</a>                                    
                                    <a class="nav-item nav-link" id="custom-nav-complete-tab" data-toggle="tab" href="#custom-nav-complete" role="tab" aria-controls="custom-nav-complete" aria-selected="false">Completed</a>                                    
                                    <a class="nav-item nav-link" id="custom-nav-cancel-tab" data-toggle="tab" href="#custom-nav-cancel" role="tab" aria-controls="custom-nav-cancel" aria-selected="false">Cancelled</a></div>
                                </div>
                            </nav>

                            <!-- Pending -->
                            <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="custom-nav-pending" role="tabpanel" aria-labelledby="custom-nav-pending-tab">
                                    <div class="table-responsive table-responsive-data2">
                                        <table is="tablePending" class="table table-data2">
                                            <thead>
                                                <tr>
                                                    <th style="display:none;">ID</th>
                                                    <th>Name</th>
                                                    <th>I/C Number</th>
                                                    <th style="display:none;">Contact Number</th>
                                                    <th style="display:none;">Email</th>
                                                    <th style="display:none;">Service ID</th>
                                                    <th>Service</th>  
                                                    <th>Date</th>                                                  
                                                    <th style="display:none;">Time ID</th>
                                                    <th>Time</th>
                                                    <th style="display:none;">Doctor ID</th>
                                                    <th style="display:none;">Doctor</th>
                                                    <th style="display:none;">Nurse ID</th>
                                                    <th style="display:none;">Nurse</th>
                                                    <th style="display:none;">Assessment Score</th>
                                                    <th style="display:none;">Notes</th>
                                                    <th style="display:none;">Status</th>
                                                    <th style="display:none;">Booked on</th>  
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php if($appointment):foreach($appointment as $pending): if($pending['status'] == 'Pending'): ?>
                                                <tr class="tr-shadow">
                                                    <td style="display:none;"><?php echo $pending['id'];?></td>
                                                    <td><?php echo $pending['name'];?></td>
                                                    <td><?php echo $pending['identity'];?></td>
                                                    <td style="display:none;"><?php echo $pending['phone'];?></td>
                                                    <td style="display:none;"><?php echo $pending['email'];?></td>
                                                    <td style="display:none;"><?php echo $pending['service'];?></td>
                                                    <td><?php foreach($services as $serv): if($serv['id'] == $pending['service']):echo $serv['name']; endif; endforeach;?></td>                                                    
                                                    <td><?php echo $pending['date'];?></td>
                                                    <td style="display:none;"><?php echo $pending['time'];?></td>
                                                    <td><?php foreach($hour as $hr): if($hr['id'] == $pending['time']):echo $hr['time']; endif; endforeach;?></td>
                                                    <td style="display:none;"><?php echo $pending['doctor'];?></td>
                                                    <td style="display:none;"><?php foreach($doctors as $doc): if($doc['id'] == $pending['doctor']):echo $doc['name']; endif; endforeach;?></td>
                                                    <td style="display:none;"><?php echo $pending['nurse'];?></td>
                                                    <td style="display:none;"><?php foreach($nurses as $nurs): if($nurs['id'] == $pending['nurse']):echo $nurs['name']; endif; endforeach;?></td>
                                                    <td style="display:none;"><?php echo $pending['score'];?></td>
                                                    <td style="display:none;"><?php echo $pending['notes'];?></td>
                                                    <td style="display:none;"><?php echo $pending['status'];?></td>
                                                    <td style="display:none;"><?php echo $pending['created_at'];?></td>
                                                    <td><div class="table-data-feature">
                                                        <button class="item" id="editButton" data-toggle="tooltip" data-placement="top" title="Respond">
                                                            <i class="fa fa-clipboard-list"></i>
                                                        </button>
                                                        <button class="item" id="deleteButton" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                    </div></td>
                                                </tr>
                                            <?php endif; endforeach; endif; ?>
                                            </tbody>
                                        </table>
                                    </div>  
                                </div>
                                <!-- Scheduled -->
                                <div class="tab-pane fade" id="custom-nav-schedule" role="tabpanel" aria-labelledby="custom-nav-schedule-tab">
                                    <div class="table-responsive table-responsive-data2">
                                        <table is="tableSchedule" class="table table-data2">
                                            <thead>
                                                <tr>
                                                    <th style="display:none;">ID</th>
                                                    <th>Name</th>
                                                    <th>I/C Number</th>
                                                    <th style="display:none;">Contact Number</th>
                                                    <th style="display:none;">Email</th>
                                                    <th style="display:none;">Service ID</th>
                                                    <th>Service</th>  
                                                    <th>Date</th>                                                  
                                                    <th style="display:none;">Time ID</th>
                                                    <th>Time</th>
                                                    <th style="display:none;">Doctor ID</th>
                                                    <th style="display:none;">Doctor</th>
                                                    <th style="display:none;">Nurse ID</th>
                                                    <th style="display:none;">Nurse</th>
                                                    <th style="display:none;">Assessment Score</th>
                                                    <th style="display:none;">Notes</th>
                                                    <th style="display:none;">Status</th>
                                                    <th style="display:none;">Booked on</th>  
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php if($appointment):foreach($appointment as $scheduled): if($scheduled['status'] == 'Scheduled'): ?>
                                                <tr class="tr-shadow">
                                                    <td style="display:none;"><?php echo $scheduled['id'];?></td>
                                                    <td><?php echo $scheduled['name'];?></td>
                                                    <td><?php echo $scheduled['identity'];?></td>
                                                    <td style="display:none;"><?php echo $scheduled['phone'];?></td>
                                                    <td style="display:none;"><?php echo $scheduled['email'];?></td>
                                                    <td style="display:none;"><?php echo $scheduled['service'];?></td>
                                                    <td><?php foreach($services as $serv): if($serv['id'] == $scheduled['service']):echo $serv['name']; endif; endforeach;?></td>                                                    
                                                    <td><?php echo $scheduled['date'];?></td>
                                                    <td style="display:none;"><?php echo $scheduled['time'];?></td>
                                                    <td><?php foreach($hour as $hr): if($hr['id'] == $scheduled['time']):echo $hr['time']; endif; endforeach;?></td>
                                                    <td style="display:none;"><?php echo $scheduled['doctor'];?></td>
                                                    <td style="display:none;"><?php foreach($doctors as $doc): if($doc['id'] == $scheduled['doctor']):echo $doc['name']; endif; endforeach;?></td>
                                                    <td style="display:none;"><?php echo $scheduled['nurse'];?></td>
                                                    <td style="display:none;"><?php foreach($nurses as $nurs): if($nurs['id'] == $scheduled['nurse']):echo $nurs['name']; endif; endforeach;?></td>
                                                    <td style="display:none;"><?php echo $scheduled['score'];?></td>
                                                    <td style="display:none;"><?php echo $scheduled['notes'];?></td>
                                                    <td style="display:none;"><?php echo $scheduled['status'];?></td>
                                                    <td style="display:none;"><?php echo $scheduled['created_at'];?></td>
                                                    <td><div class="table-data-feature">
                                                    <button class="item" id="editButton" data-toggle="tooltip" data-placement="top" title="Details">
                                                            <i class="fa fa-clipboard-list"></i>
                                                        </button>
                                                    <button class="item" id="completeButton" data-toggle="tooltip" data-placement="top" title="Complete">
                                                            <i class="fas fa-calendar-check"></i>
                                                        </button>
                                                        <button class="item" id="cancelledButton" data-toggle="tooltip" data-placement="top" title="Cancel">
                                                            <i class="fas fa-calendar-times"></i>
                                                        </button>
                                                        <button class="item" id="deleteButton" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                    </div></td>
                                                </tr>
                                            <?php endif; endforeach; endif; ?>
                                            </tbody>
                                        </table>
                                    </div>  
                                </div>
                                <!-- Completed -->
                                <div class="tab-pane fade" id="custom-nav-complete" role="tabpanel" aria-labelledby="custom-nav-complete-tab">
                                    <div class="table-responsive table-responsive-data2">
                                        <table is="tableComplete" class="table table-data2">
                                            <thead>
                                                <tr>
                                                    <th style="display:none;">ID</th>
                                                    <th>Name</th>
                                                    <th>I/C Number</th>
                                                    <th style="display:none;">Contact Number</th>
                                                    <th style="display:none;">Email</th>
                                                    <th style="display:none;">Service ID</th>
                                                    <th>Service</th>  
                                                    <th>Date</th>                                                  
                                                    <th style="display:none;">Time ID</th>
                                                    <th>Time</th>
                                                    <th style="display:none;">Doctor ID</th>
                                                    <th style="display:none;">Doctor</th>
                                                    <th style="display:none;">Nurse ID</th>
                                                    <th style="display:none;">Nurse</th>
                                                    <th style="display:none;">Assessment Score</th>
                                                    <th style="display:none;">Notes</th>
                                                    <th style="display:none;">Status</th>
                                                    <th style="display:none;">Booked on</th>  
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php if($appointment):foreach($appointment as $complete): if($complete['status'] == 'Complete'): ?>
                                                <tr class="tr-shadow">
                                                    <td style="display:none;"><?php echo $complete['id'];?></td>
                                                    <td><?php echo $complete['name'];?></td>
                                                    <td><?php echo $complete['identity'];?></td>
                                                    <td style="display:none;"><?php echo $complete['phone'];?></td>
                                                    <td style="display:none;"><?php echo $complete['email'];?></td>
                                                    <td style="display:none;"><?php echo $complete['service'];?></td>
                                                    <td><?php foreach($services as $serv): if($serv['id'] == $complete['service']):echo $serv['name']; endif; endforeach;?></td>                                                    
                                                    <td><?php echo $complete['date'];?></td>
                                                    <td style="display:none;"><?php echo $complete['time'];?></td>
                                                    <td><?php foreach($hour as $hr): if($hr['id'] == $complete['time']):echo $hr['time']; endif; endforeach;?></td>
                                                    <td style="display:none;"><?php echo $complete['doctor'];?></td>
                                                    <td style="display:none;"><?php foreach($doctors as $doc): if($doc['id'] == $complete['doctor']):echo $doc['name']; endif; endforeach;?></td>
                                                    <td style="display:none;"><?php echo $complete['nurse'];?></td>
                                                    <td style="display:none;"><?php foreach($nurses as $nurs): if($nurs['id'] == $complete['nurse']):echo $nurs['name']; endif; endforeach;?></td>
                                                    <td style="display:none;"><?php echo $complete['score'];?></td>
                                                    <td style="display:none;"><?php echo $complete['notes'];?></td>
                                                    <td style="display:none;"><?php echo $complete['status'];?></td>
                                                    <td style="display:none;"><?php echo $complete['created_at'];?></td>
                                                    <td><div class="table-data-feature">
                                                        <button class="item" id="viewButton" data-toggle="tooltip" data-placement="top" title="Details">
                                                            <i class="fas fa-info"></i>
                                                        </button>
                                                    </div></td>
                                                </tr>
                                            <?php endif; endforeach; endif; ?>
                                            </tbody>
                                        </table>
                                    </div>  
                                </div>
                                <!-- Cancelled -->
                                <div class="tab-pane fade" id="custom-nav-cancel" role="tabpanel" aria-labelledby="custom-nav-cancel-tab">
                                    <div class="table-responsive table-responsive-data2">
                                        <table is="tableCancel" class="table table-data2">
                                            <thead>
                                                <tr>
                                                    <th style="display:none;">ID</th>
                                                    <th>Name</th>
                                                    <th>I/C Number</th>
                                                    <th style="display:none;">Contact Number</th>
                                                    <th style="display:none;">Email</th>
                                                    <th style="display:none;">Service ID</th>
                                                    <th>Service</th>  
                                                    <th>Date</th>                                                  
                                                    <th style="display:none;">Time ID</th>
                                                    <th>Time</th>
                                                    <th style="display:none;">Doctor ID</th>
                                                    <th style="display:none;">Doctor</th>
                                                    <th style="display:none;">Nurse ID</th>
                                                    <th style="display:none;">Nurse</th>
                                                    <th style="display:none;">Assessment Score</th>
                                                    <th style="display:none;">Notes</th>
                                                    <th style="display:none;">Status</th>
                                                    <th style="display:none;">Booked on</th>  
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php if($appointment):foreach($appointment as $cancel): if($cancel['status'] == 'Cancelled'): ?>
                                                <tr class="tr-shadow">
                                                    <td style="display:none;"><?php echo $cancel['id'];?></td>
                                                    <td><?php echo $cancel['name'];?></td>
                                                    <td><?php echo $cancel['identity'];?></td>
                                                    <td style="display:none;"><?php echo $cancel['phone'];?></td>
                                                    <td style="display:none;"><?php echo $cancel['email'];?></td>
                                                    <td style="display:none;"><?php echo $cancel['service'];?></td>
                                                    <td><?php foreach($services as $serv): if($serv['id'] == $cancel['service']):echo $serv['name']; endif; endforeach;?></td>                                                    
                                                    <td><?php echo $cancel['date'];?></td>
                                                    <td style="display:none;"><?php echo $cancel['time'];?></td>
                                                    <td><?php foreach($hour as $hr): if($hr['id'] == $cancel['time']):echo $hr['time']; endif; endforeach;?></td>
                                                    <td style="display:none;"><?php echo $cancel['doctor'];?></td>
                                                    <td style="display:none;"><?php foreach($doctors as $doc): if($doc['id'] == $cancel['doctor']):echo $doc['name']; endif; endforeach;?></td>
                                                    <td style="display:none;"><?php echo $cancel['nurse'];?></td>
                                                    <td style="display:none;"><?php foreach($nurses as $nurs): if($nurs['id'] == $cancel['nurse']):echo $nurs['name']; endif; endforeach;?></td>
                                                    <td style="display:none;"><?php echo $cancel['score'];?></td>
                                                    <td style="display:none;"><?php echo $cancel['notes'];?></td>
                                                    <td style="display:none;"><?php echo $cancel['status'];?></td>
                                                    <td style="display:none;"><?php echo $cancel['created_at'];?></td>
                                                    <td><div class="table-data-feature">
                                                        <button class="item" id="viewButton" data-toggle="tooltip" data-placement="top" title="Details">
                                                            <i class="fas fa-info"></i>
                                                        </button>
                                                    </div></td>
                                                </tr>
                                            <?php endif; endforeach; endif; ?>
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
                <h5 class="modal-title" id="editModalLabel">Edit Appointment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('/AdminPageAppointment/updateApp');?>" name="edit-appointment" id="edit-appointment" method="post" accept-charset="utf-8" class="form-horizontal">
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
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                </div>  
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="identity" class=" form-control-label">I/C Number</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="identity" name="identity" class="form-control" required>
                    </div>
                </div>                 
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="phone" class=" form-control-label">Contact Number</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="phone" name="phone" class="form-control" required>
                    </div>
                </div> 
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="email" class=" form-control-label">Email</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="email" id="email" name="email" class="form-control">
                    </div>
                </div>   
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="services" class=" form-control-label">Service</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <select id="services" class="form-control" name="services" required>                                                    
                            <option disabled selected value> -- Select an option -- </option>
                            <?php if($services): foreach($services as $serv): ?>
                                <option value="<?php echo $serv['id'];?>"><?php echo $serv['name'];?></option>
                            <?php  endforeach; endif;?>
                        </select>
                    </div>
                </div> 
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="date" class=" form-control-label">Date</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="date" id="date" name="date" class="form-control" required>
                    </div>
                </div> 
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="hour" class=" form-control-label">Time</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <select id="hour" class="form-control" name="hour" required>                     
                            <option disabled selected value>00:00 AM/PM</option>
                            <?php if($hour): foreach($hour as $time): ?>
                                <option value="<?php echo $time['id'];?>"><?php echo $time['time'];?></option>
                            <?php  endforeach; endif;?>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="doctor" class=" form-control-label">Doctor</label>
                    </div>
                     <div class="col-12 col-md-9">
                        <select id="doctor" class="form-control" name="doctor" required>                                                    
                            <option disabled selected value> -- Select an option -- </option>
                            <?php if($doctors): foreach($doctors as $doc): ?>
                                <option value="<?php echo $doc['id'];?>"><?php echo $doc['name'];?></option>
                            <?php  endforeach; endif;?>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="nurse" class=" form-control-label">Nurse</label>
                    </div>
                     <div class="col-12 col-md-9">
                        <select id="nurse" class="form-control" name="nurse" required>
                            <option disabled selected value> -- Select an option -- </option>
                            <?php if($nurses): foreach($nurses as $nur): ?>
                                <option value="<?php echo $nur['id'];?>"><?php echo $nur['name'];?></option>
                            <?php  endforeach; endif;?>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="score" class=" form-control-label">Assessment Score</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="score" name="score" class="form-control" readonly>
                    </div>
                </div>  
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="notes" class=" form-control-label">Additional Notes</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <textarea name="notes" id="notes" rows="3" class="form-control"></textarea>
                     </div>
                </div> 
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="status" class=" form-control-label" hidden>Status</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="hidden" id="status" name="status" value="Scheduled" readonly>
                    </div>
                </div>   
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="created" class=" form-control-label">Booked On</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="created" name="created" readonly>
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
                <h5 class="modal-title" id="addModalLabel">New Appointment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('/AdminPageAppointment/storeApp');?>" name="add-appointment" id="add-appointment" method="post" accept-charset="utf-8" class="form-horizontal">
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
                        <label for="identity" class=" form-control-label">I/C Number</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="identity" name="identity" class="form-control" required>
                    </div>
                </div>                
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="phone" class=" form-control-label">Contact Number</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="phone" name="phone" class="form-control" required>
                    </div>
                </div> 
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="email" class=" form-control-label">Email</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="email" id="email" name="email" class="form-control">
                    </div>
                </div>   
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="services" class=" form-control-label">Service</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <select id="services" class="form-control" name="services" required>
                            <option disabled selected value> -- Select an option -- </option>
                            <?php if($services): foreach($services as $serv): ?>
                                <option value="<?php echo $serv['id'];?>"><?php echo $serv['name'];?></option>
                            <?php  endforeach; endif;?>
                        </select>
                    </div>
                </div> 
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="date" class=" form-control-label">Date</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="date" id="date" name="date" class="form-control" required>
                    </div>
                </div> 
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="hour" class=" form-control-label">Time</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <select id="hour" class="form-control" name="hour" required>                     
                            <option disabled selected value>00:00 AM/PM</option>
                            <?php if($hour): foreach($hour as $time): ?>
                                <option value="<?php echo $time['id'];?>"><?php echo $time['time'];?></option>
                            <?php  endforeach; endif;?>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="doctor" class=" form-control-label">Doctor</label>
                    </div>
                     <div class="col-12 col-md-9">
                        <select id="doctor" class="form-control" name="doctor" required>
                            <option disabled selected value> -- Select an option -- </option>
                            <?php if($doctors): foreach($doctors as $doc): ?>
                                <option value="<?php echo $doc['id'];?>"><?php echo $doc['name'];?></option>
                            <?php  endforeach; endif;?>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="nurse" class=" form-control-label">Nurses</label>
                    </div>
                     <div class="col-12 col-md-9">
                        <select id="nurse" class="form-control" name="nurse" required>
                            <option disabled selected value> -- Select an option -- </option>
                            <?php if($nurses): foreach($nurses as $nur): ?>
                                <option value="<?php echo $nur['id'];?>"><?php echo $nur['name'];?></option>
                            <?php  endforeach; endif;?>
                        </select>
                    </div>
                </div> 
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="score" class=" form-control-label">Assessment Score</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="score" name="score" class="form-control" readonly>
                    </div>
                </div>  
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="notes" class=" form-control-label">Additional Notes</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <textarea name="notes" id="notes" rows="3" class="form-control"></textarea>
                     </div>
                </div> 
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="status" class=" form-control-label" hidden>Status</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="hidden" id="status" name="status" value="Scheduled" readonly>
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

<!-- Complete Modal -->
<div class="modal fade" id="completeModal" tabindex="-1" role="dialog" aria-labelledby="completeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="completeModalLabel">Complete Appointment ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('/AdminPageAppointment/completeApp');?>" name="complete-appointment" id="complete-appointment" method="post" accept-charset="utf-8" class="form-horizontal">
            <div class="modal-body">    
                <h4>Details</h4>          
                <input type="hidden" id="complete_id" name="complete_id" class="form-control"><br>
                Name: <input type="text" id="complete_name" name="complete_name" readonly><br>  
                I/C Number: <input type="text" id="complete_identity" name="complete_identity" readonly><br>  
                Contact Number: <input type="text" id="complete_phone" name="complete_phone" readonly><br>  
                Email: <input type="text" id="complete_email" name="complete_email" readonly><br>  
                Service: <input type="text" id="complete_service" name="complete_service" readonly><br>
                Date: <input type="date" id="complete_date" name="complete_date" readonly><br>
                Time: <input type="text" id="complete_time" name="complete_time" readonly><br>             
                Doctor: <input type="text" id="complete_doctor" name="complete_doctor" readonly><br>             
                Nurse: <input type="text" id="complete_nurse" name="complete_nurse" readonly><br>
                Assessment Score: <input type="text" id="complete_score" name="complete_score" readonly><br>
                Notes: <input type="text" id="complete_notes" name="complete_notes" readonly><br>             
                <input type="status" id="complete_status" name="complete_status" value="Complete" hidden>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" id="send_form" class="btn btn-success">Complete</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Cancel Modal -->
<div class="modal fade" id="cancelledModal" tabindex="-1" role="dialog" aria-labelledby="canceleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cancelModalLabel">Cancel Appointment ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('/AdminPageAppointment/cancelApp');?>" name="cancel-appointment" id="cancel-appointment" method="post" accept-charset="utf-8" class="form-horizontal">
            <div class="modal-body">    
                <h4>Details</h4>          
                <input type="hidden" id="cancelled_id" name="cancelled_id" class="form-control"><br>
                Name: <input type="text" id="cancelled_name" name="cancelled_name" readonly><br>  
                I/C Number: <input type="text" id="cancelled_identity" name="cancelled_identity" readonly><br>  
                Contact Number: <input type="text" id="cancelled_phone" name="cancelled_phone" readonly><br>  
                Email: <input type="text" id="cancelled_email" name="cancelled_email" readonly><br>  
                Service: <input type="text" id="cancelled_service" name="cancelled_service" readonly><br>
                Date: <input type="date" id="cancelled_date" name="cancelled_date" readonly><br>
                Time: <input type="text" id="cancelled_time" name="cancelled_time" readonly><br>            
                Doctor: <input type="text" id="cancelled_doctor" name="cancelled_doctor" readonly><br>             
                Nurse: <input type="text" id="cancelled_nurse" name="cancelled_nurse" readonly><br>                
                Assessment Score: <input type="text" id="cancelled_score" name="cancelled_score" readonly><br>       
                Notes: <input type="text" id="cancelled_notes" name="cancelled_notes" readonly><br>  
                <input type="status" id="cancelled_status" name="cancelled_status" value="Cancelled" hidden>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" id="send_form" class="btn btn-danger">Cancel</button>
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
                <h5 class="modal-title" id="deleteModalLabel">Delete Appointment ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('/AdminPageAppointment/deleteApp');?>" name="delete-appointment" id="delete-appointment" method="post" accept-charset="utf-8" class="form-horizontal">
            <div class="modal-body">    
                <h4>Details</h4>          
                <input type="hidden" id="delete_id" name="delete_id" class="form-control"><br>
                Name: <input type="text" id="delete_name" name="delete_name" readonly><br> 
                I/C Number: <input type="text" id="delete_identity" name="delete_identity" readonly><br> 
                Contact Number: <input type="text" id="delete_phone" name="delete_phone" readonly><br>  
                Email: <input type="text" id="delete_email" name="delete_email" readonly><br>   
                Service: <input type="text" id="delete_service" name="delete_service" readonly><br>
                Date: <input type="date" id="delete_date" name="delete_date" readonly><br>
                Time: <input type="text" id="delete_time" name="delete_time" readonly><br>
                Doctor: <input type="text" id="delete_doctor" name="delete_doctor" readonly><br>             
                Nurse: <input type="text" id="delete_nurse" name="delete_nurse" readonly><br>             
                Assessment score: <input type="text" id="delete_score" name="delete_score" readonly><br>       
                Notes: <input type="text" id="delete_notes" name="delete_notes" readonly><br>  
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
            <form action="" name="view-appointment" id="view-appointment" method="post" accept-charset="utf-8" class="form-horizontal">
            <div class="modal-body">    
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="view_id" class=" form-control-label" hidden>ID</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="hidden" id="view_id" name="view_id" readonly>
                    </div>
                </div>            
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="view_name" class=" form-control-label">Name</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="view_name" name="view_name" readonly>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="view_identity" class=" form-control-label">I/C Number</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="view_identity" name="view_identity" readonly>
                    </div>
                </div>                 
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="view_phone" class=" form-control-label">Contact Number</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="view_phone" name="view_phone" readonly>
                    </div>
                </div> 
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="view_email" class=" form-control-label">Email</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="email" id="view_email" name="view_email" readonly>
                    </div>
                </div>   
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="view_services" class=" form-control-label">Service</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="view_services" name="view_services" readonly>
                    </div>
                </div>  
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="view_date" class=" form-control-label">Date</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="date" id="view_date" name="view_date" readonly>
                    </div>
                </div> 
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="view_time" class=" form-control-label">Time</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="view_time" name="view_time" readonly>
                    </div>
                </div> 
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="view_doctor" class=" form-control-label">Doctor</label>
                    </div>
                     <div class="col-12 col-md-9">
                        <input type="text" id="view_doctor" name="view_doctor" readonly>
                    </div>
                </div> 
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="view_nurse" class=" form-control-label">Nurse</label>
                    </div>
                     <div class="col-12 col-md-9">
                        <input type="text" id="view_nurse" name="view_nurse" readonly>
                    </div>
                </div> 
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="view_score" class=" form-control-label">Assessment Score</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="view_score" name="view_score" readonly>
                    </div>
                </div>  
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="view_notes" class=" form-control-label">Additional Notes</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="view_doctor" name="view_doctor" readonly>
                        <textarea name="view_notes" id="view_notes" rows="1" readonly></textarea>
                     </div>
                </div>                
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="view_status" class=" form-control-label">Status</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="view_status" name="view_status" readonly>
                    </div>
                </div>  
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="view_created" class=" form-control-label">Booked On</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="view_created" name="view_created" readonly>
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
    $('table #editButton').on('click', function(event){
        $('#editModal').modal();

            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();

        console.log(data);

        $('#id').val(data[0]);
        $('#name').val(data[1]);
        $('#identity').val(data[2]);
        $('#phone').val(data[3]);
        $('#email').val(data[4]);
        $('#services').val(data[5]);
        $('#date').val(data[7]);
        $('#hour').val(data[8]);
        $('#doctor').val(data[10]);
        $('#nurse').val(data[12]);
        $('#score').val(data[14]);
        $('#notes').val(data[15]);
        $('#created').val(data[17]);
    });
});
</script>

<script>
$('document').ready(function(){
    $('table #completeButton').on('click', function(event){
        $('#completeModal').modal();

            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();

        console.log(data);

        $('#complete_id').val(data[0]);
        $('#complete_name').val(data[1]);
        $('#complete_identity').val(data[2]);
        $('#complete_phone').val(data[3]);
        $('#complete_email').val(data[4]);
        $('#complete_service').val(data[6]);
        $('#complete_date').val(data[7]);
        $('#complete_time').val(data[9]);
        $('#complete_doctor').val(data[11]);
        $('#complete_nurse').val(data[13]);
        $('#complete_score').val(data[14]);
        $('#complete_notes').val(data[15]);
        $('#complete_created').val(data[17]);
    });
});
</script>

<script>
$('document').ready(function(){
    $('table #cancelledButton').on('click', function(event){
        $('#cancelledModal').modal();

            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();

        console.log(data);

        $('#cancelled_id').val(data[0]);
        $('#cancelled_name').val(data[1]);
        $('#cancelled_identity').val(data[2]);
        $('#cancelled_phone').val(data[3]);
        $('#cancelled_email').val(data[4]);
        $('#cancelled_service').val(data[6]);
        $('#cancelled_date').val(data[7]);
        $('#cancelled_time').val(data[9]);
        $('#cancelled_doctor').val(data[11]);
        $('#cancelled_nurse').val(data[13]);
        $('#cancelled_score').val(data[14]);
        $('#cancelled_notes').val(data[15]);
        $('#cancelled_created').val(data[17]);
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
        $('#delete_identity').val(data[2]);
        $('#delete_phone').val(data[3]);
        $('#delete_email').val(data[4]);
        $('#delete_service').val(data[6]);
        $('#delete_date').val(data[7]);
        $('#delete_time').val(data[9]);
        $('#delete_doctor').val(data[11]);
        $('#delete_nurse').val(data[13]);
        $('#delete_score').val(data[14]);
        $('#delete_notes').val(data[15]);
        $('#delete_created').val(data[17]);
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

        $('#view_id').val(data[0]);
        $('#view_name').val(data[1]);
        $('#view_identity').val(data[2]);
        $('#view_phone').val(data[3]);
        $('#view_email').val(data[4]);
        $('#view_services').val(data[6]);
        $('#view_date').val(data[7]);
        $('#view_time').val(data[9]);
        $('#view_doctor').val(data[11]);
        $('#view_nurse').val(data[13]);
        $('#view_score').val(data[14]);
        $('#view_notes').val(data[15]);
        $('#view_status').val(data[16]);
        $('#view_created').val(data[17]);
    });
});
</script>