<?php
/**
 *	Provides Core Functionality to the Application
 *
 *	- Creates MySQL Connection
 *	- Renders Views & HTML Pages/Forms
 *
 *	@author - S Nicholls
 *	@modified - 28/02/2012
 *	@access - class
 */
class View
{

    private $path = '';

    public function __construct()
    {
        if (isset($_SESSION['view_path']))
        {
            $this -> path = $_SESSION['view_path'];
        }
    }

    private function getPath()
    {

        if ($this -> path == '')
        {
            $this -> path = __SITE_PATH . '/views/';
        }

        return $this -> path;
    }

    public function switchUser($user)
    {
        if ($user == 'student')
        {
            $view_path = __SITE_PATH . '/views/student/';
        }
        else
        {
            $view_path = __SITE_PATH . '/views/tutor/';
        }

        $_SESSION['view_path'] = $view_path;

        $this -> path = $view_path;
    }

    /**
     * Render Method -- render's files from the view directory.
     *
     * @access protected
     * @param $file_name string
     * @param $environment array
     * @return null
     */
    public function render($file_name, $environment = null)
    {
        if ($environment)
        {
            extract($environment);
        }

        $view_path = $this -> getPath();

        if (file_exists($view_path . $file_name . '.php') !== TRUE)
        {
            throw new Exception(__METHOD__ . " Missing View File " . $view_path . $file_name . '.php');
        }

        require ($view_path . $file_name . '.php');
    }

}
