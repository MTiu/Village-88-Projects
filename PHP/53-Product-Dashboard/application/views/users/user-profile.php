
    <main class="profile">
        <?= (isset($success)) ? $success : '' ?>
        <h1>Edit Profile</h1>
        <section class="edit-information">
            <h1>Edit Information</h1>
            <form action="<?= base_url('users/editProcess')?>" method="post">
                <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
                <label>
                    Email address:
                    <input type="text" name="email" value="<?= $data[0]['email']?>">
                    <?= (isset($validation['email'])) ? $validation['email'] : '' ?>
                </label>
                <label>
                    First name:
                    <input type="text" name="fname" value="<?= $data[0]['first_name']?>">
                    <?= (isset($validation['fname'])) ? $validation['fname'] : '' ?>
                </label>
                <label>
                    Last name:
                    <input type="text" name="lname" value="<?= $data[0]['last_name']?>">
                    <?= (isset($validation['lname'])) ? $validation['lname'] : '' ?>
                </label>
                <input type="submit" value="Save">
            </form>
        </section>
        <section class="change-password">
            <h1>Change Password</h1>
            <form action="<?= base_url('users/changePassword')?>" method="post">
                <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
                <label>
                    Old Password:
                    <input type="password" name="old-password">
                    <?= (isset($validation['old-password'])) ? $validation['old-password'] : '' ?>
                </label>
                <label>
                    New Password:
                    <input type="password" name="new-password">
                    <?= (isset($validation['new-password'])) ? $validation['new-password'] : '' ?>
                </label>
                <label>
                    Confirm Password:
                    <input type="password" name="conf-password">
                    <?= (isset($validation['conf-password'])) ? $validation['conf-password'] : '' ?>
                </label>
                <input type="submit" value="Save">
            </form>
        </section>
    </main>
</body>
</html>