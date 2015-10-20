<?php
// comment_add.php
include 'mysql.php';

mysqli_safe_query($conn, 'INSERT INTO comments (post_id,name,email,website,content,date) VALUES (%s,%s,%s,%s,%s,%s)', 
    $_GET['id'], $_POST['name'], $_POST['email'], $_POST['website'], $_POST['content'], time());
mysqli_safe_query($conn, 'UPDATE posts SET num_comments=num_comments+1 WHERE id=%s LIMIT 1', $_GET['id']);
redirect('post_view.php?id='.$_GET['id'].'#post-'.mysqli_insert_id($conn));
