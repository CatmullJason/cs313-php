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
		<h2>Enter Details in Every Field</h2>
		<?php echo '<strong>User ID: ' . $_SESSION['userID'] . '<br><br>Restaurant ID: ' . $_SESSION['restID'] . '</strong><br><br>';
		?>
		<form action="soleticketconfirm.php" method="post">
			<label for="date">Date of Ticket Submission:</label><br>
			<input type="date" name="date"></input><br><br>
			<label for="comment">Issue/Conern:</label><br>
			<textarea rows="5" cols="70" name="comment"></textarea><br><br>
			<labeL for="priority">Maximum Priority</labeL>
			<input type="checkbox" name="priority" checked="checked"></input><br><br>
			<input type="submit" value="Submit" />
		</form>		
	</div><br><br>
	
</body>
</html>