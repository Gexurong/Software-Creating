Here
<?php
#foreach ($book as $book_item):
#    echo $book_item['name'];
#endforeach;

$con = mysqli_connect("localhost:3306","root","root");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

// some code


?>