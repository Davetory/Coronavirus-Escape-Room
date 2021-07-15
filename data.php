<?php
	$conn = new mysqli("localhost", "hhvu", "Pherumeo", "hhvu");
	
	if ($conn -> connect_errno)
	{
		die("Connection failed: " . $conn->connect_error);
		exit();
	}
	
	$sql = "INSERT INTO timerup (name, time) VALUES ('". $_POST['name'] . "'," . $_POST['timer'] . ")";
	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
?>