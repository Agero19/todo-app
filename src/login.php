<?php

require (realpath(__DIR__ . '/../views/login.view.php'));

if ($_SERVER['REQUEST_METHOD'] === 'post') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
}