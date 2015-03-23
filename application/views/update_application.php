
<div class="contentWrapper">
<div class="pageHeader">Application Payment Details</div>

<div class='error'>
<?php
if (isset($error)){
	echo $error;
}
echo validation_errors();
?>
</div>

<?php echo form_open_multipart('website/update_application/',array('id'=>'frm_print'));?>
<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <div class="panel panel-success">
            <div class="panel-heading">
                <div class="panel-title">Application No.</div>
            </div>
            <div class="panel-body">
                <div id="alert" style="display:none"></div>
                <div class="row">
                    <div class="col-sm-4">
                        <label class="control-label">Application No</label>
                        <input type="text" class="form-control" name="application_code" id="application_code" placeholder="Application no">
                    </div>
                    <div class="col-sm-4">
                        <label class="control-label">Date Of Birth</label>
                        <input type="text" class="form-control" name="birth_date" id="birth_date" readonly="" placeholder="Date of Birth">
                    </div>
                    <div class="col-sm-4">
                        <label class="control-label">Date Of Payment</label>
                        <input type="text" class="form-control" name="payment_date" readonly="" id="payment_date" placeholder="Payment Date">
                    </div>
                    <div class="col-sm-6">
                        <label class="control-label">Branch Name</label>
                        <input type="text" class="form-control" name="branch_name" id="branch_name" placeholder="Branch Name">
                    </div>
                    <div class="col-sm-6">
                        <label class="control-label">Transaction No</label>
                        <input type="text" class="form-control" name="txn_no" id="txn_no" placeholder="Transaction No">
                    </div>
                    <div class="col-sm-12">
                        <label class="control-label">Payment note</label>
                        <textarea class="form-control" name="payment_note" placeholder="Payment note"></textarea>                        
                    </div>
                    <div class="col-sm-12 text-center">
                        <div class="gap10"></div>
                        <button class="btn btn-warning ">Update</button>
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
        $('#birth_date').datepicker({
                        changeYear:true,
                        changeMonth:true,
                        defaultDate: '31/07/1985',
                        "dateFormat": "dd/mm/yy"
                    });

        $('#frm_print').validate({
            rules:{
                'application_code':{
                    required:true,
                    minlength:11,
                    pattern:/NBT([0-9]{2})-[0-9]{5}/,
                    remote:{
                        url:'<?php echo base_url()?>website/check',
                        type:'post',
                    }
                },
                'birth_date':{
                        required:true,                        
                    },
                'payment_date':{required:true,},
                'branch_name':{required:true,},
                'txn_no':{required:true,},
                'payment_note':{required:true,},
            },
            messages:{
                'application_code':{remote:'Please Enter Valid  Application No'},
                'birth_date':{remote:'Please Enter Valid Date of birth for this Application'}
            },
            errorElement:'small',
            errorClass:'text-danger',
            submitHandler:function(form){
                $.post(
                    $(form).attr('action'),
                    $(form).serialize(),
                    function(m){
                        var obj = $.parseJSON(m);
                        if(obj.status_code=='0'){
                            $('#alert').removeAttr('class').show().addClass('alert alert-warning').text(obj.message).delay(5000).fadeOut();
                        }else{
                            $('#alert').removeAttr('class').show().addClass('alert alert-success').text(obj.message).delay(5000).fadeOut();
                        }
                        $(form).find('input,textarea,select').val('');
                    }
                )
                return false;
            }
        });

       
        $('#payment_date').datepicker({maxDate: 0});
    });
    </script>
	
</div>