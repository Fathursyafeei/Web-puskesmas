<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

$DB_USERNAME = 'root'; // ENTRAR YOUR USERNAME
$DB_PASSWORD = ''; // ENTRAR YOUR PASSWORD
$DB_PORT = "3306"; // CHANGE TO YOUR PORT
$DB_HOST = "localhost"; // CHANGE TO YOUR HOST
$DB_NAME = "puskesmas_kentara";

$connection = mysqli_connect($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

if (!$connection)
    die('Database connection error');
