<?php

if (isset($_POST["submit"])){
 echo "it works";
}
else {
    header("location: ../signup.php");
}