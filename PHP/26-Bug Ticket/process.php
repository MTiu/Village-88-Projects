<?php
session_start();

$_SESSION['error-array'] = array();

if (empty($_POST['date'])) {
    $_SESSION['error-array'][] = $_SESSION['date-error'] = 'Invalid Date';
}
if (empty($_POST['first-name'])) {
    $_SESSION['error-array'][] = $_SESSION['fname-error'][] = 'First Name should not be empty';
} else if (strlen($_POST['first-name']) <= 2) {
    $_SESSION['error-array'][] = $_SESSION['fname-error'][] = 'Invalid First name';
} else if (is_numeric($_POST['first-name'])) {
    $_SESSION['error-array'][] = $_SESSION['fname-error'][] = 'First Name should not only Contain Numbers';
}
if (empty($_POST['last-name'])) {
    $_SESSION['error-array'][] = $_SESSION['lname-error'][] = 'Last Name should not be empty';
} else if (strlen($_POST['last-name']) <= 2) {
    $_SESSION['error-array'][] = $_SESSION['lname-error'][] = 'Invalid Last name';
} else if (is_numeric($_POST['last-name'])) {
    $_SESSION['error-array'][] = $_SESSION['lname-error'][] = 'Last Name should not only Contain Numbers';
}
if (empty($_POST['email'])) {
    $_SESSION['error-array'][] = $_SESSION['email-error'][] = 'Email should not be empty';
} else if (!(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))) {
    $_SESSION['error-array'][] = $_SESSION['email-error'][] = 'Invalid Email';
}
if (empty($_POST['issue-name'])) {
    $_SESSION['error-array'][] = $_SESSION['issue-error'][] = 'Issue name should not be empty';
} else if (strlen($_POST['issue-name']) <= 2) {
    $_SESSION['error-array'][] = $_SESSION['issue-error'][] = 'Invalid Issue name';
}
if (empty($_POST['issue-details'])) {
    $_SESSION['error-array'][] = $_SESSION['details-error'][] = 'Issue details should not be empty';
} else if (strlen($_POST['issue-details']) <= 2) {
    $_SESSION['error-array'][] = $_SESSION['details-error'][] = 'Invalid details ';
} else if (strlen($_POST['issue-details']) >= 250) {
    $_SESSION['error-array'][] = $_SESSION['details-error'][] = 'The details should not exceed 250 characters';
}

if (!empty($_FILES['bug-img']['name'])) {
    $imgtype = explode(".", $_FILES['bug-img']['name']);
    if (strtolower($imgtype[count($imgtype)]) == "png" || strtolower($imgtype[1]) == "jpg" || strtolower($imgtype[1]) == "jpeg") {
        move_uploaded_file($_FILES['bug-img']['tmp_name'], 'bug_uploads/' . $_FILES['bug-img']['name']);
    } else {
        $_SESSION['error-array'][] = $_SESSION['file-error'] = 'The file is invalid and only accepts png, jpg, and jpeg';
    }
}

if (empty($_SESSION['error-array'])) {
    header('Location: Thank you.php');
} else {
    header('Location: Bug Ticket.php');
}
