<html>
    <body>
<?php

$servername = "localhost";
$username = "10967677";
$password = "10967677";
$dbname = "db_10967677";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    echo "connection failed";
  die("Connection failed: " . $conn->connect_error);
}

echo "connection successful";

?>
    </body>
</html>