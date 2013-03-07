<?php
/**
 * Provides Functionality for Login and Authentication
 * 
 */
class Application
{

	protected $userid;
	protected $email;
	protected $usertype;
   protected $name;
	protected $authenticated;
	protected $db;

	/**
	 * Create Instance of MySQL Database from DB Class
	 *
	 * @access protected
	 * @return instance of DB Class
	 */
	protected function getDatabase()
	{
		$this -> db = DB::getInstance();
		$this -> db -> connect();

		return $this -> db;
	}

	protected function getSession()
	{
		foreach ($_SESSION as $k => $v)
		{
			$this -> $k = $v;
		}

		if (!isset($_SESSION['authenticated']))
		{
			$_SESSION['authenticated'] = false;
		}
		$this -> authenticated = $_SESSION['authenticated'];
	}

	protected function getView()
	{
		$this -> view = new View();
	}

	public function __construct()
	{
		$this -> getDatabase();
		$this -> getSession();
		$this -> getView();
	}

	public function forbidden()
	{
		$this -> view -> render('forbidden');
	}

}
?>
