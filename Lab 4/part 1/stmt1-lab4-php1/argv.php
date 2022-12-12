#!/usr/bin/php
<?php
// loop through each element in the $argv array
foreach($argv as $value)
{
  echo "$value\n";
}
 

// accessing 0th and 1st values in argv array.
 
echo $argv[0];
echo $argv[1]; 

// you can run this file from terminal as shown in the example here: "php argv.php  21 34 45 654" 
?>

