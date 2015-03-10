<?php


class Follow
{

    public function __construct()
    {		 
		 if (isset($_GET['nav']))
		 {
			$nav = explode(',',$_GET['nav']);
			$nvcnt = count($nav);
			if($nav[3]=='add')
			{
				require_once (dirname(__FILE__).'/queries/getUserID.php');
				
				$fn = getUserID($nav[2]);				
				$this->GetNewerPosts($fn);
			}
				
			
        }
		
    }
    function addFollowing($f)
    {
		require_once (dirname(__FILE__).'/queries/insert.php');
		require_once (dirname(__FILE__).'/functions/parseInsert.php');
		$aF = ParseInsert (array(
			array('following','user_id',$_SESSION['user_id'], 'following_id',$f)
		));
		$ins = InsertPost($aF);
		
    }
   
}
?>