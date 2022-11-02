<?php	


$sql="select * from _Date";
$rs = $conn->query($sql);
$row= $rs->fetch_assoc();
$lastDate= $row['_date'];
	
	
$Date		= date("Y-m-d");
$DlastDate	= date_create($lastDate);
//echo gettype($DlastDate);
$Ddate		= date_create($Date);
$interval	= date_diff($DlastDate,$Ddate);
$difference	= (int)$interval->format('%a');

if($difference!=0){

	if((date("l"))!="Saturday"){
		
		
		
		//echo'<script type="text/javascript"> alert("line reached") </script>';
		$value		= "Absent";
		$attensql	= "update tblStudent set Attendance='$value', Absent=Absent+1 where 1=1";
		$attenrs 	= $conn->query($attensql);
		$sql		="update _Date set _date=now() where 1=1";
		$rs		= $conn->query($sql);
		
	}else{
		$value		= "Absent";
		$attensql	= "update tblStudent set Attendance='$value' where 1=1";
		$attenrs 	= $conn->query($attensql);
		$sql		= "update _Date set _date=now() where 1=1";
		$rs		= $conn->query($sql);

	}
}

?>
