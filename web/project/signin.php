<?php

session_start();
$badLogin = false;

if (isset($_POST['username']) && isset($_POST['password']))
{
  
	$username = $_POST['username'];
  $password = $_POST['password'];
  
	require("dbConnect.php");
	$db = get_db();
	$query = 'SELECT * FROM users WHERE username=:username';
	$statement = $db->prepare($query);
	$statement->bindValue(':username', $username);
	$result = $statement->execute();
	if ($result)
	{ 
		$row = $statement->fetch();
    $hashedPasswordFromDB = $row['password'];
    $userid = $row['id'];

		if (password_verify($password, $hashedPasswordFromDB))
		{

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

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">  

  <link rel="stylesheet" href="browse3.css">
  <!-- <script type="text/javascript" src="prove2.js"></script> -->

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">  

  <script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>

  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

  <header>
    <h1 class="text-center title"> <span class="red">Rager</span>Gamer</h1></br>

    <p class="text-right"><?php echo "Welcome " . $_SESSION['username']?></p>

    <hr class="thick">

  </header>
<div>

<?php
if ($badLogin)
{
	echo "Incorrect username or password!<br /><br />\n";
}
?>

<h1>Please sign in below:</h1>

<form id="mainForm" action="signin.php" method="POST">

	<input type="text" id="password" name="username" value="<?php $_POST['username']?>">
	<label for="txtUser">Username</label>
	<br /><br />

	<input type="password" id="password" name="password" value="<?php $_POST['password']?>">
	<label for="txtPassword">Password</label>
	<br /><br />

	<input type="submit" value="Sign In" />

</form>

<br /><br />

Or <a href="signup.php">Sign up</a> for a new account.

</div>

</body>
</html>