<?php
/** @var array $users */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Accounts</title>
</head>
<body>

    <?= view('partials/nav') ?>

    <h1>User Accounts</h1>

    <?php if (session()->getFlashdata('success')): ?>
        <p><?= esc(session()->getFlashdata('success')) ?></p>
    <?php endif; ?>

    <p>
        <a href="<?= site_url('users/new') ?>">Add New User</a>
    </p>

    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>Avatar</th>
                <th>Username</th>
                <th>Full Name</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td>
                        <img
                            src="<?= ! empty($user['avatar'])
                                ? base_url('uploads/avatars/' . $user['avatar'])
                                : base_url('images/default-avatar.svg') ?>"
                            alt="<?= esc($user['full_name']) ?> avatar"
                            width="60"
                            height="60"
                        >
                    </td>
                    <td><?= esc($user['username']) ?></td>
                    <td><?= esc($user['full_name']) ?></td>
                    <td><?= esc($user['role']) ?></td>
                    <td>
                        <a href="<?= site_url('users/' . $user['id'] . '/edit') ?>">
                            Edit
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>
