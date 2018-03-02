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
				$array = array($value, 1);
				if($_SESSION[$value][0] == $value) {
					// $_SESSION[$value][1] = "yes, this is working";
					$_SESSION[$value][1] = $_SESSION[$value][1] + 1;
				}
				else {
					$_SESSION[$value] = $array;					
				}
      }
      echo "hello!!!";
      unset($value);
    ?>

  </body>

</html>