<?php

declare(strict_types=1);

function get_username(PDO $pdo, string $username): ?array {
    $query = 'SELECT username FROM users WHERE username = :username;';
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(':username', $username, PDO::PARAM_STR);    
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result ?: null; 
}

function get_email(PDO $pdo, string $email): ?array {
    $query = 'SELECT username FROM users WHERE email = :email;';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);    
    $stmt->execute();
    
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result ?: null; 
}

function set_user(object $pdo,string $pwd ,string $username,string $email){
    $query = 'INSERT INTO users (username,pwd,email) VALUES(:username, :pwd, :email);';
    $stmt = $pdo->prepare($query);

    $options =[
        'cost'=> 12
    ];
    $hashedPwd = password_hash($pwd,PASSWORD_BCRYPT,$options);

    $stmt->bindParam(':username', $username, PDO::PARAM_STR);    
    $stmt->bindParam(':pwd', $hashedPwd, PDO::PARAM_STR); 
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);       
    $stmt->execute();
}

/*
get_username($pdo, $username)

Queries the database to check if the username exists.
Returns the username if found, otherwise null.
get_email($pdo, $email)

Checks if the email is already registered in the database.
Returns the username associated with the email if found, otherwise null.
set_user($pdo, $pwd, $username, $email)

Inserts a new user into the database.
Hashes the password securely using PASSWORD_BCRYPT with a cost factor of 12.
Uses prepared statements to prevent SQL injection.
*/