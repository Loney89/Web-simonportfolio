<?php
/**
 *	Provides Functionality to Update Details of a User
 *
 *
 */
class Details extends Application
{

    private $helptext = "This is the information held on your student. To edit or update click the edit button at the bottom of the page. ";//************** PUT HELP TEXT HERE FOR THE QUESTION MARK

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        return null;
    }

    public function details()
    {
        $student_id = 'id';
        $stu_title = 'title';
        $stu_firstname = 'First N.';
        $stu_surname = 'Surname';
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
				FROM student, `user` WHERE `user`.user_id = student.user_id AND user.user_name = '" . $this -> email . "'";

        $result = $this -> db -> query($sql);

        if ($result && ($row = $this -> db -> getRows($result)))
        {
            $student_id = $row['student_id'];
            $stu_title = $row['stu_title'];
            $stu_firstname = $row['stu_firstname'];
            $stu_surname = $row['stu_surname'];
        }

        $User = new User();
        $user = $User -> getUser();
        
        $data = array(
            'helptext' => $this -> helptext,
            'name'=>$user['name'],
            'usertype'=>$user['usertype']
            );
        $data = array_merge($data, compact('student_id', 'stu_firstname', 'stu_surname'));
        $this -> view -> render('details', $data);
        /*
         $this->render('details', compact('student_id', 'stu_title', 'stu_firstname', 'stu_surname', 'stu_email', 'stu_gender', 'stu_dob', 'stu_maritalstatus', 'stu_address1', 'stu_address2', 'stu_address3', 'stu_city', 'stu_postcode'));
         */
    }

    public function updatedetails($student_id, $first_name)
    {
        $sql = "UPDATE student SET stu_firstname = '" . $first_name . "' WHERE student_id = '" . $student_id . "'";
        $result = $this -> db -> query($sql);
    }

}
