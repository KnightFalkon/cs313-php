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
      foreach($_REQUEST as $key => $value) {
				if($_SESSION[$key][1] != 0) {
					$_SESSION[$key][1] -= 1;
				} else {
					unset($_SESSION[$key]);
					
				}
      }
      echo "hello!!!";
      unset($value);
    ?>

  </body>

</html>