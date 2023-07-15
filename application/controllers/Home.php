<?php

if(!defined('BASEPATH'))exit('No Direct Script Access Allowed');

class Home extends CI_Controller{

	public function __Construct(){
		parent:: __Construct();
		$this->load->helper('form');
		$this->load->helper('url_helper');
		//$this->load->library('session');
		$this->load->model('HomeModel');
	}
		
	public function index(){
		$allNotices = $this->HomeModel->getAllNotice();
		$banners = $this->HomeModel->getBannerData();
		$alldata = array(
			'allNotices' => $allNotices,
            'banners' => $banners
		);
		$this->load->view('includes/header');
		$this->load->view('includes/menu');
		$this->load->view('includes/banner',$alldata);
		$this->load->view('pages/home');
		$this->load->view('includes/footer');
	}//end of index
	
	//college_history
	public function anecdotes(){
		$this->load->view('includes/header');
		$this->load->view('includes/menu');
		$this->load->view('pages/college_history');
		$this->load->view('includes/footer');
	}//end of college_history
	
	//principal_desk
	public function principal_desk(){
		$this->load->view('includes/header');
		$this->load->view('includes/menu');
		$this->load->view('pages/principal_desk');
		$this->load->view('includes/footer');
	}//end of college_history
	
	//achievement
	public function achievement(){
		$this->load->view('includes/header');
		$this->load->view('includes/menu');
		$this->load->view('pages/achievement');
		$this->load->view('includes/footer');
	}//end of achievement
	
	//goals
	public function goals(){
		$this->load->view('includes/header');
		$this->load->view('includes/menu');
		$this->load->view('pages/goals');
		$this->load->view('includes/footer');
	}//end of goals
	
	//moto
	public function moto(){
		$this->load->view('includes/header');
		$this->load->view('includes/menu');
		$this->load->view('pages/moto');
		$this->load->view('includes/footer');
	}//end of moto
	
	//career_course
	public function career_course(){
		$this->load->view('includes/header');
		$this->load->view('includes/menu');
		$this->load->view('pages/career_course');
		$this->load->view('includes/footer');
	}//end of career_course
	
	//facilities
	public function facilities(){
		$this->load->view('includes/header');
		$this->load->view('includes/menu');
		$this->load->view('pages/facilities');
		$this->load->view('includes/footer');
	}//end of facilities
	
	//aqar
	public function aqar(){

		$allDownloads = $this->HomeModel->getAllDownload();
		$alldata = array(
			'downloads' => $allDownloads
		);
		$this->load->view('includes/header');
		$this->load->view('includes/menu');
		$this->load->view('pages/aqar', $alldata);
		$this->load->view('includes/footer');
	}//end of aqar
	
	//Department
	public function onDepartmentDetails($id){
		$dept_des = $this->HomeModel->getDeptDetails($id);
		$category_des = $this->HomeModel->getCategoryDetails($id);
		$faculties = $this->HomeModel->getFaculty($id);
		$lab_staff = $this->HomeModel->getLabStaff($id);
		
		$alldata = array(
			'dept_des' => $dept_des,
			'category_des' => $category_des,
			'faculties' => $faculties,
			'lab_staff' => $lab_staff,
			'dept_id' => $id
		);
		
		$this->load->view('includes/header');
		$this->load->view('includes/menu');
		$this->load->view('pages/department', $alldata);
		$this->load->view('includes/footer');
	}//
	
	
	//contact_us
	public function contact_us(){
		$this->load->view('includes/header');
		$this->load->view('includes/menu');
		$this->load->view('pages/contact_us');
		$this->load->view('includes/footer');
	}//end of contact_us
	
	//notice
	public function notice(){
		$allNotices = $this->HomeModel->getAllNotice();
		$alldata = array(
			'allNotices' => $allNotices
		);
		$this->load->view('includes/header');
		$this->load->view('includes/menu');
		$this->load->view('pages/notice',$alldata);
		$this->load->view('includes/footer');
	}//end of notice
	
	//gallery
	public function gallery(){
		$photoes = $this->HomeModel->getGalleryPhotoes();
		$alldata = array(
			'photoes' => $photoes
		);
		$this->load->view('includes/header');
		$this->load->view('includes/menu');
		$this->load->view('pages/gallery', $alldata);
		$this->load->view('includes/footer');
	}//end of gallery
	
	//NSS
	public function nss(){
		$this->load->view('includes/header');
		$this->load->view('includes/menu');
		$this->load->view('pages/nss');
		$this->load->view('includes/footer');
	}//end of NSS
	
	//anti-ragging-cell
	public function anti_ragging_cell(){
		$this->load->view('includes/header');
		$this->load->view('includes/menu');
		$this->load->view('pages/anti_ragging_cell');
		$this->load->view('includes/footer');
	}//end of anti-ragging-cell
	
	//subject_code
	public function subject_code(){
		$this->load->view('includes/header');
		$this->load->view('includes/menu');
		$this->load->view('pages/subject_code');
		$this->load->view('includes/footer');
	}//end of subject_code
	
	//career_oriented_course
	public function career_oriented_course(){
		$this->load->view('includes/header');
		$this->load->view('includes/menu');
		$this->load->view('pages/career_oriented_course');
		$this->load->view('includes/footer');
	}//end of career_oriented_course
	
	//office-staff
	public function support_staff(){
	$allstaffs = $this->HomeModel->getAllOfcStaff();
		$alldata = array(
			'allstaffs' => $allstaffs
		);
	
		$this->load->view('includes/header');
		$this->load->view('includes/menu');
		$this->load->view('pages/support_staff',$alldata);
		$this->load->view('includes/footer');
	}//end of office-staff
	
	//Governing Body
	public function governing_body(){
		$allgb = $this->HomeModel->getAllGb();
		$stat_body = $this->HomeModel->getStatBody();
		$stat_body_mem = $this->HomeModel->getStatBodyMembers();
		$alldata = array(
			'allgb' => $allgb,
			'stat_body' => $stat_body,
			'stat_body_mem' => $stat_body_mem
		);
		$this->load->view('includes/header');
		$this->load->view('includes/menu');
		$this->load->view('pages/governing_body',$alldata);
		$this->load->view('includes/footer');
	
	}//end of Governing Body
	
} //End of Dashboard class
?>
