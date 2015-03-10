<?php


	
function query($query)
{
	//returns a 2 dimension array for a basic select statement of the form ((r1col1, r1col2,..,r1coli ),...,(rncol1, rncol2,...,rncoli))
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	
	if ($mysqli->connect_errno) {
	    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}

	$result = $mysqli->query($query);

	for ($result_2 = array(); $tmp2 = $result->fetch_array(MYSQL_NUM);) $result_2[] = $tmp2;
	
	return $result_2;
}


	
?>