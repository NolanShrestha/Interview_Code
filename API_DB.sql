CREATE DATABASE API_DB;
USE API_DB;

CREATE TABLE Users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(10) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    phone CHAR(10) NOT NULL UNIQUE,
    balance INT
);

CREATE TABLE Payment (
    payment_id INT AUTO_INCREMENT PRIMARY KEY,
    amount INT NOT NULL,
    sender_id INT NOT NULL,
    receiver_id INT NOT NULL,
    transaction_date DATE,
    FOREIGN KEY(sender_id) REFERENCES Users(user_id),
    FOREIGN KEY(receiver_id) REFERENCES Users(user_id)
);

-- DROP DATABASE API_DB;