<?php

declare(strict_types=1);

function is_input_empty(string $username,string $pwd,string $email) {
    if(empty($username) || empty($pwd) || empty($email)){
        return true;
    }else{
        return false;
    }
}
function is_email_invalid(string $email) {
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        return true;
    }else{
        return false;
    }
}
function is_username_taken(object $pdo,string $username) {
    if(get_username($pdo,$username)){
        return true;
    }else{
        return false; 
    }
}
function is_email_registered(object $pdo,string $email) {
    if(get_email($pdo,$email)){
        return true;
    }else{
        return false; 
    }
}
function create_user(object $pdo,string $pwd ,string $username,string $email) {
    set_user($pdo, $pwd , $username,$email);
}

/*
is_input_empty($username, $pwd, $email)

Checks if any input field is empty and returns true if so.
is_email_invalid($email)

Validates the email format using filter_var().
Returns true if the email is invalid.
is_username_taken($pdo, $username)

Calls get_username() to check if the username exists in the database.
Returns true if the username is already taken.
is_email_registered($pdo, $email)

Calls get_email() to check if the email is already registered.
Returns true if the email is in use.
create_user($pdo, $pwd, $username, $email)

Calls set_user() to store a new user in the database.
*/