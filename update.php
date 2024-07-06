<?php
session_start();
$con = mysqli_connect("127.0.0.1", "root", "", "API_DB");

$name = $_SESSION['username'];

$uname = "nischal";
$upassword = "nischal@19";
$unumber = 9865455929;
$uhashed = password_hash($upassword, PASSWORD_DEFAULT);

if ($con) {
    $sql = "UPDATE Users SET username='$uname', password='$uhashed' ,phone=$unumber WHERE username='$name'";
    $result = mysqli_query($con, $sql);
    if ($result) {
        echo "Record updated successfully";
    } else {
        echo "Failed to update record";
    }
} else {
    echo "Connection error!";
}
