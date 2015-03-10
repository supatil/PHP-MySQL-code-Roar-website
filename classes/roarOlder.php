<?php


class RoarOlder
{
    public function __construct()
    {
	 if (isset($_GET['nav']))
	 {
		 
			$nav = explode(',',$_GET['nav']);
			$nvcnt = count($nav);       
			if($nav[1]=='older')
			{
				$this->GetOlderPosts();
			}
		
     }
	}
    function GetOlderPosts()
    {		
		$_SESSION['page_count']++;	
    }
}

?>
