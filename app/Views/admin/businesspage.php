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
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <strong>Welcome</strong> Image
                        </div>
                        <form action="<?php echo base_url('/AdminPageBusiness/updateWelcome');?>" name="edit-logo" id="edit-logo" method="post" accept-charset="utf-8" class="form-horizontal">
                            <div class="card-body card-block">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="info" class=" form-control-label">Info</label>
                                    </div>
                                    <?php if($welcome):
                                        foreach($welcome as $info): ?>
                                    <div class="col-12 col-md-9">                                    
                                        <textarea id="info" name="info" rows="3" class="form-control" readonly><?php echo $info['info']; endforeach; endif;?></textarea>
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
                            <div class="card-footer">
                                <button type="submit" id="send_form" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div> 
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body card-block">
                            <div class="table-responsive table-responsive-data2">
                                <table is="tableSlider" class="table table-data2">
                                    <tbody>
                                        <?php foreach($welcome as $image): ?>
                                        <tr class="tr-shadow">
                                            <td style="width: 20%; height: auto;">
                                                <?php echo '<img src="data:image;base64, '.base64_encode($image['image']).'">';?>
                                            </td>                                
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>  
  
                        </div>
                    </div>
                </div> 
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            Business<strong> Introduction</strong>
                        </div>
                        <form action="<?php echo base_url('/AdminPageBusiness/updateText');?>" name="edit-infos" id="edit-infos" method="post" accept-charset="utf-8" class="form-horizontal">                            
                            <?php if($text_info):foreach($text_info as $info): ?>
                            <div class="card-body card-block">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="welcome_text" class=" form-control-label">Welcome Text</label>
                                    </div>
                                    <div class="col-12 col-md-9">                                        
                                        <textarea name="welcome_text" id="welcome_text" rows="2" class="form-control" required><?php echo $info['welcome_text'];?></textarea>
                                        <small class="form-text text-muted">This is welcome text</small>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="heading" class=" form-control-label">Heading</label>
                                    </div>
                                    <div class="col-12 col-md-9">                                        
                                        <textarea name="heading" id="heading" rows="4" class="form-control" required><?php echo $info['heading'];?></textarea>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="info_text" class=" form-control-label">Info Text</label>
                                    </div>
                                    <div class="col-12 col-md-9">                                        
                                        <textarea name="info_text" id="info_text" rows="9" class="form-control" required><?php echo $info['info_text']; endforeach; endif; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" id="send_form" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Update
                                </button>
                            </div>                       
                        </form>
                    </div>
                </div>    
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            Business<strong> Information</strong>
                        </div>
                        <form action="<?php echo base_url('/AdminPageBusiness/updateInfos');?>" name="edit-infos" id="edit-infos" method="post" accept-charset="utf-8" class="form-horizontal">                            
                            <?php if($business_infos):foreach($business_infos as $business_infos): ?>
                            <div class="card-body card-block">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="webname1" class=" form-control-label">Web Name 1</label>
                                    </div>
                                    <div class="col-12 col-md-9">                                        
                                        <input type="text" id="webname1" name="webname1" class="form-control" value="<?php echo $business_infos['webname1'];?>" required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="webname2" class=" form-control-label">Web Name 2</label>
                                    </div>
                                    <div class="col-12 col-md-9">                                        
                                        <input type="text" id="webname2" name="webname2" class="form-control" value="<?php echo $business_infos['webname2'];?>" required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="contact" class=" form-control-label">Contact</label>
                                    </div>
                                    <div class="col-12 col-md-9">                                        
                                        <input type="text" id="contact" name="contact" class="form-control" value="<?php echo $business_infos['contact'];?>" required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="email" class=" form-control-label">Email</label>
                                    </div>
                                    <div class="col-12 col-md-9">                                        
                                        <input type="text" id="email" name="email" class="form-control" value="<?php echo $business_infos['email'];?>"required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="address1" class=" form-control-label">Address 1</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea id="address1" name="address1" rows="3" class="form-control" required><?php echo $business_infos['address1']; ?></textarea>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="address2" class=" form-control-label">Address 2</label>
                                    </div>
                                    <div class="col-12 col-md-9">                                        
                                        <textarea id="address2" name="address2" rows="3" class="form-control"><?php echo $business_infos['address2']; ?></textarea>
                                    </div> 
                                </div>
                                <div class="row form-group">                               
                                    <div class="col col-md-3">
                                        <label for="postal_code" class=" form-control-label">Postal Code</label>
                                    </div>
                                    <div class="col-12 col-md-9">                                        
                                        <input type="text" id="postal_code" name="postal_code" class="form-control" value="<?php echo $business_infos['postal_code'];?>" required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="city" class=" form-control-label">City</label>
                                    </div>
                                    <div class="col-12 col-md-9">                                        
                                        <input type="text" id="city" name="city" class="form-control" value="<?php echo $business_infos['city'];?>"required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="state" class=" form-control-label">State</label>
                                    </div>
                                    <div class="col-12 col-md-9">                                        
                                        <input type="text" id="state" name="state" class="form-control" value="<?php echo $business_infos['state'];?>" required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="country" class=" form-control-label">Country</label>
                                    </div>
                                    <div class="col-12 col-md-9">                                        
                                        <input type="text" id="country" name="country" class="form-control" value="<?php echo $business_infos['country'];?>" required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="country" class=" form-control-label">Map</label>
                                    </div>
                                    <div class="col-12 col-md-9">                                        
                                        <input type="text" id="map" name="map" class="form-control" value="<?php echo $business_infos['map'];?>" required>
                                        <small class="form-text text-muted">1. Go to google maps and search the location.</small>                                        
                                        <small class="form-text text-muted">2. Click 'Share' and go to 'Embed a map'.</small>                                       
                                        <small class="form-text text-muted">3. Copy only the location URL and paste it here.</small>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="country" class=" form-control-label">Web URL</label>
                                    </div>
                                    <div class="col-12 col-md-9">                                        
                                        <input type="text" id="website" name="website" class="form-control" value="<?php echo $business_infos['website'];?>" required>
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
                            <strong>Business</strong> Links
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
                                            <th>Logo</th>
                                            <th style="display:none;">Logo</th>
                                            <th>Link</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if($business_links):foreach($business_links as $business_links): ?>
                                        <tr class="tr-shadow">
                                            <td style="display:none;"><?php echo $business_links['id'];?></td>
                                            <td><?php echo $business_links['name'];?></td>
                                            <td><i class="<?php echo $business_links['logo'];?>"></i></td>                                            
                                            <td style="display:none;"><?php echo $business_links['logo'];?></td>
                                            <td><a href="http://<?php echo $business_links['link'];?>"><?php echo $business_links['link'];?></td>
                                            <td>
                                                <?php if($business_links['status'] == 'show'){
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
                <div class="col-lg-9">
                    <div class="card">
                        <div class="card-header">
                            <strong>Calendar</strong>                      
                        </div>
                        <div class="card-body card-block">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>  
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-header">
                            <strong>Event Form</strong>
                        </div>
                        <form action="<?php echo base_url('/AdminPageBusiness/storeCalendar');?>" method="post"  id="add-calendar" class="form-horizontal">
                            <div class="card-body card-block">
                                <div class="form-group mb-2">
                                    <label for="operation" class=" form-control-label">Operation</label>
                                </div>
                                <div class="col-12 col-md-9"> Open
                                    <label class="switch switch-default switch-pill switch-success mr-2"> 
                                        <input type="checkbox" name="operation" id="operation" class="switch-input" value="Open">
                                        <span class="switch-label"></span>
                                        <span class="switch-handle"></span> 
                                    </label>                       
                                </div>
                                <div class="col-12 col-md-9"> Close
                                    <label class="switch switch-default switch-pill switch-danger mr-2"> 
                                        <input type="checkbox" name="operation" id="operation" class="switch-input" value="Close">
                                        <span class="switch-label"></span>
                                        <span class="switch-handle"></span> 
                                    </label>                       
                                </div>
                                <div class="col-12 col-md-9"> Holiday
                                    <label class="switch switch-default switch-pill switch-warning mr-2"> 
                                        <input type="checkbox" name="operation" id="operation" class="switch-input" value="Holiday">
                                        <span class="switch-label"></span>
                                        <span class="switch-handle"></span> 
                                    </label>                       
                                </div>
                                <div class="form-group mb-2">
                                    <label for="start_datetime" class="control-label">Start</label>
                                    <input type="datetime-local" id="start" name="start" class="form-control" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="end_datetime" class="control-label">End</label>
                                    <input type="datetime-local" id="end" name="end" class="form-control" required>                    
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" id="send_form" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Add Event
                                </button>
                                <button class="btn btn-info btn-sm" type="reset" form="add-calendar">
                                    <i class="fa fa-reset"></i> Clear</button>
                            </div>
                        </form>
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
<div class="modal fade" id="editCalendarModal" tabindex="-1" role="dialog" aria-labelledby="editCalendarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCalendarModalLabel">Edit Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('/AdminPageBusiness/updateCalendar');?>" name="add-calendar" id="add-calendar" method="post" accept-charset="utf-8" class="form-horizontal" >
            <div class="modal-body">    
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="idCalendar" class=" form-control-label" >ID</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="idCalendar" name="idCalendar" class="form-control" readonly>
                    </div>
                </div>      
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="operation" class=" form-control-label">Operation</label>
                    </div>
                    <div class="col-12 col-md-9"> Open
                        <label class="switch switch-default switch-pill switch-success mr-2"> 
                            <input type="checkbox" name="operation" class="switch-input" value="Open">
                            <span class="switch-label"></span>
                            <span class="switch-handle"></span> 
                        </label>                       
                    </div>
                    <div class="col col-md-3">
                        <label for="operation" class=" form-control-label"></label>
                    </div>
                    <div class="col-12 col-md-9"> Close
                        <label class="switch switch-default switch-pill switch-danger mr-2"> 
                            <input type="checkbox" name="operation" class="switch-input" value="Close">
                            <span class="switch-label"></span>
                            <span class="switch-handle"></span> 
                        </label>                       
                    </div>
                    <div class="col col-md-3">
                        <label for="operation" class=" form-control-label"></label>
                    </div>
                    <div class="col-12 col-md-9"> Holiday
                        <label class="switch switch-default switch-pill switch-warning mr-2"> 
                            <input type="checkbox" name="operation" class="switch-input" value="Holiday">
                            <span class="switch-label"></span>
                            <span class="switch-handle"></span> 
                        </label>                       
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="start" class=" form-control-label">Start</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="datetime-local" id="start" name="start" class="form-control">
                    </div>
                </div>  
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="end" class=" form-control-label">End</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="datetime-local" id="end" name="end" class="form-control">                
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

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Link</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('/AdminPageBusiness/updateLinks');?>" name="edit-links" id="edit-links" method="post" accept-charset="utf-8" class="form-horizontal" enctype="multipart/form-data">
            <div class="modal-body">    
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="id" class=" form-control-label" hidden>ID</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="hidden" id="idLink" name="idLink" class="form-control" readonly>
                    </div>
                </div>            
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="day" class=" form-control-label">Name</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="topic" class=" form-control-label">Logo</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <select class="selectpicker" type="text" id="logo" name="logo" required>
                            <option>Select</i></option>
                            <option value="fab fa-adn">Adn</option>
                            <option value="fab fa-android">Android</option>
                            <option value="fab fa-apple">Apple</option>
                            <option value="fab fa-bitbucket">Bitbucket</option>
                            <option value="fab fa-bitcoin">Bitcoin</option>
                            <option value="fab fa-css3">CSS 3</option>
                            <option value="fab fa-dribble">Dribble</option>
                            <option value="fab fa-dropbox">Dropbox</option>
                            <option value="fab fa-facebook">Facebook</option>
                            <option value="fab fa-flickr">Flickr</option>
                            <option value="fab fa-foursquare">Foursquare</option>
                            <option value="fab fa-github">Github</option>
                            <option value="fab fa-gittip">Gittip</option>
                            <option value="fab fa-google-plus">Google Plus</option>
                            <option value="fab fa-html5">HTML 5</option>
                            <option value="fab fa-instagram">Instagram</option>
                            <option value="fab fa-linkedin">Linkedin</option>
                            <option value="fab fa-linux">Linux</option>
                            <option value="fab fa-maxcdn">Maxcdn</option>
                            <option value="fab fa-pagelines">Pagelines</option>
                            <option value="fab fa-pinterest">Pinterest</option>
                            <option value="fab fa-renren">Renren</option>
                            <option value="fab fa-skype">Skype</option>
                            <option value="fab fa-stack-exchange">Stack Exchange</option>
                            <option value="fab fa-stack-overflow">Stack Overflow</option>
                            <option value="fab fa-trello">Trello</option>
                            <option value="fab fa-tumblr">Tumblr</option>
                            <option value="fab fa-twitter">Twitter</option>
                            <option value="fab fa-vimeo-square">Vimeo</option>
                            <option value="fab fa-vk">Vk</option>
                            <option value="fab fa-weibo">Weibo</option>
                            <option value="fab fa-windows">Windows</option>
                            <option value="fab fa-xing">Xing</option>
                            <option value="fab fa-youtube">Youtube</option>                                                        
                            <option value="fab fa-youtube-play">Youtube Play</option>
                        </select>
                    </div>
                </div> 
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="close_at" class=" form-control-label">Link</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="link" name="link" class="form-control" required>
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
                <h5 class="modal-title" id="addModalLabel">New Link</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('/AdminPageBusiness/storeLinks');?>" name="add-links" id="add-links" method="post" accept-charset="utf-8" class="form-horizontal" >
            <div class="modal-body">          
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="topic" class=" form-control-label">Name</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                </div>       
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="topic" class=" form-control-label">Logo</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <select class="selectpicker" type="text" id="logo" name="logo" required>
                            <option>Select</i></option>
                            <option value="fab fa-adn">Adn</option>
                            <option value="fab fa-android">Android</option>
                            <option value="fab fa-apple">Apple</option>
                            <option value="fab fa-bitbucket">Bitbucket</option>
                            <option value="fab fa-bitcoin">Bitcoin</option>
                            <option value="fab fa-css3">CSS 3</option>
                            <option value="fab fa-dribble">Dribble</option>
                            <option value="fab fa-dropbox">Dropbox</option>
                            <option value="fab fa-facebook">Facebook</option>
                            <option value="fab fa-flickr">Flickr</option>
                            <option value="fab fa-foursquare">Foursquare</option>
                            <option value="fab fa-github">Github</option>
                            <option value="fab fa-gittip">Gittip</option>
                            <option value="fab fa-google-plus">Google Plus</option>
                            <option value="fab fa-html5">HTML 5</option>
                            <option value="fab fa-instagram">Instagram</option>
                            <option value="fab fa-linkedin">Linkedin</option>
                            <option value="fab fa-linux">Linux</option>
                            <option value="fab fa-maxcdn">Maxcdn</option>
                            <option value="fab fa-pagelines">Pagelines</option>
                            <option value="fab fa-pinterest">Pinterest</option>
                            <option value="fab fa-renren">Renren</option>
                            <option value="fab fa-skype">Skype</option>
                            <option value="fab fa-stack-exchange">Stack Exchange</option>
                            <option value="fab fa-stack-overflow">Stack Overflow</option>
                            <option value="fab fa-trello">Trello</option>
                            <option value="fab fa-tumblr">Tumblr</option>
                            <option value="fab fa-twitter">Twitter</option>
                            <option value="fab fa-vimeo-square">Vimeo</option>
                            <option value="fab fa-vk">Vk</option>
                            <option value="fab fa-weibo">Weibo</option>
                            <option value="fab fa-windows">Windows</option>
                            <option value="fab fa-xing">Xing</option>
                            <option value="fab fa-youtube">Youtube</option>                                                        
                            <option value="fab fa-youtube-play">Youtube Play</option>
                        </select>
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
                        <label for="status" class=" form-control-label"></label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="checkbox" name="status" value="show" /> Show this link                            
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
                <h5 class="modal-title" id="editModalLabel">Delete Link ? </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('/AdminPageBusiness/deleteLinks');?>" name="delete-links" id="delete-links" method="post" accept-charset="utf-8" class="form-horizontal" enctype="multipart/form-data">
            <div class="modal-body"> 
                <h4>Details</h4>   
                <br>                  
                <input type="hidden" id="delete_id" name="delete_id" class="form-control"> 
                Name: <input type="text" id="delete_name" name="delete_name"  readonly><br>
                Logo: <input type="text" id="delete_logo" name="delete_logo"  readonly><br>
                Link: <input type="text" id="delete_link" name="delete_link"  readonly>
                
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

        $('#idLink').val(data[0]);
        $('#name').val(data[1]);       
        $('#logo').val(data[2]);              
        $('#logo').val(data[3]);
        $('#link').val(data[4]);         
        $('#status').val(data[5]);
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
        $('#delete_logo').val(data[3]);
        $('#delete_link').val(data[4]); 
    });
});
</script>

<script>
     $('document').ready(function() {   

        var calendar = $('#calendar').fullCalendar({          
            businessHours: true, // display business hours
            events: [                
                <?php foreach($calendar as $calendar): ?>
                {
                 
                    id: '<?php echo $calendar['id'];?>',                  
                    title: '<?php echo $calendar['operation'];?>',
                    start: '<?php echo $calendar['start'];?>',
                    end: '<?php echo $calendar['end'];?>',
                    <?php 
                    if($calendar['operation'] == 'Holiday'):?>
                        color: '#eed202'
                    <?php elseif ($calendar['operation'] == "Open"):?>
                        color: '#4BB543'
                    <?php else: ?>
                        color: '#FF0000'
                    <?php endif; ?>
                },
                <?php endforeach; ?>  
                {
                title:"Open",
                dow:[1, 2, 3, 4, 5],
                start: '09:00', 
                end: '18:00', 
                color: '#4BB543'
            },
            {
                title:"Close",
                dow:[6, 0],
                color: '#FF0000'
            },
            ],
            //selectable:true,
            //selectHelper:true, 
            //eventClick: function(date, jsEvent, view) {
                //$("#editCalendarModal").modal("show");
                //$("#start").val(date.format());
                //$("#end").val(date.format());
            //},
            //select:function(event)
            //{
                //$('#event-details-modal').modal();
                //var data = $tr.children(id).map(function(){
                    //return $(this).text();
                //}).get();
                //console.log(data);

                //$('#idCalendar').val(data[0]);
                //$('#operation').val(data[1]);       
                //$('#start').val(data[2]);
                //$('#end').val(data[3]);        
            //},
        });
        // Form reset 
        $('#add-calendar').on('reset', function() {
            $(this).find('input:hidden').val('')
            $(this).find('input:visible').first().focus()
        })
	});    
  </script>

  <script>
      // the selector will match all input controls of type :checkbox
      // and attach a click event handler 
      $("input:checkbox").on('click', function() {
          // in the handler, 'this' refers to the box clicked on
          var $box = $(this);
          if ($box.is(":checked")) {
              // the name of the box is retrieved using the .attr() method
              // as it is assumed and expected to be immutable
              var group = "input:checkbox[name='" + $box.attr("name") + "']";
              // the checked state of the group/box on the other hand will change
              // and the current value is retrieved using .prop() method
              $(group).prop("checked", false);
              $box.prop("checked", true);
        } else {
            $box.prop("checked", false);
        }
    });
</script>

<script>
const timeInput = document.getElementById('rest');

timeInput.addEventListener('input', (e) => {
  let hour = e.target.value.split(':')[0]
  e.target.value = `${hour}:00`
})
</script>