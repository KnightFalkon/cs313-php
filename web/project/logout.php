<?php
  session_start();
  session_unset();
  header('Location: browse.php');
  die();
?>