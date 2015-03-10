<?php
function isFollowing($ui)
{
	$u = $_SESSION['user_id'];
	//user_name input returns user_id if exists
	require_once (dirname(__FILE__).'/queryToNumArray.php');
	$q = 'SELECT COUNT(*) FROM following WHERE user_id =\''. $u .'\' AND following_id = \''. $ui .'\'' ;
	$qr = query($q);					
	if ($qr[0][0] > 0)
		{
			$flag = 1;
		}	
		else
		{
			$flag = 0;
		}
	return $flag;
}
?>