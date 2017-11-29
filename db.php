<?php
class DB
{
  public static function CreateConnection() {
    $host = "csit455-mysql-instance1.c0ogvcfzvpeh.us-east-2.rds.amazonaws.com";
    $user = "master";
    $password = "password";
    $db = "CSIT455";
    $connection = new mysqli($host, $user, $password, $db);

    //Check for error
    if($connection->connect_error) {
      echo "connection error:" . $connect_error;
    }
    // Send the connection back
    return $connection;
  }

  public static function Test() {
    $conn = DB::CreateConnection();
    // Make a select query
    $rawResults = $conn->query('SELECT * FROM employees');
    //Put all results into bucket
    $test = [];
    while($row = $rawResults->fetch_assoc()) {
      //store for use
      $test[] = $row;
    }
    // return the bucket
    return $test;
  }
}

 ?>
