<?php


function Followers($fPerPage, $firstResult, $user_id)
{

	require_once(dirname(__FILE__).'/queryToNumArray.php');
	$followers = 'SELECT DISTINCT uf.user_name FROM following f join users uf ON uf.user_id = f.user_id WHERE uf.user_id <> \'' . $user_id . '\' AND f.following_id =\'' . $user_id . '\' ORDER BY uf.user_name LIMIT ' .($firstResult).','.$fPerPage;
	$qry = query($followers);	
	$cnt = CountRowsNoLimit($followers);
	$return = array($qry, $cnt);
	return $return;
	
}

 ?>
