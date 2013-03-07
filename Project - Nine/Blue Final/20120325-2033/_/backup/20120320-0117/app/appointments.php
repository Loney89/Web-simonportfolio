<?php/*** Deals with Appointments**	- Retrieve Appointments*	- Create Appointments*	- Check Availability of Staff**	@author - S Nicholls*	@modified - 28/02/2012**/class Appointments extends Application{		public function __construct(){			}		public function appointments()    {        

require_once('index.php');

$appointment = new appointments();

$bookings = $appointment->showAppointments();

if(count($bookings) == 0){
	echo "There are no appointments";
}



	foreach($bookings as $b){
		echo "
			<tr>
				<td>".$b['app_datetime']."</td>
				<td>".$b['app_student']."</td>
				<td>".$b['app_tutor']."</td>
				<td>".$b['app_description']."</td>
			</tr>";
	}

    }}