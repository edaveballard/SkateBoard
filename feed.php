<?php
		//ye olde news feed
		
		
		function get_comments($parentID , $topLevel = false)
		{
			global $db;
			$sql = "SELECT * FROM `comments` JOIN `users` USING(login) WHERE parentID = $parentID AND toplevel = ".($topLevel ? 1 : 0);
			$comments = $db->query($sql)->fetch_all(MYSQLI_ASSOC);
			
			if(!empty($comments))
			foreach($comments as $key => $value)
			{
				$comments[$key]['comments'] = get_comments($value['commentID']);
			}
			
			return $comments;
			
		}
		
		function draw_comment($comments, $indent)
		{
			foreach($comments as $com)
			{
				echo "<div class='commentBox' style='margin-left: $indent".'px'."'>";
				echo $com['content']." <br /><b>".$com['first']." ".$com['last']."</b> <span class='greyed'>".$com['time']."</span> <a href=''>comment</a>";
				echo "</div>";
				if(isset($com['comments']) && !empty($com['comments']))
					draw_comment($com['comments'],$indent+20);
			}
		}
		
		//arbitrary posts-to-appear limit
		$limit = 30;
		$sql = "SELECT * FROM `feed` JOIN `users` USING(login) ORDER BY postID DESC LIMIT $limit";
		$posts = $db->query($sql)->fetch_all(MYSQLI_ASSOC);
		
		echo "<div id='feedBox' class='contentBox'>";
			//var_export($posts);
			
			foreach($posts as $post)
			{
				$coms = get_comments($post['postID'], true);
				//now draw it and stuff
				echo "<div class='postBox'>";
				echo "<div class='postHeader'>";
				echo "Posted by ".$post['first']." ".$post['last']." at ".$post['time'];
				echo "</div><div class='postContent'>";
				echo $post['content'];
				
				echo "</div><div class='postFooter'>";
				echo "<a href=''>[Post Comment]</a>";
				echo "</div><div class='postComment'>";
				//comment stuff
				if(!empty($coms))
					echo "<hr />";
				draw_comment($coms,1);
				echo "</div></div>";
				
				
			}
			
		echo "</div>";
		

?>