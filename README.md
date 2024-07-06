# Payment API

This simple API made through PHP and MySQL registers a user, logs them in, updates the user's information and allows the user to make simple finanacial transaction while maintaining data accuracy and security. 

## Table of Content

- Registration
- User details
- Login
- Updating information
- Payment
- Logging out 

## Registration
- Any user can register by providing their information incluing a username, password, account balance and teir phone number.
- Users failing to provide valid information will not be registered.

## User details
- Those users that registered can check their information which is presented in .JSON format.

## Login
- Those users that registered successfully can log in using their credentials.
- Users will not be redirected if they fail to enter their stored username and password.

## Updating information
- Logged in users can update their information by altering data present in (update.php) file.
- Redundancy during update operation will not be recorded. 

## Payment
- Users can send money to specified users.
- If the current balance of user falls below the transaction amount, the transaction will not be recorded and an error will be displayed.
- The payment system ensures atomicity and data consistency.

## Logging out
- Logged in users can logout ensuring that the session gets unset and the existing session gets destroyed.

### Getting Started:
To use this API all you need is a server to run PHP and MySql, make sure you have proper connection with MySql server which is integrated in each file. You can then proceed to clone the project and use it accordingly to your purpose.

