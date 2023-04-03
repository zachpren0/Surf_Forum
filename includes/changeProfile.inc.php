<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST["submit"])){
    $userId = $_SESSION['userid'];
    $sStyle = $_POST["sStyle"];
    $sSpot = $_POST["sSpot"];
    $break = $_POST["break"];

    require_once 'db.inc.php';
    require_once 'functions.inc.php';

    if (emptyProfileChangeInput($userId,$sStyle,$sSpot,$break) !== false) {
        header("location: ../account.php?error=emptyInput&id=".$userId);
        exit();
    }
   
    $stmt = mysqli_stmt_init($conn);
    $sql = "UPDATE `db_10967677`.`USER` SET `sStyle` = ?, `sSpot` = ?, `break` = ? WHERE `USER`.`id` = ?";

    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../account.php?error=stmtfailed&id=".$userId);
    }

    mysqli_stmt_bind_param($stmt, "ssss", $sStyle, $sSpot, $break, $userId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../account.php?id=".$userId);
}
else { 
    header("location: ../account.php?error=noform");
    exit();
}