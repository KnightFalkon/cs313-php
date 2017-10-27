<?php
  session_start();
  require("dbConnect.php");
  $db = get_db();
  $query = 'SELECT * FROM users WHERE username=:username';
	$statement = $db->prepare($query);
	$statement->bindValue(':username', $_SESSION['username']);
  $result = $statement->execute();
  $row = $statement->fetch();
?>
<!DOCTYPE html>
<html>

  <head>

    <title>Account Details</title>

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

      <p class="text-right"><?php echo "Welcome " . $_SESSION['username']?></p>
      <div class="pull-right">
        <a href="account.php">Back to account</a>
      </div>  
      </br></br></br>

      <hr class="thick">

    </header>

  <h1 class="text-center">Change password</h1>


  <h4 class="text-center">Account Details</h4>

  <p class="text-center"><?php echo $_SESSION['error'];?></p>

  <div class="col-xs-12 text-center">
    <form action="updatePassword.php" method="post">
    <div class="row pad">
      <label for="oldPassword">Enter Old password</label>
      <input type="password" name="oldPassword">
    </div>
    <div class="row pad">
      <label for="newPassword1">Enter new password: </label>
      <input type="password" name="newPassword1">      
    </div>
    <div class="row pad">
      <label for="newPassword2">Enter Again: </label>
      <input type="password" name="newPassword2">      
    </div>
    <div class="row pad">
      <input type="submit">      
    </div>
    </form>
  </div>

  <?php $_SESSION['error'] = ""; ?>
  </body>