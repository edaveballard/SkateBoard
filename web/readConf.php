<?php
//reads in the SkateBoard.config file

$cnf = file('../SkateBoard.config', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$config = array();
foreach($cnf as $line)
{
	if(substr($line, 0, 1) != "#")
	{
		$ln = explode(":",$line,2);
		$config[$ln[0]] = trim($ln[1]);
	}
}

