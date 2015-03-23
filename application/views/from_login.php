
<?php echo form_open('admin/login'); ?>
	<?php
    echo "<div class='error'>";
    if (isset($error)) {
        echo $error;
    }
    echo validation_errors();
    echo "</div>";
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