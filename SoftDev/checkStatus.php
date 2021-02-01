

<?php
include("connect.php");
?>


<?php

$sql = 'SELECT  id,username,password,type,status,firstname,lastname,degree,position,experience,interview FROM users WHERE id= \'' . $_GET['id']. '\' ';

$result = $conn->query($sql);


?>


<!DOCTYPE html>
<html>
<head>
<title>Recruiter Function: Change Status</title>
</head>
<body>

<h1>Recruiter Function: Change Status</h1>
<?php
			if ($result->num_rows > 0) {	
		?>
<?php
						// output data of each row
						//var_dump($row);
						while($row = $result->fetch_assoc()) {
						?>
						<p>Username: <?php echo $row['username']?></p>
						<p>Full Name: <?php echo $row['firstname'] . ' ' .  $row['lastname']?></p>
						<p>Degree: <?php echo $row['degree']?></p>
						<p>Position Applying for: <?php echo $row['position']?></p>
						<p>Experience: <?php echo $row['experience']?></p>
						<p>Current Interview Date: <?php echo $row['interview']?></p>
						<p>Current Application Status: <?php if($row['status'] == 0){ echo "Pending...";}  if($row['status'] == 1){ echo "Rejected";} if($row['status'] == 2){ echo "Accepted";} }?> </p>
						<form class ="form" method="post" action="">
						<label>Enter or Change Interview Date here:</label>
						<textarea id = "interview" name="interview" rows = "1" cols = "12">n/a</textarea>
						<br />
						<br />
						<label>Select one:</label>
						<br>
						<input type="radio" name="status" id = "R1" value ="0"></input>
						<label FOR="R1">Pending</label>
						<input type="radio" name="status" id = "R2" value ="1"></input>
						<label FOR="R2">Rejected</label>
						<input type="radio" name="status" id = "R3" value ="2"></input>
						<label FOR="R3">Accepted</label>
						<br />
						<label>Enter submit to change status</label>
						<br />
						<button type = "submit" name = "submit" value = "send to database">Submit</button>
					</form>
						
<?php
				
			}
		
		?>

	
<br />

<?php

if(isset($_POST['submit'])){

$status = $_POST['status'];
$interview = $_POST['interview'];

$sql = "UPDATE users SET status = '$status'";
$sql = "UPDATE users SET interview = '$interview' ";


 if(mysqli_query($conn, $sql)) {
	 echo "Successfully changed status!";
	 
 }
 
 else{
	 echo "Error: " . $sql . "<br>" . mysqli_error($conn);
 }

}

?>



<form action = "/SoftDev/dashboard1.php">
			<input type= "submit" value = "Go Back" />
		</form>


</body>
</html>



