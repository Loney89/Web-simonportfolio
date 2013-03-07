<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tutorial System</title>
<!-- CSS Files -->
<link rel="stylesheet" type="text/css" href="includes/code/css/reset.css" media="all" />
<link rel="stylesheet" type="text/css" href="includes/code/css/960.css" media="all" />
<link rel="stylesheet" type="text/css" href="includes/code/css/default.css" media="all" />

<!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css" href="includes/code/css/ie7.css" media="all" />
    <![endif]-->
<!--[if IE 8]>
        <link rel="stylesheet" type="text/css" href="includes/code/css/ie8.css" media="all" />
    <![endif]-->
</head>
<body>
<div id="content" class="container_12">
<div id="logo">
<h1>- Nine: Support System -</h1>
</div>
  <div id="login">
    <form action="lgsci.php" method="post">
      <fieldset>
        <ol>
          <li>
            <input name="emailuser" input type="email" maxlength="30" placeholder="Insert email address" required>
          </li>
          <li>
            <input name="password" type="password" maxlength="20" placeholder="Password" required>
          </li>
        </ol>
      </fieldset>
      <button type="submit" name="submit" value="login" action="lgsci.php">Login</button>
    </form>
  </div>
</div>
</body>
</html>
