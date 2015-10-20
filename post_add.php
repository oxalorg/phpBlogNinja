<?php
session_start();
echo $_POST['title'];
echo $_SESSION['login_user'];
if(!empty($_POST) && isset($_SESSION['login_user'])) {
    include 'mysql.php';
    if(mysqli_safe_query($conn, 'INSERT INTO posts (title,body,date,author) VALUES (%s,%s,%s,%s)', $_POST['title'], $_POST['body'], time(), $_SESSION['login_user']))
        echo 'Entry posted. <a href="post_view.php?id='.mysqli_insert_id($conn).'">View</a>';
    else{
        echo mysqli_error($conn);
    }
} else
    echo "Error";
include 'header.php'
?>
