<?php
$x = $argv[0];
$arr = array();
if (isset($argc)) {
for ($i = 1; $i <$argc; $i++)
{
if(is_numeric ($argv[$i]))
{
$arr[$i-1] = $argv[$i];}
else{
echo "Input value is not integer. Please try again!";
die;}
}
}
else {
echo "Input values not in expected format";
}

echo "Kth smallest is ", kth_smallest($x,$arr);

function kth_smallest($x,$arr)
{
sort($arr);
return $arr[$x-1];
}

?>

