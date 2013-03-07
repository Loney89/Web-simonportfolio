<?
session_start();
if (!session_is_registered(myusername)){
header("location:m_login.php"):
}
?>

<html>
<body>
Hurrah!
</body>
</html>
