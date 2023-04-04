<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST["submit"])){
    $userId = $_SESSION['userid'];
    $profileId = $_POST["profileId"];

    require_once 'db.inc.php';
    require_once 'functions.inc.php';

    if (empty($userId) || empty($profileId)) {
        header("location: ../account.php?error=emptyInput&id=".$userId);
        exit();
    }
   
    $stmt = mysqli_stmt_init($conn);
    $sql = "DELETE FROM `db_10967677`.`USER` WHERE `USER`.`id` = ?";

    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../account.php?error=stmtfailed&id=".$userId);
    }

    mysqli_stmt_bind_param($stmt, "s", $profileId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    unset($_SESSION['userid']);
    header("location: ../home.php");
}
else { 
    header("location: ../account.php?error=noform");
    exit();
}