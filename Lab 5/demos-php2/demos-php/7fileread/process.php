<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
 <?php
$myfile = fopen("tmp.txt", "r");
if ($myfile==FALSE) print ("Unable to open file!");
else print fread($myfile,8);
fclose($myfile);
?> 
<h2> Above first 8 characters from the file were read by this php </h5>
 </body>
</html>
