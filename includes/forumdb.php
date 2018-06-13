<?php
      $dbname = "forum";
      $username = "root"; 
      $password = "Developers2018";
      $servername = "localhost";
 
// Create connection
$con = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>