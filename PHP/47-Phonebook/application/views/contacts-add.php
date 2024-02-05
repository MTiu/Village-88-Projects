<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/style.css')?>">
    <title>Add Contacts</title>
</head>
<body>
    <a href="<?php echo base_url('contacts')?>">Go back</a>
    <h1>Add new Contact</h1>
    <form action="create" method="post">
        <label>
            Name: <input type="text" class="input-name" name="name">
        </label>
        <label>
            Contact Number: <input type="text" name="number">
        </label>
        <input type="submit" value="Create">
    </form>
</body>
</html>