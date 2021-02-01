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
			CSC 481 Online Recruitment - New User
		</title><!--tab name -->
	</head>
	<body>
	
		<h2>
		Create New User	
		</h2>
		<form class ="form" method="post" action="newuser.php">
			<label>Enter your User Name:</label>
			<input type="text" name="username" value ="" placeholder="Enter a Username"></input>
			<br />
			<br />
			<label>Enter your First Name:</label>
			<input type="text" name="firstname" value ="" placeholder="Enter your First Name"></input>
			<br />
			<br />
			<label>Enter your Last Name:</label>
			<input type="text" name="lastname" value ="" placeholder="Enter your Last Name"></input>
			<br />
			<br />
			<input type="radio" name="type" id = "R1" value ="0"></input>
			<label FOR="R1">Recruiter</label>
			<input type="radio" name="type" id = "R2" value ="1"></input>
			<label FOR="R2">Applicant</label>
			<br />
			<br />
			<label>Enter Password:</label>
			<input type="password" name="password" value ="" placeholder="Enter password"></input>
			<br />
			<br />
			<label>Enter College Degree:</label>
			<input type="text" name="degree" value ="" placeholder="College Degree"></input>
			<br />
			<br />
			<label>Enter the Position you are Applying for/Current Position:</label>
			<input type="text" name="position" value ="" placeholder="Position"></input>
			<br />
			<br />
			<p>
			<label>Enter your Experience(If Any):</label>
			<textarea id = "experience" name = "experience" rows = "3" cols = "80">  </textarea>
			</p>
			<label>(Note: If you are a recruiter, enter n/a for experience)</label>
			<br />
			<br />
			<button type = "submit" name = "submit" value = "send to database">Submit</button>
		</form>
		<br />
		<br />
		<label>Once accounted is created, Click here to get signed in: </label>
		<form action = "/SoftDev/index.php">
			<input type= "submit" value = "Sign In" />
		</form>	
		
	</body>
</html>

<?php

if(isset($_POST['submit'])){

$username = $_POST['username'];
$password = $_POST['password'];
$type = $_POST['type'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$degree = $_POST['degree'];
$position = $_POST['position'];
$experience = $_POST['experience'];


$sql = "INSERT INTO users (username, password, type, status, firstname, lastname, degree, position, experience, interview)
 VALUES 
 ('$username', '$password', '$type', '0', '$firstname','$lastname', '$degree', '$position' , '$experience', 'n/a')";

 if(mysqli_query($conn, $sql)) {
	 echo "Accounted created successfully!";
	 
 }
 
 else{
	 echo "Error: " . $sql . "<br>" . mysqli_error($conn);
 }

}

?>

