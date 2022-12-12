<?php
function customError($errno,$errstr){
echo"Error:[$errno] $errstr";
die();
}
set_error_handler("customError",E_USER_ERROR);
$n=count($argv);
$file=fopen("out.txt","w");
if($file==FALSE){
  trigger_error("output file does not exist.",E_USER_ERROR);
}
for($i=1;$i<$n;$i++){
if(!strpos($argv[$i],".txt",0)){
  trigger_error("Extention must be .txt",E_USER_ERROR);
}
}
for($i=1;$i<$n;$i++)
{
$myfile=fopen($argv[$i],"r");
if($myfile==FALSE){
  trigger_error("Given file does not exist.",E_USER_ERROR);
}
else{
$lines=file($argv[$i]);
fwrite($file,$lines[$i-1]);
}
}
fwrite($file,"1800100011");
?>
