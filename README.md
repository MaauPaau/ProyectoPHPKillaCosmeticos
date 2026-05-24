# Killa Cosmetics: Professional E-commerce Platform

![Project Status](https://img.shields.io/badge/Status-Refactored-brightgreen)
![Technologies](https://img.shields.io/badge/Tech-PHP%20%7C%20MySQL%20%7C%20HTML%20%7C%20CSS%20%7C%20JS-blue)
![License](https://img.shields.io/badge/License-MIT-green)

## Overview

Killa Cosmetics is a refactored and enhanced e-commerce web application, originally developed as an academic project. This project demonstrates a comprehensive approach to modern web development, focusing on robust architecture, enhanced security, and an improved user experience. It simulates a cosmetics store with public-facing pages, user authentication, and an administrative dashboard for managing products, inventory, and sales.

## Features

-   **User Authentication & Authorization**: Secure login system with role-based access control (Admin, Distribution Manager, Cashier, Customer Service, Warehouse Manager, Client).
-   **Product Management (CRUD)**: Full Create, Read, Update, Delete functionality for products, categories, and other entities.
-   **Modern & Responsive Frontend**: Clean, intuitive, and mobile-friendly user interface built with HTML, CSS, and JavaScript.
-   **Product Search & Pagination**: Efficiently browse and search for products with integrated pagination for large catalogs.
-   **Inventory Dashboard**: Basic statistics and insights into product stock levels, sales, and orders.
-   **Data Export**: Ability to export product and order data to PDF, Excel, and CSV formats.
-   **Secure Database Interactions**: All database operations utilize prepared statements to prevent SQL Injection.
-   **Password Hashing**: User passwords are securely stored using `password_hash`.
-   **Input Validation & Sanitization**: Robust handling of user input to prevent common web vulnerabilities.

## Technical Explanation

This project has undergone a significant refactoring to adhere to professional software development standards, moving from a procedural approach to an **Object-Oriented Programming (OOP)** and **Model-View-Controller (MVC)** inspired architecture.

### Architecture

-   **`src/Config/Database.php`**: Centralized database connection management using `mysqli` with error handling, ensuring a single point of connection configuration.
-   **`src/Core/Model.php`**: An abstract base model providing common CRUD operations (getAll, getById, delete) with prepared statements, promoting code reusability and security.
-   **`src/Models/`**: Contains specific models (e.g., `Product.php`, `User.php`, `Statistics.php`) that extend the base `Model` and encapsulate business logic and data access for each entity. This layer interacts directly with the database.
-   **`src/Core/Controller.php`**: A base controller class providing utility methods for rendering views and redirection, ensuring consistent response handling.
-   **`src/Controllers/`**: Houses controllers (e.g., `ProductController.php`) responsible for processing user requests, interacting with models, and preparing data for views. They act as an intermediary between the models and views.
-   **`src/Views/`**: Contains HTML/PHP templates responsible for presenting data to the user. Views are kept lean, focusing solely on display logic.
-   **`src/Core/Validator.php`**: A utility class for input sanitization (`htmlspecialchars`, `stripslashes`, `trim`) and validation (e.g., email format, required fields), crucial for preventing XSS and other input-related vulnerabilities.
-   **`src/Services/ExportService.php`**: A dedicated service layer for handling complex business logic like data export, promoting separation of concerns.

### Security Enhancements

-   **Prepared Statements**: All database queries now use prepared statements with parameterized queries, effectively mitigating SQL Injection risks.
-   **Password Hashing**: User registration and updates now hash passwords using `password_hash(PASSWORD_DEFAULT)`, and login verification uses `password_verify()`, protecting against plaintext password storage.
-   **Input Sanitization**: All user inputs are sanitized using `htmlspecialchars`, `stripslashes`, and `trim` to prevent XSS attacks and ensure data integrity.
-   **Role-Based Access Control (RBAC)**: Enhanced session management and role checks are implemented in controllers to restrict access to sensitive functionalities based on user roles.

### Frontend Improvements

-   **Modern CSS (`public/assets/css/`)**: Refactored CSS with a focus on modularity, readability, and modern design principles. Utilizes CSS variables for easy theme customization.
-   **Responsive Design**: Implemented media queries and flexible layouts to ensure optimal viewing across various devices (desktops, tablets, mobile phones).
-   **JavaScript Enhancements (`public/assets/js/main.js`)**: Added client-side functionalities such as a responsive navigation menu, basic form validation, and interactive product search and pagination.

## Installation

To set up the Killa Cosmetics project locally, follow these steps:

1.  **Clone the repository:**
    ```bash
    git clone https://github.com/MaauPaau/ProyectoPHPKillaCosmeticos.git
    cd ProyectoPHPKillaCosmeticos
    ```

2.  **Database Setup:**
    *   Ensure you have MySQL/MariaDB installed.
    *   Create a new database named `basekilla2`.
    *   Import the provided SQL dump:
        ```bash
        mysql -u your_username -p basekilla2 < basekilla2.sql
        ```
    *   **Important**: Run `php update_passwords.php` (located in the project root) to hash existing plaintext passwords in the `usuarios` table. This script assumes you have PHP CLI and database access configured.

3.  **Web Server Configuration:**
    *   Place the project in your web server's document root (e.g., `htdocs` for Apache, `www` for Nginx).
    *   Ensure your web server is configured to serve PHP files.
    *   The `public` directory should be the web root for security best practices (though for simplicity in this academic project, the entire directory might be served).

4.  **Access the Application:**
    *   Open your web browser and navigate to the project's URL (e.g., `http://localhost/ProyectoPHPKillaCosmeticos/public/`).

## Demo / Screenshots

*(Due to the nature of this environment, a live demo or dynamic GIF cannot be provided. Below are descriptions of what key screenshots would showcase:)*

-   **Homepage**: A clean, modern landing page with product highlights and clear navigation.
-   **Product Listing**: A responsive grid of products with search and pagination controls.
-   **Product Detail**: A dedicated page for each product with detailed information.
-   **Login/Registration**: Secure and user-friendly forms for authentication.
-   **Admin Dashboard**: An overview of inventory statistics, low-stock alerts, and quick links to management sections.
-   **CRUD Forms**: Examples of forms for adding/editing products, categories, etc., demonstrating input validation.

## Demonstrated Patterns & Skills

This project showcases a variety of essential software development patterns and skills:

-   **Object-Oriented Programming (OOP)**: Extensive use of classes, objects, inheritance, and encapsulation to structure the application logic, making it modular and maintainable.
-   **Model-View-Controller (MVC) Architecture**: Clear separation of concerns, improving code organization, testability, and scalability.
-   **Layered Architecture**: Division of the application into distinct layers (Presentation, Business Logic, Data Access) for better management of complexity.
-   **Secure Coding Practices**: Implementation of prepared statements, password hashing, and input sanitization to protect against common web vulnerabilities like SQL Injection and XSS.
-   **Database Design & Interaction**: Understanding of relational database concepts, schema design, and efficient, secure interaction with MySQL using `mysqli`.
-   **Frontend Development**: Proficiency in HTML5 for structure, CSS3 for styling (including responsive design with media queries), and JavaScript for interactive elements and improved user experience.
-   **User Experience (UX) & User Interface (UI) Design**: Focus on creating an intuitive, aesthetically pleasing, and accessible interface.
-   **Code Refactoring**: Ability to transform existing code into a cleaner, more efficient, and maintainable structure without changing its external behavior.
-   **Error Handling & Logging**: Basic error handling mechanisms to gracefully manage exceptions and provide informative feedback.
-   **Version Control (Git/GitHub)**: Management of project history, collaboration, and deployment through Git.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details. (Note: A `LICENSE` file would be created in a real project.)

## Contact

For any inquiries or suggestions, please contact [MaauPaau](https://github.com/MaauPaau).
