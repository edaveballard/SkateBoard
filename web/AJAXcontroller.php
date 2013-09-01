<?php
	//AJAX controller for SkateBoard
	//trigger_error("AJAX CONTROLLER RAN!");
	file_put_contents("./text.txt",$_REQUEST);
	
	$db = new mysqli("127.0.0.1:3306","root","","SkateBoard");
	session_start();
	
	if($_REQUEST['action'] == "submitComment")
	{
		//Inserts new comment submitted into the db
		$poster = $_REQUEST['user'];
		$parent = $_REQUEST['parent'];
		$content = $_REQUEST['content'];
		$top = $_REQUEST['toplevel'];
		$sql = "INSERT INTO comments (parentID, login, content, time, toplevel) VALUES ('$parent','$poster','$content',NOW(),'$top')";
		$db->query($sql);
	}
	else if($_REQUEST['action'] == "submitPost")
	{
		//Inserts new post submitted into the db
		$poster = $_REQUEST['user'];
		$content = $_REQUEST['content'];
		$type = 0;  //only text posts are possible at this time
		$sql = "INSERT INTO feed (login, content, time, type) VALUES ('$poster','$content',NOW(), $type)";
		$db->query($sql);
	}
	else if ($_REQUEST['action'] == "reloadFeed")
	{
		include "feed.php";
	}
	
	?>