# TFA4 Setup and Test Checklist

## Apply the Database Upgrade

If your existing `pos_db` database already contains the TFA3 tables and records, import this file once through phpMyAdmin:

```text
database/tfa4_upgrade.sql
```

Do not import `pos_db.sql` over an existing database unless you intentionally want to replace its current records.

For a completely fresh database, import:

```text
database/pos_db.sql
```

## Initial Login

```text
Username: admin01
Password: Password123!
```

The upgrade script gives all existing users this initial password. Passwords created or changed through the application are stored with `password_hash()`.

## Start the Application

```bash
composer install
php spark serve
```

Open:

```text
http://localhost:8080/login
```

## Required Tests

1. Log out and open `/customers`; confirm redirection to `/login`.
2. Open `/users`; confirm the same redirection.
3. Submit an incorrect password; confirm the generic error message.
4. Log in with the initial credentials; confirm access to both protected pages.
5. Create a user with a password of at least eight characters.
6. Log out and log in as the newly created user.
7. Edit a user without entering a new password; confirm the existing password still works.
8. Edit a user and enter a matching new password and confirmation; confirm the new password works.
9. Submit a POST form and confirm CSRF protection does not reject the valid form.
10. Log out and confirm the session no longer permits access to protected routes.

## Before GitHub Submission

- Do not commit `.env`.
- Commit `.env.example` instead.
- Confirm `database/pos_db.sql` is included.
- Confirm the hosted database also has the `password` column and hashes.
- Set the production database and base URL through hosting environment variables.
- Test login, protected routes, logout, customer forms, user forms, and avatar upload on the hosted application.
