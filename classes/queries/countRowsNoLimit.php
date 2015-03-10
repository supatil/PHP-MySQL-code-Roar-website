<?php

function CountRowsNoLimit($query){


	require_once (dirname(__FILE__).'/queryToNumArray.php');

	$qry = explode("LIMIT", $query);		
	$q = query($qry[0]);
	$c = count($q);		
	return $c;
	}
?>