<?php
    echo view('admin/head');
?>

<!--Main Content-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <h2 class="title-1">Risk Analysis
                        <span><small>
                            <a href="<?php echo base_url();?>/adminpageassessment" target="_blank" data-toggle="tooltip" data-placement="top" title="View All Result">
                                <i class="fas fa-info"></i>
                            </a>
                        </small></span>  
                        </h2>
                                     
                    </div>
                </div>
            </div>
            <div class="row m-t-25">
                <div class="col-sm-6 col-lg-3">
                    <div class="overview-item overview-item--c1">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <i class="zmdi zmdi-account-o"></i>
                                </div>
                                <br>
                                <div class="text">
                                    <h2><?php $count = 0;foreach($assessment as $row): $count++; endforeach; echo $count;?></h2>
                                    <span>Results</span>
                                </div>
                            </div>
                            <div class="overview-chart">
                                <canvas id="widgetChart4"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="overview-item overview-item--c3">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <i class="zmdi zmdi-account-o"></i>
                                </div>
                                <br>
                                <div class="text">
                                    <?php foreach($resultlevel as $high): if($high['id'] == "1"): $highscoremin = $high['minscore']; endif; endforeach;?>
                                    <h2><?php $count = 0;foreach($assessment as $row1): if($row1['score'] >= $highscoremin) $count++; endforeach; echo $count;?></h2>
                                    <span><b><?php foreach($resultlevel as $risk1):if($risk1['id'] == "1"): echo $risk1['risklevel']; endif; endforeach; ?></b></span>
                                </div>
                            </div>
                            <div class="overview-chart">
                                <canvas id="widgetChart3"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="overview-item overview-item--c4">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <i class="zmdi zmdi-account-o"></i>
                                </div>
                                <br>
                                <div class="text">
                                    <?php foreach ($resultlevel as $medium): if ($medium['id'] == "2"): $mediumscoremax = $medium['maxscore']; $mediumscoremin = $medium['minscore']; endif; endforeach;?>
                                    <h2><?php $count = 0;foreach($assessment as $row2): if($row2['score'] >= $mediumscoremin && $row2['score'] <= $mediumscoremax) $count++; endforeach; echo $count;?></h2>
                                    <span><b><?php foreach($resultlevel as $risk2):if($risk2['id'] == "2"): echo $risk2['risklevel']; endif; endforeach; ?></b></span>
                                </div>
                            </div>
                            <div class="overview-chart">
                                <canvas id="widgetChart1"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="overview-item overview-item--c2">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <i class="zmdi zmdi-account-o"></i>
                                </div>
                                <br>
                                <div class="text">
                                    <?php foreach ($resultlevel as $low): if ($low['id'] == "3"): $lowscoremax = $low['maxscore']; endif; endforeach;?>
                                    <h2><?php $count = 0;foreach($assessment as $row3): if($row3['score'] <= $lowscoremax) $count++; endforeach; echo $count;?></h2>
                                    <span><b><?php foreach($resultlevel as $risk3):if($risk3['id'] == "3"): echo $risk3['risklevel']; endif; endforeach; ?></b></span>
                                </div>
                            </div>
                            <div class="overview-chart">
                                <canvas id="widgetChart2"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>                
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        Risk <strong>Level</strong>                             
                    </div>
                    <div class="card-body card-block">
                        <div class="table-responsive table-responsive-data2">
                            <table is="tableSlider" class="table table-data2">
                                <thead>
                                    <tr>
                                        <th style="display:none;">ID</th>
                                        <th>Risk Level</th>
                                        <th>Score</th>
                                        <th style="display:none;">Minimum Score</th>
                                        <th style="display:none;">Maximum Score</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($resultlevel as $resultlevel): ?>
                                    <tr class="tr-shadow">
                                        <td style="display:none;"><?php echo $resultlevel['id'];?></td>
                                        <td><?php echo $resultlevel['risklevel'];?></td>                                        
                                        <td><?php echo  $resultlevel['minscore'];?> - <?php echo  $resultlevel['maxscore'];?></td> 
                                        <td style="display:none;"><?php echo  $resultlevel['minscore'];?></td> 
                                        <td style="display:none;"><?php echo  $resultlevel['maxscore'];?></td>                                            
                                        <td><div class="table-data-feature">
                                            <button class="item" id="editButton" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="zmdi zmdi-edit"></i>
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
        
<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Risk Level</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('/AdminPageRiskAnalysis/updateRiskLevel');?>" name="edit-result" id="edit-result" method="post" accept-charset="utf-8" class="form-horizontal" enctype="multipart/form-data">
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
                        <label for="risklevel" class=" form-control-label">Risk Level</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="risklevel" name="risklevel" readonly>
                    </div>
                </div>                
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="score" class=" form-control-label">Score</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <div data-role="rangeslider">
                            <label for="price-min">Minimum:</label>
                            <input type="text" name="minscore" id="minscore" value="200" class="form-control" style="width:150px"  min="0" max="1000" required>
                            <label for="price-max">Maximum:</label>
                            <input type="text" name="maxscore" id="maxscore" value="800" class="form-control" style="width:150px"  min="0" max="1000">
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

        $('#id').val(data[0]);
        $('#risklevel').val(data[1]);       
        $('#score').val(data[2]);       
        $('#minscore').val(data[3]);       
        $('#maxscore').val(data[4]);
    });
});
</script>

