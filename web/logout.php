<?php
session_name("ticket");
session_start();
require "dbConnect.php";
$db = get_db();

session_destroy();
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
		<p style="font-size: 150%;"><strong>Thank you, you've been logged out successfully.</strong></p>
	</div><br><br><br>
	<div style="text-align: center; line-height: 60px; height: 60px;"">
		<a href="login.php">
			<img src="media/back.png" alt="go back"
			style="width:60px;height:60px;border:0">RETURN TO MAIN PAGE</a>
	</div>


	</body>
</html>