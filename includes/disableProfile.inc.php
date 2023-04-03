<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST["submit"])){
    $profileId = $_POST['profileId'];
    $isEnabled = $_POST['isEnabled'];
    $newState = $_POST['isEnabled']? 0 : 1 ;

    require_once 'db.inc.php';
    require_once 'functions.inc.php';

    if (empty($profileId)) {
        header("location: ../account.php?error=emptyInput");
        exit();
    }
   
    $stmt = mysqli_stmt_init($conn);
    $sql = "UPDATE `db_10967677`.`USER` SET `is_enabled` = ? WHERE `USER`.`id` = ?";

    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../account.php?error=stmtfailed&id=".$profileId);
    }
    mysqli_stmt_bind_param($stmt, "is", $newState , $profileId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../account.php?id=".$profileId);
}
else { 
    header("location: ../account.php?error=noform");
    exit();
}