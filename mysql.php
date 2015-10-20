<?php

$servername = "localhost";
$dbusername = "root";
$dbpassword = "root";
$database = "wt1";

function mysqli_safe_string($conn, $value) {
    $value = trim($value);
    if(empty($value))           return 'NULL';
    elseif(is_numeric($value))  return $value;
    else                        return "'".mysqli_real_escape_string($conn, $value)."'";
}

function mysqli_safe_query($conn, $query) {
    $args = array_slice(func_get_args(),2);
    foreach ($args as &$a){
        $a = mysqli_safe_string($conn, $a);
    }
    //$args = array_map('mysqli_safe_string',$args);
    return mysqli_query($conn, vsprintf($query,$args));
}

function redirect($uri) {
    header('location:'.$uri);
    exit;
}

// Create connection
$conn = mysqli_connect($servername, $dbusername, $dbpassword, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error($conn));
}

