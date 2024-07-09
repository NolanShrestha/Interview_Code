<?php
session_start();
$con = mysqli_connect("127.0.0.1", "root", "", "API_DB");

$name = $_SESSION['username'];
$balance = $_SESSION['balance'];

$amount = $_GET['amount'];
$sender_id;
$receiver_id = $_GET['receiver_id'];
$transaction_date = $_GET['transaction_date'];

if ($con) {

    $sql = "SELECT user_id FROM Users WHERE username='$name'";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            $sender_id = $row['user_id'];
        }
    }
    $sql = "SELECT * FROM Users WHERE user_id='$sender_id'";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        if (!$row) {
            echo "Sender doesn't exist!";
        } else if ($row['balance'] < $amount) {
            echo "Insufficient balance!";
        } else {

            $sql = "SELECT * FROM Users WHERE user_id='$receiver_id'";
            $result = mysqli_query($con, $sql);
            if ($result) {
                $row = mysqli_fetch_assoc($result);
                if (!$row) {
                    echo "Receiver doesn't exist!";
                } else {
                    mysqli_begin_transaction($con);
                    $sql = "UPDATE Users SET balance=balance-'$amount' WHERE user_id='$sender_id'";
                    $result = mysqli_query($con, $sql);

                    if ($result) {

                        $sql = "INSERT INTO Payment(amount, sender_id, receiver_id, transaction_date) 
                                              VALUES ('$amount', '$sender_id', '$receiver_id', '$transaction_date')";
                        $result = mysqli_query($con, $sql);

                        if ($result) {

                            $sql = "UPDATE Users SET balance=balance+'$amount' WHERE user_id='$receiver_id'";
                            $result = mysqli_query($con, $sql);

                            if ($result) {
                                mysqli_commit($con);
                                echo "Transaction successful!";
                            } else {
                                mysqli_rollback($con);
                            }
                        } else {
                            mysqli_rollback($con);
                            echo "Transaction error!";
                        }
                    } else {
                        mysqli_rollback($con);
                    }
                }
            } else {
                echo "Error fetching receiver information!";
            }
        }
    } else {
        echo "Error fetching sender information!";
    }

    mysqli_commit($con);
} else {
    echo "Connection error!";
}
