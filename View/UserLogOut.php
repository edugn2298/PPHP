<?php

  $APP_URL = 'http://localhost/PPHP';
  session_start();
  session_destroy();
  header("Location:" . $APP_URL . "/View/UserHome.php");

?>