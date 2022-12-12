<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
 <?php
$myfile = fopen("tmpout.txt", "w");
if ($myfile==FALSE) print ("Unable to open file for write!");
else {
	$val = $_POST["userval"];
	fwrite($myfile,$val);
	fclose($myfile);
}
?> 
 </body>
</html>
