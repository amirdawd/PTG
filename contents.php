<?php
include_once 'dbConnection.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>PTG</title>
    <link href="style.css" rel="stylesheet" />
  </head>
  <body>

    <nav>
    <ul>
     <li> <a class="home" href="index.php">Home</a> </li>
     <li> <a href="contents.php">Contents</a>    </li>
     <li> <a href="#about">About</a> </li>
     <li> <a href="register.php"> Register Item </a> </li>
    </ul>
    </nav>

    <?php
      $query = 'SELECT * FROM product ORDER by productname ASC';
      $result = $conn->query($query);
      $found=0;
      if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
    if($row> 1){
      $list =  array($row);
      foreach ($list as &$value) {
        $found++;
              echo "Name: " . $row["productName"] . " | Elfa-Number: " . $row["elfaNumber"] . " | Type: " .  $row["productType"]; echo "<br>";
          }
  }

}
}
    echo "Total :  " . $found;
     ?>

</body>
</html>
