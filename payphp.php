<?php
$name = $_POST['name'];
$month = $_POST['month'];
$year = $_POST['year'];
$cardn = $_POST['cardn'];
$cvc = $_POST['cvc'];
if (!empty($name) || !empty($month) || !empty($year) || !empty($cardn) || !empty($cvc)) {
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "culevent";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT cardn From paytab Where cardn = ? Limit 1";
     $INSERT = "INSERT Into paytab (name, month, year, cardn, cvc) values(?, ?, ?, ?, ?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $cardn);
     $stmt->execute();
     $stmt->bind_result($cardn);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sssss", $name, $month, $year, $cardn, $cvc);
      $stmt->execute();
      echo "New record inserted sucessfully";
     } else {
      echo "Someone already register using this email";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>
