<?php
	$email = $_POST['email'];
	$password = $_POST['password'];
	$address= $_POST['address'];
	$address2 = $_POST['address2'];
	$city = $_POST['city'];
	$state = $_POST['state'];
  $zip = $_POST['zip'];

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into FormRegistration(email, password, address, address2, city, state, zip) values(?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $email, $password, $address, $address2, $city, $state, $zip);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>
