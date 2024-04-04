<?php 

// user.php

class User {
    private $userId;
    private $username;
    private $password;

    public function __construct($username, $password) {
        $this->userId = $this->generateUserId();
        $this->username = $username;
        $this->password = $password;
        $this->hashPassword();
    }

    private function generateUserId() {
        // Generate a random user ID (example)
        return uniqid('user_');
    }

    public function getUserId() {
        return $this->userId;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function setPassword($password) {
        $this->password = $password;
        $this->hashPassword(); // Hash the password whenever it's set or updated
    }

    private function hashPassword() {
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
    }

    public function verifyPassword($inputPassword) {
        return password_verify($inputPassword, $this->password);
    }

    // Other methods for user-related functionalities such as login, logout, etc.
}
