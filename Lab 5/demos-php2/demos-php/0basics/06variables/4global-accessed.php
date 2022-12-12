<?php
$x = 5; // global scope, can be accessed only in global scope

function myTest() {
	    // using x as a global scope variable
		global $x;
	    echo "<p>Variable x inside function is: $x</p>";
        $x=10;
} 
myTest();

echo "<p>Variable x outside function is: $x</p>";
?>
