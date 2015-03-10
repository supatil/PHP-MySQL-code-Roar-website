<?php



$this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

$query = 'SELECT COUNT(DISTINCT u.user_name,p.post_tx,h.post_dt) FROM has h join users u on u.user_id = h.user_id join posts p on p.guid=h.posts_guid join following f on (f.following_id = h.user_id) WHERE f.following_id =' . $user_id;

$count = $this->db_connection->query($query);

if($count){
	
	$result = mysqli_query($this->db_connection,'SELECT COUNT(DISTINCT u.user_name,p.post_tx,h.post_dt) FROM has h join users u on u.user_id = h.user_id join posts p on p.guid=h.posts_guid join following f on (f.following_id = h.user_id) WHERE f.following_id =' . $user_id);
		while($row = mysqli_fetch_array($result))
		  {
			  $cnt = $row['COUNT(DISTINCT u.user_name,p.post_tx,h.post_dt)'];
			  
		  }
}


?>