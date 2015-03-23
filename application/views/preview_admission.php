<!DOCTYPE html>
<html lang="en">
    <head>
    <title>
        Application no:<?php echo (isset($application[0])?$application[0]['application_code']:'Invalid Application No')?>
    </title>
    <?php
        $title['mp'] ='MP.'; 
        $title['hs'] ='HS. (XII)'; 
        $title['bachelor_pass'] ='B.A. / B.Sc / B.Com only pass student'; 
        $title['bachelor_hons'] ='Hons. / spl. H. Combined Hons.'; 
        $title['masters'] ='M.A. / M.Sc. / M.Com.'; 
        $title['phd_mphil'] ='Ph. D/M.Phil'; 
    ?>
<style type="text/css">
body {
	font-family: Arial;
	background: none;
	color: black;
}
pre {font-family: Arial;}
table {
	page-break-inside:auto;
	border: 1px solid #666;
	padding: 10px;border-collapse: collapse;font-size: 14px;
}
tr    { page-break-inside:avoid; page-break-after:auto; }
#page {
	width: 100%;
	margin: 0; padding: 0;
	background: none;
}
#header, #menu-bar, #sidebar, h2#postcomment, form#commentform, #footer {
	display: none;
}
.entry a:after {
	content: " [" attr(href) "] ";
}

@media print{    
#print_button{
	display: none !important;
}
}
</style>
    </head>
    <body>
        
    <?php if(isset($application[0]['id'])){?>
        <div style="border:1px #AAA solid;padding:10px;width:800px;margin:0 auto">
                            <table width="800" cellpadding="10" cellspacing="5" align="center" border="0" style="border:none;border-bottom:1px #000 solid">
                                        <tr>
                                            <td align="center">
                                                <img src="<?php echo base_url()."public/images/logo.png" ?>" />
                                            </td>
                                        </tr>
                            </table>
                            <br /><br />

                            <table width="800" cellpadding="10" cellspacing="5" align="center" border="1">
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

                            <table width="800" cellpadding="10" cellspacing="5" align="center" border="1">
                                        <h4 style="width:800px;margin:0 auto">Address Details</h4><br />
                                        <tr valign="top">
                                            <td width="33%"><b>Nationality:</b><?php echo $application[0]['nationality'];?></td>
                                            <td width="33%"><b>Domiciled:</b><?php echo $application[0]['domiciled']?></td>    
                                            <td width="33%"><b>Address:</b><pre><?php echo $application[0]['address']?></pre></td>
                                        </tr>
                            </table>
                            <br /><br />

                            <table width="800" cellpadding="10" cellspacing="5" align="center" border="1">
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
                                            <td><b>Employment:</b><pre><?php echo $application[0]['employment']?></pre></td>
                                            <td colspan="2"><b>Last Exam Details:</b><pre><?php echo $application[0]['last_exam_details']?></pre></td>        
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
                                        <tr>
                                            <td colspan="3" align="center">
                                                <button type="button" onClick="window.print();" id="print_button">Print</button>
                                            </td>
                                        </tr>
                            </table>
        </div>
    <?php
        }else{
            echo "<center><h2>Invalid Application No</h2></center>";
        }
    ?>    

    </body>
</html>