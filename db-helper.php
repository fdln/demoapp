<?php
	include "connect.php";
	function simple_query($table_name, $condition) {
	 	$stQuery = "SELECT * FROM $table_name WHERE 1";
	 	if(!empty($condition)) {
	 		$where = " ";
	 		foreach ($$condition as $key => $value) {
	 			$where .= " AND $key = '$value'";
	 		}
	 		$stQuery .= $where;
	 	}
	 	return mysql_query($stQuery);
	}
	function db_insert($table_name, $data){
		$stQuery = "INSERT INTO $table_name (";
		$stValues = " values (";
		$first = TRUE;

		foreach ($data as $key => $value) {
			if(!$first) {
				$stQuery .= ",";
				$stValues .= ",";
			}
			$stQuery .= "$key";
			$stValues .= "$value";
			$first =FALSE;
		}
		$stQuery .= ")" . $stValues .")";
		
		error_log('QUERY = '.$stQuery);
		$result = mysql_query($stQuery);
		return mysql_insert_id();
	}

	function db_update($table_name, $change_field, $condition) {
		$stQuery = "UPDATE $table_name SET ";
		$first = TRUE;
		foreach ($change_field as $key => $value) {
			if(!$first)
				$stQuery .=", ";
			$stQuery .= "$key = '$value'";
			$first = FALSE;
		}
		$where = " WHERE 1 ";
		foreach ($condition as $key => $value) {
			$where .= " AND $key = '$value'";
		}
		$stQuery .= $where;
		$result = mysql_query($stQuery);
		return $result;
	}
?>

