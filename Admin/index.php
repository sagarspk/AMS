<?php
include '../config/db.php';
include '../config/session.php';

// echo "<h2><b>Hello there, ".$_SESSION['Name']."</b><h2>";
// echo "Today is " . date("Y/m/d") . "<br>";

$sql="select * from tblAdmin where ID='$_SESSION[ID]'";
$rs=$conn->query($sql);
$num=$rs->num_rows;
$row=$rs->fetch_assoc();

if($num>0){
	if($_SESSION['ID'] != $row['ID']){
		die("Illegal access");
	}
}else{
	header("Location: ../index.php");
}




?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/styleindex.css">
	<title>AMS Admin</title>
	<link href="../user.jpg" rel="icon">
</head>
<body>
<header>
	<nav>
	<a href="index.php"><button type="button">Home</button></a>
	<a href="logout.php"><button type="button">Logout</button></a>
	<a href="changepw.php"><button type="button">Change Password</button></a>
	<a href="addUser.php"><button type="button">Add User</button></a>
	<a href="removeUser.php"><button type="button">Remove User</button></a>
	</nav>
</header>
	
	<table>
	<tr>
		<th>ID</th>
		<th>Name</th>
		<th>Email</th>
		<th>Contact</th>
		<th>Attendance</th>
		<th>Absent days</th>
		<th>Present days</th>
		<th>Last Seen</th>
	</tr>
	<?php
		$sql="Select * from tblStudent order by ID ASC";
		$rs=$conn->query($sql);
		while($row=$rs->fetch_assoc()){
		
	?>
	<tr>
		<td><?php echo $row['ID'];?></td>
		<td><?php echo $row['Name'];?></td>
		<td><?php echo $row['Email'];?></td>
		<td><?php echo $row['Contact'];?></td>
		<?php
			if($row['Attendance']=="Present"){
		?>
		<td style=background:green;color:white;><?php echo $row['Attendance'];?></td>
		<?php
			}else{
		?>
		<td style=background:red;color:white;><?php echo $row['Attendance'];?></td>
		<?php
			}
		?>


		<td><?php echo $row['Absent'];?></td>
		<td><?php echo $row['Present'];?></td>
		<td><?php echo $row['Ldate'];?></td>
		
	</tr>
	<?php
	}
	?>






</body>
</html>

