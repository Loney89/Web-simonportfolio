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
	
	public function __construct(){
		
	}
	
	public function answergarden()
    {
        $this->render('answergarden', compact('email'));
    }
}