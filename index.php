<?php
session_start();
include 'header.php';
?>
<!DOCTYPE html>
<html>
<head>
    <link rel=stylesheet type="text/css" href="css/main.css" async>
    <link rel=stylesheet type="text/css" href="css/bootstrap.min.css" async>
    <link rel=stylesheet type="text/css" href="css/wt1.css" async>
    <style>
        h3{
        color: #407940;
        }
    </style>
</head>
<body>
<div class=container>
<h1 class="text-center"> Blogger Arena </h1>
<?php
if(isset($_SESSION['login_user'])){
?>
    <div id="addpostbox">
    <form name="addpost" id="addpostid" method="POST" action="post_add.php">
        <input id="title" name="title" placeholder="Title" type="text">
        <br>
        <input id="body" name="body" placeholder="Body" type="text">
        <br>
        <input name=submit type=submit value="Add post">
        <br>
    </form>
    </div>
<?php
}
include 'mysql.php';

$result = mysqli_safe_query($conn, 'SELECT * FROM posts ORDER BY date DESC');

if(!mysqli_num_rows($result)) {
    echo 'No posts yet.';
} else {
    while($row = mysqli_fetch_assoc($result)) {
        echo '<hr/>';
        echo '<div class=post>';
        echo '<h3 class="text-center">'.$row['title'].'</h3>';
        $body = substr($row['body'], 0, 300);
        echo nl2br($body).'...<br/>';
        echo '<div class="text-right info">';
        echo '<em><a href="post_view.php?id='.$row['id'].'">Read More</a> | ';
        echo '<a href="post_view.php?id='.$row['id'].'#comments">'.$row['num_comments'].' comments</a></em>';
        echo '</div>';
        echo '</div>';
    }
}
?>
</div>
</body>
</html>
