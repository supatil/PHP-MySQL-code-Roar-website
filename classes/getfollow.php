<?php
    class getFollows
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
			require_once (dirname(__FILE__).'//..//views/followFormatted.php');			
			require_once (dirname(__FILE__).'//..//views/viewAll.php');
			//check that a user has chosen a roar navigation or has just arrived at site
			//nav is empty if user just arrived
			echo $viewAll[0];
			
            if(isset($_GET['follow']))
			{
				
				$nav = explode(',',$_GET['follow']);
				$nvcnt = count($nav);
				$_SESSION['page_count'] = $nav[0];
				$_SESSION['follow'] = $nav[1];
				$pgcnt = $_SESSION['page_count'];
				$follow = $_SESSION['follow'];
				
				//$r = roars per page to display
				$r = 12;
				$frstRes = $pgcnt * $r;
				if($nvcnt > 1 and (isset($_SESSION['user_name'])))
				{	
					if($follow == 'following')
					{
						$uid = ($_SESSION['user_id']);
						$this->getFollowings($uid, $pgcnt, $r, $flwDivs);
					}
					elseif($follow == 'followers')
					{
						$uid = ($_SESSION['user_id']);
						$this->getFollowers($uid, $pgcnt, $r, $flwDivs);
					}
					
					
				} 
				if($follow == 'search')
				{
			        if (empty($_POST["search"])) 
					{
			            $this->errors[] = "Please add content to query.";
			        } else {
						$p = $_POST["search"];
						$items = explode(' ',$p);
						$this->search($pgcnt, $r, $flwDivs, $items);
			        }
				
				}

			} 
					
		}
		function getFollowers($uid, $pc, $fpp, $fdivs)
		{
			require_once(dirname(__FILE__).'/queries/getFllws.php');			
			$flws = Followers($fpp, $pc, $uid);
			$qry = $flws[0];
			$cnt = $flws[1];
			$this->follow($fdivs, $qry, $fpp, $cnt, $r);

			
		}
		function getFollowings($uid, $pc, $fpp, $fdivs)
		{
			require_once(dirname(__FILE__).'/queries/getFllwngs.php');			
			$flws = Followings($fpp, $pc, $uid);
			$qry = $flws[0];
			$cnt = $flws[1];
			$this->follow($fdivs, $qry, $fpp, $cnt);

			
		}
		function search( $pc, $fpp, $fdivs, $qy)
		{
			require_once(dirname(__FILE__).'/queries/searchUsers.php');			
			$flws = SearchUsers($fpp, $pc, $qy);
			$qry = $flws[0];
			$cnt = $flws[1];
			$this->follow($fdivs, $qry, $fpp, $cnt);
		}
		
		 //$f is followDivs array, $q is query results array, $fc is followers per page, $c is total # follows
		 private function follow($f, $q, $fc, $c)
		 {
			 
			 if($c < $fc/2)
			 {
				 echo $f[6];
				 if($c<1)
				 {
		 	
				 }
				 elseif(($c > $fc) && ($c - (($_SESSION['page_count']+1)*$fc))> 0)
				 {
		  			for($i = 0; $i<$rc; $i++)
					{
						
						
							echo  $f[0] . $q[$i][0] . $f[1] . $q[$i][0] . $f[2];
						
	  				
		  			}
				 }
				 else
				 {
					 $m = $c % $fc;
					 if ($m==0)
					 {
						 $m=$fc;
					 }
		  			for($i = 0; $i<$m; $i++)
					{
	
							echo  $f[0] . $q[$i][0] . $f[1] . $q[$i][0] . $f[2];

	  				
		  			}
			 
				 }
				 echo $f[5];
			 }
			 else
			 {
				 echo $f[3];
				 if($c<1)
				 {
		 	
				 }
				 elseif(($c > $fc) && ($c - (($_SESSION['page_count']+1)*$fc))> 0)
				 {
		  			for($i = 0; $i<$rc; $i++)
					{
						if($i%2 == 0)
						{
							echo  $f[0] . $q[$i][0] . $f[1] . $q[$i][0] . $f[2];
						}
	  				
		  			}
				 }
				 else
				 {
					 $m = $c % $fc;
					 if ($m==0)
					 {
						 $m=$fc;
					 }
		  			for($i = 0; $i<$m; $i++)
					{
						if($i%2 == 0)
						{
							echo  $f[0] . $q[$i][0] . $f[1] . $q[$i][0] . $f[2];
						}
	  				
		  			}
			 
				 }
				 echo $f[5];
	 			 echo $f[4];
	 			 if($c<1)
	 			 {
		 	
	 			 }
	 			 elseif(($c > $fc) && ($c - (($_SESSION['page_count']+1)*$fc))> 0)
	 			 {
	 	  			for($i = 0; $i<$rc; $i++)
	 				{
	 					if($i%2 == 1)
	 					{
	 						echo  $f[0] . $q[$i][0] . $f[1] . $q[$i][0] . $f[2];
	 					}
	  				
	 	  			}
	 			 }
	 			 else
	 			 {
	 				 $m = $c % $fc;
	 				 if ($m==0)
	 				 {
	 					 $m=$fc;
	 				 }
	 	  			for($i = 0; $i<$m; $i++)
	 				{
	 					if($i%2 == 1)
	 					{
	 						echo  $f[0] . $q[$i][0] . $f[1] . $q[$i][0] . $f[2];
	 					}
	  				
	 	  			}
			 
	 			 }
	 			  echo $f[5];
			 }
			 
		 }
		 private function nav($p, $r, $c, $rc)
		 { 
			if(($c > $rc) && $c - (($_SESSION['page_count']+1)*$rc)> 0)
			{	
			
				$pgcnt = $_SESSION['page_count'] + 1;
	            if(isset($_GET['follow']))
				{ 
					$nav = explode(',',$_GET['follow']);
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
	            if(isset($_GET['follow']))
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
 
	}
	?>
