<!--<b><font color="#3B608C"><?php if($notice != ""){ ?>Update Notice<?php }else{ ?>Create Notice<?php } ?></font></b>-->


<?php
if (isset($error)){
    echo $error;
}
$verror =  validation_errors();
if($verror!=''){
    echo "<div class='alert alert-danger'>".$verror."</div>";
}
?>

<?php echo form_open_multipart('admin/create/'.$notice);?>

<div class="contentWrapper">
    <p class="pageHeader"><?php if($notice != ""){ ?>Update Notice<?php }else{ ?>Create Notice<?php } ?></p>
    <div class="row">
        <div class="col-sm-6">
            <label class="control-label">Notice Title <span class="text-danger">*</span> </label>
            <input type="text" name="title" value="<?php echo $title; ?>" class="form-control" />
        </div>
        <div class="col-sm-6">
            <label class="control-label">Active From <span class="text-danger">*</span>  </label>
            <input type="text" name="from" value="<?php echo $from; ?>" id="active_from" readonly="readonly" class="form-control" />
        </div>
        <div class="col-sm-6">
            <label class="control-label">Active Till <span class="text-danger">*</span>  </label>
            <input type="text" name="till" value="<?php echo $till; ?>" id="active_till" readonly="readonly" class="form-control" />
        </div>
        <div class="col-sm-6">
            <label class="control-label">Notice Type <span class="text-danger">*</span> </label>
            <div class="formElemHolder">
                <input type="radio" name="type" value="standard" <?php if($type == "" || $type == "standard"){ ?>checked="checked"<?php } ?> onclick="display_file();"/> Standard
            &nbsp;&nbsp;
            <input type="radio" name="type" value="admission" <?php if($type == "admission"){ ?>checked="checked"<?php } ?> onclick="display_file();"/> Admission
            </div>
        </div>
        <div class="col-sm-12 fileUpload">
            <label class="control-label">Attach PDF <span class="text-danger">*</span> </label>
            <div class="formElemHolder">
                <input name="attach" type="file" />
            </div>
        </div>
    </div>
    <div class="text-right">
        <input name="submit" type="submit" class="btn btn-custom" value="<?php if($notice != ""){ ?>Update<?php }else{ ?>Create<?php } ?>" />
    </div>
</div>

<style type="text/css">
#noticeform-date_from,
#noticeform-date_to{
    cursor:pointer !important;
}
</style>
<script type="text/javascript">
$(function () {
    $('#active_from').datepicker({
        "dateFormat": "dd/mm/yy"
    });
    $('#active_till').datepicker({
        "dateFormat": "dd/mm/yy"
    });
});
</script>

<script type="text/javascript">
$( document ).ready(function() {
    display_file();
});
function display_file(){
    if($('input[name="type"]:checked').val() == "standard"){
        $("#attach_file").css("display", "table-row");
                                        $(".fileUpload").show();
    }else{
        $("#attach_file").css("display", "none");
                                        $(".fileUpload").hide();
    }
}
</script>

<?php echo form_close(); ?>