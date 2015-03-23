<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Website extends CI_Controller {
	public function __construct() {
		//error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
		
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('application');
	}
	public function index(){
		$data = array(
			"notices" => $this->application->fetch_notices("", true)
		);
		$this->load->view('include_header');
		$this->load->view('index_page', $data);
		$this->load->view('include_footer');
	}
	public function admission($notice_id){
		// /echo $this->input->post('domiciled_wb');die;
		if(isset($_POST['submit'])){
			//print_r($_FILES);die;
			$data['exams'] = $this->input->post('exam');

			$this->form_validation->set_rules('firstname', 'first name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('lastname', 'last name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('birthdate', 'date of birth', 'trim|required|xss_clean');
			$this->form_validation->set_rules('gender', 'gender', 'required|xss_clean');
			$this->form_validation->set_rules('lastqualification', 'Last Qualification', 'required|xss_clean');
			$this->form_validation->set_rules('subject', 'subject', 'required|xss_clean');
			$this->form_validation->set_rules('fathername', 'fathername', 'required|xss_clean');
			$this->form_validation->set_rules('nationality', 'nationality', 'required|xss_clean');
			$this->form_validation->set_rules('address', 'address', 'required|xss_clean');
			
			if ($this->form_validation->run() == true){	

				$upload_files = array();
				$this->load->library('upload');
				
				/*
					upload dob file
				*/
				if($_FILES['dob_file']['name']!=''){
					$config_sc = array(
						'upload_path' => "./userfiles/documents/",
						'allowed_types' => "pdf|jpg|jpeg|png|gif",
						//'overwrite' => TRUE,
						'max_size' => 1024*2,
					);
					$this->upload->initialize($config_sc);
					if(!$this->upload->do_upload("dob_file")){
						$upload_files['dob_file']["error"] = $this->upload->display_errors();
						$error = true;
					}else{
						$upload = $this->upload->data(); 
						//$filename = $upload['file_name'];
						$upload_files['dob_file'] = $upload;
					}
				}

				/*
					upload domicile file
				*/
				if($_FILES['domiciled_file']['name']!=''){
					$config_ph = array(
						'upload_path' => "./userfiles/documents/",
						'allowed_types' => "pdf|jpg|jpeg|png|gif",
						//'overwrite' => TRUE,
						'max_size' => 1024*2,
					);
					$this->upload->initialize($config_ph);
					if(!$this->upload->do_upload("domiciled_file")){
						$upload_files['domiciled_file']["error"] = $this->upload->display_errors();
						$error = true;
					}else{
						$upload = $this->upload->data(); 
						//$filename = $upload['file_name'];
						$upload_files['domiciled_file'] = $upload;
					}
				}



				/*
					upload sc file
				*/
				if($this->input->post('is_sc')=='scheduledCaste'){
					$config_sc = array(
						'upload_path' => "./userfiles/documents/",
						'allowed_types' => "pdf|jpg|jpeg|png|gif",
						//'overwrite' => TRUE,
						'max_size' => 1024*2,
					);
					$this->upload->initialize($config_sc);
					if(!$this->upload->do_upload("sc_file")){
						$upload_files['sc_file']["error"] = $this->upload->display_errors();
						$error = true;
					}else{
						$upload = $this->upload->data(); 
						//$filename = $upload['file_name'];
						$upload_files['sc_file'] = $upload;
					}
				}

				/*
					upload st file
				*/
				if($this->input->post('is_st')=='scheduledTribe'){
					$config_st = array(
						'upload_path' => "./userfiles/documents/",
						'allowed_types' => "pdf|jpg|jpeg|png|gif",
						//'overwrite' => TRUE,
						'max_size' => 1024*2,
					);
					$this->upload->initialize($config_st);
					if(!$this->upload->do_upload("st_file")){
						$upload_files['st_file']["error"] = $this->upload->display_errors();
						$error = true;
					}else{
						$upload = $this->upload->data(); 
						//$filename = $upload['file_name'];
						$upload_files['st_file'] = $upload;
					}
				}


				/*
					upload ph file
				*/
				if($this->input->post('is_ph')=='handicapped'){
					$config_ph = array(
						'upload_path' => "./userfiles/documents/",
						'allowed_types' => "pdf|jpg|jpeg|png|gif",
						//'overwrite' => TRUE,
						'max_size' => 1024*2,
					);
					$this->upload->initialize($config_ph);
					if(!$this->upload->do_upload("ph_file")){
						$upload_files['ph_file']["error"] = $this->upload->display_errors();
						$error = true;
					}else{
						$upload = $this->upload->data(); 
						//$filename = $upload['file_name'];
						$upload_files['ph_file'] = $upload;
					}
				}

				

				/*
					upload curricular file
				*/
				if($_FILES['curricular_file']['name']!=''){
					$config_cu = array(
						'upload_path' => "./userfiles/documents/",
						'allowed_types' => "pdf|jpg|jpeg|png|gif",
						//'overwrite' => TRUE,
						'max_size' => 1024*2,
					);
					$this->upload->initialize($config_cu);
					if(!$this->upload->do_upload("curricular_file")){
						$upload_files['curricular_file']["error"] = $this->upload->display_errors();
						$error = true;
					}else{
						$upload = $this->upload->data(); 
						//$filename = $upload['file_name'];
						$upload_files['curricular_file'] = $upload;
					}
				}

				/*
					upload mp file
				*/
				$config_exm_file = array(
						'upload_path' => "./userfiles/documents/",
						'allowed_types' => "pdf|jpg|jpeg|png|gif",
						//'overwrite' => TRUE,
						'max_size' =>1024*2,
					);
				if($_FILES['mp_file']['name']!=''){
					
					$this->upload->initialize($config_exm_file);
					$data['exams']['mp']['file_name']="";
					if(!$this->upload->do_upload("mp_file")){
						$upload_files['mp_file']["error"] = $this->upload->display_errors();
						$error = true;
					}else{
						$upload = $this->upload->data(); 
						//$filename = $upload['file_name'];
						$upload_files['mp_file'] = $upload;
						$data['exams']['mp']['file_name']=$upload['file_name'];
					}
				}

				/*
					upload hs file
				*/
				if($_FILES['hs_file']['name']!=''){
					$this->upload->initialize($config_exm_file);
					$data['exams']['hs']['file_name']='';
					if(!$this->upload->do_upload("hs_file")){
						$upload_files['hs_file']["error"] = $this->upload->display_errors();
						$error = true;
					}else{
						$upload = $this->upload->data(); 
						//$filename = $upload['file_name'];
						$upload_files['hs_file'] = $upload;
						$data['exams']['hs']['file_name']=$upload['file_name'];
					}
				}

				/*
					upload bachelor_pass file
				*/
				if($_FILES['bachelor_pass_file']['name']!=''){
					$this->upload->initialize($config_exm_file);
					$data['exams']['bachelor_pass']['file_name']="";
					if(!$this->upload->do_upload("bachelor_pass_file")){
						$upload_files['bachelor_pass_file']["error"] = $this->upload->display_errors();
						$error = true;
					}else{
						$upload = $this->upload->data(); 
						//$filename = $upload['file_name'];
						$upload_files['bachelor_pass_file'] = $upload;
						$data['exams']['bachelor_pass']['file_name']=$upload['file_name'];
					}
				}
				
				/*
					upload bachelor_hons file
				*/
				if($_FILES['bachelor_hons_file']['name']!=''){
					$this->upload->initialize($config_exm_file);
					$data['exams']['bachelor_hons']['file_name']="";
					if(!$this->upload->do_upload("bachelor_hons_file")){
						$upload_files['bachelor_hons_file']["error"] = $this->upload->display_errors();
						$error = true;
					}else{
						$upload = $this->upload->data(); 
						//$filename = $upload['file_name'];
						$upload_files['bachelor_hons_file'] = $upload;
						$data['exams']['bachelor_hons']['file_name']=$upload['file_name'];
					}
				}

				/*
					upload masters_file file
				*/
				if($_FILES['masters_file']['name']!=''){
					$this->upload->initialize($config_exm_file);
					$data['exams']['masters']['file_name']='';
					if(!$this->upload->do_upload("masters_file")){
						$upload_files['masters_file']["error"] = $this->upload->display_errors();
						$error = true;
					}else{
						$upload = $this->upload->data(); 
						//$filename = $upload['file_name'];
						$upload_files['masters_file'] = $upload;
						$data['exams']['masters']['file_name']=$upload['file_name'];
					}
				}

				/*
					upload bachelor_pass file
				*/
				if($_FILES['phd_mphil_file']['name']!=''){
					$this->upload->initialize($config_exm_file);
					$data['exams']['phd_mphil']['file_name']='';
					if(!$this->upload->do_upload("phd_mphil_file")){
						$upload_files['phd_mphil_file']["error"] = $this->upload->display_errors();
						$error = true;
					}else{
						$upload = $this->upload->data(); 
						//$filename = $upload['file_name'];
						$upload_files['phd_mphil_file'] = $upload;
						$data['exams']['phd_mphil']['file_name']=$upload['file_name'];
					}
				}
				

				//echo "<pre>";print_r($upload_files);print_r($data['exams']);die;


				//echo "<pre>";print_r($_FILES);print_r($this->input->post());print_r($upload_files);die;
				//if($error != true){
					list($day, $month, $year) = explode("/", $this->input->post("birthdate"));
					list($sday, $smonth, $syear) = explode("/", $this->input->post("dos"));
					$birthdate = $year."-".$month."-".$day;
					$dos = $syear."-".$smonth."-".$sday;
						$data['notice_id'] = $notice_id;
						$data['first_name']= $this->input->post("firstname");
						$data['last_name']=$this->input->post("lastname");
						$data['birth_date']= $birthdate;
						$data['gender']= $this->input->post("gender");
						$data['document']= (isset($upload_files['document_file']['file_name'])?$upload_files['document_file']['file_name']:'');
						$data['last_qualification']=$this->input->post('lastqualification');
						$data['subject']=$this->input->post('subject');
						$data['father_name']=$this->input->post('fathername');
						$data['husband_name']=$this->input->post('husbandname');
						$data['nationality']=$this->input->post('nationality');
						$data['is_sc']=$this->input->post('is_sc');
						$data['sc_file']=(isset($upload_files['sc_file']['file_name'])?$upload_files['sc_file']['file_name']:'');
						$data['is_st']=$this->input->post('is_st');
						$data['st_file']=(isset($upload_files['st_file']['file_name'])?$upload_files['st_file']['file_name']:'');
						$data['is_ph']=$this->input->post('is_ph');
						$data['ph_file']=(isset($upload_files['ph_file']['file_name'])?$upload_files['ph_file']['file_name']:'');
						$data['employment']=$this->input->post('employment');
						$data['address']=$this->input->post('address');
						$data['current_university']=$this->input->post('current_university');
						$data['last_university']=$this->input->post('last_university');
						$data['last_exam_details']=$this->input->post('lastExamDetails');
						$data['co_curricular']=$this->input->post('coCurricular');
						$data['method_subject_first']=$this->input->post('method_subject_first');
						$data['method_subject_second']=$this->input->post('method_subject_second');
						$data['dos']=$dos;
						$data['domiciled_wb']=$this->input->post('domiciled_wb');
						$data['domiciled_wb']= ($data['domiciled_wb']==''?"No":$data['domiciled_wb']);
						$data['domiciled_file']=(isset($upload_files['domiciled_file']['file_name'])?$upload_files['domiciled_file']['file_name']:'');
					
					$appno = $this->application->create_admission($data);
					//$this->session->set_flashdata('success', 'Your application successfully saved. Your Application No:'.$appno);
					redirect("website/message/".md5($appno));exit;
				//}
			}
		}
		
		$data["noticeid"] = $notice_id;
		//if(isset($_POST['submit'])){
			$data['form_data'] = $this->input->post();
		//}
		
		
		$this->load->view('include_header');
		$this->load->view('form_admission', $data);
		$this->load->view('include_footer');
	}

	function preview($code=''){
		$condi = array('application_code'=>$code);
		$data  = array(
			'application'=>$this->application->fetch_application($condi)
		);
		//echo "<pre>";print_r($data);
		$this->load->view('preview_admission', $data);
	}
	/*
	function print_application(){
		$data = array();
		$this->load->view('include_header');
		$this->load->view('print_applicaton', $data);
		$this->load->view('include_footer');	
	}
	*/
	function cms($page=""){
		$this->load->view('include_header');
		
		if($page=='about_us'){
			$this->load->view('cms/about_us');
		}
		if($page=='course'){
			$this->load->view('cms/course');
		}
		if($page=='eligibility_criteria'){
			$this->load->view('cms/eligibility_criteria');
		}
		if($page=='faculty'){
			$this->load->view('cms/faculty');
		}
		if($page=='rules_regulations'){
			$this->load->view('cms/rules_regulations');
		}
		if($page=='contact_us'){
			$this->load->view('cms/contact_us');
		}
		if($page=='admission'){
			$this->load->view('cms/admission');
		}
		if($page=='library'){
			$this->load->view('cms/library');
		}
		$this->load->view('include_footer');	
		
	}

	function message($appno=''){
		$condi = array('md5(application_code)'=>$appno);
		$data  = array(
			'application'=>$this->application->fetch_application($condi)
		);
		//echo "<pre>";print_r($data);
		$this->load->view('include_header');
		$this->load->view('message', $data);
		$this->load->view('include_footer');	
	}

	function payment(){	
		
		$data = array();
		$this->load->view('include_header');
		$this->load->view('update_application', $data);
		$this->load->view('include_footer');

	}

	function update_application(){
		$p = $this->input->post();
		$condi = array('application_code'=>$p['application_code'],'payment_status'=>0,'birth_date'=>$p['birth_date']);
		$row = $this->application->fetch_application($condi);
		$json  = array();
		if(count($row)){
			
			$data =$p;
			unset($data['application_code']);
			$data['payment_status'] = 1;
			list($m,$d,$y) = explode('/',$data['payment_date']);
			$data['payment_date'] = $y."-".$m."-".$d;
			$this->application->updateApplication($data,array('application_code'=>$p['application_code']));
			$json['message'] = 'Payment Details has been successfully saved';
			$json['status_code'] = "1";

		}else{
			if($row[0]['birth_date']==$p['birth_date']){
				$json['message'] = 'Payment Details already updated for this application';	
			}else{
				$json['message'] = 'Invalid Date of Birth for this Application';
			}
			
			$json['status_code'] = "0";
		}
		echo json_encode($json);exit;
	}

	function check(){
		$p = $this->input->post();
		if(isset($p['birth_date'])){
			list($m,$d,$y) = explode('/',$p['birth_date']);
			$p['birth_date'] = $y."-".$m."-".$d;
		}		
		$r = $this->application->fetch_application($p);
		 echo (count($r)>0?'true':'false');exit;
	}
}