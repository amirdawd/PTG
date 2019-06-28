<?php
include_once 'dbConnection.php';
$name = $elfa = $camel = $type = "";
if (isset($_POST['register'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $elfa = mysqli_real_escape_string($conn, $_POST['elfa']);
    $camel = mysqli_real_escape_string($conn, $_POST['camel']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);
}

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

    </div>

    <div class="form">
      <form action="" [b]autocomplete="off"[/b] method="post">
      <input type="text" name="name" placeholder="Product Name">
      <input type="text" name="elfa" placeholder="Elfa Number">
      <input type="text" name="camel" placeholder="Camel Number">
      <input type="text" name="type" placeholder="Product Type">
      <input type="submit" name="register" value="Register">
      </form>

<?php
if (!(empty($name) || empty($elfa) || empty($camel) || empty($type))) {

  $query = "INSERT INTO   product (productName, elfaNumber, camelNumber, productType) VALUES ('$name','$elfa','$camel','$type')";
           if (mysqli_query($conn, $query)) {
                           echo 'Added new product successfully';
                           header('Location: register.php#success');

                       } else {
                           echo 'An Error has accured please try again';
                       }

                       exit();



}
?>

</body>
</html>
