<?php
function secure($string){
	$string = trim(strip_tags(addslashes($string)));
	return $string;
}

function safe($string){
	htmlentities($string, ENT_QUOTES, 'utf-8' );
	return $string;
}
?>