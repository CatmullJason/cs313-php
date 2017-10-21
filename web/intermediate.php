<?php
session_name("ticket");
session_start();
require "dbConnect.php";
$db = get_db();

$userID = $_POST['userID'];
$restID = $_POST['restID'];
$_SESSION['userID'] = $userID;
$_SESSION['restID'] = $restID;
$userFound = "";
$restaurantFound = "";

try
{
	$statement = $db->prepare("SELECT user_id FROM public.user WHERE user_id=:user_id");
			$statement->bindValue(':user_id', $userID, PDO::PARAM_STR);
			$statement->execute();

			while ($row = $statement->fetch(PDO::FETCH_ASSOC))
			{
				$userFound=$row['user_id'];
				echo $userFound;
			}

	$statement = $db->prepare("SELECT restaurant_id FROM public.restaurant WHERE restaurant_id=:rest_id");
			$statement->bindValue(':rest_id', $restID, PDO::PARAM_STR);
			$statement->execute();

			while ($row = $statement->fetch(PDO::FETCH_ASSOC))
			{
				$restaurantFound=$row['restaurant_id'];
				echo $restaurantFound;
			}

	if ($userFound && $restaurantFound)
	{
		header("Location: soleticket.php");
		die();
	}
	else
	{
		header("Location: fullticket.php");
		die();
	}
}
catch (PDOException $ex)
{
	echo "$ex";
	die();
}
?>