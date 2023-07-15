<?php
function get_right_option($ans,$qid){

$sql = "SELECT $ans FROM question_bank WHERE qid = '" .$qid. "'";
$res = mysql_query($sql);
$row = mysql_fetch_array($res);

if($ans == "option_a"){$return_ans = "(a) ".$row["$ans"];}
if($ans == "option_b"){$return_ans = "(b) ".$row["$ans"];}
if($ans == "option_c"){$return_ans = "(c) ".$row["$ans"];}
if($ans == "option_d"){$return_ans = "(d) ".$row["$ans"];}
if($ans == "option_e"){$return_ans = "(e) ".$row["$ans"];}

return $return_ans;

}

function get_exam_module($cc_id){
	$get_cc = "SELECT * FROM course_category WHERE cc_id = '" .$cc_id. "'";
	$res_cc = mysql_query($get_cc);
	$row_cc = mysql_fetch_array($res_cc);
	$module_name = $row_cc["cc_name"];
	
	$get_cc_parent = "SELECT cc_name FROM course_category WHERE cc_id = '" .$row_cc["parent_cc_id"]. "'";
	$res_cc_parent = mysql_query($get_cc_parent);
	$row_cc_parent = mysql_fetch_array($res_cc_parent);
	$exam_type = $row_cc_parent["cc_name"];
	
	return $exam_type.' >> '.$module_name;
}
?>