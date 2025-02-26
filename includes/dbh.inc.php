<?php
$host= '127.0.0.1';
$dbname= 'myfirstdatabase';
$dbusername = 'root';
$dbpassword = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname",$dbusername,$dbpassword);    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOexception $e) {
    die("Connection failed: " . $e->getMessage());
}



 /*Database Connection Setup:

Defines database connection parameters:
Host: 127.0.0.1 (localhost).
Database Name: myfirstdatabase.
Username: root.
Password: (empty).
Establishes Connection Using PDO:

Creates a new PDO object to connect to the MySQL database.
Uses "mysql:host=$host;dbname=$dbname" as the connection string.
Sets Error Handling Mode:

PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ensures errors are thrown as exceptions for better debugging.
Catches Connection Errors:

If the connection fails, the catch block displays an error message and terminates the script.*/