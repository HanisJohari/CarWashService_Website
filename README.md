# My PHP Website

Welcome to my PHP-based website repository! Since GitHub Pages does not support PHP, you will need to run this project on a local server or use a hosting platform that supports PHP to view the website properly.

---

## 📂 Project Overview
This repository contains the files for my PHP website, including:
- PHP scripts
- HTML, CSS, and JavaScript files
- Images and other assets
- A MySQL database that uses **port 3307**.

---

## 🚀 How to View the Website
To view the website, follow these steps:

### Option 1: Run on a Local Server
1. **Install a Local Server Tool:**
   - Download and install [XAMPP](https://www.apachefriends.org/) or a similar tool.

2. **Configure the Server for Port 3307:**
   - Ensure that your MySQL server is configured to use port **3307**.
   - In **XAMPP**, go to the `xampp\mysql\bin\my.ini` file and update the `port` setting:
     ```
     [client]
     port=3307

     [mysqld]
     port=3307
     ```
   - Restart the MySQL service.

3. **Place the Project Files in the Server Directory:**
   - Copy all the files from this repository to the `htdocs` folder (or equivalent, depending on your tool).

4. **Import the Database:**
   - Open **phpMyAdmin** by visiting:
     ```
     http://localhost/phpmyadmin
     ```
   - Create a new database (carwash).
   - Import the provided `.sql` file from the repository to set up the database schema and data.

5. **Configure the Database Connection:**
   - Open the `config.php` (or equivalent) file in the project and update the database settings:
     ```php
    $host = "localhost";
    $username = "root";
    $password = ""; 
    $dbname = "carwash";
    $port = 3307;
     ```
   - Save the changes.

6. **Start the Server:**
   - Launch the local server software and start the Apache and MySQL services.

7. **Access the Website:**
   - Open your web browser and go to:
     ```
     http://localhost/[your-folder-name]
     ```
   - Replace `[your-folder-name]` with the name of the folder where the files are located.

---

### Option 2: Use an Online PHP Hosting Platform
If you choose to host the project online, ensure the hosting platform supports custom MySQL ports, or modify the database to use the default port 3306.

---

## ⚠️ Important Notes
- The project is configured to use **port 3307** for the MySQL database. If you're using a different port, update the `config.php` file accordingly.
- If you try to open `.php` files directly on GitHub or your computer (without a server), the browser may download the file instead of rendering it.

---

## 🌟 Features
- List the key features of your website here .
-Staff Management
AddStaff.php: A form-based interface for adding new staff members, likely integrated with backend database operations.

-Admin Login System
adminLogin.php: Implements an admin login page with validation, styled using custom CSS.

Booking System
booking3.php: Handles user sessions and retrieves user details (e.g., name, email, and address) from the database, indicating a user-specific booking process.

Database Operations
create.php: Processes form submissions to add new staff to the database, with fields for first name, last name, gender, contact details, and team association.

Database Configuration
db_connect.php (referenced in multiple files): Establishes database connectivity for managing user and staff information.

In this website project we have handle user booking and also we have admin dashboard to manage user data.
---

## 🛠 Technologies Used
- PHP
- MySQL (port 3307)
- HTML/CSS
- JavaScript



