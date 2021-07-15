<!DOCTYPE html>
<html>
<head>
<style>
table {
  width: 100%;
  border-collapse: collapse;
}

table, td, th {
  border: 1px solid black;
  padding: 5px;
}

th {text-align: center;}
</style>
</head>
<body>

<?php
	$conn = new mysqli("localhost", "hhvu", "Pherumeo", "hhvu");
	
	if ($conn -> connect_errno)
	{
		die("Connection failed: " . $conn->connect_error);
		exit();
	}
	
	$info = "SELECT name, time FROM timerup ORDER BY time ASC LIMIT 10";
	$result = $conn->query($info);
	
	if ($result)
	{
		echo "<table>
		<tr>
		<th>NAME</th>
		<th>TIME</th>
		</tr>";
		while ($row = mysqli_fetch_assoc($result))
		{
			echo "<tr>";
			echo "<td>" . $row['name'] . "</td>";
			echo "<td>" . $row['time'] . "</td>";
		}
		echo "</table>";
		$result->close();
	}
	$conn->close();
?>

<script>
	function formatTime(time) {
  const minutes = Math.floor(time / 60);
  let seconds = time % 60;

  if (seconds < 10) {
    seconds = `0${seconds}`;
  }

  return `${minutes}:${seconds}`;
}
</script>
</body>
</html>
		