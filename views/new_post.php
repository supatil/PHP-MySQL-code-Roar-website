
<?php
if ($_SESSION['user_name']) 
{
	require_once(dirname(__FILE__).'//..//classes/queries/queryToNumArray.php');
	require_once(dirname(__FILE__).'//..//classes/queries/countRowsNoLimit.php');
    if(isset($_SESSION['user_name']))
	{
		$newPost = '<div id="newPostLabel"><p id="newPostP"></p></div><div id="newPostFormDiv"><form method="post" action="./index.php?nav=0,home"><textarea id="newPostTextArea" value="Compose New ROAR!" onclick="this.value = \'\';" onfocus="this.value = \'\';" rows="4" cols ="60"  autofocus=true class="input" type="textarea" name="newPost" required maxlength="240"></textarea><input type="submit" value="Submit New Post" id="submitNewPost"/></form></div>'; 
		$nav = explode(',',$_GET['nav']);
		$nvcnt = count($nav);
		$un = $_SESSION['user_name'];
		if($nvcnt < 3 && $nav[1] == 'home' && $nav[0]==0)
		{
			echo $newPost; 
		} 
		elseif ($nav[0]==0 && ($nav[2] == $un or $nav[2] ==''))
		{
			echo $newPost; 
		}
	}
}
?>


