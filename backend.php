<?php
$insert = false;
    // Set connection variables
    if(isset($_POST['username1']))
    {
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);
       echo "hello";
    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    // if (isset($yourArray['username1']))     // Continue with your code
    $username1 = $_POST['username1'];
    $email = $_POST['email'];
    $password = $_POST['password'];
   if($username1!=NULL)
   {
    $conn = new mysqli('localhost','root','','bami');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into bami(username1, email, password ) values(?, ?, ?)");
		$stmt->bind_param("sss", $username1, $email,$password);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
        header("Location: next.html", true, 301);  
          
	}
}
    }

?>
