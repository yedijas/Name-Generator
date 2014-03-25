<?php
// This will get the names from database.
// The main function is GetName.
// 
// @author Aditya YM Situmeang
// @email bananab9001@gmail.com
// @version 0.1

define("HOST", "localhost");
define("USERNAME", "namegen");
define("PWD", "namegen");
define("DBNAME", "namegen");

// Get a single name with given criteria. Name given is random.
// 
// NOTE: This function is only getting the name. Validation
//       occured on a different location.
// 
// @param $gender the baby gender (1 = male, 2 = female, 3 = both)
// @param $start starting character from a-z of the name
// @param $end ending character from a-z of the name
// @param $origin the origin of the name
// 
// @return string a single name with its meaning, id in database, and gender information.
// id in database is needed so that the next function wont return the same name twice in full name.
// 
function GetName($gender = 1, $start = '', $end = '', $origin = 0){
	$dbconn = new mysqli(HOST, USERNAME, PWD, DBNAME);

	if ($dbconn->connect_errno){
		exit();
	}

	$start = $dbconn->real_escape_string($start);
	$end = $dbconn->real_escape_string($end);

	$query = "";
	if ($origin == 0){ // check the origin. 0 origin means from any origin
		$query = "
		SELECT a.id, a.name, a.meaning, a.gender, c.desc
		FROM ng_names a 
			INNER JOIN ng_name_origin b 
				ON a.id = b.id_name
			INNER JOIN ng_origin c
				ON c.id = b.id_origin
		WHERE a.name LIKE '" . $start . "%" . $end . "' AND a.gender = $gender";
	}else{
		$query = "
		SELECT a.id, a.name, a.meaning, a.gender, c.desc
		FROM ng_names a 
			INNER JOIN ng_name_origin b 
				ON a.id = b.id_name
			INNER JOIN ng_origin c
				ON c.id = b.id_origin
		WHERE a.name LIKE '" . $start . "%" . $end . "' AND a.gender = $gender AND c.id = $origin";
	}

	$result = $dbconn->query($query);

	$nama = array();

	if ($result){
		while ($row = $result->fetch_assoc()){
			$nama[] = $row;
		}

		$result->close();
		$dbconn->close();
	}

	return $nama;
}

function GetOrigins(){
	$dbconn = new mysqli(HOST, USERNAME, PWD, DBNAME);
	$query = "SELECT * FROM ng_origin";

	$origins = array();

	$result = $dbconn->query($query);
	if ($result){
		while ($row = $result->fetch_assoc()){
			$origins[] = $row;
		}
	
		$result->close();
		$dbconn->close();
	}

	return $origins;
}

?>