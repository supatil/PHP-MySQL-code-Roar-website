<?php
	
$postNav = array(
	'newer' => html_entity_decode('<div id="newerPosts"><form method="post" action="./index.php"><input hidden=true  type="textarea" name="newPosts" value="newer"/><input type="submit" value="Newer Posts" id="submitNewerPost"/></form></div>')
	,'older'=> html_entity_decode('<div id="olderPosts"><form method="post" action="./index.php"><input hidden=true type="textarea" name="older" value="older"/><input type="submit" value="Older Posts" id="SubmitOlderPosts"/></form></div>')
);

?>