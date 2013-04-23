<?php
	include "helpers.php";
	$q = mysql_query("SELECT * FROM user");
	$headarray = array();
	while($f = mysql_fetch_array($q)){
		$myarr = array();
		$myarr['id'] = $f['id'];
		$myarr['username']=$f['uname'];
		$myarr['info']= $f['info'];

		array_push($headarray, $myarr);
	}
	echo json_encode($headarray);
?>

