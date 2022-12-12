<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		a {
			text-decoration: none;
			color: blue;
			transition: 400ms;
		}
		a:hover {
			color: green;
			transition: 400ms;
		}
	</style>
	<title>Delete Record</title>
</head>
<body> <center> <h3>

<?php

	$host = "localhost";
	$user = "root";
	$pass = "";

	$dbName = "publications";

	$conn = @mysqli_connect($host, $user, $pass, $dbName); // Connect to the server

	if(isset($_POST["delIndexAuth"])) { // Delete for Authors

		$query = "DELETE FROM authors WHERE ID = ".$_POST["delIndexAuth"];
		if(@mysqli_query($conn, $query)) {
			header('Location: main.php');
		} else {
			echo "There was an error deleting the record. Try again.<br><a href='main.php'>Go back</a>";
		}

	} elseif (isset($_POST["delIndexTit"])) { // Delete for Titles
		
		$query = "DELETE FROM titles WHERE ID = ".$_POST["delIndexTit"];
		if(@mysqli_query($conn, $query)) {
			header('Location: main.php');
		} else {
			echo "There was an error deleting the record. Try again.<br><a href='main.php'>Go back</a>";
		}

	} else {
		echo "Exploring pages eh? But this page is just an auxillary one.<br><a href='main.php'>Go Home</a>";
	}

?>
</h3>
</center></body>
</html>