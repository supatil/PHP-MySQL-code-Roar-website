<?php


function userPosts($rcnt, $pgcnt, $user_id)
{
	//takes the input of user_id, rcnt and pgcnt - roarcount and pagecount respectively. Rcnt is number of roars per page, pagecount is page number where 0 is first page. The user_id condition looks for all selected user_id posts 
	//returns a 3D array of a selected user's posts of the form (((r1user_name, r1post_tx, r1post_dt),...,(rnuser_name, rnpost_dt,rnpost_dt)),(total count of all rows with no restrictions for user))
	require_once(dirname(__FILE__).'/queryToNumArray.php');
	$userPosts = 'SELECT DISTINCT u.user_name,p.post_tx,h.post_dt FROM has h join users u on u.user_id = h.user_id and h.user_id =\'' . $user_id . '\' join posts p on p.guid=h.posts_guid   ORDER BY h.post_dt desc LIMIT ' .($pgcnt*$rcnt).','.$rcnt;
	$qry = query($userPosts);
	$cnt = CountRowsNoLimit($userPosts);
	$return = array($qry, $cnt);
	return $return;
}
 
 ?>