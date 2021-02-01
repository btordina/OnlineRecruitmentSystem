<?php
include("connect.php");
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- StyleSheets-->
		
		
		
		<title>
			CSC 481 Online Recruitment - New Job
		</title><!--tab name -->
	</head>
	<body>
	
		<h2>
		Create New Job
		</h2>
		
		<form class ="form" method="post" action="newjob.php">
			<label>Enter Name of New Job:</label>
			<input type="text" name="name" value ="" placeholder="Enter Name"></input>
			<br />
			<br />
			<label>Enter a Description:</label>
			<textarea id = "description" name = "description" rows = "3" cols = "80">  </textarea>
			</p>
			<br />
			<br />
			<button type = "submit" name = "submit" value = "send to database">Submit</button>
		</form>
		<br />
		<br />
		<label>To go back to the main page, Click Here: </label>
		<form action = "/SoftDev/dashboard1.php">
			<input type= "submit" value = "Go Back" />
		</form>
		
			</body>
</html>

<?php

if(isset($_POST['submit'])){

$name = $_POST['name'];
$description = $_POST['description'];


$sql = "INSERT INTO available_jobs (name, description)
 VALUES 
 ('$name', '$description')";

 if(mysqli_query($conn, $sql)) {
	 echo "New Job added!";
	 
 }
 
 else{
	 echo "Error: " . $sql . "<br>" . mysqli_error($conn);
 }

}

?>

