<?php
session_name("ticket");
session_start();
require "dbConnect.php";
$db = get_db();

$restID = $_SESSION['restID'];
$userID = $_SESSION['userID'];
//user variables
$userName = $_POST['userName'];
$jobTitle = $_POST['jobTitle'];
$userPhone = $_POST['userPhone'];
if ($userPhone != null){
	$newStr = "";
	$strlen = strlen($userPhone);
	for ($i = 0; $i <= $strlen; $i++){
		if (is_numeric($userPhone[$i])){
			$newStr = $newStr . $userPhone[$i];
		}
	}
	$userPhone = $newStr;
}

//restaurant variables
$restaurant = $_POST['restaurant'];
$address = $_POST['address'];
$zip = $_POST['zip'];
$restPhone = $_POST['restPhone'];
if ($restPhone != null){
	$newStr = "";
	$strlen = strlen($restPhone);
	for ($i = 0; $i <= $strlen; $i++){
		if (is_numeric($restPhone[$i])){
			$newStr = $newStr . $restPhone[$i];
		}
	}
	$restPhone = $newStr;
}

//ticket variables
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
		//restaurant table insert
		$statement = $db->prepare('INSERT INTO public.user(user_id, name, job_title, phone) VALUES(:user_id, :name, :job_title, :phone)');
		$statement->bindValue(':user_id', $userID, PDO::PARAM_STR);
		$statement->bindValue(':name', $userName, PDO::PARAM_STR);
		$statement->bindValue(':job_title', $jobTitle, PDO::PARAM_STR);
		$statement->bindValue(':phone', $userPhone, PDO::PARAM_STR);

		$statement->execute();

		//restaurant table insert
		$statement = $db->prepare('INSERT INTO public.restaurant(restaurant_id, name, address, zip_code, phone) VALUES(:restaurant_id, :name, :address, :zip_code, :phone)');
		$statement->bindValue(':restaurant_id', $restID, PDO::PARAM_STR);
		$statement->bindValue(':name', $restaurant, PDO::PARAM_STR);
		$statement->bindValue(':address', $address, PDO::PARAM_STR);
		$statement->bindValue(':zip_code', $zip, PDO::PARAM_STR);
		$statement->bindValue(':phone', $restPhone, PDO::PARAM_STR);

		$statement->execute();

		//ticket table insert
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