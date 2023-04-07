<?php 

require_once 'db.inc.php';
require_once 'functions.inc.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST["submit"])){
    $username = $_POST["username"];
    $oldpw = $_POST["oldpw"];
    $passwordnew = $_POST["newpw"];
    $passwordnewRepeat = $_POST["newpwrepeat"];
    $id = $_POST["userID"];

    debug_to_console($username);
    debug_to_console($oldpw);
    debug_to_console($passwordnew);
    debug_to_console($passwordnewRepeat);

    if (passwordMatch($passwordnew,$passwordnewRepeat) !== false) {
        header("location: ../account.php?reset=passwordMatch&id=".$id."");
        exit();
    }

    resetPassword($conn, $username, $username, $oldpw, $passwordnew,$id);


}
