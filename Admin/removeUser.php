<?php
include '../config/db.php';
include '../config/session.php';

echo "<h2><b>Hello there, ".$_SESSION['Name']."</b><h2>";

$sql="select * from tblAdmin where ID='$_SESSION[ID]'";
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
	<title>AMS Admin</title>
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
	
	
	<h3>Delete Student</h3><br>
          <img src="../user-icn.png" style="width:100px;height:100px;align-content:center"><br><br>
          <form method="post" class="user" action="" autocomplete="on">
            
            <div class="form-group">
            	<select required name = "userName">
            		<option value="">---Select Student----</option>
            		<?php
            			$sql="select * from tblStudent order by ID ASC";
            			$rs = $conn->query($sql);
            			while($row= $rs->fetch_assoc()){
            		?>
            		<option value="<?php echo $row['Name'];?>"><?php echo $row['ID']."  ".$row['Name']?></option>
            		
            		
            		<?php
            			}
            		?>
            	</select>	
            </div>
            <div class="form-group">
              <input type="submit" value="Remove" name="remove">
            </div>
          </form>
        
<?php
if(isset($_POST['remove'])){
	$userName = $_POST['userName'];
	//$row=$rs->fetch_assoc();
	if($row['Name']==$username){
	
		$sql="delete from tblStudent where Name='$userName'";
		$rs =$conn->query($sql);
		echo'<script type="text/javascript"> alert("Student Removed!") </script>';
	}else{
		echo'<script type="text/javascript"> alert("Student Removal Failed!") </script>';
	}
		
	
	
}
?>

	<h3>Delete Teacher</h3><br>
	<img src="../user-icn.png" style="width:100px;height:100px;align-content:center"><br><br>
        <form method="post" class="user" action="" autocomplete="on">
            
        <div class="form-group">
         	<select required name = "userName">
            		<option value="">---Select Teacher----</option>
            		<?php
            			$sql="select * from tblTeacher order by ID ASC";
            			$rs = $conn->query($sql);
            			while($row= $rs->fetch_assoc()){
            		?>
            		<option value="<?php echo $row['Name'];?>"><?php echo $row['ID']."  ".$row['Name']?></option>
            		
            		
            		<?php
            			}
            		?>
            	</select>	
          </div>
            <div class="form-group">
              <input type="submit" value="Remove" name="remove">
            </div>
          </form>
        
<?php
if(isset($_POST['remove'])){
	$userName = $_POST['userName'];
	//$row=$rs->fetch_assoc();
	if($row['Name']==$userName){
		$sql="delete from tblTeacher where Name='$userName'";
		$rs =$conn->query($sql);
		echo'<script type="text/javascript"> alert("Teacher Removed!") </script>';
	}else{
		echo'<script type="text/javascript"> alert("Teacher Removal Failed!") </script>';
	}
		
	
	
}
?>



</body>
</html>
