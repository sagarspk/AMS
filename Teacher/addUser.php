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
<header>
	<nav>
	<a href="index.php"><button type="button">Home</button></a>
	<a href="logout.php"><button type="button">Logout</button></a>
	<a href="changepw.php"><button type="button">Change Password</button></a>
	</nav>
</header>
	<h3>Student Registration Form</h3><br>
          <img src="../user-icn.png" style="width:100px;height:100px;align-content:center"><br>
          <form method="post" class="user" action="" autocomplete="on">
            <br>
             <div class="form-group">
                <input type="number" required name="id" placeholder="ID">
            </div>
            <div class="form-group">
                <input type="text" required name="name" placeholder="Name">
            </div>
            <div class="form-group">
                <input type="text" required name="contact" placeholder="Contact" maxlength="10" minlength="10">
            </div>
             <div class="form-group">
                <input type="email" required name="email" placeholder="Email">
            </div>
            <div class="form-group">
              <input type="password" required name="newPassword" placeholder="Password">
            </div>
            <div class="form-group">
              <input type="password" required name="conPassword" placeholder="Confirm Password">
            </div>
            <div class="form-group">
              <input type="submit" value="Submit" name="submit">
            </div>
          </form>
        
<?php
// if(isset($_POST['submit'])){
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$userType = $_POST['userType'];
	$id		  = trim($_POST['id']);
	$name	  = trim($_POST['name']);
	$contact  = trim($_POST['contact']);
	$email	  = trim($_POST['email']);
	$password = md5($_POST['newPassword']);
	$cpassword= md5($_POST['conPassword']);
	// echo $password;
	// echo "<br>".$cpassword;
	if($password!=$cpassword){
	
		echo'<script> alert("New password confirmation failed! Try Again") </script>';
	
	}else{
	
		$sql="Select * from tblStudent where Email='$id'";
		$rs =$conn->query($sql);
		$num=$rs->num_rows;
		if($num>0){
		
			echo'<script> alert("ID Already Taken") </script>';
			
		}else{
			
			$sql="insert into tblStudent (ID,Name,Contact,Email,Password) values ('$id','$name','$contact','$email','$password')";
			$rs = $conn->query($sql);
			echo'<script> alert("New Student added!") </script>';
	
		}
	
	}
	
}
?>







</body>
</html>
