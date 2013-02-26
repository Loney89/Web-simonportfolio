<pre>

<?php


if($_GET['name'] == "simon")
{
	echo "Ohh Hi Simon";
}else{
	echo "Go away your not simon!";
}




$firstname = "David";
$surname = "Pascoe";

$name = $firstname." ".$surname;

//$name = str_replace('ll',' ', $name);
//$name = substr($name,-5,3);

$position = strpos($name, 'l');

$money = 10;
$cost = 10;

if($money == $cost)
{
	$sum = "I have money";
}else
{
	$sum = "I don't have money";
}

$find_name = substr($name,-6);

if("Nicholls" == substr($name,-6))
{
	$is_nicholls = "is nicholls";
}elseif("Pascoe" == $find_name)
{
	$is_nicholls = "I'm pascoe silly!";
}
else
{
	$is_nicholls = "I'm not nicholls";
}

//$sum = $cost*$money;

echo "<br><br> $name $sum and $is_nicholls";

?>