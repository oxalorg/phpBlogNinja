<?php
session_start();
$error='';
if(isset($_POST['submit'])){
	if(empty($_POST['username']) || empty($_POST['password'])){
		$error = "Username or Password not set.";
        //echo $error;
	} else {
        $username = $_POST['username'];
        $password = $_POST['password'];

        include 'mysql.php';

        $query =mysqli_safe_query($conn, 'SELECT * FROM login where password=%s AND username=%s', $password, $username);
        //echo "Exit mysqli_safe_query\n";
        $rows = mysqli_num_rows($query);
        echo $rows . "\n";
        if ($rows == 1) {
            $_SESSION['login_user']=$username; // Initializing Session
            header("location: index.php"); // Redirecting To Other Page
        } else {
            $error = "Username or Password is invalid";
            //echo $error;
        }
        mysqli_close($conn); // Closing Connection
        //echo "Connection Closed";
    }
}
?>
