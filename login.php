<?php
session_start();

$con = mysqli_connect("127.0.0.1", "root", "", "API_DB");

$username = $_GET['username'];
$password = $_GET['password'];
$balance = $_GET['balance'];
$hashed = password_hash($password, PASSWORD_DEFAULT);

if ($con) {
    $sql = "SELECT * FROM Users WHERE username='$username'";
    $result = mysqli_query($con, $sql);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {

            if ($username !== $row['username']) {
                echo "Username Incorrect";
            } else if (password_verify($password, $row['password'])) {
                echo "Logged in";
                $_SESSION['username'] = $username;
                $_SESSION['balance'] = $balance;
?>
                <a href="update.php">Update</a>
                <a href="payment.php?amount=250&receiver_id=3&transaction_date=2024:07:05">Payment</a>
                <a href="logout.php">Logout</a>
<?php
            } else {
                echo "Wrong info";
            }
        }
    } else {
        echo "User not found";
    }
} else {
    echo "Connection error!";
}
?>