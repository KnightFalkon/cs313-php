<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

  <head>

  </head>

  <body>

    <?php
      echo "This is the first line" . $_REQUEST[0];
      print_r($_SESSION);
      foreach($_REQUEST as $value) {
        $_SESSION[$value] = $value;
      }
      echo "hello!!!";
      unset($value);
    ?>

  </body>

</html>