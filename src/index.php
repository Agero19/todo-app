<?php


// securing from SQL injection
// never inline user data directly to query string

$config = require_once realpath(__DIR__ . '/../config.php');

$query = "select * from todos where user_id = :id ";
$db = new Database($config);

// prepared statement with bound parameters
$todos = $db->querry($query, ['id' => 1])->fetchAll();

$heading = "Home";

require (realpath(__DIR__ . '/../views/index.view.php'));
