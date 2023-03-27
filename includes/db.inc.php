
        <?php


        //COSC 360 CONNECTION
        
        $servername = "localhost";
        $dbUsername = "10967677";
        $dbPassword = "10967677";
        $dbname = "db_10967677";
        

        //LOCALHOST TESTING
        /*
        $servername = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbname = "db_10967677";
        */

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection

        /*
        if ($conn->connect_error) {
            echo "connection failed";
        die("Connection failed: " . $conn->connect_error);
        }*/
        

        if(!$conn) {
            die("Connection Failed" . mysqli_connect_error());
        }


        //test code to be deleted
        //confirmed this works
        /*
        
        echo "<p>connection successful</p>";

        $sql = "SELECT * FROM CATEGORY";
        $result = $conn->query($sql);
        echo "<p>";
        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "title: " . $row["category_title"]. "<br>";
        }
        } else {
        echo "0 results";
        }
        echo "</p>";
        */
    