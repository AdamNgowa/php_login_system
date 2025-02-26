<?php

declare(strict_types=1);

function get_user(object $pdo, string $username){
    $query = 'SELECT * FROM users WHERE username = :username;';
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(':username', $username, PDO::PARAM_STR);    
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result ?: null; 

}

/*
get_user($pdo, $username) Function:
Queries the users table to find a user by their username.
Uses prepared statements ($pdo->prepare()) to prevent SQL injection.
Binds the username parameter securely (bindParam()).
Executes the query and fetches the result as an associative array (fetch(PDO::FETCH_ASSOC)).
Returns user data if found, otherwise returns null
*/