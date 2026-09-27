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

    <nav>
        <a href="<?= base_url('/') ?>">Home</a>
        <a href="<?= base_url('about') ?>">About</a>
        <a href="<?= base_url('customers') ?>">Customers</a>
        <a href="<?= base_url('users') ?>">Users</a>
    </nav>

    <h1>Edit User</h1>

    <?php if ($errors): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <?php if (! empty($user['avatar'])): ?>
        <p>Current Avatar:</p>

        <img
            src="<?= base_url('uploads/avatars/' . $user['avatar']) ?>"
            alt="<?= esc($user['full_name']) ?> avatar"
            width="100"
            height="100"
        >
    <?php endif; ?>

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

        <button type="submit">Update User</button>
        <a href="<?= site_url('users') ?>">Cancel</a>
    </form>

</body>
</html>