<?php
session_start();
require('new-connection.php');



function validate($elem, $min = 2, $max = 11)
{
    foreach ($elem as $key => $value) {
        if (empty($value)) {
            $_SESSION['error-array'][] = $_SESSION[$key . '-error'][] = ucwords($key) . ' should not be empty';
        } else if ($key == 'password') {
            if (strlen($value) < $min) {
                $_SESSION['error-array'][] = $_SESSION[$key . '-error'][] = 'Invalid! ' . $key . " Should contain at least " . $min . " Characters";
            } else if (strlen($value) >= $max) {
                $_SESSION['error-array'][] = $_SESSION[$key . '-error'][] = 'Invalid! ' . $key . " Should not contain more than " . $max . " Characters";
            }
        } else if ($key == 'contact number') {
            if (strlen($value) != 11) {
                $_SESSION['error-array'][] = $_SESSION[$key . '-error'][] = ucwords($key) . ' should Contain 11 digits';
            } else if (ctype_alpha($value)) {
                $_SESSION['error-array'][] = $_SESSION[$key . '-error'][] = ucwords($key) . ' Invalid ' . ucwords($key);
            }
        } else if ($key == 'first name' || $key == 'last name') {
            if (strlen($value) < $min) {
                $_SESSION['error-array'][] = $_SESSION[$key . '-error'][] = 'Invalid! ' . $key . " should contain at least " . $min . " Characters";
            } else if (strlen($value) >= $max) {
                $_SESSION['error-array'][] = $_SESSION[$key . '-error'][] = 'Invalid! ' . $key . " should not contain more than " . $max . " Characters";
            } else if (!ctype_alpha($value)) {
                $_SESSION['error-array'][] = $_SESSION[$key . '-error'][] = ucwords($key) . ' should not Contain Numbers';
            }
        } else if ($key == 'email address') {
            if (!(filter_var($value, FILTER_VALIDATE_EMAIL))) {
                $_SESSION['error-array'][] = $_SESSION[$key . '-error'][] = 'Invalid Email';
            }
        } else if ($key == 'confirm password') {
            if ($_POST['password'] != $value) {
                $_SESSION['error-array'][] = $_SESSION[$key . '-error'][] = 'Confirm Password is not the same!';
            }
        }
    }
}

function registerAccount($fname, $lname, $contact, $email, $password, $salt)
{

    $query = "INSERT INTO users (first_name, last_name, contact_number, email, password, salt, created_at, updated_at)
    VALUES('{$fname['first name']}','{$lname['last name']}','{$contact['contact number']}','{$email['email address']}','$password','$salt',NOW(),NOW())";
    run_mysql_query($query);
}

$_SESSION['error-array'] = array();


if (isset($_POST['register'])) {

    $fname = array('first name' => $_POST['fname']);
    validate($fname, 2, 40);
    $lname = array('last name' => $_POST['lname']);
    validate($lname, 2, 40);
    $contact = array('contact number' => $_POST['contact']);
    validate($contact);
    $email = array('email address' => $_POST['email']);
    validate($email);
    $password = array('password' => $_POST['password']);
    validate($password, 8, 40);
    $cPassword = array('confirm password' => $_POST['confirm_password']);
    validate($cPassword);
    $salt = bin2hex(openssl_random_pseudo_bytes(22));
    $encrypted = md5($password['password'] . $salt);

    registerAccount($fname, $lname, $contact, $email, $encrypted, $salt);
    var_dump($_SESSION['error-array']);
} else if (isset($_POST['login'])) {
    $query = "SELECT * FROM users WHERE email = '{$_POST['log-email']}'";
    $user = fetch_record($query);
    if (!empty($user)) {
        $encrypted = md5($_POST['log-password'] . $user['salt']);
        if ($user['password'] == $encrypted) {
            if ($user['password'] == $encrypted) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['first_name'] = $user['first_name'];
                $_SESSION['logged_in'] = TRUE;
            }
        } else {
            $_SESSION['error-array'][] = $_SESSION['login-error'] = 'Wrong Email/Password';
        }
    }
} else {
    session_destroy();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>


<body>
    <form action="process.php" method="POST">
        <label>
            First Name:
            <input type="text" name="fname">
            <br>
        </label>
        <label>
            Last Name:
            <input type="text" name="lname">
            <br>

        </label>
        <label>
            Contact Number:
            <input type="text" name="contact">
            <br>

        </label>
        <label>
            Email Address:
            <input type="email" name="email">
            <br>

        </label>
        <label>
            Password:
            <input type="password" name="password">
            <br>

        </label>
        <label>
            Confirm Password:
            <input type="password" name="confirm_password">
            <br>

        </label>
        <input type="submit" name="register" value="register">
    </form>

    <form action="process.php" method="POST">
        <label>
            Email Address:
            <input type="email" name="log-email">
            <br>

        </label>
        <label>
            Password:
            <input type="password" name="log-password">
            <br>

        </label>
        <input type="submit" name="login" value="login">
    </form>
</body>

</html>