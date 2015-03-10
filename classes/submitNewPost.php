<?php

/**
 * Class NewPost
 *
 */
class NewPost
{

    public function __construct()
    {
        if (isset($_POST["newPost"])) {
			
            $this->addNewPost();

        } else {
        	
        }
    }
    private function addNewPost()
    {
		
        if (empty($_POST["newPost"])) 
		{
            $this->errors[] = "Please submit add content to your post.";
        } 
		else 
		{
			require_once (dirname(__FILE__).'/queries/insert.php');
			require_once (dirname(__FILE__).'/functions/parseInsert.php');
			
			
			$guid = md5(uniqid());
			$date = new DateTime();
			$timestamp = $date->format('Y-m-d H:i:s');
			$inserts = array(
				array('posts', 'GUID', $guid, 'post_tx', $_POST["newPost"])
				,array('has', 'user_id',$_SESSION['user_id'], 'posts_guid',$guid, 'post_dt',$timestamp)
			);
			$insert = ParseInsert($inserts);
			$newPost = InsertPost($insert);
			}
    }
	
}
