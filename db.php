<?php
class DB
{
  public static function CreateConnection() {
    $host = "AMAZON THING";
    $user = "USERNAME";
    $password = "PW";
    $db = "DB";
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
