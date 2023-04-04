<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST["submit"])){
    $userId = $_SESSION['userid'];
    $ppicURL = $_POST['ppicURL'];

    require_once 'db.inc.php';
    require_once 'functions.inc.php';

    if (empty($userId) || empty($ppicURL)) {
        header("location: ../account.php?error=emptyInput");
        exit();
    }
   
    $stmt = mysqli_stmt_init($conn);
    $sql = "UPDATE `db_10967677`.`USER` SET `image_url` = ? WHERE `USER`.`id` = ?";

    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../account.php?error=stmtfailed&id=".$userID);
    }
    mysqli_stmt_bind_param($stmt, "ss", $ppicURL, $userId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../account.php?id=".$userId);
}
else { 
    header("location: ../account.php?error=noform");
    exit();
}