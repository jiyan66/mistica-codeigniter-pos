# CodeIgniter POS Application

A database-backed Point-of-Sale foundation built with CodeIgniter 4. The application manages customer and staff user accounts, validates form submissions, supports avatar uploads, and protects management pages with session-based authentication.

## Features

- Public landing and about pages
- Customer list, creation, and editing
- User list, creation, and editing
- JPG and PNG avatar uploads with 300 by 300 image processing
- Password hashing with `password_hash()`
- Password verification with `password_verify()`
- Session-based login and logout
- Authentication Filter protecting all customer and user routes
- CSRF protection for POST forms
- MySQL or MariaDB database integration

## Requirements

- PHP 8.2 or newer
- Composer
- MySQL or MariaDB
- PHP extensions: `intl`, `mbstring`, `mysqli`, and `gd`

## Local Setup

1. Clone or download the project.
2. Open a terminal in the project directory.
3. Install dependencies:

   ```bash
   composer install
   ```

4. Copy `.env.example` to `.env`.
5. Create a database named `pos_db`.
6. For a fresh database, import `database/pos_db.sql` using phpMyAdmin or the MySQL command line.
7. If upgrading an existing TFA3 database instead, import `database/tfa4_upgrade.sql` once. This preserves the existing records while adding initial password hashes.
8. Update the database values in `.env` if your MySQL account differs from the XAMPP defaults.
9. Start the application:

   ```bash
   php spark serve
   ```

10. Open `http://localhost:8080/`.

The included CodeIgniter migration provides an alternative upgrade path:

```bash
php spark migrate
```

## Demonstration Login

The database export contains development accounts. For local assessment testing, use:

- Username: `admin01`
- Password: `Password123!`

All existing users in the included development database use the same initial password. Change these credentials before using the project outside an assessment environment.

## Application Routes

Public routes:

- `GET /` - Landing page
- `GET /about` - About page
- `GET /login` - Login form
- `POST /login` - Login verification

Authenticated routes:

- `GET /customers` - Customer list
- `GET /customers/new` - New customer form
- `POST /customers` - Create customer
- `GET /customers/{id}/edit` - Edit customer form
- `POST /customers/{id}` - Update customer
- `GET /users` - User list
- `GET /users/new` - New user form
- `POST /users` - Create user
- `GET /users/{id}/edit` - Edit user form
- `POST /users/{id}` - Update user
- `POST /logout` - Destroy the session and return to login

## Database Tables

### customers

- `id` primary key
- `full_name`
- `email`
- `phone`
- `created_at`

### users

- `id` primary key
- `username` unique
- `full_name`
- `role`
- `avatar`
- `password`
- `created_at`

Only password hashes are stored in the database. Plaintext passwords are never saved.

## Deployment

The included Dockerfile configures Apache, Composer, MySQLi, and GD. Configure the production database and base URL through your hosting provider's environment variables. Do not commit `.env`.

Avatar files uploaded at runtime may be removed when deployed to a hosting service with an ephemeral filesystem. Use persistent storage or an external object-storage service if uploaded avatars must survive redeployments.

## Submission

Submit:

- The GitHub repository URL containing the raw project and `database/pos_db.sql`
- The URL of the hosted working application
