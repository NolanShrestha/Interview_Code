<?php
$con = mysqli_connect("127.0.0.1", "root", "", "API_DB");
$username = $_GET['username'];
$password = $_GET['password'];
$number = $_GET['pnum'];
$balance = $_GET['balance'];
$hashed = password_hash($password, PASSWORD_DEFAULT);
if ($con) {

    if (!preg_match("/^[a-z]{5,10}$/", $username)) {
        echo "Username is not valid";
        echo "<br>";
    } else if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/", $password)) {
        echo "Password in not valid";
        echo "<br>";
    } else if (!preg_match("/^[0-9]{10}$/", $number)) {
        echo "Phone number is not valid";
        echo "<br>";
    } else {
        echo "Form submitted successfully! \n";
        echo "<br>";
    }
    $sql = "INSERT INTO Users(username,password,phone,balance)
        VALUES ('$username', '$hashed', '$number','$balance')";
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "Data inserted successfully!";
?>
        <a href="login.php?username=james&password=james@123&balance=250">Login</a>
        <a href="details.php?username=james&password=james@123&pnum=9851048447&balance=250">Details</a>
<?php
    } else {
        echo "Failed to insert data!";
    }
} else {
    echo "Connection error!";
}
?>