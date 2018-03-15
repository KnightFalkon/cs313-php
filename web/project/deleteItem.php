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
				if($_SESSION[$value][1] != 0) {
					$_SESSION[$value][1] -= 1;
				} else {
					unset($_SESSION[$value]);
					
				}
      }
      echo "hello!!!";
      unset($value);
    ?>

  </body>

</html>