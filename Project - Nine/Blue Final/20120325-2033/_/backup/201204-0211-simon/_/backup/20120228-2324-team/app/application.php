<?php

include __SITE_PATH . '/lib/' . 'base.php';
include __SITE_PATH . '/lib/' . 'db.php';

class Application extends Base {
    private $db;
    private $userid;
    private $email;
    private $usertype;
    private $authenticated;

    public function Application()
    {
        $this->db = DB::getInstance();
        $this->db->connect();

        // create a new session or resume previous session if one exists
        session_start();

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
        $this->render('landing', compact('email'));
    }

    public function appointments()
    {
        $this->render('appointments', compact('email'));
    }

    public function details()
    {
        $this->render('details', compact('email'));
    }

    public function authenticated()
    {
        return $_SESSION['authenticated'];
    }

    public function logout()
    {
        $_SESSION['authenticated'] = false;
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
        $email = mysql_real_escape_string($email, $this->db->getLink());
        $password = mysql_real_escape_string($password, $this->db->getLink());

        $sql = "SELECT user_id, user_name, user_password, user_is_a_student FROM tas_users WHERE LOWER(user_name) = '" .  $email . "' AND user_password = '" . md5($password) . "'";

        $result = $this->db->query($sql);

        if ($result && ($row = mysql_fetch_array($result))) {
            $_SESSION['userid'] = $row['user_id'];
            $_SESSION['email'] = $row['user_name'];

            if ($row['is_a_student'] == true) {
                $_SESSION['usertype'] = 'student';
            } else {
                $_SESSION['usertype'] = 'staff';
            }

            $_SESSION['authenticated'] = true;
        }

        $this->userid = $_SESSION['userid'];
        $this->email = $_SESSION['email'];
        $this->usertype = $_SESSION['usertype'];
    }
}
