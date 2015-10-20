<?php
session_start();

if(isset($_POST['login_user'])){
    redirect(index.php);
}

function addUser($conn, $username, $password){
    if($query = mysqli_safe_query($conn, 'INSERT into login (username, password) VALUES (%s, %s)', $username, $password)){
        echo "<script type='javascript'>alert('Registered sucessfully.');</script>";
        redirect('user.php');
    }
    else {
        echo "ERROR";
    }
}

if(isset($_POST['submit'])){
    $error = "";
    if(empty($_POST['username'])|| empty($_POST['password'])){
        $error = "Username or Password not set";
        echo $error;
    } else{
        $username = $_POST['username'];
        $password = $_POST['password'];

        include 'mysql.php';
        $query = mysqli_safe_query($conn, 'SELECT username FROM login');
        $rows = mysqli_num_rows($query);

        if($rows == 0){
            addUser($conn, $username, $password);
        }
        while ($row = mysqli_fetch_assoc($query)){
            if($username == $row['username']){
                echo $row['username'];
                echo "<p>This username is not available.</p>";
                die();
            }
        }
        addUser($conn, $username, $password);
    }
    mysqli_close($conn);
}
?>

<!DOCTYPE HTML>
<html>
    <head>

    </head>
<body>
    <div class="container">
    <form name="register" method="POST">
        <p> Username </p>
        <input type="text" name="username" required><br>
        <p> Password </p>
        <input type="text" name="password" required><br>
        <input type="submit" name="submit" value="Register">
    </form>
    </div>
</body>
</html>
