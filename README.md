# Student Information Management Application

## Overview

This project is a simple **PHP MVC web application** that allows users to register, login, and manage student records.

Users can:

* Register an account
* Login to the application
* View all students
* Add new students
* Delete students

The application uses a **Model-View-Controller (MVC)** architecture to separate concerns and organize the code.

---

# Requirements

* XAMPP
* Apache
* MySQL
* PHP

---

# How to Run the Application

1. Open **XAMPP Control Panel**
2. Start **Apache** and **MySQL**
3. Place the project folder inside:

```
xampp/htdocs/
```

4. Open the browser and navigate to:

```
http://localhost/index.php
```

---

# Project Structure

## config/

Contains database configuration.

`Database.php`

* Creates the database connection
* Used by models to access the database

---

## controllers/

Handles application logic and communication between pages and models.

`AuthController.php`

* Handles user login
* Handles user registration
* Processes form data
* Manages sessions
* Redirects users

`StudentController.php`

* Retrieves student data
* Creates students
* Deletes students

---

## models/

Handles database queries.

`User.php`

* Create user accounts
* Verify login credentials

`Student.php`

* Retrieve students
* Insert students
* Delete students

---

## pages/

Contains the UI pages and forms.

`login.php`

* Login form
* Sends data to AuthController

`register.php`

* Registration form
* Sends data to AuthController

`students.php`

* Displays student list
* Requires user login

`create_student.php`

* Form to add new students
* Sends data to StudentController

---

## partials/

Reusable UI components.

* `header.php`
* `footer.php`
* `navbar.php`

---

## styles/

Contains CSS styling.

`style.css`

* Handles layout and appearance of the application

---

# Authentication

The `students.php` page checks if a user session exists.
If no session is found, the user is redirected to the login page.

---

# Database

Two SQL files are included:

`createUsersTableDB.txt`

* Creates the users table.

`createStudentsTableDB.txt`

* Creates the students table.

## App Flow
1. User visits index.php → redirected to login page
2. New users can register with username, email and password
3. After login, user is taken to the students page
4. Students page shows all students with options to add or delete
5. Delete asks for confirmation before removing
6. Add student form validates input before submitting
