<?php
session_start();
if(!isset($_SESSION['login_user'])){
    echo 'Not logged in.';
    die();
}
include 'mysql.php';

if(!empty($_POST)) {
    if(mysqli_safe_query($conn, 'UPDATE posts SET title=%s, body=%s, date=%s WHERE id=%s', $_POST['title'], $_POST['body'], time(), $_GET['id']))
        redirect('post_view.php?id='.$_GET['id']);
    else
        echo mysql_error();
}

$result = mysqli_safe_query($conn, 'SELECT * FROM posts WHERE id=%s', $_GET['id']);

if(!mysqli_num_rows($result)) {
    echo 'Post #'.$_GET['id'].' not found';
    exit;
}

$row = mysqli_fetch_assoc($result);

echo <<<HTML
<form method="post">
    <table>
        <tr>
            <td><label for="title">Title</label></td>
            <td><input name="title" id="title" value="{$row['title']}" /></td>
        </tr>
        <tr>
            <td><label for="body">Body</label></td>
            <td><textarea name="body" id="body">{$row['body']}</textarea></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Save"/></td>
        </tr>
    </table>
</form>
HTML;
