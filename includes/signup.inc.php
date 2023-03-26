<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST["submit"])){
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["pwd"];
    $password2 = $_POST["pwd2"];
    

    require_once 'db.inc.php';
    require_once 'functions.inc.php';

    
    

    if (emptySignupInput($email,$username,$password,$password2) !== false) {
        header("location: ../signup.php?error=emptyInput");
        exit();
    }
    if (invalidUid($username) !== false) {
        header("location: ../signup.php?error=invalidUid");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("location: ../signup.php?error=invalidEmail");
        exit();
    }
    if (passwordMatch($password,$password2) !== false) {
        header("location: ../signup.php?error=passwordMatch");
        exit();
    }
    
    if (uidExists($conn, $username, $email) !== false) {
        header("location: ../signup.php?error=usernameTaken");
        exit();
    }
   


    createUser($conn,$email,$username,$password);

}
else {
    header("location: ../signup.php");
    exit();
}