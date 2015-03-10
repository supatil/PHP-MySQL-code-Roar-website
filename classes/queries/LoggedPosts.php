<?php


function LoggedPosts($rcnt, $pgcnt,$startingRoar, $user_id)
{
	//takes the input of user_id, rcnt and pgcnt - roarcount and pagecount respectively. Rcnt is number of roars per page, pagecount is page number where 0 is first page, startingRoar is the first roar to show when pgcnt >0. When pgcnt=0, there is a newPost instance and 5 roars, otherwise there are 6 roars. The user_id condition looks for all user_id posts and all of those being followed
	//returns array of a Logged users default posts of the form ((r1user_name, r1post_tx, r1post_dt),...,(rnuser_name, rnpost_dt,rnpost_dt))
	require_once(dirname(__FILE__).'/queryToNumArray.php');
	$loggedPosts = 'SELECT DISTINCT u.user_name,p.post_tx,h.post_dt FROM has h join users u on u.user_id = h.user_id join posts p on p.guid=h.posts_guid join following f on (f.following_id = h.user_id) WHERE f.user_id =\'' . $user_id . '\' ORDER BY h.post_dt desc LIMIT ' .($startingRoar).','.$rcnt;
	$qry = query($loggedPosts);	
	$cnt = CountRowsNoLimit($loggedPosts);
	$return = array($qry, $cnt);
	return $return;
	
}
 
 ?>