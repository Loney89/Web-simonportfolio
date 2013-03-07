<?php
/*************************
 *
 *	index.php
 *
 * 	This is the first page and where everything loads!
 *
 *
 *
 **************************/

//Display all of PHP's moaning and error messages...
error_reporting(E_ALL);
ini_set('display_errors', 'on');

session_start();

//Start point to include all the library files
$site_path = realpath(dirname(__FILE__));
define('__SITE_PATH', $site_path);

require (__SITE_PATH . '/app/site.php');

//Get the "action" from the URL (eg ?action=landing)
if (isset($_GET['action']))
{
    $action = $_GET['action'];
}
else
{
    $action = 'default';
}




$User = new User();

/**
 * This decides what page needs to be loaded!
 */
switch ($action)
{
    /**
     * Display Login Form and Process Login Request
     */
    case 'login' :
        $User -> checkLogin($_POST['email'], $_POST['password']);

        if ($User -> isAuthenticated())
        {
            header('location: index.php?action=user');
        }
        else
        {
            $User -> loginForm();
        }

        break;

    case 'users' :
        if (!$User -> isAuthenticated())
        {
            header('location: index.php?action=landing');
        }
        else
        {
           header('location: index.php?action=forbidden');
        }
        break;
        
    case 'landing' :
        if ($User -> isAuthenticated())
        {
            $User -> landing();
        }
        else
        {
           header('location: index.php?action=forbidden');
        }
        break;
    /**
     * Logs the Current User Out!
     */
    case 'logout' :
		if ($User -> isAuthenticated())
		{
		   $User -> logout();
        header('location: index.php?=logout');
     }
     else 
     {
     	header('location: index.php?=action=forbidden');
     	     	}
       break;

    case 'forbidden' :
        $App = new Application();
        $App -> forbidden();
        break;

    /**
     * Display Details Form and Add Details to User
     */
    case 'updatedetails' :
        if ($User -> isAuthenticated())
        {
            $student_id = $_POST['student_id'];
            $first_name = $_POST['first_name'];

            $Details = new Details();
            $Details -> updatedetails($student_id, $first_name);
            header('location: index.php?action=details');
        }

        break;

    /**
     * Display Details Form and Add Details to User
     */
    case 'details' :
        if ($User -> isAuthenticated())
        {
            $Details = new Details();
            $Details -> details();
        }

        break;

    case 'answergarden' :
	if ($User -> isAuthenticated())
	{
		//$User -> answergarden();
		header('location: ../views/student/answergarden.html');
	}
	else
	{
		header('location: index.php?action=forbidden');
	}

	break;

    /**
     * Display Appointments & Create New Ones
     */
    case 'appointments' :
        $Appointment = new Appointments();
        if ($User -> isStudent())
        {
            if(isset($_POST['go'])){
                $Appointment->bookAppointment();
            }else{
                $Appointment -> bookingForm();
            }
        }

        if ($User -> isTutor())
        {
            $Appointment -> calendarView();
        }

        break;

    /**
     * Default Action Display Welcome/Login Form
     */
    default :
        if ($User -> isAuthenticated())
        {
            $User -> landing();
        }
        else
        {
            $User -> loginForm();
        }
}

/**
 * Render Footer
 */
require (__SITE_PATH . '/views/footer.php');

/**
 * Render Header
 *
*/
require (__SITE_PATH . '/views/header.php');
?>
