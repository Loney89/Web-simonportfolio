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
		$sql.= "FROM user ";
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
    
	public function details()
	{
		$student_id = 'id';
		$stu_title = 'title';
		$stu_firstname = 'firstname';
		$stu_surname = 'surname';
		$stu_email = 'email';
		$stu_gender = 'gender';
		$stu_dob = 'yyyy-mm-dd';
		$stu_maritalstatus = 'marital status';
		$stu_address1 = 'address first line';
		$stu_address2 = 'address second line';
		$stu_address3 = 'address third line';
		$stu_city = 'town';
		$stu_postcode = 'postcode';
		$stu_home_phone = 'phone';

		$sql = "SELECT student_id, award_id, award_type_id,
				stu_title, stu_firstname, stu_surname, stu_gender,
				stu_dob, stu_address1, stu_address2, stu_address3,
				stu_city, stu_postcode, stu_home_phone, stu_mobile_phone,
				stu_term_status, stu_registration_status, stu_start_date,
				stu_end_date, stu_sponsor, stu_previous_qualifications,
				stu_previous_experiences, stu_comments
				FROM student WHERE student.email = '" . $this->email . "'";

        $result = $this->db->query($sql);

        if ($result && ($row = $this->db->getRows($result))) {
			$student_id = $row['student_id'];
			$stu_title = $row['stu_title'];
		} 

		$this->render('details', compact('student_id', 'stu_title', 'stu_firstname', 'stu_surname', 'stu_email', 'stu_gender', 'stu_dob', 'stu_maritalstatus', 'stu_address1', 'stu_address2', 'stu_address3', 'stu_city', 'stu_postcode'));
	}
    	
	public function students()
    {
		header("index.php?action=students");
	}
}
