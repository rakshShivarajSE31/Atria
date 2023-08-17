<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>
<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

tr:hover {background-color:#f5f5f5;}
</style>
</head>
<body>
<table>
<tr>
<th>name</th>
<th>month</th>
<th>year</th>
<th>cardn</th>
<th>cvc</th>
</tr> 
<?php
$conn = mysqli_connect("localhost", "root", "", "culevent");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT name, month, year, cardn, cvc FROM paytab";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["name"] . "</td><td>" . $row["month"] . "</td><td>" . $row["year"] . "</td></tr>" . $row["cardn"] . "</td><td>" . $row["cvc"] . "</td><td>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
</body>
</html>