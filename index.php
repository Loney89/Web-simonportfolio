<?php
	
	include_once('partials/header.php');

	$page_set = isset($_GET['page']);
	
	if($page_set == true)
	{
		if($_GET['page'] == "blog")
		{
			include_once('pages/blog.php');
		}

		
		if($_GET['page'] == "about")
		{
			include_once('pages/about.php');
		}

		
		if ($_GET['page'] == "projects")
		{
			include_once('pages/projects.php');
		}
		
		
		if ($_GET['page'] == "contact")
		{
			include_once('pages/contact.php');
		}
	
	}else
	{
		include_once('pages/blog.php');
	}
	
	
	include_once('partials/footer.php');
?>
	
