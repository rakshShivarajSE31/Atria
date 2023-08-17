<html>
<style>

table, th, td {
  border: 1px solid black;
}
th {
  height: 50px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
td {
  height: 50px;
  vertical-align: bottom;
}
table { 
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 25px;
text-align: left;
}
th {
background-color: #588c7e;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
<body>
<?php 
$username = "root"; 
$password = ""; 
$database = "culevent"; 
$mysqli = new mysqli("localhost", $username, $password, $database); 
$query = "SELECT * FROM dramatab";
 
 
echo '<table border="0" cellspacing="2" cellpadding="2"> 
      <tr> 
          <td> <font face="Arial"><b>USN</b></font> </td> 
          <td> <font face="Arial"><b>NAME</b></font> </td> 
          <td> <font face="Arial"><b>EMAIL</b></font> </td> 
          <td> <font face="Arial"><b>PHONE</b></font> </td> 
          <td> <font face="Arial"><b>SEM</b></font> </td> 
		  <td> <font face="Arial"><b>DATE</b></font> </td> 
		  <td> <font face="Arial"><b>DANCE-FORM</b></font> </td>
		  <td> <font face="Arial"><b>TEAM-NAME</b></font> </td>
		  <td> <font face="Arial"><b>MEMBERS-COUNT</b></font> </td>
		  <td> <font face="Arial"><b>MESSAGE</b></font> </td>

      </tr>';
 
if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $usn = $row["usn"];
        $name = $row["name"];
        $email = $row["email"];
        $phone = $row["phone"];
        $sem = $row["sem"];
		$date = $row["date"];
		$dancef = $row["dancef"];
		$teamn = $row["teamn"];
		$membersc = $row["membersc"];
		$message = $row["message"];
 
        echo '<tr> 
                  <td>'.$usn.'</td> 
                  <td>'.$name.'</td> 
                  <td>'.$email.'</td> 
                  <td>'.$phone.'</td> 
                  <td>'.$sem.'</td> 
				  <td>'.$date.'</td>
				  <td>'.$dancef.'</td>
				  <td>'.$teamn.'</td>
				  <td>'.$membersc.'</td>
				  <td>'.$message.'</td>
              </tr>';
    }
    $result->free();
} 
?>
</body>
</html>