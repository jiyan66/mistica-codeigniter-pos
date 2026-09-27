<?php
$errors = $errors ?? [];
$user   = $user ?? [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New User</title>
</head>
<body>

    <nav>
        <a href="<?= base_url('/') ?>">Home</a>
        <a href="<?= base_url('about') ?>">About</a>
        <a href="<?= base_url('customers') ?>">Customers</a>
        <a href="<?= base_url('users') ?>">Users</a>
    </nav>

    <h1>Add New User</h1>

    <?php if ($errors): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form action="<?= site_url('users') ?>" method="post">
        <?= csrf_field() ?>

        <div>
            <label for="username">Username</label>
            <input
                type="text"
                id="username"
                name="username"
                value="<?= esc($user['username'] ?? '') ?>"
            >
        </div>

        <div>
            <label for="full_name">Full Name</label>
            <input
                type="text"
                id="full_name"
                name="full_name"
                value="<?= esc($user['full_name'] ?? '') ?>"
            >
        </div>

        <div>
            <label for="role">Role</label>
            <select id="role" name="role">
                <option value="">Select a role</option>

                <?php foreach (['Administrator', 'Cashier', 'Manager', 'Staff'] as $role): ?>
                    <option
                        value="<?= esc($role) ?>"
                        <?= ($user['role'] ?? '') === $role ? 'selected' : '' ?>
                    >
                        <?= esc($role) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit">Save User</button>
        <a href="<?= site_url('users') ?>">Cancel</a>
    </form>

</body>
</html>