<?php
$errors   = $errors ?? [];
$username = $username ?? '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS Login</title>
</head>
<body>

    <?= view('partials/nav') ?>

    <h1>Staff Login</h1>

    <?php if (session()->getFlashdata('error')): ?>
        <p><?= esc(session()->getFlashdata('error')) ?></p>
    <?php endif; ?>

    <?php if ($errors): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form action="<?= site_url('login') ?>" method="post">
        <?= csrf_field() ?>

        <div>
            <label for="username">Username</label>
            <input
                type="text"
                id="username"
                name="username"
                value="<?= esc($username) ?>"
                autocomplete="username"
                required
            >
        </div>

        <div>
            <label for="password">Password</label>
            <input
                type="password"
                id="password"
                name="password"
                autocomplete="current-password"
                required
            >
        </div>

        <button type="submit">Log In</button>
    </form>

</body>
</html>
