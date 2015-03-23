<div class="notifications text-center">
    <h1>Notifications</h1>
    <div class="notificationHolder">
        <?php
        //print_r($notices);die;
        if(count($notices)>0){
        foreach($notices as $notice){
        //$display = true;
        ?>
        <div>
            <span><?php list($year, $month, $day) = explode("-", $notice->active_from); echo $day."/".$month."/".$year; ?></span>
            <?php if($notice->notice_file){ ?>
                <a href="<?php echo base_url()."userfiles/notices/".$notice->notice_file; ?>" target="_blank"><?php echo $notice->notice_title; ?></a>
            <?php }else{ ?>
                <a href="<?php echo site_url("website/admission/".$notice->id); ?>"><?php echo $notice->notice_title; ?></a>
            <?php } ?>

			<?php if($nodays=(strtotime(date('d-m-Y')) - strtotime($day."-".$month."-".$year))/ (60 * 60 * 24) < 2){ ?>
            <span class="newNotification">
                <img src="<?php echo base_url(); ?>/public/images/text.gif" alt="" />
            </span>
            <?php } ?>
        </div>
        <?php
        }
        }else{
        
        ?>
        <span>No active notices in notice board.</span>
        <?php
        }
        ?>
        <!--<div>
            <span>26.08.2014</span>
            <a href="javascript:;">Notice 2 - Important Notice for CU Registration - 2014-15</a>
        </div>
        <div>
            <span>14.08.2014</span>
            <a href="javascript:;">CU Registration - Documents Required</a>
        </div>
        <div>
            <span>14.08.2014</span>
            <a href="javascript:;">Important Notice for filling up of CU Registration Form</a>
                <span class="newNotification">
                    
                    <img src="<?php //echo base_url(); ?>/public/images/text.gif" alt="" />
                </span>
        </div>
        <div>
            <span>05.08.2014</span>
            <a href="javascript:;">Notice for Open Admission</a>
        </div>
        <div>
            <span>26.08.2014</span>
            <a href="javascript:;">Notice 2 - Important Notice for CU Registration - 2014-15</a>
        </div>
        <div>
            <span>14.08.2014</span>
            <a href="javascript:;">CU Registration - Documents Required</a>
        </div>
        <div>
            <span>14.08.2014</span>
            <a href="javascript:;">Important Notice for filling up of CU Registration Form</a>
                <span class="newNotification">
                    
                    <img src="<?php echo base_url(); ?>/public/images/text.gif" alt="" />
                </span>
        </div>
        <div>
            <span>05.08.2014</span>
            <a href="javascript:;">Notice for Open Admission</a>
        </div>
        <div>
            <span>26.08.2014</span>
            <a href="javascript:;">Notice 2 - Important Notice for CU Registration - 2014-15</a>
        </div>
        <div>
            <span>14.08.2014</span>
            <a href="javascript:;">CU Registration - Documents Required</a>
        </div>
        <div>
            <span>14.08.2014</span>
            <a href="javascript:;">Important Notice for filling up of CU Registration Form</a>
                <span class="newNotification">
                    
                    <img src="<?php echo base_url(); ?>/public/images/text.gif" alt="" />
                </span>
        </div>
        <div>
            <span>05.08.2014</span>
            <a href="javascript:;">Notice for Open Admission</a>
        </div>
        <div>
            <span>26.08.2014</span>
            <a href="javascript:;">Notice 2 - Important Notice for CU Registration - 2014-15</a>
        </div>
        <div>
            <span>14.08.2014</span>
            <a href="javascript:;">CU Registration - Documents Required</a>
        </div>
        <div>
            <span>14.08.2014</span>
            <a href="javascript:;">Important Notice for filling up of CU Registration Form</a>
                <span class="newNotification">
                    
                    <img src="<?php echo base_url(); ?>/public/images/text.gif" alt="" />
                </span>
        </div>
        <div>
            <span>05.08.2014</span>
            <a href="javascript:;">Notice for Open Admission</a>
        </div>
        <div>
            <span>26.08.2014</span>
            <a href="javascript:;">Notice 2 - Important Notice for CU Registration - 2014-15</a>
        </div>
        <div>
            <span>14.08.2014</span>
            <a href="javascript:;">CU Registration - Documents Required</a>
        </div>
        <div>
            <span>14.08.2014</span>
            <a href="javascript:;">Important Notice for filling up of CU Registration Form</a>
                <span class="newNotification">
                    
                    <img src="<?php echo base_url(); ?>/public/images/text.gif" alt="" />
                </span>
        </div>
        <div>
            <span>05.08.2014</span>
            <a href="javascript:;">Notice for Open Admission</a>
        </div>-->
    </div>