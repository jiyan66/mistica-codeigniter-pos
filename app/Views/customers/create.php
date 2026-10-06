<?php
$errors   = $errors ?? [];
$customer = $customer ?? [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Customer</title>
</head>
<body>

    <?= view('partials/nav') ?>

    <h1>Add New Customer</h1>

    <?php if ($errors): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form action="<?= site_url('customers') ?>" method="post">
        <?= csrf_field() ?>

        <div>
            <label for="full_name">Full Name</label>
            <input
                type="text"
                id="full_name"
                name="full_name"
                value="<?= esc($customer['full_name'] ?? '') ?>"
            >
        </div>

        <div>
            <label for="email">Email Address</label>
            <input
                type="email"
                id="email"
                name="email"
                value="<?= esc($customer['email'] ?? '') ?>"
            >
        </div>

        <div>
            <label for="phone">Phone Number</label>
            <input
                type="text"
                id="phone"
                name="phone"
                value="<?= esc($customer['phone'] ?? '') ?>"
            >
        </div>

        <button type="submit">Save Customer</button>
        <a href="<?= site_url('customers') ?>">Cancel</a>
    </form>

</body>
</html>
