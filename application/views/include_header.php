<?php
    $admin  = $this->session->userdata("admin");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Admission Portal Nandalal B.T. College</title>
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
		<link rel="icon" href="favicon.ico" type="image/x-icon">
        
		<!-- Bootstrap -->
		<link href="<?php echo base_url(); ?>/public/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>/public/css/style.css" rel="stylesheet">
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		 <!--[if lt IE 9]>
		 	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		 	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		 <![endif]-->
         <script type="text/javascript" src="<?php echo base_url(); ?>/public/jquery/jquery-1.11.2.min.js"></script>
         <script type="text/javascript" src="<?php echo base_url(); ?>/public/js/bootstrap.min.js"></script>
         
         <link href="//cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
         <script type="text/javascript" src="//cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js"></script>
         <script type="text/javascript" src="//cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.js"></script>
	</head>
	<body>
		<div class="admissionHolder">
			<div class="container">
				<div class="logoHolder">
					<div class="row">
                        <div class="col-sm-4 text-left">
                            <a href="<?php echo base_url(); ?>">
                                <img src="<?php echo base_url(); ?>/public/images/logo_b.png" alt="" class="img-responsive" />
                            </a>
                        </div> 
                        <div class="col-sm-8 text-right">
                               <h1>Nandalal Ghosh B.T. College</h1>
                        </div>              
                    </div>
				</div>
                        
                <div class="navigationwrap">
                    <?php if(isset($admin["username"])){ ?>
                
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                        
                        <div class="navbar-header">
                          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                          </button>
                        </div>
                        
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      					<?php
                            $fun = $this->uri->segment(2,'');
                            $admin= $this->session->userdata("admin");
                        ?>
                        	 <ul class="nav navbar-nav">
                                 <li class="welcomemessage">Welcome <?php echo $this->session->userdata["admin"]["username"]; ?>,</li>
                                 <li class="<?php echo ($fun=='notice')?'active':''?>"><a href="<?php echo site_url("admin/notice"); ?>">Notice List</a></li>
                                 <li class="<?php echo ($fun=='create')?'active':''?>"><a href="<?php echo site_url("admin/create"); ?>">Create Notice</a> </li>
                                 <li class="<?php echo ($fun=='admission')?'active':''?>"><a href="<?php echo site_url("admin/admission"); ?>">Application List</a></li>
                                 <li class="<?php echo ($fun=='application_list')?'active':''?>"><a href="<?php echo site_url("admin/application_list"); ?>">Merit List</a></li>
                                 <li class="<?php echo ($fun=='change_password')?'active':''?>"><a href="<?php echo site_url("admin/change_password"); ?>">Change Password</a></li>
                                 <li class="<?php echo ($fun=='settings')?'active':''?>"><a href="<?php echo site_url("admin/settings"); ?>">Settings</a></li>
                             </ul>
                             <ul class="nav navbar-nav navbar-right">
                             	<li class="logoutBtn"><a href="<?php echo site_url("admin/logout"); ?>">Logout</a> </li>
                             </ul>
                       
                        </div>
                        </div>
                    </nav>
				     <?php } ?>
                
                </div>
<?php  $info =   $this->session->flashdata('success');?>
<?php if($info!=''){?>
<div class="alert alert-success" role="alert">
      <?php echo $info;?>
</div>
<?php }?>
<div class="gap40"></div>
                        