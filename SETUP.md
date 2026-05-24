# Setup Instructions for Killa Cosmetics

This project is a PHP + MySQL web application built with an MVC architecture. Follow these steps to run the project locally using XAMPP or a similar Apache/MySQL environment.

## Prerequisites

-   **PHP**: 8.1 or higher
-   **MySQL/MariaDB**
-   **Composer**: [Download Composer](https://getcomposer.org/)

## Local Setup on XAMPP

1.  **Clone the Repository**:
    Place the project folder into your `htdocs` directory.
    ```bash
    cd C:\xampp\htdocs
    git clone https://github.com/MaauPaau/ProyectoPHPKillaCosmeticos.git
    cd ProyectoPHPKillaCosmeticos
    ```

2.  **Install Dependencies**:
    Run composer to install required libraries (Dotenv, FPDF, PhpSpreadsheet).
    ```bash
    composer install
    ```

3.  **Database Configuration**:
    -   Open PHPMyAdmin (`http://localhost/phpmyadmin`).
    -   Create a new database named `basekilla2`.
    -   Import the `basekilla2.sql` file located in the root of the project.

4.  **Environment Variables**:
    -   Copy the `.env.example` file and rename it to `.env`.
    -   Open `.env` and fill in your database credentials:
        ```env
        DB_HOST=localhost
        DB_NAME=basekilla2
        DB_USER=root
        DB_PASS=
        ```

5.  **Hash Existing Passwords**:
    For security, you must hash the plaintext passwords already in the database. Run the following script in your terminal:
    ```bash
    php update_passwords.php
    ```

6.  **Web Server Configuration**:
    -   Configure your Apache server to point its Document Root to the `/public` folder of the project.
    -   Alternatively, if you are not using a Virtual Host, you can access the project via `http://localhost/ProyectoPHPKillaCosmeticos/public/`.

7.  **Login**:
    -   Go to the application URL (e.g., `http://localhost/ProyectoPHPKillaCosmeticos/public/login`).
    -   Use one of the following accounts (after running `update_passwords.php`):
        -   **Admin**: `admin1@killa.com` / `Adm#K1a99`
        -   **Cajero**: `cajero1@killa.com` / `Caj#11xA9`
        -   **Encargado Almacén**: `almacen1@killa.com` / `Alm#11xA9`

## Key Features

-   **Dashboard**: Overview of stock and sales.
-   **Products**: Full CRUD with search, pagination, and image upload.
-   **Exports**: Download product lists in PDF, Excel, or CSV formats.
-   **Security**: Prepared statements, password hashing, and Role-Based Access Control (RBAC).
