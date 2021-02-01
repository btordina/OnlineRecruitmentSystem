<?php
include("connect.php");
session_start();
?>


<?php

$sql = 'SELECT  id,username,password,type,status,firstname,lastname,degree,position,experience,interview FROM users WHERE id= \'' . $_SESSION['id']. '\' ';

$result = $conn->query($sql);


?>

<!DOCTYPE html>
<html>
<head>
<title>Applicant Homepage</title>
</head>
<body>

<h1>Welcome Applicant!</h1>
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
						Position applying for: <?php echo $row['position']; ?>
						<br>
						Experience: <?php echo $row['experience']; ?>
						<br>
						Interview Date: <?php echo $row['interview']; ?>
						<br>
						Current Application Status: <?php if($row['status'] == 0){ echo "Pending...";}  if($row['status'] == 1){ echo "Rejected";} if($row['status'] == 2){ echo "Accepted";}}?> </p>

<?php
				
			}
		
		?>
		
		
		<h2>Currently Available Jobs </h2>
	
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
		
		

		
		
		
		<p>Upload your resume here. Please ensure you only use PDF, DOCX, or DOC files when submitting, no less than 10MB. <br>
		Please make sure to name resumes with the following format: username_resume.pdf <br>
		For Example: ZODIAK_resume.docx</p>
		
		<form action="dashboard2.php" method="post" enctype="multipart/form-data">
    Upload Resume:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Submit" name="submit">
</form>



<?php

if(isset($_POST["submit"])) {
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check file size
if ($_FILES["fileToUpload"]["size"] > 10000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "doc" && $imageFileType != "docx"
&& $imageFileType != "pdf" ) {
    echo "Sorry, only DOC, DOCX & PDF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}



}
?>
		
		<br>
		<br>
<form action = "/SoftDev/index.php">
			<input type= "submit" value = "Logout" />
		</form>	

</body>
</html>