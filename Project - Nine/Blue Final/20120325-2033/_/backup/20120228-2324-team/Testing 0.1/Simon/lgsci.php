<html>

<?php
		$host="localhost"; //hostname
		$username="mscit"; //mysqlusername
		$password="Tutorail1!"; ///mysqlpassword
		$db_name="mscit"; ///applicabledb
		$tbl_name="tas_users"; ///applicabletable
	
				mysql_connect("$host", "$username", "$password")or die("Fail, squire."); 
				mysql_select_db("$db_name")or die("cannot find DB"); 
				
			$emailuser=$_POST['emailuser'];
			$password=$_POST['password'];
	
		$count=mysql_num_rows($result);
		
		if($count==1){
			session_register("myusername");
			session_register("mypassword");
			header("location:lg_success.php");
			}
				else {
				echo "Wrong Username and or Password";
				}
?>
	
	Something is a foot....
	</body>
	</html>