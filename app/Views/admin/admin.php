<?php echo view('admin/head'); ?>

<!--Main Content-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <h2 class="title-1">Dashboard</h2>
                        </div>
                    </div>
                </div>
                <div class="row m-t-25">
                    <div class="col-sm-6 col-lg-3">
                        <div class="overview-item overview-item--c1">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-accounts"></i>
                                    </div>
                                    <br>                                    
                                    <div class="text">
                                        <h2></h2>
                                        <span>customers</span>
                                    </div>                                   
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="overview-item overview-item--c2">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                    <i class="zmdi zmdi-accounts-list"></i>
                                    </div>
                                    <br>
                                    <div class="text">
                                        <?php $countD = 0;foreach($doctor as $row): $countD++; endforeach;?>
                                        <?php $countN = 0;foreach($nurse as $row): $countN++; endforeach;?>
                                        <h2><?php echo $countD + $countN; ?></h2>                                     
                                        <span>staffs</span>
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="overview-item overview-item--c3">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-assignment"></i>
                                    </div>
                                    <br>
                                    <div class="text">
                                        <h2><?php $count = 0;foreach($assessment as $row): $count++; endforeach; echo $count;?></h2>
                                        <span>assessments</span>
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="overview-item overview-item--c4">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-calendar-note"></i>
                                    </div>
                                    <br>
                                    <div class="text">         
                                        <h2><?php $count = 0;foreach($appointment as $row):$count++; endforeach; echo $count;?></h2>
                                        <span>appointments</span>
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
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


<?php echo view('admin/foot'); ?>