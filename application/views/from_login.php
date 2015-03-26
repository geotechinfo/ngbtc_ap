
<?php echo form_open('admin/login'); ?>
<?php
if (isset($error)) {
	echo "<div class='error alert-danger' style='width:555px; margin:0px auto 10px auto;'>";
	echo "<p>".$error."</p>";
	echo "</div>";
}
$verror =  validation_errors();
if($verror!=''){
	echo "<div class='alert alert-danger' style='width:555px; margin:0px auto 10px auto;'>".$verror."</div>";
}
?>


<div class="row">
    <div class="col-sm-6 col-sm-offset-3">
        <div class="panel panel-default">
            <div class="panel-body">
                <p class="pageHeader">Admin Login</p>
                <label class="control-label">User Name :</label>
                <input type="text" name="username" placeholder="Username" class="form-control" />

                <label class="control-label">Password :</label>
                <input type="password" name="password" placeholder="**********" class="form-control" />
                <div class="gap20"></div>
                <div class="text-right">
                    <input type="submit" value=" Login " name="submit" class="btn btn-custom" />
                </div>
            </div>
        </div>
    </div>
</div>
    <br />
    <br />
<?php echo form_close(); ?>