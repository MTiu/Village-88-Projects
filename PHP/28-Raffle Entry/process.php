<?php
session_start();
require('new-connection.php');

// $_SESSION['delete'] =

$_SESSION['error-array'] = array();

if (empty($_POST['contacts'])) {
    $_SESSION['error-array'][] = $_SESSION['contact-error'][] = 'Contacts should not be empty';
} else if (!is_numeric($_POST['contacts'])) {
    $_SESSION['error-array'][] = $_SESSION['contact-error'][] = 'Contacts only Contain Numbers';
} else if (strlen($_POST['contacts']) != 11) {
    $_SESSION['error-array'][] = $_SESSION['contact-error'][] = 'Contacts should be 11 characters';
} else {
    if (isset($_POST['contacts'])) {
        $contact_number = "{$_POST['contacts']}";
        $_SESSION['contact_number'] = $contact_number;
        $query = "INSERT INTO contacts(contact_number, created_at) VALUES($contact_number , NOW())";
        run_mysql_query($query);
    }
}
if (empty($_SESSION['error-array'])) {
    header('Location: success.php');
} else {
    header('Location: Raffle Entry.php');
}
if (isset($_POST['return'])) {
    header('Location: Raffle Entry.php');
}

$_SESSION['contacts'] = fetch_all("SELECT * FROM contacts");

if (isset($_POST['trash'])) {
    $id = $_POST['trash'];
    $query = "DELETE FROM contacts WHERE contact_id = $id";
    run_mysql_query($query);
    $_SESSION['contacts'] = fetch_all("SELECT * FROM contacts");
    header('Location: success.php');
}
