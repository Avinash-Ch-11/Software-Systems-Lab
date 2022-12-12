<?php
$target_file1 = $target_dir . basename($_FILES["fileToUpload1"]["name"]);
$target_file2 = $target_dir . basename($_FILES["fileToUpload2"]["name"]);
$target_file3 = $target_dir . basename($_FILES["fileToUpload3"]["name"]);
$target_file4 = $target_dir . basename($_FILES["fileToUpload4"]["name"]);
$target_file5 = $target_dir . basename($_FILES["fileToUpload5"]["name"]);
$target_file6 = $target_dir . basename($_FILES["fileToUpload6"]["name"]);
$arrlength = count($argv);
function customError($errno, $errstr) {
  echo "Error: [$errno] $errstr \n";
  //echo "Ending Script";
  die();
}
set_error_handler("customError",E_USER_ERROR);
$c=0;
if (filesize($target_file1)<2000)
$c++;
if (filesize($target_file2)<2000)
$c++;
if (filesize($target_file3)<2000)
$c++;
if (filesize($target_file4)<2000)
$c++;
if (filesize($target_file5)<2000)
$c++;
if (filesize($target_file6)<2000)
$c++;
echo $c;
if($c==6){
$c=0;
if(strcmp(pathinfo($target_file1, PATHINFO_EXTENSION),"txt")==0);
$c++;
if(strcmp(pathinfo($target_file1, PATHINFO_EXTENSION),"txt")==0);
$c++;
if(strcmp(pathinfo($target_file1, PATHINFO_EXTENSION),"txt")==0);
$c++;
if(strcmp(pathinfo($target_file1, PATHINFO_EXTENSION),"txt")==0);
$c++;
if(strcmp(pathinfo($target_file1, PATHINFO_EXTENSION),"txt")==0);
$c++;
if(strcmp(pathinfo($target_file1, PATHINFO_EXTENSION),"txt")==0);
$c++;
echo $c;
if($c==6){
$myfile1 = fopen($target_file1, "r");
$myfile2 = fopen($target_file2, "r");
$myfile3 = fopen($target_file3, "r");
$myfile4 = fopen($target_file4, "r");
$myfile5 = fopen($target_file5, "r");
$myfile6 = fopen($target_file6, "r");
$myfile = fopen($target_file, "r");
$ch=fgetc($myfile);
$str="";
$a=array();
$i=0;

while(!feof($myfile1)){
if($ch!='\n'){
$str=$str.$ch;
}
else{
$a[$i]=$str;
$i=$i+1;
$str="";
}
$ch=fgetc($myfile1);
}

}
}
else{
	trigger_error("Input file should be taken with extension .txt",E_USER_ERROR);
}
}
else{
	trigger_error("file size must be less than 2kb",E_USER_ERROR);
}*/
?>
