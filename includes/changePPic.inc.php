<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST["submit"])){
    $userID = $_POST['profileId'];
    $imageFile = $_POST['fileToUpload'];
    
    $contentType = mime_content_type($imageFile); // Get content type of image file
    $imageData = file_get_contents($imageFile); // Read image file contents into variable

    require_once 'db.inc.php';
    require_once 'functions.inc.php';

    if (empty($userID) || empty($imageFile)) {
        header("location: ../account.php?error=emptyInput");
        exit();
    }
   
    $stmt = mysqli_stmt_init($conn);
    $sql = "UPDATE `db_10967677`.`USER` SET `image_url` = ?, `content_type` = ? WHERE `USER`.`id` = ?";

    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../account.php?error=stmtfailed&id=".$userID);
    }
    mysqli_stmt_bind_param($stmt, "bss", base64_encode($imageData), $contentType, $userID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../account.php?id=".$userID);
}
else { 
    header("location: ../account.php?error=noform");
    exit();
}