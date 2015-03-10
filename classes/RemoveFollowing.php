<?php

/**
 * Class NewPost
 *
 */
class RemoveFollowing
{

    public function __construct()
    {
        if(isset($_GET['nav']))
		{
			$nav = explode(',',$_GET['nav']);
			if($nav[3] == 'subtract')
			{
				
				$this->RemoveFollow($nav[2]);
			}
        }
	   else {
        	
        }
    }
    private function RemoveFollow($f)
    {
			require_once (dirname(__FILE__).'/queries/getUserID.php');
			$f_user_id = getUserId($f);	
				
			$inserts = array(
				array('following', 'user_id', $_SESSION['user_id'], 'following_id', $_POST["newPost"]));
				//check that user is not removing user
				//without this function a user could input a GET method to remove themself from their own
				//following list which would break their wall
			if($f_user_id != $_SESSION['user_id'])
			{
				$con=mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
				if (mysqli_connect_errno())
				  {
				  echo "Failed to connect to MySQL: " . mysqli_connect_error();
				  }
				  $d = 'DELETE from following WHERE user_id =' . $_SESSION['user_id'] . ' AND following_id =' . $f_user_id; 
				  
		  		if (!mysqli_query($con,$d))
		  		  {
		  		  die('Error: ' . mysqli_error($con));
		  		  }
			}
			mysqli_close($con);
			
    }
}
?>
