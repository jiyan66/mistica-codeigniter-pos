<?php
/** @var array $customers */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Accounts</title>
</head>
<body>

    <?= view('partials/nav') ?>

    <h1>Customer Accounts</h1>
    <?php if (session()->getFlashdata('success')): ?>
        <p><?= esc(session()->getFlashdata('success')) ?></p>
    <?php endif; ?>

    <p>
        <a href="<?= site_url('customers/new') ?>">Add New Customer</a>
    </p>

    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>Full Name</th>
                <th>Email Address</th>
                <th>Phone Number</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($customers as $customer): ?>
                <tr>
                    <td><?= esc($customer['full_name']) ?></td>
                    <td><?= esc($customer['email']) ?></td>
                    <td><?= esc($customer['phone']) ?></td>
                    <td>
                    <a href="<?= site_url('customers/' . $customer['id'] . '/edit') ?>">
                            Edit
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>
