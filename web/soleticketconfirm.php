<?php
session_name("ticket");
session_start();
require "dbConnect.php";
$db = get_db();

$restID = $_SESSION['restID'];
$userID = $_SESSION['userID'];
$date = $_POST['date'];
$priority = isset($_POST['priority']) ? 1 : 0;
$comment = $_POST['comment'];
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
	<?php
	try
	{
		$statement = $db->prepare('INSERT INTO public.ticket(restaurant_id, user_id, date_created, max_priority, comment) VALUES(:restID, :userID, :dateSubmitted, :priority, :comment)');
		$statement->bindValue(':restID', $restID, PDO::PARAM_STR);
		$statement->bindValue(':userID', $userID, PDO::PARAM_STR);
		$statement->bindValue(':dateSubmitted', $date, PDO::PARAM_STR);
		$statement->bindValue(':priority', $priority, PDO::PARAM_STR);
		$statement->bindValue(':comment', $comment, PDO::PARAM_STR);

		$statement->execute();
	}
	catch (PDOExecption $ex)
	{

		echo "$ex";
		die();
	}
	?>
	<div class="bodydiv" style="background: #a0b6db;">
		<p style="font-size: 150%;"><strong>Thank you, your ticket has been submitted.</strong></p>
	</div><br><br><br>
	<div style="text-align: center; line-height: 60px; height: 60px;"">
		<a href="login.html">
			<img src="media/back.png" alt="go back"
			style="width:60px;height:60px;border:0"></a>
	</div>

</body>
</html>