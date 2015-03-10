<?php

/**
 * Class NewPost
 *
 */
class goForward
{

    public function __construct()
    {
        if (isset($_POST["newPost"])) {
			
            $this->addNewPost();
        } else {
        	
        }
    }

    /**
     * handles the entire registration process. checks all error possibilities, and creates a new user in the database if
     * everything is fine
     */
    private function addNewPost()
    {
		
        if (empty($_POST["newPost"])) 
		{
            $this->errors[] = "Please submit add content to your post.";
        } 
		else 
		{
			$user_id = $_SESSION['user_id'];
			require_once 'connect.php';
        	$loggedUser = $_SESSION['user_name'];
			$post_tx ='\'' . $_POST["newPost"] . '\'';			
			include 'insertPost.php';

		}
			
        
		
       
    }
}
