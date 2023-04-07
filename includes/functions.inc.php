<?php
  

    function debug_to_console($data) {
        $output = $data;
        if (is_array($output))
            $output = implode(',', $output);
    
        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }

//signup functions

function emptySignupInput($email,$username,$password,$password2) {
    $result;

    

    if ( empty($email) || empty($username) || empty($password) || empty($password2) ){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
function invalidUid($username) {
    $result;
    if (!preg_match("/^[a-zA-Z0-9_]*$/", $username)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
function invalidEmail($email) {
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
function passwordMatch($password,$password2){
    $result;
    if ($password !== $password2){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function uidExists($conn, $username, $email){
    // prepare a statement to query the database for the username
    $stmt = mysqli_stmt_init($conn);
    $sql = "SELECT * FROM USER WHERE username=? OR email = ?;";

    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtFailed");
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    
    if ($row = mysqli_fetch_assoc($result)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }
  mysqli_stmt_close($stmt);
}

function createUser($conn,$email,$username,$password){
    // prepare a statement to query the database for the username
    $stmt = mysqli_stmt_init($conn);
    $sql = "INSERT INTO USER (username, password_hash, email, image_url) VALUES (?,?,?,?);";

    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtFailed");
    }

    $default_url = "https://as1.ftcdn.net/v2/jpg/05/74/65/48/1000_F_574654895_DzrGLRsENvLdhr3wwcmYjivaHAK3x331.jpg";

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $username, $hashedPassword, $email, $default_url);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../login.php?message=congrats");
    exit();
  
}


//login functions
function emptyLoginInput($username,$password) {
    $result;

    debug_to_console($username);
    debug_to_console($password);

    if ( empty($username) || empty($password)  ){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function loginUser($conn,$username,$password){

    $uidExists = uidExists($conn, $username, $username);

    if ($uidExists === false){
        header("location: ../login.php?error=wrongLogin");
        exit();
    }

    if (!$uidExists['is_enabled']) {
        header("location: ../login.php?error=disabled");
        exit();
    }

    $passwordHashed = $uidExists["password_hash"];

    $checkPassword = password_verify($password,$passwordHashed);

    if ( $checkPassword === false) {
        header("location: ../login.php?error=wrongLogin");
        exit();
    } else if ($checkPassword === true){
        session_start();
        $_SESSION["userid"] = $uidExists["id"];
        $_SESSION["username"] = $uidExists["username"];
        
       if ($uidExists["is_admin"] !== 1){
            header("location: ../home.php");
            exit();
        }
        else{
            $_SESSION["admin"] = $uidExists["is_admin"];
            header("location: ../home.php");
            exit();
        }
    }


}

//post creation
function emptyPostInput($categoryId,$categoryName,$newPostTitle,$newPostBody) {
    $result;
    if ( empty($categoryId) || empty($categoryName) || empty($newPostTitle) || empty($newPostBody) ){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

//delete
function delete ($conn, $sql, $deleteId){
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../post.php?error=stmtFailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $deleteId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}
//comment creation
function emptyCommentInput($postId,$postName,$newCommentBody) {
    $result;
    if ( empty($postId) || empty($postName) || empty($newCommentBody) ){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function emptyProfileChangeInput($userId,$sStyle,$sSpot,$break) {
    $result;
    if ( empty($userId) || empty($sStyle) || empty($sSpot) || empty($break) ){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function fetchUserById($conn, $userId) {
    $stmt = mysqli_stmt_init($conn);
    $sql = "SELECT * FROM `USER` WHERE id=?";
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../account.php?error=stmtFailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $userId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if(mysqli_num_rows($result) > 1) {
        die("database error, too many return values" . mysqli_connect_error());
    }
    $row = $result->fetch_assoc();
    mysqli_stmt_close($stmt);
    return $row;
}

function getCategoryTitle($postId, $conn) {
    // Prepare a SQL query to fetch the category title for the given post ID
    $query = "SELECT c.title FROM CATEGORY c INNER JOIN POST p ON c.category_id = p.category_id WHERE p.post_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $postId);
    
    // Execute the query and fetch the result
    $stmt->execute();
    $stmt->bind_result($categoryTitle);
    $stmt->fetch();

   
    $_SESSION['catTitle'] = $categoryTitle;
    
    // Return the category title
    return $categoryTitle;
  }

  function getPostBody($postId, $conn) {
    // Prepare a SQL query
    $query = "SELECT body FROM POST WHERE post_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $postId);
    
    // Execute the query and fetch the result
    $stmt->execute();
    $stmt->bind_result($postBody);
    $stmt->fetch();

    
    // Return
    return $postBody;
  }

  function resetPassword($conn, $username, $email, $oldPassword, $newPassword,$id){
    // check if the user exists
    $user = uidExists($conn, $username, $email);

    if (!$user){
        header("location: ../account.php?reset=wrongUsername&id=".$id."");
        exit();
    }

    // check if the old password matches
    if (!password_verify($oldPassword, $user['password_hash'])){

        header("location: ../account.php?reset=wrongPassword&id=".$id."");
        exit();
    }

    // generate a new password hash
    $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);

    // update the user's password hash in the database
    $stmt = mysqli_stmt_init($conn);
    $sql = "UPDATE USER SET password_hash=? WHERE id=?";

    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../account.php?reset=stmtError&id=".$id."");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "si", $newPasswordHash, $user['id']);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    header("location: ../account.php?reset=success&id=".$id."");
        exit();

    
}