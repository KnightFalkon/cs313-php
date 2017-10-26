<?php

session_start();
$badLogin = false;
echo '.5';
if (isset($_POST['username']) && isset($_POST['password']))
{
  echo "1";
	$username = $_POST['username'];
  $password = $_POST['password'];
  echo '2';
	require("dbConnect.php");
	$db = get_db();
	$query = 'SELECT * FROM users WHERE username=:username';
	$statement = $db->prepare($query);
	$statement->bindValue(':username', $username);
	$result = $statement->execute();
	if ($result)
	{ echo '3';
		$row = $statement->fetch();
    $hashedPasswordFromDB = $row['password'];
    $userid = $row['id'];

		if (password_verify($password, $hashedPasswordFromDB))
		{
      echo '4';
      $_SESSION['username'] = $username;
      $_SESSION['userid'] = $userid;
      header("Location: browse.php");
      
		}
		else
		{
			$badLogin = true;
		}
	}
	else
	{
		$badLogin = true;
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign In</title>
</head>

<body>
<div>

<?php
if ($badLogin)
{
	echo "Incorrect username or password!<br /><br />\n";
}
?>

<h1>Please sign in below:</h1>

<form id="mainForm" action="signin.php" method="POST">

	<input type="text" id="txtUser" name="txtUser" placeholder="Username">
	<label for="txtUser">Username</label>
	<br /><br />

	<input type="password" id="txtPassword" name="txtPassword" placeholder="Password">
	<label for="txtPassword">Password</label>
	<br /><br />

	<input type="submit" value="Sign In" />

</form>

<br /><br />

Or <a href="signup.php">Sign up</a> for a new account.

</div>

</body>
</html>