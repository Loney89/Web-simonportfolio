<?php
/**
*	Get User Information
*
*
*/
class User extends Application{

	public function __construct(){
	}

	public function isStudent(){
		if($this->usertype == 'student'){
			return true;
		}
		return false;
	}
	
	public function isTutor(){
		if($this->usertype == 'tutor'){
			return true;
		}
		return false;
	}

}
