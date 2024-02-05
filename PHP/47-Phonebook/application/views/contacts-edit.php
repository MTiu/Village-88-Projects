<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/style.css')?>">
    <title>Edit Contacts</title>
</head>
<body>
    <p><a href="<?php echo base_url('contacts')?>">Go back</a> | <a href="<?php echo base_url("contacts/show/$id") ?>"> Show</a> </p>
    <h1>Edit Contact #<?php echo $id?></h1>
    <form action="<?php echo base_url("contacts/update/$id") ?>" method="post">
        <label>
            Name: <input type="text" class="input-name" name="name">
        </label>
        <label>
            Contact Number: <input type="text" name="number">
        </label>
        <input type="submit" value="Save">
    </form>
</body>
</html>