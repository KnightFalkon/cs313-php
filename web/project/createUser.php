<?php

session_start();

echo "yes this is working";

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

echo "1";
// $username = $_POST['username'];
echo "1.01";
$username = test_input($_POST['username']);
$password = test_input($_POST['password']);
echo "1.1";
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
$name = test_input($_POST['name']);
echo "1.5";
$street = test_input($_POST['street']);
$city = test_input($_POST['city']);
$state = test_input($_POST['state']);
$zip = test_input($_POST['zip']);
$cardNum = test_input($_POST['cardNum']);
echo "2";

// if (!isset($username) || $username == ""
//   || !isset($password) || $password == ""
//   || !isset($name) || $naem == ""
//   || !isset($street) || $street == ""
//   || !isset($city) || $city == ""
//   || !isset($state) || $state == ""
//   || !isset($zip) || $zip == ""
//   || !isset($cardNum) || $cardNum == "")
// {
//   $_SESSION['error'] = "Try Again";
//   header("Location: signup.php");
// 	die(); 
// }
echo "3";
require("dbConnect.php");
$db = get_db();
echo "4";
$st = $db->prepare("SELECT username FROM week7.user WHERE username = '$username'");
$st->execute();
$count = (int)$st->rowCount();
if ($count != 0) {
  $_SESSION['error'] = "Username is already being used";
  header("Location: signup.php");
	die(); 
}
echo "5";
$query = 'INSERT INTO users(username, password, address, city, state, zip, payment_type, card_num, name) VALUES(:username, :password, :address, :city, :state, :zip, :payment_type, :card_num, :name)';
$statement = $db->prepare($query);
$statement->bindValue(':username', $username);
$statement->bindValue(':password', $hashedPassword);
$statement->bindValue(':address', $street);
$statement->bindValue(':city', $city);
$statement->bindValue(':state', $state);
$statement->bindValue(':city', $city);
$statement->bindValue(':zip', $zip);
$statement->bindValue(':payment_type', 'visa');
$statement->bindValue(':card_num', $cardNum);
$statement->bindValue(':name', $name);
$statement->execute();
echo "6";
$st = $db->prepare("SELECT * FROM users WHERE username = '$username'");
$st->execute();
$row = $st->fetch();
echo "7";
$_SESSION['userid'] = $row['id'];
$_SESSION['username'] = $username;
header("Location: browse.php");
die(); 
echo "8";
?>
  
<!DOCTYPE html>
<html>
  <body>
    <p>hello</p>
  </body>
</html>