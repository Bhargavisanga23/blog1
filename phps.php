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

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $phonenumber = isset($_POST['phonenumber']) ? $_POST['phonenumber'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $confirmpassword = isset($_POST['confirmpassword']) ? $_POST['confirmpassword'] : '';

    // Validate form data
    if (!empty($username) && !empty($email) && !empty($phonenumber) && !empty($password) && !empty($confirmpassword)) {
        // Prepare the SQL query
        $stmt = $conn->prepare("INSERT INTO newstream (username, email, phonenumber, password, confirmpassword) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssiss", $username, $email, $phonenumber, $password, $confirmpassword);

        if ($stmt->execute()) {
            echo "Your record is registered successfully.";
        } else {
            echo "Registration failed. Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Please fill in all the required fields.";
    }
}

$conn->close();
?>
