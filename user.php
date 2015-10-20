<?php
include('login.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login </title>
    <style>
#main {
width:400px;
margin: auto;
}
span {
color:red
}
h2 {
background-color:#FEFFED;
text-align:center;
border-radius:10px 10px 0 0;
margin:-10px -40px;
padding:15px
}
#login {
width:300px;
border-radius:10px;
border:2px solid #ccc;
padding:10px 40px 25px;
margin-top:70px
}
input[type=text],input[type=password] {
width:99.5%;
padding:10px;
margin-top:8px;
border:1px solid #ccc;
padding-left:5px;
font-size:16px;
}
input[type=submit] {
width:100%;
background-color:#FFBC00;
color:#fff;
border:10px solid #FFF;
padding:10px;
font-size:20px;
cursor:pointer;
border-radius:5px;
margin-bottom:15px
}
#profile {
padding:50px;
border:1px dashed grey;
font-size:20px;
background-color:#DCE6F7
}
#logout {
float:right;
padding:5px;
border:dashed 1px gray
}
a {
text-decoration:none;
color:#6495ed
}
i {
color:#6495ed
}
body{
font-family: Consolas, monaco, monospace;
}
    </style>
</head>
<body>
    <div id="main">
        <div id="login">
            <h2>Login Form</h2>
            <form action="" method="post">
                <p>UserName :</p>
                <input id="name" name="username" placeholder="username" type="text">
                <br>
                <p>Password :</p>
                <input id="password" name="password" placeholder="**********" type="password">
                <br>
                <input name="submit" type="submit" value=" Login ">
                <span><?php echo $error; ?></span>
            </form>
        </div>
     </div>
</body>
</html>
