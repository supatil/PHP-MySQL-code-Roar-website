<?php


class RoarHome
{
    public function __construct()
    {
	 if (isset($_GET['nav']))
	 {
		 
			$nav = explode(',',$_GET['nav']);
			$nvcnt = count($nav);       
			if($nav[1]=='home')
			{
				$this->Home();
			}
		
     }
	}
    function Home()
    {		
		$_SESSION['page_count']=0;	
    }
}

?>
