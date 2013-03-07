<?php
/**
*	Provides Functionality to Update Details of a User
*
*
*/
class Details extends Application{

	/**
	* Constructor
	*/
	public function __construct(){
		
	}	
	
	//Copied from Application.php
    public function details()
    {
        $this->render('details', compact('email'));
    }
}