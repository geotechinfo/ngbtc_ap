<script type="text/javascript" src="<?php echo base_url()?>public/js/jQuery.print.js"></script>
<div class="contentWrapper">

<style type="text/css">
    .appNumber {font-size: 20px;border-bottom: 2px #444 solid;padding: 10px;text-align: center;}
    .wrapper {width:800px;margin: 0 auto;}
    .gap {height:25px;}
    #instruction {border: 1px #BBB solid;padding: 10px;}
    .tbl{display: none}
    #application{display:none; }
</style>

<div class="wrapper">
<div id="instruction" style="">
    <p class="appNumber">        
        <span class="app_no">
            Application Number: <?php echo $application[0]['application_code'];?>
        </span> 
    </p>
     <table class="tbl">
        <tr>
            <td width="200" align="left"><img src="<?php echo base_url()?>public/images/logo.png" /></td>
            <td width="600" align="right">Application Number: <?php echo $application[0]['application_code'];?></td>
        </tr>
    </table>
    <div class="gap"></div>
    <p>Application No: <b><?php echo $application[0]['application_code'];?></b></p>
    <p>Applicant Nane: <b><?php echo $application[0]['first_name'];?> <?php echo $application[0]['last_name'];?></b></p>
    <p>Your Payable Amount: <b>Rs. 350</b></p>
    <p>
        You have to pay <b>Rs.350.</b> in our <b>SBI Account.</b><br>
        Our Bank Details:<br>
        Branch : <b>SBI Nihati branch</b><br>
        A/c No : <b>11051319403</b><br>
        IFSC No: <b>SBIN0001823</b><br>
        MICR : <b>700002235</b>

    </p>
    <div class="gap"></div>
    <p>Please Mention the "<b>Application No</b>" in deposite form at the time of payment.</p>
    <div class="gap"></div>
    <p>Please Update your payment details. <a href="<?php echo base_url()?>website/payment" target="_blank">Click here to update</a></p>
</div>
<div id="application">
<?php
    $title['mp'] ='MP.'; 
    $title['hs'] ='HS. (XII)'; 
    $title['bachelor_pass'] ='B.A. / B.Sc / B.Com only pass student'; 
    $title['bachelor_hons'] ='Hons. / spl. H. Combined Hons.'; 
    $title['masters'] ='M.A. / M.Sc. / M.Com.'; 
    $title['phd_mphil'] ='Ph. D/M.Phil'; 
?>
    <div style="border:1px #AAA solid;padding:10px;width:800px;margin:0 auto">
                            <table width="100%" cellpadding="10" cellspacing="5" align="center" border="0" style="border:none;border-bottom:1px #000 solid">
                                        <tr>
                                            <td align="center">
                                                <img src="<?php echo base_url()."public/images/logo.png" ?>" />
                                            </td>
                                        </tr>
                            </table>
                            <br /><br />

                            <table width="100%" cellpadding="10" cellspacing="5" align="center" border="1">
                                        <h4 style="width:800px;margin:0 auto">Personal Details</h4><br />
                                        <tr valign="top">
                                            <td width="33%"><b>Application Number:<i><?php echo $application[0]['application_code']?></i></b></td>
                                            <td width="33%"><b>Frist Name:</b><?php echo $application[0]['first_name']?></td>
                                            <td width="33%"><b>Last Name:</b><?php echo $application[0]['last_name']?></td>            
                                        </tr>

                                        <tr valign="top">
                                            <td><b>Date Of Birth:</b><?php echo date('d-M y',strtotime($application[0]['birth_date']))?></td>    
                                            <td><b>Gender:</b><?php echo $application[0]['gender']?></td>
                                            <td><b>Father Name:</b><?php echo $application[0]['father_name']?></td>
                                        </tr>
                                        <tr valign="top">
                                            <td><b>Husband Name:</b><?php echo $application[0]['husband_name']?></td>
                                            <td><b>Scheduled Caste:</b><?php echo ($application[0]['is_sc']=='scheduledCaste'?'Yes':'No')?></td>
                                            <td><b>Scheduled Tribe:</b><?php echo ($application[0]['is_st']=='scheduledTribe'?'Yes':'No')?></td>
                                        </tr>
                                        <tr valign="top">
                                            <td><b>Handicapped:</b><?php echo ($application[0]['is_ph']=='handicapped'?'Yes':'No')?></td>
                                        </tr>
                            </table>
                            <br /><br />

                            <table width="100%" cellpadding="10" cellspacing="5" align="center" border="1">
                                        <h4 style="width:800px;margin:0 auto">Address Details</h4><br />
                                        <tr valign="top">
                                            <td width="33%"><b>Nationality:</b><?php echo $application[0]['nationality'];?></td>
                                            <td width="33%"><b>Domiciled:</b><?php echo $application[0]['domiciled']?></td>    
                                            <td width="33%"><b>Address:</b><p><?php echo nl2br($application[0]['address'])?></p></td>
                                        </tr>
                            </table>
                            <br /><br />

                            <table width="100%" cellpadding="10" cellspacing="5" align="center" border="1">
                                        <h4 style="width:800px;margin:0 auto">Qulification</h4><br />
                                        <tr valign="top">
                                            <td><b>Co-curricular Activities:</b><?php echo $application[0]['co_curricular']?></td>
                                            <td><b>Current University:</b><?php echo $application[0]['current_university']?></td>
                                            <td><b>Last University:</b><?php echo $application[0]['last_university']?></td>
                                        </tr>
                                        <tr valign="top">
                                            <td><b>Subject 1:</b><?php echo $application[0]['method_subject_first']?></td>
                                            <td><b>Subject 2:</b><?php echo $application[0]['method_subject_second']?></td>
                                            <td><b>Date of Signature:</b><?php echo date('d-M Y',strtotime($application[0]['dos']))?></td>
                                        </tr>
                                        <tr valign="top">
                                            <td><b>Employment:</b><p><?php echo nl2br($application[0]['employment'])?></p></td>
                                            <td colspan="2"><b>Last Exam Details:</b><p><?php echo nl2br($application[0]['last_exam_details'])?></p></td>        
                                        </tr>
                                        <tr>   
                                            <td colspan="3">
                                                <table width="100%" cellspacing="10" cellpadding="10" border="1">
                                                            <thead>
                                                                <tr>
                                                                    <th width="2%">#</th>
                                                                    <th width="18%">Name of Exams Passed</th>
                                                                    <th width="10%">Year of passing with Div. / Class</th>
                                                                    <th width="25%">Board / University</th>
                                                                    <th width="20%">Subjects Studied</th>
                                                                    <th width="10%">Full Marks</th>
                                                                    <th width="7%">Total Marks Obtained</th>
                                                                    <th width="8%">Percentage of Marks</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach($application[0]['exams'] as $k=>$v){?>
                                                                <tr>
                                                                    <td><?php echo ($k+1)?></td>
                                                                    <td>
                                                                        <?php echo $title[$v['exam_title']];?>
                                                                    </td>
                                                                    <td><?php echo $v['passing_year'];?></td>
                                                                    <td><?php echo $v['board'];?></td>
                                                                    <td><?php echo $v['subject'];?></td>
                                                                    <td align="right"><?php echo $v['full_marks'];?></td>
                                                                    <td align="right"><?php echo $v['total_marks'];?></td>
                                                                    <td align="right"><?php echo $v['percentage'];?></td>
                                                                </tr>
                                                                <?php }?>
                                                            </tbody>
                                                </table>                                        
                                            </td>
                                        </tr>
                                       
                            </table>
        </div>
</div>
<div class="gap"></div>
<div class="gap"></div>
    <div style="text-align:center">
        <button id="print_ins">Print Instruction</button>
        <button id="print_app">Print Application</button>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        //$.print('.wrapper');
        $('#print_ins').click(function(){
            $('#instruction').print({
                stylesheet : "<?php echo base_url()?>public/css/print.css",

            });
        });
        $('#print_app').click(function(){
            $('#application').show().print({
                stylesheet : "<?php echo base_url()?>public/css/print.css",
            }).hide();
        });
    });
</script>
</div>