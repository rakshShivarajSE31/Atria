<?php
$user = $_POST['user'];
$pass = $_POST['pass'];
$user1 = $_POST['user1'];
$pass1 = $_POST['pass1'];
$passs = $_POST['passs'];
$email = $_POST['email'];
if (!empty($user) || !empty($pass) || !empty($user1) || !empty($pass1) || !empty($passs) || !empty(email))  {
 $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "culevent";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT email From logtab Where email = ? Limit 1";
     $INSERT = "INSERT Into logtab (user, pass, user1, pass1, passs, email) values(?, ?, ?, ?, ?, ?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssssss", $user, $pass, $user1, $pass1, $passs, $email);
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
