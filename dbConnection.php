<?php
  $serverName = "localhost";
  $dbUserName = "root";
  $dbPassword = "";
  $dbName = "test";

  $conn = mysqli_connect($serverName, $dbUserName, $dbPassword, $dbName);
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

?>
