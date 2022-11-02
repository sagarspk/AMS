<?php
include 'config/db.php';
include 'config/reset.php';
session_start();

if($_SESSION['userType']=="Admin"){
	
	header("Location: Admin/index.php");
	
}else if($_SESSION['userType']=="Teacher"){
	
	header("Location: Teacher/index.php");
	
}else if($_SESSION['userType']=="Student"){
	
	header("Location: Student/index.php");
	
}

// $ip=getenv('REMOTE_ADDR');
$ip = $_SERVER['REMOTE_ADDR']; 
 

$host=$_SERVER['HTTP_HOST'];


// if(strcmp($ip,$host)){
// 	die("Invalid Access");
// }


?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AMS-Login</title>
    <link href="user-icn.png" rel="icon">
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>

<!-- <header>

	<a href="index.php"><button type="button">Home</button></a>
	<a href="www.google.com"><button type="button">Logout</button></a>
	<a href="changepw.php"><button type="button">Change Password</button></a>
	<a href="addUser.php"><button type="button">Add User</button></a>
	<a href="removeUser.php"><button type="button">Remove User</button></a>

</header> -->


<div class="outer-container">
    <div class="container">
        <form method="POST" action="" class="container">
        <div class="verticle-container">
            <!-- <legend>Choose Role</legend> -->
            
            <div class="section">
                <input type="radio" class="radio_input" id="option1" name="userType" value="Student"checked>
                <label for="option1" class="radio_label"><span class="studenticon"></span>Student</label>
            </div>
            <div class="section">
                <input type="radio" class="radio_input" id="option2" name="userType" value="Teacher">
                <label for="option2" class="radio_label"><span class="teachericon"></span>Teacher</label>
            </div>
            <div class="section">
                <input type="radio" class="radio_input" id="option3" name="userType" value="Admin">
                <label for="option3" class="radio_label"><span class="adminicon"></span>Admin</label>
            </div>
        </div>
        <div class="form-login">
            <legend>Login Form</legend>
            <div class="form-group">
                <label for="" ><span class="userlogo"></span>Email:</label><br>
                <input type="email" required name="email" placeholder="@Email" class="login_input">
                
            </div>
            <div class="form-group">
                <label for="" ><span class="passwordlogo"></span>Password:</label><br>
                <input type="password" required name="password" placeholder="Password" class="login_input">

            </div>
            <div  class="submit-group">
              <input type="submit" value="Login" name="login" class="submit_input">
            </div>
        </div>
        </form>
    </div>
</div>
<?php
// if(isset($_POST['login'])){
	
// 	$userType= $_POST["userType"];
// 	$email   = $_POST["email"];
// 	$password= $_POST["password"];
// 	$password= md5($password);
	
// 	if($userType=="Admin"){
	
// 		$sql="select * from tblAdmin where Email='$email' and Password='$password'";
// 		$resultset= $conn->query($sql);
// 		$num= $resultset->num_rows;
// 		$row= $resultset->fetch_assoc();
	
// 		if($num>0){
			
// 			$_SESSION['ID']= $row['ID'];
// 			$_SESSION['Name']= $row['Name'];
// 			$_SESSION['Contact']= $row['Contact'];
// 			$_SESSION['Email']= $row['Email'];
// 			$_SESSION['userType']=$userType;
// 			header("location: Admin/index.php");			
			
// 		}
// 		else{
// 			echo'<script> alert("Invalid Login from Administrator") </script>';
// 		}
		
	

// 	}else if($userType=="Teacher"){
	
// 		$sql="select * from tblTeacher where Email='$email' and Password='$password'";
// 		$resultset= $conn->query($sql);
// 		$num= $resultset->num_rows;
// 		$row= $resultset->fetch_assoc();
	
// 		if($num>0){
// 			$_SESSION['ID']= $row['ID'];
// 			$_SESSION['Name']= $row['Name'];
// 			$_SESSION['Contact']= $row['Contact'];
// 			$_SESSION['Email']= $row['Email'];
// 			$_SESSION['userType']=$userType;
// 			header("location: Teacher/index.php");						
			
// 		}
// 		else{
// 			echo'<script> alert("Invalid Login from Teacher") </script>';
// 		}
		
	

// 	}else if($userType=="Student"){
	
// 		$sql="select * from tblStudent where Email='$email' and Password='$password'";
// 		$resultset= $conn->query($sql);
// 		$num= $resultset->num_rows;
// 		$row= $resultset->fetch_assoc();
	
// 		if($num>0){
// 			$_SESSION['ID']= $row['ID'];
// 			$_SESSION['Name']= $row['Name'];
// 			$_SESSION['Contact']= $row['Contact'];
// 			$_SESSION['Email']= $row['Email'];
// 			$_SESSION['userType']=$userType;
// 			header("location: Student/index.php");						
			
// 		}
// 		else{
// 			echo'<script> alert("Invalid Login from Student") </script>';
// 		}
		
	

// 	}
		

// }

if($_SERVER["REQUEST_METHOD"]== 'POST'){
	$userType= trim($_POST["userType"]);
	$email   = trim($_POST["email"]);
	$password= md5($_POST["password"]);

	if($userType=="Admin"){
	
		$sql="select * from tblAdmin where Email='$email' and Password='$password'";
		$resultset= $conn->query($sql);
		$num= $resultset->num_rows;
		$row= $resultset->fetch_assoc();
	
		if($num>0){
			
			$_SESSION['ID']= $row['ID'];
			$_SESSION['Name']= $row['Name'];
			$_SESSION['Contact']= $row['Contact'];
			$_SESSION['Email']= $row['Email'];
			$_SESSION['userType']=$userType;
			header("location: Admin/index.php");			
			
		}
		else{
			echo'<script> alert("Invalid Login from Administrator") </script>';
		}
		
	

	}else if($userType=="Teacher"){
	
		$sql="select * from tblTeacher where Email='$email' and Password='$password'";
		$resultset= $conn->query($sql);
		$num= $resultset->num_rows;
		$row= $resultset->fetch_assoc();
	
		if($num>0){
			$_SESSION['ID']= $row['ID'];
			$_SESSION['Name']= $row['Name'];
			$_SESSION['Contact']= $row['Contact'];
			$_SESSION['Email']= $row['Email'];
			$_SESSION['userType']=$userType;
			header("location: Teacher/index.php");						
			
		}
		else{
			echo'<script> alert("Invalid Login from Teacher") </script>';
		}
		
	

	}else if($userType=="Student"){
	
		$sql="select * from tblStudent where Email='$email' and Password='$password'";
		$resultset= $conn->query($sql);
		$num= $resultset->num_rows;
		$row= $resultset->fetch_assoc();
	
		if($num>0){
			$_SESSION['ID']= $row['ID'];
			$_SESSION['Name']= $row['Name'];
			$_SESSION['Contact']= $row['Contact'];
			$_SESSION['Email']= $row['Email'];
			$_SESSION['userType']=$userType;
			header("location: Student/index.php");						
			
		}
		else{
			echo'<script> alert("Invalid Login from Student") </script>';
		}
		
	

	}






}



?>


</body>
</html>
