<?php

class User {
    private $usersFile;

    public function __construct($usersFile) {
        $this->usersFile = $usersFile;
    }
    public function login($username, $password) {
        $users = json_decode(file_get_contents($this->usersFile), true);

        if (isset($users[$username]) && password_verify($password, $users[$username]['password'])) {
            return true;
        } else {
            return false;
        }
    }

    public function signup($username, $password) {
        // Load user data from JSON file
        $users = json_decode(file_get_contents($this->usersFile), true);

        // Check if the username is available
        if(!isset($users[$username])) {
            // Hash the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Add the new user to the user data
            $users[$username] = [
                'password' => $hashedPassword
                // You can add more user information here if needed
            ];

            // Save the updated user data to the JSON file
            file_put_contents($this->usersFile, json_encode($users));

            return true; // Signup successful
        } else {
            return false; // Username already exists
        }
    }
}