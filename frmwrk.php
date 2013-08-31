<?php
	echo '<link rel="stylesheet" href="default.css" type="text/css">';
	session_start();
	$title = "Ballard's Talking Lawn 0.15"
	
	echo 	"<title>
					$title
				</title>";
	if(isset($_SESSION['SkateBoard']['user']))
	{
		$user = $_SESSION['SkateBoard']['user'];
		$db = new mysqli("127.0.0.1:3306","root","","SkateBoard");
	}
	else
	{
		echo '<meta http-equiv="REFRESH" content="0;url=login.php">';
		exit;
	}
	
	
	echo '<div id="uBar">';
	echo 'Logged in as '.$_SESSION['SkateBoard']['user'].'.  <a href="login.php?logout">[logout]</a>';
	echo '</div>';

	echo '<div id="navBar">';
			
	echo '</div>';
?>