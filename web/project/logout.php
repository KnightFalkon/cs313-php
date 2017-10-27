<?php
  session_start();

  foreach($_SESSION as $value) {
    unset($value);
  }
  unset($value);
  header('Location: browse.php')
?>