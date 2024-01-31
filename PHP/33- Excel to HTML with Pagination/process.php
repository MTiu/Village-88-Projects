<?php
session_start();
require('new-connection.php');
ini_set('auto_detect_line_endings', true);

if (!empty($_FILES['csv-file']['name'])) {
    echo "it worked!";
    $_SESSION['filetype'] = $filetype = explode(".", $_FILES['csv-file']['name']);
    if (strtolower($filetype[1]) == "csv") {
        move_uploaded_file($_FILES['csv-file']['tmp_name'], 'uploads/' . $_FILES['csv-file']['name']);
        $query = "SELECT * FROM files WHERE name = '{$_FILES['csv-file']['name']}'";
        $csvFiles = fetch_record($query);
        if(empty($csvFiles)){
            $query = "INSERT INTO files (name, uploaded_at)  
            VALUES ('{$_FILES['csv-file']['name']}', now())";
            run_mysql_query($query);
        } else{
            $_SESSION['file-error'] = 'The file was already uploaded';
        }
    } else {
        $_SESSION['file-error'] = 'The file is invalid and only accepts csv';
    }
}

if(isset($_GET['name'])){
    function pageCounter($file){
        $handler = fopen($file, "r");
            $csvRowCount = 0;
                if ( $handler !== FALSE) { $csvRowCount = 0;
                while (($data = fgetcsv($handler)) !== FALSE) { 
                    $csvRowCount++;
                }
            }fclose($handler);
            return $csvRowCount = ceil($csvRowCount/50);
        }
        $_SESSION['csv-name'] = $_GET['name'];
        $_SESSION['total-pages'] = pageCounter("uploads/".$_GET['name']);
        $_SESSION['csv-handler'] = fopen("uploads/".$_GET['name'],"r");
        $_SESSION['header'] =  fgetcsv($_SESSION['csv-handler']);
        
    header('Location: records.php');
}
else if (empty($_SESSION['file-error'])) {
    header('Location: Excel to HTML with Pagination.php');
} else {
    session_destroy();
}
