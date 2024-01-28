<?php
session_start();
require('new-connection.php');

function logValidate($elem, $min = 8, $max = 40)
{
    foreach ($elem as $key => $value) {
        if (empty($value)) {
            $_SESSION['error-array'][] = $_SESSION['log-' . $key . '-error'][] = ucwords($key) . ' should not be empty';
        } else if ($key == 'email address') {
            if (!(filter_var($value, FILTER_VALIDATE_EMAIL))) {
                $_SESSION['error-array'][] = $_SESSION['log-' . $key . '-error'][] = 'Invalid Email';
            }
        } else if ($key == 'password') {
            if (strlen($value) < $min) {
                $_SESSION['error-array'][] = $_SESSION['log-' . $key . '-error'][] = 'Invalid! ' . $key . " should contain at least " . $min . " Characters";
            } else if (strlen($value) >= $max) {
                $_SESSION['error-array'][] = $_SESSION['log-' . $key . '-error'][] = 'Invalid! ' . $key . " should not contain more than " . $max . " Characters";
            }
        }
    }
}

function validate($elem, $min = 2, $max = 11)
{
    foreach ($elem as $key => $value) {
        if (empty($value)) {
            $_SESSION['error-array'][] = $_SESSION[$key . '-error'][] = ucwords($key) . ' should not be empty';
        } else if ($key == 'password') {
            if (strlen($value) < $min) {
                $_SESSION['error-array'][] = $_SESSION[$key . '-error'][] = 'Invalid! ' . $key . " should contain at least " . $min . " Characters";
            } else if (strlen($value) >= $max) {
                $_SESSION['error-array'][] = $_SESSION[$key . '-error'][] = 'Invalid! ' . $key . " should not contain more than " . $max . " Characters";
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
    $_SESSION['reg-suc'] = 'Registered Successfully';
    header('Location: Authentication.php');
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

    if (!empty($_SESSION['error-array'])) {
        header('Location: Authentication.php');
        die();
    } else {
        $salt = bin2hex(openssl_random_pseudo_bytes(22));
        $encrypted = md5($password['password'] . $salt);
        registerAccount($fname, $lname, $contact, $email, $encrypted, $salt);
    }
} else if (isset($_POST['login'])) {
    $email = array('email address' => $_POST['log-email']);
    logValidate($email);
    $password = array('password' => $_POST['log-password']);
    logValidate($password, 8, 40);

    if (!empty($_SESSION['error-array'])) {
        header('Location: Authentication.php');
        die();
    } else {
        $query = "SELECT * FROM users WHERE email = '{$_POST['log-email']}'";
        $user = fetch_record($query);
        if (!empty($user)) {
            $encrypted = md5($_POST['log-password'] . $user['salt']);
            if ($user['password'] == $encrypted) {
                if ($user['password'] == $encrypted) {
                    $_SESSION['user_id'] = $user['user_id'];
                    $_SESSION['first_name'] = $user['first_name'];
                    $_SESSION['logged_in'] = TRUE;
                    header('Location: success.php');
                }
            } else {
                $_SESSION['error-array'][] = $_SESSION['log-email address-error'][] = 'Wrong Email/Password';
                $_SESSION['error-array'][] = $_SESSION['log-password-error'][] = 'Wrong Email/Password';
                header('Location: Authentication.php');
            }
        } else {
            $_SESSION['error-array'][] = $_SESSION['log-email address-error'][] = 'Wrong Email/Password';
            $_SESSION['error-array'][] = $_SESSION['log-password-error'][] = 'Wrong Email/Password';
            header('Location: Authentication.php');
        }
    }
} else if (isset($_POST['contact-submit'])) {
    $contact = array('contact number' => $_POST['contact-forget']);
    validate($contact);

    if (!empty($_SESSION['error-array'])) {
        header('Location: forgot.php');
        die();
    } else {
        $salt = bin2hex(openssl_random_pseudo_bytes(22));
        $encrypted = md5('village88' . $salt);
        $selQuery = "SELECT * FROM users WHERE contact_number = '{$_POST['contact-forget']}'";
        $updateQuery = "UPDATE users SET password = '$encrypted', salt ='$salt' WHERE (contact_number = '{$_POST['contact-forget']}')";
        if (!empty(fetch_all($selQuery))) {
            run_mysql_query($updateQuery);
            $_SESSION['reg-suc'] = 'Password is now village88';
            header('Location: forgot.php');
            die();
        } else {
            $_SESSION['contact number-error'][] = 'Contact Number is not Existing';
            header('Location: forgot.php');
            die();
        }
    }
} else {
    session_destroy();
    header('Location: Authentication.php');
    die();
}
