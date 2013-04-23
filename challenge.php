<?php
	include "helpers.php";

	define ("CHALLENGE", 0);
	define ("ACCEPTED", 1);
	$from = $_REQUEST['from'];
	$to = $_REQUEST['to'];
	$status = $_REQUEST['status'];

	// if($status === CHALLENGE)
	// 	$status = 'challenge';
	// else if($status === ACCEPTED)
	// 	$status = 'accepted';

	$result = addChallenge($from, $to, $status);
	
	$myarr = array();
	$myarr['status'] = $result;
	$myarr['message'] = $result > 0 ? 'Challenge Sent' : 'Challenge Not Sent';

	echo json_encode($myarr);
?>

