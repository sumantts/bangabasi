<?php

if(!defined('BASEPATH'))exit('No Direct Script Access Allowed');

class Csrrform extends CI_Controller{

	var $welcome_message = ''; 
	
	public function __Construct(){
		parent:: __Construct();
		$this->load->helper('form');
		$this->load->helper('url_helper');
		$this->load->library('session');
		$this->load->model('CsrrModel');
		//$this->loginmodel->sessionchecker($this->session->userdata('Logged'));
		}
		
	public function index($fid=1){
		$formdata = $this->CsrrModel->get_all_blocks($fid);

		//print_r($formdata);
		$formdata1 = array('formdata' => $formdata,
							'fid' => $fid
							);
		$this->load->view('includes/header');
		$this->load->view('includes/leftmenu',$formdata1);
		$this->load->view('pages/body',$formdata1);
		$this->load->view('includes/footer');
		}
	
		public function submit(){
			$user_id = $this->input->post('user_id');
			$org_id = $this->input->post('org_id');
			$assessment_code = $this->input->post('assessment_code');
			$form_id = $this->input->post('form_id');
			$q_id = $this->input->post('q_id');
			$field_name = $this->input->post('field_name');
			$field_value = $this->input->post('field_value');
			
			$data = array('user_id' => $user_id, 'org_id' => $org_id, 'assessment_code' => $assessment_code, 'form_id' => $form_id, 'q_id' => $q_id, $field_name => $field_value);
			
			$updatedata = array($field_name => $field_value);
			
			$wherecondition = array('user_id' => $user_id, 'org_id' => $org_id, 'assessment_code' => $assessment_code, 'form_id' => $form_id, 'q_id' => $q_id);
			
			$checkdata = $this->CsrrModel->check_old_data($wherecondition);
			
			if($checkdata == '0')
			{
				$this->CsrrModel->saveformdata($data);
			}
			else
			{
				$this->CsrrModel->updateformdata($updatedata,$wherecondition);
			}
			
		}//end submit function
	
	public function resetdata(){
		$user_id = $this->input->post('user_id');
		$org_id = $this->input->post('org_id');
		$assessment_code = $this->input->post('assessment_code');
		$form_id = $this->input->post('form_id');
		$wherecondition = array('user_id' => $user_id, 'org_id' => $org_id, 'assessment_code' => $assessment_code, 'form_id' => $form_id);
		
		$this->CsrrModel->resetformdata($wherecondition);
		//redirect('Csrrform/index/'.$form_id);
		$data = array('msg' => 1);
		echo json_encode($data);
	}
	
	public function do_upload(){
			$user_id = $this->input->post('user_id');
			$org_id = $this->input->post('org_id');
			$assessment_code = $this->input->post('assessment_code');
			$form_id = $this->input->post('form_id');
			$q_id = $this->input->post('q_id');
			
			$config['upload_path']          = './uploads/';
			$config['allowed_types']        = 'gif|jpg|png|txt';
			$config['max_size']             = 2048;
			$config['max_width']            = 1024;
			$config['max_height']           = 768;

			$this->load->library('upload', $config);
			$this->upload->do_upload('file_data_'.$q_id);
			$filename = $this->upload->data('file_name');
			/*$oldfilename = $this->upload->data('file_name');
			$file_exten = end(explode(".",$oldfilename));
			$filename = date('YmdHis').'.'.$file_exten;*/
			
			$data = array('user_id' => $user_id, 'org_id' => $org_id, 'assessment_code' => $assessment_code, 'form_id' => $form_id, 'q_id' => $q_id, 'file_data' => $filename);
			
			$updatedata = array('file_data' => $filename);
			
			$wherecondition = array('user_id' => $user_id, 'org_id' => $org_id, 'assessment_code' => $assessment_code, 'form_id' => $form_id, 'q_id' => $q_id);
			
			$checkdata = $this->CsrrModel->check_old_data($wherecondition);
			
			if($checkdata == '0')
			{
				$this->CsrrModel->saveformdata($data);
			}
			else
			{
				$this->CsrrModel->updateformdata($updatedata,$wherecondition);
			}
			redirect('Csrrform/index/'.$form_id);
			/*if ( ! $this->upload->do_upload('file_data_1'))
			{
					$error = array('error' => $this->upload->display_errors());

					//$this->load->view('upload_form', $error);
					//reload('index');
			}
			else
			{
					$data = array('upload_data' => $this->upload->data());
					//reload('index');
					//$this->load->view('upload_success', $data);
			}*/
	}//end of do upload
	
	
	
	public function gotonext(){
		$user_id = $this->input->post('user_id');
		$org_id = $this->input->post('org_id');
		$assessment_code = $this->input->post('assessment_code');
		$form_id = $this->input->post('form_id');
		$wherecondition = array('user_id' => $user_id, 'org_id' => $org_id, 'assessment_code' => $assessment_code, 'form_id' => $form_id);
		
		$qdata = $this->CsrrModel->check_answer_table($user_id,$org_id,$assessment_code,$form_id);
		$messages = array('go' => $qdata);
		echo json_encode($messages);
	}
} //End of Dashboard class
?>
