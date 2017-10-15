<?php
session_name("ticket");
session_start();
require "dbConnect.php";
$db = get_db();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Search Results</title>
	<link rel="stylesheet" href="ticketstyle.css">
</head>
<body>
	<div class="header">
		Lucky Dine Help Desk
	</div><br><br>
	<div style="text-align: left" class="bodydiv">
		<?php
		$userName = $_POST['selectUser'];
		$noUserFound = "select";
		$userID;

		if ($userName !== $noUserFound) {
			$statement = $db->prepare("SELECT user_id, name, phone FROM public.user WHERE name=:name");
			$statement->bindValue(':name', $userName, PDO::PARAM_STR);
			$statement->execute();

			while ($row = $statement->fetch(PDO::FETCH_ASSOC))
			{
				$userID=$row['user_id'];
				echo '<p>';
				echo '<strong>' . $row['name'] . '<br></strong>';
				echo 'ID NUMBER:       ' . $row['user_id'] . '<br>';
				echo 'PHONE NUMBER:    ' . $row['phone'] ;
				echo '</p>';
			}

			$statement = $db->prepare("SELECT * FROM public.ticket RIGHT JOIN public.restaurant ON public.ticket.restaurant_id = public.restaurant.restaurant_id WHERE user_id=:user_id");
			$statement->bindValue(':user_id', $userID, PDO::PARAM_STR);
			$statement->execute();

			while ($row = $statement->fetch(PDO::FETCH_ASSOC))
			{
				echo '<p>';
				echo '<strong>' . 'Ticket Number: ' . $row['ticket_id'] . '<br></strong>';
				echo 'Restaurant: ' . $row['name'] . '<br>';
				echo 'Comments: ' . $row['comment'] . '<br>';
				echo 'Address: ' . $row['address'] . '<br>' ;
				echo '</p>';
			}
		}
		else if ($userName == $noUserFound) {
		echo '<strong>No users found matching that name.</strong>';
		}
		?>
	</div><br><br><br>
	<div style="text-align: center">
	<a href="helpdesk.php">
		<img src="media/back.png" alt="go back"
		style="width:60px;height:60px;border:0"></a>
	</div>
</body>
</html>