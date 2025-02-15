<!DOCTYPE html>
<html>
<head>
    <title>Blog Posts</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: black;
            padding: 20px;
        }

        h1 {
            color: white;
            text-align: center;
            font-size: 50px;
        }

        .container {
            display: flex;
            align-items: center;
        }

        .logo {
            margin-right: 20px;
        }

        .posts {
            flex: 1 1 auto;
        }

        .post {
            color: black;
            border-radius: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }

        .post h2 {
            color: black;
            margin-top: 0;
            text-align: center;
            font-size: 20px;
        }

        .post p {
            color: black;
            margin-bottom: 10px;
            text-align: center;
            font-size: 10px;
        }
    </style>
</head>
<body>
    <h1>Blog Posts</h1>
    <div class="container">
        <div class="logo">
            <img src="https://media.istockphoto.com/id/1369150014/vector/breaking-news-with-world-map-background-vector.jpg?s=612x612&w=0&k=20&c=9pR2-nDBhb7cOvvZU_VdgkMmPJXrBQ4rB1AkTXxRIKM=" style="width:150px;height:150px;border-radius:50%;">
        </div>
        <div class="posts">
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
        </div>
    </div>
</body>
</html>
