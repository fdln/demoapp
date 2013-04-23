<?php
	include "db-helper.php";

	function getAllUser(){
		$resultQuery = simple_query("user",array());
		$arrayUser = mysql_fetch_array($resultQuery);
		return $arrayUser;
	}
	function addChallenge($from, $to, $status) {
		mysql_query("START TRANSACTION;");
		$data = array("from_userid" => $from, "to_userid" => $to, "status" => $status);
		$result = db_insert('challenge', $data);
		if(!mysql_error()) { 
			mysql_query("COMMIT;");
			error_log('no error');
		} else {
			error_log('got an error');
		}
		mysql_close();
		return $result;
	}
	function acceptChallenge($userid){
		db_update('challenge', array('status' => '2'), array('to_userid' => $userid));
	}
?>

