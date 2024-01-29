<?php
session_start();
require('new-connection.php');

$_SESSION['user'] = 1;

if(!empty($_POST)){
    $query = "INSERT INTO comments (user_id, message_id, message, created_at, updated_at) VALUES ('{$_SESSION['user']}', '{$_POST['message_id']}', '{$_POST['comment_text']}', now(), now())";
    $_SESSION['comments'] = run_mysql_query($query);
    
    $query = "INSERT INTO messages (user_id,message,created_at,updated_at) VALUES ('{$_SESSION['user']}','{$_POST['message_text']}',now(),now())";
    $_SESSION['messages'] = run_mysql_query($query);
    header('Location: index.php');
}

$query = "SELECT users.first_name, users.last_name, comments.created_at, comments.message, comments.message_id from comments
INNER JOIN users ON users.user_id = comments.user_id";
$_SESSION['displayComments'] = fetch_all($query);

var_dump($_SESSION['displayComments']);

$query = "SELECT users.first_name, users.last_name, messages.created_at, messages.message, messages.message_id FROM messages
INNER JOIN users ON users.user_id = messages.user_id";
$_SESSION['displayMessages'] = fetch_all($query);

var_dump($_SESSION['displayMessages']);

?>