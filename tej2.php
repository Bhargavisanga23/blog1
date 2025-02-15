<!DOCTYPE html>
<html>
<head>
    <title>Blog Posts</title>
    <link rel="icon" type="images/x-icon" href="https://cdn.logojoy.com/wp-content/uploads/2018/05/30164225/572.png">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:black;
            background-image:url("https://www.pexels.com/photo/1103970/download/");
            background-repeat:no-repeat;
            background-size:cover;
            background-attachment:fixed;
             background-position:center;
            
            margin: 0;
            padding: 20px;
        }

        h1 {
            color:black;
text-align:center;
           
font-size:50px;
        }

        .post {
            color:black;
            border-radius: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }

        .post h2 {
            color:black;
            margin-top: 0;
text-align:center;
font-size:20px;
        }

        .post p {
            color:black;
            margin-bottom: 10px;
            text-align:center;
font-size:10px;
        }
    </style>
</head>
<body>
    <h1>Blog Posts</h1>

    <?php
    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "blog";
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch random data from the "upload" table
    $sql = "SELECT title, content, place, date FROM upload ORDER BY RAND() LIMIT 1";
    $result = $conn->query($sql);

    // Display the data
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='post'>";
            echo "<h2>TITLE:" . $row["title"] . "</h2>";
            echo "<h2>CONTENT:" . $row["content"] . "</h2>";
            echo "<p>Place: " . $row["place"] . "</p>";
            echo "<p>Date: " . $row["date"] . "</p>";
            echo "</div>";
        }
    } else {
        echo "No blog posts found.";
    }

    // Close the connection
    $conn->close();
    ?>
</body>
</html>