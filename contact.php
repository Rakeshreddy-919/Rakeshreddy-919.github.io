<?php
	$name = $_POST['name'];
	$email = $_POST['email'];
    $number = $_POST['number'];
    $textarea = $_POST['textarea'];

	// Database connection
	$conn = new mysqli('localhost','root','','contactus');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into contactus(name,email,number,textarea) values(?, ?, ?, ?)");
		$stmt->bind_param("ssis", $name, $email, $number,$textarea);
		$execval = $stmt->execute();
		echo $execval;
		echo "index.html";
		$stmt->close();
		$conn->close();
	}
?>