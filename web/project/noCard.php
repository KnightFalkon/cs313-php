<?php
  session_start();

  require "dbConnect.php";
  $db = get_db();

  if (isset($_SESSION['username']))
  {
    $username = $_SESSION['username'];
  }
  else
  {
    header("Location: signin.php");
    die();
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>No Card</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">  

  <link rel="stylesheet" href="browse.css">
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

    <a href="account.php">Go to Account</a>

    </br></br></br>

    <hr class="thick">

  </header>
<div class="text-center">

<h1>No Card info found</h1>
<p>In order to buy games, you'll need to go to your account and add a credit card.</p>

<a href="account.php" class="pull-right">Go to Account</a>

</div>

</body>
</html>