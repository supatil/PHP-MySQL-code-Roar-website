<?php


function unLoggedPosts($rcnt, $pgcnt)
{	//takes the input of rcnt and pgcnt - roarcount and pagecount respectively. Rcnt is number of roars per page, pagecount is page number where 0 is first page
	//returns array of unlogged posts of the form ((r1user_name, r1post_tx, r1post_dt),...,(rnuser_name, rnpost_dt,rnpost_dt))
	require_once(dirname(__FILE__).'/queryToNumArray.php');
    $unLoggedPosts = 'SELECT DISTINCT u.user_name,p.post_tx,h.post_dt FROM has h join users u on u.user_id = h.user_id join posts p on p.guid=h.posts_guid ORDER BY h.post_dt desc LIMIT ' .($pgcnt*$rcnt).','.$rcnt;
	$qry = query($unLoggedPosts);	
	$cnt = CountRowsNoLimit($unLoggedPosts);
	$return = array($qry, $cnt);
	return $return;

}
 
 ?>