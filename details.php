<?php
$con = mysqli_connect("127.0.0.1", "root", "", "API_DB");

$username = $_GET['username'];
$password = $_GET['password'];
$number = $_GET['pnum'];
$balance = $_GET['balance'];

if ($con) {
    $sql = "SELECT * FROM Users WHERE username='$username'";
    $result = mysqli_query($con, $sql);
    if ($result) {
        header("Content-Type: JSON");
        while ($row = mysqli_fetch_assoc($result)) {
            $response['username'] = $row['username'];
            $response['password'] = $row['password'];
            $response['number'] = $row['phone'];
            $response['balance'] = $row['balance'];
        }
        echo json_encode($response, JSON_PRETTY_PRINT);
    }
} else {
    echo "Connection error!";
}
