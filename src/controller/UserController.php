<?php
// usercontroller.php

require_once realpath(__DIR__ . '/../models/User.php'); // Include the User class
require_once realpath(__DIR__ . '/../utils/JsonStorage.php');

class UserController {
    // Method to register a new user
    public function registerUser($username, $password) {
        // Validate input data
        if (empty($username) || empty($password)) {
            return false; // Return false if inputs are empty
        }

        // Check if username already exists (you'll need to implement this)
        // Example: Check if username is unique using JsonStorage class

        // Create a new User object
        $user = new User($username, $password);

        // Save user data to storage
        $jsonStorage = new JsonStorage('users.json');
        $jsonStorage->addItem($user->getUserId(), $user->toArray());

        // Return the created user object or a success message
        return $user;
    }

    // Method to authenticate a user
    public function authenticateUser($username, $password) {
        // Validate input data
        if (empty($username) || empty($password)) {
            return false; // Return false if inputs are empty
        }

        // Retrieve user data from storage
        $jsonStorage = new JsonStorage('users.json');
        $userData = $jsonStorage->getItem($username);

        if (!$userData) {
            return false; // User not found
        }

        // Create a User object from retrieved data
        $user = new User($userData['username'], $userData['password']);

        // Verify password
        if (!$user->verifyPassword($password)) {
            return false; // Incorrect password
        }

        // Authentication successful, return the user object
        return $user;
    }

    // Method to log out a user
    public function logoutUser() {
        // Perform any necessary actions to log out the user
        // For example: Clear session data, unset cookies, etc.

        // Return a success message or perform a redirect
    }

    // Other methods for additional user-related functionalities can be added here
}
