<?php
//fetch.php
include_once 'dbConnection.php';
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($conn, $_POST["query"]);
 $query = "
  SELECT * FROM products
  WHERE productName LIKE '%".$search."%'
  OR elfaNumber LIKE '%".$search."%'
  OR camelNumber LIKE '%".$search."%'
  OR productType LIKE '%".$search."%'
  LIMIT 5
 ";
}
else
{
 $query = "
  SELECT * FROM products ORDER BY productName LIMIT 0
 ";
}
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>Name</th>
     <th>Elfa-ID</th>
     <th>Camel-ID</th>
     <th>Type</th>
     <th>Shelf</th>
     <th>Compartment</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["productName"].'</td>
    <td>'.$row["elfaNumber"].'</td>
    <td>'.$row["camelNumber"].'</td>
    <td>'.$row["productType"].'</td>
    <td>'.$row["shelfName"].'</td>
    <td>'.$row["compartmentName"].'</td>


   </tr>
  ';
 }
 echo $output;
}
if(!($row = mysqli_fetch_array($result)))
{
 echo '';
}
else{
  echo 'Data Not Found :(';
}

?>
