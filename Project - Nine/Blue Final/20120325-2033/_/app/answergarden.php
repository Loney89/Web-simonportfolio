<?php
/**
* Deals with Answer Garden
*
*	- Arrive at Answer Garden.
*
*	@author - S Nicholls + R Donohoe
*	@modified - 01/03/2012
*
*/
class AnswerGarden extends Application
{
	private $helptext = "Select the required answer from the drop down lists to retrieve the information you require";
	public function __construct(){
		
	}
	
	public function answergarden()
    {
        $this->render('answergarden', compact('email'));
    }
}