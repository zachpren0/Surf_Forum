<html>
    <body>
<?php

$servername = "localhost";
$username = "10967677";
$password = "10967677";
$dbname = "db_1096767";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    echo "connection failed";
  die("Connection failed: " . $conn->connect_error);
}

echo "<p>connection successful</p>";

// $sql = "SELECT * FROM CATEGORY";
// $result = $conn->query($sql);
// echo "<p>";
// if ($result->num_rows > 0) {
//   // output data of each row
//   while($row = $result->fetch_assoc()) {
//     echo "title: " . $row["category_title"]. "<br>";
//   }
// } else {
//   echo "0 results";
// }
// echo "QUERY SUCCESS";
// echo "</p>"

?>
    </body>
</html>