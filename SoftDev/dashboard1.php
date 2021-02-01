<?php
include("connect.php");
session_start();
?>
<?php


	//$sql = 'SELECT  id,username,password FROM users WHERE id= \'' . $_SESSION['id']. '\' ';
	$sql = 'SELECT  id,username,password,type,status,firstname,lastname,degree,position,experience FROM users WHERE id= \'' . $_SESSION['id']. '\' ';
	$result = $conn->query($sql);
	//var_dump($result);

	
	
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- StyleSheets-->
		<link href="css/style.css" rel="stylesheet"/>
		
		
		<title>
			CSC 481 - Recruiter Homepage
		</title><!--tab name -->
	</head>
	<body>
		<h1>Welcome Recruiter! </h1>
		
<?php
			if ($result->num_rows > 0) {	
		?>
<?php
						// output data of each row
						//var_dump($row);
						while($row = $result->fetch_assoc()) {
						?>
						
						
						<p>
						
						Name: <?php echo $row['firstname'] . " " . $row['lastname']; ?>
						<br>
						Degree: <?php echo $row['degree']; ?>
						<br>
						Position: <?php echo $row['position']; ?>
						
					 </p>

<?php
						}
			}
		
		?>
		
		
		
		
		
		
		
		<h2> List of Users </h2>
		<?php
		$sql = 'SELECT  * FROM users WHERE type = 1 ';
	
		$result = $conn->query($sql);
		
		
			if ($result->num_rows > 0) {	
		?>
				
				<ul>
					
						<?php
						// output data of each row
						//var_dump($row);
						while($row = $result->fetch_assoc()) {
						?>
						<li><?php echo "Username: " .' ' . $row['username']. "; Full Name: " . $row['firstname'] . ' ' .  $row['lastname'] .  '; Type of User: '; if($row['type'] == 0){ echo "Recruiter";}  if($row['type'] == 1){ echo "Applicant";} ?> 
						<a href="checkStatus.php?id=<?php echo $row['id']; ?>"><button>Check Status</button></a> 
						</li>
						<?php
						
						}
						?>
							
				</ul>
		<?php
				
			}
		
		?>
	



	
	<h2> Available Jobs </h2>
	
		<?php
		
		$sql = 'SELECT  * FROM available_jobs';
		$result = $conn->query($sql);
			if ($result->num_rows > 0) {	
		?>
				
				<ul>
					
						<?php
						// output data of each row
						//var_dump($row);
						while($row = $result->fetch_assoc()) {
						?>
						<li><?php echo "Name of Job: " .' ' . $row['name'] . "; Description: " . $row['description']; ?> 
						
						<?php
						}
						?>
							
				</ul>
		<?php
				
			}
		
		?>
		<br />
		
		<form action = "/SoftDev/newjob.php">
			<input type= "submit" value = "Create New Job" />
		</form>	
		<br />
		<form action = "/SoftDev/index.php">
			<input type= "submit" value = "Logout" />
		</form>	
		
		
	</body>
</html>