# Library Management System Backend

This repository contains the backend system for a Library Management Application, built using PHP and MySQL. It handles database connections, user authentication, and full book management.

## Features

* **User Authentication:** Registration, log in, and log out systems using session management.
* **Book CRUD Operations:** Allows authorized users to create, view, edit, update, and delete book entries in the database.
* **File Uploads:** Supports uploading image files (such as book covers) to the server.
* **Database Management:** Includes pre-configured SQL files (`library.sql` and `login_system.sql`) to set up the necessary database tables quickly.

## File Structure

* `connect.php`: Handles the connection between the PHP application and the MySQL database.
* `register.php`, `log_in.php`, `log_out.php`: Manage user access and security.
* `dashboard.php`: The main control panel after logging in.
* `create_book.php`, `view_book.php`, `edit_book.php`, `delete_book.php`: Execute database changes for the book inventory.

## Setup Requirements

1. A local web server environment (like XAMPP, WampServer, or MAMP).
2. PHP 7.4 or higher.
3. MySQL Database.

## How to Run

1. Clone this repository into your local server directory (e.g., `htdocs` for XAMPP).
2. Import the `.sql` files into your MySQL database using phpMyAdmin.
3. Update the database credentials in `connect.php` if necessary.
4. Open your browser and navigate to `http://localhost/MidProject-BNCC-LnT-Backend/log_in.php`.
