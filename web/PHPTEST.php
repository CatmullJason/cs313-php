<?php

require "dbConnect.php";
$db = get_db();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Test Notes</title>
</head>

<body>
<div>

<h1>Notes</h1>

<?php

$statement = $db->prepare("SELECT username, password FROM note_user");
$statement->execute();

while ($row = $statment->fetch(PDO::FETCH_ASSOC))
	{
		echo $row['username'] . ' ' . $row['password'];
	}


?>


</div>

</body>
</html>