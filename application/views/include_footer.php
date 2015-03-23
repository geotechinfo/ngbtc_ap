<?php
	$admin  = $this->session->userdata("admin");
?>					
					<?php if(!isset($admin["username"])){?>
					<div class="footerLinks">
                        <a href="<?php echo base_url()?>website/cms/admission" class="btn btn-sm">Admission</a>
                        <a href="<?php echo base_url()?>website/cms/about_us" class="btn btn-sm">About Us</a>
						<a href="<?php echo base_url()?>website/cms/course" class="btn btn-sm">Courses Offered</a>
                        <a href="<?php echo base_url()?>website/cms/admission" class="btn btn-sm">Eligibility Criteria</a>
						<a href="<?php echo base_url()?>website/cms/faculty" class="btn btn-sm">Faculty</a>
						<a href="<?php echo base_url()?>website/cms/rules_regulations" class="btn btn-sm" >Rules & Regulations</a>
                        <a href="<?php echo base_url()?>website/cms/contact_us" class="btn btn-sm" >Contact Us</a>
                        <a href="<?php echo base_url()?>website/cms/library" class="btn btn-sm" >Library</a>
					</div>

					<div class="printAppl">
						<!--<div><a href="javascript:;" class="printAplLink">CLICK HERE FOR PROVISIONAL MERIT LIST OF ALL VALID APPLICANTS 2014</a></div>-->
						<a href="<?php echo base_url()."website/payment/"?>" class="btn btn-lg btn-default">Update Application Payment Details</a>
					</div>
					<?php }?>
				</div>
				<div class="gap40"></div>

				<div class="Notifooter">
					
					<p>Panpur, PO: Narayanpur, Dist: 24 Parganas(N), PIN:743126</p>
					<!--<p>
                    	Phone : (033) 2580 1826
                    	<?php if(!isset($admin["username"])){ ?>
                            &nbsp;|&nbsp;<a href="<?php echo site_url("admin/login"); ?>" style="color:#000000;">Admin Login</a>
                        <?php } ?>
                    </p>-->
				</div>

			</div>
		</div>
	</body>
</html>

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>