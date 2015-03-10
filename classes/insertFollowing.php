<?php

/**
 * Class NewPost
 *
 */
class NewFollowing
{
    public function __construct()
    {
        if(isset($_GET['nav']))
		{
			$nav = explode(',',$_GET['nav']);
			if($nav[3] == 'add')
			{				
				$this->addNewFollow($nav[2]);
			}
        }	  
    }
    private function addNewFollow($f)
    {
			require_once (dirname(__FILE__).'/queries/insert.php');
			require_once (dirname(__FILE__).'/queries/getUserID.php');
			require_once (dirname(__FILE__).'/functions/parseInsert.php');
			$f_user_id = getUserId($f);		
				
			$inserts = array(
				array('following', 'user_id', $_SESSION['user_id'], 'following_id', $f_user_id));
			$insert = ParseInsert($inserts);
			$newFollow = InsertPost($insert);
    }
}
?>