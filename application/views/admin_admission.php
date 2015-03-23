<div class="panel">
    <div class="panel-body">
        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
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
            	<?php foreach($admissions as $admission){ ?>
                <tr>
                    <td><?php echo $admission->first_name; ?></td>
                    <td><?php echo $admission->last_name; ?></td>
                    <td><?php list($year, $month, $day) = explode("-", $admission->birth_date); echo $day."/".$month."/".$year; ?></td>
                    <td style="text-transform:capitalize;"><?php echo $admission->gender; ?></td>
                    <td><?php echo $admission->grade; ?></td>
                    <td width="35%">
                    	<a href="<?php echo base_url()."admin/download/".$admission->id; ?>" target="_blank"><span class="glyphicon glyphicon-download-alt"></span> Download</a>
                        &nbsp;&nbsp;
                        <a class=" btn btn-success btn-xs" href="<?php echo base_url()."website/preview/".$admission->application_code; ?>" target="_blank">
                            <span class="glyphicon glyphicon-list-alt"></span> Preview
                        </a>
                        <?php if($admission->payment_status==1){?>
                        <a class=" btn btn-primary btn-xs cls_approve_link" href="javascript:;" data-id="<?php echo $admission->id?>" data-status="<?php echo $admission->status?>" data-comment="<?php echo $admission->comment?>" data-toggle="modal" data-target="#approve_modal" target="_blank">
                            <span class="glyphicon glyphicon-list-alt"></span> 
                            <?php echo ($admission->status==1?'Diapprove':'Approve');?>                            
                        </a>        
                        <a class=" btn btn-warning btn-xs" href="#" data-toggle="modal" data-target="#myModal_<?php echo $admission->id;?>">
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

<div class="modal fade" id="approve_modal">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">New message</h4>
      </div>
      <div class="modal-body">
      <form action="<?php echo base_url()?>admin/approve" method="post">
        <input type="hidden" name="id" value="0">
        <input type="hidden" name="status" value="0">
        <div class="row">
          <div class="col-sm-12">
              <textarea class="form-control" name="comment" placeholder="Approval Comments" rows="5"></textarea>
          </div>
        </div>
        <p></p>
        <div class="row">
          <div class="col-sm-12">
              <input type="submit" class="btn btn-success btn-block" id="app_disapp" value="Approve">
          </div>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>   

<?php foreach($admissions as $k=>$admission){ ?>    
<div class="modal fade" id="myModal_<?php echo $admission->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Approval & Payment Note</h4>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h3>Payment Note</h3>
            </div>            
        </div>
        <div class="row">
            <div class="col-sm-6 text-right">Application No:</div>
            <div class="col-sm-6">
                <?php echo $admission->application_code;?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 text-right">Payment Date:</div>
            <div class="col-sm-6">
                <?php echo date('d-M Y',strtotime($admission->payment_date))?>
            </div>
        </div> 
        <div class="row">
            <div class="col-sm-6 text-right">Branch:</div>
            <div class="col-sm-6">
                <?php echo $admission->branch_name?>
            </div>
        </div> 
        <div class="row">
            <div class="col-sm-6 text-right">Transaction No:</div>
            <div class="col-sm-6">
                <?php echo $admission->txn_no?>
            </div>
        </div> 
        <div class="row">
            <div class="col-sm-6 text-right">Payment Note:</div>
            <div class="col-sm-6">
                <?php echo nl2br($admission->payment_note)?>
            </div>
        </div>     
        <div class="row">
            <div class="col-sm-12 text-center">
                <h3>Approval Note</h3>
            </div>            
        </div>
        <div class="row">
            <div class="col-sm-6 text-right">Approval Note:</div>
            <div class="col-sm-6">
                <?php echo nl2br($admission->comment)?>
            </div>
        </div>     
      </div>
      
    </div>
  </div>
</div>
<?php }?>
<style type="text/css">
    .modal-dialog{z-index: 100000000000 !important;}
</style> 
<script type="text/javascript">
$(document).ready(function() {
	$('#example').dataTable();
    $('.cls_approve_link').click(function(){
        $('[name="id"]').val($(this).data('id'));
        $('[name="status"]').val($(this).data('status'));
        $('[name="comment"]').val($(this).data('comment'));
        $('#app_disapp').val($(this).data('status')=='1'?'Disapprove':'Approve');
    });
});
</script>