<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		table, th, td {
			border: 2px solid black;
			border-collapse: collapse;
			text-align: center;
		}

		table {
			width: 60%;
		}

		tr:nth-child(even) {
			background: blue;
			color: white;
		}

		tr:nth-child(even) a{
			color: white;
		}

		tr:nth-child(odd) a{
			color: black;
		}

		tr:nth-child(odd) {
			background: yellow;
		}

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
	<title>Search</title>
</head>
<body> <center> <h3></h3>

<?php

	$host = "localhost";
	$user = "root";
	$pass = "";

	$dbName = "publications";

	$conn = @mysqli_connect($host, $user, $pass, $dbName); // Connect to the server

	if(isset($_POST["searchBook"]))	{
		$reg = $_POST["searchBook"]; // Title to search for
		$query = @mysqli_query($conn, "SELECT name, author,publishing, year FROM titles WHERE title LIKE '%".$reg."%'"); // Query to search
		$index = 0;
		$table = '<h3>Here are the records which matched the given title. <a href="main.php">Go back</a></h3><table>
					<tr>
						<th>S No.</th>
						<th>Name</th>
						<th>Author</th>
						<th>Publishing</th>
						<th>Year</th>
					</tr>';
		while ($row = @mysqli_fetch_row($query)) {
			$name = $row[0];
			$author = $row[1];
			$publishing = $row[2];
			$year = $row[3];
			
			$table .= '<tr>
				<td>'.($index+1).')</td>
				<td>'.$name.'</td>
				<td>'.$author.'</td>
				<td>'.$publishing.'</td>
				<td>'.$year.'</td>
			</tr>';
			
			$index++;
		}
		$table .= '</table>';

		if($index > 0) {
			echo $table;
		} else {
			echo "<h3>No books matched the given title.<br><a href='main.php'>Go back</a></h3>";
		}

	} elseif (isset($_POST["searchYear"])) {
		$yearT = $_POST["searchYear"];
		$query = @mysqli_query($conn, "SELECT name, author,publishing, year FROM titles WHERE year =" . $yearT . " "); // Query to search
		$index = 0;
		$table = '<h3>Here are the records</h3><table>
					<tr>
						<th>S No.</th>
						<th>Name</th>
						<th>Author</th>
						<th>Publishing</th>
						<th>Year</th>
					</tr>';

		while ($row = @mysqli_fetch_row($query)) { // Get from table
			$name = $row[0];
			$author = $row[1];
			$publishing = $row[2];
			$year = $row[3];
			
			$table .= '<tr>
				<td>'.($index+1).')</td>
				<td>'.$name.'</td>
				<td>'.$author.'</td>
				<td>'.$publishing.'</td>
				<td>'.$year.'</td>
			</tr>';
			
			$index++;
		}

		$table .= '</table>';
		if($index > 0) {
			echo $table;
			echo "<br>There were a total of ".$index." books in this year.";
			echo "<br><a href='main.php'>Go back</a>";
		} else {
			echo "<h3>No results of that criteria. Please try again.<br><a href='main.php'>Go back</a></h3>";
		}
	} elseif (isset($_POST["searchCountry"])) {
		$searchC = $_POST["searchCountry"];
		$query = @mysqli_query($conn, "SELECT titles.name, titles.title, titles.year, authors.country FROM titles, authors WHERE authors.name = titles.name AND authors.country = '" . $searchC . "'");
		$index = 0;
		$table = '<h3>Here are the records</h3><table>
					<tr>
						<th>S No.</th>
						<th>Name</th>
						<th>Author</th>
						<th>Publishing</th>
						<th>Year</th>
					</tr>';


		while ($row = @mysqli_fetch_row($query)) {
			$name = $row[0];
			$author = $row[1];
			$publishing = $row[2];
			$year = $row[3];

			$table .= '<tr>
					<td>'.($index+1).')</td>
					<td>'.$name.'</td>
					<td>'.$author.'</td>
					<td>'.$publishing.'</td>
					<td>'.$year.'</td>
				</tr>';

			$index++;
		}

		$table .= '</table>';
		if($index > 0) {
			echo $table;
			echo "<br><a href='main.php'>Go back</a>";
		} else {
			echo "<h3>No results of that criteria. Please try again.<br><a href='main.php'>Go back</a></h3>";
		}
	} else {
		echo "<h3>Looks like you've wandered off. <br><a href='main.php'>Go to home</a></h3>";
	}

?>
</center> </body>
</html>
