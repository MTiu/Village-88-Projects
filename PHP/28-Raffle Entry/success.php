<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Success!</title>
</head>

<body>
    <header class="Success!">
        <p>Success! Contact number <?= $_SESSION['contact_number'] ?> is now added.</p>
    </header>
    <main class="success-dashboard">
        <form action="process.php" method="POST">
            <input class="submit-button" type="submit" value="Add Contact Number" name="return">
        </form>
        <section class="table-container">
            <form action="process.php" method="POST">
                <table>
                    <thead>
                        <tr>
                            <th>Contact Number</th>
                            <th>Date Added</th>
                            <th>Delete Number</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_SESSION['contacts'])) {
                            foreach ($_SESSION['contacts'] as $contact) {
                                $date = date_create($contact['created_at']); ?>
                                <tr>
                                    <td><?= $contact['contact_number'] ?></td>
                                    <td><?= date_format($date, "m/d/Y H:i:s"); ?></td>
                                    <td><input class="delete-icon" type="submit" name="trash" value=<?= $contact['contact_id'] ?>></td>
                                </tr>
                        <?php
                            }
                        } ?>
                    </tbody>
                </table>
            </form>
        </section>
    </main>
</body>

</html>