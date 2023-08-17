<html>
<head>
<title> updating the data</title>
</head>
</body>

<?php
	$con = mysqli_connect('127.0.0.1','root','');
	
	mysqli_select_db($con,'agriculture');
	
	$sql = "SELECT * FROM fdetail";
	
	$records= mysqli_query($con, $sql);

?>
<table>
	<tr>
		<th> Fname</th>
		<th> Lname</th>
		<th> Phoneno</th>
		<th> Country</th>
		<th> Address</th>
		<th> City</th>
		<th> Mailid</th>
		<th> Bankname</th>
		<th> Accountno</th>
		<th> Cropid</th>
		<th> Cropname</th>
		<th> Croptype</th>
		<th> Dom</th>
		<th> Price</th>
	</tr>
	<?php
	while($row = mysqli_fetch_array($records))
	{
		echo "<tr><form action=fuppp.php method=post>";
		echo "<td><input type=text name=firstname value='".$row['Fname']."'></td>";
		echo "<td><input type=text name=lastname value='".$row['Lname']."'></td>";
		echo "<td><input type=int name=phonenumber value='".$row['Phoneno']."'></td>";
		echo "<td><input type=text name=country value='".$row['Country']."'></td>";
		echo "<td><input type=text name=address value='".$row['Address']."'></td>";
		echo "<td><input type=text name=city value='".$row['City']."'></td>";
		echo "<td><input type=text name=mail_id value='".$row['Mailid']."'></td>";
		echo "<td><input type=text name=bank_name value='".$row['Bankname']."'></td>";
		echo "<td><input type=text name=acno value='".$row['Accountno']."'></td>";
		echo "<td><input type=text name=crop_id value='".$row['Cropid']."'></td>";
		echo "<td><input type=text name=crop_name value='".$row['Cropname']."'></td>";
		echo "<td><input type=text name=crop_type value='".$row['Croptype']."'></td>";
		echo "<td><input type=date name=Dom value='".$row['Dom']."'></td>";
		echo "<td><input type=int name=price value='".$row['Price']."'></td>";
		echo "<input type=hidden name=id value='".$row['id']."'>";
		echo "<td><input type=submit>";
		echo"</form></tr>";
	}
	?>


</body>
</html>