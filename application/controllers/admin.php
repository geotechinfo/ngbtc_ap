<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Admin extends CI_Controller {
	public function __construct() {
		//error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		//$this->load->library('session');
		$this->load->model('application');
		$this->admin = $this->session->userdata('admin');
	}

	public function index() {
		if(!empty($this->admin['username'])){
			redirect('admin/notice');
		}
		$this->load->view('include_header');
		$this->load->view('from_login');
		$this->load->view('include_footer');
	}

	public function login() {
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('include_header');
			$this->load->view('from_login');
			$this->load->view('include_footer');
		} else {
			$data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')
			);
			$result = $this->application->admin_login($data);
			if($result == TRUE){
				$this->session->set_userdata('admin', array("username"=>$this->input->post('username')));
				redirect("admin/notice", "");
			}else{
				$data = array(
					'error' => 'Invalid Username or Password'
				);
				$this->load->view('include_header');
				$this->load->view('from_login', $data);
				$this->load->view('include_footer');
			}
		}
	}
	
	public function logout() {
		
		$this->session->unset_userdata('admin');
		$data['success'] = 'Successfully Logout';
		redirect("", "");
	}
	
	public function notice(){
		if(empty($this->admin['username'])){
			redirect('admin/login');
		}

		$data = array(
			"notices" => $this->application->fetch_notices("", false)
		);
		$this->load->view('include_header');
		$this->load->view('admin_notice', $data);
		$this->load->view('include_footer');
	}
	
	public function create($id=''){
		if(empty($this->admin['username'])){
			redirect('admin/login');
		}
		if($this->input->post()){
			$this->form_validation->set_rules('title', 'caption', 'trim|required|xss_clean');
			$this->form_validation->set_rules('from', 'date from', 'trim|required|xss_clean');
			$this->form_validation->set_rules('till', 'active till', 'trim|required|xss_clean');
			$this->form_validation->set_rules('type', 'notice type', 'required|xss_clean');
			if($this->input->post("type") == "standard"){
				if (empty($_FILES['attach']['name'])){
					$this->form_validation->set_rules('attach', 'attach pdf', 'required');
				}
			}
			$error=false;
			$filename = '';
			if ($this->form_validation->run() == true){				
				if($this->input->post("type") == "standard"){
					$config = array(
						'upload_path' => "./userfiles/notices/",
						'allowed_types' => "pdf",
						//'overwrite' => TRUE,
						'max_size' => "10240000",
					);
					$this->load->library('upload', $config);
					if(!$this->upload->do_upload("attach")){
						$data["error"] = $this->upload->display_errors();
						$error = true;
					}else{
						$upload = $this->upload->data(); 
  						$filename = $upload['file_name'];
					}
				}
				
				if($error == false){
					list($day, $month, $year) = explode("/", $this->input->post("from"));
					$active_from = $year."-".$month."-".$day;
					list($day, $month, $year) = explode("/", $this->input->post("till"));
					$active_till = $year."-".$month."-".$day;
					$data = array(
						'notice_title' => $this->input->post("title"),
						'active_from' => $active_from,
						'active_till' => $active_till,
						'notice_type'=> $this->input->post("type"),
						'notice_file'=> $filename
					);
					
					$this->application->create_notice($id, $data);
					if($id != ""){
						$this->session->set_flashdata('success', 'Notice update successful.');
					}else{
						$this->session->set_flashdata('success', 'Notice creation successful.');
					}
					redirect("admin/notice", "");
				}
			}
		}
		$data['error'] = '';
		$data["notice"] = '';
		$data["title"] ='';
		$data["from"] = '';
		$data["till"] = '';
		$data["type"] = '';
		if($id != ""){
			$fetch = $this->application->fetch_notices($id, false);
		
			list($year, $month, $day) = explode("-", $fetch[0]->active_from);
			$active_from = $day."/".$month."/".$year;
			list($year, $month, $day) = explode("-", $fetch[0]->active_till);
			$active_till = $day."/".$month."/".$year;
		
			$data["notice"] = $id;
			$data["title"] = $fetch[0]->notice_title;
			$data["from"] = $active_from;
			$data["till"] = $active_till;
			$data["type"] = $fetch[0]->notice_type;
		}
		if(isset($_POST['submit'])){
			$data["title"] = $_POST["title"];
			$data["from"] = $_POST["from"];
			$data["till"] = $_POST["till"];
			$data["type"] = $_POST["type"];
		}
		
		$this->load->view('include_header');
		$this->load->view('form_notice', $data);
		$this->load->view('include_footer');
	}
	
	public function delete($id){
		if(empty($this->admin['username'])){
			redirect('admin/login');
		}
		$this->application->delete_notice($id);
		$this->session->set_flashdata('success', 'Notice successfully deleted.');
		redirect("admin/notice", "");
	}
	
	public function admission(){
		if(empty($this->admin['username'])){
			redirect('admin/login');
		}
		$data = array(
			"admissions" => $this->application->fetch_admissions(3)
		);
		$this->load->view('include_header');
		$this->load->view('admin_admission', $data);
		$this->load->view('include_footer');
	}

	public function change_password(){
		if(empty($this->admin['username'])){
			redirect('admin/login');
		}
		if($this->input->post()){
			$this->db->update('admins',array('password'=>$this->input->post('new_passowrd')),array('id'=>'1'));
			$this->session->set_flashdata('success','Your Password successfuly updated');
			redirect('');
		}
		$this->load->view('include_header');
		$this->load->view('change_pssword');
		$this->load->view('include_footer');
	}

	public function download($id=0){
		if(empty($this->admin['username'])){
			redirect('admin/login');
		}
		$details = $this->application->fetch_application(array('id'=>$id));

		if(isset($details[0])){
			$this->load->library('zip');
			$files['document']=$details[0]['document'];
			$files['sc_file']=$details[0]['sc_file'];
			$files['st_file']=$details[0]['st_file'];
			$files['ph_file']=$details[0]['ph_file'];
			$files['domiciled_file']=$details[0]['domiciled_file'];
			foreach ($files as $k => $v) {
				if(file_exists('./userfiles/documents/'.$v)){
					$this->zip->read_file('./userfiles/documents/'.$v);
				}
				foreach ($v['exams'] as $ek => $ev) {
					if($ev['file_name']!=''){
						$this->zip->read_file('./userfiles/documents/'.$ev['file_name']);		
					}
					
				}
			}
			$this->zip->download($details[0]['application_code'].'_document_backup.zip');
		}
	}

	function settings(){
		if(empty($this->admin['username'])){
			redirect('admin/login');
		}
		$data = array();
		
		if($this->input->post()){
			$input = $this->input->post();
			//echo "<pre>";print_r($input);die;
			foreach ($input['settings'] as $id => $value) {
				$this->application->updateSettings(array('value'=>$value),array('id'=>$id));
			}
			$this->session->set_flashdata('success','Your Settings are successfuly updated');
			redirect('admin/settings');
		}

		$data['list'] = $this->application->getSettings();
		$this->load->view('include_header');
		$this->load->view('settings', $data);
		$this->load->view('include_footer');	

	}

	function application_list(){
		if(empty($this->admin['username'])){
			redirect('admin/login');
		}
		$settings = $this->application->getSettings();
		foreach ($settings as $k => $v) {
			define($v['attribute'], $v['value']);
		}

		$data = array();
		$data['stsc_list'] = $this->application->fetch_application("(is_sc = 'scheduledCaste' OR is_st='scheduledTribe') AND status=1",array('grade'=>'DESC'),ST_SC_QUOTA);
		$data['female_list'] = $this->application->fetch_application(array('is_sc !='=>'scheduledCaste','is_st !='=>'scheduledTribe','gender'=>'female','status'=>1),array('grade'=>'DESC'),FEMALE_QUOTA);
		$data['general_list'] = $this->application->fetch_application(array('is_sc !='=>'scheduledCaste','is_st !='=>'scheduledTribe','gender'=>'male','status'=>1),array('grade'=>'DESC'),GEN_QUOTA);
		//echo "<pre>";print_r($data);die;
		$this->load->view('include_header');
		$this->load->view('application_list', $data);
		$this->load->view('include_footer');	
	}

	function approve(){
		if(empty($this->admin['username'])){
			redirect('admin/login');
		}
		$st = ($this->input->post('status')==1?0:1);
		$this->application->updateApplication(array('comment'=>$this->input->post('comment'),'status'=>$st),array('id'=>$this->input->post('id')));
		$this->session->set_flashdata('success','Application has been successfuly '.($st=='0'?'disapprove':'approve'));
		redirect('admin/admission');
	}

	function export_meritlist(){
		//ini_set('memory_limit', '-1');
		if(empty($this->admin['username'])){
			redirect('admin/login');
		}
		//print_r($this->tcpdf);
		$settings = $this->application->getSettings();
		foreach ($settings as $k => $v) {
			define($v['attribute'], $v['value']);
		}
		//$stsc_limit = $settings[0]['']
		$data['stsc_list'] = $this->application->fetch_application("(is_sc = 'scheduledCaste' OR is_st='scheduledTribe') AND status=1",array('grade'=>'DESC'),ST_SC_QUOTA);
		$data['female_list'] = $this->application->fetch_application(array('is_sc !='=>'scheduledCaste','is_st !='=>'scheduledTribe','gender'=>'female','status'=>1),array('grade'=>'DESC'),FEMALE_QUOTA);
		$data['general_list'] = $this->application->fetch_application(array('is_sc !='=>'scheduledCaste','is_st !='=>'scheduledTribe','gender'=>'male','status'=>1),array('grade'=>'DESC'),GEN_QUOTA);
		//echo "<pre>";print_r($data);die;

		$html = $this->load->view('merit_list', $data,true);
		$this->load->library('tcpdf_lib');
		//print_r($this->tcpdf);die;
		//$this->tcpdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$this->tcpdf->SetCreator('Geotech');
		$this->tcpdf->SetAuthor('NGBTC');
		$this->tcpdf->SetTitle('NGBTC Merit List');
		$this->tcpdf->SetSubject('NGBTC Merit List');
		$this->tcpdf->SetKeywords('NGBTC Merit List');
		$this->tcpdf->setPrintHeader(false);
		$this->tcpdf->setPrintFooter(false);
		$this->tcpdf->AddPage();
		$this->tcpdf->writeHTML($html, true, false, true, false, '');
		$this->tcpdf->lastPage();

		$this->tcpdf->Output(date('Y-m').'.pdf', 'D');
		
		
	}
	function export($lib=''){
		//ini_set('memory_limit', '-1');
		
		//print_r($this->tcpdf);
		$data['stsc_list'] = $this->application->fetch_application("(is_sc = 'scheduledCaste' OR is_st='scheduledTribe') AND status=1",array('grade'=>'DESC'));
		$data['female_list'] = $this->application->fetch_application(array('is_sc !='=>'scheduledCaste','is_st !='=>'scheduledTribe','gender'=>'female','status'=>1),array('grade'=>'DESC'));
		$data['general_list'] = $this->application->fetch_application(array('is_sc !='=>'scheduledCaste','is_st !='=>'scheduledTribe','gender'=>'male','status'=>1),array('grade'=>'DESC'));
		//echo "<pre>";print_r($data);die;

		$html = $this->load->view('merit_list', $data,true);
		//$html = '<html><head></head><body>sdsdasd</body></html>';
		if($lib=='dom'){
			require_once APPPATH.'third_party/dompdf/dompdf_config.inc.php';		
			$old_limit = ini_set("memory_limit", "16M");
			$dompdf = new DOMPDF();
			//$this->load->library('Dompdf');
			$html = $html;
			$dompdf->load_html($html);
			$dompdf->set_paper('A4', 'portrait');
			$dompdf->render();
			$dompdf->stream("meritlist.pdf");		
		}
		if($lib=='tc'){
			$this->load->library('tcpdf_lib');
			//print_r($this->tcpdf);die;
			//$this->tcpdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
			$this->tcpdf->SetCreator('Geotech');
			$this->tcpdf->SetAuthor('NGBTC');
			$this->tcpdf->SetTitle('NGBTC Merit List');
			$this->tcpdf->SetSubject('NGBTC Merit List');
			$this->tcpdf->SetKeywords('NGBTC Merit List');
			$this->tcpdf->setPrintHeader(false);
			$this->tcpdf->setPrintFooter(false);
			$this->tcpdf->AddPage();
			$this->tcpdf->writeHTML($html, true, false, true, false, '');
			$this->tcpdf->lastPage();

			$this->tcpdf->Output('example_006.pdf', 'I');
		}
		
		
		
		
	}
}

?>