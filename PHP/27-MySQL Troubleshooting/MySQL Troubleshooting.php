<?php
// This is for Username/Password for Authentication Error - TLDR Wrong user/password can't let you access database
// What you need to do is correct the password and username
// define('DB_HOST', 'localhost');
// define('DB_USER', 'root');
// define('DB_PASS', '');
// define('DB_DATABASE', 'world');

// $connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);

// if ($connection->connect_errno) {
//     die("Failed to connect to MySQL: (" . $connection->connect_errno . ") " . $connection->connect_error);
// }

// ------------------------------------------------------------------------------------------

// This is for Network Error - TLDR Wrong/Invalid Host will also not let you access database
// What you need to do is to correct the DB host. (Commonly it is localhost)

// define('DB_HOST', 'try');
// define('DB_USER', 'root');
// define('DB_PASS', '');
// define('DB_DATABASE', 'world');

// $connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);


// if ($connection->connect_errno) {
//     die("Failed to connect to MySQL: (" . $connection->connect_errno . ") " . $connection->connect_error);
// }

//--------------------------------------------------------------------------------------------

//This is for Authorization Error - TLDR Users that are not Authorized Can't Access the Database
// You need to give it access first!
define('DB_HOST', 'localhost');
define('DB_USER', 'testUser_123');
define('DB_PASS', 'testUser_123');
define('DB_DATABASE', 'world');

$connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);


if ($connection->connect_errno) {
    die("Failed to connect to MySQL: (" . $connection->connect_errno . ") " . $connection->connect_error);
}
