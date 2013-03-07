<?php
/*****
* Header's
*
*
*
****/

class Link extends User{
	
	$newlink = create_function ($this->usertype == 'student') {
		include 'views/headerST.php'
		
		}
		
	$newlink = create_function function($this->usertype == 'tutor') {
		include 'views/headerTU.php'
		
		}
		
	}
				
?>