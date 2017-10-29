<?php
session_name("ticket");
session_start();
require "dbConnect.php";
$db = get_db();

//the next section of php authenticates the username and password for admin

if (isset($_SESSION['login_user']))
{
}
else
{
$name = $_POST['username'];
$password = $_POST['password'];

$statement = $db->prepare('SELECT name, password FROM public.admin WHERE name=:name AND password = crypt(:password, password)');
$statement->bindValue(':name', $name, PDO::PARAM_STR);
$statement->bindValue(':password', $password, PDO::PARAM_STR);
$statement->execute();

$isUserExistingAndCorrect = false;

while ($row = $statement->fetch(PDO::FETCH_ASSOC))
	{
		$isUserExistingAndCorrect = true;
	}

//if username and password match proceed, otherwise redirect
if ($isUserExistingAndCorrect)
{
	$_SESSION['login_user']= $name;
}
else 
{
	header("Location: sorry.php");
}
}

//check if solve button has been pressed
if (isset($_POST['solve'])) {
	$temp = $_POST['solve'];
	$statement = $db->prepare('UPDATE public.ticket SET solved=true WHERE ticket_id=:ticket_id');
	$statement->bindValue(':ticket_id', $temp, PDO::PARAM_STR);
	$statement->execute();
}

//check if delete button has been pressed
if (isset($_POST['delete'])) {
	$temp = $_POST['delete'];
	$statement = $db->prepare('DELETE FROM public.ticket WHERE ticket_id=:ticket_id');
	$statement->bindValue(':ticket_id', $temp, PDO::PARAM_STR);
	$statement->execute();
}

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
	<div class="bodydiv">
		<h1>Select User For More Details</h1>

		<form name="userDropDown" action="userResults.php" method="post">
			<select name="selectUser">
				<option value="select">Select User</option>
				<?php
				$statement = $db->query('SELECT name FROM public.user');
				while($row = $statement->fetch(PDO::FETCH_ASSOC))
				{
					echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
				}				
				?>
			</select>
			<button class="button button1" type='submit'>Submit</button>
		</form>
	</div><br><br>
	<div class="bodydiv" style="min-width: 1000px">
		<h1>Current Ticket List</h1>

		<?php

		echo '<table>';
		echo '<tr>';
		echo '<th>Ticket #</th>';
		echo '<th>User</th>';
		echo '<th>Date Created</th>';
		echo '<th>Priority</th>';
		echo '<th>Issue</th>';
		echo '<th>Solved</th>';
		echo '<th>Delete</th>';
		echo '</tr>';
		

		foreach ($db->query('SELECT public.user.name, public.ticket.ticket_id, public.ticket.date_created, public.ticket.max_priority, public.ticket.comment, public.ticket.solved FROM public.ticket INNER JOIN public.user ON public.ticket.user_id=public.user.user_id ORDER BY ticket_id') as $row)
		{
			echo '<tr>';
			echo '<td>' . $row['ticket_id'] . '</td>';
			echo '<td>' . $row['name'] . '</td>';
			echo '<td>' . $row['date_created'] . '</td>';
			if ($row['max_priority'] == 1){
				echo '<td>Yes</td>';
			}
			else {
				echo '<td>No</td>';
			}			
			echo '<td>' . $row['comment'] . '</td>';

			//the solve button
			echo '<td>';
			if ($row['solved'] == false) {
				echo '<form method="post" action="helpdesk.php">';
				echo '<input type="text" name="solve" style="display: none" value="'. $row['ticket_id'] . '"></input>';
				echo '<button type="submit">SOLVE</button>';
				echo '</form>';
			}
			else {
				echo 'SOLVED';
			}
			echo '</td>';

			//the delete button
			echo '<td>';
			echo '<form method="post" action="helpdesk.php">';
			echo '<input type="text" name="delete" style="display: none" value="'. $row['ticket_id'] . '"></input>';
			echo '<button type="submit">DELETE</button>';
			echo '</form>';
			echo '</td>';	
			echo '</tr>';		
		}

		echo '</table>';
		?>
	</div><br><br>
	<div class="bodydiv" style="width: 30px">
		<form  action="logout.php">
			<button class="button button1" type="submit">Logout</button>
		</form>
	</div><br><br><br>
</body>
</html>