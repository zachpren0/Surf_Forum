<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once 'includes/db.inc.php';
include_once 'includes/functions.inc.php';


echo '<div class="col-3 gx-5">';
echo '<div class="row bg-beige1 rounded-top">';
echo '<h3 class="display-7 text-center">Categories</h1>';
echo '</div>';
echo '<div class="row bg-beige3 rounded-bottom min-vh-100">';
echo '<ul class="nav flex-column">';

//start category list

$sql = "SELECT * FROM CATEGORY";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
    echo '<li class="nav-item">';
    echo '<a class="nav-link active" aria-current="page" href="category.php?title='.$row['title'].'&catId='.$row['category_id'].'">'.$row['title'].'</a>';
    echo '</li>';
}
} else {
echo "No categories found";
}

//end category list

echo '</ul>';
echo '</div>';
echo '</div>';
?>