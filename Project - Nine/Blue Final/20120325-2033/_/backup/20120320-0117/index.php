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

session_start();

//Start point to include all the library files
$site_path = realpath(dirname(__FILE__));
define ('__SITE_PATH', $site_path);
require(__SITE_PATH.'/app/site.php');

//Create a new application (eg TAS!)
$app = new Application();

//Get the "action" from the URL (eg ?action=landing)
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'default';
}

//Execute function below...
dispatch($action, $app);

// TODO: move the dispatcher out of index.php -- Shiyaz
function dispatch($action, $app)
{
	/**
	* Render CSS
	*/
	require(__SITE_PATH . '/app/css.php');

	/**
	* Default to Login Page
	*/
    if ($action != 'login') {
        if (!$app->authenticated()) {
            $app->loginForm();
            return;
        }
    }

	/**
	* This decides what page needs to be loaded!
	*/
    switch ($action) 
	{
		/**
		* Display Login Form and Process Login Request
		*/
        case 'login':
            // TODO: sanitise input before passing to $app
            // to keep the application logic simpler - Shiyaz
            $app->checkLogin($_POST['email'], $_POST['password']);

            if ($app->authenticated())
            {
                header('location: index.php?action=redirect');
            } else {
                $app->loginForm();
            }

            break;			
		/**
		* Logs the Current User Out!
		*/			
        case 'logout':
		
            $app->logout();
            $app->loginForm();
			
            break;
            
	/**
	* Students
	*/			
        case 'students':
        
		$students= students(); 
		$students->students(); 
            
            	break;
		/**
		* Welcome Screen On Successful Login
		*/
		case 'landing':
			if ($app->authenticated()) {
					$app->landing();
			}

			break;
				
		/**
		* Display Details Form and Add Details to User
		*/
		case 'updatedetails':
			if ($app->authenticated()) {
				$student_id = $_POST['student_id'];
				$first_name = $_POST['first_name'];
				// clean it up first
				$app->updatedetails($student_id, $first_name);
                header('location: index.php?action=landing');
			}
			
            break;
			
		/**
		* Display Details Form and Add Details to User
		*/
		case 'details':
			if ($app->authenticated()) {
				$app->details();
			}
			
            break;
			
		/**
		* Display Details Form and Add Details to User
		*/
		case 'details':
			if ($app->authenticated()) {
				$app->details();
			}
			
            break;
			
		/**
		* Display Details Form and Add Details to User
		*/
		case 'details':
			if ($app->authenticated()) {
				$app->details();
			}
			
            break;
			
		/**
		* Display Details Form and Add Details to User
		*/
		case 'details':
			if ($app->authenticated()) {
				$app->details();
			}
			
            break;
			
		/**
		* Display Details Form and Add Details to User
		*/
		case 'details':
			if ($app->authenticated()) {
				$app->details();
			}
			
            break;
			
		/**
		* Display Details Form and Add Details to User
		*/
		case 'details':
			if ($app->authenticated()) {
				$app->details();
			}
			
            break;
			
		/**
		* Display Details Form and Add Details to User
		*/
		case 'details':
			if ($app->authenticated()) {
				$app->details();
			}
			
            break;
			
		/**
		* Display Details Form and Add Details to User
		*/
		case 'details':
			if ($app->authenticated()) {
				$app->details();
			}
			
            break;
			
		/**
		* Display Details Form and Add Details to User
		*/
		case 'details':
			if ($app->authenticated()) {
				$app->details();
			}
			
            break;
			
		/**
		* Display Details Form and Add Details to User
		*/
		case 'details':
			if ($app->authenticated()) {
				$app->details();
			}
			
            break;
			
		/**
		* Display Appointments & Create New Ones
		*/
        case 'appointments':
			$appointments = new Appointments();
            $appointments->appointments();
			
            break;		
		
		/**
		* Default Action Display Welcome/Login Form
		*/
        default:
            if ($app->authenticated()) {
                $app->landing();
            } else {
                $app->loginForm();
            }
    }
	
	/**
	* Render Footer
	*/
	require(__SITE_PATH . '/views/footer.php');
}

?>
