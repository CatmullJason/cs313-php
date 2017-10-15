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
			<button type='submit'>Submit</button>
		</form>

		

	</div><br><br>
	<div class="bodydiv">
		<h1>Current Ticket List</h1>

		<?php

		echo '<table>';
		echo '<tr>';
		echo '<th>Ticket #</th>';
		echo '<th>Date Created</th>';
		echo '<th>Priority</th>';
		echo '<th>Issue</th>';
		echo '</tr>';

		foreach ($db->query('SELECT ticket_id, date_created, max_priority, comment FROM public.ticket') as $row)
		{
			echo '<tr>';
			echo '<td>' . $row['ticket_id'] . '</td>';
			echo '<td>' . $row['date_created'] . '</td>';
			if ($row['max_priority'] == 1){
				echo '<td>Yes</td>';
			}
			else {
				echo '<td>No</td>';
			}			
			echo '<td>' . $row['comment'] . '</td>';
			echo '<tr>';
		}

		echo '</table>';
		?>
	</div>
	</body>
	</html>