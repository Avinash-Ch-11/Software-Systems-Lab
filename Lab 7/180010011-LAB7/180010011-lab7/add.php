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
	<title>Add a field</title>
</head>
<body> <center> <h2>

<?php

	$host = "localhost";
	$user = "root";
	$pass = "";

	$dbName = "publications";

	$conn = @mysqli_connect($host, $user, $pass, $dbName); // Connect to the server

	if($conn) {

		if(isset($_POST["authName"])) { // Insert for author
			
			$query = "INSERT INTO authors ";
			$query .= "(author, publisher) VALUES ";
			$query .= "('".$_POST["authName"]."', '".$_POST["authPublisher"]."', '".)";

			if(@mysqli_query($conn, $query)) {
				header('Location: main.php');
			} else {
				echo "There was an error inserting the record. Try again.<br><a href='main.php'>Go back</a>";
			}

		} elseif (isset($_POST["titleName"])) { // Insert for Title

			if($_POST["titleYear"] == "") $_POST["titleYear"] = "CAST(NULL AS INT)"; // Setting year to NULL if it's ''

			$query = "INSERT INTO titles ";
			$query .= "(title, author, year) VALUES ";
			$query .= "('".$_POST["titleT"]."', '".$_POST["titleAuthor"]."', ".$_POST["titleYear"].")";

			if(@mysqli_query($conn, $query)) {
				header('Location: main.php');
			} else {
				echo "There was an error inserting the record. Try again.<br><a href='main.php'>Go back</a>";
			}

		} else {
			echo "Exploring pages eh? But this page is just an auxillary one.<br><a href='main.php'>Go Home</a>";
		}

	} else {
		echo "Failed to connect to the database/server<br><a href='main.php'>Go back</a>";
	}

?>

</h2>
</center> </body>
</html>
