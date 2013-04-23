<?php
	include "helpers.php";
	$userid = $_REQUEST['userid'];

	$q = mysql_query("SELECT * FROM challenge c, user u WHERE c.status = 1 AND c.to_userid = ".$userid." AND c.from_userid = u.id");

	$headarray = array();
	while($f = mysql_fetch_array($q)){
		$myarr = array();
		$myarr['id'] = $f['id'];
		$myarr['username']=$f['uname'];
		$myarr['info']= $f['info'];
		error_log("--> ".$f['uname']);
		array_push($headarray, $myarr);
	}

	acceptChallenge($userid);
	
	echo json_encode($headarray);
?>

