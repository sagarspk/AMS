<?php
include '../config/db.php';
include '../config/session.php';

echo "<h2><b>Hello there, ".$_SESSION['Name']."</b><h2>";
echo "Today is " . date("Y/m/d") . "<br>";
// $ip=getenv("Remote_ADDR");
// echo $ip;

$sql="select * from tblStudent where ID='$_SESSION[ID]'";
$rs=$conn->query($sql);
$num=$rs->num_rows;
$row=$rs->fetch_assoc();

if($num>0){
	if($_SESSION['ID'] != $row['ID']){
		die("Illegal access");
	}
}else{
	header("Location : ../index.php");
}
	
$Date= date("Y-m-d H:m:s");
$attendance	= $row['Attendance'];	
if($attendance!= "Present"){
	
	$value		= "Present";
	$attensql	= "update tblStudent set Attendance='$value', Ldate='$Date', Present=Present+1, Absent=Absent-1 where ID='$_SESSION[ID]'";
	$attenrs 	= $conn->query($attensql);
}


// echo $row['Absent']."<br>".$row['Present'];

?>
<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>AMS Student</title>
	<link href="../user.jpg" rel="icon">

</head>
<body>
	<nav>
	<a href="index.php"><button type="button">Home</button></a>
	<a href="logout.php"><button type="button">Logout</button></a>
	<a href="changepw.php"><button type="button">Change Password</button></a>
	</nav>
	<ol style=position:relative;padding=100px;>
		<p>Total College Days   = <?php echo $row['Absent']+$row['Present'];?></p>
		<p>Absent 				= <?php echo $row['Absent'];?></p>
		<p>Present				= <?php echo $row['Present'];?></p>
	</ol>




</body>
</html>
