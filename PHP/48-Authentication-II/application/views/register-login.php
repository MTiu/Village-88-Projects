<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/style.css') ?>">
    <title>Register/Login</title>
</head>

<body>
    <main>
        <section class="signup">
            <h1>Sign up</h1>
            <div class="position">
                <form action="<?= base_url('Users/regProcess') ?>" method="post">
                    <label>
                        First Name: <input type="text" name="first_name">
                    </label>
                    <label>
                        Last Name: <input type="text" name="last_name">
                    </label>
                    <label>
                        Email Address: <input type="email" name="email">
                    </label>
                    <label>
                        Contact Number: <input type="text" name="contact_number">
                    </label>
                    <label>
                        Password: <input type="password" name="password">
                    </label>
                    <label>
                        Confirm Password: <input type="password" name="confirm_password">
                    </label>
                    <input type="submit">
                </form>
            </div>
        </section>
        <section class="login">
            <h1>Log-in</h1>
            <div class="position">
                <form action="<?= base_url('Users/logProcess') ?>" method="post">
                    <label>
                        Email Address/Contact Number: <input type="text" name="email_contact">
                    </label>
                    <label>
                        Password: <input type="password" name="password">
                    </label>
                    <input type="submit">
                </form>
            </div>
        </section>
    </main>
</body>

</html>