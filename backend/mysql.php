<?php

	$host = "localhost";
	$user = "root";
	$mypass = "";
	$dbname = "temples";

	$mysqli = new mysqli($host, $user, $mypass, $dbname);

	mysql_query("SET NAMES UTF8");
	mysql_query("SET character_set_results=utf8");
	mysql_query("SET character_set_client=utf8");
	mysql_query("SET character_set_connection=utf8");


?>
