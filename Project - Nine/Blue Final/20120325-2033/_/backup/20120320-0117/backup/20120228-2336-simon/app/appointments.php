<?php/*** Deals with Appointments**	- Retrieve Appointments*	- Create Appointments*	- Check Availability of Staff**	@author - S Nicholls*	@modified - 28/02/2012**/class Appointments extends Application{		public function __construct(){			}		public function appointments()    {        $this->render('appointments', compact('email'));    }}