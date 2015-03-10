<?php
function Followings($fPerPage, $firstResult, $user_id)
{
	require_once(dirname(__FILE__).'/queryToNumArray.php');
	$followings = 'SELECT DISTINCT uf.user_name FROM following f join users uf ON uf.user_id = f.following_id WHERE f.following_id <> \'' . $user_id . '\' AND f.user_id =\'' . $user_id . '\' ORDER BY uf.user_name LIMIT ' .($firstResult).','.$fPerPage;
	$qry = query($followings);	
	$cnt = CountRowsNoLimit($followings);
	$return = array($qry, $cnt);
	return $return;
	
}
?>