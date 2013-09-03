<?php

	//read in config
	include "../web/readConf.php";

	//database host and credentials
	$host = $config['DB_host'];
	$usr = $config['DB_user'];			//user
	$pass = $config['DB_password'];	//password
	
	$db = new mysqli($host,$usr,$pass);

	// Create database
	$sql="CREATE DATABASE IF NOT EXISTS SkateBoard";
	echo $db->query($sql);
	
	//Set Up Tables
	$db = new mysqli($host,$usr,$pass,"SkateBoard");
	
	//users
	$sql = "CREATE TABLE IF NOT EXISTS `users` (
		`userID` int(11) NOT NULL AUTO_INCREMENT,
		`login` varchar(64) COLLATE utf8_bin NOT NULL,
		`password` varchar(64) COLLATE utf8_bin NOT NULL,
		`first` varchar(64) COLLATE utf8_bin NOT NULL,
		`last` varchar(64) COLLATE utf8_bin NOT NULL,
		`dob` date NOT NULL,
		PRIMARY KEY (`userID`)
		) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;";
	echo $db->query($sql);
	
	//feed
	$sql = "CREATE TABLE IF NOT EXISTS `feed` (
		`postID` int(11) NOT NULL AUTO_INCREMENT,
		`login` varchar(64) COLLATE utf8_bin NOT NULL,
		`type` int(11) NOT NULL,
		`content` varchar(2048) COLLATE utf8_bin NOT NULL,
		`time` datetime NOT NULL,
		PRIMARY KEY (`postID`)
		) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;";
	echo $db->query($sql);
	
	//comments
	$sql = "CREATE TABLE IF NOT EXISTS `comments` (
		`commentID` int(11) NOT NULL AUTO_INCREMENT,
			`parentID` int(11) NOT NULL,
		`login` varchar(64) COLLATE utf8_bin NOT NULL,
		`content` varchar(2048) COLLATE utf8_bin NOT NULL,
		`time` datetime NOT NULL,
		`toplevel` int(11) NOT NULL DEFAULT '0',
		PRIMARY KEY (`commentID`)
		) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;";
	echo $db->query($sql);
	
	//calendar
	$sql = "CREATE TABLE IF NOT EXISTS `calendar` (
		`eventID` int(11) NOT NULL AUTO_INCREMENT,
		`time` datetime NOT NULL,
		`title` varchar(128) COLLATE utf8_bin NOT NULL,
		`description` varchar(1024) COLLATE utf8_bin NOT NULL,
		PRIMARY KEY (`eventID`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;";
	echo $db->query($sql);