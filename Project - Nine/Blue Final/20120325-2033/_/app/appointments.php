<?php

class Appointments extends Application
{    
	private $errors = '';    
	private $helptext = "Choose your Tutor to see when they are available. Select a time slot, then submit. You will receive confirmation by email";        
public function __construct()    
	{        
	parent::__construct();
        return null;    
	}    
public function bookingForm()
    {        
 	$User = new User();       
 	$tutors = $User -> getTutors();        
	$name = $User -> getUser();        
	$errors = $this -> errors;       
	$data = array('error_msg' => $errors, 'tutors' => $tutors, 'user' => $name, 'name' => $name['name'], 'usertype' => $name['usertype'], 'helptext' => $this -> helptext);        
	$this -> view -> render('book', $data);    
	}    
	private function validateBookingForm()    
	{        
		$error_msg = false;                
	if (empty($_POST['tutor']))        
	{            
	$error_msg = 'Missing Tutor';        	
	}                
	if (empty($_POST['student']))        
	{            
	$error_msg = 'Missing Student';        
	}        
	return $error_msg;    
	}    
	public function bookAppointment()   
	 {                
	$errors = '';                
	if (array_key_exists('go', $_POST))        
	{            
		$errors = $this -> validateBookingForm();        
	}        
	if (!$errors)        
	{            
		$tutor = $_POST['tutor'];            
		$student = $_POST['student'];            
		$date = $_POST['year'] . '-' . $_POST['month'] . '-' . $_POST['day'];            
		$date .= " " . $_POST['hour'] . ':' . $_POST['minute'] . ':00';            
		$description = $_POST['description'];            
		$found = $this -> checkAppointment($date, $tutor);            
		if (!$found)            
	{                
		$booked = $this -> makeAppointment($tutor, $student, $date, $description);                
	if ($booked)                
	{                    
	$this -> errors = "Sucessfully Booked";                    
	$this -> bookingForm();                
	}            
}            
else            
{                
		$this -> errors = "This slot is already taken.";                
		$this -> bookingForm();            
	}        
}        
else        
{            	$this -> errors = $errors;            
		$this -> bookingForm();        
	}    
}    
	private function checkAppointment($date, $tutor)    
{        
$sql = "SELECT appointment_id ";        
$sql .= "FROM appointment ";        
$sql .= "WHERE ap_timeslot='" . $date . "' AND staff_id='" . $tutor . "'";        
$result = $this -> db -> query($sql);        
if ($result)        
{            
$rows = $this -> db -> getRows($result);            
if (count($rows) == 0)            
{                
return false;            
}            
else            
{                
return true;            
}        
}        
return false;    
}    
private function showAppointments($tutor = '', $student = '', $date = '')    
{        
$where = 0;        
$sql = "SELECT appointment_id ";        
$sql .= "FROM appointment WHERE ";        
if ($date != '')        
{           
$sql .= "ap_timeslot='" . $date . "' ";            
$where++;        
}        
if ($where == 1)        
{            
$sql .= " AND ";        
}        
if ($tutor != '')        
{           
 $sql .= "staff_id='" . $tutor . "' ";            
$where++;        
}        
if ($where == 2)        
{            
$sql .= " AND ";

        }        
if ($student != '')        
{            
$sql .= "student_id='" . $student . "' ";            
$where++;        
}        
$result = $this -> db -> query($sql);        
if ($result)        
{            
return $this -> db -> getRows($result);        
}
else
{            
die($sql);        
}    
}    

private function makeAppointment($tutor, $student, $date, $description)    
{        
	$description = $this -> db -> quote($description);        
	$sql = "INSERT INTO appointment ";        
	$sql .= "(student_id,staff_id,ap_timeslot,ap_status,ap_duration,ap_student_comments) ";       
	$sql .= "VALUES('" . $student . "','" . $tutor . "','" . $date . "','Pending','15','" . $description . "')";        
	$result = $this -> db -> query($sql);        
	if ($result)        
	{            
	return true;        
	}        
	return false;    
	}    
	public function calendarView()    
	{        
	$this -> view -> render('appointments');    
	}
}
