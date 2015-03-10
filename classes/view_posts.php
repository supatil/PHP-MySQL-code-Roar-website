<?php
    class getPosts
	{
		public function __construct()
		{            
			require_once(dirname(__FILE__).'/roarNewer.php');
			require_once(dirname(__FILE__).'/roarOlder.php');
			require_once(dirname(__FILE__).'/roarHome.php');
			$navNew = new RoarNewer();	
			$navOld = new RoarOlder();	
			$navhome = new RoarHome();
			require_once(dirname(__FILE__).'/queries/queryToNumArray.php');
			require_once(dirname(__FILE__).'/queries/countRowsNoLimit.php');
			require_once (dirname(__FILE__).'//..//views/cycleThroughRoars.php');
			require_once (dirname(__FILE__).'//..//views/roarFormatted.php');			
			require_once (dirname(__FILE__).'//..//views/viewAll.php');
			//check that a user has chosen a roar navigation or has just arrived at site
			//nav is empty if user just arrived

			echo $viewAll[0];
            if(isset($_GET['nav']))
			{
				$nav = explode(',',$_GET['nav']);
				$nvcnt = count($nav);
				$_SESSION['page_count'] = $nav[0];
				$pgcnt = $_SESSION['page_count'];
				//$r = roars per page to display
				if(isset($_SESSION['user_name']))
				{
					$uni = $_SESSION['user_name'];
					if(($nvcnt > 2 and  $nav[2] == $uni) or ($nvcnt < 3))
					{
						$r=5;
					}
					else
					
					{
						echo 'test';
						$r=6;
					}
				}	
				else
				{
					$r=6;	
				}	
				//user has chosen a user or view all view
				//choose if to get All Roars or a user specific wall, or a logged in view
				if($nvcnt > 2)
				{
					if($nav[0] != '0' && $nav[1] != 'home' && $nav[2] != 'all')
					{
					
					}
					if($nav[2]=='all')
					{

						$this->getUnLoggedPosts($roarDivs, $postNav, $roarNav, $r, $pgcnt, $nav);
					}
					else
					{
						$uidq = 'SELECT user_id from users WHERE user_name = \'' . $nav[2] . '\'';
						$qr = query($uidq);					
						$user_id = $qr[0][0];
						$this->getUserPosts($roarDivs, $postNav, $roarNav, $r, $user_id, $nav[2], $pgcnt, $nav);
					}
				} 
				else 
				{
					
					//choose to get logged in view or get unlogged in user view (basic roar navigation, no user or view all specified)
					if ($_SESSION['user_name']) 
					{	
						$pgcnt = $_SESSION['page_count'];
						$uid = ($_SESSION['user_id']);
						$this->getLoggedPosts($roarDivs, $postNav, $roarNav, $r, $uid, $pgcnt, $nav);
					}
					else
					{						
						if(!isset($_SESSION['page_count']))
						{
							$_SESSION['page_count']=0;
						}
						
						$pgcnt = $_SESSION['page_count'];
						$this->getUnLoggedPosts($roarDivs, $postNav, $roarNav, $r, $pgcnt, $nav);
					}
				}
			} 
			else //user either just logged in or user is not logged in and is at the first view
			{
				$nav = array(0, 'home','all');
				//choose home page logged in view or unlogged in user view
				
				if ($_SESSION['user_name']) 
				{
					$pgcnt = $_SESSION['page_count'];
					$uid = ($_SESSION['user_id']);
					$this->getLoggedPosts($roarDivs, $postNav, $roarNav, 5, $uid, $pgcnt, 0);
				}
				else
				{
					if(!isset($_SESSION['page_count']))
					{
						$_SESSION['page_count']=0;
					}
					$this->getUnLoggedPosts($roarDivs, $postNav, $roarNav, 6, $pgcnt, $nav);
				}
			}			
		}
		function getUserPosts($rd, $pn, $rn, $rcnt, $uid, $un, $pc, $n)
		{

			require_once(dirname(__FILE__).'/queries/userPosts.php');
			$up = userPosts($rcnt, $pc, $uid);
			$qry = $up[0];			
			$cnt = $up[1];
			$this->roar($rd, $qry, $rcnt, $cnt, $pc, $n);
			$this->nav($pn, $rn, $cnt, $rcnt);
		}
		
		//rd is roarDivs, $pn is postNav, $rn is $roarNav from cycleThroughRoars.php, $rcnt is # roars to display
		function getLoggedPosts($rd, $pn, $rn, $rcnt, $uid, $pc, $n)
		{	

			//start at 0th roar
			$strtRr = 0;
			//if page count greater than 0 display 6 roars per page starting at roar 6	
			if($pc > 0)
			{
				$rcnt = $rcnt + 1;
				$strtRr = $pc * ($rcnt) - 1; 
			}	
			require_once(dirname(__FILE__).'/queries/LoggedPosts.php');
			$lp = LoggedPosts($rcnt, $pc, $strtRr, $uid);
			$qry = $lp[0];			
			$cnt = $lp[1];
			$this->roar($rd, $qry, $rcnt, $cnt,$pc, $n);
			$this->nav($pn, $rn, $cnt, $rcnt);
		 }
		//rd is roarDivs, $pn is postNav, $rn is $roarNav from cycleThroughRoars.php, $rcnt is # roars to display
 		function getUnLoggedPosts($rd, $pn, $rn, $rcnt, $pc, $n)
 		{

			require_once(dirname(__FILE__).'/queries/unLoggedPosts.php');
			$ulp = unLoggedPosts($rcnt, $pc);
			$qry = $ulp[0];			
			$cnt = $ulp[1];
			$this->roar($rd, $qry, $rcnt, $cnt, $pc, $n);
			$this->nav($pn, $rn, $cnt, $rcnt);
 		 }
		 //$p is postNav array, $r is $roarNav from cycleThroughRoars.php, $c is total accessible posts for user/view, $rc is # roars per page
		 private function nav($p, $r, $c, $rc)
		 { 
 			if(($c > $rc) && $c - (($_SESSION['page_count']+1)*$rc)> 0)
 			{	
				
				$pgcnt = $_SESSION['page_count'] + 1;
	            if(isset($_GET['nav']))
				{ 
					$nav = explode(',',$_GET['nav']);
					$nvcnt = count($nav);					
					if($nvcnt > 2)
					{						
						echo $r['older1'] . $pgcnt . ',older,' . $nav[2] . $r['older2'];
						
					}
					else
					{
 						echo $r['older1'] . $pgcnt . ',older' . $r['older2'];
						
 					}
 				}
				else
				{
 					echo $r['older1'] . $pgcnt . ',older' . $r['older2'];					
 				}
			}
			else
			{
				
				echo $r['older1p'];
			}
 			if(($_SESSION['page_count'])>0 )
 			{
				
				$pgcnt2 = $_SESSION['page_count'] - 1; 	
	            if(isset($_GET['nav']))
				{ 
					$nav = explode(',',$_GET['nav']);
					$nvcnt = count($nav);					
					if($nvcnt > 2)
					{						
						echo $r['newer1'] . $pgcnt2 . ',newer,' . $nav[2] . $r['newer2'];
						
					}
					else
					{
 						echo $r['newer1'] . $pgcnt2 . ',newer'. $r['newer2'];
						
 					}
 				}
				else
				{
					echo $r['newer1'] . $pgcnt2 . ',newer' . $r['newer2'];
					
				}
 			}
			else
			{
				echo $r['newer1p'];
			}
		 }
	 
		 //$r is roarDivs array, $q is query results array, $c is # roars per page, $pn is page number
		 private function roar($r, $q, $rc, $c, $pn, $flag)
		 {
			 if($rc == 6)
			 {
			 	echo $r[7];
			 }
			 else
			 {
			 	echo $r[5];
			 }
			 
				 
			 if($c<1)
			 {
		 	
			 }
			 elseif(($c > $rc) && ($c - (($_SESSION['page_count']+1)*$rc))> 0)
			 {
	  			for($i = 0; $i<$rc; $i++)
				{
	  				echo  $r[0] . $q[$i][0] . $r[1] . $q[$i][0] . $r[2] . $q[$i][2] . $r[3] .$q[$i][1] .$r[4];
	  			}
			 }
			 else
			 {
				 $m = $c % $rc;
				 if ($m==0)
				 {
					 $m=$rc;
				 }
 	  			for($i = 0; $i<$m; $i++)
 				{
 	  				echo  $r[0] . $q[$i][0] . $r[1] . $q[$i][0] . $r[2] . $q[$i][2] . $r[3] .$q[$i][1] .$r[4];
 	  			}
			 
			 }
			 echo $r[6];
		 }
	}
?>
