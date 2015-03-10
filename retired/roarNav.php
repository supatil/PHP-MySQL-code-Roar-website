<?php
function RoarNav($number)
{
	$i = $number;
	if(($cnt > $i) && $cnt - ($_SESSION['page_count']*$i)> 0)
	{
		echo $olderPosts;
	}
	if(($_SESSION['page_count'])>0 )
	{
		echo $newerPosts;
	
	}    
}
	
	
?>