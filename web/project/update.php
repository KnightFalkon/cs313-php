<?php

session_start();

require("dbConnect.php");
$db = get_db();

$query = 'SELECT * FROM users WHERE username=:username';
$statement = $db->prepare($query);
$statement->bindValue(':username', $_SESSION['username']);
$result = $statement->execute();
$userRow = $statement->fetch();

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$name = test_input($_POST['name']);
$street = test_input($_POST['street']);
$city = test_input($_POST['city']);
$state = test_input($_POST['state']);
$zip = test_input($_POST['zip']);
$cardNum = test_input($_POST['cardNum']);

if (!isset($name) || $name == "" || !is_string($name)
|| !isset($street) || $street == "" || !is_string($street)
|| !isset($city) || $city == "" || !is_string($city)
|| !isset($state) || $state == "" || !is_string($state)
|| !isset($zip) || $zip == "" || !is_int($zip)
|| !isset($cardNum) || $cardNum == "" || !is_int($cardNum))
{
$_SESSION['error'] = "Try Again";
header("Location: updateInfo.php");
die(); 
}

$query = 'UPDATE users SET address = :address, city = :city, state = :state, zip = :zip, card_num = :card_num, name = :name WHERE username = :username';
$statement = $db->prepare($query);
$statement->bindValue(':username', $_SESSION['username']);
$statement->bindValue(':address', $street);
$statement->bindValue(':city', $city);
$statement->bindValue(':state', $state);
$statement->bindValue(':zip', $zip);
$statement->bindValue(':card_num', $cardNum);
$statement->bindValue(':name', $name);
$statement->execute();

header("Location: account.php");
die(); 
?>