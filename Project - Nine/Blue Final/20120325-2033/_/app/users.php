<?php
/**
 *	Get User Information
 *
 *
 */
class User extends Application
{

    public function __construct()
    {
        parent::__construct();
        return null;
    }

    public function logout()
    {
        $_SESSION['authenticated'] = false;

        foreach ($_SESSION as $k => $v)
        {
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
        $email = $this -> db -> quote($email, $this -> db -> getLink());
        $password = $this -> db -> quote($password, $this -> db -> getLink());

        $sql = "SELECT user_id, user_name, user_password, user_is_a_student ";
        $sql .= "FROM user ";
        $sql .= "WHERE LOWER(user_name) = '" . $email . "' ";
        $sql .= "AND user_password = '" . md5($password) . "' ";
        $sql .= "AND (user_is_disabled=0 OR user_is_disabled IS NULL)";

        $result = $this -> db -> query($sql);

        if ($result && ($row = $this -> db -> getRows($result)))
        {
            $_SESSION['userid'] = $row['user_id'];
            $_SESSION['email'] = $row['user_name'];

            $this -> userid = $_SESSION['userid'];
            $this -> email = $_SESSION['email'];

            //Is this user a Student or a Tutor...?
            if ($row['user_is_a_student'] == 1 || $row['user_is_a_student'] == true)
            {
                $_SESSION['usertype'] = 'student';

                $sql = "SELECT CONCAT_WS(' ',stu_title, stu_firstname, stu_surname) AS name, ";
                $sql .= "student_id AS roleid ";
                $sql .= "FROM student WHERE user_id='" . $this -> userid . "'";
            }
            else
            {
                $_SESSION['usertype'] = 'tutor';

                $sql = "SELECT CONCAT_WS(' ',sta_title, sta_firstname, sta_surname) AS name, ";
                $sql .= "staff_id AS roleid ";
                $sql .= "FROM staff WHERE user_id='" . $this -> userid . "'";
            }

            $this -> usertype = $_SESSION['usertype'];

            $result = $this -> db -> query($sql);
            if ($result && ($row = $this -> db -> getRows($result)))
            {
                $_SESSION['name'] = $row['name'];
                $_SESSION['roleid'] = $row['roleid'];

            }
            else
            {
                $_SESSION['name'] = $this -> email;
            }

            $this -> name = $_SESSION['name'];
            $this->roleid = $_SESSION['roleid'];

            //This user successfully logged!
            $_SESSION['authenticated'] = true;
        }

        $this -> authenticated = $_SESSION['authenticated'];

        return $this -> authenticated;

    }

    public function loginForm()
    {
        $this -> view -> render('login');
    }

    public function landing()
    {
        $user = array('usertype' => $this -> usertype, 'email' => $this -> email, 'name' => $this -> name, 'helptext' => "Welcome to Nine's main page. 
					Lookup or Book appointments. 
					Read annoucements. Search through the Answer Garden");

        if ($this -> usertype == 'student')
        {
            $this -> view -> switchUser('student');
            $this -> view -> render('landing', $user);
        }

        if ($this -> usertype == 'tutor')
        {
            $this -> view -> switchUser('tutor');
            $this -> view -> render('landing', $user);
        }
    }

    public function getUser()
    {
        return array(
            'user_id' => $this -> userid, 
            'name' => $this -> name, 
            'email' => $this -> email,
            'role_id'=>$this->roleid,
            'usertype'=>$this->usertype);
    }

    public function isAuthenticated()
    {
        return $this -> authenticated;
    }

    public function isStudent()
    {
        if ($this -> usertype == 'student')
        {
            return true;
        }
        return false;
    }

    public function isTutor()
    {
        if ($this -> usertype == 'tutor')
        {
            return true;
        }
        return false;
    }

    public function getTutors()
    {
        $sql = "SELECT staff_id,user_id, CONCAT_WS(' ',sta_title,sta_firstname,sta_surname) AS name ";
        $sql .= "FROM staff";

        $result = $this -> db -> query($sql);

        if ($result)
        {
            return $this -> db -> getRows($result);
        }

        return array();
    }

}
