<nav class="navbar navbar-default navbar-fixed-top">
          <div class="container">
            <a href="index.php" class="myMono" style="font-weight:bolder;border:0px">Home Page</a>/
            <!--a href="/" class="myMono" style="border:0px">blog</a>/
            <a href="/archive" class="myMono" style="border:0px">archive</a-->
<?php
if(!isset($_SESSION['login_user'])){
   echo '<a href="user.php" class="myMono" style="display:inline-block;margin-top:10px" align="right">Login</a>/ ';
   echo '<a href="register.php" class="myMono" style="display:inline-block;margin-top:10px" align="right"> Register</a>';
} else{
    echo '<a href="logout.php" class="myMono" style="display:inline-block;margin-top:10px" align="right">Log Out</a>';
}
?>
          </div>
</nav>

