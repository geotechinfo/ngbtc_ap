
<div class="contentWrapper">
<div class="pageHeader">Settings</div>

<?php echo form_open_multipart('admin/settings/',array('id'=>'frm_pwd'));?>
<div class="row">
    <div class="col-sm-4 col-sm-offset-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-title">Quota Management.</div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <?php foreach($list as $k=>$v){?>
                    <div class="col-sm-12">
                        <label><?php echo $v['attribute']?></label>
                        <input type="text" class="form-control" name="settings[<?php echo $v['id']?>]" id="<?php echo $v['attribute']?>" value="<?php echo $v['value']?>" placeholder="<?php echo $v['attribute']?>">
                        <div class="gap10">  </div>                  
                    </div>
                    <?php }?>
                    <div class="col-sm-12">
                        <button class="btn btn-warning btn-block">Update Settings</button>
                    </div>    
                </div>
            </div>
            
        </div>
    </div>
</div>

<?php echo form_close(); ?>	
<style type="text/css">
	#birth_date,#dos {
		cursor:pointer;
	}
	</style>
    <script type="text/javascript" src="<?php echo base_url();?>public/js/validation.js"></script>
    <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
    <script type="text/javascript">

    $(function(){
             
    });
    </script>
	
</div>