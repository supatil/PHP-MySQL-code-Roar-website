<?php


function SearchUsers($fPerPage, $firstResult, $qy)
{
	//takes the input of user_id, rcnt and pgcnt - roarcount and pagecount respectively. Rcnt is number of roars per page, pagecount is page number where 0 is first page, startingRoar is the first roar to show when pgcnt >0. When pgcnt=0, there is a newPost instance and 5 roars, otherwise there are 6 roars. The user_id condition looks for all user_id posts and all of those being followed
	//returns array of a Logged users default posts of the form ((r1user_name, r1post_tx, r1post_dt),...,(rnuser_name, rnpost_dt,rnpost_dt))
	require_once(dirname(__FILE__).'/queryToNumArray.php');
	$cnt = count($qy);
	$srch = ' SELECT DISTINCT u.user_name FROM  users u ';
	for ($i = 0; $i < $cnt; $i++)
	{
		if($i == 0)
		{
			$srch .= 'WHERE u.user_name LIKE  \'%' . $qy[$i] . '%\'  OR u.user_email LIKE  \'%' . $qy[$i] . '%\' OR u.first_name LIKE  \'%' . $qy[$i] . '%\' OR u.last_name LIKE  \'%' . $qy[$i] . '%\'';
		}
		else
		{
			$srch .= 'OR u.user_name LIKE  \'%' . $qy[$i] . '%\'  OR u.user_email LIKE  \'%' . $qy[$i] . '%\' OR u.first_name LIKE  \'%' . $qy[$i] . '%\' OR u.last_name LIKE  \'%' . $qy[$i] . '%\'';
		}
	}
	$qry = query($srch);	
	$ct = CountRowsNoLimit($srch);
	$return = array($qry, $ct);
	return $return;
	
}

 ?>
 
 
