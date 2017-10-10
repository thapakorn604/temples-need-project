<?php
error_reporting(0);
	$host = "localhost";
	$user = "root";
	$mypass = "";
	$dbname = "temples";

	$mysqli = new mysqli($host, $user, $mypass, $dbname);

	$mysqli->set_charset("utf8");

	mysqli_query("SET NAMES UTF8");
	mysqli_query("SET character_set_results=utf8");
	mysqli_query("SET character_set_client=utf8");
	mysqli_query("SET character_set_connection=utf8");

	// mysql_query("collation_connection = utf8_unicode_ci");
	// mysql_query("collation_database = utf8_unicode_ci");
	// mysql_query("collation_server = utf8_unicode_ci");


?>
