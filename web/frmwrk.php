<?php

	
	
	
	session_start();
	if(!isset($_SESSION['SkateBoard']['config']))
	{
		$_SESSION['SkateBoard'] = array();
		
		//read in config file
		$cnf = file('../SkateBoard.config', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
		$_SESSION['SkateBoard']['config'] = array();
		foreach($cnf as $line)
		{
			if(substr($line, 0, 1) != "#")
			{
				$ln = explode(":",$line,2);
				$_SESSION['SkateBoard']['config'][$ln[0]] = $ln[1];
			}
		}
	}
	
	if(isset($_SESSION['SkateBoard']['config']['Favicon']) && $_SESSION['SkateBoard']['config']['Favicon'] != '')
	{
		echo '<link rel="shortcut icon" href="'.$_SESSION['SkateBoard']['config']['Favicon'].'" />';
		
	}
	else
	{
		echo '<link rel="shortcut icon" href="./favicon.ico" />';
	}
	
	if(isset($_SESSION['SkateBoard']['config']['Stylesheet']) && $_SESSION['SkateBoard']['config']['Stylesheet'] != '')
	{
		echo '<link rel="stylesheet" href="css/default.css" type="text/css">';
	}
	else
	{
		echo '<link rel="stylesheet" href="css/'.$_SESSION['SkateBoard']['config']['Stylesheet'].'" type="text/css">';
	}
	
	echo 	"<title>
					".$_SESSION['SkateBoard']['config']['Title']."
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
	echo '<span id="poweredBy">Powered by <a href="http://github.com/lazorelent/SkateBoard">SkateBoard</a></span>';
	echo '</div>';

	echo '<div id="navBar">';
			
	echo '</div>';
?>