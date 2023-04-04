<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'db.inc.php';
require_once 'functions.inc.php';

debug_to_console('hello');

// includes/deletePost.inc.php
if(isset($_GET['post_id'])) {
    // retrieve the post ID from the GET parameter
    $deleteId = $_GET['post_id'];

    debug_to_console($deleteId);

    
    // delete the row from the database
    
    $sql = "DELETE FROM POST WHERE post_id=?;";
    delete($conn, $sql, $deleteId);
    // redirect the user to the post page
    header("location: ../category.php?delete=success");
    exit();
} 
else {
    // if the post ID is not set, redirect the user to the post page
    header("location: ../category.php?error=idNotSet");
    exit();
}