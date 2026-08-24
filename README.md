# Student Information Management Application

A PHP web application for registering, logging in, and managing student records.

## Overview

A student-records system: users can register an account, log in, and then view, add, or delete student records.

## Features

* Register and log in to an account
* Session-protected student records page
* View all students
* Add new students (with client side input validation)
* Delete students 

## Architecture

Built using the **Model-View-Controller (MVC)** pattern to separate concerns:

```
config/        → Database.php — creates the database connection, used by models
controllers/
  AuthController.php     → Login, registration, session management, form processing, redirects
  StudentController.php  → Retrieve, create, and delete students
models/
  User.php       → Create user accounts, verify login credentials
  Student.php    → Retrieve, insert, and delete student records
pages/
  login.php          → Login form → AuthController
  register.php        → Registration form → AuthController
  students.php         → Student list (requires an active session)
  create_student.php    → Add-student form → StudentController
partials/       → Reusable header.php, footer.php, navbar.php
styles/         → style.css — layout and appearance
```

## App Flow

1. User visits index.php → redirected to login page
2. New users can register with username, email and password
3. After login, user is taken to the students page
4. Students page shows all students with options to add or delete
5. Delete asks for confirmation before removing
6. Add student form validates input before submitting

# Authentication

The `students.php` checks if an active user session. 
If no session is found, the user is redirected to the login page.

## Tech Stack

- **PHP** (MVC architecture, no framework)
- **MySQL**
- **Apache** (via XAMPP)
  
# Requirements

- XAMPP (or equivalent Apache + MySQL + PHP stack)

# How to Run the Application

1. Open **XAMPP Control Panel**
2. Start **Apache** and **MySQL**
3. Place the project folder inside:
```
xampp/htdocs/
```
4. Run the database setup scripts included in the repo:
   - `createUsersTableDB.txt` — creates the `users` table
   - `createStudentsTableDB.txt` — creates the `students` table
5. Open your browser and navigate to:
   ```
   http://localhost/index.php
   ```
