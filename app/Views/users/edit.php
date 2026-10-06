<?php

/** @var array $user */

$errors = $errors ?? [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>

    <?= view('partials/nav') ?>

    <h1>Edit User</h1>

    <?php if ($errors): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <p>Current Avatar:</p>

    <img
        src="<?= ! empty($user['avatar'])
            ? base_url('uploads/avatars/' . $user['avatar'])
            : base_url('images/default-avatar.svg') ?>"
        alt="<?= esc($user['full_name']) ?> avatar"
        width="100"
        height="100"
    >

    <form
        action="<?= site_url('users/' . $user['id']) ?>"
        method="post"
        enctype="multipart/form-data"
    >
        <?= csrf_field() ?>

        <div>
            <label for="username">Username</label>
            <input
                type="text"
                id="username"
                name="username"
                value="<?= esc($user['username']) ?>"
            >
        </div>

        <div>
            <label for="full_name">Full Name</label>
            <input
                type="text"
                id="full_name"
                name="full_name"
                value="<?= esc($user['full_name']) ?>"
            >
        </div>

        <div>
            <label for="role">Role</label>
            <select id="role" name="role">
                <?php foreach (['Administrator', 'Cashier', 'Manager', 'Staff'] as $role): ?>
                    <option
                        value="<?= esc($role) ?>"
                        <?= $user['role'] === $role ? 'selected' : '' ?>
                    >
                        <?= esc($role) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div>
            <label for="avatar">Avatar (JPG or PNG, maximum 2 MB)</label>
            <input
                type="file"
                id="avatar"
                name="avatar"
                accept=".jpg,.jpeg,.png,image/jpeg,image/png"
            >
        </div>

        <div>
            <label for="password">New Password (leave blank to keep the current password)</label>
            <input
                type="password"
                id="password"
                name="password"
                minlength="8"
                autocomplete="new-password"
            >
        </div>

        <div>
            <label for="password_confirm">Confirm New Password</label>
            <input
                type="password"
                id="password_confirm"
                name="password_confirm"
                minlength="8"
                autocomplete="new-password"
            >
        </div>

        <button type="submit">Update User</button>
        <a href="<?= site_url('users') ?>">Cancel</a>
    </form>

</body>
</html>
