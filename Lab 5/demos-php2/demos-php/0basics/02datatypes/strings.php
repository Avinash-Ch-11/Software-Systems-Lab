<?php 
$x = "Hello";
$y = 'Hello world!';

echo $x;
echo "<br>"; 
echo $y;
echo "<br>";
echo "len of string y:" . strlen ($y);
echo "<br>";
echo "words in string y:" . str_word_count ($y) . "<br>";
echo "reversing string y:" . strrev($y) . "<br>";
echo "locating substring lo in y:" . strpos($y, 'lo') . "<br>";
echo "replace substring He by Me in y:" . str_replace ('He','Me',$y ) . "<br>";
echo "3rd char in y:" . $y[2] . "<br>";
echo "0th char in y:" . $y[0] . "<br>";
?>
