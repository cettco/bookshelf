<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Read Book</title>
	<link rel="stylesheet" href="../stylesheets/reset.css">
	<link rel="stylesheet" href="../stylesheets/layout.css">
	<link rel="stylesheet" href="../stylesheets/style.css">
	<link rel="icon" href="../favicon.ico">
    	<style>
		body {background-image:url('./chess.jpg');}
	</style>
  	
</head>
<body>

<div id="register-login-text-wrapper">
<?php
	require("./config.php");
	require("./utility.php");
	session_start();
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if(isset($_POST['register']))
		{
			header( "refresh:15;url=../index.php" );
			//input validation and register user
			$myemailid = $_POST['email'];
			$sql = "SELECT email_id FROM users WHERE email_id='$myemailid'";
			$result = mysql_query($sql) or die(mysql_error());
			$row = mysql_fetch_array($result);
			$count = mysql_num_rows($result);
			if($count == 0)
			{
				$myusername = $_POST['username'];
				$mypassword = $_POST['password'];
				$mypassword = md5($mypassword);
				$confirmationcode = MakeConfirmationMd5($myemailid);
				mysql_query("INSERT INTO users(email_id, username, password, confirmation_code) VALUES('$myemailid', '$myusername', '$mypassword', '$confirmationcode')") or die(mysql_error());
/*
				// registered successfully
				SendUserConfirmationEmail($myemailid, $myusername, $confirmationcode);
				$message = "<div id=\"register-login-text\"><p>You have registered successfully. Please check your mail for the activation link.</p><p>In case you don't receive the mail, contact us at <a href=\"mailto:gjoshi0311@gmail.com\" text-decoration:none>gjoshi0311@gmail.com</a>.</p><br /><br /><p>This page will automatically redirect to the <a href=\"../index.php\" >Home page</a> in <span id=\"timer\">15 seconds<span></p></div>";
				echo $message;*/
			}
			else
			{
				$error = "<div id=\"register-login-text\"><br /><p>This email has already been registered.</p><br /><p>This page will automatically redirect to the <a href=\"../index.php\" >Home page</a> in <span id=\"timer\">15 seconds<span></p></div>";
				echo $error;
			}
		}
		else if(isset($_POST['signin']))
		{
			//check login credentials
			$myemailid = $_POST['email'];
			$mypassword = $_POST['password'];
			$mypassword = md5($mypassword);
			//$sql = "SELECT email_id, username FROM registered_users WHERE email_id='$myemailid' and password='$mypassword' and confirmation_code='y'";
			$sql = "SELECT userid,email_id, username FROM users WHERE email_id='$myemailid' and password='$mypassword' ";
			$result = mysql_query($sql) or die(mysql_error());
			$row = mysql_fetch_array($result);
			$myusername = $row['username'];
			$userid = $row['userid'];
			$count = mysql_num_rows($result);

			if($count == 1)
			{
				$_SESSION['email_id'] = $myemailid;
				$_SESSION['username'] = $myusername;
				$_SESSION['userid'] = $userid;
				header("location: ../home.php");
			}
			else
			{
				header( "refresh:15;url=../index.php" );
				$error = "<div id=\"register-login-text\"><p>Invalid username/password</p><br /><p>This page will automatically redirect to the <a href=\"../index.php\" >Home page</a> in <span id=\"timer\">15 seconds<span></p></div>";
				echo $error;
			}
		}
		else 
		{
			header( "refresh:15;url=../index.php" );
			$error = "<div id=\"register-login-text\"><p>Invalid Page Requested</p><br /><p>This page will automatically redirect to the <a href=\"../index.php\" >Home page</a> in <span id=\"timer\">15 seconds<span></p></div>";
			echo $error;
		}
	}
	else if($_SERVER["REQUEST_METHOD"] == "GET")
	{
		if(isset($_GET['code']))
		{
			//check validity of activation code
			$confirmationcode = $_GET['code'];
			$sql = "SELECT email_id, username, id FROM registered_users WHERE confirmation_code='$confirmationcode'";
			$result = mysql_query($sql) or die(mysql_error());
			$row = mysql_fetch_array($result);
			$myusername = $row['username'];
			$count = mysql_num_rows($result);

			if($count == 1)
			{
				$sql = "UPDATE registered_users SET confirmation_code='y' WHERE confirmation_code='$confirmationcode'";
				$result = mysql_query($sql) or die(mysql_error());
				$_SESSION['login_email_id'] = $myemailid;
				$_SESSION['login_name'] = $myname;
				$_SESSION['user_id'] = $userid;
				header("location: ../index.php");
			}
			else
			{
				header( "refresh:15;url=../index.php" );	
				$error = "<div id=\"register-login-text\"><p>Invalid/Expired confirmation code.</p><br /><p>This page will automatically redirect to the <a href=\"../index.php\" >Home Page</a> in <span id=\"timer\">15 seconds<span></p></div>";
				echo $error;
			}
		}
		else
		{
			header( "refresh:15;url=../index.php" );
			$error = "<div id=\"register-login-text\"><p>Invalid Page Requested</p><br /><p>This page will automatically redirect to the <a href=\"../index.php\" >Home Page</a> in <span id=\"timer\">15 seconds<span></p></div>";
			echo $error;
		}
	}
	else
	{
		header( "refresh:15;url=../index.php" );
		$error = "<div id=\"register-login-text\"><p>Invalid Page Requested.</p><br /><p>This page will automatically redirect to the <a href=\"../index.php\" >Home Page</a> in <span id=\"timer\">15 seconds<span></p></div>";
		echo $error;
	}
	mysql_close($bd);
?>
</div>
	<div id="container">
		<div id="header">
				<div id="banner-text">Read Book</div>
		</div>
	</div>
    
<script>
  var count = 15, unit;

  var counter = setInterval(timer, 1000);

  function timer()
  {
    count = count - 1;
    if( count <= 0 )
      clearInterval(counter);
    if( count == 1 )
      unit = ' second';
    else
      unit = ' seconds';

    document.getElementById("timer").innerHTML = count + unit;
  }
</script>

<script type="text/javascript">

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>

</body>
</html>
