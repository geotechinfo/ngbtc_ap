
<div class="panel panel-default">
    <div class="panel-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Notice Title</th>
                            <th>Notice Type</th>
                            <th>Active From</th>
                            <th>Active Till</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    
                    <tfoot>
                        <tr>
                            <th>Notice Title</th>
                            <th>Notice Type</th>
                            <th>Active From</th>
                            <th>Active Till</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    	<?php foreach($notices as $notice){ ?>
                        <tr>
                            <td><?php echo $notice->notice_title; ?></td>
                            <td style="text-transform:capitalize;"><?php echo $notice->notice_type; ?></td>
                            <td><?php list($year, $month, $day) = explode("-", $notice->active_from); echo $day."/".$month."/".$year; ?></td>
                            <td><?php list($year, $month, $day) = explode("-", $notice->active_till); echo $day."/".$month."/".$year; ?></td>
                            <td>
                            	<a href="<?php echo site_url("admin/create/".$notice->id); ?>">Edit</a>
                                &nbsp;|&nbsp;
                                <a href="<?php echo site_url("admin/delete/".$notice->id); ?>">Delete</a>
                                <?php if($notice->notice_file){ ?>
                                &nbsp;|&nbsp;
                                <a href="<?php echo base_url()."userfiles/notices/".$notice->notice_file; ?>" target="_blank">View</a>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php } ?>
                   	</tbody>
            </table>
        </div>
    </div>
</div>



<script type="text/javascript">
$(document).ready(function() {
	$('#example').dataTable();
});
</script>