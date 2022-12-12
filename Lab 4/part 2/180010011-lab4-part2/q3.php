<?php

function customError($errno, $errstr) {
  echo "Error: [$errno] $errstr";
  echo "End of Script...\n";
  die();
}

//----------------------------------------------------

set_error_handler("customError",E_USER_ERROR);

//----------------------------------------------------

$a=$argv[1];
$b=$argv[2];

if($argc==3){
if(strlen($a)>=strlen($b)){
echo substr_count($a,$b);
echo "\n";

$lp = 0;
$pos = array();

while (($lp = strpos($a, $b, $lp))!== false) {
    $pos[] = $lp;
    $lp = $lp + strlen($b);
}

foreach ($pos as $value) {
    echo $value ."\n";
}
}
else
  trigger_error("Stringlenth of y should be less than equal to that of a"."\n",E_USER_ERROR);	
}
else
  trigger_error("Arguments given after file name must be only 2."."\n",E_USER_ERROR);	
?>
