Private Chat System

This project is a private chat system built using HTML, CSS, JavaScript (jQuery, AJAX), PHP, and MySQL. It allows users to register, log in, send messages privately, and log out. The system features a dark theme with a horror-like style, giving it a unique appearance.

Features

User Registration & Login: Users can register, log in, and access the chat system.

Private Messaging: Send messages privately to another user.

Responsive Design: The application is fully responsive and works on both desktop and mobile devices.

Dark Theme: A modern dark theme designed to look like a horror-style chat.

Real-Time Updates: Messages are updated in real time without needing to refresh the page.

MySQL Database: MySQL is used for user management and storing chat messages.


Requirements

PHP 7.x or higher

MySQL Database

Web Server (Apache/Nginx)

jQuery & AJAX (for front-end real-time updates)


Installation

Step 1: Set Up the Database

1. Create a MySQL database. You can name it chat_system (or anything you prefer).


2. Create the following tables in the database by running the SQL commands below:



-- Create users table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

-- Create messages table
CREATE TABLE messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    sender_id INT,
    receiver_id INT,
    message TEXT,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (sender_id) REFERENCES users(id),
    FOREIGN KEY (receiver_id) REFERENCES users(id)
);

Step 2: Configure Database Connection

1. Open the db.php file.


2. Modify the following variables to match your MySQL credentials:



$host = "localhost"; // Database host
$username = "root"; // Database username
$password = ""; // Database password
$dbname = "chat_system"; // Database name

Step 3: Upload Files to Server

1. Upload all the files in this project to your web server. Ensure that the PHP files are in the correct directory.


2. Make sure the chat.php, login.php, and register.php files are accessible in your browser.



Step 4: Access the Application

1. Navigate to login.php to register or log in.


2. Once logged in, you will be directed to the chat interface where you can send and receive messages.



Usage

1. Register: New users can register by filling in the username and password on the registration page.


2. Login: Existing users can log in with their username and password.


3. Chat: Once logged in, the user will be able to see a sidebar with a list of users and a chat area where they can send messages.


4. Logout: Click the Logout button to log out of the application.



File Structure

/chat_system
    /css
        style.css            -- The main stylesheet for the chat app.
    /js
        script.js            -- The JavaScript/jQuery for chat functionality.
    /php
        db.php               -- Database connection file.
        register.php         -- User registration logic.
        login.php            -- User login logic.
        chat.php             -- The chat interface and message handling.
    index.php                -- The main entry page.
    README.md                -- This readme file.

Notes

Security: The login system should be enhanced with proper password hashing (using PHP's password_hash() and password_verify() functions) for better security.

Database Indexing: Indexing the sender_id and receiver_id in the messages table may help improve performance for larger message datasets.

Real-Time: The chat updates in real-time using AJAX. No page refresh is required to see new messages.

-----THANKS
