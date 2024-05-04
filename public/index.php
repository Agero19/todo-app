<?php

session_start();

const BASE_PATH = __DIR__ . '/../';

// index file , central point of entry
// including our global functions
require (realpath(__DIR__ . "/../functions.php"));
require_once realpath(__DIR__ . "/../Database.php");
require (realpath(__DIR__ . "/../router.php"));

