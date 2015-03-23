<div class="row">
    <div class="col-sm-12 text-right">
            <a class="btn btn-danger" href="<?php echo site_url("admin/export_meritlist"); ?>" style="margin-top:-55px">Download Merit List</a>
    </div>
</div>
<div class="panel panel-info">
    <div class="panel-heading">
        General Candidates
    </div>
    <div class="panel-body">
        <table id="example" class="table table-striped table-bordered cls_list" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Date of Birth</th>
                    <th>Gender</th>
                    <th>Score</th>
                    <th>Action</th>
                </tr>
            </thead>
            
            <tfoot>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Date of Birth</th>
                    <th>Gender</th>
                    <th>Score</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                <?php foreach($general_list as $k=>$admission){ ?>
                <tr>
                    <td><?php echo $admission['first_name']; ?></td>
                    <td><?php echo $admission['last_name'] ?></td>
                    <td><?php list($year, $month, $day) = explode("-", $admission['birth_date']); echo $day."/".$month."/".$year; ?></td>
                    <td style="text-transform:capitalize;"><?php echo $admission['gender']; ?></td>
                    <td><?php echo $admission['grade']; ?></td>
                    <td>
                        <a href="<?php echo base_url()."admin/download/".$admission['id']; ?>" target="_blank"><span class="glyphicon glyphicon-download-alt"></span> Download</a>
                        &nbsp;&nbsp;
                        <a class=" btn btn-success" href="<?php echo base_url()."website/preview/".$admission['application_code']; ?>" target="_blank">
                            <span class="glyphicon glyphicon-list-alt"></span> Preview
                        </a>
                        <?php if($admission['payment_status']==1){?>
                        <a class=" btn btn-warning" href="#" data-toggle="modal" data-target="#myModal_<?php echo $admission['id']?>">
                            <span class="glyphicon glyphicon-list-alt"></span> View Note
                        </a>
                        <?php }?>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<div class="panel panel-success">
    <div class="panel-heading">
        Female Candidates
    </div>
    <div class="panel-body">
        <table id="example" class="table table-striped table-bordered cls_list" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Date of Birth</th>
                    <th>Gender</th>
                    <th>Score</th>
                    <th>Action</th>
                </tr>
            </thead>
            
            <tfoot>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Date of Birth</th>
                    <th>Gender</th>
                    <th>Score</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                <?php foreach($female_list as $k=>$admission){ ?>
                <tr>
                    <td><?php echo $admission['first_name']; ?></td>
                    <td><?php echo $admission['last_name'] ?></td>
                    <td><?php list($year, $month, $day) = explode("-", $admission['birth_date']); echo $day."/".$month."/".$year; ?></td>
                    <td style="text-transform:capitalize;"><?php echo $admission['gender']; ?></td>
                    <td><?php echo $admission['grade']; ?></td>
                    <td>
                        <a href="<?php echo base_url()."admin/download/".$admission['id']; ?>" target="_blank"><span class="glyphicon glyphicon-download-alt"></span> Download</a>
                        &nbsp;&nbsp;
                        <a class=" btn btn-success" href="<?php echo base_url()."website/preview/".$admission['application_code']; ?>" target="_blank">
                            <span class="glyphicon glyphicon-list-alt"></span> Preview
                        </a>
                         <?php if($admission['payment_status']==1){?>
                        <a class=" btn btn-warning" href="#" data-toggle="modal" data-target="#myModal_<?php echo $admission['id']?>">
                            <span class="glyphicon glyphicon-list-alt"></span> Payment Note
                        </a>
                        <?php }?>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<div class="panel panel-danger">
    <div class="panel-heading">
        SC/ST  Candidates
    </div>
    <div class="panel-body">
        <table id="example" class="table table-striped table-bordered cls_list" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Date of Birth</th>
                    <th>Gender</th>
                    <th>Score</th>
                    <th>Action</th>
                </tr>
            </thead>
            
            <tfoot>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Date of Birth</th>
                    <th>Gender</th>
                    <th>Score</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                <?php foreach($stsc_list as $k=>$admission){ ?>
                <tr>
                    <td><?php echo $admission['first_name']; ?></td>
                    <td><?php echo $admission['last_name'] ?></td>
                    <td><?php list($year, $month, $day) = explode("-", $admission['birth_date']); echo $day."/".$month."/".$year; ?></td>
                    <td style="text-transform:capitalize;"><?php echo $admission['gender']; ?></td>
                    <td><?php echo $admission['grade']; ?></td>
                    <td>
                        <a href="<?php echo base_url()."admin/download/".$admission['id']; ?>" target="_blank"><span class="glyphicon glyphicon-download-alt"></span> Download</a>
                        &nbsp;&nbsp;
                        <a class=" btn btn-success" href="<?php echo base_url()."website/preview/".$admission['application_code']; ?>" target="_blank">
                            <span class="glyphicon glyphicon-list-alt"></span> Preview
                        </a>
                        <?php if($admission['payment_status']==1){?>
                        <a class=" btn btn-warning" href="#" data-toggle="modal" data-target="#myModal_<?php echo $admission['id']?>">
                            <span class="glyphicon glyphicon-list-alt"></span> Payment Note
                        </a>
                        <?php }?>

                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php foreach($general_list as $k=>$admission){ ?>    
<div class="modal fade" id="myModal_<?php echo $admission['id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Approval & Payment Note</h4>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-sm-12 text-right">
            <h2>Payment Note</h2>
            </div>            
        </div>
        <div class="row">
            <div class="col-sm-6 text-right">Application No:</div>
            <div class="col-sm-6">
                <?php echo $admission['application_code']?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 text-right">Payment Date:</div>
            <div class="col-sm-6">
                <?php echo date('d-M Y',strtotime($admission['payment_date']))?>
            </div>
        </div> 
        <div class="row">
            <div class="col-sm-6 text-right">Branch:</div>
            <div class="col-sm-6">
                <?php echo $admission['branch_name']?>
            </div>
        </div> 
        <div class="row">
            <div class="col-sm-6 text-right">Transaction No:</div>
            <div class="col-sm-6">
                <?php echo $admission['txn_no']?>
            </div>
        </div> 
        <div class="row">
            <div class="col-sm-6 text-right">Payment Note:</div>
            <div class="col-sm-6">
                <?php echo nl2br($admission['payment_note'])?>
            </div>
        </div>     
        <div class="row">
            <div class="col-sm-12 text-right">
                <h2>Approval Note</h2>
            </div>            
        </div>
        <div class="row">
            <div class="col-sm-6 text-right">Approval Note:</div>
            <div class="col-sm-6">
                <?php echo nl2br($admission['comment'])?>
            </div>
        </div>   
      </div>
      
    </div>
  </div>
</div>
<?php }?>
<?php foreach($female_list as $k=>$admission){ ?>    
<div class="modal fade" id="myModal_<?php echo $admission['id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Payment Note</h4>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-sm-6 text-right">Application No:</div>
            <div class="col-sm-6">
                <?php echo $admission['application_code']?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 text-right">Payment Date:</div>
            <div class="col-sm-6">
                <?php echo date('d-M Y',strtotime($admission['payment_date']))?>
            </div>
        </div> 
        <div class="row">
            <div class="col-sm-6 text-right">Branch:</div>
            <div class="col-sm-6">
                <?php echo $admission['branch_name']?>
            </div>
        </div> 
        <div class="row">
            <div class="col-sm-6 text-right">Transaction No:</div>
            <div class="col-sm-6">
                <?php echo $admission['txn_no']?>
            </div>
        </div> 
        <div class="row">
            <div class="col-sm-6 text-right">Payment Note:</div>
            <div class="col-sm-6">
                <?php echo nl2br($admission['payment_note'])?>
            </div>
        </div>     
           
      </div>
      
    </div>
  </div>
</div>
<?php }?>
<?php foreach($stsc_list as $k=>$admission){ ?>    
<div class="modal fade" id="myModal_<?php echo $admission['id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Payment Note</h4>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-sm-6 text-right">Application No:</div>
            <div class="col-sm-6">
                <?php echo $admission['application_code']?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 text-right">Payment Date:</div>
            <div class="col-sm-6">
                <?php echo date('d-M Y',strtotime($admission['payment_date']))?>
            </div>
        </div> 
        <div class="row">
            <div class="col-sm-6 text-right">Branch:</div>
            <div class="col-sm-6">
                <?php echo $admission['branch_name']?>
            </div>
        </div> 
        <div class="row">
            <div class="col-sm-6 text-right">Transaction No:</div>
            <div class="col-sm-6">
                <?php echo $admission['txn_no']?>
            </div>
        </div> 
        <div class="row">
            <div class="col-sm-6 text-right">Payment Note:</div>
            <div class="col-sm-6">
                <?php echo nl2br($admission['payment_note'])?>
            </div>
        </div>     
           
      </div>
      
    </div>
  </div>
</div>
<?php }?>
