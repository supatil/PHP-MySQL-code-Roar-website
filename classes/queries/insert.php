<?php
//pass an array with insert statements
function InsertPost($inserts){
	$con=mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	// Check connection
	//pass in variables $post_tx and $user_id
	
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }
	
	
	$c=count($inserts);
	
	for($i=0; $i<$c; $i++)
		
	{
		if (!mysqli_query($con,$inserts[$i]))
		  {
		  die('Error: ' . mysqli_error($con));
		  }
	}
	  $_SESSION['page_count']=0;
	mysqli_close($con);
	return 0;
}
?>