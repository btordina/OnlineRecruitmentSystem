<?php
include("connect.php");
session_start();
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- StyleSheets
		<link href="css/style.css" rel="stylesheet"/> -->
		
		
		<title>
			CSC 481 Online Recruitment System
		</title><!--tab name -->
	</head>
	<body>
	
		<h2>
		Online Recruitment System, Ver 2 Alpha		
		</h2>
		<p>Welcome to the Online Recruitment System. "Not interested." - Cloud</p>
	
		<form class ="form" method="post" action="index.php">
			<input type="text" name="username" value ="" placeholder="Enter a Username"></input>
			<br />
			<br />
			<input type="password" name="password" value ="" placeholder="Enter password"></input>
			<br />
			<br />
			<input type="submit" value="Login"></input>
			<br />
			<br />
		</form>
		<label>New User? Click here</label>
		<form action = "/SoftDev/newuser.php">
			<input type= "submit" value = "Create New User" />
		</form>	
		
	</body>
</html>

<?php

if(!empty($_POST)){
	
	$username = $_POST['username'];
	$password = $_POST['password'];

	
	
	$sql = 'SELECT  id,username,password,type FROM users WHERE username= \'' . $username . '\' AND password =  \'' . $password . '\' ';
	//$sql = 'SELECT  * FROM user';
	
	$result = $conn->query($sql);
	//var_dump($result);

	if ($result->num_rows > 0) {
		// output data of each row
		//var_dump($row);
		while($row = $result->fetch_assoc()) {
			//echo "id: " . $row["id"]. " - Name: " . $row["username"]. " " . $row["password"]. "<br>";
			
			if($row['username'] === $username and $row['password'] === $password){
				
				if($row['type'] == 0){
				$_SESSION['id'] = $row[id];
				header("Location: dashboard1.php?id=$row[id]"); 
				}
				if($row['type'] == 1){
				$_SESSION['id'] = $row[id];
				header("Location: dashboard2.php?id=$row[id]");	
					
				}
			}
			
			
		}
	} else {
		?>
		<p style="color: red;">
		<?php
		
			echo "Username/Password incorrect";
		?>
		</p>
		
		<?php
	}
	
	
	$conn->close();
	
	
	
}





?>