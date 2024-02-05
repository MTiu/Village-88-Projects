<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/style.css')?>">
    <title>Contacts</title>
</head>
<body>
    <h1>Contacts</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Contact Number</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
<?php foreach($contacts as $contact){?>
            <tr>
                <td><?php echo $contact['name']?></td>
                <td><?php echo $contact['number']?></td>
                <td><a href="contacts/show/<?php echo $contact['id']?>">Show</a> | <a href="contacts/edit/<?php echo $contact['id']?>">Edit</a> | <a class="remove" href="contacts/destroy/<?php echo $contact['id']?>">Remove</a></td>
            </tr>
<?php }?>
        </tbody>
    </table>
    <a href="contacts/new">Add new contact</a>
</body>
</html>