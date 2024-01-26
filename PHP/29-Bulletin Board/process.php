<?php
session_start();
require('new-connection.php');
$_SESSION['error-array'] = array();

function validateString($elem, $min, $max)
{
    foreach ($elem as $key => $value) {
        if (empty($value)) {
            $_SESSION['error-array'][] = $_SESSION[$key . '-error'][] = ucwords($key) . ' should not be empty';
        } else if (strlen($value) <= $min) {
            $_SESSION['error-array'][] = $_SESSION[$key . '-error'][] = 'Invalid! ' . $key . " Should contain at least " . $min . " Characters";
        } else if (strlen($value) >= $max) {
            $_SESSION['error-array'][] = $_SESSION[$key . '-error'][] = 'Invalid! ' . $key . " Should not contain more than " . $max . " Characters";
        } else if (is_numeric($value)) {
            $_SESSION['error-array'][] = $_SESSION[$key . '-error'][] = ucwords($key) . ' should not only Contain Numbers';
        }
    }
}
if (isset($_POST['skip'])) {
    $_SESSION['posts'] = fetch_all("SELECT * FROM posts");
    header('Location: Bulletin Board Main.php');
} else if (isset($_POST['submit'])) {
    if (isset($_POST['subject'])) {
        $subject = array('subject' => $_POST['subject']);
        validateString($subject, 2, 40);
    }
    if (isset($_POST['details'])) {
        $details = array('details' => $_POST['details']);
        validateString($details, 10, 255);
    }
    if (empty($_SESSION['error-array'])) {
        header('Location: Bulletin Board Main.php');
        if (isset($_POST['subject']) && isset($_POST['details'])) {
            $subject = $_POST['subject'];
            $details = $_POST['details'];
            $query = "INSERT INTO posts(post_name, post_detail ,created_at) VALUES('$subject', '$details', NOW())";
            run_mysql_query($query);
            $_SESSION['posts'] = fetch_all("SELECT * FROM posts");
        }
    } else {
        header('Location: Bulletin Board Entry.php');
    }
}

if (isset($_POST['return'])) {
    header('Location: Bulletin Board Entry.php');
}



// if (isset($_POST['trash'])) {
//     $id = $_POST['trash'];
//     $query = "DELETE FROM contacts WHERE contact_id = $id";
//     run_mysql_query($query);
//     $_SESSION['contacts'] = fetch_all("SELECT * FROM contacts");
//     header('Location: Bulletin Board Main.php');
// }
