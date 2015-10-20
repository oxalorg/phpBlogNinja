<?php
if(isset($_SESSION['login_user'])){
?>
    <div id="addpostbox">
    <form name="addpost" method="POST" action="post_add.php">
        <input id="title" name="title" placeholder="Title" type="text">
        <br>
        <input id="body" name="body" placeholder="Body" type="text">
        <br>
        <input name=submit type=submit value=addpost>
        <br>
    </form>
<?php
}
?>
