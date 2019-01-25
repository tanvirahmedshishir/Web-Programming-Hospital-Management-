<?php
include("connect.php"); 
// drop database
if (mysql_query("DROP DATABASE new_db",$con))
  {
  echo "Database Dropped";
  }
else
  {
  echo "Error dropping database: " . mysql_error();
  }

mysql_close($con);
?>