<?php
session_start();
require('new-connection.php');


if (!empty($_FILES['csv-file']['name'])) {
    $_SESSION['filetype'] = $filetype = explode(".", $_FILES['csv-file']['name']);
    if (strtolower($filetype[1]) == "csv") {
        move_uploaded_file($_FILES['csv-file']['tmp_name'], 'uploads/' . $_FILES['csv-file']['name']);
        $query = "SELECT * FROM files WHERE name = '{$_FILES['csv-file']['name']}'";
        $csvFiles = fetch_record($query);
        echo "database";
        if(empty($csvFiles)){
            $query = "INSERT INTO files (name, uploaded_at)  
            VALUES ('{$_FILES['csv-file']['name']}', now())";
            run_mysql_query($query);
            echo "database again";
        } else{
            $_SESSION['file-error'] = 'The file was already uploaded';
        }
    } else {
        $_SESSION['file-error'] = 'The file is invalid and only accepts csv';
        
    }
}

if(isset($_GET['name'])){
    $_SESSION['csv-name'] =$_GET['name'];
    header('Location: records.php');
}
else if (!empty($_SESSION['file-error'])) {
    header('Location: Excel to HTML with Pagination.php');
} else {
    header('Location: Excel to HTML with Pagination.php');
    session_destroy();
}
