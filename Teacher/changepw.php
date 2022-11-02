<?php
include '../config/db.php';
include '../config/session.php';

echo "<h2><b>Hello there, ".$_SESSION['Name']."</b><h2>";

$sql="select * from tblTeacher where ID='$_SESSION[ID]'";
$rs=$conn->query($sql);
$num=$rs->num_rows;
$row=$rs->fetch_assoc();

if($num>0){
	if($_SESSION['ID'] != $row['ID']){
		die("Illegal access");
	}
}else{
	die("Database verification failed");
}


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>AMS Teacher</title>
	<link href="../user.jpg" rel="icon">
</head>
<body>
	<div class="container">
		<form method="POST" action="">
			<input type="password" required name="oldPassword" placeholder="Current Password"><br>
			<input type="password" required name="newPassword" placeholder="New Password"><br>
			<input type="password" required name="conPassword" placeholder="Confirm New Password"><br>
			<input type="submit" value="Save" name="save">
		</form>	
	</div>

<?php

if(isset($_POST['save'])){
	$id       = $_SESSION['ID'];
	$opassword= md5($_POST['oldPassword']);
	$password = md5($_POST['newPassword']);
	$cpassword= md5($_POST['conPassword']);
	$sql="select Password from tblTeacher where ID='$id'";
	$rs=$conn->query($sql);
	$row=$rs->fetch_assoc();
	if($password!=$cpassword){
		echo'<script type="text/javascript"> alert("New password confirmation failed! Try Again") </script>';
	}else if($row['Password']!="$opassword"){
		echo'<script type="text/javascript"> alert("Invalid Current Password") </script>';
	}else{
		$sql="Update tblTeacher set Password='$password' where ID='$id'";
		$rs=$conn->query($sql);
		$sql="select Password from tblTeacher where ID='$id'";
		$rs=$conn->query($sql);
		$row=$rs->fetch_assoc();
		if($row['Password']=="$password"){
		
			echo'<script type="text/javascript"> alert("Password changed") </script>';
		
		}
	
	
	
	}
}
?>	


</body>
</html>

