
<div class="contentWrapper">
<p>
    <span class="text-danger">File upload is not mandatory.</span>
</p>
<div class="pageHeader"><?php if($noticeid != ""){ ?>Update Admission<?php }else{ ?>Admission Form<?php } ?></div>


<div class='error'>
<?php
if (isset($error)){
	echo $error;
}
echo validation_errors();
?>
</div>

<?php echo form_open_multipart('website/admission/'.$noticeid,array('id'=>'frm_admintion'));?>
	<div class="row">
	
    <div class="col-md-6">
    <label class="control-label">First Name <span class="text-danger">*</span></label>
    <input class="form-control" type="text" placeholder="First Name" name="firstname" value="<?php echo (isset($form_data['firstname'])?$form_data['firstname']:''); ?>" />
    </div>
    
    <div class="col-md-6">
        <label class="control-label">Last Name <span class="text-danger">*</span></label>
        <input class="form-control" type="text" placeholder="Last Name" name="lastname" value="<?php echo (isset($form_data['lastname'])?$form_data['lastname']:''); ?>" />                            
    </div>
	</div>
    
    <div class="row">
	<div class="col-md-6">
        <div class="row">
            <div class="col-sm-12">
                <label class="control-label">Date of Birth <span class="text-danger">* <small>(Enclose attested copy of related Admit Card/ Certificate to be enclosed) </small></span></label>
            </div>
            <div class="col-sm-4">
                
                <input type="text" name="birthdate" value="<?php echo (isset($form_data['birthdate'])?$form_data['birthdate']:''); ?>" id="birth_date" readonly="readonly" class="form-control"/>
            </div>
            <div class="col-sm-8">
                <input type="file" name="dob_file">
            </div>
        </div>

    </div>
    
    <div class="col-md-6">
    <label class="control-label">Gender <span class="text-danger">*</span></label>
    <div class="clear-fix">
    <?php //echo $type; ?>
    		<label class="radio-inline" style="margin-top:10px; margin-bottom:10px;">
                <input type="radio" value="male" name="gender" <?php echo ($form_data['gender']=='male'?'checked':''); ?> <?php echo ($form_data['gender']==''?'checked':''); ?>/>  Male
            </label>
            <label class="radio-inline marginTopBottom10" style="margin-top:10px; margin-bottom:10px;">
                <input type="radio" value="female" name="gender" <?php echo ($form_data['gender']=='female'?'checked':''); ?>   />  Female
            </label>
    	</div>	
           
    </div>
    
    </div>
    
    <div class="row">
    
	<div class="col-md-6">
    	<label class="control-label">Last Qualification with Subjects<span class="text-danger">*</span></label>
            <div class="row">
                <div class="col-md-6 ">
                <input type="text" class="form-control" name="lastqualification" value="<?php echo (isset($form_data['lastqualification'])?$form_data['lastqualification']:''); ?>" placeholder="Last Qualification"/>
                </div>
                <div class="col-md-6 ">
                <input type="text" class="form-control" name="subject" value="<?php echo (isset($form_data['subject'])?$form_data['subject']:''); ?>" placeholder="Subjects"/>
                </div>
            </div>

    </div>
	
    <div class="col-md-6">
    <label class="control-label">Father's Name <span class="text-danger">*</span></label>
    <input class="form-control" type="text" placeholder="Father's Name " value="<?php echo (isset($form_data['fathername'])?$form_data['fathername']:''); ?>" name="fathername"/>
    </div>
    
    </div>
    
    <div class="row">
        <div class="col-md-6">
        <label class="control-label">Husband's Name </label>
        <input class="form-control" type="text" placeholder="Husband's Name" value="<?php echo (isset($form_data['husbandname'])?$form_data['husbandname']:''); ?>" name="husbandname"/>
        </div>
        <div class="col-md-6">
        <label class="control-label">Nationality <span class="text-danger">*</span></label>
        <input class="form-control" type="text" placeholder="Nationality" value="<?php echo (isset($form_data['nationality'])?$form_data['nationality']:''); ?>" name="nationality"/>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6">
        <label class="control-label">Whether Domiciled in West Bengal 
            <input type="checkbox" value="Yes" <?php echo (isset($form_data['domicile']) && $form_data['domicile']=='Yes' ?'checked':''); ?> name="domicile"/>
        </label>
        <div class="gap10"></div>
        <label class="control-label">Upload your Domiciled Certificate</label>
        <input type="file" name="domiciled_file" />
        </div>
        <div class="col-md-6">
        <div class="control-label">
            If Sceduled Caste <span class="text-danger">*</span>
            <input name="is_sc" value="scheduledCaste" <?php echo ($form_data['is_sc']=='scheduledCaste'?'checked':''); ?> type="radio"> Yes
            &nbsp;&nbsp;
            <input name="is_sc" value="notScheduledCaste" <?php echo ($form_data['is_sc']=='notScheduledCaste'?'checked':''); ?> <?php echo ($form_data['is_sc']==''?'checked':''); ?> type="radio"> No
        </div>
        <label class="control-label">Upload Your SC Certificate</label>
        <input type="file" name="sc_file" />
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
        <div class="control-label">
            If Sceduled Tribe  <span class="text-danger">*</span>
            <input name="is_st" value="scheduledTribe" <?php echo ($form_data['is_st']=='scheduledTribe'?'checked':''); ?> type="radio"> Yes
            &nbsp;&nbsp;
            <input name="is_st" value="notScheduledTribe" <?php echo ($form_data['is_st']=='notScheduledTribe'?'checked':''); ?> <?php echo ($form_data['is_st']==''?'checked':''); ?>  type="radio"> No
        </div>
        <label class="control-label">Upload your ST Certificate</label>
        <input type="file" name="st_file" />
        </div>
        <div class="col-md-6">
        <div class="control-label">
            Whether Physically Handicapped <span class="text-danger">*</span>
            <input name="is_ph" value="handicapped" <?php echo ($form_data['is_ph']=='handicapped'?'checked':''); ?> type="radio"> Yes
            &nbsp;&nbsp;
            <input name="is_ph" value="notHandicapped" <?php echo ($form_data['is_ph']=='notHandicapped'?'checked':''); ?> <?php echo ($form_data['is_ph']==''?'checked':''); ?> checked type="radio"> No
        </div>
        <label class="control-label">Upload your Physically Handicapped certificate</label>
        <input type="file" name="ph_file" />
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <label class="control-label">If Employed, state particulars </label>
            <textarea class="form-control" type="text" value="<?php echo (isset($form_data['employment'])?$form_data['employment']:''); ?>" placeholder="Employment particulars" name="employment"></textarea>
        </div>
        <div class="col-md-6">
            <label class="control-label">Permanent Address with Pin code and Phone number <span class="text-danger">*</span></label>
            <textarea class="form-control" type="text" value="<?php echo (isset($form_data['address'])?$form_data['address']:''); ?>" placeholder="Address" name="address"></textarea>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
        <label class="control-label">Name of the University in which the applicant has been studying at present <span class="text-danger">*</span></label>
        <input class="form-control" type="text" value="<?php echo (isset($form_data['current_university'])?$form_data['current_university']:''); ?>" placeholder="University Name" name="current_university"/>
        </div>
        <div class="col-md-6">
        <label class="control-label">Name of the University in which the applicant sudied last <span class="text-danger">*</span></label>
        <input class="form-control" type="text" value="<?php echo (isset($form_data['last_university'])?$form_data['last_university']:''); ?>" placeholder="University Name" name="last_university"/>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <label class="control-label">Particulars of the University Examination which he / she is due to appear  within period from 01.07.2008 to 15.05.2009 <span class="text-danger">*</span></label>
            <textarea class="form-control" type="text" placeholder="Particulars of Examination" name="lastExamDetails"><?php echo (isset($form_data['lastExamDetails'])?$form_data['lastExamDetails']:''); ?></textarea>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered dataTable" id="exam_table">
                    <thead>
                        <tr>
                            <th>Name of Exams Passed</th>
                            <th>Year of passing with Div. / Class</th>
                            <th>Board / University</th>
                            <th>Subjects Studied</th>
                            <th>Full Marks</th>
                            <th>Total Marks Obtained</th>
                            <th>Percentage of Marks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input type="hidden" name="exam[mp][title]" value="mp" >
                                <input type="hidden" name="exam[mp][rate]" value="0.10" >
                                <input type="checkbox" checked disabled value="mp" > 
                                MP.
                            </td>
                            <td><input type="text" name="exam[mp][passing_year]" value="<?php echo (isset($form_data['exam']['mp']['passing_year'])?$form_data['exam']['mp']['passing_year']:''); ?>" class="form-control"></td>
                            <td><input type="text" name="exam[mp][board]" value="<?php echo (isset($form_data['exam']['mp']['board'])?$form_data['exam']['mp']['board']:''); ?>" class="form-control"></td>
                            <td><input type="text" name="exam[mp][subject]" value="<?php echo (isset($form_data['exam']['mp']['subject'])?$form_data['exam']['mp']['subject']:''); ?>" class="form-control"></td>
                            <td><input type="text" name="exam[mp][full_marks]" value="<?php echo (isset($form_data['exam']['mp']['full_marks'])?$form_data['exam']['mp']['full_marks']:''); ?>" class="form-control"></td>
                            <td><input type="text" name="exam[mp][total_marks]" value="<?php echo (isset($form_data['exam']['mp']['total_marks'])?$form_data['exam']['mp']['total_marks']:''); ?>" class="form-control"></td>
                            <td><input type="text" name="exam[mp][percentage]" value="<?php echo (isset($form_data['exam']['mp']['percentage'])?$form_data['exam']['mp']['percentage']:''); ?>" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>
                                <input type="hidden" name="exam[hs][title]" value="hs" >
                                <input type="hidden" name="exam[hs][rate]" value="0.20" >
                                <input type="checkbox" checked disabled value="hs" >HS. (XII)
                            </td>
                            <td><input type="text" name="exam[hs][passing_year]" value="<?php echo (isset($form_data['exam']['hs']['passing_year'])?$form_data['exam']['hs']['passing_year']:''); ?>" class="form-control"></td>
                            <td><input type="text" name="exam[hs][board]" value="<?php echo (isset($form_data['exam']['hs']['board'])?$form_data['exam']['hs']['board']:''); ?>" class="form-control"></td>
                            <td><input type="text" name="exam[hs][subject]" value="<?php echo (isset($form_data['exam']['hs']['subject'])?$form_data['exam']['hs']['subject']:''); ?>" class="form-control"></td>
                            <td><input type="text" name="exam[hs][full_marks]" value="<?php echo (isset($form_data['exam']['hs']['full_marks'])?$form_data['exam']['hs']['full_marks']:''); ?>" class="form-control"></td>
                            <td><input type="text" name="exam[hs][total_marks]" value="<?php echo (isset($form_data['exam']['hs']['total_marks'])?$form_data['exam']['hs']['total_marks']:''); ?>" class="form-control"></td>
                            <td><input type="text" name="exam[hs][percentage]" value="<?php echo (isset($form_data['exam']['hs']['percentage'])?$form_data['exam']['hs']['percentage']:''); ?>" class="form-control"></td>
                        </tr>
                        <tr class="">
                            <td>
                                <input type="hidden" name="exam[bachelor_pass][rate]" value="0.10" >
                                <input type="checkbox" name="exam[bachelor_pass][title]" class="cls_bachelor" checked value="bachelor_pass" >B.A. / B.Sc / B.Com only pass student
                            </td>
                            <td><input type="text" name="exam[bachelor_pass][passing_year]" value="<?php echo (isset($form_data['exam']['bachelor_pass']['passing_year'])?$form_data['exam']['bachelor_pass']['passing_year']:''); ?>" class="form-control"></td>
                            <td><input type="text" name="exam[bachelor_pass][board]" value="<?php echo (isset($form_data['exam']['bachelor_pass']['board'])?$form_data['exam']['bachelor_pass']['board']:''); ?>" class="form-control"></td>
                            <td><input type="text" name="exam[bachelor_pass][subject]" value="<?php echo (isset($form_data['exam']['bachelor_pass']['subject'])?$form_data['exam']['bachelor_pass']['subject']:''); ?>" class="form-control"></td>
                            <td><input type="text" name="exam[bachelor_pass][full_marks]" value="<?php echo (isset($form_data['exam']['bachelor_pass']['full_marks'])?$form_data['exam']['bachelor_pass']['full_marks']:''); ?>" class="form-control"></td>
                            <td><input type="text" name="exam[bachelor_pass][total_marks]" value="<?php echo (isset($form_data['exam']['bachelor_pass']['total_marks'])?$form_data['exam']['bachelor_pass']['total_marks']:''); ?>" class="form-control"></td>
                            <td><input type="text" name="exam[bachelor_pass][percentage]" value="<?php echo (isset($form_data['exam']['bachelor_pass']['percentage'])?$form_data['exam']['bachelor_pass']['percentage']:''); ?>" class="form-control"></td>
                        </tr>
                        <tr class="cls_dis">
                            <td>
                                <input type="hidden" name="exam[bachelor_hons][rate]" value="0.30" >
                                <input type="checkbox" name="exam[bachelor_hons][title]" class="cls_bachelor" <?php echo (isset($form_data['exam']['bachelor_hons']['title'])?'checked':'')?> value="bachelor_hons" >Hons. / spl. H. Combined Hons.
                            </td>
                            <td><input type="text" name="exam[bachelor_hons][passing_year]" value="<?php echo (isset($form_data['exam']['bachelor_hons']['passing_year'])?$form_data['exam']['bachelor_hons']['passing_year']:''); ?>" class="form-control"></td>
                            <td><input type="text" name="exam[bachelor_hons][board]" value="<?php echo (isset($form_data['exam']['bachelor_hons']['board'])?$form_data['exam']['bachelor_hons']['board']:''); ?>" class="form-control"></td>
                            <td><input type="text" name="exam[bachelor_hons][subject]" value="<?php echo (isset($form_data['exam']['bachelor_hons']['subject'])?$form_data['exam']['bachelor_hons']['subject']:''); ?>" class="form-control"></td>
                            <td><input type="text" name="exam[bachelor_hons][full_marks]" value="<?php echo (isset($form_data['exam']['bachelor_hons']['full_marks'])?$form_data['exam']['bachelor_hons']['full_marks']:''); ?>" class="form-control"></td>
                            <td><input type="text" name="exam[bachelor_hons][total_marks]" value="<?php echo (isset($form_data['exam']['bachelor_hons']['total_marks'])?$form_data['exam']['bachelor_hons']['total_marks']:''); ?>" class="form-control"></td>
                            <td><input type="text" name="exam[bachelor_hons][percentage]" value="<?php echo (isset($form_data['exam']['bachelor_hons']['percentage'])?$form_data['exam']['bachelor_hons']['percentage']:''); ?>" class="form-control"></td>
                        </tr>
                        <tr class="cls_dis">
                            <td>
                                <input type="hidden" name="exam[masters][rate]" value="0.35" >
                                <input type="checkbox" name="exam[masters][title]" <?php echo (isset($form_data['exam']['masters']['title'])?'checked':'')?> value="masters" >M.A. / M.Sc. / M.Com.
                            </td>
                            <td><input type="text" name="exam[masters][passing_year]" value="<?php echo (isset($form_data['exam']['masters']['passing_year'])?$form_data['exam']['masters']['passing_year']:''); ?>" class="form-control"></td>
                            <td><input type="text" name="exam[masters][board]" value="<?php echo (isset($form_data['exam']['masters']['board'])?$form_data['exam']['masters']['board']:''); ?>" class="form-control"></td>
                            <td><input type="text" name="exam[masters][subject]" value="<?php echo (isset($form_data['exam']['masters']['subject'])?$form_data['exam']['masters']['subject']:''); ?>" class="form-control"></td>
                            <td><input type="text" name="exam[masters][full_marks]" value="<?php echo (isset($form_data['exam']['masters']['full_marks'])?$form_data['exam']['masters']['full_marks']:''); ?>" class="form-control"></td>
                            <td><input type="text" name="exam[masters][total_marks]" value="<?php echo (isset($form_data['exam']['masters']['total_marks'])?$form_data['exam']['masters']['total_marks']:''); ?>" class="form-control"></td>
                            <td><input type="text" name="exam[masters][percentage]" value="<?php echo (isset($form_data['exam']['masters']['percentage'])?$form_data['exam']['masters']['percentage']:''); ?>" class="form-control"></td>
                        </tr>
                        <tr class="cls_dis">
                            <td>
                                <input type="hidden" name="exam[phd_mphil][title]"   value="phd_mphil" >
                                <input type="checkbox" name="exam[phd_mphil][rate]" <?php echo (isset($form_data['exam']['phd_mphil']['rate']) && $form_data['exam']['phd_mphil']['rate']=='phd'?"checked":''); ?> class="cls_chkone" value="5" >Ph. D 
                                <input type="checkbox" name="exam[phd_mphil][rate]" class="cls_chkone" <?php echo (isset($form_data['exam']['phd_mphil']['rate']) && $form_data['exam']['phd_mphil']['rate']=='mphil'?"checked":''); ?> value="3" >M.Phil
                            </td>
                            <td><input type="text" name="exam[phd_mphil][passing_year]" value="<?php echo (isset($form_data['exam']['phd_mphil']['passing_year'])?$form_data['exam']['phd_mphil']['phd_mphil']['passing_year']:''); ?>" class="form-control"></td>
                            <td><input type="text" name="exam[phd_mphil][board]" value="<?php echo (isset($form_data['exam']['phd_mphil']['board'])?$form_data['exam']['phd_mphil']['board']:''); ?>" class="form-control"></td>
                            <td><input type="text" name="exam[phd_mphil][subject]" value="<?php echo (isset($form_data['exam']['phd_mphil']['subject'])?$form_data['exam']['phd_mphil']['subject']:''); ?>" class="form-control"></td>
                            <td><input type="text" name="exam[phd_mphil][full_marks]" value="<?php echo (isset($form_data['exam']['phd_mphil']['full_marks'])?$form_data['exam']['phd_mphil']['full_marks']:''); ?>" class="form-control"></td>
                            <td><input type="text" name="exam[phd_mphil][total_marks]" value="<?php echo (isset($form_data['exam']['phd_mphil']['total_marks'])?$form_data['exam']['phd_mphil']['total_marks']:''); ?>" class="form-control"></td>
                            <td><input type="text" name="exam[phd_mphil][percentage]" value="<?php echo (isset($form_data['exam']['phd_mphil']['percentage'])?$form_data['exam']['phd_mphil']['percentage']:''); ?>" class="form-control"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4" style="height:75px;"><label>MP. file:</label><input type="file" name="mp_file"></div>
        <div class="col-sm-4" style="height:75px;"><label>HS. (XII) file:</label><input type="file" name="hs_file"></div>
        <div class="col-sm-4" style="height:75px;"><label>B.A./B.Sc/B.Com only pass student file:</label><input type="file" name="bachelor_pass_file"></div>
        <div class="col-sm-4" style="height:75px;"><label>Hons./Spl.H.Combined Hons. file:</label><input type="file" name="bachelor_hons_file"></div>
        <div class="col-sm-4" style="height:75px;"><label>M.A./M.Sc./M.Com file:</label><input type="file" name="masters_file"></div>
        <div class="col-sm-4" style="height:75px;"><label>Ph. D /M.Phil file:</label><input type="file" name="phd_mphil_file"></div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <label class="control-label">Co-curricular Activities</label>
            <input class="form-control" type="text" placeholder="Co-curricular Activities"  name="coCurricular" value="<?php echo (isset($form_data['coCurricular'])?$form_data['coCurricular']:''); ?>" />
        </div>
        <div class="col-sm-3">
            <label class="control-label">Upload Co-curricular Activities Certificate.</label>
            <input type="file" name="curricular_file" />
        </div>
        <div class="col-sm-3">
            <label class="control-label">The method subjects 1 likes to take <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="method_subject_first" placeholder="Method Subject One" value="<?php echo (isset($form_data['method_subject_first'])?$form_data['method_subject_first']:''); ?>" />
        </div>
        <div class="col-sm-3">
            <label class="control-label">The method subjects 2 likes to take <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="method_subject_second" placeholder="Method Subject Two" value="<?php echo (isset($form_data['method_subject_second'])?$form_data['method_subject_second']:''); ?>" />
        </div>
        
    </div>

    <div class="row">
        <div class="col-sm-4">
            <label class="control-label">Date</label>
             <input type="text" name="dos"  id="dos" readonly="readonly" class="form-control" value="<?php echo date('d/m/Y'); ?>" />

        </div>
        <br />
        <div class="col-sm-12">
            <p><input type="checkbox" checked disabled />&nbsp;I have read and understood the terms specified in the prospectus. The above statements are true to my knowledge.</p>
        </div>
    </div>    
	
<div class="row">
	
	<div class="col-md-12">
    	 <div class="divider"></div>
    	 <div class="text-right"><input type="submit" value="Submit" name="submit" class="btn btn-custom"/></div>
    </div>
</div>

<style type="text/css">
	#birth_date,#dos {
		cursor:pointer;
	}
	</style>
    <script type="text/javascript" src="<?php echo base_url();?>public/js/validation.js"></script>
    <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>

	<script type="text/javascript">
               $(function () {
                    $('#birth_date').datepicker({
                        changeYear:true,
                        changeMonth:true,
                        defaultDate: '31/07/1985',
                        "dateFormat": "dd/mm/yy"
                    });

                    
                    
                    $('#frm_admintion').validate({
                        rules:{
                            'firstname':{
                                required:true
                            },
                            'lastname':{
                                required:true
                            },
                            'birthdate':{
                                required:true
                            },
                            'dob_file':{
                                    // required:true,
                                    extension: "pdf|jpg|jpeg|png|gif",
                                    filesize:  2*1024*1024
                            },
                            'lastqualification':{
                                required:true
                            },
                            'subject':{
                                required:true
                            },
                            'gender':{
                                required:true
                            },
                            'fathername':{
                                required:true
                            },
                            'husbandname':{

                            },
                            'nationality':{
                                required:true
                            },
                            'domicile':{ },
                            'domiciled_file':{
                                    // required:{depends:function(){return $('[name="domicile"]').is(':checked')}},
                                    extension: "pdf|jpg|jpeg|png|gif",
                                    filesize:  2*1024*1024
                            },
                            'is_st':{},
                            'st_file':{
                                    // required:{depends:function(){return ($('[name="is_st"]:checked').val()=='scheduledTribe'?true:false)}},
                                    extension: "pdf|jpg|jpeg|png|gif",
                                    filesize:  2*1024*1024
                            },
                            'is_sc':{},
                            'sc_file':{
                                    // required:{depends:function(){return ($('[name="is_sc"]:checked').val()=='scheduledCaste'?true:false)}},
                                    extension: "pdf|jpg|jpeg|png|gif",
                                    filesize:  2*1024*1024
                            },
                            'is_ph':{},
                            'ph_file':{
                                    // required:{depends:function(){return ($('[name="is_ph"]:checked').val()=='handicapped'?true:false)}},
                                    extension: "pdf|jpg|jpeg|png|gif",
                                    filesize:  2*1024*1024
                            },
                            'employment':{},
                            'address':{
                                required:true
                            },
                            'current_university':{},
                            'last_university':{},
                            'lastExamDetails':{},
                            'exam[mp][passing_year]':{
                                required:true,
                                digits:true,
                                minlength:4,
                                maxlength:4
                            },
                            'exam[mp][board]':{
                                required:true,
                            },
                            'exam[mp][subject]':{
                                required:true,
                            },
                            'exam[mp][full_marks]':{
                                required:true,
                                digits:true
                            },
                            'exam[mp][total_marks]':{
                                required:true,
                                digits:true
                            },
                            'exam[mp][percentage]':{
                                required:true,
                                number:true
                            },
                            'exam[hs][passing_year]':{
                                required:true,
                                digits:true,
                                minlength:4,
                                maxlength:4
                            },
                            'exam[hs][board]':{
                                required:true,
                            },
                            'exam[hs][subject]':{
                                required:true,
                            },
                            'exam[hs][full_marks]':{
                                required:true,
                                digits:true
                            },
                            'exam[hs][total_marks]':{
                                required:true,
                                digits:true
                            },
                            'exam[hs][percentage]':{
                                required:true,
                                number:true
                            },
                            'exam[bachelor_pass][passing_year]':{
                                required:{depends:function(){return $('[name="exam[bachelor_pass][title]"]').is(":checked")}},
                                digits:true,
                                minlength:4,
                                maxlength:4
                            },
                            'exam[bachelor_pass][board]':{
                                required:{depends:function(){return $('[name="exam[bachelor_pass][title]"]').is(":checked")}},
                            },
                            'exam[bachelor_pass][subject]':{
                                required:{depends:function(){return $('[name="exam[bachelor_pass][title]"]').is(":checked")}},
                            },
                            'exam[bachelor_pass][full_marks]':{
                                required:{depends:function(){return $('[name="exam[bachelor_pass][title]"]').is(":checked")}},
                                digits:true
                            },
                            'exam[bachelor_pass][total_marks]':{
                                required:{depends:function(){return $('[name="exam[bachelor_pass][title]"]').is(":checked")}},
                                digits:true
                            },
                            'exam[bachelor_pass][percentage]':{
                                required:{depends:function(){return $('[name="exam[bachelor_pass][title]"]').is(":checked")}},
                                number:true,
                            },
                            'exam[bachelor_hons][passing_year]':{
                                required:{depends:function(){return $('[name="exam[bachelor_hons][title]"]').is(":checked")}},
                                digits:true,
                                minlength:4,
                                maxlength:4
                            },
                            'exam[bachelor_hons][board]':{
                                required:{depends:function(){return $('[name="exam[bachelor_hons][title]"]').is(":checked")}},
                            },
                            'exam[bachelor_hons][subject]':{
                                required:{depends:function(){return $('[name="exam[bachelor_hons][title]"]').is(":checked")}},
                            },
                            'exam[bachelor_hons][full_marks]':{
                                required:{depends:function(){return $('[name="exam[bachelor_hons][title]"]').is(":checked")}},
                                digits:true
                            },
                            'exam[bachelor_hons][total_marks]':{
                                required:{depends:function(){return $('[name="exam[bachelor_hons][title]"]').is(":checked")}},
                                digits:true
                            },
                            'exam[bachelor_hons][percentage]':{
                                required:{depends:function(){return $('[name="exam[bachelor_hons][title]"]').is(":checked")}},
                                number:true
                            },
                            'exam[masters][passing_year]':{
                                required:{depends:function(){return $('[name="exam[masters][title]"]').is(":checked")}},
                                digits:true,
                                minlength:4,
                                maxlength:4
                            },
                            'exam[masters][board]':{
                                required:{depends:function(){return $('[name="exam[masters][title]"]').is(":checked")}},
                            },
                            'exam[masters][subject]':{
                                required:{depends:function(){return $('[name="exam[masters][title]"]').is(":checked")}},
                            },
                            'exam[masters][full_marks]':{
                                required:{depends:function(){return $('[name="exam[masters][title]"]').is(":checked")}},
                                digits:true
                            },
                            'exam[masters][total_marks]':{
                                required:{depends:function(){return $('[name="exam[masters][title]"]').is(":checked")}},
                                digits:true
                            },
                            'exam[masters][percentage]':{
                                required:{depends:function(){return $('[name="exam[masters][title]"]').is(":checked")}},
                                number:true
                            },
                            'exam[phd_mphil][passing_year]':{
                                required:{depends:function(){return $('[name="exam[phd_mphil][title]"]').is(":checked")}},
                                digits:true,
                                minlength:4,
                                maxlength:4
                            },
                            'exam[phd_mphil][board]':{
                                required:{depends:function(){return $('[name="exam[phd_mphil][rate]"]').is(":checked")}},
                            },
                            'exam[phd_mphil][subject]':{
                                required:{depends:function(){return $('[name="exam[phd_mphil][rate]"]').is(":checked")}},
                            },
                            'exam[phd_mphil][full_marks]':{
                                required:{depends:function(){return $('[name="exam[phd_mphil][rate]"]').is(":checked")}},
                                digits:true
                            },
                            'exam[phd_mphil][total_marks]':{
                                required:{depends:function(){return $('[name="exam[phd_mphil][rate]"]').is(":checked")}},
                                digits:true
                            },
                            'exam[phd_mphil][percentage]':{
                                required:{depends:function(){return $('[name="exam[phd_mphil][rate]"]').is(":checked")}},
                                number:true
                            },
                            'dos':{required:true},
                            'mp_file':{
                                    // required:true, 
                                    extension: "jpg|jpeg|gif|png|pdf", 
                                    filesize:  2*1024*1024
                            },
                            'hs_file':{
                                    // required:true, 
                                    extension: "jpg|jpeg|gif|png|pdf", 
                                    filesize:  2*1024*1024
                            },
                            'bachelor_pass_file':{
                                    // required:{depends:function(){return $('[name="exam[bachelor_pass][title]"]').is(":checked")}}, 
                                    extension: "jpg|jpeg|gif|png|pdf",
                                    filesize:  2*1024*1024
                            },
                            'bachelor_hons_file':{
                                    required:{depends:function(){return $('[name="exam[bachelor_hon][title]"]').is(":checked")}}, 
                                    extension: "jpg|jpeg|gif|png|pdf",
                                    filesize:  2*1024*1024
                            },
                            'masters_file':{
                                    // required:{depends:function(){return $('[name="exam[masters][title]"]').is(":checked")}},
                                    extension: "jpg|jpeg|gif|png|pdf",
                                    filesize:  2*1024*1024
                            },
                            'phd_mphil_file':{
                                    /*required:{depends:function(){return $('[name="exam[phd_mphil][rate]"]').is(":checked")}}, */
                                    extension: "jpg|jpeg|gif|png|pdf"
                            },
                        },
                        errorClass:'text-danger',
                        errorElement:'small',
                        messages:{
                            'dob_file':{filesize:'Filesize must be under 2mb'},
                            'st_file':{filesize:'Filesize must be under 2mb'},
                            'sc_file':{filesize:'Filesize must be under 2mb'},
                            'ph_file':{filesize:'Filesize must be under 2mb'},
                            'mp_file':{filesize:'Filesize must be under 2mb'},
                            'hs_file':{filesize:'Filesize must be under 2mb'},
                            'bachelor_pass_file':{filesize:'Filesize must be under 2mb'},
                            'bachelor_hons_file':{filesize:'Filesize must be under 2mb'},
                            'masters_file':{filesize:'Filesize must be under 2mb'},
                            'phd_mphil_file':{filesize:'Filesize must be under 2mb'}
                        }
                    });
                    
                    $('.cls_chkone').click(function(){
                        $('.cls_chkone').prop('checked',false);
                        $(this).prop('checked',true);
                    });
                    $.validator.addMethod('filesize', function(value, element, param) {
                        return this.optional(element) || (element.files[0].size <= param) 
                    });
                    $('#exam_table input:checkbox').click(function(){
                        var r = $(this).prop('checked');
                        $(this).closest('tr').find('input:text').prop('readonly',(r==true?false:true));
                    });
                     $('.cls_bachelor').click(function(){
                       $('.cls_bachelor').prop('checked',false);
                       $('.cls_bachelor').closest('tr').find('input:text').prop('readonly',true);
                       $(this).prop('checked',true);
                       $(this).closest('tr').find('input:text').prop('readonly',false);
                    });
                    $('.cls_dis input:text').prop('readonly',true);
                });

             
                
	</script>
<?php echo form_close(); ?>
</div>