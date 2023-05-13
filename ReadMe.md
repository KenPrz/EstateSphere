# EstateSphere

This documentation explains the purpose and usage of the PHP code provided. The code is composed of four files, namely `login.php`, `signup.php`, `connection.php`, `logout.php`, and `functions.php`.

# Installation
## To use this PHP code with XAMPP, you can follow the steps below:

1. Download and install XAMPP from the official website [apachefriends.org](https://www.apachefriends.org/index.html).

2. Open the XAMPP control panel and start the Apache and MySQL modules.

3. Place all the PHP files (Login.php, Signup.php, Connection.php, Logout.php, and Functions.php) in the htdocs folder of XAMPP. This folder is typically located in C:\xampp\htdocs.

4. Import the database file (not provided in the code above) into phpMyAdmin by opening a web browser and navigating to http://localhost/phpmyadmin. Create a new database called "estatesphere" and import the SQL file into the database.

5. Once the database has been imported, you can access the login and signup pages by opening a web browser and navigating to http://localhost/Login.php and http://localhost/Signup.php, respectively.

6. To test the functionality of the code, you can create a new user account by filling up the signup form. Once you have created a new user account, you can log in to the system using the login form.

7. To log out of the system, you can click on the "Logout" button, which will redirect you to the Logout.php file and destroy the session.

### Note: Remember to always start the Apache and MySQL modules before testing the code.


# Documentation
## `login.php`
`login.php` is a PHP script that handles user authentication. It checks if the submitted email and password match an entry in the `users` table in the database. If the email and password match, the script sets the `user_id` session variable and redirects the user to the index page. If the email and password do not match, the script outputs an error message.

### Methods:
- `$_SERVER['REQUEST_METHOD']`: Retrieves the request method used to access the page, either "POST" or "GET".
- `mysqli_query($con, $query)`: Performs a query on the database.
- `mysqli_fetch_assoc($result)`: Fetches a result row as an associative array.

### Variables:
- `$email`: A string that represents the user's email.
- `$password`: A string that represents the user's password.
- `$query`: A string that represents the SQL query to execute.
- `$result`: A mysqli result object that contains the results of a query.

## `signup.php`
`signup.php` is a PHP script that handles user registration. It accepts input from the user such as their first name, last name, email address, password, and user type. It then saves this information to the `users` table in the database.

### Methods:
- `mysqli_real_escape_string($con, $string)`: Escapes special characters in a string for use in an SQL statement.
- `mysqli_query($con, $query)`: Performs a query on the database.

### Variables:
- `$firstname`: A string that represents the user's first name.
- `$lastname`: A string that represents the user's last name.
- `$email`: A string that represents the user's email address.
- `$password`: A string that represents the user's password.
- `$usertype`: A string that represents the user's type.

## `connection.php`
`connection.php` is a PHP script that connects to the database. It sets the `$con` variable to be used in other PHP scripts.

### Variables:
- `$servername`: A string that represents the database server's name.
- `$username`: A string that represents the database user's name.
- `$password`: A string that represents the database user's password.
- `$database`: A string that represents the database name.

## `logout.php`
`logout.php` is a PHP script that logs out a user. It unsets the `user_id` session variable and redirects the user to the login page.

### Methods:
- `isset($_SESSION['user_id'])`: Checks if the `user_id` session variable is set.
- `unset($_SESSION['user_id'])`: Unsets the `user_id` session variable.

## `functions.php`
`functions.php` is a PHP script that contains functions used in other PHP scripts.

### Functions:
- `check_login($con)`: Checks if the user is logged in. If the user is not logged in, they are redirected to the login page.