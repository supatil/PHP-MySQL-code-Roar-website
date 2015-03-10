<?php
    class FollowUser
	{
		public function __construct()
		{
			
			
            if(isset($_GET['nav']))
			{					
				$nav = explode(',',$_GET['nav']);
				$nvcnt = count($nav);
				


					if($nvcnt > 3)
					{
						if($nav[3]=='add')
						{
						
							require_once (dirname(__FILE__).'/insertFollowing.php');
							$flw = new NewFollowing();
						}
						else if($nav[3]=='subtract')
						{
						
							require_once (dirname(__FILE__).'/RemoveFollowing.php');
							$uflw = new RemoveFollowing();
						}
					}
					if($nvcnt > 2)
					{
						
						if($nav[2] == 'all')
						{
							require_once (dirname(__FILE__).'//..//views/follow.php');
							echo $f['nofollow'];
						}
						require_once (dirname(__FILE__).'/queries/getUserID.php');
						require_once (dirname(__FILE__).'/queries/isFollowing.php');
						$fn = getUserID($nav[2]);
						$f = isFollowing($fn);
						if($f > 0)
						{
							$u = $_SESSION['user_name'];
							if($nav[2] != $u)
							//unfollow?	
							{
								$this ->removeFollower($nav[2]);
							}
							else
							{
								require_once (dirname(__FILE__).'//..//views/follow.php');
								echo $f['nofollow'];
							}
						}	
						else
						//add follower?	 
						{
							$this ->addFollower($nav[2]);
						}
					}	
					else
					{
						require_once (dirname(__FILE__).'//..//views/follow.php');
						echo $f['nofollow'];
					}		
				
					
			
			}
			else 
			{
				require_once (dirname(__FILE__).'//..//views/follow.php');
				echo $f['nofollow'];
			}
		}  
		function addFollower($u)
			
		{
			if(isset($_SESSION['user_name'])){
				require_once (dirname(__FILE__).'//..//views/follow.php');
				echo $f['follow1'] . $u .  $f['follow2'] . $u .$f['closetags'];
			}
			
		}
		function removeFollower($u)
			
		{
			if(isset($_SESSION['user_name']))
			{
				require_once (dirname(__FILE__).'//..//views/follow.php');
				echo $f['unfollow1'] . $u .  $f['unfollow2'] . $u .$f['unfollow3'] . $u .$f['closetags'];
			}
		}
	}
		
?>