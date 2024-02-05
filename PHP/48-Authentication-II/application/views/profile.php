<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/style.css') ?>">
    <title>Profile</title>
</head>
<body>
    <a href="<?= base_url() ?>">Logout</a>
    <main>
        <section>
            <h1>Basic Information</h1>
            <div class="position">
                <h2>First Name: <span class="info"><?= $first_name?></span></h2>
                <h2>Last Name: <span class="info"><?= $last_name?></span></h2>
                <h2>Contact Number: <span class="info"><?= $contact_number?></span></h2>
                <h2>Last failed login: <span class="info"><?= $failed_login?></span></h2>
            </div>
        </section>
    </main>
</body>
</html>