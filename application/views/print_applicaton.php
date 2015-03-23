
<div class="contentWrapper">
<div class="pageHeader">Print Application From</div>

<div class='error'>
<?php
if (isset($error)){
	echo $error;
}
echo validation_errors();
?>
</div>

<?php echo form_open_multipart('website/admission/'.$noticeid,array('id'=>'frm_print'));?>
<div class="row">
    <div class="col-sm-4 col-sm-offset-4">
        <div class="panel panel-success">
            <div class="panel-heading">
                <div class="panel-title">Application No.</div>
            </div>
            <div class="panel-body">
                <input type="text" class="form-control" name="applicartion_code" id="applicartion_code" placeholder="Application no">
                <div class="gap10"></div>
                <button class="btn btn-warning btn-block">Print</button>
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
        $('#frm_print').validate({
            rules:{
                'applicartion_code':{
                    required:true,
                    minlength:11,
                    pattern:/NBT([0-9]{2})-[0-9]{5}/
                }
            },
            submitHandler:function(form){
                url = '<?php echo base_url()."website/preview/"?>'+$('#applicartion_code').val();
                //alert(url);
                //window.open(url,'Print Application:'+$('#applicartion_code').val(),'width=1000, height=600');
                window.open(url);

            }
        });

        $('#print_btn').click(function(){
            
        });
    });
    </script>
	
</div>