<?php
// comment_delete.php
include 'mysql.php';
mysqli_safe_query($conn, 'DELETE FROM comments WHERE id=%s LIMIT 1', $_GET['id']);
mysqli_safe_query($conn, 'UPDATE posts SET num_comments=num_comments-1 WHERE id=%s LIMIT 1', $_GET['post']);
redirect('post_view.php?id='.$_GET['post']);
