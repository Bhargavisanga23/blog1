<?php
$servername = "localhost";
$dbname = "blog";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
else
{
$username = $_POST['username'];

$password = $_POST['password'];
// Prepare the SQL query
$stmt=$conn->prepare("select * from newstream where username=? and password=?");
$stmt->bind_param("ss",$username,$password);
if($stmt->execute())
{
 header("Location:home4.html");
}
else
{
 echo"not success";
}
}
$stmt->close();

$conn->close();
?>