<?php

function customError($errno, $errstr) {
  echo "Error: [$errno] $errstr";
  
  die();
}

set_error_handler("customError",E_USER_ERROR);

$input = array();

for ($i=1;$i<$argc;$i++) {
    $input[$i]=$argv[$i];
}


if($argc>1){
$input = array_map('strtolower', $input);

sort($input);

$a=0;
foreach($input as $value){
	if((is_numeric($value))){
	$a=1;
	}
}

if($a==1)
	trigger_error("Pleass type words only"."\n",E_USER_ERROR);
else
	print_r(array_count_values($input));
}
else
	trigger_error("After the input of file name enter atleast some words "."\n",E_USER_ERROR);

?>
