<?php
// post_view.php
include 'mysql.php';
?>
<html>
    <head>
    <link rel=stylesheet type="text/css" href="css/main.css" async>
    <link rel=stylesheet type="text/css" href="css/bootstrap.min.css" async>
    <link rel=stylesheet type="text/css" href="css/wt1.css" async>
    </head>
<div class=container>
<?php
include 'header.php';
$result = mysqli_safe_query($conn, 'SELECT * FROM posts WHERE id=%s LIMIT 1', $_GET['id']);

if(!mysqli_num_rows($result)) {
    echo 'Post #'.$_GET['id'].' not found';
    exit;
}

$row = mysqli_fetch_assoc($result);
echo '<h2 class="text-center">'.$row['title'].'</h2>';
echo '<p class="text-center"><em class=info>Posted on: '.date('F j<\s\up>S</\s\up>, Y', $row['date']).'</em><br/>';
echo '<em class="info">Posted by: '.$row['author'].'</em></p>';
echo nl2br($row['body']).'<br/>';
echo '<p class="text-right"><em class=info><a href="post_edit.php?id='.$_GET['id'].'">Edit</a> | <a href="post_delete.php?id='.$_GET['id'].'">Delete</a> | <a href="index.php">View All</a></em></p>';

echo '<hr/>';
$result = mysqli_safe_query($conn, 'SELECT * FROM comments WHERE post_id=%s ORDER BY date ASC', $_GET['id']);
echo '<ol id="comments">';
while($row = mysqli_fetch_assoc($result)) {
    echo '<li id="post-'.$row['id'].'">';
    echo (empty($row['website'])?'<strong>'.$row['name'].'</strong>':'<a href="'.$row['website'].'" target="_blank">'.$row['name'].'</a>');
    echo ' (<a href="comment_delete.php?id='.$row['id'].'&post='.$_GET['id'].'">Delete</a>)<br/>';
    echo '<small>'.date('j-M-Y g:ia', $row['date']).'</small><br/>';
    echo nl2br($row['content']);
    echo '</li>';
}
echo '</ol>';
echo <<<HTML
<form method="post" action="comment_add.php?id={$_GET['id']}">
    <table>
        <tr>
            <td><label for="name">Name:</label></td>
            <td><input name="name" id="name" value=/></td>
        </tr>
        <tr>
            <td><label for="email">Email:</label></td>
            <td><input name="email" id="email" value=></td>
        </tr>
        <tr>
            <td><label for="website">Website:</label></td>
            <td><input name="website" id="website" value=/></td>
        </tr>
        <tr>
            <td><label for="content">Comments:</label></td>
            <td><textarea name="content" id="content"></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Post Comment"/></td>
        </tr>
    </table>
</form>
</div>
HTML;

