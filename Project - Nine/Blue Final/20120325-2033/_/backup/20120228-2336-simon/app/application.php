<?php
/**
* Provides Functionality for Login and Authentication
* 
* @author - S Nicholls
* @modified - 28/02/2012
*
*/
class Application extends Base {

    protected $userid;
    protected $email;
    protected $usertype;
    protected $authenticated;

    public function Application()
    {       
		//Create MySQL Database Connection 
		//using Protected Method from Base class
		$this->getDatabase();
	
        if (!isset($_SESSION['authenticated'])) {
            $_SESSION['authenticated'] = false;
        }

        $this->authenticated = $_SESSION['authenticated'];

        if (isset($_SESSION['email'])) {
            $this->email = $_SESSION['email'];
        } else {
            $this->email = '';
        }

        if (isset($_SESSION['usertype'])) {
            $this->usertype = $_SESSION['usertype'];
        } else {
            $this->usertype = '';
        }
    }

    public function loginForm()
    {
        $this->render('login', compact('email'));
    }

    public function landing()
    {
        $this->render('landing', array('usertype'=>$this->usertype));
    }

    public function authenticated()
    {
        return $_SESSION['authenticated'];
    }

    public function logout()
    {
        $_SESSION['authenticated'] = false;
		
		foreach($_SESSION as $k=>$v){
			$_SESSION[$k] = NULL;
			unset($_SESSION[$k]);
		}
		
		session_destroy();
    }

    public function checkLogin($email, $password)
    {
        // reset old values
        // 
        $_SESSION['userid'] = '';
        $_SESSION['email'] = '';
        $_SESSION['usertype'] = '';
        $_SESSION['authenticated'] = false;

        $email = strtolower(trim($email));
        $email = $this->db->quote($email, $this->db->getLink());
        $password = $this->db->quote($password, $this->db->getLink());

        $sql = "SELECT user_id, user_name, user_password, user_is_a_student ";
		$sql.= "FROM tas_users ";
		$sql.= "WHERE LOWER(user_name) = '" .  $email . "' ";
		$sql.= "AND user_password = '" . md5($password) . "' ";
		$sql.= "AND (user_is_disabled=0 OR user_is_disabled IS NULL)";

        $result = $this->db->query($sql);

        if ($result && ($row = $this->db->getRows($result))) 
		{
            $_SESSION['userid'] = $row['user_id'];
            $_SESSION['email'] = $row['user_name'];

			
			//Is this user a Student or a Tutor...?
            if (
				$row['user_is_a_student'] == 1 
				|| 
				$row['user_is_a_student'] == true
			){
                $_SESSION['usertype'] = 'student';
            } else {
                $_SESSION['usertype'] = 'tutor';
            }
			
			//This user successfully logged!
            $_SESSION['authenticated'] = true;
        }

        $this->userid = $_SESSION['userid'];
        $this->email = $_SESSION['email'];
        $this->usertype = $_SESSION['usertype'];
    }
}
