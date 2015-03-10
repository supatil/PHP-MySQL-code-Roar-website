    <div id="pagecontent"><!-- Page Content that is NOT static -->
		
		<?php

			if(isset($_GET['follow']))
			{
				$nav = explode(',',$_GET['follow']);
				$nvcnt = count($nav);
				$_SESSION['page_count'] = $nav[0];
				$pgcnt = $_SESSION['page_count'];
				require_once(dirname(__FILE__).'/classes/getfollow.php');
				$flw = new getFollows();
				require_once(dirname(__FILE__).'/views/search.php');
	
			}
			elseif(isset($_GET['about']))
			{
				require_once(dirname(__FILE__).'/views/search.php');
			}
			elseif(isset($_GET['register']))
			{

				require_once("register.php");
				require_once("views/register.php");
			}
			else
			{
				require_once("views/new_post.php");
				require_once("classes/view_posts.php");
				require_once("classes/followUser.php");
				$follow = new FollowUser();
				$addNewPost = new NewPost(); 
				$posts = new getPosts(); 
				require_once(dirname(__FILE__).'/views/search.php');
			}
			
		?>
		

    </div>

</div>
</body>
</html>