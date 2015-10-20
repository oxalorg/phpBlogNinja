<?php
session_start();
if(isset($_SESSION['login_user'])){
// post_delete.php
include 'mysql.php';
mysqli_safe_query($conn, 'DELETE FROM posts WHERE id=%s LIMIT 1', $_GET['id']);
mysqli_safe_query($conn, 'DELETE FROM comments WHERE post_id=%s', $_GET['id']);
redirect('index.php');
}
else{
    echo 'Not logged in. You cannot delete.';
}
