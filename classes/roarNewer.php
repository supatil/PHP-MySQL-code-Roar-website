<?php


class RoarNewer
{

    public function __construct()
    {		 
		 if (isset($_GET['nav']))
		 {
			$nav = explode(',',$_GET['nav']);
			$nvcnt = count($nav);
			if($nav[1]=='newer')
			{
				
				$this->GetNewerPosts();
			}
				
			
        }
		
    }
    function GetNewerPosts()
    {
		$_SESSION['page_count']=$_SESSION['page_count']-1;
    }
   
}
?>