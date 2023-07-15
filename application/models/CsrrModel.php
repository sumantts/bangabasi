<?php

if(!defined('BASEPATH'))exit('No Direct Script Access Allowed');

class CsrrModel extends CI_Model{

	public function __Construct(){
			parent:: __Construct();
			$this->load->database();
			}
	

	function get_all_blocks($fid){
		$sql = $this->db->select('block_id, block_dec, form_id')->get_where('tts_block_master',array('form_id' => $fid));
		if($sql->num_rows() > 0){
			$row = $sql->result();
			return $row;
		}
		else
		{
			return NULL;
		}
	}

	function get_all_questions($block_id){
		$sql = $this->db->select('id, qs_description')->get_where('tts_question_master', array('qs_block_id' => $block_id));
		if($sql->num_rows() > 0)
		{
			$row = $sql->result();
			return $row;
		}
		else
		{
			return NULL;
		}
	}//end of get all questions
	
	function get_all_answers($user_id, $org_id, $assessment_code, $q_id){
		$sql = $this->db->select('id, user_id, org_id, assessment_code, form_id, q_id, yes_no_na, rating, comment, action_req, action_by, select_date, clause_no, file_data')->get_where('answer_table', array('user_id' => $user_id, 'org_id' => $org_id, 'assessment_code' => $assessment_code, 'q_id' => $q_id));
		if($sql->num_rows() > 0)
		{
			$row = $sql->result();
			return $row;
		}
		else
		{
			return NULL;
		}
	}//end of get all answers

	function get_clause_data(){
		$sql = $this->db->select('clause_no, clause_heading, clause_desc')->get_where('ohsas_18001_2007',array());
		if($sql->num_rows() > 0){
			$row = $sql->result();
			return $row;
		}
		else{
			return NULL;
		}
	}//end of get all clause data
	
	function getallusers(){
		$sql = $this->db->select('user_id, b_user_id, user_type, user_mail_id, user_name, org_id')->get_where('tts_users',array());
		if($sql->num_rows() > 0){
			$row = $sql->result();
			return $row;
		}
		else
		{
			return NULL;
		}
	}
	
	function check_old_data($wherecondition){
		$sql = $this->db->select('id')->get_where('answer_table',$wherecondition);
		if($sql->num_rows() > 0){
			$val = 1;
		}else{
			$val = 0;
		}
		//echo $val;exit();
		return $val;
	}
	
	function saveformdata($data){
		$this->db->insert('answer_table',$data);
	}
	
	function updateformdata($updatedata,$wherecondition){
		$this->db->where($wherecondition);
		$this->db->update('answer_table',$updatedata);
	}
	
	function resetformdata($wherecondition){
		$this->db->where($wherecondition);
		$this->db->delete('answer_table');		
	}
	
	function check_answer_table($user_id,$org_id,$assessment_code,$form_id){
		$counter = 0;
		$question_sql = $this->db->select('id')->get_where('tts_question_master',array('form_id' => $form_id));
		$question_ress = $question_sql->result();
		foreach($question_ress as $question_res)
		{
			$q_id = $question_res->id;
			$ans_chk_sql = $this->db->select('id, yes_no_na, rating, comment, action_req, action_by, select_date, clause_no, file_data')->get_where('answer_table',array('user_id' => $user_id, 'org_id' => $org_id, 'assessment_code' => $assessment_code, 'form_id' => $form_id, 'q_id' => $q_id));
			$ans_chk_ress = $ans_chk_sql->result();
			foreach($ans_chk_ress as $ans_chk_res)
			{
				if(($ans_chk_res->yes_no_na == "") || ($ans_chk_res->rating == "") || ($ans_chk_res->comment == "") || ($ans_chk_res->action_req == "") || ($ans_chk_res->action_by == "") || ($ans_chk_res->select_date == "") || ($ans_chk_res->clause_no == "") || ($ans_chk_res->file_data == ""))
				{
					$counter = 0; //0 = answer is blank
				}
				else
				{
					$counter = 1; //1 = answer is given
				}
			}//end of foreach answer
		}//end foreach question
		
		return $counter;
		
	}//end of check_answer_table
	
} // End of CsrrModel class
?>