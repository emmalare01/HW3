<?php

require_once  'login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

$query = "SELECT * FROM usertable";

$result = $conn->query($query); 
if(!$result) die($conn->error);

$rows = $result->num_rows;

for($j=0; $j<$rows; $j++)
{
	//$result->data_seek($j); 
	$row = $result->fetch_array(MYSQLI_ASSOC); 

echo <<<_END
	<pre>
	Username: $row[username]
	Forename: $row[forename]
	Surname: $row[surname]
	Password: $row[password]
	ID: $row[id]	
	</pre>
	
	<form action='deleteRecord.php' method='post'>
		<input type='hidden' name='delete' value='yes'>
		<input type='hidden' name='isbn' value='$row[isbn]'>
		<input type='submit' value='DELETE RECORD'>	
	</form>
	
_END;

}

$conn->close();



?>