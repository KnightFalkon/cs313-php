<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

  <head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">  

  <link rel="stylesheet" href="browse.css">
  <!-- <script type="text/javascript" src="prove2.js"></script> -->

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">  

  <script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>

  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script>
    function testInput() {
      
    }
  </script>

  </head>

  <body>

    <header>
      <h1 class="text-center title"> <span class="red">Rager</span>Gamer</h1></br>

      <a href="signin.php" class="pull-right">Back to Sign-in</a>

      </br></br></br>

      <hr class="thick">

    </header>
    
    <?php
			echo "<h1 class='text-center'>$_SESSION[error]</h1>";
      $_SESSION['error'] = "";
    ?>
    <div class="col-xs-12 text-center">    
      <h3>Input your information, so we can send you sweet games!</h3>
      <form  action="createUser.php" method="post">
        <div class="row pad">
          <label for="username">username:</label>
          <input type="text" name="username" id="username" pattern="^[-!$#@%^*()_+|~=`{}\[\]:;<>?,.\/a-zA-Z0-9*_-]{5,20}$" title="5-20 characters, supports most symbols">
        </div>
        <div class="row pad">
          <label for="password">password:</label>
          <input type="password" name="password" id="password" pattern="^[-!$#@%^*()_+|~=`{}\[\]:;<>?,.\/a-zA-Z0-9*_-]{5,20}$" title="5-20 characters, supports most symbols">
        </div>
        <div class="row pad">
          <label for="name">name:</label>
          <input type="text" name="name" id="name" pattern="^[a-z*A-Z*\s]{1,50}$" title="You sure that is your name??">
        </div>
        <div class="row pad">
          <label for="street">street:</label>
          <input type="text" name="street" id="street" pattern="^[a-z*A-Z*0-9*\s]{1,100}$" title="You sure that is your street?">
        </div>
        <div class="row pad">
          <label for="city">city:</label>
          <input type="text" name="city" id="city" pattern="^[a-z*A-Z*\s]{1,100}$" title="You sure that is your city?">
        </div>
        <div class="row pad">
          <label for="state">State:</label>
          <input type="text" name="state" id="state" pattern="^[A-Z*]{2}$" title="Make sure to use your states capitalized two letter code">
        </div>
        <div class="row pad">
          <label for="zip">Zip Code:</label>
          <input type="text" name="zip" id="zip" pattern="^[0-9*]{5}$" title="You sure that is your Zip Code?">
        </div>
        <div class="row pad">
          <label for="cardNum">Credit Card number (Optional, visa only):</label>
          <input type="text" name="cardNum" id="cardNum" pattern="^$|^[0-9*]{16}$" title="You sure that is your Card Number? Do not use dashes.">
        </div>
        <div class="row pad">
          <input type="submit">
        </div>
      </form>
    </div>

  </body>

</html>