<div id="footer">
    <?php if($User->isAuthenticated() == true){?>
	<a href="index.php?action=logout">
	    <button id="submit">
	        Logout
	    </button>
	</a>
	<?php }?>
	<p>
		Nine &copy; 2012 UWE MSc IT - Software
	</p>
</div>
