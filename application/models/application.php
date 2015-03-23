<?php
Class Application extends CI_Model {
	public function __construct() {
           parent::__construct(); 
           $this->load->database();
    }
	public function admin_login($data) {
		$this->db->select('*');
		$this->db->from('admins');
		$this->db->where("username =" . "'" . $data['username'] . "' AND " . "password =" . "'" . $data['password'] . "'");
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			return true;
		} else {
			return false;
		}
	}

	public function create_notice($id, $data) {
		if($id != ""){
			$this->db->where('id', $id);
			$this->db->update('notices', $data);
		}else{
			$this->db->insert('notices', $data);
		}
		return true;
	}
	public function fetch_notices($id, $active) {
		$this->db->select('*');
		$this->db->from('notices');
		if($id != ""){
			$this->db->where("id =" . "'" . $id . "'");
		}
		if($active == true){
			$this->db->where("active_from <=" . "'" . date("Y-m-d") . "' AND " . "active_till >=" . "'" . date("Y-m-d") . "'");
		}
		$this->db->where("is_deleted", false);
		$this->db->order_by('active_from', 'DESC');
		$query = $this->db->get();
		//if ($query->num_rows() > 0) {
		return $query->result();
		//} else {
		//	return false;
		//}
	}
	public function delete_notice($id) {
		$this->db->where('id', $id);
		$this->db->update('notices', array('is_deleted' => true));
		return true;
	}
	
	public function create_admission($data) {
		$exams = array();
		if(isset($data['exams'])){
			$exams = $data['exams'];
			unset($data['exams']);
		}
		//$this->db->trans_start();
		$data['created'] = date('Y-m-d H:i:s');
		$this->db->insert('submits', $data);
		$id = $this->db->insert_id();
		
		$exam_data=array();
		$grade = 0;
		foreach ($exams as $k => $v) {
			if(isset($v['title']) && $v['title']!=''){
				if($v['title']=='phd_mphil'){
					$grade = $grade+($v['rate']);
				}else{
					$grade = $grade+($v['percentage']*$v['rate']);
				}
				
				$exam_data[]=array(
					'exam_title'=>$v['title'],
					'passing_year'=>$v['passing_year'],
					'board'=>$v['board'],
					'subject'=>$v['subject'],
					'full_marks'=>$v['full_marks'],
					'total_marks'=>$v['total_marks'],
					'percentage'=>$v['percentage'],
					'submit_id'=>$id,
					'file_name'=>$v['file_name'],
					'score'=>$v['rate']
				);
			}			
		}
		//echo "<pre>";print_r($$exams);print_r($exam_data);die;
		//echo $id;
		$app_no = 'NBT'.date('y')."-".str_pad($id, 5,'0',STR_PAD_LEFT);
		$this->db->update('submits',array('grade'=>$grade,'application_code'=>$app_no),array('id'=>$id));

		$this->db->insert_batch('examinations',$exam_data);
		$this->db->last_query();
		//$this->db->trans_complete();
		//if ($this->db->trans_status() === FALSE){
		//	return false;
		//}else{
			return $app_no;
		//}
	}
	
	public function fetch_admissions($notice_id) {
		$this->db->select('*');
		$this->db->from('submits');
		if($notice_id != ""){
			//$this->db->where("id =" . "'" . $id . "'");
		}
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function fetch_application($condition=array(),$order_by=array(),$limit=null) {
		
		$this->db->from('submits');
		$this->db->where($condition);
		if(count($order_by)){
			foreach($order_by as $col => $order) {
				$this->db->order_by($col,$order);
			}
			
		}
		if($limit!=null){
			$this->db->limit($limit);
		}
		
		$query =$this->db->get();
		//echo $this->db->last_query();
		$return = array();
		foreach ($query->result_array() as $k => $v) {
			$return[$k]=$v;
			$return[$k]['exams'] = $this->db->get_where('examinations',array('submit_id'=>$v['id']))->result_array(); 
		}
		
		return $return;
	}

	public function getSettings($condition=array()) {		
		$query = $this->db->get_where('settings',$condition);	
		return $query->result_array() ;
	}
	public function updateSettings($data=array(),$condition=array()) {		
		return $this->db->update('settings',$data,$condition);
	}
	public function updateApplication($data=array(),$condition=array()) {		
		return $this->db->update('submits',$data,$condition);
	}
}

?>