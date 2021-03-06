<?php
  session_start();
  require("dbConnect.php");
  $db = get_db();
  $query = 'SELECT * FROM users WHERE username=:username';
	$statement = $db->prepare($query);
	$statement->bindValue(':username', $_SESSION['username']);
  $result = $statement->execute();
  $row = $statement->fetch();

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  
  $username = test_input($_POST['username']);
  $password = test_input($_POST['oldPassword']);
  $newPassword1 = test_input($_POST['newPassword1']);
  $newPassword2 = test_input($_POST['newPassword2']);

  
  if (!isset($password) || $password == ""
    || !isset($newPassword1) || $newPassword1 == ""
    || !isset($newPassword2) || $newPassword2 == ""
    || $newPassword1 != $newPassword2)
  {
    $_SESSION['error'] = "The new passwords do not match";
    header("Location: changePassword.php");
    die(); 
  }

  $query = 'SELECT password FROM users WHERE username = :username';
	$statement = $db->prepare($query);
	$statement->bindValue(':username', $_SESSION['username']);
	$result = $statement->execute();
	if ($result)
	{
		$row = $statement->fetch();
		$hashedPasswordFromDB = $row['password'];
		
		if (password_verify($password, $hashedPasswordFromDB))
		{
      $newHashedPassword = password_hash($password, PASSWORD_DEFAULT);
			
      $query = 'UPDATE users SET password = :password WHERE username = :username';
      $statement = $db->prepare($query);
      $statement->bindValue(':username', $_SESSION['username']);
      $statement->bindValue(':password', $newHashedPassword);
      $statement->execute();
      $_SESSION['error'] = "Password successfully changed.";
      header("Location: account.php");
			die(); 
		}
		else
		{
      $_SESSION['error'] = "Incorrect Password";
      header("Location: changePassword.php");
		}
	}
	else
	{
    $_SESSION['error'] = "Incorrect Password";
    header("Location: changePassword.php");
	}
?>