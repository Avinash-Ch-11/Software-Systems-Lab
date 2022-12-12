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
	<title>Update year</title>
</head>
<body> <center>
<h3>

<?php

	$host = "localhost";
	$user = "root";
	$pass = "";

	$dbName = "publications";

	$conn = @mysqli_connect($host, $user, $pass, $dbName); // Connect to the server

	if (isset($_POST["updateYear"])) {
		if($_POST["updateYear"] == "") {
			$_POST["updateYear"] = "CAST(NULL AS INT)";
		}
		
		$query = "UPDATE titles SET year = ". $_POST["updateYear"]." WHERE ID = ".$_POST["ID"];
		if(@mysqli_query($conn, $query)) {
			header('Location: main.php');
		} else {
			"There was a problem updating the year, please <a href='main.php'>try again</a>";
		}

	} else {
		echo "There was a problem updating the year, please <a href='main.php'>try again</a>";
	}

?>

</h3>
</center> </body>
</html>