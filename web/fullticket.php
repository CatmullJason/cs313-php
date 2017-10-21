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
		<h2>Your User ID and/or Restaurant ID did not<br> 
			match any current users or restaurants. <br>
			Please fill out the form below to submit<br>
			a new ticket.</h2>
		<h3><p style="color: red;">(Required Fields (*))</p></h3>
		<?php echo '<strong>User ID: ' . $_SESSION['userID'] . '<br>Restaurant ID: ' . $_SESSION['restID'] . '</strong><br>';
		?>
		<form action="fullticketconfirm.php" method="post">
			<h2><u>User</u></h2>
			<label for="userName">Full Name:</label><br>
			<input type="text" name="userName" required></input>*<br><br>
			<label for="jobTitle">Job Position:</label><br>
			<input type="text" name="jobTitle" required></input>*<br><br>
			<label for="userPhone">User Phone #:</label><br>
			<input type="text" name="userPhone" required></input>*<br><br>
			<h2><u>Restaurant</u></h2>
			<label for="restaurant">Name of Restaurant:</label><br>
			<input type="text" name="restaurant" required></input>*<br><br>
			<label for="address">Address:</label><br>
			<input type="text" name="address" required></input>*<br><br>
			<label for="zip">Zip Code:</label><br>
			<input type="text" name="zip" required></input>*<br><br>
			<label for="restPhone">Restaurant Phone #:</label><br>
			<input type="text" name="restPhone" required></input>*<br><br>
			<h2><u>Ticket</u></h2>
			<label for="date">Date of Ticket Submission:</label><br>
			<input type="date" name="date" required></input>*<br><br>
			<label for="comment">Issue/Conern:</label><br>
			<textarea rows="5" cols="70" name="comment" required></textarea>*<br><br>
			<labeL for="priority">Maximum Priority</labeL>
			<input type="checkbox" name="priority" checked="checked"></input><br><br><br>
			<input type="submit" value="Submit" />
		</form>		
	</div><br><br>
	
</body>
</html>