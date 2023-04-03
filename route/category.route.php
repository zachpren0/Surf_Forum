<?php

session_start();
if(isset($_GET['title']) && isset($_GET['catId'])) {
    $_SESSION['catTitle'] = $_GET['title'];
    $_SESSION['catId'] = $_GET['catId'];
    header('location: ../category.php');
}
else{
    header('location: ../home.php');
}
