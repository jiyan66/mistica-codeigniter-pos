<nav>
    <a href="<?= base_url('/') ?>">Home</a>
    <a href="<?= base_url('about') ?>">About</a>

    <?php if (session()->get('isLoggedIn')): ?>
        <a href="<?= base_url('customers') ?>">Customers</a>
        <a href="<?= base_url('users') ?>">Users</a>

        <span>
            Signed in as <?= esc((string) session()->get('username')) ?>
        </span>

        <form action="<?= site_url('logout') ?>" method="post" style="display: inline;">
            <?= csrf_field() ?>
            <button type="submit">Log Out</button>
        </form>
    <?php else: ?>
        <a href="<?= base_url('login') ?>">Login</a>
    <?php endif; ?>
</nav>
