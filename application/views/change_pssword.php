
<div class="contentWrapper">
<div class="pageHeader">Change Password From</div>

<div class='error'>
<?php
if (isset($error)){
	echo $error;
}
echo validation_errors();
?>
</div>

<?php echo form_open_multipart('admin/change_password/',array('id'=>'frm_pwd'));?>
<div class="row">
    <div class="col-sm-4 col-sm-offset-4">
        <div class="panel panel-success">
            <div class="panel-heading">
                <div class="panel-title">Change Password.</div>
            </div>
            <div class="panel-body">
                <input type="password" class="form-control" name="new_passowrd" id="new_passowrd" placeholder="New Password">
                <div class="gap10"></div>
                <input type="password" class="form-control" name="conf_password" id="conf_password" placeholder="Confirm Password no">
                <div class="gap10"></div>
                <button class="btn btn-warning btn-block">Clange Password</button>
            </div>
            <div class="panel-footer"></div>
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
        $('#frm_pwd').validate({
            rules:{                
                'new_passowrd':{
                    required:true
                },
                'conf_password':{
                    equalTo:'#new_passowrd'
                }
            },
            errorClass:'text-danger'
        });       
    });
    </script>
	
</div>