<?php
session_name("ticket");
session_start();
require "dbConnect.php";
$db = get_db();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Help Desk</title>
	<link rel="stylesheet" href="ticketstyle.css">
</head>
<body>
	<div class="header">
		Lucky Dine Help Desk
	</div><br><br>
	<div class="bodydiv" style="background: #a0b6db;">
		<h2>Create New Ticket</h2>
		<form action="intermediate.php" method="post">
			<label for="userID">User ID Number:</label><br>
			<input type="text" name="userID"></input><br><br>
			<label for="restID">Restaurant ID Number:</label><br>
			<input type="text" name="restID"></input><br><br>
			<input type="submit" value="Submit" />
		</form>		
	</div><br><br>
	<div class="bodydiv" style="background: #a0b6db;">
		<h2>Administrator Login</h2>
		<form action="helpdesk.php" method="post">
			<label for="username">Username:</label><br>
			<input type="text" name="username"></input><br><br>
			<label for="password">Password:</label><br>
			<input type="password" name="password"></input><br><br>
			<input type="submit" value="Login" />
		</form>
	</div>
	<a href="assignments.html">Return to Assignments</a>
</body>
</html>