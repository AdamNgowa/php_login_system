<?php

declare(strict_types=1);

function is_input_empty(string $username,string $pwd){
    if(empty($username) || empty($pwd)){
     return true;
    }else{
     return false;
    }
 
 }
function is_username_wrong(bool|array $result){
   if(!$result){
    return true;
   }else{
    return false;
   }

}
function is_password_wrong(string $pwd,string $hashedPwd){
    if(!password_verify($pwd,$hashedPwd)){
     return true;
    }else{
     return false;
    }
 
 }

/* is_input_empty($username, $pwd)

Checks if either username or password is empty.
Returns true if empty, false otherwise.
is_username_wrong($result)

Checks if the username exists in the database.
Returns true if username is not found, false otherwise.
is_password_wrong($pwd, $hashedPwd)

Verifies if the entered password matches the hashed password.
Uses password_verify() for secure password checking.
Returns true if incorrect, false if correct.

*/
