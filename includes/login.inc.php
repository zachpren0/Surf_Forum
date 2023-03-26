<?php 

if (isset($_POST["submit"])){
    $username = $_POST['username'];
    $password = $_POST['pwd'];

    require_once 'includes/dbh.inc.php';
    require_once 'includes/functions.inc.php';

    if (emptyLoginInput($username,$password) !== false) {
        header("location: ../login.php?error=emptyInput");
        exit();
    }

    loginUser($conn,$username,$password);

}
else{
    header("location: ../login.php");
    exit();
}