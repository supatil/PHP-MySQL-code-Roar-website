<?
function getUserID($un)
{
	//user_name input returns user_id if exists
	require_once (dirname(__FILE__).'/queryToNumArray.php');
	$q = 'SELECT user_id FROM users WHERE user_name =\''. $un .'\'';
	$qr = query($q);					
	$user_id = $qr[0][0];	
	return $user_id;
}
?>