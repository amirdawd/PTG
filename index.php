<?php
include_once 'dbConnection.php';

if (isset($_GET["search"]))
{
  $searchValue = $_GET["search"];
}
else
{
  $searchValue = null;
}

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <title>PTG-LAB</title>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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
 <div class="container">
  <br />
  <div class="form-group">
   <div class="input-group">
    <span class="input-group-addon">Search By </span>
    <input type="text" name="search_text" id="search_text" placeholder="Product Details" class="form-control" />
   </div>
  </div>
  <br />
  <div id="result"></div>
 </div>
</body>
</html>

<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"ajax.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>
