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
			margin: 5px;
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

		input {
			border-radius: 9px;
			padding-left: 4px;
			border: 2px solid blue;
		}

		#add {
			background: #00EE00;
			border-radius: 8px;
			border: 2px solid green;
			width: 100%;
			text-align: center;
		}

		#delete {
			background: #C60000;
			border-radius: 8px;
			border: 2px solid red;
			width: 100%;
			text-align: center;
			color: white;
		}

		#yearUpdater {
			background: #FF7400;
			border-radius: 8px;
			border: 2px solid orange;
			text-align: center;
			color: white;
		}

		#myInput {
			background-image: url('searchicon.png');
  			background-position: 1% 50%;
  			background-repeat: no-repeat;
			border-radius: 9px;
			padding-left: 3%;
			border: 2px solid #00C90D;
		}

		#pointH {
			cursor: pointer;
		}
	</style>
	<script>
		function blinktext() { // For blinking effect
		  var f = document.getElementById('blinkme');
		  setInterval(function() {
		    f.style.visibility = (f.style.visibility == 'hidden' ? '' : 'hidden');
		  }, 750);
		}
		function hrefYear(idNum) { // Onclick for query
			var c = document.getElementById("myInput").value;
			if(Number(c) % 1 == 0) c ="<input";
			window.location = "main.php?updateID="+idNum+"&currQ=" + c;
		}

		function myFunction() {
		  myFunction2();
		  var input, filter, table, tr, td, i;
		  input = document.getElementById("myInput");
		  filter = input.value.toUpperCase();
		  table = document.getElementById("myTable");
		  tr = table.getElementsByTagName("tr");
		  for (i = 0; i < tr.length; i++) {
		    td2 = tr[i].getElementsByTagName("td")[2];
		    td3 = tr[i].getElementsByTagName("td")[3];
		    td4 = tr[i].getElementsByTagName("td")[4];
		    if (td2 || td3 || td4) {
		      if (td2.innerHTML.toUpperCase().indexOf(filter) > -1 || td3.innerHTML.toUpperCase().indexOf(filter) > -1 || td4.innerHTML.toUpperCase().indexOf(filter) > -1) {
		        tr[i].style.display = "";
		      } else {
		        if(i != 1)	tr[i].style.display = "none";
		      }
		    }       
		  }
		}

		function myFunction2() {
		  var input, filter, table, tr, td, i;
		  input = document.getElementById("myInput");
		  filter = input.value.toUpperCase();
		  table = document.getElementById("myTable2");
		  tr = table.getElementsByTagName("tr");
		  for (i = 0; i < tr.length; i++) {
		    td2 = tr[i].getElementsByTagName("td")[2];
		    td3 = tr[i].getElementsByTagName("td")[3];
		    td4 = tr[i].getElementsByTagName("td")[4];
		    if (td2 || td3 || td4) {
		      if (td2.innerHTML.toUpperCase().indexOf(filter) > -1 || td3.innerHTML.toUpperCase().indexOf(filter) > -1 || td4.innerHTML.toUpperCase().indexOf(filter) > -1) {
		        tr[i].style.display = "";
		      } else {
		        if(i != 1)	tr[i].style.display = "none";
		      }
		    }       
		  }
		}
	</script>
	<title>Publications</title>
</head>
<body onload="blinktext()"> <center>

<h1>Authors and their Publications</h1>

<?php

	$host = "localhost";
	$user = "root";
	$pass = "";

	$dbName = "publications";

	$conn = @mysqli_connect($host, $user, $pass); // Connect to the server
	$create = "CREATE DATABASE IF NOT EXISTS " . $dbName;
	@mysqli_query($conn, $create); // Create database if it isn't exist

	$conn = @mysqli_connect($host, $user, $pass, $dbName); // Connect to the database

	if($conn) {
		$newYear = -1;
		if(isset($_GET["updateID"])) {
			$newYear = $_GET["updateID"];
		}

		$query1 = "CREATE TABLE IF NOT EXISTS publications.authors ( ";
		$query1 .= "name VARCHAR(120) NULL, ";
		$query1 .= "email VARCHAR(100) NULL, ";
		$query1 .= "country VARCHAR(30) NULL, ";
		$query1 .= "ID INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ";
		$query1 .= ")";

		$query2 = "CREATE TABLE IF NOT EXISTS publications.titles ( ";
		$query2 .= "name VARCHAR(120) NULL, ";
		$query2 .= "title VARCHAR(120) NULL, ";
		$query2 .= "year SMALLINT(6) NULL, ";
		$query2 .= "ID INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ";
		$query2 .= ")";

		if(@mysqli_query($conn, $query1) && @mysqli_query($conn, $query2)) { // Check if both tables were created
			
			$getAuth = "SELECT name, email, country, ID FROM authors";
			$queryAuth = @mysqli_query($conn, $getAuth);

			$getTit = "SELECT name, title, year, ID FROM titles";
			$queryTit = @mysqli_query($conn, $getTit);

			$index1 = 1; $index2 = 1;

			// Search box
			if(isset($_GET["currQ"])) {
				echo '<input type="text" onkeyup="myFunction()"  value="'.$_GET["currQ"].'" placeholder="Search for Name, Email, Country, Title or Year" style="width: 60%; height: 25px;" id="myInput"><br>';
			} else {
				echo '<input type="text" onkeyup="myFunction()" placeholder="Search for Name, Email, Country, Title or Year" style="width: 60%; height: 25px;" id="myInput"><br>';
			}

			// Searching functions
			echo '<div style=""><form style="display: inline-block; padding-right: 10px;" action="functions.php" method="post">
						Publications by book\'s title (full or partial)
						<input placeholder="Title" type="text" name="searchBook">
						<button id="yearUpdater">Search</button><br>
					</form>';
			echo '<form style="display: inline-block; padding-right: 10px;" action="functions.php" method="post"><br>
						Publications by year
						<input placeholder="Year" type="text" name="searchYear">
						<button id="yearUpdater">Search</button>
					</form>';
			echo '<form style="display: inline-block;" action="functions.php" method="post"><br>
						Publications by Country
						<input placeholder="Country" type="text" name="searchCountry">
						<button id="yearUpdater">Search</button>
					</form>';
			echo '</div>';


			// For the authors
			echo '<div style="display: inline-block;"><div id="auth" style="float: left;"><h4>Authors</h4>';

			$table1 = '<table id="myTable">
						<tr>
						<th>Function</th>
						<th>S No.</th>
						<th>Name</th>
						<th>Email</th>
						<th>Country</th>
						</tr>';

			// Add function
			$table1 .= '<tr><form method="post" action="add.php">
							<td><button id="add">Add</button></td>
							<td></td>
							<td><input type="text" name="authName"></td>
							<td><input type="text" name="authEmail"></td>
							<td><input type="text" name="authCountry"></td>
						</form></tr>';

			// Row display
			while($row = @mysqli_fetch_row($queryAuth)) {
				$name = $row[0];
				$email = $row[1];
				$country = $row[2];
				$id = $row[3];
				$table1 .= '<tr><form method="post" action="delete.php" name="auth">
								<td><button id="delete">Delete</button><input style="display: none;"'.
						' name="delIndexAuth" value="'.$id.'"></form></td>
								<td>'.$index1.')</td>
								<td>'.$name.'</td>
								<td>'.$email.'</td>
								<td>'.$country.'</td>
							</form></tr>';
				$index1++;
			}
			$table1 .= '</table></div>';
			echo $table1;

			echo '<div id="titles" style="float: right;"><h4>Books <font id="blinkme" color="red">(Click on the year to update)</font></h4>';

			// For the titles
			$table2 = '<table id="myTable2">
						<tr>
						<th>Function</th>
						<th>S No.</th>
						<th>Name</th>
						<th>Title</th>
						<th>Year</th>
						</tr>';
			// Add function
			$table2 .= '<tr><form method="post" action="add.php">
							<td><button id="add">Add</button></td>
							<td></td>
							<td><input type="text" name="titleName"></td>
							<td><input type="text" name="titleT"></td>
							<td><input type="text" name="titleYear"></td>
						</form></tr>';
			// Row display
			while($row = @mysqli_fetch_row($queryTit)) {
				$name = $row[0];
				$title = $row[1];
				$year = $row[2];
				$id = $row[3];
				if($id == $newYear) { // If id matches the one to update year
					$table2 .= '<tr><form method="post" action="delete.php" name="delete">
						<td><button id="delete">Delete</button><input style="display: none;"'.
						' name="delIndexTit" value="'.$id.'"></form></td>
						<td>'.$index2.')</td>
						<td>'.$name.'</td>
						<td>'.$title.'</td>
						<td>
							<form action="update.php" method="post">
								<input type="text" name="updateYear">
								<input type="text" name="ID" style="display: none;" value="'.$id.'">
								<button id="yearUpdater">Done</button>
							</form>
						</td>
					</tr>';
				} else { // Onlick send id as parameter for redirection
					$table2 .= '<tr><form method="post" action="delete.php" name="delete">
						<td><button id="delete">Delete</button><input style="display: none;"'.
						' name="delIndexTit" value="'.$id.'"></td>
						<td>'.$index2.')</td>
						<td>'.$name.'</td>
						<td>'.$title.'</td>
						<td id="pointH" onclick="hrefYear('.$id.')">'.$year.'</td>
					</form></tr>';
				}
				
				$index2++;
			}
			$table2 .= '</table></div></div>';
			echo $table2;

			echo "<script>myFunction();</script>";

			@mysqli_free_result($queryAuth); // Clearing unnecessary data stored
			@mysqli_free_result($queryTit);

			
		} else {
			echo "There was some problem in connecting to the database";
		}
	} else {
		echo "There was some problem in communicating with the server";
	}

?>

</center> </body>
</html>