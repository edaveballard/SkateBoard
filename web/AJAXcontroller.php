<?php
	//AJAX controller for SkateBoard
	
	//trigger_error("AJAX CONTROLLER RAN!");
	file_put_contents("./text.txt",$_REQUEST);
	
	$db = new mysqli("127.0.0.1:3306","root","","SkateBoard");
	
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
	else
	{
	
	}
	
	?>