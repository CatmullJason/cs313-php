<?php

/******************************************************
* Connects to database whether on Heroku or on local
*
*
*
*******************************************************/

function get_db() {
// Heroku
	$dbUrl = getenv('DATABASE_URL');


	if (empty($dbUrl)) {

// Local
		$dbPass = getenv('dbPassword');
		$dbUser = getenv('dbUser');
		$dbUrl = "postgres://$dbUser:$dbPass@localhost:5432/tickets";
	}

	$dbopts = parse_url($dbUrl);

	$dbHost = $dbopts["host"];
	$dbPort = $dbopts["port"];
	$dbUser = $dbopts["user"];
	$dbPassword = $dbopts["pass"];
	$dbName = ltrim($dbopts["path"],'/');

	try {
		$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
	}
	catch (PDOException $ex) {
		die();
	}
	return $db;
}
?>
