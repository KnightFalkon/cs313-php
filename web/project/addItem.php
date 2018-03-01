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
				$array = [$value, 0];
				if(in_array($value, $_SESSION)) {
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