<?php
class DB
{
  public static function CreateConnection() {
    $connection = new mysqli($host, $user, $password, $db);

    //Check for error
    if($connection->connect_error) {
      echo "connection error:" . $connect_error;
    }
    // Send the connection back
    return $connection;
  }
public static function getEmployeesByManagerStoreID($storeID)
{
  // Make a connection
  $conn = DB::CreateConnection();
  // Make a query
  $rawResults = $conn->query("SELECT * FROM employees WHERE storeID = $storeID");
  // Fetch result
  $employees = [];
  while($row = $rawResults->fetch_assoc()) {
    // Store for use
    $employees[] = $row;
  }
  // Return the bucket
  return $employees;
}
public static function GetEmployeeById($id)
 {
   // Make a connection
   $conn = DB::CreateConnection();
   // Make a query
   $rawResults = $conn->query("SELECT * FROM employees WHERE employeeID like '%$id%'");
   // Fetch result
   $employee = $rawResults->fetch_assoc();
   // Return the user
   return $employee;
 }
 public static function GetManagerById($managerID)
 {
   // Make a connection
     $conn = DB::CreateConnection();
     // Make a query
     $rawResults = $conn->query("SELECT * FROM managers WHERE managerID like '%$managerID%'");
     // Fetch result
     $manager = $rawResults->fetch_assoc();
     // Return the user
     return $manager;
 }
 public static function GetAvailableShiftsByStoreID($storeID)
 {
   // Make a connection
   $conn = DB::CreateConnection();
   // Make a query
   $rawResults = $conn->query("SELECT * FROM shifts WHERE availability='1' AND storeID = $storeID");
   // Fetch result
   $shifts = [];
   while($row = $rawResults->fetch_assoc()) {
     // Store for use
     $shifts[] = $row;
   }
   // Return the bucket
   return $shifts;
 }
 public static function addEmployee($employeeID, $firstName, $lastName, $position, $storeID)
 {
   $connection = DB::CreateConnection();
    $sql = $connection->prepare("INSERT INTO employees (employeeID, firstName, lastName, position, storeID) VALUES (?,?,?,?,?);");
    $sql->bind_param("ssssi",$employeeID,$firstName,$lastName, $position, $storeID);
    $sql->execute();
    $connection->close();
 }
 public static function deleteEmployee($employeeID)
 {
   $conn = DB::CreateConnection();
    // Prepare
    $sql = $conn->prepare("DELETE FROM employees WHERE employeeID = ?");
    if(!$sql) {
      die("Prepare failed, check your sql");
    }

    if(!$sql->bind_param("s", $_POST["employeeID"])) {
      die("Bind Failed");
    }

    if(!$sql->execute()) {
      die("Execute Failed");
     }
   }
public static function employeeTransfer()
{
  $conn = DB::CreateConnection();
  //Prepare
  $sql = $conn->prepare("UPDATE employees SET storeID=? where employeeID = ?");
  if($sql == false)
  {
   die("Prepare FAILED");
  }

  $bindResult = $sql->bind_param("is", $_POST["storeID"], $_POST["employeeID"]);
  // "ssi" stands for string, string, integer
  if($bindResult==false)
  {
    die('Binding FAILED');
  }

  $executeResult = $sql->execute();
  if($executeResult == false)
  {
    die('Executing FAILED');
  }
  // Relocate to their personal page
    header("Location: homepageManager.php?managerID=$_POST[managerID]");
  }
  public static function shiftAssign($shiftID, $employeeID)
  {
    $connection = DB::CreateConnection();

    $sql = $connection->prepare("UPDATE shifts SET employeeID=? WHERE shiftID=?");
    if($sql == false)
    {
       die("Prepare FAILED");
    }

    $bindResult = $sql->bind_param("si", $employeeID, $shiftID);
    // "ssi" stands for string, string, integer,
    if($bindResult==false)
    {
     die('Binding FAILED');
    }

    $executeResult = $sql->execute();
    if($executeResult == false)
    {
      echo "$employeeID and $shiftID";
     die('Executing FAILED');
    }
    header("Location: homepageManager.php");
  }
  public static function updateShiftAvailablility($shiftID)
  {
    $connection = DB::CreateConnection();
    $sql = $connection->prepare("UPDATE shifts SET availability=1 WHERE shiftID=?");
    if($sql == false)
    {
      die("Prepare FAILED");
    }
    $bindResult = $sql->bind_param("i", $shiftID);
    if($bindResult==false)
    {
      die('binding FAILED');
    }
    $executeResult = $sql->execute();
    if($executeResult == false)
    {
      die('Executing FAILED');
    }
  }
  public static function getEmployeeShifts()
  {
    // Make a connection
    $conn = DB::CreateConnection();
    // Make a query
    $rawResults = $conn->query("SELECT * FROM shifts WHERE employeeID='$_GET[employeeID]'");
    // Fetch result
    $shifts = [];
    while($row = $rawResults->fetch_assoc()) {
      // Store for use
      $shifts[] = $row;
    }
    // Return the bucket
    return $shifts;
  }
  public static function putShiftInSubbook($shiftID)
  {
    $connection = DB::CreateConnection();
    $sql = $connection->prepare("UPDATE shifts SET availability=0 WHERE shiftID=?");
    if($sql == false)
    {
      die("Prepare FAILED");
    }
    $bindResult = $sql->bind_param("i", $shiftID);
    if($bindResult==false)
    {
      die('binding FAILED');
    }
    $executeResult = $sql->execute();
    if($executeResult == false)
    {
      die('Executing FAILED');
    }
  }
  public static function pickUpShift($employeeID, $shiftID)
  {
    $connection = DB::CreateConnection();
    $sql = $connection->prepare("UPDATE shifts SET employeeID=? WHERE shiftID=?");
    if($sql == false)
    {
      die("Prepare FAILED");
    }
    $bindResult = $sql->bind_param("si", $employeeID, $shiftID);
    if($bindResult==false)
    {
      die('binding FAILED');
    }
    $executeResult = $sql->execute();
    if($executeResult == false)
    {
      die('Executing FAILED');
    }
  }
  public static function getSubBookShifts($storeID) {
    // Make a connection
    $conn = DB::CreateConnection();
    // Make a query
    $rawResults = $conn->query("SELECT * FROM shifts WHERE
      availability='0' AND storeID = $storeID AND employeeID IS NOT NULL");
    // Fetch result
    $shifts = [];
    while($row = $rawResults->fetch_assoc()) {
      // Store for use
      $shifts[] = $row;
    }
    // Return the bucket
    return $shifts;
  }
}
 ?>
