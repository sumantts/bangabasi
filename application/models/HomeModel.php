<?php
if(!defined('BASEPATH'))exit('No Direct Script Access Allowed');

class HomeModel extends CI_Model{

	public function __Construct(){
			parent:: __Construct();
			$this->load->database();
			}
	
	/*function session_checker($checker_var = ''){
		if(($checker_var != 'uin') || ($checker_var == '')){
			redirect('login','refresh');
		}
	}*/
	
	public function getMainCategory($parent_cc_id){
		//$query = $this->db->select()->get_where('course_category', array('parent_cc_id' => $parent_cc_id));
                $this->db->order_by("cc_name", "asc");	
		$query = $this->db->select()->get_where('course_category', array('parent_cc_id' => $parent_cc_id));

		if($query->num_rows() > 0){
			$alldata = $query->result();
			return $alldata;
		}else{
			return NULL;
		}
	}//end of getMainCategory
	
	public function getSubCategory($sub_cc_id){
		$query = $this->db->select()->get_where('course_category', array('parent_cc_id' => $sub_cc_id));
		if($query->num_rows() > 0){
			$alldata = $query->result();
			return $alldata;
		}else{
			return NULL;
		}
	}//end of getSubCategory
	
	public function getDeptDetails($dept_id){
		$query = $this->db->select()->get_where('dept_desc', array('dept_id' => $dept_id));
		if($query->num_rows() > 0){
			$alldata = $query->result();
			return $alldata;
		}else{
			return NULL;
		}
	}//end of getDeptDetails
	
	public function getCategoryDetails($dept_id){
		$query = $this->db->select('cc_name')->get_where('course_category', array('cc_id' => $dept_id));
		if($query->num_rows() > 0){
			$alldata = $query->result();
			$cc_name = $alldata[0]->cc_name;
			return $cc_name;
		}else{
			return NULL;
		}
	}//end of getCategoryDetails
	
	public function getFaculty($dept_id){
		/*$query = $this->db->select()->get_where('faculty', array('dept_id' => $dept_id));
		if($query->num_rows() > 0){
			$alldata = $query->result();
			return $alldata;
		}else{
			return NULL;
		}*/
        $this->db->order_by("order_by_priority", "asc");	
		$query = $this->db->select()->get_where('faculty', array('dept_id' => $dept_id));
		if($query->num_rows() > 0){
			$alldata = $query->result();
			return $alldata;
		}else{
			return NULL;
		}
	}//end of getFaculty
	
	public function getLabStaff($dept_id){
		$query = $this->db->select()->get_where('laboratory_staff', array('dept_id' => $dept_id));
		if($query->num_rows() > 0){
			$alldata = $query->result();
			return $alldata;
		}else{
			return NULL;
		}
	}//end of getLabStaff
	
	public function getAllDownload(){
		$query = $this->db->order_by('id','DESC');
		$query = $this->db->get('form_download');
		if($query->num_rows() > 0){
			$alldata = $query->result();
			return $alldata;
		}else{
			return NULL;
		}
	}//end of getAllDownload
	
	public function getGalleryPhotoes(){
		$query = $this->db->order_by('id','DESC');
		$query = $this->db->get('photo_gallery');
		if($query->num_rows() > 0){
			$alldata = $query->result();
			return $alldata;
		}else{
			return NULL;
		}
	}//end of getGalleryPhotoes
	
	public function getAllNotice(){
		$query = $this->db->order_by('publish_dt','DESC');
		$query = $this->db->get('noticeboard');
		if($query->num_rows() > 0){
			$alldata = $query->result();
			return $alldata;
		}else{
			return NULL;
		}
	}//end of notice
	
	public function getAllOfcStaff(){
		$query = $this->db->order_by('id','DESC');
		$query = $this->db->get('office_staff');
		if($query->num_rows() > 0){
			$alldata = $query->result();
			return $alldata;
		}else{
			return NULL;
		}
	}//end of notice

    public function getAllGb(){
		$query = $this->db->order_by('order_by_priority','ASC');
		$query = $this->db->get('gb_members');
		if($query->num_rows() > 0){
			$alldata = $query->result();
			return $alldata;
		}else{
			return NULL;
		}
	}//end of All GB

	public function getStatBody(){
		$query = $this->db->order_by('id','ASC');
		$query = $this->db->get('stat_body');
		if($query->num_rows() > 0){
			$alldata = $query->result();
			return $alldata;
		}else{
			return NULL;
		}
	}//end of All GB

	public function getStatBodyMembers(){
		$query = $this->db->order_by('id','ASC');
		$query = $this->db->get('stat_body_members');
		if($query->num_rows() > 0){
			$alldata = $query->result();
			return $alldata;
		}else{
			return NULL;
		}
	}//end of All Stat Body Mem

        public function getBannerData(){
		$query = $this->db->order_by('id','DESC');
		$query = $this->db->get('banner_images');
		if($query->num_rows() > 0){
			$alldata = $query->result();
			return $alldata;
		}else{
			return NULL;
		}
	}
	
} // End of LoginModel class
?>