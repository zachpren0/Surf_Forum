<?php 


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST["submit"])){

    $username = $_POST['username'];

    $password = $_POST['password'];

   

    require_once 'db.inc.php';
    require_once 'functions.inc.php';

   

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