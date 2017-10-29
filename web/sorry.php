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
		<p style="font-size: 150%;"><strong>Sorry, incorrect password or username.</strong></p>
	</div><br><br><br>
	<div style="text-align: center; line-height: 60px; height: 60px;"">
		<a href="login.html">
			<img src="media/back.png" alt="go back"
			style="width:60px;height:60px;border:0"></a>
	</div>
</body>
</html>